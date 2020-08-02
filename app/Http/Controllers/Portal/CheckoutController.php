<?php


namespace App\Http\Controllers\Portal;

use App\Http\Controllers\BasePortalController;
use App\Http\Requests\CheckOutRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends BasePortalController
{
    private $bill;
    private $customer;
    public function __construct()
    {
        parent::__construct();
        $this->bill = new Bill();
        $this->customer = new Customer();
    }

    public function getCheckout()
    {
        return view('page.includes.checkout');
    }

    public function postCheckout(CheckoutRequest $request)
    {
        DB::beginTransaction();
        try {
            $cart = Session::get('cart');
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone_number = $request->phone;
            $customer->address = $request->address;
            $customer->note = $request->comment;
            $customer->save();

            $bill = new Bill;
            $bill->customer_id = $customer->id;
            $bill->code = $this->bill->getCodeUnique("bill");
            $bill->date_order = Carbon::now();
            $bill->total = $cart->totalPrice;
            $bill->payment = $request->payment_method;
            $bill->note = $request->notes;
            $bill->save();


            foreach ($cart->items as $key => $value) {
                $bill_detail = new BillDetail();
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->unit_price = ($value['price'] / $value['qty']);
                $bill_detail->save();

                $product = $this->product->getInfoById($value['item']->id);
                $this->product->updateByID($product->id,['selling' => $product->selling+1]);
            }
            Session::forget('cart');
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors('Tạo hóa đơn thất bại');
        }

        Session::flash('success', 'Tạo hóa đơn thành công');
        return redirect()->back();
    }

    private function getCode() {
        $code = "bill_".rand();
        $this->checkCodeUnique($code);
        if(!empty($code))
            $code = $this->getCode();

        return $code;
    }

    private function checkCodeUnique($code) {
        $bill = Bill::where('code',$code)->first();
        if(!empty($bill))
            return false;
        return true;
    }
}
