<?php


namespace App\Models;



class Tenant extends BaseModel
{
    protected $table = "tenants";

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
        'introduce',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
