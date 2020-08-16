@extends('layouts.portal.master')
@section('page_title')
    {{ @$tenant_info->name }}
@endsection
@section('page_content')
    <!--Like Product-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/portal/likeproduct.css') }}"/>
    <script src="{{ asset('/portal/likeproduct.js') }}"></script>
    <!--Like Product-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/portal/toastr.css') }}"/>
    <script src="{{ asset('/portal/toastr.js') }}"></script>
    <script src="{{ asset('/portal/homeProductCategory.js') }}"></script>

    <div class="v2_bnc_content_top">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding-top: 15px;">
                    {!! @html_entity_decode($tenant_info->introduce) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="v2_bnc_body_main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"> <!--temp block/block_center_category_custom-->
                    <div class="clearfix"></div>
                    <!--temp block/block_center_category_custom_slide-->
                    <div class="clearfix"></div>

                    <div class="v2_bnc_home">
                        <!-- Products Categories -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
