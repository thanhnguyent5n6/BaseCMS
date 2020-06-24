<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests;
use App\User;
use App\Models\Bill;
use App\Models\News;
use App\Models\Category;
use App\Models\BillDetail;
use App\Models\Slide;
use DB;

class AdminController extends BaseController
{
    public function index()
    {
        $user = User::all();
        $sale = Product::where('promotion_price','<>','0')->get();
        $order = Bill::all();
        $total = BillDetail::all();
        $tong = 0;
        foreach($total as $t)
        {
            $tong += $t->unit_price * $t->quantity;
        }
        $dola = 23000;
        $tong = $tong/$dola;
        return view('admin.index', compact('user','sale','order','tong'));
    }

    // ------------------------ PRODUCT ------------------------
    public function getProduct()
    {
    	$prod_type = ProductType::all();
    	$prod = DB::table('products')->orderBy('id_type')->paginate(10);

    	return view('admin.sanpham',compact('prod','prod_type'));
    }
    public function getProductByCategory($id){
        $prod_type = ProductType::all();
        $prod = DB::table('products')->where('id_type',$id)->orderBy('id_type')->get();
        return view('admin.product.productByCategory',compact('prod','prod_type','id'));
    }
    public function getDelProduct($id)
    {
        $old_img = DB::table("products")->where("id","=",$id)->first();
                if(file_exists('source/image/product/'.$old_img->image))
                {
                    unlink('source/image/product/'.$old_img->image);
                }
        Product::where('id',$id)->delete();
    	return redirect()->back();
    }

    public function getEditProduct($id){
        $product = Product::where('id',$id)
                    ->first();
        $type = ProductType::all();
        return view('admin.suasp',compact('product','type'));
    }
    public function postEditProduct(Request $req,$id){
        $name = $req->name;
        $id_type = $req->category;
        $description = $req->description;
        $unit_price = $req->unit_price;
        $promotion_price = isset($req->promotion_price)?$req->promotion_price:0;
        $new = isset($req->new)?1:0;
        DB::table("products")->where('id',$id)->update(array("name"=>$name,"id_type"=>$id_type,"unit_price"=>$unit_price,"promotion_price"=>$promotion_price,"description"=>$description,"new"=>$new));
        if($req->hasfile('img'))
            {
                // xoa anh cu
                $old_img = DB::table("products")->where("id","=",$id)->first();
                if(file_exists('source/image/product/'.$old_img->image))
                {
                    unlink('source/image/product/'.$old_img->image);
                }
                // lay ten anh
                $name_img = $req->file('img')->getClientOriginalName();
                $name_img = time().$name_img;
                // update
                DB::table("products")->where("id","=",$id)->update(
                array("image"=>$name_img));
                $req->file("img")->move("source/image/product/",$name_img);
            }
        return redirect(url('admin/product'));
    }
    public function getCategory()
    {
        $category = ProductType::all();
        return view('admin.danhmuc',compact('category'));
    }
    public function getAddProduct()
    {
        $type = ProductType::all();
        return view('admin.themsp',compact('type'));
    }
    public function postAddProduct(Request $req)
    {
        $name = $req->name;
        $id_type = $req->category;
        $description = $req->description;
        $unit_price = $req->unit_price;
        $promotion_price = isset($req->promotion_price)?$req->promotion_price:0;
        $new = isset($req->new)?1:0;
        if($req->hasfile('img'))
        {
            $name_img = $req->file('img')->getClientOriginalName();
            $name_img = time().$name_img;
            $req->file('img')->move('source/image/product/',$name_img);
        }
        DB::table("products")->insert(["name"=>$name,"id_type"=>$id_type,"unit_price"=>$unit_price,"promotion_price"=>$promotion_price,"description"=>$description,"new"=>$new,"image"=>$name_img]);
        return redirect(url('admin/product'));
    }
    // ------------------------ SEARCH ------------------------
    public function getSearchProduct(Request $req)
    {
        $prod = DB::table('products')->where('name','like','%'.$req->key.'%')->paginate(10);
        return view('admin.timkiem',compact('prod'));
    }
    // ------------------------ CATEGORY ------------------------
    public function getEditCategory($id)
    {
        $cat = ProductType::where('id',$id)->first();
        return view('admin.sua_danhmuc',compact('cat'));
    }
    public function postEditCategory(Request $req,$id){
        $name = $req->name;
        $description = $req->description;
        DB::table("type_products")->where('id',$id)->update(array("name"=>$name,"description"=>$description));
        return redirect(url('admin/category'));
    }
    public function getAddCategory()
    {
        return view('admin.them_danhmuc');
    }
    public function postAddCategory(Request $req){
        $name = $req->name;
        $description = $req->description;
        DB::table("type_products")->insert(array("name"=>$name,"description"=>$description));
        return redirect(url('admin/category'));
    }
    public function getDelCategory($id)
    {
        DB::table('type_products')->where('id',$id)->delete();
        return redirect()->back();
    }
    // ------------------------ BILL ------------------------
    public function getBill()
    {
        $bill = Bill::select('bills.*','customer.name','customer.phone_number')
        ->leftJoin('customer','bills.id_customer','=','customer.id')
        ->where('status','=','0')
        ->paginate(10);
        return view('admin.donhang',compact('bill'));
    }
    public function getDelBill($id)
    {
        DB::table('bills')->where('id',$id)->delete();
        return redirect(url('admin/bill'));
    }
    public function getBillDetail($id)
    {
        $bill = DB::table('bills')
            ->join('customer','bills.id_customer','=','customer.id')
            ->where('bills.id','=',$id)
            ->first();
        $bill_detail = DB::table('bill_detail')
            ->join('products','bill_detail.id_product','=','products.id')
            ->where('id_bill','=',$id)
            ->get();
        return view('admin.chitietdonhang',compact('bill','bill_detail'));
    }
    // change status bill to deploying
    public function changeStatusBill(Request $req)
    {
        $status = $req->status;
        $id = $req->check_bill;
        $bill = new Bill();
        foreach($id as $key => $value)
        {
            $elementBill = $bill->select('id','status')->where('id','=',$value)->first();
            $elementBill->status = $status;
            $elementBill->save();
        }
        return $id;
    }
    // get view deploying function
    public function getBillDeploying()
    {
        $bill = Bill::select('bills.*','customer.name','customer.phone_number')
        ->leftJoin('customer','bills.id_customer','=','customer.id')
        ->where('status','=','1')
        ->paginate(10);
        return view('admin.bill.deploying',compact('bill'));
    }
    // get view success function
    public function getBillSuccess()
    {
        $bill = Bill::select('bills.*','customer.name','customer.phone_number')
        ->leftJoin('customer','bills.id_customer','=','customer.id')
        ->where('status','=','2')
        ->paginate(10);
        return view('admin.bill.billSuccess',compact('bill'));
    }
    // get view false function
    public function getBillFalse()
    {
        $bill = Bill::select('bills.*','customer.name','customer.phone_number')
        ->leftJoin('customer','bills.id_customer','=','customer.id')
        ->where('status','=','3')
        ->paginate(10);
        return view('admin.bill.billFalse',compact('bill'));
    }
    // get view destroy function
    public function getBillDestroy()
    {
        $bill = Bill::select('bills.*','customer.name','customer.phone_number')
        ->leftJoin('customer','bills.id_customer','=','customer.id')
        ->where('status','=','4')
        ->paginate(10);
        return view('admin.bill.billDestroy',compact('bill'));
    }
    // ------------------------ NEWS -----------------------------
    public function getNews()
    {
        $arr = DB::table('news')->paginate(10);
        return view('admin.tintuc',compact('arr'));
    }
    public function getEditNews($id){
        $news = News::where('id',$id)->first();
        return view('admin.sua_tintuc',compact('news'));
    }
    public function postEditNews(Request $req,$id){
        $data = $req->all();
        $title = $data['title'];
        $content = $data['content'];
        DB::table("news")->where('id',$id)->update(array("title"=>$title,"content"=>$content));
        if($req->hasfile('img'))
            {
                // xoa anh cu
                $old_img = DB::table("news")->where("id","=",$id)->first();
                if(file_exists('source/image/news/'.$old_img->image))
                {
                    unlink('source/image/news/'.$old_img->image);
                }
                // lay ten anh
                $name_img = $req->file('img')->getClientOriginalName();
                $name_img = time().$name_img;
                // update
                DB::table("news")->where("id","=",$id)->update(
                array("image"=>$name_img));
                $req->file("img")->move("source/image/news/",$name_img);
            }
        return redirect(url('admin/news'));
    }
    public function getDelNews($id)
    {
        $old_img = DB::table("news")->where("id","=",$id)->first();
                if(file_exists('source/image/news/'.$old_img->image))
                {
                    unlink('source/image/news/'.$old_img->image);
                }
        News::where('id',$id)->delete();
        return redirect()->back();
    }
    public function getAddNews(){
        return view('admin.them_tintuc',compact('news'));
    }
    public function postAddNews(Request $req){
        $data = $req->all();
        $title = $data['title'];
        $content = $data['content'];

        if($req->hasfile('img'))
            {
                // lay ten anh
                $name_img = $req->file('img')->getClientOriginalName();
                $name_img = time().$name_img;
                $req->file("img")->move("source/image/news/",$name_img);
            }
        DB::table("news")->insert(array("title"=>$title,"content"=>$content,"image"=>$name_img));
        return redirect(url('admin/news'));
    }
    public function getCategoryNews()
    {
        return view('admin.danhmuc_tintuc');
    }

