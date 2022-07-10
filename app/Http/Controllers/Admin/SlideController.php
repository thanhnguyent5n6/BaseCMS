<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SlideController extends BaseController
{
    public function __construct()
    {
        $this->model = new Slide();
    }

    public function index()
    {
        $data_items = $this->getDataItems();

        return view('admin.slides.index', compact('data_items'));
    }

    public function create()
    {
        $is_update = false;
        return view('admin.slides.form', compact('is_update'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'priority' => 'required|min:0',
                'image_id' => 'required'
            ],
            [
                'name.required' => 'Vui lòng nhập tên Slide',
                'name.max' => 'Tên Slide không quá 255 ký tự',
                'priority.required' => 'Vui lòng nhập thứ tự',
                'priority.min' => 'Thứ tự không được < 0',
                'image_id.required' => 'Vui lòng chọn ảnh',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $data_item = $this->model->createData($parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Thêm mới Slide thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Thêm mới Slide thất bại');
    }

    public function show()
    {

    }

    public function edit(Request $request)
    {
        $id = $request->id ?? 0;
        $data_item = $this->model->getInfoById($id);
        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy Slide');
        $is_update = true;
        $priority = $data_item->priority ?? 0;
        return view('admin.slides.form', compact('is_update', 'data_item', 'priority'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'] ?? 0;
        $data_item = $this->model->getInfoById($id);
        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy Slide');
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'priority' => 'required|min:0',
            ],
            [
                'name.required' => 'Vui lòng nhập tên Slide',
                'name.max' => 'Tên Slide không quá 255 ký tự',
                'priority.required' => 'Vui lòng nhập thứ tự',
                'priority.min' => 'Thứ tự không được < 0',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $data_item = $this->model->updateByID($id, $parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Cập nhật Slide thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Cập nhật Slide thất bại');
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $ids = $data['ids'] ?? [];
        foreach($ids as $id) {
            $this->model->softDelete($id);
        }
        return $this->Success('Xóa Slide thành công');
    }

    /**
     * @return mixed
     */
    private function getDataItems()
    {
        $slides = $this->model->where('is_deleted', NO_DELETED)->with('image')->orderBy('priority')->get();
        $data_items = $slides->map(function ($slide, $key) {
            $data = new \stdClass();
            $data->stt = $key + 1;
            $data->id = $slide->id;
            $data->image_url = asset($slide->image->url);
            $data->name = @$slide->name;
            $data->priority = @$slide->priority;
            $data->status = @$slide->status;
            return $data;
        })->toJson();
        return $data_items;
    }
}
