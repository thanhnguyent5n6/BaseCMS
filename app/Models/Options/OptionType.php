<?php


namespace App\Models\Options;


use App\Models\BaseModel;

class OptionType extends BaseModel
{
    protected $table = "option_types";

    protected $fillable = [
        'tenant_id',
        'code',
        'name',
        'language_key',
        'index_order',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

    public function items()
    {
        return $this->hasMany(OptionItem::class, 'option_type_id', 'id')->where('is_deleted', NO_DELETED);
    }

    public function getProductOption()
    {
        $option_type = $this->getFirstInfo(['code' => 'product_options']);
        return OptionItem::where('option_type_id', $option_type->id)->where('is_deleted', NO_DELETED)->get();
    }
}
