<?php


namespace App\Models;

use App\Libs\CommonLib;
use App\User;
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

    public function getInfoById($id, $relation = [])
    {
        if(count($relation) > 0)
            return $this->where('id', $id)->where('is_deleted', NO_DELETED)->with($relation)->first();

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
        $data = $this->where('id', $id)->update($options);
        if(!empty($data))
            return $this->getInfoById($id);
        return false;
    }

    public function created_by_info(){
        return $this->belongsTo(User::class,'created_by')->where('is_deleted',NO_DELETED);
    }

    public function updated_by_info(){
        return $this->belongsTo(User::class,'updated_by')->where('is_deleted',NO_DELETED);
    }

    public function getCreatedAtDisplayAttribute(){
        return CommonLib::getDisplayDate($this->created_at,DISPLAY_DATETIME_FORMAT);
    }

    public function getUpdatedAtDisplayAttribute(){
        return CommonLib::getDisplayDate($this->updated_at,DISPLAY_DATETIME_FORMAT);
    }
}
