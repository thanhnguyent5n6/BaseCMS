@extends('layouts.metronics.master')
@section('page_title')
    Chi tiết đơn đặt hàng
@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.bill.index') }}" class="text-muted">Quản lý đơn hàng</a>
        </li>
        <li class="breadcrumb-item">
            <a href="javascript:;" class="text-muted">Chi tiết đơn đặt hàng</a>
        </li>
    </ul>
@stop
@section('page_css')
    <style></style>
@stop
@section('page_content')
    <div class="row">
        <div class="col-md-6" style="height: 525px;">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Thông tin hóa đơn</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <!--begin::Form-->
                <div class="card-body" style="height: 430px;">
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Mã hóa đơn:</label>
                            <div class="col-10">
                                {{ @$data_item->code }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Ngày đặt hàng:</label>
                            <div class="col-10">
                                {{ @$data_item->date_order_display }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Tổng tiền:</label>
                            <div class="col-10">
                                {!! number_format(@$data_item->total)." đ" !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Hình thức thanh toán:</label>
                            <div class="col-10">
                                {!! @$data_item->payment !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Trạng thái: </label>
                            <div class="col-10">
                                {!! @$data_item->status_display !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Form-->
            </div>
        </div>
        <div class="col-md-6" style="height: 525px;">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Thông tin người đặt hàng</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <!--begin::Form-->
                <div class="card-body" style="height: 430px;">
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Họ và tên:</label>
                            <div class="col-10">
                                {{ @$data_item->customer->name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Email:</label>
                            <div class="col-10">
                                {{ @$data_item->customer->email }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Số điện thoại:</label>
                            <div class="col-10">
                                {{ @$data_item->customer->phone_number }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Địa chỉ:</label>
                            <div class="col-10">
                                {{ @$data_item->customer->address }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Ghi chú: </label>
                            <div class="col-10">
                                {!! @$data_item->note !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Form-->
            </div>
        </div>
    </div>

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">Danh sách vật phẩm</h3>
            <div class="card-toolbar">
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            <div class="kt-portlet__body">
                @foreach($data_item->bill_details as $bill_detail)
                <div class="form-group row" style="margin-top: 15px;">
                    <label for="example-url-input" class="col-2 col-form-label">Vật phẩm:</label>
                    <div class="col-10">
                        {{ @$bill_detail->product->name }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Số lượng x Giá:</label>
                    <div class="col-10">
                        {{ @$bill_detail->quantity }} x {{ @number_format(@$bill_detail->unit_price)." đ" }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Tổng giá:</label>
                    <div class="col-10">
                        {{ @number_format($bill_detail->quantity * $bill_detail->unit_price)." đ" }}
                    </div>
                </div>
                <div class="separator separator-solid separator-border-4"></div>
                @endforeach
            </div>
        </div>
        <!--end::Form-->
    </div>
@stop

@section('page_js')
    <script>

    </script>
@stop
