@extends('layouts.portal.master')
@section('page_title')
    Góc tư vấn
@endsection
@section('page_style')
    <style>
        .owl-carousel .owl-item {
            float: none !important;
            display: inline !important;
        }
    </style>
@endsection
@section('page_content')
    <!--Like Product-->
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/likeproduct.css') }}">
    <script src="{{ asset('portal/likeproduct.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('portal/toastr.css') }}">
    <script src="{{ asset('portal/toastr.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('portal/rater.css') }}">
    <script src="{{ asset('portal/productrater.js') }}"></script>
    <section id="products-main" class="v2_bnc_products_page">
        <!-- Breadcrumbs -->
        <div class="clearfix"></div>
        <div class="v2_breadcrumb_main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('portal.index') }}">Trang chủ</a></li>
                    {{--                    <li><a href="https://giahung.vn/trang-san-pham.html">Sản Phẩm</a></li>--}}
                    <li><a href="javascript:;">Góc tư vấn</a></li>
                </ul>
            </div>
        </div>
        <!-- End Breadcrumbs -->
        <div class="container margin-top-30">
            <div class="row">
                <div class="v2_bnc_product_page_right">
                    <div class="item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <link rel="stylesheet" href="{{ asset('portal/ion.rangeSlider.css') }}">
                            <link rel="stylesheet" href="{{ asset('portal/ion.rangeSlider.skinFlat.css') }}">
                            <script src="{{ asset('portal/ion.rangeSlider.js') }}" type="text/javascript"></script>



                            <script type="text/javascript" src="{{ asset('portal/productSearch.js') }}"></script>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    ProductSearch.init();
                                });
                            </script>
                            <div class="v2_bnc_category_products v2_bnc_aside_block">
                                <div class="v2_bnc_block_title"><h2>Danh mục sản phẩm</h2></div>
                                <div class="v2_bnc_block_cate_body">
                                    <ul class="v2_bnc_block_category_menu_block">
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{ route('portal.load_by_category', ['slug' => @$category['slug']]) }}"
                                                   title="{{ @$category['name'] }}">
                                                    <span>{{ @$category['name'] }}</span>
                                                </a>
                                                @if(isset($category['child']) && count($category['child']) > 0)
                                                    <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                                    <ul class="v2_bnc_category_sub_menu_block">
                                                        @foreach($category['child'] as $category_child)
                                                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                            <script>
                                $(document).ready(function () {
                                    $('.v2_bnc_category_products').find('.v2_bnc_category_sub_menu_block').hide();
                                    $('.v2_bnc_category_products').find('.v2_bnc_category_sub_lv3_menu_block').hide();

                                    // Accordion
                                    $('.v2_bnc_category_products').find('.v2_bnc_category_title_sub_menu_block').click(function () {
                                        var next = $(this).next();
                                        next.slideToggle('fast');
                                        $('.v2_bnc_category_sub_menu_block').not(next).slideUp('fast');
                                        return false;
                                    });

                                    $('.v2_bnc_category_products').find('.v2_bnc_category_title_sub_lv3_menu_block').click(function () {
                                        var next = $(this).next();
                                        next.slideToggle('fast');
                                        $('.v2_bnc_category_sub_lv3_menu_block').not(next).slideUp('fast');
                                        return false;
                                    });
                                });
                            </script>
                            <div class="v2_bnc_block_products_item v2_bnc_aside_block">
                                <div class="v2_bnc_block_title"><h2>SẢN PHẨM MỚI</h2></div>
                                <div class="v2_bnc_block_body">
                                    <ul class="row">
                                        <div class="owl_sidebar_slideshow owl-carousel owl-theme"
                                             style="opacity: 1; display: block;">
                                            <div class="owl-wrapper-outer">
                                                <div class="owl-wrapper"
                                                     style="width: 5860px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(-293px, 0px, 0px); transform-origin: 439.5px center; perspective-origin: 439.5px center;">
                                                    @foreach($product_news as $product_new)
                                                        <div class="owl-item" style="width: 293px;">
                                                            <li class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="v2_bnc_pr_item">
                                                                    <div
                                                                        class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                        <figure class="v2_bnc_block_item_img">
                                                                            <a href="{{ route('portal.product.detail',$product_new->slug) }}"
                                                                               title="{!! @$product_new->name !!}"><img
                                                                                    alt="{!! @$product_new->name !!}"
                                                                                    src="{{ @$product_new->thumbnail }}"
                                                                                    class="img-responsive"></a>
                                                                        </figure>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                        <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                            <!-- Products Name -->
                                                                            <h3 class="v2_bnc_pr_item_name no-top-space"><a
                                                                                    href="{{ route('portal.product.detail',$product_new->slug) }}"
                                                                                    title="{!! @$product_new->name !!}">{!! @$product_new->name !!}</a>
                                                                            </h3>
                                                                            <!-- End Products Name -->
                                                                            <!-- Price -->
                                                                            <div class="v2_bnc_pr_item_price_main">
                                                                                <p class="v2_bnc_pr_item_price">{{ number_format(@$product_new->price) }} đ</p>
                                                                            </div>
                                                                            <!-- End Price -->
                                                                        </figcaption>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>


                                            {{--<div class="owl-controls clickable">
                                                <div class="owl-pagination">
                                                    @foreach($product_news as $product)
                                                    <div class="owl-page"><span class=""></span></div>
                                                    @endforeach
                                                </div>
                                                <div class="owl-buttons">
                                                    <div class="owl-prev"></div>
                                                    <div class="owl-next"></div>
                                                </div>
                                            </div>--}}
                                        </div>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                            <div class="v2_bnc_products_page_body">
                                <div class="row margin-top-20">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="v2_bnc_title_page">
                                            <h1 onclick="loadDataItems()" class="no-top-space">Góc tư vấn</h1>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="v2_bnc_products_chooseview hidden">
                                            <a href="javascript:;" id="grid" class="active" title="Dạng danh sách"><i
                                                    class="fa fa-th-large fa" aria-hidden="true"></i></a>
                                            <a href="javascript:;" id="list" title="Dạng list"><i class="fa fa-th-list"
                                                                                                  aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content margin-top-10 row" id="data-items">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('page_script')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataItems();
        });

        function loadDataItems()
        {
            $.ajax({
                type: "POST",
                url: '{{ route('portal.post.load') }}',
                success: function (response) {
                    $("#data-items").html(response);
                }
            });
        }
    </script>
@endsection
