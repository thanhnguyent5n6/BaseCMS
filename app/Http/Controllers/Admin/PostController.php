<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends BaseController
{
    public function __construct()
    {
        $this->model = new Post();
    }

    public function index()
    {
        $posts = $this->model->getAll();
        $data_items = $this->getDataItems($posts);
        return view('admin.posts.index', compact('data_items'));
    }

    public function create()
    {
        $is_update = false;
        return view('admin.posts.form', compact('is_update'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|max:255',
                'content' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề',
                'title.max' => 'Tiêu đề không quá 255 ký tự',
                'content.required' => 'Bạn chưa nội dung bài viết',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $parameters['code'] = $this->model->getCodeUnique("post");

        $data_item = $this->model->createData($parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Thêm mới sản phẩm thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Thêm mới sản phẩm thất bại');
    }

    public function show()
    {

    }

    public function edit(Request $request)
    {
        $id = $request->id ?? 0;
        $data_item = $this->model->getInfoById($id);

        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy bài viết');
        $is_update = true;
        return view('admin.posts.form', compact('is_update', 'data_item'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'] ?? 0;
        $data_item = $this->model->getInfoById($id);
        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy bài viết');
        $this->validate($request,
            [
                'title' => 'required|max:255',
                'content' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề',
                'title.max' => 'Tiêu đề không quá 255 ký tự',
                'content.required' => 'Bạn chưa nội dung bài viết',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $data_item = $this->model->updateByID($id, $parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Cập nhật bài viết thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Cập nhật bài viết thất bại');
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $ids = $data['ids'] ?? [];
        foreach($ids as $id) {
            $this->model->softDelete($id);
        }
        return $this->Success('Xóa bài viết thành công');
    }

    /**
     * @param $posts
     * @param $parent_posts
     * @return mixed
     */
    private function getDataItems($posts)
    {
        $data_items = $posts->map(function ($post, $key) {
            $data = new \stdClass();
            $data->id = $post->id;
            $data->stt = $key + 1;
            $data->code = @$post->code;
            $data->title = @$post->title;
            $data->content = @$post->content_display;
            $data->status = @$post->status;
            $data->status_display = @$post->status_display;
            return $data;
        })->toJson();
        return $data_items;
    }
}
