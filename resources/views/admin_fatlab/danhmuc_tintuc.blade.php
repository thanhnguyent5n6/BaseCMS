@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Quản lý danh mục tin tức - bài viết
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
                                  <th>Loại danh mục</th>
                                  <th>Edit</th>  
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                               
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