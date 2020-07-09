<?php

namespace App\Models;

use App\Traits\Code;

class Post extends BaseModel
{
    protected $table = "posts";

    use Code;

    protected $fillable = [
        'code',
        'title',
        'content',
        'thumbnail',
        'slug',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
