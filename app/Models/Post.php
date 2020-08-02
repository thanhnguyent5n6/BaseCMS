<?php

namespace App\Models;

use App\Libs\CommonLib;
use App\Traits\Code;
use App\Traits\Slug;

class Post extends BaseModel
{
    protected $table = "posts";

    use Code;
    use Slug;

    protected $fillable = [
        'code',
        'title',
        'content',
        'thumbnail',
        'slug',
        'views',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

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
        $parameters['title'] = $data['title'] ?? '';
        $parameters['thumbnail'] = $data['thumbnail'] ?? '';
        $parameters['slug'] = $slug = $this->createSlug($parameters['title']);
        $parameters['content'] = isset($data['content']) ? html_entity_decode($data['content']) : '';
        $parameters['status'] = isset($data['status']) ? 1 : 0;
        return $parameters;
    }

    public function getCreatedAtDisplayAttribute()
    {
        return CommonLib::getDisplayDate($this->created_at,DISPLAY_DATETIME_FORMAT);
    }
}
