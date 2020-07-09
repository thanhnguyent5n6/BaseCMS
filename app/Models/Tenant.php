<?php


namespace App\Models;


use App\Traits\Code;

class Tenant extends BaseModel
{
    protected $table = "tenants";

    use Code;

    protected $fillable = [
        'code',
        'domain',
        'name',
        'logo',
        'phone',
        'hotline_1',
        'hotline_2',
        'address',
        'email',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
