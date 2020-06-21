
<style type="text/css">
  .sel_category {
    margin-left: 15px;
  }
</style>
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Danh sách sản phẩm 
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="form-group row">
                                  <div class="col-xs-1"><a href="{{ route('them-sp') }}">
                                    <button id="editable-sample_new" class="btn green">
                                      Thêm mới&nbsp;<i class="fa fa-plus"></i>
                                    </button></a>
                                    
                                  </div>
                                  <div class="col-xs-2">
                                    
                                    <select class="form-control sel_category">
                                      @foreach($prod_type as $rows => $item)
                                        <option value="{{ $item->id }}" <?php if($id == $item->id){ echo "selected"; } ?> >{{ $item->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-xs-3"></div>
                                  <div class="col-xs-6">
                                    <div class="clearfix">
                                      <form class="form form-group" action="{{ route('tim-kiem-sp') }}" method="get">
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
                                  <th>Ảnh</th>
                                  <th>Tên sản phẩm</th>
                                  <th>Danh mục</th>
                                  <th>Giá gốc</th>
                                  <th>Giá khuyễn mãi</th>                                  
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($prod as $p)
                              <?php 
                                $type = DB::table('type_products')->where('id',$p->id_type)->first();
                               ?>
                              <tr class="">
                                  <td><img style="height: 100px" src="source/image/product/{{ $p->image }}"></td>
                                  <td>{{ $p->name }}</td>
                                  <td>{{ $type->name }}</td>
                                  <td>{{ number_format($p->unit_price) }}</td>
                                  <td class="center">{{ number_format($p->promotion_price) }}</td>
                                  <td><a class="edit" href="{{ route('sua-sp',$p->id) }}">Edit</a></td>
                                  <td><a class="delete" onclick="checkDelete( {!! $p->id !!} )" style="cursor: pointer;">Delete</a></td>
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


      <script type="text/javascript">
        $('.sel_category').change(function(){
          var id = $(this).val();
          $( "#main-content" ).load( "admin/product/"+id );
        });

      </script>
