@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Quản lý tin tức - bài viết
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                        <div class="form-group">
                          <a href="{{route('them-tin-tuc')}}" class="btn btn-primary">Thêm mới</a>
                        </div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Ảnh</th>
                                  <th>Tiêu đề</th>
                                  <th>Nội dung</th>
                                  <th>Edit</th>  
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($arr as $rows)
                              <tr class="">
                                  <td style="width: 100px;height: 100px"><img height="100%" width="100%" src="source/image/news/{{ $rows->image }}"></td>
                                  <td>{{ $rows->title }}</td>
                                  <td class="center">{{ $rows->content }}</td>
                                  <td><a class="edit" href="{{ route('sua-tin-tuc',$rows->id) }}">Sửa</a></td>
                                  <td><a class="delete" href="{{ route('xoa-bai-viet',$rows->id) }}">Xóa</a></td>

                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <div class="pull-right">
                              <ul class="pagination pagination-sm pro-page-list">
                                  <li>{{ $arr->links() }}</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
@endsection