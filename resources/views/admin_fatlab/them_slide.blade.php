@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Thông tin slide
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                        <div class="clearfix">
                          <form action="{{ route('them-slide') }}" method="post" class="form-inline" enctype="multipart/form-data">
                            <input hidden="hidden" type="text" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group col-md-4">
                              <label class="col-md-3" for="ma">Mã slide:</label>
                              <div class="col-md-9">
                                <input type="ma" class="form-control" id="ma" disabled="disabled">
                              </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div style="margin-bottom: 30px;"></div>
                            
                            <div class="form-group col-md-4" style="margin-top: 50px;">
                              <label class="col-md-3" for="ma">Ảnh:</label>
                              <div class="col-md-9">
                                <label class="btn btn-default btn-file">
                                    Tìm ảnh<input type="file" name="img" style="display: none;">
                                </label>
                              </div>
                            </div>
                            <div style="clear: both;"></div>
                            <hr>
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