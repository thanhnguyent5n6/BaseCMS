<?php

namespace App\Models;

use App\Traits\Code;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends BaseModel
{
    protected $table = "product_options";

    protected $fillable = [
        'product_id',
        'option_type_id',
        'option_item_id',
        'type',
        'value',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
