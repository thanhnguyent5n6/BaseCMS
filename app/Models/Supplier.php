<?php


namespace App\Models;

class Supplier extends BaseModel
{
    protected $table = "suppliers";

    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
        'priority',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

    public function getParameters($data)
    {
        $parameters = $this->initParameters();
        $parameters['name'] = $data['name'] ?? '';
        $parameters['description'] = isset($data['description']) ? $data['description'] : "";
        $parameters['priority'] = isset($data['priority']) ? $data['priority'] : 1;
        $parameters['status'] = isset($data['status']) ? ACTIVE : NO_ACTIVE;
        return $parameters;
    }

    public function initParameters()
    {
        return array('status' => 0, 'priority' => 0);
    }
}
