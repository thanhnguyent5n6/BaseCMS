<?php

namespace App\Models;

use App\Models\Products\Product;
use App\Traits\Code;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends BaseModel
{
    protected $table = "product_image";

    protected $fillable = [
        'product_id',
        'image_id',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class,'image_id','id')->where('is_deleted', NO_DELETED);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product','id')->where('is_deleted', NO_DELETED);
    }
}
