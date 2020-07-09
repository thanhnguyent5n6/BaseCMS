<?php


namespace App\Http\Controllers;

use App\Libs\CommonLib;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;


class FileController extends BaseController
{
    public function __construct()
    {
        $this->model = new Image();
    }

    public function upload(Request $request)
    {
        $file = $request->file ?? null;
        $check_mime_type = CommonLib::checkMimeTypeImage($file->getMimeType());
        if(!$check_mime_type)
            return false;

        $url = UPLOAD_PRODUCT_PATH;
        $data = $this->saveAndMoveFile($file, $url);
        return $data->id;
    }

    public function saveAndMoveFile($file, $url)
    {
        try {
            $file_name = $file->getClientOriginalName();
            $base_name = explode('.',$file_name)[0];
            $slug = $this->model->createSlug($base_name);
            $file_name_save = $slug."-".Carbon::now()->timestamp;
        } catch (\Exception $exception) {
            $file_name = "";
            $file_extension = "";
            $base_name = "";
            $slug = null;
            $file_name_save = null;
        }

        if(empty($slug) || empty($file_name_save) || empty($file_name))
            return false;

        $parameters['code'] = $this->model->getCodeUnique("img");
        $parameters['name'] = $file_name;
        $parameters['url'] = $url."/".$file_name;
        $parameters['slug'] = $file_name_save;
        $parameters['status'] = IMG_NEW;
        $file->move($url, $file_name);

        return $this->model->create($parameters);
    }
}
