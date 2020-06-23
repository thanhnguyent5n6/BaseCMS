<?php


namespace App\Models\Options;


use App\Models\BaseModel;

class OptionItem extends BaseModel
{
    protected $table = "option_items";

    protected $fillable = [
        'tenant_id',
        'option_type_id',
        'code',
        'name',
        'language_key',
        'index_order',
        'is_default',
        'is_active',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
