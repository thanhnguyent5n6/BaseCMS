@extends('layouts.portal.master')
@section('page_title')
    {{ @$category_info->name }}
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
                    <li><a href="javascript:;">{{ @$category_info->name }}</a></li>
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

                            <div class="v2_bnc_block_products_search f-block-search-color-price-catefories">
                                <div class="">
                                    <div class="v2_bnc_block_title"><h2>Tìm kiếm sản phẩm</h2></div>
                                    <div class="v2_bnc_block_body">
                                        <div class="panel-group" id="accordion" role="tablist"
                                             aria-multiselectable="true">


                                            <div class="panel panel-danger">
                                                <div class="panel-heading" role="tab" id="heading-2">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse-2"
                                                           aria-expanded="true" aria-controls="collapse-2">Khoảng
                                                            giá</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-2" class="panel-collapse collapse in" role="tabpanel"
                                                     aria-labelledby="heading-2">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Từ:</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" min="0"
                                                                       class="form-control validate_to_price"
                                                                       placeholder="Giá...">
                                                                <input type="number" min="0" class="value_to_price"
                                                                       name="from_price" id="from_price"
                                                                       value="" hidden>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-3">
                                                                <label>Đến:</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" min="0"
                                                                       class="form-control validate_from_price"
                                                                       placeholder="Giá...">
                                                                <input type="number" min="0" class="value_from_price"
                                                                       name="to_price" id="to_price"
                                                                       value="" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                <div class="v2_bnc_block_title"><h2>Sản phẩm mới</h2></div>
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

                            <div class="v2_bnc_select_category_products_page">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-6 full-xs">
                                        <select name="sort_filter" id="sort_filter" class="form-control">
                                            <option value="last" selected="">Sản phẩm mới nhất</option>
                                            <option value="early">Sản phẩm cũ nhất</option>
                                            <option value="best_selling">Sản phẩm bán chạy</option>
                                            <option value="view">Sản phẩm xem nhiều</option>
                                            <option value="hight_to_low">Giá từ cao đến thấp</option>
                                            <option value="low_to_hight">Giá từ thấp đến cao</option>
                                            <option value="a_z">Sắp xếp theo tên từ A - Z</option>
                                            <option value="z_a">Sắp xếp theo tên từ Z - A</option>
                                        </select>
                                    </div>
                                    {{--<div class="col-md-3 col-sm-6 col-xs-6 full-xs">
                                        <select name="limit_filter" id="limit_filter" class="form-control">
                                            <option value="12">12 sản phẩm mỗi trang</option>
                                            <option value="15">15 sản phẩm mỗi trang</option>
                                            <option value="20">20 sản phẩm mỗi trang</option>
                                            <option value="40">40 sản phẩm mỗi trang</option>
                                            <option value="60">60 sản phẩm mỗi trang</option>
                                            <option value="80">80 sản phẩm mỗi trang</option>
                                            <option value="100">100 sản phẩm mỗi trang</option>
                                            <option value="120">120 sản phẩm mỗi trang</option>
                                            <option value="140">140 sản phẩm mỗi trang</option>
                                        </select>
                                    </div>--}}
                                    <div class="col-md-3 col-sm-6 col-xs-6 full-xs">
                                        <form id="product-search"
                                              method="get">
                                            <input type="text" value="" id="txt_search" name="title" placeholder="Tiêu đề..."
                                                   class="form-control form-filter BNC_txt_search">
                                        </form>
                                    </div>
                                    <div class="col-md-1 col-sm-3 col-xs-3">
                                        <button onclick="loadDataItems()" class="BNC-search-product btn btn-danger">Tìm kiếm</button>
                                    </div>

                                </div>
                            </div>

                            <div class="v2_bnc_products_page_body">
                                <div class="row margin-top-20">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="v2_bnc_title_page">
                                            <h1 class="no-top-space">{{ @$category_info->name }}</h1>
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
    @include('commons.common_js')
    <script type="text/javascript" src="{{ asset('portal/product.js') }}"></script>

    <script type="text/javascript">

        ValidateNumber = {
            _inputValidateMoney: ".validate_to_price",
            _inputValueMoney: ".value_to_price",

            _inputValidateSales: ".validate_from_price",
            _inputValueSales: ".value_from_price",

            validateInputMoney: function () {
                Validate.validate_number(ValidateNumber._inputValidateMoney);
                Validate.init_input_format_number($(ValidateNumber._inputValidateMoney), $(ValidateNumber._inputValueMoney));

                Validate.validate_number(ValidateNumber._inputValidateSales);
                Validate.init_input_format_number($(ValidateNumber._inputValidateSales), $(ValidateNumber._inputValueSales));
            },
        }

        $(document).ready(function () {
            ValidateNumber.validateInputMoney();
            $('body').data('home_url', '{{ route('portal.index') }}');
            //$('body').data('page_url', '');
            $('body').data('extension', '.html');
            Product.init();
            WebCommon.init();
            // alert("-Golbal aler- "+$('body').data('home_url'));

            loadDataItems();
        });

        function loadDataItems()
        {
            let category_id = '{{ $category_info->id }}';
            let sort_filter = $("#sort_filter").find('option:selected').val();
            let txt_search = $("#txt_search").val();
            let from_price = $("#from_price").val();
            let to_price = $("#to_price").val();
            console.log(from_price, to_price);
            $.ajax({
                type: "POST",
                url: '{{ route('portal.load_product_by_category') }}',
                data: {
                    category_id: category_id,
                    sort_filter: sort_filter,
                    txt_search: txt_search,
                    from_price: from_price,
                    to_price: to_price,
                },
                success: function (response) {
                    $("#data-items").html(response);
                }
            });
        }
    </script>
@endsection
