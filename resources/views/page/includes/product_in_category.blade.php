<ul class="f-product-viewid f-product">
    @foreach($products as $product)
        <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3 full-xs"
            id="like-product-item-{{ $product->id }}">
            <div class="v2_bnc_pr_item">

                <figure class="v2_bnc_pr_item_img">
                    <a href="{{ route('portal.product.detail',$product->slug) }}"
                       title="{!! @$product->name !!}">
                        <img alt="{!! @$product->name !!}"
                             id="f-pr-image-zoom-id-tab-home-1712481"
                             src="{{ @$product->thumbnail }}"
                             class="tooltipItem BNC-image-add-cart-1712481 img-responsive tooltipstered"
                             data-tooltip-content="#tooltip_content1712481">

                        <div class="tooltip_templates" style="display: none;">
                            <div id="tooltip_content1712481">
                                <div class="tooltip_main_content">
                                    <h3>{!! @$product->name !!}</h3>
                                    <div class="v2_bnc_pr_item_price_main">
                                        <p class="v2_bnc_pr_item_price">{{ number_format(@$product->price) }}
                                            đ</p>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </figure>

                <div class="v2_bnc_pr_item_boxdetails">
                    <!-- Products Name -->
                    <h3 class="v2_bnc_pr_item_name"><a
                            href="{{ route('portal.product.detail',$product->slug) }}"
                            title="{!! @$product->name !!}">{!! @$product->name !!}</a>
                    </h3>
                    <!-- End Products Name -->

                    <!-- Price -->
                    <div class="v2_bnc_pr_item_price_main">
                        <p class="v2_bnc_pr_item_price">{{ number_format(@$product->price) }}
                            đ</p>
                    </div>
                    <!-- End Price -->

                    <!-- Buy -->
                    <div class="v2_bnc_pr_item_buy">
                        <a href="{{ route('portal.add_to_cart',$product->id) }}"
                           title="Đặt Mua"
                           class="BNC-add-cart v2_bnc_pr_item_action_buy"
                           data-price-float="{{ $product->price }}"
                           data-name="{!! @$product->name !!}" data-type="tab-home"
                           data-price="Array" data-product="1712481"
                           data-quantity="1" data-total-quantity="100"><i
                                class="icon-basket icons"></i> Thêm vào giỏ hàng</a>
                    </div>
                    <!-- End Buy -->
                </div>
            </div>
        </li>
    @endforeach

</ul>
{{--<div class="v2_bnc_pagination">
    <div class="col-md-6">
        <p class="v2_bnc_pagination_title"> Hiển thị từ <strong> </strong> đến
            <strong> </strong> trên <strong> </strong> bản ghi - Trang số
            <strong> </strong> trên <strong> </strong> trang </p>
    </div>
    <div class="v2_bnc_pagination_button text-right col-md-6">
        <ul class="pagination">
            <li class="disabled"><a> ← </a></li>

            <li class="disabled"><a>Trước</a></li>

            <li class="disabled"><a>Sau</a></li>
            <li class="disabled"><a> → </a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>--}}
<div class="clearfix"></div>
