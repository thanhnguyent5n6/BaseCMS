<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\BasePortalController;
use App\Libs\Apriori;
use App\Libs\ProductSuggestion;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Products\Product;
use App\Slide;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends BasePortalController
{
    protected $slide;

    public function __construct()
    {
        parent::__construct();
        $this->slide = new Slide;
    }

    public function index()
    {
        $slides = $this->slide->getAll();
        $products = $this->product->getAll();
        $products = $products->groupBy('category_id');

        return view('page.index', compact('slides', 'products','cart'));
    }

    public function loadCart()
    {
        return view('page.includes.cart');
    }

    public function loadByCategory($slug)
    {
        $category = $this->category->getFirstInfo(['slug' => $slug]);
        $category_ids = [$category->id];
        $sub_categories = [];
        if($category->parent_id == 0) {
            $sub_categories = $this->category->getChilds($category->id);
            if(count($sub_categories) > 0)
                $category_ids = array_merge($category_ids, $sub_categories->pluck('id')->toArray());
        }

        $products = $this->product->getProductByCategoryIds($category_ids);
        return view('page.includes.category', compact('category'));
    }

    public function getAbout()
    {
        return view('page.gioithieu');
    }

    public function getContacts()
    {
        return view('page.lienhe');
    }

    public function getAddToCart(Request $req, $id)
    {
        $product = $this->product->getInfoById($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function postAddToCart(Request $req, $id)
    {
        $product = $this->product->getInfoById($id);

        $oldCart = Session('cart') ? Session::get('cart') : null;
        $number_product = isset($req->choose) ? $req->choose : 1;
        $cart = new Cart($oldCart);
        for ($i = 1; $i <= $number_product; $i++) {
            $cart->add($product, $id);
        }
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeCartItem(Request $request)
    {
        $id = $request->product_id;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else
            Session::forget('cart');
        return redirect()->back();
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('name', 'like', '%' . $req->s . '%')
            ->paginate(8);
        return view('page.timkiem', compact('product'));
    }
}
