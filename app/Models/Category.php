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
        'is_active',
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

}
