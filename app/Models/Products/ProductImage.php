<?php

namespace App\Models;

use App\Traits\Code;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends BaseModel
{
    protected $table = "product_images";

    protected $fillable = [
        'product_id',
        'name',
        'url',
        'name',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
