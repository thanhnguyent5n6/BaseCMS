<?php


namespace App\Models;

use App\Libs\CommonLib;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function getCodeUnique($prefix)
    {
        $code = $prefix."_".mt_rand(MIN_CODE, MAX_CODE);
        $check_code = $this->where('code',$code)->first();

        if(isset($check_code) && !$check_code($code))
            return $this->createCode($prefix);

        return $code;
    }

    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = $slug = Str::slug($title, '-');

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    private function getRelatedSlugs($slug, $id = 0)
    {
        return $this->select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
