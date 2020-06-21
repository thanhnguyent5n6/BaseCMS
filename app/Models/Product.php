<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    public function product_typpe()
    {
    	return $this->belongsTo('App\ProductType','id_type','id');
    }
    public function bill_detail()
    {
    	return $this->hasMany('Appp\BillDetail','id_product','id');
    }
}
