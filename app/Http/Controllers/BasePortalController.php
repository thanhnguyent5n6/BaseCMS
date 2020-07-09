<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Support\Facades\View;

class BasePortalController extends Controller
{
    protected $tenant;
    protected $category;
    public function __construct()
    {
        $this->tenant = new Tenant();
        $this->category = new Category();

        $tenant_info = $this->tenant->getInfoById(1);
        $categories = $this->category->getCategoryByLevel();

        View::share('tenant_info', $tenant_info);
        View::share('categories', $categories);
    }
}
