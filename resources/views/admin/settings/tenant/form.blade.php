@extends('layouts.metronics.master')
@section('page_title')
    Cập nhật trang giới thiệu
@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.setting.introduce') }}" class="text-muted">Quản lý trang giới thiệu</a>
        </li>
        <li class="breadcrumb-item">
            <a href="javascript:;" class="text-muted"><a href="javascript:;" class="kt-subheader__breadcrumbs-link">
                    Cập nhật </a></a>
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
                <h3 class="card-label">Cập nhật </h3>
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.setting.update_introduce') }}"
              class="kt-form kt-form--label-right">
            <div class="card-body">
                {!! csrf_field() !!}

                <div class="kt-portlet__body">

                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Thông tin:</label>
                        <div class="col-10">
                            <textarea class="form-control" id="introduce"
                                      name="introduce">{!! @$tenant_info->introduce !!}</textarea>
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
                                <a href="{{ route('admin.setting.introduce') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('page_js')
    <script>
        initCkeditor('introduce');
    </script>
@stop
