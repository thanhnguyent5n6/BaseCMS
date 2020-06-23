<?php


namespace App\Models;

class Supplier extends BaseModel
{
    protected $table = "option_items";

    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
        'priority',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
