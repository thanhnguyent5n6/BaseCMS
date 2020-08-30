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
                    <div class="beta-map">
                        <div class="abs-fullwidth beta-map wow flipInX">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.780975018501!2d105.74682151533226!3d21.041447992719945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455745f46be47%3A0x700da829d2b94dfd!2sMinh%20Th%C3%A0nh%20Audio!5e0!3m2!1svi!2s!4v1596355423248!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
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
