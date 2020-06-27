<?php

namespace App\Models;

use App\Traits\Code;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
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
