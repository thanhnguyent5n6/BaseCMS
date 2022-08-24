@extends('layouts.portal.master')
@section('page_title')
    {{ @$product->name }}
@endsection
@section('page_style')

@endsection
@section('page_content')
    <style>
        .owl-carousel .owl-item {
            float: none !important;
            display: inline !important;
        }
        .owl-carousel .owl-item {
            float: none !important;
            display: inline !important;
        }
    </style>
    <section class="v2_bnc_inside_page">
        <div class="v2_bnc_products_view_details">
            <div class="v2_bnc_products_body">
                <!-- Products details -->
                <!-- Breadcrumbs -->
                <div class="clearfix"></div>
                <div class="v2_breadcrumb_main">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('portal.index') }}">Trang chủ</a></li>
{{--                            <li><a href="https://minhthanhaudio.com/trang-san-pham.html">Sản Phẩm</a></li>--}}
                            <li><a href="/danh-muc/{{ $product->category->slug }}">{{ $product->category->name }}</a></li>
                            <li><a href="javascript:;">{{ $product->name }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Breadcrumbs -->
                <div class="v2_bnc_product_details_page">
                    <div class="container">
                        <div class="row">
                            <div class="v2_bnc_view_info_page">
                                <div class="item">
                                    <!-- Zoom image -->
                                    <div class="v2_bnc_products_details_zoom_img col-md-12 col-sm-12 col-xs-12">
                                        <style>
                                            #f-pr-image-zoom-gallery .active img {
                                                opacity: 1 !important;
                                            }
                                            #img_01 {
                                                height: 400px !important;
                                                object-fit: scale-down;
                                            }
                                        </style>
                                        <div class="f-pr-image-zoom">
                                            <div class="zoomWrapper">
                                                <div style="height:400px;width:300px;" class="zoomWrapper"><img id="img_01" src="{{ $product->thumbnail }}" data-zoom-href="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/product/2019/12/18/11/00/1576666802_111.jpg" class="img-responsive BNC-image-add-cart-1712481" alt="{{ @$product->name }}" style="position: absolute;"></div>
                                            </div>
                                        </div>
                                        <div class="f-pr-image-zoom-gallery">
                                            <div id="slidezoompage">
                                                <div class="owl_img_product_details owl-carousel owl-theme" style="opacity: 1; display: block;">
                                                    <div class="owl-wrapper-outer">
                                                        <div class="owl-wrapper" style="width: 720px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">

                                                            <div class="owl-item" style="width: 120px;">
                                                                <a href="#" data-href="{{ $product->thumbnail }}" data-zoom-image="{{ $product->thumbnail }}" title="{{ $product->thumbnail }}">
                                                                    <img src="{{ $product->thumbnail }}"
                                                                         alt="{{ $product->thumbnail }}"
                                                                         class="v2_bnc_product_details_img_small img-responsive">
                                                                </a>
                                                            </div>

                                                            @if(isset($product->images) && count($product->images) > 0)
                                                                @foreach($product->images as $image)
                                                                    <div class="owl-item" style="width: 120px;">
                                                                        <a href="#" data-href="{{ asset(@$image->url) }}" data-zoom-image="{{ asset(@$image->url) }}" title="{{ @$image->name }}">
                                                                                <img src="{{ asset(@$image->url) }}" alt="{{ @$image->id }}" class="v2_bnc_product_details_img_small img-responsive">
                                                                            </a>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="owl-controls clickable" style="display: none;"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"><a class="flex-prev-slideshow"><i class="fa fa-chevron-left"></i></a></div><div class="owl-next"><a class="flex-next-slideshow"><i class="fa fa-chevron-right"></i></a></div></div></div></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <!-- End Zoom image -->
                                </div>

                                <div class="item">
                                    <!-- Details -->
                                    <div class="v2_bnc_products_details_box col-md-12 col-sm-12 col-xs-12">
                                        <div class="v2_bnc_products_details_box_name">
                                            <h1>{{ @$product->name }}</h1>
                                        </div><br>

                                        {{--<div class="v2_bnc_products_details_box_rating">
                                            <div id="stars" data-text-login="Vui lòng đăng nhập trước khi đánh giá" data-is-login="0" onclick="relogin()" data-is-rater="" data-name="{{ @$product->name }}" data-id-product="1712481" class="starrr" data-rating="0" style="font-size: 17px;color: #32cfb0;position: absolute;top: 2px;"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>

                                            <div style="margin-left: 94px;margin-top: -12px;">
                                                <span id="display-first-rating" style="font-size: 12px">Hãy trở thành người đầu tiên đánh giá sản phẩm này</span>
                                                <span id="display-total-rating" style="font-size: 12px">(<i class="fa fa-user"></i> <span id="rate" style="font-size: 12px;">0</span>)</span>
                                            </div>
                                        </div>--}}

                                        <div class="v2_bnc_products_details_box_social">
                                            <ul class="no-margin no-padding">
                                                <li><a href="javascript:;" class="like-product like-product-1712481" data-is-info-page="1" data-like="2" data-name="{{ @$product->name }}" data-id="1712481" data-text-like="Thích" data-text-unlike="Bỏ thích" data-login="Vui lòng đăng nhập trước <br/><a class='btn btn-success' href='https://minhthanhaudio.com/user-login.html'>Đăng nhập</a>"><i class="fa fa-thumbs-o-up"></i> Thích</a></li>
                                                <li style="display:none"><a href="javascript:;">So sánh</a></li>
                                                <li>Lượt xem: {{ $product->views }}</li>
                                                <li>Ngày đăng: {{ $product->created_at_display }}</li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="v2_bnc_products_details_box_info">

                                            <div class="v2_bnc_products_details_box_price">

                                                <span class="key">Giá sản phẩm: </span><span class="price">{{ number_format($product->price) }} đ</span>
                                            </div>

                                            <!-- Giá Theo số lượng -->
                                            <!-- End Giá Theo số lượng -->

                                            <!-- Giá Theo Thuộc Tính -->
                                            <!-- End Giá Theo Thuộc Tính -->

                                            <!-- Giá Theo Thuộc Tính 2 -->
                                            <!-- End Giá Theo Thuộc Tính 2 -->

                                            <ul class="no-margin no-padding">
                                                <!-- Color-->
                                                <!-- End Color-->

                                                <!-- Size -->
                                                <!-- End Size -->

                                                <!-- Code Products Qr -->
{{--                                                <li class="clearfix"></li>--}}
{{--                                                <li class="key">Mã QR: </li>--}}
{{--                                                <li class="value"><img src="https://chart.googleapis.com/chart?chs=120x120&amp;cht=qr&amp;chl=http://minhthanhaudio.com/case-main-h87-i7-4790-ram-16g-vga-1060&amp;choe=UTF-8" class="img-qr"></li>--}}
{{--                                                <li class="clearfix"></li>--}}
                                                <!-- End Code Products Qr -->



                                                <!-- Code Products -->
                                                <!-- End Code Products -->




                                                <li class="key">Bảo hành :</li>
                                                <li class="value">
                                                    {{ @$product->warranty_policy }}</li>
                                                <li class="clearfix"></li>

                                                <!-- Condition -->
                                                <li class="key">Tình trạng: </li>
                                                <li class="value condition">
                                                    {{ @$product->is_new_display }}
                                                </li>
                                                <li class="clearfix"></li>
                                                <!-- End condition -->


                                                <li class="key">Nhà cung cấp: </li>
                                                <li class="value">
                                                    {{ !empty($product->supplier->name) ? $product->supplier->name : "(Chưa có thông tin)" }}
                                                </li>
                                                <li class="clearfix"></li>

                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>



                                        {{--<a href="javascript:;" class="btn-buy hidden" data-toggle="modal" data-target="#quickBuy">
                                            <span class="glyphicon glyphicon-shopping-cart"></span> Mua ngay</a>--}}
                                        <a href="{{ route('portal.add_to_cart',$product->id) }}" class="btn-buy" id="add-cart" data-price-float="10100000.00.00" data-name="{{ @$product->name }}" data-product="1712481">
                                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                        <a href="{{ route('portal.by_now',$product->id) }}" id="payment" class="btn-buynow">
                                            <button class="add-cart btn-buy quick-buy-custom" data-product="1712481"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Mua ngay</button>
                                        </a>
                                        <div class="clearfix"></div>

                                        <!-- Like share facebook,google,twitter -->
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <div class="addthis_inline_share_toolbox" data-url="https://minhthanhaudio.com/case-main-h87-i7-4790-ram-16g-vga-1060" data-title="{{ @$product->name }}" data-description="Chuyên cung cấp, phân phối - bán buôn - bán lẻ các loại máy tính cũ linh kiện máy tính cũ, laptop, màn hình máy tính cũ các loại với chất lượng cao bảo hành lâu dài. Mua bán dàn Games - Net cũ toàn quốc, Mua bán, trao đổi, nâng cấp linh kiện máy tính cũ các loại với giá tốt nhất" style="clear: both;"><div id="atstbx2" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-aab117bc-a54e-4ec2-b9fc-e5908c54547f" role="region"><span id="at-aab117bc-a54e-4ec2-b9fc-e5908c54547f" class="at4-visually-hidden">AddThis Sharing Buttons</span><div class="at-share-btn-elements"><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-facebook" style="background-color: rgb(59, 89, 152); border-radius: 0px;"><span class="at4-visually-hidden">Share to Facebook</span><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-1" class="at-icon at-icon-facebook" style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"><title id="at-svg-facebook-1">Facebook</title><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span><span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Facebook</span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-twitter" style="background-color: rgb(29, 161, 242); border-radius: 0px;"><span class="at4-visually-hidden">Share to Twitter</span><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-2" class="at-icon at-icon-twitter" style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"><title id="at-svg-twitter-2">Twitter</title><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path></g></svg></span><span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Twitter</span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-compact" style="background-color: rgb(255, 101, 80); border-radius: 0px;"><span class="at4-visually-hidden">Share to Thêm...</span><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-3" class="at-icon at-icon-addthis" style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"><title id="at-svg-addthis-3">AddThis</title><g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path></g></svg></span><span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Thêm...</span></a></div></div></div>
                                        <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58203dbf79d909eb"></script> <br>
                                        <!-- End Like share facebook,google,twitter -->
                                    </div>
                                    <!-- End Details -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Products details --><!-- Products Details Tab -->
                <div class="f-product-view-tab">
                    <div class="container">
                        <div class="f-product-view-tab-header">
                            <ul id="f-pr-page-view-tabid" class="nav-tabs">
                                <li class="active"><a href="#f-pr-view-01" data-toggle="tab">Mô tả</a></li>
                                <li><a href="#f-pr-view-02" data-toggle="tab">Mô tả vắn tắt</a></li>
                            </ul>
                            <div>
                                {!! @$product->description_display !!}
                            </div>
                            <div>
                                {!! @$product->content_display !!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        {{--<div class="f-product-view-tab-body tab-content">
                            <div id="f-pr-view-01" class="tab-content tab-pane active">
                                <h2 style="box-sizing: border-box; margin: 23px 0px 11.5px; padding: 0px; transition: all 0.5s ease 0s; font-family: font-main; line-height: 1.1; color: rgb(68, 68, 68); font-size: 45px; letter-spacing: 0.1px; text-align: justify; background-color: rgb(249, 249, 249);"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><span style="box-sizing: border-box; font-size: 18px;">CẤU HÌNH CHI TIẾT:</span></span></span></h2>

                                <table style="box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; background-color: rgb(249, 249, 249); letter-spacing: 0.1px; text-align: justify; color: rgb(0, 91, 170); font-family: 'helvetica neue', helvetica, arial, sans-serif; font-size: 14px; margin-bottom: 20px; max-width: 100%; width: 800px;">
                                    <tbody style="box-sizing: border-box;">
                                    <tr style="box-sizing: border-box; background-color: rgba(255, 255, 255, 0.05);">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><font face="arial, helvetica, sans-serif" style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 13px;">Vỏ Case</span></font></span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><font face="arial, helvetica, sans-serif" style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 13px;">Gaming kính cường lực, 3 Fan LED&nbsp;</span></font></span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box; background-color: rgba(0, 0, 0, 0.05);">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><font face="arial, helvetica, sans-serif" style="box-sizing: border-box;">Nguồn</font></span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><font face="arial, helvetica, sans-serif" style="box-sizing: border-box;">Nguồn công suất thực 500W</font></span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box; background-color: rgba(255, 255, 255, 0.05);">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><font style="box-sizing: border-box; transition: all 0.2s ease 0s; outline: 0px; background-color: transparent; color: rgb(0, 0, 0); font-size: 13px;"><a href="http://minhthanhaudio.com/cpu-cu" style="box-sizing: border-box; transition: all 0.2s ease 0s; text-decoration-line: none; outline: 0px; background-color: transparent; color: rgb(0, 0, 0);"><span style="box-sizing: border-box;">M</span></a><span style="box-sizing: border-box;">ain</span></font></span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><font color="rgb(176, 0, 0);" face="arial, helvetica, sans-serif">Asrock H87 Ferformance khủng - 4 khe ram full zize</font></td>
                                    </tr>
                                    <tr style="box-sizing: border-box; background-color: rgba(0, 0, 0, 0.05);">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><font face="arial, helvetica, sans-serif" style="box-sizing: border-box;">Chip</font></span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><font face="arial, helvetica, sans-serif" style="box-sizing: border-box;">I7 4790</font></span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box; background-color: rgba(255, 255, 255, 0.05);">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Tản nhiệt CPU</span></span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);">Tản tháp, ống đồng, LED RGB</span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box; background-color: rgba(0, 0, 0, 0.05);">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><font style="box-sizing: border-box; transition: all 0.2s ease 0s; outline: 0px; background-color: transparent; color: rgb(0, 0, 0); font-size: 13px;"><a href="http://minhthanhaudio.com/o-cung-cu" style="box-sizing: border-box; transition: all 0.2s ease 0s; text-decoration-line: none; outline: 0px; background-color: transparent; color: rgb(0, 0, 0);"><span style="box-sizing: border-box;">R</span></a><span style="box-sizing: border-box;">am</span></font></span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><font face="arial, helvetica, sans-serif" style="box-sizing: border-box;">Ram DR3 16G bus 1600</font></span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box; background-color: rgba(255, 255, 255, 0.05);">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><font style="box-sizing: border-box; transition: all 0.2s ease 0s; outline: 0px; background-color: transparent; color: rgb(0, 0, 0); font-size: 13px;"><a href="http://minhthanhaudio.com/vga-card-man-hinh-cu" style="box-sizing: border-box; transition: all 0.2s ease 0s; text-decoration-line: none; outline: 0px; background-color: transparent; color: rgb(0, 0, 0);"><span style="box-sizing: border-box;">V</span></a><span style="box-sizing: border-box;">GA - Card đồ họa</span></font></span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><font style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 13px;">Gigabyte GTX 1060-3G dual fan</span></font></span></span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box; background-color: rgba(0, 0, 0, 0.05);">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><font face="arial, helvetica, sans-serif" style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 13px;">SSD</span></font></span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><font style="box-sizing: border-box;"><span style="box-sizing: border-box; font-size: 13px;">120G</span></font></span></span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box;">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);">HDD</span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);">Western Blue 500G/7200</span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box;">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);">Bảo hành</span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);">3 tháng 1 đổi 1</span></td>
                                    </tr>
                                    <tr style="box-sizing: border-box;">
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);">Tình trạng linh kiện</span></td>
                                        <td style="box-sizing: border-box; padding: 8px; border-top-style: solid; border-top-color: rgb(221, 221, 221); line-height: 1.42857; vertical-align: top;"><span style="box-sizing: border-box; color: rgb(0, 0, 0);">Mới 98 - 100%</span></td>
                                    </tr>
                                    </tbody>
                                </table></div>
                            <div id="f-pr-view-02" class="tab-content tab-pane ">
                            </div>
                        </div>--}}
                    </div>
                </div>
                <!-- End Products Details Tab -->
{{--                <div class="f-product-view-tags">--}}
{{--                    <div class="container">--}}
{{--                        <div class="f-product-view-tags-body">--}}
{{--                            <span><i class="fa fa-tags"></i> Tags: <a href="https://minhthanhaudio.com/tag/" title="" target="_blank"></a></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Products Related -->
                <script type="text/javascript">
                    // var urlNow=document.URL;
                </script>


                <!-- End Products Related -->
            </div>
        </div>

        <!--Like Product-->
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/likeproduct.css') }}">
        <script src="{{ asset('portal/likeproduct.js') }}"></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('portal/toastr.css') }}">
        <script src="{{ asset('portal/toastr.js') }}"></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('portal/rater.css') }}">
        <script src="{{ asset('portal/productrater.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                Likeproduct.init();
            });
        </script></section>
