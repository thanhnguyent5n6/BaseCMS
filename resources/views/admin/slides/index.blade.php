@extends('layouts.metronics.master')
@section('page_title')
    Slide
@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.slide.index') }}" class="text-muted">Slide</a>
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
                <h3 class="card-label">Quản lý Slide</h3>
            </div>
            <div class="card-toolbar">
                <a style="margin-right: 5px;" id="btn_delete_record" href="javascript:;" class="btn btn-danger btn-icon-sm">
                    <i class="la la-trash"></i> Xóa
                </a>
                <!--begin::Button-->
                <a href="{{ route('admin.slide.create') }}" class="btn btn-primary font-weight-bolder">
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
    @include('admin.slides.script')
@stop
