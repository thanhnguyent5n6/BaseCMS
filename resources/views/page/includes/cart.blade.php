<div class="v2_bnc_cart_main">
    <div class="f-miniCart-miniv2" data-status="hide" style="right: -250px;">
        <div class="f-miniCart-miniv2-toolbar">
            <div class="miniv2-toolbar-close" style="visibility: hidden;"><span>×</span></div>
            <div class="miniv2-toolbar-name">
                <a class="miniv2-toolbar-barclick">
                    <span class="name_cart"><i class="fa fa-shopping-cart"></i></span>
                    <span class="miniv2-toolbar-count">0</span>
                </a>
            </div>
        </div>
        <div class="wrap_cart">
            <div class="miniCart-top">
                <span>Giỏ hàng của tôi (@if(isset($cart->totalQty)) {{ @$cart->totalQty }} @else 0 @endif)</span>
            </div>
            <div class="miniCart-body">
                <ul class="miniCartItem">
                    @if(!isset($cart) || empty($cart))
                    <li>
                        <center>Hiện chưa có sản phẩm nào trong giỏ hàng của bạn</center>
                    </li>
                    @else
                        @foreach($cart->items as $product_id => $cart_info)
                            <li>
                                <a class="miniCartItemImg" href="{{ @$cart_info['item']->slug }}" target="_blank">
                                    <img src="{{ @$cart_info['item']->thumbnail }}" onerror="this.onerror=null;this.src='http://upload2.webbnc.vn/view.php?image=uploadv2/web/81/8186/product/2019/12/18/11/00/1576666802_111.jpg&amp;mode=resize&amp;size=50x50'" alt="{{ @$cart_info['item']->name }}">
                                </a>
                                <p>
                                    <a title="{{ @$cart_info['item']->name }}"
                                       href="{{ @$cart_info['item']->slug }}">{{ @$cart_info['item']->name }}
                                    </a>
                                </p>
                                <p>
                                    <b>SL: {{ @$cart_info['qty'] }} x </b>
                                    <b>{{ @number_format($cart_info['price']) }} đ</b>
                                    <i onclick="removeCartItem({{ $cart_info['item']->id }})" class="fa fa-trash-o" data-product="1712481" data-size="0" title="Xóa sản phẩm"></i>
                                </p>
                                <i class="clearfix"></i>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            @if(isset($cart) && !empty($cart))
            <p class="minicartItemTotal">
                <b>Tổng tiền:</b><b>{{ @number_format(@$cart->totalPrice) }} đ</b>
            </p>
            <p class="minicartItemPay">
                <a href="{{ route('portal.checkout.index') }}" >Tiến hành đặt hàng</a>
            </p>
            @endif
        </div>
    </div>
</div>
