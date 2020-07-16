<script>
    function loadCart() {
        $.ajax({
            type: "POST",
            url: '{{ route('portal.load_cart') }}',
            success: function (data) {
                $("#box-cart").html(data);
            }
        });
    }

    function removeCartItem(product_id)
    {
        $.ajax({
            type: "POST",
            url: '{{ route('portal.remove_cart_item') }}',
            data: {
                product_id: product_id,
            },
            success: function (response) {
                loadCart();
            }
        });
    }

    $(document).ready(function() {
        loadCart();
    });
</script>
