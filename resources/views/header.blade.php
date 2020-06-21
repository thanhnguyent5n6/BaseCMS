
<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="{{route('trang-chu')}}"><i class="fa fa-home"></i> Hotline: 0911 384 114</a></li>
						<li><a href="{{route('trang-chu')}}"><i class="fa fa-phone"></i> Tổng đài tư vấn: 1900 7013</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Session::has('dangnhap'))
						<li><a href="{{route('trang-chu')}} ">Xin chào {{ Session::get('dangnhap')->name }}  </a></li>
						<li><a href=" {{route('dang-xuat')}} ">Đăng xuất</a></li>
						@else
						<li><a href=" {{route('dang-ky')}} ">Đăng kí</a></li>
						<li><a href="{{route('dang-nhap')}} ">Đăng nhập</a></li>						
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{ route('trang-chu') }}" id="logo"><img src="source/assets/dest/images/logo.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('tim-kiem')}}">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (
								@if(Session::has('cart')){{Session('cart')->totalQty}}
								@else Trống
								@endif <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								
								@foreach($product_cart as $p)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('xoa-gio-hang',$p['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$p['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$p['item']['name']}}</span>
											@if($p['item']['promotion_price']==0)
											<span class="cart-item-amount">{{$p['qty']}}*<span>
											{{number_format($p['item']['unit_price'])}} đ</span>
											@else
											<span class="cart-item-amount">{{$p['qty']}}*<span>
											<span>{{number_format($p['item']['promotion_price'])}} đ</span>
											@endif
										</div>
									</div>
								</div>
								@endforeach
								
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{ number_format(Session('cart')->totalPrice) }} đ</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('checkout')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						@else
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng trống
								<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">0đ</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<button onclick="thongbao()" id="thongbao" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></button>
									</div>
								</div>
							</div>
						@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{ route('trang-chu') }}">Trang chủ</a></li>
						<li><a href="{{route('loai-san-pham',1)}}">Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $l)
								<li><a href="{{route('loai-san-pham',$l->id)}}">{{ $l->name }}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioi-thieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lien-he')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
		<script type="text/javascript">
			function thongbao()
			{
				alert('Chưa có sản phẩm');
			}
		</script>
