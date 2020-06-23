<?php

namespace App\Http\Controllers;



use App\Libs\Apriori;
use App\Libs\ProductSuggestion;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Requests;
use Hash;
use Auth;
use DB;
class PageController extends Controller
{
    public function getIndex()
    {

        $apriori_lib = new Apriori(40, 2);

    	$slide = Slide::all();
    	$new_product = Product::where('new','=','1')->paginate(8);
    	$sp_km = Product::where('promotion_price','<>','0')->paginate(8);

        $data_suggestion = $apriori_lib->getProductSuggestion();

        if(count($data_suggestion) > 0) {
            $new_product_1 = $new_product;
            $sp_km_1 = $sp_km;
            $new_product = $data_suggestion;
            $sp_km = $data_suggestion;
            $new_product_id = $new_product->pluck('id')->toArray();
            $sp_km_id = $sp_km->pluck('id')->toArray();

            foreach($new_product_1 as $product) {
                if(!in_array($product->id, $new_product_id)) {
                    $new_product->push($product);
                }
            }
            foreach($sp_km_1 as $product) {
                if(!in_array($product->id, $sp_km_id)) {
                    $sp_km->push($product);
                }
            }
        }

    	return view('page.trangchu',compact('slide','new_product','sp_km'));
    }

    public function getProductType($type)
    {
    	$sp_theoloai = Product::where('id_type','=',$type)->orderBy('unit_price','desc')->paginate(6);
    	$sp_khac = Product::where('id_type','<>',$type)->paginate(3);
    	$loai = ProductType::all();
    	$loai_sp = ProductType::where('id','=',$type)->first();
    	return view('page.loai_sp',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getAbout()
    {
    	return view('page.gioithieu');
    }
    public function getContacts()
    {
    	return view('page.lienhe');
    }
    public function getProductDetail($id)
    {
        $apriori_lib = new Apriori(40, 2);
    	$sp = Product::where('id','=',$id)->first();
    	$sp_tuongtu = Product::where('id_type','=',$sp->id_type)->paginate(3);
        $sp_km = DB::table('products')->orderBy('promotion_price','desc')->paginate(4);
        $sp_moi = DB::table('products')->orderBy('created_at','desc')->paginate(4);

        $data_suggestion = $apriori_lib->getProductSuggestion();
        if(count($data_suggestion) > 0) {
            $new_product_1 = $sp_moi;
            $sp_moi = $data_suggestion;
            $sp_moi_id = $sp_moi->pluck('id')->toArray();

            foreach($new_product_1 as $product) {
                if(!in_array($product->id, $sp_moi_id)) {
                    $sp_moi->push($product);
                }
            }
        }
    	return view('page.chitietsanpham',compact('sp','sp_tuongtu','sp_km','sp_moi'));
    }
    public function getAddToCart(Request $req,$id)
    {
    	$product = Product::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart =  new Cart($oldCart);
    	$cart->add($product,$id);
    	$req->session()->put('cart',$cart);	
    	return redirect()->back(); 
    }
    public function postAddToCart(Request $req,$id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $number_product = isset($req->choose)?$req->choose:1;
        $cart =  new Cart($oldCart);
        for($i=1;$i<=$number_product;$i++)
        {
           $cart->add($product,$id);
        }
        $req->session()->put('cart',$cart); 
        return redirect()->back(); 
    }
    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
            Session::forget('cart');
        return redirect()->back();
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('name','like','%'.$req->s.'%')
            ->paginate(8);
        return view('page.timkiem',compact('product'));
    }
}
