@extends('layouts.metronics.master')
@section('page_title')
    Cập nhật quản lý thông tin Page
@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.setting.tenant') }}" class="text-muted">Quản lý thông tin Page</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:;" class="text-muted"><a href="javascript:;" class="kt-subheader__breadcrumbs-link">
                        Cập nhật </a></a>
            </li>
        </ul>
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
                <h3 class="card-label">Cập nhật quản lý thông tin Page</h3>
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.setting.update_tenant') }}"
              class="kt-form kt-form--label-right">
            <div class="card-body">
                {!! csrf_field() !!}

                <div class="kt-portlet__body">

                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">SĐT tư vấn bán hàng:</label>
                        <div class="col-2">
                            <input type="text" class="form-control" name="phone"
                                   placeholder="" value="{{ $data_item->phone }}">
                        </div>
                        <label for="example-number-input" class="col-2 col-form-label">SĐT tư vấn bảo hành:</label>
                        <div class="col-2">
                            <input type="text" class="form-control" name="hotline_1"
                                   placeholder="" value="{{ $data_item->hotline_1 }}">
                        </div>
                        <label for="example-number-input" class="col-2 col-form-label">SĐT tư vấn kỹ thuật:</label>
                        <div class="col-2">
                            <input type="text" class="form-control" name="hotline_2"
                                   placeholder="" value="{{ $data_item->hotline_2 }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">Ảnh đại diện</label>
                        <div class="col-10">
                            <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary" style="color: white;">
                                   <i class="fa fa-picture-o"></i> Chọn ảnh đại diện:
                                 </a>
                               </span>
                                <input id="logo" class="form-control" type="text" name="logo" value="{{ @$data_item->logo }}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;">
                                @if(isset($data_item->logo) && !empty($data_item->logo))
                                    <img src="{{ asset($data_item->logo) }}" alt="Ảnh đại diện" >
                                @endif
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
                                <a href="{{ route('admin.setting.tenant') }}" class="btn btn-secondary">Quay lại</a>
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

    <script>
        $(document).ready(function () {
            $('#lfm').filemanager('image');
        });
    </script>
@stop
