@extends('layouts.metronics.master')
@section('page_title')
    Quản lý thông tin Page
@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.setting.tenant') }}" class="text-muted">Quản lý thông tin Page</a>
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
                <h3 class="card-label">Quản lý thông tin Page</h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Button-->
                <a href="{{ route('admin.setting.edit_tenant') }}" class="btn btn-primary font-weight-bolder">
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
                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Logo</label>
                    <div class="col-10">
                        {{--<div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="color: white;">
                                   <i class="fa fa-picture-o"></i> Chọn ảnh đại diện:
                                 </a>
                               </span>
                            <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{ @$data_item->thumbnail }}">
                        </div>--}}
                        <div id="holder" style="margin-top:15px;max-height:100px;">
                            @if(isset($data_item->logo) && !empty($data_item->logo))
                                    <img src="{{ @$data_item->logo }}" alt="Logo page">
                            @else
                                (Chưa thiết lập)
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">SĐT tư vấn bán hàng:</label>
                    <div class="col-2">
                        <input type="text" class="form-control"
                               placeholder="" value="{{ $data_item->phone }}">
                    </div>
                    <label for="example-number-input" class="col-2 col-form-label">SĐT tư vấn bảo hành:</label>
                    <div class="col-2">
                        <input type="text" class="form-control"
                               placeholder="" value="{{ $data_item->hotline_1 }}">
                    </div>
                    <label for="example-number-input" class="col-2 col-form-label">SĐT tư vấn kỹ thuật:</label>
                    <div class="col-2">
                        <input type="text" class="form-control"
                               placeholder="" value="{{ $data_item->hotline_2 }}">
                    </div>
                </div>
            </div>
            <!--end: Datatable-->
        </div>
    </div>
@stop

@section('page_js')

@stop
