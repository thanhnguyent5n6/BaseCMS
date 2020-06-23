<?php


namespace App\Http\Controllers\Portal;


use App\Bill;
use App\BillDetail;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        return view('page.dathang');
    }

    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');

        $code = "bill_".rand();

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->code = $code;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();


        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'] / $value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');

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