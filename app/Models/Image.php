<?php


namespace App\Models;



class Image extends BaseModel
{

    protected $table = "images";

    protected $fillable = [
        'code',
        'url',
        'name',
        'slug',
        'status',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

    public function uploaded($img_ids = [])
    {
        try {
            foreach ($img_ids as $img_id) {
                $this->updateByID($img_id, ['status' => IMG_SAVED]);
            }
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