    // ------------------------ SLIDE ------------------------
    public function getSlide()
    {
        $slide = Slide::all();
        return view('admin.slide',compact('slide'));
    }
    public function getEditSlide($id)
    {
        $slide = Slide::where('id',$id)->first();
        return view('admin.sua_slide',compact('slide'));
    }
    public function postEditSlide(Request $req,$id)
    {
        $image = $req->img;
        $old_img = DB::table('slide')->where('id',$id)->first();
        if(file_exists('source/image/slide/'.$old_img->image))
        {
            unlink('source/image/slide/'.$old_img->image);
        }
        $img_name  = $req->file('img')->getClientOriginalName();
        $img_name  = time().$img_name;
        $req->file("img")->move("source/image/slide/",$img_name);
        DB::table('slide')->where('id',$id)->update(array('image'=>$img_name));
        return redirect(url('admin/slide'));
    }
    public function getAddSlide()
    {
        return view('admin.them_slide');
    }
    public function postAddSlide(Request $req)
    {
        $img_name  = $req->file('img')->getClientOriginalName();
        $img_name  = time().$img_name;
        $req->file("img")->move("source/image/slide/",$img_name);
        DB::table('slide')->insert(array('image'=>$img_name));
        return redirect(url('admin/slide'));
    }
    public function getDelSlide($id)
    {
        $old_img = DB::table('slide')->where('id',$id)->first();
        if(file_exists('source/image/slide/'.$old_img->image))
        {
            unlink('source/image/slide/'.$old_img->image);
        }
        DB::Table('slide')->where('id',$id)->delete();
        return redirect()->back();
    }

}

