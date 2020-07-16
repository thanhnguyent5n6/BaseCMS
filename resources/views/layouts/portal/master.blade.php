<html lang="vi" xmlns="http://www.w3.org/1999/xhtml">
<!-- Edit By @DTM -->
<head>
    <!-- Include Header Meta -->
    <!--<base s_name="maytinhgiahung" idw="8186" href="E:/xampp/htdocs/giahung_html" extention=".html" />-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('page_title')</title>
    <meta name="description"
          content="Chuyên cung cấp, phân phối - bán buôn - bán lẻ các loại loa, micc, thu âm">
    <meta name="keywords"
          content="loa, mua loa, loa karaoke">
    <meta name="robots" content="INDEX, FOLLOW"/>
    <meta property="og:title" content="MINH THÀNH AUDIO"/>
    <meta property="og:description"
          content="Chuyên cung cấp, phân phối - bán buôn - bán lẻ các loại loa, micc, thu âm"/>
    <meta property="og:site_name" content="MINH THÀNH AUDIO"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v3.3'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="400728673383770">
    </div>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111291465-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-111291465-4');
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5f0f2d8e67771f3813c11a76/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- End Include Header Meta-->

    <!-- Include CSS -->
    <!-- Reset Css-->
    <link href="{{ asset('portal/91637/statics/css/reset.css?v=7') }}" rel="stylesheet" media="screen">
    <!-- End Reset Css-->

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('portal/bootstrap.min.css') }}">
    <!-- End Bootstrap Css -->

    <!-- Css -->
    <link href="{{ asset('portal/91637/statics/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('portal/91637/statics/plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('portal/91637/statics/plugins/owl-carousel/owl.transitions.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('portal/91637/statics/plugins/camera-slideshow/camera.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('portal/91637/statics/plugins/wow/animate.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('portal/91637/statics/plugins/tooltipster-master/tooltipster.bundle.min.css') }}" rel="stylesheet"
          media="screen">
    <link href="{{ asset('portal/91637/statics/css/owl-slideshow-main.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('portal/91637/statics/css/style.css?v=7') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('portal/91637/statics/css/mobile.css?v=11') }}" rel="stylesheet" media="screen">
    <!-- End Css -->

    <!-- FontIcon -->
    <link href="{{ asset('portal/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css">
    <!-- End FontIcon -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=vietnamese"
          rel="stylesheet">
    <!-- End Google Font -->

    <!--- Css Validation -->
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/validationEngine.jquery.css') }}">
    <!--- End Css Validation -->

    <!--- Css Loading -->
    <link href="{{ asset('portal/loading.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('portal/jquery.nouislider.min.css') }}" rel="stylesheet">
    <!--- End Css Loading -->

    <!-- JS -->
    <script type="text/javascript" src="{{ asset('portal/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('portal/less.js') }}"></script>
    <script type="text/javascript" src="{{ asset('portal/jwplayer.js') }}"></script>
    <script src="{{ asset('portal/jquery.nouislider.all.min.js') }}"></script>
    <script src="{{ asset('portal/wow.min_.js') }}"></script>
    <script src="{{ asset('portal/owl.carousel.js') }}"></script>
    <script src="{{ asset('portal/tooltipster.bundle.min.js') }}"></script>
    <script src="{{ asset('portal/tooltipster-follower.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('portal/js_customs.js') }}"></script>
    <script type="text/javascript" src="{{ asset('portal/sticky-kit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('portal/modernizr.custom.97074.js') }}"></script>
    <script type="text/javascript" src="{{ asset('portal/jquery.hoverdir.js') }}"></script>
    <!-- End JS -->
    @yield('page_css')

    <script>
        new WOW().init();
    </script><!-- End Include CSS -->
    <script>
        $(document).ready(function () {
            $('.tooltipItem').tooltipster({
                plugins: ['follower'],
                contentCloning: true
            });
        });
    </script>
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="ANEHeNPX"></script>

<!-- Include popup so sanh -->
<!-- So sánh sánh sản phẩm -->
<div id="f-compare" status="closed">
    <div class="f-compare-title"><i></i><span>So sánh sản phẩm</span></div>
    <div class="f-compare-body">
        <ul class="f-compare-ul no-margin no-padding">

        </ul>
        <div class="f-compare-info"><span id="compare-notify"></span></div>
        <div class="f-compare-button" style="display: none;"><a href="/product-compare.html">So sánh </a></div>
    </div>
</div>
<!-- End So sánh sánh sản phẩm --><!-- End include popup so sanh-->

