@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Quản lý slide
                  </header>
                  <div class="panel-body">
                    <div class="form-group">
                      <a href="{{ route('them-slide') }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                      <div class="adv-table editable-table ">
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Ảnh</th>
                                  <th>ID</th>
                                  <th>Image</th>
                                  <th>Edit</th>  
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @foreach($slide as $s)
                                  <tr>
                                    <td width="200px" height="100px"><img width="100%" height="100%" src="source/image/slide/{{ $s->image }}"></td>
                                    <td>{{ $s->id }}</td>
                                    <td>{{ $s->image }}</td>
                                    <td><a href="{{route('sua-slide',$s->id)}}">Sửa</a></td>
                                    <td><a href="{{ route('xoa-slide',$s->id) }}">Xóa</a></td>
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