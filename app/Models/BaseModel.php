<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    public function createData($parameters)
    {
        $parameters['created_by'] = Auth::user()->id;
        $parameters['updated_by'] = Auth::user()->id;
        return $this->create($parameters);
    }

    public function getInfoById($id)
    {
        return $this->where('id', $id)->where('is_deleted', NO_DELETED)->first();
    }

    public function getFirstInfo($parameters)
    {
        return $this->where($parameters)->where('is_deleted', NO_DELETED)->first();
    }

    public function softDelete($id)
    {
        return $this->where('id', $id)->update(['is_deleted' => DELETED]);
    }

    public function getData()
    {
        return $this->where('is_deleted', NO_DELETED)->get();
    }

    public function getAll()
    {
        return $this->getData();
    }

    public function updateByID($id, array $options = [])
    {
        $options['updated_by'] = Auth::user()->id;
        return $this->where('id', $id)->update($options);
    }
}