<!-- Full Code -->
<!-- Copyright -->
<h1 style="display: none">{{ @$tenant_info->name }}</h1>
<!-- End Copyright -->
<!-- Header -->
<header class="v2_bnc_header ">
    <!-- Header Top -->
    <div class="v2_bnc_header_top">
        <div class="container">
            <div class="row">
                <div class="hidden-xs hidden-sm col-md-6 col-lg-6">
                    <!-- Language -->
                    <div class="v2_bnc_language hidden">
                        <div class="v2_bnc_language_drop">Ngôn ngữ <i class="fa fa-angle-down"></i></div>
                        <ul>
                            <input type="hidden" id="langRedirectUrl" value="http://giahung.vn/"/>
                        </ul>
                    </div>
                    <!-- End Language -->
                    <div class="v2_bnc_header_info">
                        <div class="v2_bnc_header_info_phone"><a
                                href="tel:{{ $tenant_info->phone }} - {{ $tenant_info->hotline_1 }} - {{ $tenant_info->hotline_2 }}"><i class="fa fa-phone"></i>
                                {{ $tenant_info->phone }} - {{ $tenant_info->hotline_1 }} - {{ $tenant_info->hotline_2 }}</a></div>
                        <div class="v2_bnc_header_info_mail"><a href="mailto:{{ @$tenant_info->email }}"><i
                                    class="fa fa-envelope"></i>&nbsp;{{ @$tenant_info->email }}</a></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <!-- Cart -->
                    <div id="box-cart">
{{--                        @include('layouts.portal.cart')--}}
                    </div>
                    <!-- End Cart -->

                    <!-- Login and Register -->
                    <div class="v2_bnc_login_register">
                        <div class="v2_bnc_login_account">
                            <ul class="v2_bnc_login_bar">
                                <li><a href="/user-login.html" rel="nofollow"><i class="fa fa-user"></i> Đăng nhập</a>
                                </li>
                                <li><a href="/user-regis.html" rel="nofollow"><i class="fa fa-user-plus"></i> Đăng
                                        ký</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Login and Register -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->
    <!-- Header Bottom -->
    <div class="v2_bnc_header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <!-- Logo -->
                    <div id="logo">
                        <a href="https://giahung.vn" rel="nofollow" class="v2_bnc_logo" title='{{ @$tenant_info->name }}'>
                            <img src="{{ asset('/portal/img/logo.jpg') }}"
                                 width="190" height="80" class="img-responsive" alt='{{ @$tenant_info->name }}'/>
                        </a>
                    </div>
                    <!-- End Logo -->
                </div>
                <div class="hidden-xs hidden-sm col-md-9 col-lg-9">
                    <img clas="img-responsive"
                         src="https://cdn-img-v2.webbnc.net/uploadv2/web/81/8186/adv/2018/12/09/03/47/1544369329_32.png?v=4"
                         alt="" class="img-responsive"/>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
    @include('layouts.portal.menu_top')
</header>
<style>
    body {

        background-position: center top;
        background-attachment: fixed;
    }
</style>
<!-- End Header -->
<!-- Content -->

    @yield('page_content')
    <!-- Popup Adv Home Loadpage-->
    <!-- End Popup Adv Home Loadpage -->

<!-- End Content -->
<script>
    // Get the modal Adv Popup Home
    var modal = document.getElementById('myModal');

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    // When the user clicks on <span> (x), close the modal
    /*span.onclick = function () {
        modal.style.display = "none";
    }*/

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.close').click(function () {
            $('.modal').css('display', 'none');
        });
    });
</script>
<!--Footer-->
<footer class="v2_bnc_footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 v2_bnc_footer_left">
                <!-- Info Company -->
                <div class="v2_bnc_footer_info_company">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-top-20"><span
                                style="color:rgb(255, 255, 255);"><span style="font-size:16px"><strong>{{ @$tenant_info->name }}</strong></span><br/>
