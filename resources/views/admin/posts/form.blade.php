@extends('layouts.metronics.master')
@section('page_title')
    @if($is_update) Cập nhật bài viết @else Thêm mới bài viết @endif

@stop
@section('bread_crumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.posts.index') }}" class="text-muted">Quản lý bài viết</a>
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
        <form method="POST" @if($is_update) action="{{ route('admin.posts.update') }}"
              @else action="{{ route('admin.posts.store') }}" @endif
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
                        <label for="example-search-input" class="col-2 col-form-label">Tiêu đề bài viết:</label>
                        <div class="col-10">
                            <input required class="form-control" type="text" value="{{ @$data_item->title }}"
                                   name="title">
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
                        <label for="example-number-input" class="col-2 col-form-label">Kích hoạt</label>
                        <div class="col-2">
                            <label class="kt-checkbox kt-checkbox--success" style="padding-top: 10px;">
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
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
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
        initCkeditor('content');
        $(document).ready(function () {
            $('#lfm').filemanager('image');
        });
    </script>
@stop
