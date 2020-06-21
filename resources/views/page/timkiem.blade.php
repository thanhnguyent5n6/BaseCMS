@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($product) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $rows)
								<div class="col-sm-3" style="margin-top: 20px !important">
									<div class="single-item">
										@if($rows->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$rows->id)}}"><img src="source/image/product/{{ $rows->image }}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $rows->name }}</p>
											<p class="single-item-price">
												@if($rows->promotion_price == 0)
												<span class="flash-sale">{{ number_format($rows->unit_price) }} đ</span>
												@else
												<span class="flash-del">{{ number_format($rows->unit_price) }} đ</span>
												<span class="flash-sale">{{ number_format($rows->promotion_price) }} đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('them-gio-hang',$rows->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$rows->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach

							</div>
							<div style="margin-left: 0%" class="row">{{ $product->links() }}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection