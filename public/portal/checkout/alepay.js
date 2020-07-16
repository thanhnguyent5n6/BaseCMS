$( document ).ready(function() {
	$('input[name="optionsRadios"]').on('ifChecked', function(event) {
        optionsRadios = $(this).val();
        if (optionsRadios == 18) {
            $("#sendInstallment").show();
            $("#alert").show();
            $(".submitOrder").hide();
        }else{
            $("#sendInstallment").hide();
            $("#alert").hide();
            $(".submitOrder").show();
        }
    });
    var formAlepay = $('#onePageSubmit');
    formAlepay.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error help-block-error2', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            'cus[phone]': {
                required: true,
                minlength: 10,
                maxlength: 14,
                number: true
            },
            'cus[name]': {
                required: true,
                minlength: 3,
                maxlength: 30,
            },
            'cus[email]': {
                required: true,
                minlength: 3,
                email: true
            },
            'cus[cityId]': {
                required: true,
            },
            'cus[districtId]': {
                required: true,
            },
            'cus[address]': {
                required: true,
                minlength: 3,
            }
        },
        messages: { // custom messages for radio buttons and checkboxes
            'cus[email]': {
                required: "Vui lòng điền chính xác email.",
                email: "Địa chỉ email nhập dạng có @",
                minlength: "Địa chỉ email phải từ 3 kí tự trở lên.",
            },
            'cus[name]': {
                required: "Vui lòng điền họ tên.",
                minlength: "Họ tên phải từ 3 kí tự trở lên.",
                maxlength: "Họ tên phải từ 30 kí tự trở xuống.",
            },
            'cus[phone]': {
                required: "Vui lòng điền số điện thoại"
            },
            'cus[cityId]': {
                required: "Vui lòng chọn thành phố",
            },
            'cus[districtId]': {
                required: "Vui lòng chọn quận"
            },
            'cus[address]': {
                required: "Vui lòng nhập địa chỉ nhận hàng"
            }
        },
        invalidHandler: function(event, validator) { //display error alert on form submit
            success2.hide();
            error2.show();
        },
        highlight: function(element) { // hightlight error inputs
            $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error');
            $(element).closest('.form-group').find('span').removeClass('help-block-error2');
        },
        success: function(label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            icon.removeClass("glyphicon glyphicon-warning-sign").addClass("glyphicon glyphicon-ok");
        },
    });
    $('#sendInstallment').on('click', function () {
    	//check dieu khoan
        if ($('input[name="ok"]').is(':not(:checked)')){
		  	$('input[name="ok"]').focus();
            return false;
		}
		formAlepay.valid();

	    $('#alert').html('Đang tải...');
	    $.ajax({
	        type: "POST",
	        url: '/payment-alepaym.html',
	        data: $("#onePageSubmit").serialize(), // serializes the form's elements.
	        success: function (data) {
	            // console.log(data.error);
	            if (data.error != 'OK') {
	            	switch(data.error) {
					    case '122':
					        $( "textarea[name='cus[comment]']" ).focus();
					        break;
					    case '125':
					        $( "input[name='cus[name]']" ).focus();
					        break;
					    case '211':
					        $( "input[name='cus[name]']" ).focus();
					        break;
					    case '128':
					        $( "textarea[name='cus[address]']" ).focus();
					        break;
					    case '129':
					        $( "select[name='cus[cityId]']" ).focus();
					        break;
					    case '162':
					        $( "input[name='cus[email]']" ).focus();
					        break;
					    case '162':
					        $( "input[name='cus[email]']" ).focus();
					        break;
					    default:
					}
	                $('#alert').html('<div class="alert alert-danger">' + data.message + '</div>');
	                return false;
	            } else {
                    window.location.href=data.data;
	                // $('#frame').prop('src', data.data);
	                // $('#sendOrderToAlepayInstallment').modal('show');
	                $('#alert').html('');
	            }

	        }
	    });

	});
	$('#frame').on('load', function () {
	    this.style.height = this.contentDocument.body.scrollHeight + 'px';
	});
});
