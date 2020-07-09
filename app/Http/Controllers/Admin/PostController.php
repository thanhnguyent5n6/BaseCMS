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
        return view('admin.posts.index', compact('data_items','categories'));
    }

    public function create()
    {
        $is_update = false;
        $categories = $this->category->getAll()->keyBy('id');
        $suppliers = $this->supplier->getAll();
        return view('admin.posts.form', compact('is_update', 'categories','suppliers'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'description' => 'max:1000',
                'price' => 'required|min:0',
            ],
            [
                'name.required' => 'Vui lòng nhập tên danh mục',
                'name.max' => 'Tên danh mục không quá 255 ký tự',
                'price.required' => 'Bạn chưa nhập giá',
                'price.min' => 'Giá sản phẩm lớn hơn 0đ',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $parameters['code'] = $this->model->getCodeUnique("post");

        $data_item = $this->model->createPost($parameters);
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
        $data_item = $this->model->getInfoById($id,['post_image.image']);

        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy sản phẩm');
        $is_update = true;
        $categories = $this->category->getAll()->keyBy('id');
        $suppliers = $this->supplier->getAll();
        return view('admin.posts.form', compact('is_update', 'categories', 'data_item', 'suppliers'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'] ?? 0;
        $data_item = $this->model->getInfoById($id);
        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy danh mục');
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'icon' => 'max:100',
                'description' => 'max:1000',
            ],
            [
                'name.required' => 'Vui lòng nhập tên danh mục',
                'name.max' => 'Tên danh mục không quá 255 ký tự',
                'icon.max' => 'Icon không quá 50 ký tự',
                'description.max' => 'Mô tả không quá 1000 ký tự',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $data_item = $this->model->updatePost($id, $parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Cập nhật danh mục thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Cập nhật danh mục thất bại');
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $ids = $data['ids'] ?? [];
        foreach($ids as $id) {
            $this->model->softDelete($id);
        }
        return $this->Success('Xóa danh mục thành công');
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
