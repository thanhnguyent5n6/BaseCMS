<div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        {{--<li>
            <a href="{{ url('admin/interface') }}">
                <i class="fa fa-dashboard"></i>
                <span>Menu</span>
            </a>
        </li>--}}
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-user"></i>
                <span>Quản trị hệ thống</span>
            </a>
            <ul class="sub">
                <li><a href="{{ route('admin.user.index') }}">Quản lý thành viên</a></li>
                <li><a href="{{ route('quan-li-thanh-vien') }}">Thống kê doanh số</a></li>
                <li><a href="{{ route('quan-li-thanh-vien') }}">Quản lý kho</a></li>

            </ul>
        </li>

        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-laptop"></i>
                <span>Sản phẩm</span>
            </a>
            <ul class="sub">
                <li><a href="{{ route('ql-sp') }}">Quản lý sản phẩm</a></li>
                <li><a href="{{ route(('danh-muc-sp')) }}">Danh mục sản phẩm</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-shopping-cart"></i>
                <span>Đơn hàng</span>
            </a>
            <ul class="sub">
                <li><a href="{{route('don-hang')}}">Đơn mới</a></li>
                <li><a href="{{route('dang-giao-hang')}}">Đang giao hàng</a></li>
                <li><a href="{{route('thanh-cong')}}">Thành công</a></li>
                <li><a href="{{route('tra-lai')}}">Trả về</a></li>
                <li><a href="{{route('xoa-don-hang')}}">Thùng rác</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-envelope"></i>
                <span>Tin tức - bài viết</span>
            </a>
            <ul class="sub">
                <li><a href="{{route('tin-tuc')}}">Quản lý tin bài</a></li>
                <li><a href="{{ route('danh-muc-tin-tuc') }}">Quản lý danh mục tin tức</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-bar-chart-o"></i>
                <span>Hình ảnh - Video</span>
            </a>
            <ul class="sub">
                <li><a href="{{ route('quan-li-slide') }}">Quản lý slide</a></li>
            </ul>

    </ul>
    <!-- sidebar menu end-->
</div>