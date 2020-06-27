<?php


namespace App\Models;


use App\Traits\Code;

class Image extends BaseModel
{
    use Code;

    protected $table = "images";

    protected $fillable = [
        'code',
        'url',
        'name',
        'slug',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
