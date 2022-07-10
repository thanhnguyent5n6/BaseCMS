<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Bill();
    }

    public function index()
    {
        $data_items = $this->model->getAll(['customer','bill_details']);
        $data_items = $this->getDataItems($data_items);
        return view('admin.bills.index', compact('data_items'));
    }

    public function load()
    {
        $data_items = $this->model->getAll(['customer','bill_details']);
        $data_items = $this->getDataItems($data_items);
        return view('admin.bills.datatable', compact('data_items'));
    }

    public function detail($id)
    {
        $data_item = $this->model->getInfoById($id,['customer','bill_details']);
        return view('admin.bills.detail', compact('data_item'));
    }

    public function changeStatus(Request $request)
    {
        $data = $request->all();
        $ids = $data['ids'] ?? [];
        $status = $data['status'] ?? -1;

        if($status < 0)
            return $this->Error('Cập nhật trạng thái thất bại');

        foreach($ids as $id) {
            $this->model->updateByID($id,['status' => $status]);
        }
        return $this->Success('Cập nhật trạng thái thành công');
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $ids = $data['ids'] ?? [];
        foreach($ids as $id) {
            $this->model->softDelete($id);
        }
        return $this->Success('Xóa hóa đơn thành công');
    }

    /**
     * @param $bills
     * @param $parent_categories
     * @return mixed
     */
    private function getDataItems($bills)
    {
        $data_items = $bills->map(function ($bill, $key) {
            $data = new \stdClass();
            $data->id = $bill->id;
            $data->stt = $key + 1;
            $data->code = @$bill->code;
            $data->customer_name = @$bill->customer->name;
            $data->date_order = @$bill->date_order_display;
            $data->total = @number_format($bill->total)." đ";
            $data->payment = @$bill->payment;
            $data->note = @$bill->note;
            $data->status = @$bill->status;
            return $data;
        })->toJson();
        return $data_items;
    }
}
