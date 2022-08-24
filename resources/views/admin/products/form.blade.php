@extends('layouts.metronics.master')
@section('page_title')
    @if($is_update) Cập nhật sản phẩm @else Thêm mới sản phẩm @endif

@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.products.index') }}" class="text-muted">Quản lý sản phẩm</a>
        </li>
        <li class="breadcrumb-item">
            <a href="javascript:;" class="text-muted"><a href="javascript:;" class="kt-subheader__breadcrumbs-link">
                    @if($is_update) Cập nhật @else Thêm mới @endif </a></a>
        </li>
    </ul>
@stop
@section('page_css')
    <style>
        .kt-avatar__holder img {
            width: 100% !important;
            height: 100% !important;
        }
        .col-form-label{
            text-align: right !important;
        }
        #holder img {
            max-height: 100px !important;
        }
    </style>
@stop
@section('page_content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">@if($is_update) Cập nhật @else Thêm mới @endif</h3>
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" @if($is_update) action="{{ route('admin.products.update') }}"
              @else action="{{ route('admin.products.store') }}" @endif
              class="kt-form kt-form--label-right">
            <div class="card-body">
                {!! csrf_field() !!}
                @if($is_update)
                    <input type="hidden" name="id" value="{{ @$data_item->id }}">
                @endif

                <div class="kt-portlet__body">

                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">Ảnh đại diện</label>
                        <div class="col-10">
                            <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="color: white;">
                                   <i class="fa fa-picture-o"></i> Chọn ảnh đại diện:
                                 </a>
                               </span>
                                <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{ @$data_item->thumbnail }}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;">
                                @if(isset($data_item->thumbnail) && !empty($data_item->thumbnail))
                                    <img src="{{ @$data_item->thumbnail }}" alt="Ảnh đại diện">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Tên sản phẩm:</label>
                        <div class="col-10">
                            <input required class="form-control" type="text" value="{{ @$data_item->name }}"
                                   name="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Mô tả:</label>
                        <div class="col-10">
                            <textarea class="form-control"
                                      name="description">{!! @$data_item->description_display !!}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Nội dung:</label>
                        <div class="col-10">
                            <textarea class="form-control" id="content"
                                      name="content">{!! @$data_item->content_display !!}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Danh mục:</label>
                        <div class="col-10">
                            <select name="category_id" class="form-control select2">
                                @if(isset($categories) && count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option
                                            @if($is_update && isset($data_item->category_id) && $data_item->category_id == $category->id) selected
                                            @endif
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
                                @foreach($suppliers as $supplier)
                                    <option value="{{ @$supplier->id }}"
                                        @if($is_update && isset($data_item->supplier_id) && $data_item->supplier_id == $supplier->id) selected
                                        @endif>{{ @$supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Chế độ bảo hành:</label>
                        <div class="col-10">
                            <input required class="form-control" type="text" value="{{ @$data_item->warranty_policy }}"
                                   name="warranty_policy">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Giá niêm yết:</label>
                        <div class="col-2">
                            <div class="input-group">
                                <input type="text" min="0" class="form-control validate-input-money"
                                       placeholder="Giá..." value="{{ @number_format(@$data_item->price) }}">
                                <input type="number" min="0" class="value-input-money" name="price"
                                       value="{{ @$data_item->price }}" hidden>
                                <label style="margin-left: 10px;" for="example-url-input"
                                       class="col-form-label">vnđ</label>
                            </div>
                        </div>

                        <label for="example-url-input" class="col-2 col-form-label">Khuyến mãi:</label>
                        <div class="col-2">
                            <div class="input-group">
                                <input type="text" min="0" class="form-control validate-input-sales"
                                       placeholder="%..." value="{{ @number_format(@$data_item->sales) }}">
                                <input type="number" min="0" max="100" class="value-input-sales" name="sales"
                                       value="{{ @$data_item->sales }}" hidden>
                                <label style="margin-left: 10px;" for="example-url-input"
                                       class="col-form-label">%</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        {{--<label for="example-url-input" class="col-2 col-form-label">Đơn vị:</label>
                        <div class="col-2">
                            <div class="input-group">
                                <input placeholder="Nhập đơn vị..." class="form-control" type="text"
                                       value="{{ @$data_item->unit }}" name="unit">
                            </div>
                        </div>--}}

                        <label for="example-url-input" class="col-2 col-form-label">Tình trạng:</label>
                        <div class="col-2">
                            <div class="input-group">
                                <select name="is_new" class="form-control select2">
                                    @foreach(\App\Libs\CommonLib::productStatus() as $productStatus => $statusDisplay)
                                        <option
                                                @if($is_update && isset($data_item->is_new) && $data_item->is_new == $productStatus) selected
                                                @endif
                                                value="{{ $productStatus }}">{{ $statusDisplay }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <label for="example-number-input" class="col-2 col-form-label">Kích hoạt</label>
                        <div class="col-2">
                            <label class="kt-checkbox kt-checkbox--success" style="padding-top: 10px;">
                                <input value="1" name="status" @if(isset($data_item) && $data_item->status == NO_ACTIVE) @else checked @endif type="checkbox">
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Ảnh sản phẩm:</label>
                        <div class="col-10">
                            <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                    <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
                                </div>
                            </div>

                            <div id="input-file-name" style="margin-top: 30px;">
                                @if($is_update && isset($data_item->product_image) && count($data_item->product_image) > 0)
                                    @foreach($data_item->product_image as $product_image)
                                        <div class="old-img">
                                            <div class="image-input image-input-outline">
                                                <div class="image-input-wrapper" style="background-image: url('{{ asset(@$product_image->image->url) }}')"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow btn-delete-old-img" data-action="change" data-toggle="tooltip" title="" data-original-title="Xóa ảnh">
                                                    <i class="fa fa-times"></i>
                                                </label>

                                            </div>
                                            <span class="form-text text-muted">{{ @$product_image->image->name }}</span>
                                            <input type="hidden" value="{{ @$product_image->image_id }}" name="image_id[]">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- End --}}
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('page_js')

    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <!--begin::Page Scripts(used by this page)-->
    @include('admin.products.script_file_upload')
    <!--end::Page Scripts-->
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

        $(document).ready(function () {
            Product.validateInputMoney();
            $('#lfm').filemanager('image');

            $(".btn-delete-old-img").on('click', function() {
                $(this).parents('.old-img').remove();
            });
        });
    </script>
@stop