<br/>
  {{ @$tenant_info->address }}<br/>
  Điện thoại: {{ @$tenant_info->phone }}<br/>
  Hotline: {{ @$tenant_info->hotline_1 }} - {{ @$tenant_info->hotline_2 }}</span><br/>
                            <span style="color:rgb(255, 255, 255)">  Email: {{ @$tenant_info->email }}</span></div>

                        <div style="height: 230px; overflow: hidden;" class="col-lg-6 col-md-6 hidden-sm hidden-xs">
                            <div class="fb-page" data-href="https://www.facebook.com/minhthanhaudiohanoi/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/minhthanhaudiohanoi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/minhthanhaudiohanoi/">Minh Thành Audio</a></blockquote></div>
                        </div>
                    </div>
                </div>
                <!-- End Info Company -->
            </div>
            <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
                <!-- Footer Right -->
                <div class="v2_bnc_footer_right">
                    <div id="v2_bnc_menu_bottom" class="v2_bnc_footer_right_top">
                        <div class="col-md-12 col-sm-12 col-xs-12 full-xs">
                            <h4 class="v2_bnc_footer_title"><a href="">Chính sách chung</a></h4>
                            <ul class="v2_bnc_footer_links">
                                <li>
                                    <a href="javascript:;"><i class="fa fa-angle-right"></i> Hướng dẫn đổi
                                        trả hàng</a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="fa fa-angle-right"></i> Hướng dẫn thanh
                                        toán</a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="fa fa-angle-right"></i> Hướng dẫn mua
                                        hàng</a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="fa fa-angle-right"></i> Chính sách bảo hành</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="v2_bnc_respon_menu_bottom" class="v2_bnc_footer_right_top">
                        <div class="col-md-3 col-sm-3 col-xs-12 full-xs v2_bnc_footer_item">
                            <h4 class="v2_bnc_footer_title"><a href="">Chính sách chung <i class="fa fa-angle-down"></i></a>
                            </h4>
                            <ul class="v2_bnc_footer_links">
                                <li>
                                    <a href="javascript:;">Hướng dẫn đổi trả hàng</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Hướng dẫn thanh toán</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Hướng dẫn mua hàng</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Chính sách bảo hành</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Footer Right -->
            </div>
            {{--<div class="hidden-xs hidden-sm col-md-3 col-lg-3">
                <div class="v2_bnc_block_analytics">
                    <div class="v2_bnc_block_title"><span>Thống kê</span></div>
                    <div class="v2_bnc_block_body">
                        <ul>
                            <li><img src="../themes/90202/statics/imgs/todayv.png" alt=""> Ngày: <span
                                    id="nxtAnalyticD"></span></li>
                            <li><img src="../themes/90202/statics/imgs/totalv.png" alt=""> Tuần: <span
                                    id="nxtAnalyticW"></span></li>
                            <li><img src="../themes/90202/statics/imgs/todayh.png" alt=""> Tháng: <span
                                    id="nxtAnalyticM"></span></li>
                            <li><img src="../themes/90202/statics/imgs/totalh.png" alt=""> Năm: <span
                                    id="nxtAnalyticY"></span></li>
                            <li><img src="../themes/90202/statics/imgs/totalv.png" alt=""> Online: <span
                                    id="nxtAnalyticOl"></span></li>
                        </ul>
                    </div>
                </div>
            </div>--}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="v2_bnc_footer_bottom">
                    <small class='copyright hide '></small>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Footer-->

<!-- Scroll To Top -->
<div class="v2_bnc_scrolltop">
    <a class="v2_bnc_icon_scrolltop" title="Lên đầu trang !">
        <i class="fa fa-angle-double-up fa-2x"></i>
    </a>
</div>
<!-- End Scroll To Top -->


<script type="text/javascript"
        src="{{ asset('/portal/product.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('body').data('home_url', 'https://giahung.vn');
        //$('body').data('page_url', '');
        $('body').data('extension', '.html');
        Product.init();
        WebCommon.init();
        // alert("-Golbal aler- "+$('body').data('home_url'));
    });
</script>

<!-- End Full Code -->

<!-- Include JS -->
<script src="{{ asset('portal/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/started_js.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/webcommon.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/jquery.validationEngine.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/jquery.validationEngine-vi.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/loading-overlay.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/load.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/fastCart.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/portal/jquery.fancybox.css') }}"/>
<script src="{{ asset('portal/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('portal/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/search.js') }}"></script>
<!-- Camera SlideShow -->
<script type='text/javascript' src="{{ asset('portal/jquery.easing.1.3.js') }}"></script>
<script type='text/javascript' src="{{ asset('portal/camera.min.js') }}"></script>
@yield('page_script')
<!-- End Camera SlideShow -->
<!-- End Include JS -->

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function BNCcallback(data) {
        console.log(data);
    }

    var url = document.URL;
    var idW = '8186';
    var uid = '';
    var title = document.title;

</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124328798-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag("js", new Date());

    gtag("config", "UA-124328798-1");
</script>
@include('page.includes.page_script')
</body>
</html>

