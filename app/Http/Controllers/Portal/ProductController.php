<?php


namespace App\Http\Controllers\Portal;


use App\Http\Controllers\BasePortalController;
use Illuminate\Http\Request;

class ProductController extends BasePortalController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $product_news = $this->product->getProductNews();
        $key_words = isset($request->key_words) ? $request->key_words : '';
        return view('page.includes.products', compact('product_news','key_words'));
    }

    public function loadProducts(Request $request)
    {
        $sort_filter = $request->sort_filter ?? 0;
        $txt_search = $request->txt_search ?? 0;
        $from_price = $request->from_price ?? 0;
        $to_price = $request->to_price ?? 0;
        $key_words = isset($request->key_words) ? $request->key_words : '';

        $products = $this->product->getAllProducts($txt_search, $from_price, $to_price, $key_words);
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

    public function detail($slug)
    {
        $product = $this->product->getFirstInfo(['slug' => $slug]);
        $this->product->updateByID($product->id,['views' => $product->views+1]);
        return view('page.includes.detail', compact('product'));
    }
}
