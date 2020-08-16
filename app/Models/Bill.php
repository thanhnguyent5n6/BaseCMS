<?php

namespace App\Models;

use App\Libs\CommonLib;
use App\Models\Products\Product;
use App\Traits\Code;
use Illuminate\Database\Eloquent\Model;

class Bill extends BaseModel
{
    use Code;

    protected $table = "bills";

    public function bill_details()
    {
    	return $this->hasMany(BillDetail::class,'id_bill','id')->with('product')->where('is_deleted', NO_DELETED);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'bill_detail','id_product','id_bill');
    }

    public function customer()
    {
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function getDateOrderDisplayAttribute()
    {
        return CommonLib::getDisplayDate($this->date_order,DISPLAY_DATETIME_FORMAT_2);
    }

    public function getStatusDisplayAttribute()
    {
        return CommonLib::getBillStatus($this->status);
    }
}
