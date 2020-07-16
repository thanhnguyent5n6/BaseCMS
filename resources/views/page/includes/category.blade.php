@extends('layouts.portal.master')
@section('page_title')
    {{ @$product->name }}
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
                    <li><a href="https://giahung.vn">Trang chủ</a></li>
                    <li><a href="https://giahung.vn/trang-san-pham.html">Sản Phẩm</a></li>
                    <li><a href="https://giahung.vn/game-net-sever-cu">CẤU HÌNH GAME - NÉT - ĐỒ HỌA</a></li>
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
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



                                            <div class="panel panel-danger">
                                                <div class="panel-heading" role="tab" id="heading-2">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="true" aria-controls="collapse-2">Khoảng giá</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-2">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Từ:</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" min="0" class="form-control validate-input-money"
                                                                       placeholder="Giá..." value="{{ @number_format(@$data_item->price) }}">
                                                                <input type="number" min="0" class="value-input-money" name="from_price"
                                                                       value="{{ @$data_item->price }}" hidden>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-3">
                                                                <label>Đến:</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" min="0" class="form-control validate-input-money"
                                                                       placeholder="Giá..." value="{{ @number_format(@$data_item->price) }}">
                                                                <input type="number" min="0" class="value-input-money" name="to_price"
                                                                       value="{{ @$data_item->price }}" hidden>
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
                                $(document).ready(function() {
                                    ProductSearch.init();
                                });
                            </script><div class="v2_bnc_category_products v2_bnc_aside_block">
                                <div class="v2_bnc_block_title"><h2>Danh mục sản phẩm</h2></div>
                                <div class="v2_bnc_block_cate_body">
                                    <ul class="v2_bnc_block_category_menu_block">
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/08/1505293482_menu-bo-may-tinh-ban1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/08/1505293482_menu-bo-may-tinh-ban1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="CẤU HÌNH GAME - NÉT - ĐỒ HỌA"><a href="https://giahung.vn/game-net-sever-cu" title="CẤU HÌNH GAME - NÉT - ĐỒ HỌA">CẤU HÌNH GAME - NÉT - ĐỒ HỌA</a>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/08/1505293500_menu-bo-may-tinh-ban1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/08/1505293500_menu-bo-may-tinh-ban1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="MÁY TÍNH game - văn phòng CŨ"><a href="https://giahung.vn/may-tinh-cu" title="MÁY TÍNH game - văn phòng CŨ">MÁY TÍNH game - văn phòng CŨ</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/may-tinh-cu-van-phong" title="MÁY TÍNH VĂN PHÒNG CŨ">MÁY TÍNH VĂN PHÒNG CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/may-tinh-cu-choi-game" title="MÁY TÍNH CHƠI GAMES CŨ">MÁY TÍNH CHƠI GAMES CŨ</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/09/1505293564_menu-laptop-cu-1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/09/1505293564_menu-laptop-cu-1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="LAPTOP CŨ"><a href="https://giahung.vn/laptop-cu" title="LAPTOP CŨ">LAPTOP CŨ</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/laptop-cu-dell" title="LAPTOP DELL CŨ">LAPTOP DELL CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/laptop-cu-hp" title="LAPTOP HP CŨ">LAPTOP HP CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/laptop-cu-asus" title="LAPTOP ASUS CŨ">LAPTOP ASUS CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/laptop-cu-vaio" title="LAPTOP VAIO CŨ">LAPTOP VAIO CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/laptop-cu-lenovo" title="LAPTOP LENOVO CŨ">LAPTOP LENOVO CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/laptop-cu-acer" title="LAPTOP ACER CŨ">LAPTOP ACER CŨ</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/09/1505293587_menu-man-hinh-1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/09/1505293587_menu-man-hinh-1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="MÀN HÌNH MÁY TÍNH CŨ"><a href="https://giahung.vn/man-hinh-may-tinh-cu" title="MÀN HÌNH MÁY TÍNH CŨ">MÀN HÌNH MÁY TÍNH CŨ</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/man-hinh-may-tinh-cu-17-inch" title="MÀN HÌNH CŨ 17 INCH">MÀN HÌNH CŨ 17 INCH</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/man-hinh-may-tinh-cu-185-inch" title="MÀN HÌNH CŨ18.5 INCH">MÀN HÌNH CŨ18.5 INCH</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/man-hinh-may-tinh-cu-20-inch" title="MÀN HÌNH CŨ 20 INCH">MÀN HÌNH CŨ 20 INCH</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/man-hinh-may-tinh-cu-22-inch" title="MÀN HÌNH CŨ 22 INCH">MÀN HÌNH CŨ 22 INCH</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/man-hinh-may-tinh-cu-24-inch" title="MÀN HÌNH CŨ 23&quot; - 24 INCH">MÀN HÌNH CŨ 23" - 24 INCH</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/man-hinh-may-tinh-cu-27-inch" title="MÀN HÌNH CŨ 27 - 32 INCH">MÀN HÌNH CŨ 27 - 32 INCH</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/10/1505293646_menu-chip-1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/10/1505293646_menu-chip-1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="MAINBOARD (BO MẠCH CHỦ) CŨ"><a href="https://giahung.vn/main-cu" title="MAINBOARD (BO MẠCH CHỦ) CŨ">MAINBOARD (BO MẠCH CHỦ) CŨ</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/main-cu-socket-775" title="MAIN CŨ SOCKET 775">MAIN CŨ SOCKET 775</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/main-cu-socket-1155" title="MAIN CŨ SOCKET 1155">MAIN CŨ SOCKET 1155</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/main-cu-socket-1150" title="MAIN CŨ SOCKET 1150">MAIN CŨ SOCKET 1150</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/main-cu-socket-1151" title="MAIN CŨ SOCKET 1151">MAIN CŨ SOCKET 1151</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/main-cu-socket-1156" title="MAIN CŨ SOCKET 1156">MAIN CŨ SOCKET 1156</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/main-cu-socket-amd" title="MAIN CŨ SOCKET AMD">MAIN CŨ SOCKET AMD</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/11/1505293663_menu-ram-1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/11/1505293663_menu-ram-1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="CPU CŨ (BỘ VI XỬ LÝ)"><a href="https://giahung.vn/cpu-cu" title="CPU CŨ (BỘ VI XỬ LÝ)">CPU CŨ (BỘ VI XỬ LÝ)</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/cpu-cu-socket-775" title="CPU CŨ SOCKET 775">CPU CŨ SOCKET 775</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/cpu-cu-socket-1155" title="CPU CŨ SOCKET 1155">CPU CŨ SOCKET 1155</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/cpu-cu-socket-1150" title="CPU CŨ SOCKET 1150">CPU CŨ SOCKET 1150</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/cpu-cu-socket-1151" title="CPU CŨ SOCKET 1151">CPU CŨ SOCKET 1151</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/cpu-cu-socket-2011" title="CPU CŨ SOCKET 1156">CPU CŨ SOCKET 1156</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/cpu-cu-socket-amd" title="CPU CŨ SOCKET AMD">CPU CŨ SOCKET AMD</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/11/1505293679_menu-chip-1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/11/1505293679_menu-chip-1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="RAM CŨ (BỘ NHỚ TRONG)"><a href="https://giahung.vn/ram-cu" title="RAM CŨ (BỘ NHỚ TRONG)">RAM CŨ (BỘ NHỚ TRONG)</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/ram-cu-ddr-2" title="RAM DDR 2 CŨ">RAM DDR 2 CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/ram-cu-ddr-3" title="RAM DDR 3 CŨ">RAM DDR 3 CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/ram-cu-ddr-4" title="RAM DDR 4 CŨ">RAM DDR 4 CŨ</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/11/1505293694_menu-hdd-1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/11/1505293694_menu-hdd-1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="HDD - SSD CŨ (Ổ CỨNG)"><a href="https://giahung.vn/o-cung-cu" title="HDD - SSD CŨ (Ổ CỨNG)">HDD - SSD CŨ (Ổ CỨNG)</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/ssd-msata" title="SSD - Msata">SSD - Msata</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/o-cung-cu-hdd" title="HDD - Ổ CỨNG MÁY ĐỂ BÀN CŨ">HDD - Ổ CỨNG MÁY ĐỂ BÀN CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/o-cung-cu-laptop-ssd" title="HDD LAPTOP CŨ">HDD LAPTOP CŨ</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/12/1505293717_menu-vga-1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/12/1505293717_menu-vga-1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="VGA CŨ (CARD MÀN HÌNH)"><a href="https://giahung.vn/vga-card-man-hinh-cu" title="VGA CŨ (CARD MÀN HÌNH)">VGA CŨ (CARD MÀN HÌNH)</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/vga-card-man-hinh-cu-512mb" title="VGA 6G - 8G CŨ">VGA 6G - 8G CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/vga-card-man-hinh-cu-1gb" title="VGA 1GB CŨ">VGA 1GB CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/vga-card-man-hinh-cu-2gb" title="VGA 2GB CŨ">VGA 2GB CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/vga-card-man-hinh-cu-3gb" title="VGA 3GB CŨ">VGA 3GB CŨ</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/vga-card-man-hinh-cu-4gb" title="VGA 4GB CŨ">VGA 4GB CŨ</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <img style="display:none" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2017/09/13/09/12/1505293744_menu-mainboard-1.png_resize32x32.jpg" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2017/09/13/09/12/1505293744_menu-mainboard-1.png&amp;mode=resize&amp;size=32x32'" class="img-responsive" alt="VỎ CASE - NGUỒN MÁY TÍNH"><a href="https://giahung.vn/vo-case-nguon-may-tinh-cu" title="VỎ CASE - NGUỒN MÁY TÍNH">VỎ CASE - NGUỒN MÁY TÍNH</a>
                                            <i class="fa fa-angle-down v2_bnc_category_title_sub_menu_block"></i>
                                            <ul class="v2_bnc_category_sub_menu_block" style="display: none;">
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/vo-case-nguon-may-tinh-cu-nguon-thuong" title="NGUỒN THƯỜNG">NGUỒN THƯỜNG</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/vo-case-nguon-may-tinh-cu-nguon-cst" title="NGUỒN CÔNG SUẤT THỰC">NGUỒN CÔNG SUẤT THỰC</a>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a href="https://giahung.vn/vo-case-nguon-may-tinh-cu-vo-moi" title="VỎ CASE MỚI">VỎ CASE MỚI</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="https://giahung.vn/dvd-loa-tai-nghe" title="DVD - LOA - TAI NGHE">DVD - LOA - TAI NGHE</a>
                                        </li>
                                        <li>
                                            <a href="https://giahung.vn/phim-chuot-phu-kien-may-tinh" title="BÀN PHÍM - CHUỘT MÁY TÍNH">BÀN PHÍM - CHUỘT MÁY TÍNH</a>
                                        </li>
                                        <li>
                                            <a href="https://giahung.vn/thiet-bi-mang-van-phong" title="THIẾT BỊ MẠNG - VĂN PHÒNG - LƯU TRỮ">THIẾT BỊ MẠNG - VĂN PHÒNG - LƯU TRỮ</a>
                                        </li>
                                        <li>
                                            <a href="https://giahung.vn/dich-vu-sua-chua" title="PHỤ KIỆN MÁY TÍNH">PHỤ KIỆN MÁY TÍNH</a>
                                        </li>
                                        <li>
                                            <a href="https://giahung.vn/phu-kien-may-t" title="DỊCH VỤ SỬA CHỮA">DỊCH VỤ SỬA CHỮA</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function(){
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
                                        <div class="owl_sidebar_slideshow owl-carousel owl-theme" style="opacity: 1; display: block;">
                                            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 5860px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(-293px, 0px, 0px); transform-origin: 439.5px center; perspective-origin: 439.5px center;"><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/man-viewsonic-185quot-v1921a-moi-95" title="Màn Viewsonic 18.5&quot; (V1921A), mới 95%"><img alt="Màn Viewsonic 18.5&quot; (V1921A), mới 95%" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/07/01/04/51/1593596008_viewsonic-va1921a.png?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/man-viewsonic-185quot-v1921a-moi-95" title="Màn Viewsonic 18.5&quot; (V1921A), mới 95%">Màn Viewsonic 18.5" (V1921A), mới 95%</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">800.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/man-hinh-hp-24quot-v243-moi-98" title="Màn hình HP 24&quot; (V243), mới 98%"><img alt="Màn hình HP 24&quot; (V243), mới 98%" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/07/01/04/45/1593595648_hp-v243.png?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/man-hinh-hp-24quot-v243-moi-98" title="Màn hình HP 24&quot; (V243), mới 98%">Màn hình HP 24" (V243), mới 98%</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">1.650.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/man-dell-24quot-e2417h-full-hop" title="Màn Dell 24&quot; (E2417H), full hộp"><img alt="Màn Dell 24&quot; (E2417H), full hộp" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/06/22/04/15/1592816824_dell-e2417.jpg?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/man-dell-24quot-e2417h-full-hop" title="Màn Dell 24&quot; (E2417H), full hộp">Màn Dell 24" (E2417H), full hộp</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">1.900.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/man-hinh-samsung-s23c350" title="Màn hình Samsung S23C350"><img alt="Màn hình Samsung S23C350" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/06/22/04/12/1592816634_samsung-s23c350.jpg?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/man-hinh-samsung-s23c350" title="Màn hình Samsung S23C350">Màn hình Samsung S23C350</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">1.500.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/man-samsung-27quot-27e360" title="Màn samsung 27&quot; (27E360)"><img alt="Màn samsung 27&quot; (27E360)" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/06/22/04/08/1592816399_32e360.jpg?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/man-samsung-27quot-27e360" title="Màn samsung 27&quot; (27E360)">Màn samsung 27" (27E360)</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">2.200.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/man-samsung-24quot-cong-lc24f390-moi-98" title="Màn Samsung 24&quot; cong LC24F390, mới 98%"><img alt="Màn Samsung 24&quot; cong LC24F390, mới 98%" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/06/22/04/05/1592816224_samsung-c24f390.jpg?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/man-samsung-24quot-cong-lc24f390-moi-98" title="Màn Samsung 24&quot; cong LC24F390, mới 98%">Màn Samsung 24" cong LC24F390, mới 98%</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">1.850.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/man-hp-22quot-elitedisplay-e222-moi-98-chuyen-do-hoa" title="Màn hp 22&quot; EliteDisplay E222, mới 98%, chuyên đồ họa"><img alt="Màn hp 22&quot; EliteDisplay E222, mới 98%, chuyên đồ họa" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/06/21/04/45/1592732285_hp-prodisplay-e222.jpg?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/man-hp-22quot-elitedisplay-e222-moi-98-chuyen-do-hoa" title="Màn hp 22&quot; EliteDisplay E222, mới 98%, chuyên đồ họa">Màn hp 22" EliteDisplay E222, mới 98%, chuyên đồ họa</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">1.600.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/main-b85-i5-4570-ram-8g-vga-gtx-1050ti-4g" title="Main B85, I5 4570, Ram 8G, VGA GTX 1050TI-4G"><img alt="Main B85, I5 4570, Ram 8G, VGA GTX 1050TI-4G" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/06/16/12/03/1592240521_gaming.jpg?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/main-b85-i5-4570-ram-8g-vga-gtx-1050ti-4g" title="Main B85, I5 4570, Ram 8G, VGA GTX 1050TI-4G">Main B85, I5 4570, Ram 8G, VGA GTX 1050TI-4G</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">6.500.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/main-b85-i5-4570-ram-8g-vga-gtx-960-2g" title="Main B85, I5 4570, Ram 8G, VGA GTX 960-2G"><img alt="Main B85, I5 4570, Ram 8G, VGA GTX 960-2G" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/06/16/12/01/1592240398_gaming.jpg?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/main-b85-i5-4570-ram-8g-vga-gtx-960-2g" title="Main B85, I5 4570, Ram 8G, VGA GTX 960-2G">Main B85, I5 4570, Ram 8G, VGA GTX 960-2G</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">5.700.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div><div class="owl-item" style="width: 293px;"><li class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="v2_bnc_pr_item">
                                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no-padding">
                                                                    <figure class="v2_bnc_block_item_img">
                                                                        <a href="https://giahung.vn/main-h81-i5-4570-ram-8g-vga-gtx-750ti-2g" title="Main H81, I5 4570, Ram 8G, VGA GTX 750TI-2G"><img alt="Main H81, I5 4570, Ram 8G, VGA GTX 750TI-2G" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2020/06/15/11/59/1592240242_gaming.jpg?v=4" class="img-responsive"></a>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                                    <figcaption class="v2_bnc_pr_item_boxdetails">
                                                                        <!-- Products Name -->
                                                                        <h3 class="v2_bnc_pr_item_name no-top-space"><a href="https://giahung.vn/main-h81-i5-4570-ram-8g-vga-gtx-750ti-2g" title="Main H81, I5 4570, Ram 8G, VGA GTX 750TI-2G">Main H81, I5 4570, Ram 8G, VGA GTX 750TI-2G</a></h3>
                                                                        <!-- End Products Name -->
                                                                        <!-- Price -->
                                                                        <div class="v2_bnc_pr_item_price_main">
                                                                            <p class="v2_bnc_pr_item_price">5.200.000 đ</p>
                                                                        </div>
                                                                        <!-- End Price -->
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </li></div></div></div>










                                            <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page"><span class=""></span></div><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div>
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
                                            <option value="manual_sort_desc">Tùy chọn từ cao tới thấp</option>
                                            <option value="manual_sort_asc">Tùy chọn từ thấp tới cao</option>
                                            <option value="early">Sản phẩm cũ nhất</option>
                                            <option value="best_selling">Sản phẩm bán chạy</option>
                                            <option value="view">Sản phẩm xem nhiều</option>
                                            <option value="hot">Sản phẩm nổi bật</option>
                                            <option value="hight_to_low">Giá từ cao đến thấp</option>
                                            <option value="low_to_hight">Giá từ thấp đến cao</option>
                                            <option value="more_to_less">Khuyến mãi từ ít đến nhiều</option>
                                            <option value="less_to_more">Khuyến mãi từ nhiều đến ít</option>
                                            <option value="a_z">Sắp xếp theo tên từ A - Z</option>
                                            <option value="z_a">Sắp xếp theo tên từ Z - A</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 full-xs">
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
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 full-xs">
                                        <form id="product-search" action="http://giahung.vn/game-net-sever-cu" method="get">
                                            <input type="text" value="" name="title" placeholder="Tiêu đề..." class="form-control form-filter BNC_txt_search">
                                        </form>
                                    </div>
                                    <div class="col-md-1 col-sm-3 col-xs-3">
                                        <button class="BNC-search-product btn btn-danger">Tìm kiếm</button>
                                    </div>

                                </div>
                            </div>

                            <div class="v2_bnc_products_page_body">
                                <div class="row margin-top-20">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="v2_bnc_title_page">
                                            <h1 class="no-top-space">CẤU HÌNH GAME - NÉT - ĐỒ HỌA</h1>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="v2_bnc_products_chooseview hidden">
                                            <a href="javascript:;" id="grid" class="active" title="Dạng danh sách"><i class="fa fa-th-large fa" aria-hidden="true"></i></a>
                                            <a href="javascript:;" id="list" title="Dạng list"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content margin-top-10 row">
                                    <ul class="f-product-viewid f-product">
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1712481">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-main-h87-i7-4790-ram-16g-vga-1060" title="Case: Main H87, I7 4790, Ram 16G, VGA 1060">
                                                        <img alt="Case: Main H87, I7 4790, Ram 16G, VGA 1060" id="f-pr-image-zoom-id-tab-home-1712481" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/12/18/11/00/1576666802_111.jpg?v=4" class="tooltipItem BNC-image-add-cart-1712481 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1712481">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1712481">
                                                                <div class="tooltip_main_content">
                                                                    <h3>Case: Main H87, I7 4790, Ram 16G, VGA 1060</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">10.100.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-main-h87-i7-4790-ram-16g-vga-1060" title="Case: Main H87, I7 4790, Ram 16G, VGA 1060">Case: Main H87, I7 4790, Ram 16G, VGA 1060</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">10.100.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="10100000.00.00" data-name="Case: Main H87, I7 4790, Ram 16G, VGA 1060" data-type="tab-home" data-price="Array" data-product="1712481" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1711423">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-b450-rezen-3600-ram-8g-vga-8g" title="Case: B450, Rezen5 3600, Ram 8G, VGA 8G">
                                                        <img alt="Case: B450, Rezen5 3600, Ram 8G, VGA 8G" id="f-pr-image-zoom-id-tab-home-1711423" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/12/17/04/36/1576600597_000.jpg?v=4" class="tooltipItem BNC-image-add-cart-1711423 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1711423">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1711423">
                                                                <div class="tooltip_main_content">
                                                                    <h3>Case: B450, Rezen5 3600, Ram 8G, VGA 8G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">11.700.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-b450-rezen-3600-ram-8g-vga-8g" title="Case: B450, Rezen5 3600, Ram 8G, VGA 8G">Case: B450, Rezen5 3600, Ram 8G, VGA 8G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">11.700.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="11700000.00.00" data-name="Case: B450, Rezen5 3600, Ram 8G, VGA 8G" data-type="tab-home" data-price="Array" data-product="1711423" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1711421">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-main-b450-rezen-2600-ram-8g-vga-8g" title="Case : B450, Rezen5 2600, Ram 8G, VGA 8G">
                                                        <img alt="Case : B450, Rezen5 2600, Ram 8G, VGA 8G" id="f-pr-image-zoom-id-tab-home-1711421" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/12/17/04/32/1576600371_444.jpg?v=4" class="tooltipItem BNC-image-add-cart-1711421 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1711421">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1711421">
                                                                <div class="tooltip_main_content">
                                                                    <h3>Case : B450, Rezen5 2600, Ram 8G, VGA 8G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">10.400.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-main-b450-rezen-2600-ram-8g-vga-8g" title="Case : B450, Rezen5 2600, Ram 8G, VGA 8G">Case : B450, Rezen5 2600, Ram 8G, VGA 8G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">10.400.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="10400000.00.00" data-name="Case : B450, Rezen5 2600, Ram 8G, VGA 8G" data-type="tab-home" data-price="Array" data-product="1711421" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1711419">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-h87-i5-4570-ram-8g-vga-4g" title="Case: H87, I5 4570, Ram 8G, VGA 4G">
                                                        <img alt="Case: H87, I5 4570, Ram 8G, VGA 4G" id="f-pr-image-zoom-id-tab-home-1711419" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/12/17/04/25/1576599908_000.jpg?v=4" class="tooltipItem BNC-image-add-cart-1711419 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1711419">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1711419">
                                                                <div class="tooltip_main_content">
                                                                    <h3>Case: H87, I5 4570, Ram 8G, VGA 4G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">6.850.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-h87-i5-4570-ram-8g-vga-4g" title="Case: H87, I5 4570, Ram 8G, VGA 4G">Case: H87, I5 4570, Ram 8G, VGA 4G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">6.850.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="6850000.00.00" data-name="Case: H87, I5 4570, Ram 8G, VGA 4G" data-type="tab-home" data-price="Array" data-product="1711419" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1711417">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-i5-9400fram-8g-vga-1060" title="Case: I5 9400F,Ram 8G, VGA 1050TI">
                                                        <img alt="Case: I5 9400F,Ram 8G, VGA 1050TI" id="f-pr-image-zoom-id-tab-home-1711417" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/12/17/04/12/1576599125_333.jpg?v=4" class="tooltipItem BNC-image-add-cart-1711417 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1711417">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1711417">
                                                                <div class="tooltip_main_content">
                                                                    <h3>Case: I5 9400F,Ram 8G, VGA 1050TI</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">9.800.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-i5-9400fram-8g-vga-1060" title="Case: I5 9400F,Ram 8G, VGA 1050TI">Case: I5 9400F,Ram 8G, VGA 1050TI</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">9.800.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="9800000.00.00" data-name="Case: I5 9400F,Ram 8G, VGA 1050TI" data-type="tab-home" data-price="Array" data-product="1711417" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1711415">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-i3-9100fram-8g-vga-1060" title="Case: I3 9100F,Ram 8G, VGA 8G">
                                                        <img alt="Case: I3 9100F,Ram 8G, VGA 8G" id="f-pr-image-zoom-id-tab-home-1711415" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/12/17/04/07/1576598834_000.jpg?v=4" class="tooltipItem BNC-image-add-cart-1711415 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1711415">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1711415">
                                                                <div class="tooltip_main_content">
                                                                    <h3>Case: I3 9100F,Ram 8G, VGA 8G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">7.800.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-i3-9100fram-8g-vga-1060" title="Case: I3 9100F,Ram 8G, VGA 8G">Case: I3 9100F,Ram 8G, VGA 8G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">7.800.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="7800000.00.00" data-name="Case: I3 9100F,Ram 8G, VGA 8G" data-type="tab-home" data-price="Array" data-product="1711415" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1680885">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-z77-i7-4770" title="Case Gaming Z87, I7 4770">
                                                        <img alt="Case Gaming Z87, I7 4770" id="f-pr-image-zoom-id-tab-home-1680885" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/11/14/05/34/1573752873_15730-sirocon-2.jpg?v=4" class="tooltipItem BNC-image-add-cart-1680885 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1680885">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1680885">
                                                                <div class="tooltip_main_content">
                                                                    <h3>Case Gaming Z87, I7 4770</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">8.950.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-z77-i7-4770" title="Case Gaming Z87, I7 4770">Case Gaming Z87, I7 4770</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">8.950.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="8950000.00.00" data-name="Case Gaming Z87, I7 4770" data-type="tab-home" data-price="Array" data-product="1680885" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648769">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-b250i5-74008ggtx-1060-3g" title="CASE Gaming B250,I5 7400,8G,GTX 1060-3G">
                                                        <img alt="CASE Gaming B250,I5 7400,8G,GTX 1060-3G" id="f-pr-image-zoom-id-tab-home-1648769" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/05/33/1571333607_vo-case-viettech-x11.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648769 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648769">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648769">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming B250,I5 7400,8G,GTX 1060-3G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">10.400.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-b250i5-74008ggtx-1060-3g" title="CASE Gaming B250,I5 7400,8G,GTX 1060-3G">CASE Gaming B250,I5 7400,8G,GTX 1060-3G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">10.400.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="10400000.00.00" data-name="CASE Gaming B250,I5 7400,8G,GTX 1060-3G" data-type="tab-home" data-price="Array" data-product="1648769" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648767">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-b250i3-71008gvga-1060-3g" title="CASE Gaming B250,I3 7100,8G,VGA 1060-3G">
                                                        <img alt="CASE Gaming B250,I3 7100,8G,VGA 1060-3G" id="f-pr-image-zoom-id-tab-home-1648767" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/05/27/1571333277_15730-sirocon-2.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648767 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648767">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648767">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming B250,I3 7100,8G,VGA 1060-3G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">9.550.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-b250i3-71008gvga-1060-3g" title="CASE Gaming B250,I3 7100,8G,VGA 1060-3G">CASE Gaming B250,I3 7100,8G,VGA 1060-3G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">9.550.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="9550000.00.00" data-name="CASE Gaming B250,I3 7100,8G,VGA 1060-3G" data-type="tab-home" data-price="Array" data-product="1648767" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648765">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-b250i3-71008g-gtx-1050ti" title="CASE Gaming B250,I3 7100,8G, GTX 1050TI">
                                                        <img alt="CASE Gaming B250,I3 7100,8G, GTX 1050TI" id="f-pr-image-zoom-id-tab-home-1648765" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/05/23/1571332998_vo-case-viettech-x11.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648765 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648765">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648765">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming B250,I3 7100,8G, GTX 1050TI</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">8.900.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-b250i3-71008g-gtx-1050ti" title="CASE Gaming B250,I3 7100,8G, GTX 1050TI">CASE Gaming B250,I3 7100,8G, GTX 1050TI</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">8.900.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="8900000.00.00" data-name="CASE Gaming B250,I3 7100,8G, GTX 1050TI" data-type="tab-home" data-price="Array" data-product="1648765" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648763">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-h170i5-65008ggtx-1060-3g" title="CASE Gaming H170,I5 6500,8G,GTX 1060-3G">
                                                        <img alt="CASE Gaming H170,I5 6500,8G,GTX 1060-3G" id="f-pr-image-zoom-id-tab-home-1648763" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/05/02/1571331760_15730-sirocon-2.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648763 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648763">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648763">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming H170,I5 6500,8G,GTX 1060-3G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">9.950.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-h170i5-65008ggtx-1060-3g" title="CASE Gaming H170,I5 6500,8G,GTX 1060-3G">CASE Gaming H170,I5 6500,8G,GTX 1060-3G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">9.950.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="9950000.00.00" data-name="CASE Gaming H170,I5 6500,8G,GTX 1060-3G" data-type="tab-home" data-price="Array" data-product="1648763" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648761">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-h170i3-61008gvga-1050ti" title="CASE Gaming H170,I3 6100,8G,VGA 1050TI">
                                                        <img alt="CASE Gaming H170,I3 6100,8G,VGA 1050TI" id="f-pr-image-zoom-id-tab-home-1648761" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/04/59/1571331579_vo-case-viettech-x11.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648761 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648761">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648761">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming H170,I3 6100,8G,VGA 1050TI</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">8.650.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-h170i3-61008gvga-1050ti" title="CASE Gaming H170,I3 6100,8G,VGA 1050TI">CASE Gaming H170,I3 6100,8G,VGA 1050TI</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">8.650.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="8650000.00.00" data-name="CASE Gaming H170,I3 6100,8G,VGA 1050TI" data-type="tab-home" data-price="Array" data-product="1648761" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648759">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-b85-i5-45708gvga-1060-3g" title="CASE Gaming B85, I5 4570,8G,VGA 1060-3G">
                                                        <img alt="CASE Gaming B85, I5 4570,8G,VGA 1060-3G" id="f-pr-image-zoom-id-tab-home-1648759" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/04/54/1571331296_15730-sirocon-2.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648759 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648759">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648759">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming B85, I5 4570,8G,VGA 1060-3G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">7.300.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-b85-i5-45708gvga-1060-3g" title="CASE Gaming B85, I5 4570,8G,VGA 1060-3G">CASE Gaming B85, I5 4570,8G,VGA 1060-3G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">7.300.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="7300000.00.00" data-name="CASE Gaming B85, I5 4570,8G,VGA 1060-3G" data-type="tab-home" data-price="Array" data-product="1648759" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648757">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-b85-i5-45708gvga-1060-3g" title="CASE Gaming B85, I5 4570,8G,VGA 1060-3G">
                                                        <img alt="CASE Gaming B85, I5 4570,8G,VGA 1060-3G" id="f-pr-image-zoom-id-tab-home-1648757" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/04/51/1571331095_vo-case-viettech-x11.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648757 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648757">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648757">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming B85, I5 4570,8G,VGA 1060-3G</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">7.750.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-b85-i5-45708gvga-1060-3g" title="CASE Gaming B85, I5 4570,8G,VGA 1060-3G">CASE Gaming B85, I5 4570,8G,VGA 1060-3G</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">7.750.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="7750000.00.00" data-name="CASE Gaming B85, I5 4570,8G,VGA 1060-3G" data-type="tab-home" data-price="Array" data-product="1648757" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648755">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-h81i5-45708gvga-1050ti" title="CASE Gaming H81,I5 4570,8G,VGA 1050TI">
                                                        <img alt="CASE Gaming H81,I5 4570,8G,VGA 1050TI" id="f-pr-image-zoom-id-tab-home-1648755" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/04/47/1571330846_15730-sirocon-2.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648755 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648755">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648755">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming H81,I5 4570,8G,VGA 1050TI</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">7.150.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-h81i5-45708gvga-1050ti" title="CASE Gaming H81,I5 4570,8G,VGA 1050TI">CASE Gaming H81,I5 4570,8G,VGA 1050TI</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">7.150.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="7150000.00.00" data-name="CASE Gaming H81,I5 4570,8G,VGA 1050TI" data-type="tab-home" data-price="Array" data-product="1648755" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648753">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-h81i5-45708gvga-1050ti" title="CASE Gaming H81,I5 4570,8G,VGA 1050TI">
                                                        <img alt="CASE Gaming H81,I5 4570,8G,VGA 1050TI" id="f-pr-image-zoom-id-tab-home-1648753" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/04/42/1571330577_vo-case-viettech-x11.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648753 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648753">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648753">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming H81,I5 4570,8G,VGA 1050TI</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">7.000.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-h81i5-45708gvga-1050ti" title="CASE Gaming H81,I5 4570,8G,VGA 1050TI">CASE Gaming H81,I5 4570,8G,VGA 1050TI</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">7.000.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="7000000.00.00" data-name="CASE Gaming H81,I5 4570,8G,VGA 1050TI" data-type="tab-home" data-price="Array" data-product="1648753" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648751">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming-b75i5-34708gvga-1050ti" title="CASE Gaming B75,I5 3470,8G,VGA 1050TI">
                                                        <img alt="CASE Gaming B75,I5 3470,8G,VGA 1050TI" id="f-pr-image-zoom-id-tab-home-1648751" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/04/39/1571330385_15730-sirocon-2.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648751 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648751">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648751">
                                                                <div class="tooltip_main_content">
                                                                    <h3>CASE Gaming B75,I5 3470,8G,VGA 1050TI</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">6.650.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming-b75i5-34708gvga-1050ti" title="CASE Gaming B75,I5 3470,8G,VGA 1050TI">CASE Gaming B75,I5 3470,8G,VGA 1050TI</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">6.650.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="6650000.00.00" data-name="CASE Gaming B75,I5 3470,8G,VGA 1050TI" data-type="tab-home" data-price="Array" data-product="1648751" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs" id="like-product-item-1648745">
                                            <div class="v2_bnc_pr_item">

                                                <figure class="v2_bnc_pr_item_img">
                                                    <a href="https://giahung.vn/case-gaming" title="Case Gaming B75,I5 3470,8G,VGA 1050TI">
                                                        <img alt="Case Gaming B75,I5 3470,8G,VGA 1050TI" id="f-pr-image-zoom-id-tab-home-1648745" src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/10/17/04/27/1571329643_vo-case-viettech-x11.jpg?v=4" class="tooltipItem BNC-image-add-cart-1648745 img-responsive tooltipstered" data-tooltip-content="#tooltip_content1648745">

                                                        <div class="tooltip_templates" style="display: none;">
                                                            <div id="tooltip_content1648745">
                                                                <div class="tooltip_main_content">
                                                                    <h3>Case Gaming B75,I5 3470,8G,VGA 1050TI</h3>
                                                                    <div class="v2_bnc_pr_item_price_main">
                                                                        <p class="v2_bnc_pr_item_price">6.500.000 đ</p>
                                                                    </div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>

                                                <div class="v2_bnc_pr_item_boxdetails">
                                                    <!-- Products Name -->
                                                    <h3 class="v2_bnc_pr_item_name"><a href="https://giahung.vn/case-gaming" title="Case Gaming B75,I5 3470,8G,VGA 1050TI">Case Gaming B75,I5 3470,8G,VGA 1050TI</a></h3>
                                                    <!-- End Products Name -->

                                                    <!-- Price -->
                                                    <div class="v2_bnc_pr_item_price_main">
                                                        <p class="v2_bnc_pr_item_price">6.500.000 đ</p>
                                                    </div>
                                                    <!-- End Price -->

                                                    <!-- Buy -->
                                                    <div class="v2_bnc_pr_item_buy">
                                                        <a href="javascript:void(0)" title="Đặt Mua" class="BNC-add-cart v2_bnc_pr_item_action_buy" data-price-float="6500000.00.00" data-name="Case Gaming B75,I5 3470,8G,VGA 1050TI" data-type="tab-home" data-price="Array" data-product="1648745" data-quantity="1" data-total-quantity="100"><i class="icon-basket icons"></i> Thêm vào giỏ hàng</a>

                                                    </div>
                                                    <!-- End Buy -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="v2_bnc_pagination">
                                        <div class="col-md-6">
                                            <p class="v2_bnc_pagination_title"> Hiển thị từ            <strong>  </strong> đến            <strong>    </strong> trên            <strong>  </strong> bản ghi - Trang số            <strong>   </strong> trên            <strong>  </strong> trang        </p>
                                        </div>
                                        <div class="v2_bnc_pagination_button text-right col-md-6">
                                            <ul class="pagination">
                                                <li class="disabled"><a> ← </a></li>

                                                <li class="disabled"> <a>Trước</a> </li>

                                                <li class="disabled"> <a>Sau</a></li>
                                                <li class="disabled"> <a> → </a></li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
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
            _inputValidateMoney: ".validate-input-money",
            _inputValueMoney: ".value-input-money",

            _inputValidateSales: ".validate-input-sales",
            _inputValueSales: ".value-input-sales",

            validateInputMoney: function () {
                Validate.validate_number(ValidateNumber._inputValidateMoney);
                Validate.init_input_format_number($(ValidateNumber._inputValidateMoney), $(ValidateNumber._inputValueMoney));

                Validate.validate_number(ValidateNumber._inputValidateSales);
                Validate.init_input_format_number($(ValidateNumber._inputValidateSales), $(ValidateNumber._inputValueSales));
            },
        }

        $(document).ready(function() {
            ValidateNumber.validateInputMoney();
            $('body').data('home_url', 'https://giahung.vn');
            //$('body').data('page_url', '');
            $('body').data('extension', '.html');
            Product.init();
            WebCommon.init();
            // alert("-Golbal aler- "+$('body').data('home_url'));
        });
    </script>
@endsection
