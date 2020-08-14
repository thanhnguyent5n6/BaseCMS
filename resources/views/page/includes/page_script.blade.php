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

    function searchGlobal() {
        let txt_search = $("#BNC_txt_search").val();

        $.ajax({
            type: "POST",
            url: '{{ route('portal.global_search') }}',
            data: {
                txt_search: txt_search,
            },
            success: function (response) {
                window.location.href = response;
            }
        });
    }

    $(document).ready(function() {
        loadCart();

        $('#BNC_txt_search').keypress(function(event) {
            if (event.which == 13) {
                searchGlobal();
            }
        });
    });
</script>
