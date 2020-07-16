<?php

namespace App\Models;

use App\Traits\Code;
use Illuminate\Database\Eloquent\Model;

class Bill extends BaseModel
{
    use Code;

    protected $table = "bills";
    public function bill_detail()
    {
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }
    public function customer()
    {
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
}
