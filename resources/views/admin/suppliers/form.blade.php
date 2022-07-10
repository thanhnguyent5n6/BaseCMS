@extends('layouts.metronics.master')
@section('page_title')
    @if($is_update) Cập nhật nhà cung cấp @else Thêm mới nhà cung cấp @endif

@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.supplier.index') }}" class="text-muted">Nhà cung cấp</a>
        </li>
        <li class="breadcrumb-item">
            <a href="javascript:;" class="text-muted">@if($is_update) Cập nhật @else Thêm mới @endif</a>
        </li>
    </ul>
@stop
@section('page_css')
    <style></style>
@stop
@section('page_content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">@if($is_update) Cập nhật @else Thêm mới @endif</h3>
            <div class="card-toolbar">
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" @if($is_update) action="{{ route('admin.supplier.update') }}" @else action="{{ route('admin.supplier.store') }}" @endif
        class="kt-form kt-form--label-right">
            <div class="card-body">
                {!! csrf_field() !!}
                @if($is_update)
                    <input type="hidden" name="id" value="{{ @$data_item->id }}">
                @endif
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Tên nhà cung cấp</label>
                        <div class="col-10">
                            <input required class="form-control" type="text" value="{{ @$data_item->name }}" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">Thứ tự hiển thị</label>
                        <div class="col-10">
                            <input min="0" required class="form-control" type="number" value="{{ isset($priority) ? $priority : 1 }}" name="priority">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">Kích hoạt</label>
                        <div class="col-10">
                            <label class="kt-checkbox kt-checkbox--success">
                                <input value="1" name="status" @if(isset($data_item) && $data_item->status == NO_ACTIVE) @else checked @endif type="checkbox">
                                <span></span>
                            </label>
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
                                <a href="{{ route('admin.supplier.index') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@stop

@section('page_js')
    <script>

    </script>
@stop
