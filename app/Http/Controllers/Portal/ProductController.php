<?php


namespace App\Http\Controllers\Portal;


use App\Http\Controllers\BasePortalController;

class ProductController extends BasePortalController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function detail($slug)
    {
        $product = $this->product->getFirstInfo(['slug' => $slug]);
        $this->product->updateByID($product->id,['views' => $product->views+1]);
        return view('page.includes.detail', compact('product'));
    }
}
