@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Danh sách danh mục
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="form-group row">
                                  <div class="col-xs-6"><a href="{{ route('them-danh-muc') }}"><button id="editable-sample_new" class="btn green">
                                      Thêm mới&nbsp;<i class="fa fa-plus"></i>
                                  </button></a></div>
                                  <div class="col-xs-6">
                                    <div class="clearfix">
                                      <form class="form form-group" action="{{ route('tim-kiem-sp') }}" method="get">
                                        <input hidden="hidden" type="text" name="_token" value="{{ csrf_token() }}">
                                      <div class="col-xs-5">
                                        <label for="tim" class="pull-right">Tìm kiếm kho:</label>
                                      </div>
                                      <div class="col-xs-5">
                                        <input type="text" name="key" id="tim" class="form-control">
                                      </div>
                                      <div class="col-xs-2">
                                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                      </div>
                                    </form>
                                    </div>
                                    
                                  </div>
                              </div>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Tên danh mục</th>
                                  <th>Mô tả</th>                              
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($category as $c)
                              <tr class="">
                                  <td>{{ $c->name }}</td>
                                  <td>{{ $c->description }}</td>
                                  <td><a class="edit" href="{{ route('sua-danh-muc',$c->id) }}">Edit</a></td>
                                  <td><a class="delete" href="{{ route('xoa-danh-muc',$c->id) }}">Delete</a></td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
@endsection