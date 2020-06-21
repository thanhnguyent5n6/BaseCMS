@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Quản lý thành viên
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Họ tên</th>
                                  <th>Email</th>
                                  <th>Địa chỉ</th>
                                  <th>Số điện thoại</th>
                                  <th>Edit</th>  
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @foreach($user as $u)
                                  <tr>
                                    <td>{{ $u->full_name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->address }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td><a href="">Sửa</a></td>
                                    <td><a href="">Xóa</a></td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                          <div class="pull-right">
                              <ul class="pagination pagination-sm pro-page-list">
                              </ul>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
@endsection