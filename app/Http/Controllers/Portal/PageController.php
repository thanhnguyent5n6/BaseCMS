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
        $category_info = $this->category->getFirstInfo(['slug' => $slug]);
        $product_news = $this->product->getProductNews();
        return view('page.includes.category', compact('category_info','product_news'));
    }

    public function loadProductByCategory(Request $request)
    {
        $category_id = $request->category_id ?? 0;
        $sort_filter = $request->sort_filter ?? 0;
        $txt_search = $request->txt_search ?? 0;
        $from_price = $request->from_price ?? 0;
        $to_price = $request->to_price ?? 0;

        $category = $this->category->getInfoById($category_id);
        $category_ids = [$category->id];
        if($category->parent_id == 0) {
            $sub_categories = $this->category->getChilds($category->id);
            if(count($sub_categories) > 0)
                $category_ids = array_merge($category_ids, $sub_categories->pluck('id')->toArray());
        }

        $products = $this->product->getProductByCategoryIds($category_ids, $txt_search, $from_price, $to_price);
        switch ($sort_filter) {
            case "early":
                $products = $products->sortBy('created_at');
                break;
            case "best_selling":
                $products = $products->sortByDesc('selling');
                break;
            case "view":
                $products = $products->sortByDesc('views');
                break;
            case "hight_to_low":
                $products = $products->sortByDesc('price');
                break;
            case "low_to_hight":
                $products = $products->sortBy('price');
                break;
            case "a_z":
                $products = $products->sortBy('name');
                break;
            case "z_a":
                $products = $products->sortByDesc('name');
                break;
            default:
                $products = $products->sortByDesc('created_at');
        }
        return view('page.includes.product_in_category', compact('products'));
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
