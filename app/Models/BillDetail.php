<?php

namespace App\Models;


use App\Models\Products\Product;

class BillDetail extends BaseModel
{
    protected $table = "bill_detail";

    public function product()
    {
    	return $this->belongsTo(Product::class,'id_product','id')->where('is_deleted', NO_DELETED);
    }
}
