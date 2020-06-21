@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Thông tin danh mục
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                        <div class="clearfix">
                          <form action="{{ route('sua-danh-muc',$cat->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
                            <input hidden="hidden" type="text" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group col-md-4">
                              <label class="col-md-3" for="ma">Mã danh mục:</label>
                              <div class="col-md-9">
                                <input type="ma" class="form-control" id="ma" disabled="disabled" value="{{ isset($cat->id)?$cat->id:'' }}">
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="col-md-3" for="ten">Tên danh mục:</label>
                              <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="ten" value="{{ isset($cat->name)?$cat->name:'' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="description">Mô tả:</label>
                              <textarea id="description" name="description">{{ isset($cat->description)?$cat->description:'' }}</textarea>
                                <script type="text/javascript">
                                  CKEDITOR.replace('description');    
                                </script>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="form-group col-md-1" style="margin-top: 50px;">
                              <input type="submit"  class="btn btn-primary" value="Đồng ý">
                            </div>
                            <div class="form-group col-md-1" style="margin-top: 50px;">
                              <input type="reset" class="btn btn-danger" value="làm trống">
                            </div>
                            <div style="clear: both;"></div>
                          </form>
                        </div>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
@endsection