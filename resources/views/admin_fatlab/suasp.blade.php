@extends('admin_fatlab.master.daodien')
@section('content')
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Thông tin sản phẩm
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                        <div class="clearfix">
                          <form action="{{ route('sua-sp',$product->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
                            <input hidden="hidden" type="text" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group col-md-4">
                              <label class="col-md-3" for="ma">Mã sản phẩm:</label>
                              <div class="col-md-9">
                                <input type="ma" class="form-control" id="ma" disabled="disabled" value="{{ isset($product->id)?$product->id:'' }}">
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="col-md-3" for="ten">Tên sản phẩm:</label>
                              <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="ten" value="{{ isset($product->name)?$product->name:'' }}">
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="col-md-4" for="sel1">Danh mục:</label>
                              <select class="form-control col-md-8" name="category" id="sel1">
                                @foreach($type as $t)
                                <option value="{{ $t->id }}" @if($t->id==$product->id_type) {{ 'selected' }} @endif>{{ isset($t->name)?$t->name:'' }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="form-group col-md-4" style="margin-top: 30px;">
                              <label class="col-md-3" for="ma">Giá gốc:</label>
                              <div class="col-md-9">
                                <input type="number" name="unit_price" class="form-control" id="ma" value="{{ isset($product->unit_price)?$product->unit_price:'' }}">
                              </div>
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 30px;">
                              <label class="col-md-3" for="ma">Giá khuyễn mãi:</label>
                              <div class="col-md-9">
                                <input type="number" name="promotion_price" class="form-control" id="ma" value="{{ isset($product->promotion_price)?$product->promotion_price:'' }}">
                              </div>
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 30px;">
                              <label class="col-md-4">Sản phẩm mới</label>&nbsp;&nbsp;<input name="new" type="checkbox" @if(isset($product->new)&&$product->new==1) checked @endif name="new" id="new"> <label for="new"></label>
                            </div>
                            <div class="form-group">
                              <label for="description">Mô tả:</label>
                              <textarea id="description" name="description"></textarea>
                                <script type="text/javascript">
                                  CKEDITOR.replace('description');    
                                </script>
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 50px;">
                              <label class="col-md-3" for="ma">Ảnh:</label>
                              <div class="col-md-9">
                                <label class="btn btn-default btn-file">
                                    Tìm ảnh<input type="file" name="img" style="display: none;">
                                </label>
                              </div>
                            </div>
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