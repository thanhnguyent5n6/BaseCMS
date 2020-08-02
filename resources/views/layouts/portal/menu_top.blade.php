<div class="v2_bnc_header_under_bottom">
    <div class="container">
        <div class="row">
            <div class="hidden-sm hidden-xs col-md-3 col-lg-3 " style="padding-right: 0;">
                <div class="v2_bnc_cat_block_title">
                    <i class="fa fa-bars"></i>danh mục sản phẩm
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
                <!-- Menu Main -->
                <nav class="v2_bnc_menu_main hidden-sm hidden-xs">
                    <div class="v2_menu_top">
                        <div class="v2_menu_top_name hidden">
                            <span>Danh mục sản phẩm </span>
                        </div>
                        <ul class="v2_menu_top_ul nxtActiveMenu">
                            {{--                                <li class="active">--}}
                            <li>
                                <a class="v2_menu_first_link" href="{{ route('portal.index') }}">
                                    Trang chủ</a>
                            </li>
                            <li class="">
                                <a class="v2_menu_first_link" href="{{ route('portal.introduce') }}">
                                    Giới thiệu</a>
                            </li>
                            <li class="parent" class="">
                                <a class="v2_menu_first_link" href="javascript:;">
                                    Sản phẩm</a>
                                <ul class="v2_menu_top_sub">
                                    @foreach($categories as $category)
                                        <li class="parent">
                                            <a href="{{ route('portal.load_by_category', ['slug' => @$category['slug']]) }}" title="{{ @$category['name'] }}">{{ @$category['name'] }}</a>

                                            @if(isset($category['child']) && count($category['child']) > 0)
                                                <ul class="v2_menu_top_sub_2">
                                                    @foreach($category['child'] as $category_child)
                                                        <li>
                                                            <a href="{{ route('portal.load_by_category', ['slug' => @$category_child['slug']]) }}">{{ @$category_child['name'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="">
                                <a class="v2_menu_first_link" href="/goc-tu-van">
                                    Góc Tư Vấn</a>
                            </li>
                            <li class="">
                                <a class="v2_menu_first_link" href="{{ route('portal.contact') }}">
                                    Liên hệ</a>
                            </li>
                            <li>

                            </li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        function NxtActiveMenu() {
                            var urlNow = window.location.href;
                            var allA = $('.nxtActiveMenu').find('a');
                            $.each(allA, function (k, v) {
                                var self = $(this);
                                if (self.attr('href') == urlNow) {
                                    $('.nxtActiveMenu').find('li.active').removeClass('active');
                                    self.parents('li').addClass('active');
                                }
                            });
                        };
                        NxtActiveMenu();
                    </script>
                </nav>
                <!-- End Menu Main -->
                <div id="search-box" class="v2_bnc_search_main">
                    <div class="search search-area">
                        <div class="input-group v2_bnc_search_border">
                            <div class="input-group-btn search-basic">
                                <select class="form-control" name="BNC_searchCategory">
                                    <option value="product">Sản phẩm</option>
                                    <option value="news">Tin tức</option>
                                    <option value="album">Album</option>
                                    <option value="video">Video</option>
                                    <option value="recruit">Tuyển dụng</option>
                                </select>
                            </div>
                            <input type="search" class="form-control search-field" placeholder="Nhập từ khóa..."
                                   name="BNC_txt_search" id="BNC_txt_search" value="">
                            <div class="input-group-btn"><a href="javascript:void(0);" class="search-button"
                                                            id="BNC_btn_search"><i class="fa fa-search"></i></a>
                            </div>
                            <!-- Search Smart -->
                            <div class="searchAutoComplete hidden">
                                <ul id="resSearch" style="display: none;">
                                    <li>
                                        <a href="">sản phẩm a</a>
                                    </li>
                                    <li>
                                        <a href="">sản phẩm b</a>
                                    </li>
                                    <li>
                                        <a href="">sản phẩm c</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Search Smart -->
                        </div>
                    </div>
                </div>
                <!-- Menu Mobile -->
                <section class="button_menu_mobile">
                    <div id="nav_list">
                        <i class="icon-menu icons"></i>
                    </div>
                </section>
                <nav class="menutop">
                    <div class="menu-top-custom">
                        <div class="navbar-collapse pushmenu pushmenu-left">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a class="txt" href="">Trang chủ</a>
                                </li>
                                <li class="">
                                    <a class="txt" href="/trang-gioi-thieu.html">Giới thiệu</a>
                                </li>
                                <li class="parent" class="">
                                    <a class="txt" href="/product.html">Sản phẩm</a>
                                    <div class="top-menu-new">
                                        <ul>
                                            <li class="parent">
                                                <a class="v2_link_submenu_1" href="/game-net-sever-cu"
                                                   title="CẤU HÌNH GAMES - ĐỒ HỌA">CẤU HÌNH GAMES - ĐỒ HỌA</a>
                                            </li>
                                            <li class="parent">
                                                <a class="v2_link_submenu_1" href="/may-tinh-cu" title="MÁY TÍNH CŨ">MÁY
                                                    TÍNH CŨ</a>
                                                <ul class="v2_submenu_1_1">
                                                    <li class="parent">
                                                        <a class="v2_link_submenu_1_1" href="/may-tinh-cu-van-phong"
                                                           title="CASE VĂN PHÒNG">CASE VĂN PHÒNG</a>
                                                    </li>
                                                    <li class="parent">
                                                        <a class="v2_link_submenu_1_1" href="/may-tinh-cu-choi-game"
                                                           title="CASE CHƠI GAMES">CASE CHƠI GAMES</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="">
                                    <a class="txt" href="/dich-vu">Dịch Vụ</a>
                                </li>
                                <li class="">
                                    <a class="txt" href="/goc-tu-van">Góc Tư Vấn</a>
                                </li>
                                <li class="">
                                    <a class="txt" href="album-anh">Album Ảnh</a>
                                </li>
                                <li class="">
                                    <a class="txt" href="/trang-lien-he.html">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Menu Mobile -->
            </div>
        </div>
    </div>
</div>
