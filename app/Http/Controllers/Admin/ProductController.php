<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Options\OptionItem;
use App\Models\Options\OptionType;
use App\Models\Products\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends BaseController
{
    private $category;
    private $option_type;
    private $option_item;
    private $supplier;

    public function __construct()
    {
        $this->model = new Product();
        $this->category = new Category();
        $this->option_type = new OptionType();
        $this->option_item = new OptionItem();
        $this->supplier = new Supplier();
    }

    public function index()
    {
        $products = $this->model->getAllProducts();
        $categories = $this->category->getAll();
        $data_items = $this->getDataItems($products);
        return view('admin.products.index', compact('data_items','categories'));
    }

    public function create()
    {

        $is_update = false;
        $categories = $this->category->getAll()->keyBy('id');
        $suppliers = $this->supplier->getAll();
        return view('admin.products.form', compact('is_update', 'categories','suppliers'));
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
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'name.max' => 'Tên sản phẩm không quá 255 ký tự',
                'price.required' => 'Bạn chưa nhập giá',
                'price.min' => 'Giá sản phẩm lớn hơn 0đ',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data, true);
        $parameters['code'] = $this->model->getCodeUnique("product");

        $data_item = $this->model->createProduct($parameters);
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
        $data_item = $this->model->getInfoById($id,['product_image.image']);

        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy sản phẩm');
        $is_update = true;
        $categories = $this->category->getAll()->keyBy('id');
        $suppliers = $this->supplier->getAll();
        return view('admin.products.form', compact('is_update', 'categories', 'data_item', 'suppliers'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'] ?? 0;
        $data_item = $this->model->getInfoById($id);
        if (empty($data_item))
            return redirect()->back()->withErrors('Không tìm thấy sản phẩm');
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'icon' => 'max:100',
                'description' => 'max:1000',
            ],
            [
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'name.max' => 'Tên sản phẩm không quá 255 ký tự',
                'icon.max' => 'Icon không quá 50 ký tự',
                'description.max' => 'Mô tả không quá 1000 ký tự',
            ]);
        $data = $request->all();
        $parameters = $this->model->getParameters($data);
        $data_item = $this->model->updateProduct($id, $parameters);
        if (!empty($data_item)) {
            Session::flash('success', 'Cập nhật sản phẩm thành công');
            return redirect()->back();
        }
        return redirect()->back()->withErrors('Cập nhật sản phẩm thất bại');
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $ids = $data['ids'] ?? [];
        foreach($ids as $id) {
            $this->model->softDelete($id);
        }
        return $this->Success('Xóa sản phẩm thành công');
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
