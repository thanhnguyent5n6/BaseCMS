<?php


namespace App\Models;

class Supplier extends BaseModel
{
    protected $table = "suppliers";

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
