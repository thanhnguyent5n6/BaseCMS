<?php

namespace App\Models\Products;

use App\Models\BaseModel;
use App\Traits\Code;

class Product extends BaseModel
{
    use Code;

    protected $table = "products";

    protected $fillable = [
        'category_id',
        'supplier_id',
        'code',
        'name',
        'icon',
        'description',
        'content',
        'unit_price',
        'sales',
        'promotion_price',
        'avatar',
        'unit',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id','id')->where('is_deleted', NO_DELETED);
    }

    public function bill_detail()
    {
    	return $this->hasMany('Appp\BillDetail','id_product','id');
    }

    public function getStatusDisplayAttribute()
    {
        if($this->is_active == NO_ACTIVE) {
            return "Khóa";
        }
        return "Hoạt động";
    }

    public function getDescriptionDisplayAttribute()
    {
        if(!empty($this->description)) {
            return html_entity_decode($this->description);
        }
        return "";
    }

    public function getContentDisplayAttribute()
    {
        if(!empty($this->content)) {
            return html_entity_decode($this->content);
        }
        return "";
    }

    public function initParameters()
    {
        return array('status' => 0);
    }

    public function getParameters($data)
    {
        $parameters = $this->initParameters();
        $parameters['name'] = $data['name'] ?? '';
        $parameters['parent_id'] = $data['parent_id'] ?? 0;
        $parameters['parent_id'] = $data['parent_id'] ?? 0;
        $parameters['icon'] = $data['icon'] ?? '';
        $parameters['description'] = isset($data['description']) ? html_entity_decode($data['description']) : '';
        $parameters['priority'] = isset($data['priority']) ? $data['priority'] : 0;
        $parameters['status'] = isset($data['status']) ? 1 : 0;
        return $parameters;
    }
}
