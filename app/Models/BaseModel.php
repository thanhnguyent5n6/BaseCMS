<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getInfoById($id)
    {
        return $this->where('id', $id)->where('is_deleted', NO_DELETED)->first();
    }

    public function softDelete($id)
    {
        return $this->update('is_deleted', DELETED);
    }

    public function getData()
    {
        return $this->where('is_deleted', NO_DELETED)->get();
    }

    public function getAll()
    {
        return $this->getData();
    }
}