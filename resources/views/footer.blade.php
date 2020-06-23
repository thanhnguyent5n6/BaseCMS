<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">HỆ THỐNG CỬA HÀNG</h4>
						<div>
							<ul>
								<li><a><i class="fa fa-chevron-right"></i> Quận 3 Tp.HCM - Số 71, Đường số 3, Cư Xá Đô Thành, P4, Q3 - 0911 784 114</a></li>
								<li><a><i class="fa fa-chevron-right"></i> Q.Phú Nhuận Tp.HCM - 280 Phan Đình Phùng, P.1, Q.Phú Nhuận - 0911 384 114 </a></li>
								<li><a><i class="fa fa-chevron-right"></i> Q.9 Tp.HCM - 435 Lê Văn Việt, Tăng Nhơn Phú A, Q.9 - 0911.484.114</a></li>
								<li><a><i class="fa fa-chevron-right"></i> Q.Tân Phú Tp.HCM - 17 Nguyễn Sơn, Phú Thạnh, Q.Tân Phú 0911.174.114 </a></li>
								<li><a><i class="fa fa-chevron-right"></i> Hà Nội - 152 Chùa Bộc, Đống Đa, Hà Nội - 0911 584 114</a></li>
							</ul>
						</div>
						<div hidden="hidden" id="beta-instagram-feed">
						<div>
						</div>
						</div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Thực đơn</h4>
						<div>
							<ul>
								@foreach($td as $rows)
								<li><a href="{{ route('loai-san-pham',$rows->id) }}"><i class="fa fa-chevron-right"></i>{{ $rows->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
				 <div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">HỖ TRỢ</h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								<h5 style="color: gray;">Giải đáp thắc mắc</h5>
								<h3 style="color: gray;">1900 7013</h3>
							</div>
						</div>
					</div>
				  </div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">ĐĂNG KÝ NHẬN THÔNG TIN KHUYẾN MÃI</h4>
						<form action="{{route('tim-kiem')}}" method="get">
							<input type="text" name="s">
							<button class="pull-right" type="submit">Gửi <i class="fa fa-chevron-right"></i></button>
						</form>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #footer -->
	<div class="copyright">
		<div class="container">
			<p class="pull-left">©2014 Coppyright NguyenNT</p>
			<!-- <p class="pull-right pay-options">
				<a href="#"><img src="source/assets/dest/images/pay/master.jpg" alt="" /></a>
				<a href="#"><img src="source/assets/dest/images/pay/pay.jpg" alt="" /></a>
				<a href="#"><img src="source/assets/dest/images/pay/visa.jpg" alt="" /></a>
				<a href="#"><img src="source/assets/dest/images/pay/paypal.jpg" alt="" /></a>
			</p> -->
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->