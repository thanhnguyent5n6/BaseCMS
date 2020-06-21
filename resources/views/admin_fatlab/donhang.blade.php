@extends('admin_fatlab.master.daodien')
@section('content')
<script type="text/javascript">
  $(document).ready(function(){
    $('#save_value').click(function(){
      var val = [];
      $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
      });
    });
  });
</script>
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      <header class="panel-heading">
                      Quản lý đơn hàng
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="form-group">
                            <a class="btn btn-info" onclick="changeStatus(0)">Đơn mới</a>
                            <a class="btn btn-primary" id="save_value" onclick="changeStatus(1)">Giao hàng</a>
                            <a class="btn btn-success" onclick="changeStatus(2)">Thành công</a>
                            <a class="btn btn-warning" onclick="changeStatus(3)">Trả về</a>
                            <a class="btn btn-danger" onclick="changeStatus(4)">Xóa đơn hàng</a>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>
                                    <input type="checkbox" class="check_all" name="check_all">
                                  </th>
                                  <th>Mã hóa đơn</th>
                                  <th>Tên người nhận</th>
                                  <th>Số điện thoại</th>
                                  <th>Tổng tiền</th>
                                  <th>Hình thức thanh toán</th>  
                                  <th>Ghi chú</th>  
                                  <th>Trạng thái</th>
                                  <th>Xem</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($bill as $b)
                              <form class="formBill">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" style="display: none;" name="checkStatus[]" value="{{ $b->status }}">
                              <tr class="">
                                  <td><input name="check_bill[]" id="ad_checkbox{{$b->id}}" type="checkbox" name="kiemtra" value="{{$b->id}}"></td>
                                  <td>{{ $b->id }}</td>
                                  <td>{{ $b->name }}</td>
                                  <td>{{ $b->phone_number }}</td>
                                  <td class="center">{{ number_format($b->total) }}</td>
                                  <td>{{ $b->payment }}</td>
                                  <td>{{ $b->note }}</td>
                                  @if($b->status == 0)
                                  <td><a class="btn btn-info">Đơn mới</a></td>
                                  @elseif($b->status == 1)
                                  <td><a class="btn btn-primary">Đang giao hàng</a></td>
                                  @elseif($b->status == 2)
                                  <td><a class="btn btn-success">Thành công</a></td>
                                  @elseif($b->status == 3)
                                  <td><a class="btn btn-warning">Trả về</a></td>
                                  @elseif($b->status == 4)
                                  <td><a class="btn btn-danger">Đã hủy</a></td>
                                  @endif
                                  <td><a class="delete" href="{{ route('chi-tiet-don-hang',$b->id) }}">Chi tiết</a></td>
                              </tr>
                              </form>
                              @endforeach
                              </tbody>
                          </table>
                          <div class="pull-right">
                              <ul class="pagination pagination-sm pro-page-list">
                                  <li>{{ $bill->links() }}</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
@endsection
