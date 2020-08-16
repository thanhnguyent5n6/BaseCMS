@extends('layouts.metronics.master')
@section('page_title')
    @if($is_update) Cập nhật danh mục sản phẩm @else Thêm mới danh mục sản phẩm @endif

@stop
@section('bread_crumb')
    <span class="kt-subheader__separator kt-hidden"></span>
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.categories.index') }}" class="kt-subheader__breadcrumbs-link">
            Danh mục sản phẩm </a>
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
                            <label for="example-search-input" class="col-2 col-form-label">Tên danh mục</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" value="{{ @$data_item->name }}" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Danh mục cha</label>
                            <div class="col-10">
                                <select name="parent_id" class="form-control select2">
                                    <option value="0">-- Không chọn</option>
                                    @if(isset($parent_categories) && count($parent_categories) > 0)
                                        @foreach($parent_categories as $category)
                                            <option @if($is_update && isset($data_item->parent_id) && $data_item->parent_id == $category->id) selected @endif
                                                    value="{{ @$category->id }}">{{ @$category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Icon</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{ @$data_item->icon }}" name="icon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-2 col-form-label">Mô tả</label>
                            <div class="col-10">
                                <textarea class="form-control" name="description">{!! @$data_item->description_display !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-2 col-form-label">Thứ tự hiển thị</label>
                            <div class="col-10">
                                <input min="0" required class="form-control" type="number" value="{{ isset($priority) ? $priority : 0 }}" name="priority">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-2 col-form-label">Trạng thái</label>
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
    <script>

    </script>
@stop
