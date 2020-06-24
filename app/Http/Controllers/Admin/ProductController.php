<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Options\OptionItem;
use App\Models\Options\OptionType;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends BaseController
{
    private $model;
    private $category;
    private $option_type;
    private $option_item;

    public function __construct()
    {
        $this->model = new Product();
        $this->category = new Category();
        $this->option_type = new OptionType();
        $this->option_item = new OptionItem();
    }

    public function index()
    {
        $products = $this->model->getAll();
        $categories = $this->category->getAll();
        $data_items = $this->getDataItems($products);
        return view('admin.products.index', compact('data_items','categories'));
    }

    public function create()
    {
        $is_update = false;
        $categories = $this->category->getAll()->keyBy('id');
        $suppliers = [];
        return view('admin.products.form', compact('is_update', 'categories','suppliers'));
    }

    public function store(Request $request)
    {
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
        $parameters['code'] = $this->model->getCodeUnique("product_");

        $data_item = $this->model->createData($parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Thêm mới danh mục thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Thêm mới danh mục thất bại');
    }

    public function show()
    {

    }

    public function edit(Request $request)
    {
        $id = $request->id ?? 0;
        $data_item = $this->model->getInfoById($id);
        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy danh mục');
        $is_update = true;
        $parent_products = $this->model->getItemParents()->keyBy('id');
        $priority = $data_item->priority ?? 0;
        return view('admin.products.form', compact('is_update', 'parent_products', 'data_item', 'priority'));
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
        $data_item = $this->model->updateByID($id, $parameters);
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
     * @param $products
     * @param $parent_products
     * @return mixed
     */
    private function getDataItems($products)
    {
        $data_items = $products->map(function ($product, $key) {
            $data = new \stdClass();
            $data->id = $product->id;
            $data->stt = $key + 1;
            $data->code = @$product->code;
            $data->name = @$product->name;
            $data->description = @$product->description_display;
            $data->content = @$product->content_display;
            $data->unit_price = @number_format($product->unit_price);
            $data->sales = !empty($product->sales) ? $product->sales."%" : "0%";
            $data->avatar = @$product->avatar;
            $data->unit = @$product->unit;
            $data->status = @$product->status;
            $data->status_display = @$product->status_display;
            return $data;
        })->toJson();
        return $data_items;
    }
}