@stop
@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#img_01").elevateZoom(
                {
                    gallery:'slidezoompage',
                    cursor: 'pointer',
                    galleryActiveClass: 'active',
                    imageCrossfade: true,
                    scrollZoom : true,
                    easing : true
                });
//
            $("#img_01").bind("click", function(e) {
                var ez = $('#img_01').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                var src=$(this).find('img').attr('src');
                $('#img_01').attr('src',src);

                return false;
            });
            $("#slidezoompage a").bind("click", function(e) {
                var src=$(this).find('img').attr('src');
                $('#img_01').attr('src',src);

                return false;
            });
        });

        $(document).ready(function() {
            function attach() {
                $(".v2_bnc_view_info_page .item").stick_in_parent();
            }

            attach();
        });
    </script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            var tmpLenght=parseInt($('.bodersp .priceP').length);
            var last='';
            $('.bodersp .priceP').each(function(k,v){
                var el=$(v);
                if(k==tmpLenght-1){
                    last=el.text();
                    var last1=last.split(" - ");

                    $(this).find('strong').text('>'+last1[0]);

                }
            });
            console.log(last);
        });
        function changeQuantity(dt) {
            var vl = dt.value;
            $(dt).find('option').each(function(k, v) {
                var el = $(v);
                if (el.attr('value') == vl) {
                    var price = el.attr('data-price_quantity');
                    var forprice = numberFormat(price, 0, '.', '.') + ' đ';
                    el.prop('selected',true);
                    $(this).parents('.v2-home-pr-item').find(".v2-home-pr-item-price").html('Giá: ' + forprice);
                }
            });

        }

        $('body').on('keyup','input[name="quantity"]',function(e){
            var pid=$(this).attr('data-id');
            var vl=parseInt($(this).val());

            var price=0;
            $('select[name="BNC-select-nxt-'+pid+'"]').find('option').each(function(k, v) {
                var el = $(v);
                var start=parseInt(el.attr('data-start'));
                var end=parseInt(el.attr('data-end'));
                console.log(el.attr('value'));
                if((vl >= start && vl <= end ) || vl > end){
                    price=el.attr('value');
                }

            });

            if(price!=0){
                var forprice = numberFormat(price, 0, '.', '.') + ' đ';
            }else{
                var forprice =$(this).attr('data-default-price');
            }

            $(this).parents('.f-product-view-info-detail').find(".price").html('Giá: ' + forprice);
            $('.BNC-quantity-'+pid).val(vl);
        });

        function numberFormat(number, decimals, dec_point, thousands_sep) {
            number = (number + '').replace(/[^0-9]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    </script>
@endsection
