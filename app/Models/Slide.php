<?php

namespace App\Models;

class Slide extends BaseModel
{
    protected $table = "slides";

    protected $fillable = [
        'name',
        'image_id',
        'priority',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

    public function initParameters()
    {
        return array('status' => 0, 'priority' => 0);
    }

    public function getParameters($data)
    {
        $parameters = $this->initParameters();
        $parameters['name'] = $data['name'] ?? '';
        $parameters['priority'] = isset($data['priority']) ? $data['priority'] : 0;
        $parameters['status'] = isset($data['status']) ? 1 : 0;
        $parameters['image_id'] = $data['image_id'];
        return $parameters;
    }

    public function image()
    {
        return $this->belongsTo(Image::class,'image_id', 'id');
    }
}
