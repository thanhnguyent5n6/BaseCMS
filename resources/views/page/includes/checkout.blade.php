<html lang="vi" class="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thanh toán</title>
    <link href="{{ asset('portal/checkout/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('portal/checkout/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/checkout/toastr.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('portal/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('portal/checkout/_all.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('portal/checkout/style.css') }}">
    <style type="text/css">.help-block-error2 {
            display: block !important;
            margin-top: -12px !important;
            margin-bottom: 0px !important;
            font-size: 11px !important;
        }

        .focus {
            border: red solid 1px;
        }

        ul.bankList {
            clear: both;
            height: 202px;
            width: 636px;
        }

        ul.bankList li {
            list-style-position: outside;
            list-style-type: none;
            cursor: pointer;
            float: left;
            margin-right: 0;
            padding: 5px 2px;
            text-align: center;
            width: 90px;
        }

        i.VISA, i.MASTE, i.AMREX, i.JCB, i.VCB, i.TCB, i.MB, i.VIB, i.ICB, i.EXB, i.ACB, i.HDB, i.MSB, i.NVB, i.DAB, i.SHB, i.OJB, i.SEA, i.TPB, i.PGB, i.BIDV, i.AGB, i.SCB, i.VPB, i.VAB, i.GPB, i.SGB, i.NAB, i.BAB {
            width: 80px;
            height: 30px;
            display: block;
            background: url(https://www.nganluong.vn/webskins/skins/nganluong/checkout/version3/images/bank_logo.png) no-repeat;
        }

        i.MASTE {
            background-position: 0px -31px
        }

        i.AMREX {
            background-position: 0px -62px
        }

        i.JCB {
            background-position: 0px -93px;
        }

        i.VCB {
            background-position: 0px -124px;
        }

        i.TCB {
            background-position: 0px -155px;
        }

        i.MB {
            background-position: 0px -186px;
        }

        i.VIB {
            background-position: 0px -217px;
        }

        i.ICB {
            background-position: 0px -248px;
        }

        i.EXB {
            background-position: 0px -279px;
        }

        i.ACB {
            background-position: 0px -310px;
        }

        i.HDB {
            background-position: 0px -341px;
        }

        i.MSB {
            background-position: 0px -372px;
        }

        i.NVB {
            background-position: 0px -403px;
        }

        i.DAB {
            background-position: 0px -434px;
        }

        i.SHB {
            background-position: 0px -465px;
        }

        i.OJB {
            background-position: 0px -496px;
        }

        i.SEA {
            background-position: 0px -527px;
        }

        i.TPB {
            background-position: 0px -558px;
        }

        i.PGB {
            background-position: 0px -589px;
        }

        i.BIDV {
            background-position: 0px -620px;
        }

        i.AGB {
            background-position: 0px -651px;
        }

        i.SCB {
            background-position: 0px -682px;
        }

        i.VPB {
            background-position: 0px -713px;
        }

        i.VAB {
            background-position: 0px -744px;
        }

        i.GPB {
            background-position: 0px -775px;
        }

        i.SGB {
            background-position: 0px -806px;
        }

        i.NAB {
            background-position: 0px -837px;
        }

        i.BAB {
            background-position: 0px -868px;
        }

        ul.cardList li {
            cursor: pointer;
            float: left;
            margin-right: 0;
            padding: 0px;
            text-align: center;
            width: 82px;
            box-shadow: none !important;
            margin: 3px 3px;
            border: 1px solid #eee;
        }

        .bank-online-methods .iradio_minimal-blue {
            margin: 0 !important;
            display: none;
        }

        .bank-online-methods label {
            padding-left: 0 !important;
        }

        .bank-online-methods:hover {
            border: #0EB2EF solid 1px !important;
        }</style>
    <style type="text/css">.fancybox-margin {
            margin-right: 17px;
        }</style>
    <style type="text/css">.fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset > div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }
            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_dialog {
            background: rgba(82, 82, 82, .7);
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_dialog_advanced {
            border-radius: 8px;
            padding: 10px
        }

        .fb_dialog_content {
            background: #fff;
            color: #373737
        }

        .fb_dialog_close_icon {
            background: url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
            cursor: pointer;
            display: block;
            height: 15px;
            position: absolute;
            right: 18px;
            top: 17px;
            width: 15px
        }

        .fb_dialog_mobile .fb_dialog_close_icon {
            left: 5px;
            right: auto;
            top: 5px
        }

        .fb_dialog_padding {
            background-color: transparent;
            position: absolute;
            width: 1px;
            z-index: -1
        }

        .fb_dialog_close_icon:hover {
            background: url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
        }

        .fb_dialog_close_icon:active {
            background: url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
        }

        .fb_dialog_iframe {
            line-height: 0
        }

        .fb_dialog_content .dialog_title {
            background: #6d84b4;
            border: 1px solid #365899;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            margin: 0
        }

        .fb_dialog_content .dialog_title > span {
            background: url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
            float: left;
            padding: 5px 0 7px 26px
        }

        body.fb_hidden {
            height: 100%;
            left: 0;
            margin: 0;
            overflow: visible;
            position: absolute;
            top: -10000px;
            transform: none;
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading {
            background: url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
            min-height: 100%;
            min-width: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 10001
        }

        .fb_dialog.fb_dialog_mobile.loading.centered {
            background: none;
            height: auto;
            min-height: initial;
            min-width: initial;
            width: auto
        }

        .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
            background: none
        }

        .loading.centered #fb_dialog_loader_close {
            clear: both;
            color: #fff;
            display: block;
            font-size: 18px;
            padding-top: 20px
        }

        #fb-root #fb_dialog_ipad_overlay {
            background: rgba(0, 0, 0, .4);
            bottom: 0;
            left: 0;
            min-height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 10000
        }

        #fb-root #fb_dialog_ipad_overlay.hidden {
            display: none
        }

        .fb_dialog.fb_dialog_mobile.loading iframe {
            visibility: hidden
        }

        .fb_dialog_mobile .fb_dialog_iframe {
            position: sticky;
            top: 0
        }

        .fb_dialog_content .dialog_header {
            background: linear-gradient(from(#738aba), to(#2c4987));
            border-bottom: 1px solid;
            border-color: #043b87;
            box-shadow: white 0 1px 1px -1px inset;
            color: #fff;
            font: bold 14px Helvetica, sans-serif;
            text-overflow: ellipsis;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
            vertical-align: middle;
            white-space: nowrap
        }

        .fb_dialog_content .dialog_header table {
            height: 43px;
            width: 100%
        }

        .fb_dialog_content .dialog_header td.header_left {
            font-size: 12px;
            padding-left: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .dialog_header td.header_right {
            font-size: 12px;
            padding-right: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .touchable_button {
            background: linear-gradient(from(#4267B2), to(#2a4887));
            background-clip: padding-box;
            border: 1px solid #29487d;
            border-radius: 3px;
            display: inline-block;
            line-height: 18px;
            margin-top: 3px;
            max-width: 85px;
            padding: 4px 12px;
            position: relative
        }

        .fb_dialog_content .dialog_header .touchable_button input {
            background: none;
            border: none;
            color: #fff;
            font: bold 12px Helvetica, sans-serif;
            margin: 2px -12px;
            padding: 2px 6px 3px 6px;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog_content .dialog_header .header_center {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            vertical-align: middle
        }

        .fb_dialog_content .dialog_content {
            background: url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
            border: 1px solid #4a4a4a;
            border-bottom: 0;
            border-top: 0;
            height: 150px
        }

        .fb_dialog_content .dialog_footer {
            background: #f5f6f7;
            border: 1px solid #4a4a4a;
            border-top-color: #ccc;
            height: 40px
        }

        #fb_dialog_loader_close {
            float: left
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_button {
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
            visibility: hidden
        }

        #fb_dialog_loader_spinner {
            animation: rotateSpinner 1.2s linear infinite;
            background-color: transparent;
            background-image: url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
            background-position: 50% 50%;
            background-repeat: no-repeat;
            height: 24px;
            width: 24px
        }

        @keyframes rotateSpinner {
            0% {
                transform: rotate(0deg)
            }
            100% {
                transform: rotate(360deg)
            }
        }

        .fb_iframe_widget {
            display: inline-block;
            position: relative
        }

        .fb_iframe_widget span {
            display: inline-block;
            position: relative;
            text-align: justify
        }

        .fb_iframe_widget iframe {
            position: absolute
        }

        .fb_iframe_widget_fluid_desktop, .fb_iframe_widget_fluid_desktop span, .fb_iframe_widget_fluid_desktop iframe {
            max-width: 100%
        }

        .fb_iframe_widget_fluid_desktop iframe {
            min-width: 220px;
            position: relative
        }

        .fb_iframe_widget_lift {
            z-index: 1
        }

        .fb_iframe_widget_fluid {
            display: inline
        }

        .fb_iframe_widget_fluid span {
            width: 100%
        }</style>
</head>
<body>

<div id="loadding" style="display: none;">
    <div class="small1">
        <div class="small ball smallball1"></div>
        <div class="small ball smallball2"></div>
        <div class="small ball smallball3"></div>
        <div class="small ball smallball4"></div>
    </div>
    <div class="small2">
        <div class="small ball smallball5"></div>
        <div class="small ball smallball6"></div>
        <div class="small ball smallball7"></div>
        <div class="small ball smallball8"></div>
    </div>
    <div class="bigcon">
        <div class="big ball"></div>
    </div>
</div>
<div class="wrapper">
    <div id="header">
        <div class="header-top">
            <div class="container">
                <div class="row"></div>
            </div>
        </div>
    </div>
    <div class="cf-main">
        <div class="container">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get('success') }}</li>
                        </ul>
                    </div>
                @endif
                <form id="onePageSubmit" name="onePageSubmit" method="POST"
                      action="{{ route('portal.post.checkout') }}">
                    {{ csrf_field() }}
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="cf-title address-list">
                            <div class="top"><span class="icon">1</span>Địa chỉ</div>
                            <div class="cf-middle-content">
                                <div class="form-group">
                                    <div class="input-icon right inner-addon right-addo"><i
                                            class="glyphicon "></i>
                                        <input type="text" name="name" required
                                                                          class="form-control" placeholder="Họ và tên">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-icon right"><i class="glyphicon "></i><input type="email" required
                                                                                                   name="email"
                                                                                                   class="form-control"
                                                                                                   placeholder="Email"
                                                                                                   value=""></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-icon right"><i class="glyphicon "></i><input type="text" required minlength="8"
                                                                                                   name="phone"
                                                                                                   class="form-control"
                                                                                                   placeholder="Số điện thoại"
                                                                                                   value=""></div>
                                </div>
                                <div class="row BNC_address_genral">
                                    {{--<div class="col-md-6 form-group "><select id="cityId" name="cus[cityId]"
                                                                              class="form-control BNC_cityId">
                                            <option name="" value="">Tỉnh/thành phố</option>
                                            <option name="An Giang" value="89">An Giang</option>
                                            <option name="Bà Rịa - Vũng Tàu" value="77">Bà Rịa - Vũng Tàu</option>
                                            <option name="Bắc Giang" value="24">Bắc Giang</option>
                                            <option name="Bắc Kạn" value="06">Bắc Kạn</option>
                                            <option name="Bạc Liêu" value="95">Bạc Liêu</option>
                                            <option name="Bắc Ninh" value="27">Bắc Ninh</option>
                                            <option name="Bến Tre" value="83">Bến Tre</option>
                                            <option name="Bình Dương" value="74">Bình Dương</option>
                                            <option name="Bình Phước" value="70">Bình Phước</option>
                                            <option name="Bình Thuận" value="60">Bình Thuận</option>
                                            <option name="Bình Định" value="52">Bình Định</option>
                                            <option name="Cà Mau" value="96">Cà Mau</option>
                                            <option name="Cần Thơ" value="92">Cần Thơ</option>
                                            <option name="Cao Bằng" value="04">Cao Bằng</option>
                                            <option name="Gia Lai" value="64">Gia Lai</option>
                                            <option name="Hà Giang" value="02">Hà Giang</option>
                                            <option name="Hà Nam" value="35">Hà Nam</option>
                                            <option name="Hà Nội" value="01">Hà Nội</option>
                                            <option name="Hà Tĩnh" value="42">Hà Tĩnh</option>
                                            <option name="Hải Dương" value="30">Hải Dương</option>
                                            <option name="Hải Phòng" value="31">Hải Phòng</option>
                                            <option name="Hậu Giang" value="93">Hậu Giang</option>
                                            <option name="Hồ Chí Minh" value="79">Hồ Chí Minh</option>
                                            <option name="Hòa Bình" value="17">Hòa Bình</option>
                                            <option name="Hưng Yên" value="33">Hưng Yên</option>
                                            <option name="Khánh Hòa" value="56">Khánh Hòa</option>
                                            <option name="Kiên Giang" value="91">Kiên Giang</option>
                                            <option name="Kon Tum" value="62">Kon Tum</option>
                                            <option name="Lai Châu" value="12">Lai Châu</option>
                                            <option name="Lâm Đồng" value="68">Lâm Đồng</option>
                                            <option name="Lạng Sơn" value="20">Lạng Sơn</option>
                                            <option name="Lào Cai" value="10">Lào Cai</option>
                                            <option name="Long An" value="80">Long An</option>
                                            <option name="Nam Định" value="36">Nam Định</option>
                                            <option name="Nghệ An" value="40">Nghệ An</option>
                                            <option name="Ninh Bình" value="37">Ninh Bình</option>
                                            <option name="Ninh Thuận" value="58">Ninh Thuận</option>
                                            <option name="Phú Thọ" value="25">Phú Thọ</option>
                                            <option name="Phú Yên" value="54">Phú Yên</option>
                                            <option name="Quảng Bình" value="44">Quảng Bình</option>
                                            <option name="Quảng Nam" value="49">Quảng Nam</option>
                                            <option name="Quảng Ngãi" value="51">Quảng Ngãi</option>
                                            <option name="Quảng Ninh" value="22">Quảng Ninh</option>
                                            <option name="Quảng Trị" value="45">Quảng Trị</option>
                                            <option name="Sóc Trăng" value="94">Sóc Trăng</option>
                                            <option name="Sơn La" value="14">Sơn La</option>
                                            <option name="Tây Ninh" value="72">Tây Ninh</option>
                                            <option name="Thái Bình" value="34">Thái Bình</option>
                                            <option name="Thái Nguyên" value="19">Thái Nguyên</option>
                                            <option name="Thanh Hóa" value="38">Thanh Hóa</option>
                                            <option name="Thừa Thiên Huế" value="46">Thừa Thiên Huế</option>
                                            <option name="Tiền Giang" value="82">Tiền Giang</option>
                                            <option name="Trà Vinh" value="84">Trà Vinh</option>
                                            <option name="Tuyên Quang" value="08">Tuyên Quang</option>
                                            <option name="Vĩnh Long" value="86">Vĩnh Long</option>
                                            <option name="Vĩnh Phúc" value="26">Vĩnh Phúc</option>
                                            <option name="Yên Bái" value="15">Yên Bái</option>
                                            <option name="Đà Nẵng" value="48">Đà Nẵng</option>
                                            <option name="Đắk Lắk" value="66">Đắk Lắk</option>
                                            <option name="Đắk Nông" value="67">Đắk Nông</option>
                                            <option name="Điện Biên" value="11">Điện Biên</option>
                                            <option name="Đồng Nai" value="75">Đồng Nai</option>
                                            <option name="Đồng Tháp" value="87">Đồng Tháp</option>
                                        </select><input type="hidden" value="" name="cus[cityname]"></div>
                                    <div class="col-md-6 form-group"><select id="districtId" disabled=""
                                                                             name="cus[districtId]"
                                                                             class="form-control BNC_districtId">
                                            <option value="">Quận/Huyện</option>
                                        </select><input type="hidden" value="" name="cus[districtname]"></div>--}}
                                    <div class="col-md-12 form-group"><textarea class="form-control" name="address" required
                                                                                placeholder="Số nhà, đường/phố, tòa nhà, xã/phường ,....... Vui lòng điền đầy đủ thông tin."
                                                                                required=""
                                                                                aria-required="true"></textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        {{--<div class="cf-ship address-list">
                            <div class="ship-title"><span><i class="fa fa-truck"></i> Dịch vụ giao hàng </span></div>
                            <style type="text/css">.ulCarrier li {
                                    list-style: none;
                                    border: #F5F6F7 solid 1px;
                                    padding: 10px;
                                    margin-left: -40px;
                                    padding-bottom: 0px;
                                    margin-bottom: 7px;
                                }</style>
                            <div id="methodShipping"><p class="text-danger">Vui Lòng chọn địa điểm cần giao hàng
                                    tới.</p></div>
                        </div>--}}
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 boderleft">
                        <div class="cf-title"><span class="icon">2</span>Phương thức thanh toán</div>
                        <div class="content">
                            <input type="hidden" name="payment_method" value="Thanh toán tại nhà (COD)">
                            <div class="input-radio radio"><label class="">
                                    <div class="iradio_minimal-blue checked" style="position: relative;"><input
                                            checked="" type="radio" name="optionsRadios" id="optionsRadios7" value="7"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0; cursor: pointer;"></ins>
                                    </div>
                                    Thanh toán tại nhà (COD)</label>
                                <div class="sub-list-bank" style="display: block;"><p>- Hình thức thanh toán được sử
                                        dụng nhiều nhất</p>
                                    <p>- Chỉ thanh toán khi đã nhận được hàng</p>
                                    <p>- Bạn sẽ phải trả một khoản phí nhỏ cho người giao hàng</p></div>
                            </div>
                            {{--<div class="input-radio radio"><label class="">
                                    <div class="iradio_minimal-blue" style="position: relative;"><input type="radio"
                                                                                                        name="optionsRadios"
                                                                                                        id="optionsRadios9"
                                                                                                        value="9"
                                                                                                        style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0; cursor: pointer;"></ins>
                                    </div>
                                    Thanh toán tại cửa hàng</label>
                                <div class="sub-list-bank"><p>- Quý khách sẽ đến cửa hàng nhận sản phẩm và thanh
                                        toán</p>
                                    <p>- Địa chỉ: Số 21 Vũ Tông Phan - Khương Trung - Thanh Xuân - Hà Nội</p></div>
                            </div>--}}
                            {{--<div class="input-radio radio"><label class="">
                                    <div class="iradio_minimal-blue" style="position: relative;"><input type="radio"
                                                                                                        name="optionsRadios"
                                                                                                        id="optionsRadios8"
                                                                                                        value="8"
                                                                                                        style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0; cursor: pointer;"></ins>
                                    </div>
                                    Chuyển khoản qua ngân hàng (Tùy chọn)</label>
                                <div class="sub-list-bank">
                                    <ul>
                                        <li class="banksOptions" data-bank-id="0"><br>
                                            <p>Ngân hàng:Vietcombank</p>
                                            <p>Chi nhánh:Sở giao dịch Hà Nội</p>
                                            <p>Chủ tài khoản:Nguyen Chi Hung</p>
                                            <p>Số tài khoản:0011004110384</p></li>
                                    </ul>
                                </div>
                            </div>--}}
                            <hr style="margin-left: 15px;">
                        </div>
                    </div>
                    <div id="BNC_product_list" class="col-md-4 col-sm-4 col-xs-12 boderleft">
                        <div class="cf-title"><span>
{{--                                <i class="icon_bill"></i>--}}
                                <img style="width: 21px; height: 21px;"
                                     src="{{ asset('portal/checkout/icon_payment.png') }}" alt="">
                            </span>Hóa đơn mua hàng<span
                                class="icon print submitPrint"><i class="fa fa-print" aria-hidden="true"></i></span>
                        </div>
                        <div class="content rowNoMargin">
                            @if(isset($cart->items) && count($cart->items) > 0)
                                @foreach($cart->items as $cart_item)
                                    <div class="list-product row rowNoMargin">
                                        <div class="img col-md-3 col-sm-4 col-xs-3"><a
                                                href="{{ route('portal.product.detail',['slug' => $cart_item['item']->slug]) }}" target="_blank"
                                                tilte="{{ @$cart_item['item']->name }}"><img
                                                    style="height: 45px !important;width:70px;" class="img-responsive"
                                                    src="{{ asset($cart_item['item']->thumbnail) }}"
                                                    alt="{{ @$cart_item['item']->name }}"
                                                    title="{{ @$cart_item['item']->name }}"></a></div>
                                        <div class="product-info col-md-9 col-sm-8 col-xs-9">
                                            <div class="product-name"><a
                                                    href="{{ route('portal.product.detail',['slug' => $cart_item['item']->slug]) }}"
                                                    target="_blank" data-unit="" data-model=""
                                                    data-name="{{ @$cart_item['item']->name }}">{{ $cart_item['item']->name }}</a><input type="hidden" name="namesp" id="namesp0"
                                                                value="{{ @$cart_item['item']->name }}"></div>
                                            <div class="product_quantity"><span class="spanQuantitySelect"><input type="number" readonly disabled
                                                                                                                  style="width:50px;outline: none;"
                                                                                                                  class="BNC_product_quantity"
                                                                                                                  value="{{ @$cart_item['qty'] }}"
                                                                                                                  product-id="{{ @number_format($cart_item['item']->id) }}"><input
                                                        type="hidden" name="soluongsp" id="soluongsp0" value="{{ @$cart_item['qty'] }}"></span><span
                                                    class="spanQuantityPrice">&nbsp;x {{ @number_format($cart_item['item']->price) }} đ</span><input type="hidden"
                                                                                                               name="pricesp"
                                                                                                               id="pricesp0"
                                                                                                               value="{{ @number_format($cart_item['item']->price) }} đ"><span
                                                    class="spanQuantityPrice"
                                                    style="margin-left: 55px;">= {{ number_format(@$cart_item['price']) }} đ</span><br><span
                                                    class="removeProduct" data-product-id="1648767" data-order-id="999181"
                                                    order-product-id="1027275"><span class="fa fa-trash"></span></span></div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="dola">
                                {{--<div class="dola1"><span>Tổng tiền:</span><span> {{ @number_format($cart->totalPrice) }} đ</span></div>
                                <input type="hidden" name="sub_total" id="sub_total" value="{{ @number_format($cart->totalPrice) }} đ">
                                <div class="dola1"><span class="dola1_fee_ship">Phí ship:</span><span
                                        class="feeShip dola1_fee_ship">Liên hệ: 0463.275.789 - 0983.966.621 - 0984.538.855</span>
                                </div>
                                <div class="dola1 feeCodd"><span>Phí Cod ( thu hộ ):</span><span class="feeCod">Liên hệ: 0463.275.789 - 0983.966.621 - 0984.538.855</span>
                                </div>
                                <input type="hidden" name="shippingFee" id="shippingFee" value="Liên hệ">
                                <div class="dola1"><span>Mã giảm giá:</span><span class="coupon"><input
                                            class="form-control" name="coupon" value="" placeholder="Mã giảm giá"><button
                                            type="button" class="btn btn-success btn-xs check_coupon"><i
                                                class="fa fa-check-circle-o"></i> Kiểm tra</button></span></div>
                                <div class="dola1 divCost_coupon" style="display:none;"><span
                                        class="text-success cost_coupon" style="text-align: right;"></span></div>--}}
                                <div class="dola1 end-dola"><span>Tổng tiền đơn hàng: </span><span>{{ @number_format($cart->totalPrice) }} đ</span>
                                </div>
                                <input type="hidden" name="total_order" id="total_order" value="{{ @number_format($cart->totalPrice) }} đ"><textarea
                                    name="comment" class="form-control" placeholder="Ghi chú thêm"></textarea>
                            </div>
                        </div>
                        <div class="dathang">
                            <button type="button" class="backOrder" onclick="window.location.href='/'"><a
                                    href="{{ route('portal.index') }}" style="color: white;"><i class="fa fa-arrow-left"
                                                                                       aria-hidden="true"></i> Mua thêm</a>
                            </button>
                            <button type="submit" class="submitOrder"><i class="fa fa-shopping-cart"
                                                                         aria-hidden="true"></i> Đặt hàng
                            </button>
                            <button type="button" style="display: none;" id="sendInstallment"><i
                                    class="fa fa-shopping-cart" aria-hidden="true"></i> Trả Góp
                            </button>
                            <br><span id="alert"></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="BNC_login_vg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Đăng nhập tài khoản Bảo Kim</h4></div>
            <div class="modal-body" style="overflow:hidden">
                <div class="form-group" id="BNC_login_error"></div>
                <div class="form-group"><label class="col-md-3 control-label">Tên đăng nhập</label>
                    <div class="col-md-9"><input id="username" name="username" class="form-control"
                                                 placeholder="Tên đăng nhập" type="text"></div>
                </div>
                <div class="form-group"></div>
                <div class="form-group"><label class="col-md-3 control-label">Mật khẩu</label>
                    <div class="col-md-9"><input id="password" name="password" class="form-control"
                                                 placeholder="Mật khẩu" type="password"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="BNC_login_idvg" type="button" class="btn btn-primary">Đăng nhập</button>
            </div>
        </div>
    </div>
</div>
<script src="https://connect.facebook.net/vi_VN/all.js?hash=9c4e1e9ca08cce29cdfd5669227f21fa&amp;ua=modern_es6" async=""
        crossorigin="anonymous"></script>
<script id="facebook-jssdk" src="//connect.facebook.net/vi_VN/all.js#xfbml=1"></script>
<script>var lang_PleaseDelivery = "Vui Lòng chọn địa điểm cần giao hàng tới.";</script>
<script src="{{ asset('portal/checkout/jquery.min.js') }}"></script>
<script src="{{ asset('portal/checkout/bootstrap.min.js') }}"></script>
<script src="{{ asset('portal/checkout/toastr.js') }}"></script>
{{--<script src="{{ asset('portal/checkout/oncepage_dk.js') }}"></script>--}}
{{--<script src="{{ asset('portal/checkout/alepay.js') }}"></script>--}}
<script src="{{ asset('portal/checkout/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('portal/checkout/jquery.validate.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('portal/checkout/loading-overlay.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('portal/checkout/jquery.fancybox.js') }}"></script>
{{--<script type="text/javascript"--}}
{{--        src="{{ asset('portal/checkout/icheck.min.js') }}"></script>--}}
<script type="text/javascript">
    function BNCcallback(data) {
        console.log(data);
    }

    var url = document.URL;
    var idW = '8186';
    var uid = '';
    var title = document.title;

</script>

<div id="fb-root" class=" fb_reset">
    <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
        <div></div>
    </div>
</div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "facebook-jssdk"));</script>
</body>
</html>

