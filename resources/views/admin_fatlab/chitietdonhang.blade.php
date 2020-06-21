@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Thông tin đơn hàng
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="form-group">
                            <h4>Đơn đặt hàng: [{{ $bill->date_order }}]</h4>
                            <h5>Khách hàng: <span>{{ $bill->name }}</span></h5>
                            <h5>Email: <span>{{ $bill->email }}</span></h5>
                            <h5>Địa chỉ: <span>{{ $bill->address }}</span></h5>
                            <h5>Số điện thoại: <span>{{ $bill->phone_number }}</span></h5>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Sản phẩm</th>
                                  <th>Giá bán</th>
                                  <th>Số lượng</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($bill_detail as $rows)
                              <tr class="">
                                <td>{{ $rows->name }}</td>
                                @if($rows->promotion_price==0)
                                <td>{{ number_format($rows->unit_price) }}</td>
                                @else
                                <td>{{ number_format($rows->promotion_price) }}</td>
                                @endif
                                <td>{{ $rows->quantity }}</td>
                              </tr>
                              @endforeach
                              <tr>
                                <td colspan="3"><h3>Tổng tiền:&nbsp;<span>{{ number_format($bill->total) }}</span></h3></td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
@endsection