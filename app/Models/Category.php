<?php

namespace App\Models;

use App\Traits\Code;

class Category extends BaseModel
{
    use Code;

    protected $table = "categories";

    protected $fillable = [
        'parent_id',
        'code',
        'name',
        'icon',
        'description',
        'image',
        'priority',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'id_type', 'id')->where('is_deleted', NO_DELETED);
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

    public function getItemParents()
    {
        return $this->where('parent_id', 0)->where('is_deleted', NO_DELETED)->get();
    }

    public function initParameters()
    {
        return array('status' => 0, 'priority' => 0);
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
