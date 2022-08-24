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
                <div class="col-xs-12 col-md-3 col-lg-3" style="padding-right: 0">
                    <div class="v2_bnc_cat_block_title hide">
                        <i class="fa fa-bars"></i>danh mục sản phẩm
                    </div>
                    <div class="v2_bnc_category_products">
                        <div class="v2_bnc_block_cate_body">
                            <ul class="v2_bnc_block_category_menu_block">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('portal.load_by_category', ['slug' => @$category['slug']]) }}" title="{{ @$category['name'] }}">
                                            {{--<img src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/08/1505293500_menu-bo-may-tinh-ban1.png?v=4"
                                                 class="img-responsive v2_bnc_bg_cate" alt="MÁY TÍNH game - văn phòng CŨ"/>--}}
                                            {!! @$category['icon'] !!}
                                            <span>{{ @$category['name'] }}</span>
                                        </a>
                                        @if(isset($category['child']) && count($category['child']) > 0)
                                            <ul>
                                                @foreach($category['child'] as $category_child)
                                                    <li class="col-md-4">
                                                        <a href="{{ route('portal.load_by_category', ['slug' => @$category_child['slug']]) }}"
                                                           title="{{ @$category_child['name'] }}">
                                                            <span>{{ @$category_child['name'] }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="padding-left: 0;">
                    <div class="slideshow_block_top">
                        <div class="owl_carousel_1_item">
                            @foreach($slides as $slide)
                                <img src="{{ asset($slide->image->url) }}"
                                     alt="{{ $slide->name }}" class="img-responsive">
                            @endforeach
                            {{--<img src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/slide/2018/05/05/04/56/1525495495_1505373912_artboard-1.jpg?v=4"
                                 alt="" class="img-responsive">
                            <img src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/slide/2018/05/05/04/56/1525495502_1505373945_artboard-2.jpg?v=4"
                                 alt="" class="img-responsive">
                            <img src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/slide/2018/05/05/04/56/1525495509_1505373952_artboard-3.jpg?v=4"
                                 alt="" class="img-responsive">
                            <img src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/slide/2018/05/05/04/55/1525495477_1505373965_artboard-4.jpg?v=4"
                                 alt="" class="img-responsive">
                            <img src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/slide/2018/12/09/03/53/1544369670_322.png?v=4"
                                 alt="" class="img-responsive">--}}
                        </div>
                        <div class="owl_carousel_1_item_btn">
                            <div class="owl_carousel_1_item_prev"><i class="fa fa-angle-left"></i></div>
                            <div class="owl_carousel_1_item_next"><i class="fa fa-angle-right"></i></div>
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
                        <section class="v2_bnc_home_catepr_main margin-top-40">
                            @foreach($categories as $category)
                                <div class="v2_bnc_home_catepr_inner">
                                    <div class="row">
                                        <div class="v2_bnc_home_catepr_top col-md-12 col-sm-12 col-xs-12">
                                            <div class="v2_bnc_home_catepr_left_inner">
                                                <div class="v2_bnc_home_catepr_title">
                                                    <h2 class="v2-home-catepr-title-inner"><a
                                                            href="{{ route('portal.load_by_category', ['slug' => @$category['slug']]) }}">{!! @$category['name'] !!}</a></h2>
                                                    @if(isset($category['child']) && count($category['child']) > 0)
                                                        @foreach($category['child'] as $category_child)
                                                            <ul class="v2_bnc_home_catepr_tabul nav-tabs">
                                                                <li>
                                                                    <a href="{{ route('portal.load_by_category', ['slug' => @$category_child['slug']]) }}" data-ajax="1"
                                                                       data-url="{{ route('portal.load_by_category',['slug' => @$category_child['slug']]) }}"
                                                                       data-id="292821" data-block="292820"
                                                                       class="active">{!! @$category_child['name'] !!}</a>
                                                                </li>
                                                            </ul>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="v2_bnc_home_catepr_main_cates">
                                            <div class="v2_bnc_home_catepr_right">
                                                <div class="tab-content">
                                                    <div class="v2_bnc_home_catepr_showul" id="product-content-292820">
                                                        @if(isset($products[$category['id']]) && count($products[$category['id']]) > 0)
                                                            @foreach($products[$category['id']] as $product)
                                                                @include('page.includes.product')
                                                            @endforeach
                                                        @endif
                                                        @if(isset($category['child']) && count($category['child']) > 0)
                                                            @foreach($category['child'] as $category_child)
                                                                @if(isset($products[$category_child['id']]) && count($products[$category_child['id']]) > 0)
                                                                    @foreach($products[$category_child['id']] as $product)
                                                                        @include('page.includes.product')
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                Likeproduct.init();
                                HomeProductCategory.init();
                            });
                        </script>
                        <div class="clearfix"></div>
                        <!-- Slide Products Brand -->
                        {{--<section class="v2_bnc_products_brands">
                            <div class="row">
                                <div class="owl-carousel-brands">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/09/1506513916_nvidia_416x416.jpg?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/20/1506514597_amd-2.png?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/08/1506513890_msi-logo.jpg?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/19/1506514558_oldintel.jpg?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/19/1506514538_dell_logo.png?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/11/1506514038_acer-logo-old.png?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/10/1506514013__original_logo__samsung_by_18cjoj-d73ybtj.png?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/21/1506514631_1024px-hp_logo_2012.svg.png?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/10/1506514000_sonydrups_1.jpg?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/09/1506513963_00001_small.jpg?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <figure class="v2_bnc_brands_img">
                                            <a href="/thuong-hieu-"><img
                                                    src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/27/12/09/1506513950_51p7eilgol._sl1001_.jpg?v=4"
                                                    alt="" class="img-responsive"/></a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </section>--}}
                        <!-- End Slide Products Brand -->
                        <div class="clearfix"></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
