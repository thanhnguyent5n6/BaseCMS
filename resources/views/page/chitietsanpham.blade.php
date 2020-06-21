@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sp->image}}" style="height: 320px;" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h3>{!!$sp->name!!}</h3></p>
								<p class="single-item-price">
									@if($sp->promotion_price == 0)
									<span class="flash-sale">Giá gốc: {{ number_format($sp->unit_price) }} đ</span>
									@else
									<span class="flash-del">Giá gốc: {{ number_format($sp->unit_price) }} đ</span>
									<span class="flash-sale">Giá khuyễn mãi: {{ number_format($sp->promotion_price) }} đ</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							{{--<div class="single-item-desc">
								<p>{!!$sp->description!!}</p>
							</div>--}}
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								
								<form action="{{route('them-gio-hang',$sp->id)}}" method="post">
										
										<input type="text" hidden="hidden" name="_token" value="{{csrf_token()}}">
										
										<select class="wc-select" name="choose">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
											<button style="display: inline-block;" type="submit"  class="btn btn-primary" style="margin: 0px; padding: 0px; border: 0px; display: inherit;"><i class="fa fa-shopping-cart">&nbsp;&nbsp;</i>Thêm giỏ hàng</button>
										
									</form>
								</table>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{!! @$sp->description !!} </p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm cùng loại</h4>

						<div class="row">
							@foreach($sp_tuongtu as $s)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$s->id)}}"><img height="250px" src="source/image/product/{{$s->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$s->name}}</p>
										<p class="single-item-price">
											@if($sp->promotion_price == 0)
											<span class="flash-sale">{{ number_format($s->unit_price) }} đ</span>
											@else
											<span class="flash-del">{{ number_format($s->unit_price) }} đ</span>
											<span class="flash-sale">{{ number_format($s->promotion_price) }} đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('them-gio-hang',$s->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$s->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_moi as $s)
									<div class="media beta-sales-item">
										<a class="pull-left" href="{{route('chitietsanpham',$s->id)}} "><img src="source/image/product/{{$s->image}}" alt=""></a>
										<div class="media-body">
											{{$s->name}}
											<p>
												@if($sp->promotion_price == 0)
													<span class="flash-sale">{{ number_format($s->unit_price) }} đ</span>
												@else
													<span class="flash-del">{{ number_format($s->unit_price) }} đ</span>
													<span class="flash-sale">{{ number_format($s->promotion_price) }} đ</span>
												@endif
											</p>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->

					<div class="widget">
						<h3 class="widget-title">Khuyễn mãi</h3>
						<div class="widget-body">
							@foreach($sp_km as $s)	
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$s->id)}} "><img src="source/image/product/{{$s->image}}" alt=""></a>
									<div class="media-body">
										{{$s->name}}
										<p>
											@if($sp->promotion_price == 0)
											<span class="flash-sale">{{ number_format($s->unit_price) }} đ</span>
											@else
											<span class="flash-del">{{ number_format($sp->unit_price) }} đ</span>
											<span class="flash-sale">{{ number_format($s->promotion_price) }} đ</span>
											@endif
										</p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>

				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection