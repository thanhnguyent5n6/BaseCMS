<?php

namespace App\Models;

use App\Libs\CommonLib;
use App\Models\Products\Product;

class Category extends BaseModel
{

    protected $table = "categories";

    protected $fillable = [
        'parent_id',
        'code',
        'name',
        'icon',
        'slug',
        'description',
        'image',
        'priority',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

    public function products()
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

    public function getChilds($category_id)
    {
        return $this->where('parent_id', $category_id)->where('is_deleted', NO_DELETED)->get();
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
        $parameters['slug'] = $slug = $this->createSlug($parameters['name']);;
        $parameters['description'] = isset($data['description']) ? html_entity_decode($data['description']) : '';
        $parameters['priority'] = isset($data['priority']) ? $data['priority'] : 0;
        $parameters['status'] = isset($data['status']) ? 1 : 0;
        return $parameters;
    }

    public function getCategoryByLevel()
    {
        $categories = $this->getData()->toArray();
        $data_items = $this->categoryByLevel($categories);
        return $data_items;
    }

    private function categoryByLevel($data_items, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach($data_items as $key => $data_item) {
            if($parent_id == $data_item['parent_id']) {
                $result[$key]['id'] = $data_item['id'];
                $result[$key]['parent_id'] = $data_item['parent_id'];
                $result[$key]['code'] = $data_item['code'];
                $result[$key]['name'] = $data_item['name'];
                $result[$key]['slug'] = $data_item['slug'];
                $result[$key]['icon'] = $data_item['icon'];
                $result[$key]['level'] = $level;
                unset($data_items[$key]);
                $result[$key]['child'] = $this->categoryByLevel($data_items, $data_item['id'], $level+1);
            }
        }
        return $result;
    }

}
