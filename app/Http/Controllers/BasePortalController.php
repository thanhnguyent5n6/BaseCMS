<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Products\Product;
use App\Models\Tenant;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class BasePortalController extends Controller
{
    protected $tenant;
    protected $category;
    protected $product;
    protected $cart;

    public function __construct()
    {
        $this->tenant = new Tenant();
        $this->category = new Category();
        $this->product = new Product();

        $tenant_info = $this->tenant->getInfoById(1);
        $categories = $this->category->getCategoryByLevel();
        $cart = Session('cart') ? Session::get('cart') : null;

        View::share('tenant_info', $tenant_info);
        View::share('categories', $categories);
        View::share('cart', $cart);
    }
}
