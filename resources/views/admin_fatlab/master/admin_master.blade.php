<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.html') }}">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('backend/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css"
          media="screen"/>
    <link rel="stylesheet" href="{{ asset('backend/css/owl.carousel.css') }}" type="text/css">

    <!--right slidebar-->
    <link href="{{ asset('backend/css/slidebars.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style-responsive.css') }}" rel="stylesheet"/>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/backend/js/html5shiv.js') }}"></script>
    <script src="{{ asset('backend/js/respond.min.js') }}"></script>
    <![endif]-->
    @yield('custom_css')
</head>

<body>
<section id="container">
    <!--header start-->
    @include('admin_fatlab.master.includes.header')
    <!--header end-->
    <!--sidebar start-->
    <aside>
        @include('admin_fatlab.master.includes.menu')
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row state-overview">
                <div class="col-lg-12 col-sm-12">
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="fa fa-user"></i>
                        </div>
                    </section>
                </div>
            </div>
            @yield('content')
        </section>
    </section>

    <!--main content end-->

    <!-- Right Slidebar start -->

    <!-- Right Slidebar end -->

    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2018 &copy; Copyright by Minhthanhaudio
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('backend/js/jquery.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('backend/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/jquery.sparkline.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('backend/js/owl.carousel.js') }}"></script>
<script src="{{ asset('backend/js/jquery.customSelect.min.js') }}"></script>
<script src="{{ asset('backend/js/respond.min.js') }}"></script>

<!--right slidebar-->
<script src="{{ asset('backend/js/slidebars.min.js') }}"></script>

<!--common script for all pages-->
<script src="{{ asset('backend/js/common-scripts.js') }}"></script>

<!--script for this page-->
<script src="{{ asset('backend/js/sparkline-chart.js') }}"></script>
<script src="{{ asset('backend/js/easy-pie-chart.js') }}"></script>
<script src="{{ asset('backend/js/count.js') }}"></script>

<script>

    //owl carousel

    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

</script>
@yield('custom_javascript')
</body>
<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
