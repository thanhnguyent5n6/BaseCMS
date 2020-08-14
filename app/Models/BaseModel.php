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

    public function getInfoById($id, $relations = [])
    {
        $query = $this->where('id', $id)->where('is_deleted', NO_DELETED);
        if(count($relations) > 0)
            foreach($relations as $relation) {
                $query = $query->with($relation);
            }

        return $query->first();
    }

    public function getFirstInfo($parameters)
    {
        return $this->where($parameters)->where('is_deleted', NO_DELETED)->first();
    }

    public function softDelete($id)
    {
        return $this->where('id', $id)->update(['is_deleted' => DELETED]);
    }

    public function getData($relations = [])
    {
        $query = $this->where('is_deleted', NO_DELETED);
        if(count($relations) > 0) {
            foreach($relations as $relation) {
                $query = $query->with($relation);
            }
        }
        return $query->get();
    }

    public function getAll($relations = [])
    {
        return $this->getData($relations);
    }

    public function getDataItems($parameters = [], $relations = [])
    {
        $query = $this->where('is_deleted', NO_DELETED);
        if(count($parameters) > 0) {
            foreach($parameters as $field => $parameter) {
                $query = $query->where($field, '=' ,$parameter);
            }
        }
        if(count($relations) > 0) {
            foreach($relations as $relation) {
                $query = $query->with($relation);
            }
        }
        return $query->get();
    }

    public function updateByID($id, array $options = [])
    {
        $options['updated_by'] = @Auth::user()->id;
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
        return CommonLib::getDisplayDate($this->created_at,DISPLAY_DATE_FORMAT);
    }

    public function getUpdatedAtDisplayAttribute(){
        return CommonLib::getDisplayDate($this->updated_at,DISPLAY_DATE_FORMAT);
    }
}
