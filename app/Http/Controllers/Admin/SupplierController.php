<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends BaseController
{
    public function __construct()
    {
        $this->model = new Supplier();
    }

    public function index()
    {
        $data_items = $this->getDataItems();

        return view('admin.suppliers.index', compact('data_items'));
    }

    public function create()
    {
        $is_update = false;
        return view('admin.suppliers.form', compact('is_update'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'priority' => 'required|min:0',
            ],
            [
                'name.required' => 'Vui lòng nhập tên nhà cung cấp',
                'name.max' => 'Tên nhà cung cấp không quá 255 ký tự',
                'priority.required' => 'Vui lòng nhập thứ tự',
                'priority.min' => 'Thứ tự không được < 0',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $parameters['code'] = $this->model->getCodeUnique("supplier");

        $data_item = $this->model->createData($parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Thêm mới nhà cung cấp thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Thêm mới nhà cung cấp thất bại');
    }

    public function show()
    {

    }

    public function edit(Request $request)
    {
        $id = $request->id ?? 0;
        $data_item = $this->model->getInfoById($id);
        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy nhà cung cấp');
        $is_update = true;
        $priority = $data_item->priority ?? 0;
        return view('admin.suppliers.form', compact('is_update', 'data_item', 'priority'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'] ?? 0;
        $data_item = $this->model->getInfoById($id);
        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy nhà cung cấp');
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'priority' => 'required|min:0',
            ],
            [
                'name.required' => 'Vui lòng nhập tên nhà cung cấp',
                'name.max' => 'Tên nhà cung cấp không quá 255 ký tự',
                'priority.required' => 'Vui lòng nhập thứ tự',
                'priority.min' => 'Thứ tự không được < 0',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $data_item = $this->model->updateByID($id, $parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Cập nhật nhà cung cấp thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Cập nhật nhà cung cấp thất bại');
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $ids = $data['ids'] ?? [];
        foreach($ids as $id) {
            $this->model->softDelete($id);
        }
        return $this->Success('Xóa nhà cung cấp thành công');
    }

    /**
     * @return mixed
     */
    private function getDataItems()
    {
        $suppliers = Supplier::where('is_deleted', NO_DELETED)->orderBy('priority')->get();
        $data_items = $suppliers->map(function ($supplier, $key) {
            $data = new \stdClass();
            $data->stt = $key + 1;
            $data->id = $supplier->id;
            $data->code = @$supplier->code;
            $data->name = @$supplier->name;
            $data->priority = @$supplier->priority;
            $data->status = @$supplier->status;
            return $data;
        })->toJson();
        return $data_items;
    }
}
