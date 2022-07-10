<?php


namespace App\Http\Controllers;


class BaseController extends Controller
{
    protected $model;

    public function __construct()
    {
        
    }

    /**
     * @param string $title
     * @param string $message
     * @param null $data
     * @return false|string
     */
    protected function Success($title = '', $message = '', $data = null)
    {
        return json_encode([
            'status' => 200,
            'title' => $title,
            'message' => $message,
            'data' => $data,
        ]);
    }

    /**
     * @param string $title
     * @param string $message
     * @param null $data
     * @return false|string
     */
    protected function Error($title = '', $message = '', $data = null)
    {
        return json_encode([
            'status' => 500,
            'title' => $title,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
