@extends('layouts.metronics.master')
@section('page_title')
    Danh mục sản phẩm
@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.categories.index') }}" class="text-muted">Danh mục sản phẩm</a>
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
                <h3 class="card-label">Quản lý danh mục sản phẩm</h3>
            </div>
            <div class="card-toolbar">
                <a style="margin-right: 5px;" id="btn_delete_record" href="javascript:;" class="btn btn-danger btn-icon-sm">
                    <i class="la la-trash"></i> Xóa
                </a>
                <!--begin::Button-->
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary font-weight-bolder">
                    <i class="fa fa-plus"></i>
                    </span>Thêm mới</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm..." id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Danh mục cha:</label>
                                    <select class="form-control bootstrap-select" id="kt_form_parent_id">
                                        <option value="">-- Tất cả</option>
                                        @foreach($parent_categories as $category)
                                            <option value="{!! @$category->name !!}">{!! @$category->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <div class="kt-datatable" id="local_data"></div>
            <!--end: Datatable-->
        </div>
    </div>
@stop

@section('page_js')
    @include('admin.categories.script')
@stop
