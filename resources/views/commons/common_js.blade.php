<script src="{{ asset('/plugins/jquery-number/jquery.number.min.js') }}"></script>
<script>
    function initCkeditor(textarea_name)
    {
        let options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace(textarea_name, options);
    }

    Validate = {
        validate_number: function(self) {
            $(self).on("keypress", function (evt) {
                if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
                {
                    evt.preventDefault();
                }
            });
        },

        format_number: function(number) {
            var number = number.toFixed(2) + '';
            var x      = number.split('.');
            var x1     = x[0];
            var x2     = x.length > 1 ? '.' + x[1] : '';
            var rgx    = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1;
        },

        init_input_format_number: function(element_format, element_value) {
            element_format.number(true, 0);
            element_format.keyup(function () {
                var val = element_format.val();
                element_value.val(val !== '' ? val : '(empty)');
                element_value.trigger('change');
            });
        }
    }

</script>
