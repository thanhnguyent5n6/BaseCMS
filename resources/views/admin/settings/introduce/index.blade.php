@extends('layouts.metronics.master')
@section('page_title')
    Quản lý trang giới thiệu
@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.setting.introduce') }}" class="text-muted">Quản lý trang giới thiệu</a>
        </li>
    </ul>
@stop
@section('page_css')
    <style></style>
@stop
@section('page_content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Quản lý trang giới thiệu</h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Button-->
                <a href="{{ route('admin.setting.edit_introduce') }}" class="btn btn-primary font-weight-bolder">
                    <i class="fa fa-plus"></i>
                    </span>Chỉnh sửa</a>
            <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->

            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <div id="data-items">
                {!! @html_entity_decode(@$tenant_info->introduce) !!}
            </div>
            <!--end: Datatable-->
        </div>
    </div>
@stop

@section('page_js')

@stop
