@extends('layouts.metronics.master')
@section('page_title')
    @if($is_update) Cập nhật sản phẩm @else Thêm mới sản phẩm @endif

@stop
@section('bread_crumb')
    <span class="kt-subheader__separator kt-hidden"></span>
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.categories.index') }}" class="kt-subheader__breadcrumbs-link">
            Sản phẩm </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
            @if($is_update) Cập nhật @else Thêm mới @endif </a>
    </div>
@stop
@section('page_css')
    <style></style>
@stop
@section('page_content')
    <div class="row">
        <div class="col-md-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            @if($is_update) Cập nhật @else Thêm mới @endif
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form method="POST" @if($is_update) action="{{ route('admin.categories.update') }}" @else action="{{ route('admin.categories.store') }}" @endif
                      class="kt-form kt-form--label-right">
                    {!! csrf_field() !!}
                    @if($is_update)
                        <input type="hidden" name="id" value="{{ @$data_item->id }}">
                    @endif

                    <div class="kt-portlet__body">

                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Tên sản phẩm:</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" value="{{ @$data_item->name }}" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-number-input" class="col-2 col-form-label">Ảnh đại diện</label>
                            <div class="col-10">
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="color: white;">
                                       <i class="fa fa-picture-o"></i> Chọn ảnh đại diện:
                                     </a>
                                   </span>
                                    <input id="thumbnail" class="form-control" type="text" name="filepath">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Mô tả:</label>
                            <div class="col-10">
                                <textarea class="form-control" name="description">{!! @$data_item->description_display !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Nội dung:</label>
                            <div class="col-10">
                                <textarea class="form-control" id="content" name="content">{!! @$data_item->content_display !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Danh mục:</label>
                            <div class="col-10">
                                <select name="category_id" class="form-control select2">
                                    @if(isset($categories) && count($categories) > 0)
                                        @foreach($categories as $category)
                                            <option @if($is_update && isset($data_item->parent_id) && $data_item->parent_id == $category->id) selected @endif
                                                    value="{{ @$category->id }}">{{ @$category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Nhà cung cấp:</label>
                            <div class="col-10">
                                <select name="supplier_id" class="form-control select2">
                                    <option value="0">-- Không chọn</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Giá niêm yết:</label>
                            <div class="col-2">
                                <div class="input-group">
                                    <input type="text" min="0" class="form-control validate-input-money" placeholder="Giá..." value="{{ @number_format(@$data_item->price) }}">
                                    <input type="number" min="0" class="value-input-money" name="price" value="{{ @$data_item->price }}" hidden>
                                    <label style="margin-left: 10px;" for="example-url-input" class="col-form-label">vnđ</label>
                                </div>
                            </div>

                            <label for="example-url-input" class="col-2 col-form-label">Khuyến mãi:</label>
                            <div class="col-2">
                                <div class="input-group">
                                    <input type="text" min="0" class="form-control validate-input-sales" placeholder="%..." value="{{ @number_format(@$data_item->price) }}">
                                    <input type="number" min="0" max="100" class="value-input-sales" name="sales" value="{{ @$data_item->price }}" hidden>
                                    <label style="margin-left: 10px;" for="example-url-input" class="col-form-label">%</label>
                                </div>
                            </div>

                            <label for="example-url-input" class="col-2 col-form-label">Đơn vị:</label>
                            <div class="col-2">
                                <div class="input-group">
                                    <input placeholder="Nhập đơn vị..." class="form-control" type="text" value="{{ @$data_item->unit }}" name="unit">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
@stop

@section('page_js')
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        Product = {
            _inputValidateMoney: ".validate-input-money",
            _inputValueMoney: ".value-input-money",

            _inputValidateSales: ".validate-input-sales",
            _inputValueSales: ".value-input-sales",

            validateInputMoney: function () {
                Validate.validate_number(Product._inputValidateMoney);
                Validate.init_input_format_number($(Product._inputValidateMoney), $(Product._inputValueMoney));

                Validate.validate_number(Product._inputValidateSales);
                Validate.init_input_format_number($(Product._inputValidateSales), $(Product._inputValueSales));
            },
        }

        initCkeditor('content');

        $(document).ready(function() {
            Product.validateInputMoney();
            $('#lfm').filemanager('image');
        });
    </script>
@stop
