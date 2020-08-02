$(document).ajaxStart(function() {
    $('#loadding').show();
});
$(document).ajaxStop(function() {
    $('#loadding').hide();

});
var addressPay = $('input[name="addressPay"]').val();
if (addressPay == undefined) {
    addressPay = 0;
}
$('input[name="point_pay"]').keyup(function() {
            var number = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(number);
});
var optionsRadios = $('input[name="optionsRadios"]').val();
$('.bank-online-methods').click(function() {
                // alert(1);
               // $(this).parent('.cardList').find('.li').removeClass('active1');
                $(this).addClass('active1');
                $(this).find("input").prop("checked", true);
});

var OncePage = function() {
    var handleOnload = function() {
        //In đơn hàng
        $('body').on('click', '.submitPrint', function(event) {
            event.preventDefault();
            popupCenter('', 'In đơn hàng', '1000', '1200');
            return;
        });


        $('.sub-list-bank ul li').click(function() {
            $('.sub-list-bank ul li').removeClass('active1');
            $(this).addClass('active1');
            var activeTab = $(this).attr('href');
            //activeTab = #hinhanh// activeTab =#video
            $(activeTab).fadeIn();
            return false;
        });

        $('input[name="optionsRadios"]').on('ifChecked', function(event) {
            var parent = $(this).parents('.input-radio'); //Get parents
            //$('.input-radio').removeClass('active');
            $('.input-radio .sub-list-bank').slideUp(); //Remove all active
            parent.find('.sub-list-bank').slideDown();
            //parent.addClass('active');
            $('.sub-list-bank').find('.active1').removeClass('active1');
            optionsRadios = $(this).val();

        });

        $('[data-toggle="tooltip"]').tooltip();
        //Khoi tao icheck
        $('input').iCheck({
            cursor: true,
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue',
            increaseArea: '20%'
        });

        //Find checked
        $('.input-radio input:checked').parents('.input-radio').find('.sub-list-bank').slideDown();

        //User login
        $('input[name="addressPay"]').on('ifChecked', function(event) {
            event.preventDefault();
            var valAdd = $(this).val();
            addressPay = valAdd;
            if (valAdd == 0) {
                $('#address-Scroll').slideUp();
                $('.BNC_other_address').slideDown();
                if ($('#cityId').val() == false && $('#districtId').val() == false) {
                    $('#methodShipping').html('<p class="text-danger">' + lang_PleaseDelivery + '</p>');
                } else {
                    handleRefeshFeeShip();
                }

            } else {
                $('.BNC_other_address').slideUp();
                $('#address-Scroll').slideDown();
                //Tinh toan lai phi ship - thong qua ten thanh pho
                var provincename = $(this).attr('data-province');
                var districtname = $(this).attr('data-district');
                getListCarrierService(provincename, districtname);
            }
        });
        //Kiem tra xem trang thai active thanh toan dang la gi
        if (addressPay != false) {
            var self = $('input[name="addressPay"][value="' + addressPay + '"]');
            var provincename = self.attr('data-province');
            var districtname = self.attr('data-district');
            getListCarrierService(provincename, districtname);
        } else {
            handleRefeshFeeShip();
            refeshTax();
        }

    };

    var setPrint = function() {
        function printHTML(htmlString) {
            var newIframe = document.createElement('iframe');
            newIframe.width = '1px';
            newIframe.height = '1px';
            newIframe.src = 'about:blank';
            // for IE wait for the IFrame to load so we can access contentWindow.document.body
            newIframe.onload = function() {
                var script_tag = newIframe.contentWindow.document.createElement("script");
                script_tag.type = "text/javascript";
                var script = newIframe.contentWindow.document.createTextNode('function Print(){ window.focus(); window.print(); }');
                script_tag.appendChild(script);

                newIframe.contentWindow.document.body.innerHTML = htmlString;
                newIframe.contentWindow.document.body.appendChild(script_tag);

                // for chrome, a timeout for loading large amounts of content
                setTimeout(function() {
                    newIframe.contentWindow.Print();
                    newIframe.contentWindow.document.body.removeChild(script_tag);
                    newIframe.parentElement.removeChild(newIframe);
                }, 200);
            };
            document.body.appendChild(newIframe);
        }

        function callBackPrintContent(data) {
            //Lấy dữ liệu
            //lấy sản phẩm
            var htm = $(data).contents();

            //Product
            var product = [];
            $('#BNC_product_list .list-product').each(function(k, v) {
                var el = $(v);
                var price = 0;
                var price_quantity = 0;
                el.find('.spanQuantityPrice').each(function(k_pr, v_pr) {
                    if (k_pr == 0) {
                        price = $(v_pr).text();
                        price = $.trim(price.replace("x", ""));
                    } else {
                        price_quantity = $(v_pr).text();
                        price_quantity = $.trim(price_quantity.replace("=", ""));
                    }
                });
                var products = {
                    'name': el.find('.product-name a').attr('data-name'),
                    'quantity': el.find('.BNC_product_quantity').val(),
                    'price': price,
                    'price_quantity': price_quantity,
                    'model': el.find('.product-name a').attr('data-model'),
                };
                product.push(products);
            });
            //Logo
            var logo = $('.cf-logo').find('img').attr('src');
            //Tên khách hàng
            var cus_name = $('input[name="name"]').val();
            var cus_email = $('input[name="email"]').val();
            var cus_phone = $('input[name="phone"]').val();
            var cus_address = $('textarea[name="address"]').val();
            //Form - method
            var data_form = $('#onePageSubmit').serializeArray();
            var method_pay = '';
            $.each(data_form, function(k, v) {
                if (v.name == 'optionsRadios') {
                    $('input[name="optionsRadios"]').each(function(k_r, v_r) {
                        var el = $(v_r);
                        if (el.val() == v.value) {
                            var content_lb = $(el[0]);
                            method_pay = content_lb['context']['labels'][0].innerText;
                        }
                    });
                }
            });
            //Total
            var feeShip = $.trim($('.feeShip').text());
            var totalFull = $.trim($('.end-dola span:last-child').text());

            //Xử lý xuất ra ngoài.
            //Logo
            htm.find('#nxtLogo').attr('src', logo);
            //Product
            var htm_product = '';
            $.each(product, function(k, v) {
                htm_product += '<tr height="28" style="mso-height-source:userset;height:21.0pt">';
                htm_product += '<td class="style24" height="28" style="border:1px solid #000">1</td>';
                htm_product += '<td class="style7"  style="border:1px solid #000">MOD0043</td>';
                htm_product += '<td class="style25" style="border:1px solid #000">Module cảm biến âm thanh (module ghi âm)</td>';
                htm_product += '<td class="style26"  style="border:1px solid #000">2</td>';
                htm_product += '<td class="style27" width="65"  style="border:1px solid #000">25,000 </td>';
                htm_product += '<td class="style28" width="76"  style="border:1px solid #000">50,000</td>';
                htm_product += '</tr>';
            });
            htm.find('#products').html(htm_product);
            printHTML(htm.html());
            // console.log();
        }
        $('body').on('click', '.print', function(event) {
            event.preventDefault();
            $.get('/modules/payment/themes/temp_hd/hd1.htm', function(data) {
                callBackPrintContent(data);
            });
        });
    }


    function popupCenter(url, title, w, h) {
        var lang = $('base').attr('lang');
        console.log(lang);
        if (lang == 'en') {
            var cus_name = 'Customer';
            var cus_phone = 'Phone';
            var cus_addr = 'Address';
            var cus_method = 'Payment method';
            var cus_note = 'Note';
            var cus_stt = 'ST';
            var cus_p_name = 'Product name';
            var cus_p_quantity = 'Quantity';
            var cus_p_price = 'Amount';
            var cus_p_unit = 'Unit';
            var cus_p_code = 'Code';
            var cus_p_total = 'Sub total';
            var cus_ship_fee = 'Ship fee';
            var order_total = 'Total';
            var cus_explode = 'Made';
            var order_date = 'Day';
            var order_print = 'Print Invoice';
            var order_detail = 'Detail Invoice';
            var order_id = 'Invoice';
            var order_info = 'Information Order';
            var order_method_pay = 'Delivery method';
            var order_kt = 'Kế toán';
            var order_month = 'month';
            var order_year = 'year';
            var cus_note = 'Ghi chú';
        } else {
            var cus_name = 'Khách hàng';
            var cus_phone = 'Điện thoại liên hệ';
            var cus_addr = 'Địa chỉ';
            var cus_method = 'Hình thức thanh toán';
            var cus_note = 'Ghi chú';
            var cus_stt = 'TT';
            var cus_p_name = 'Tên hàng';
            var cus_p_quantity = 'Số lượng';
            var cus_p_price = 'Đơn giá';
            var cus_p_unit = 'Đ.V Tính';
            var cus_p_code = 'Mã hàng';
            var cus_p_total = 'Thành tiền';
            var cus_ship_fee = 'Phí vận chuyển';
            var order_total = 'Tổng tiền';
            var cus_explode = 'Người quản lý';
            var order_date = 'Ngày';
            var order_print = 'In hóa đơn';
            var order_detail = 'Chi tiết đơn hàng';
            var order_id = 'Mã đơn hàng';
            var order_info = 'Hóa đơn bán hàng';
            var order_method_pay = 'Phương thức giao hàng';
            var order_kt = 'Kế toán';
            var order_month = 'tháng';
            var order_year = 'năm';

        }
        var logo = $('.cf-logo img').attr('src');
        var link = $('#link_home').val();
        var name_cus = $("input[name='name']").val();
        var phone = $("input[name='phone']").val();
        var mail = $("input[name='email']").val();
        var time = new Date();
        // var day= time.getDay();
        // alert(time);
        var ngay = time.getDate();
        var thang = time.getMonth()+ 1 ; //Note: 0=January, 1=February etc.
        var nam = time.getFullYear();
        var ngayht = ngay + ' ' + order_month + ' ' + thang + ' ' + order_year + ' ' + nam;
        var hinhthucthanhtoan = $('.input-radio input:checked').parents('label').text();
        var sub_total = $("#sub_total").val();
        var shippingFee = $("#shippingFee").val();
        var total_order = $("#total_order").val();

        var cityId = "";
        var city = $("#cityId option:selected").val();
        if (city == '') {
            cityId = '';
        } else {
            cityId = $("#cityId option:selected").text();
        }

        var districtId = "";
        var district = $("#districtId option:selected").val();
        if (district == '') {
            districtId = '';
        } else {
            districtId = $("#districtId option:selected").text();
        }
        var address = $("textarea[name='address']").val() + ' - ' + districtId + ' - ' + cityId;
        var address_arrs = address.split('-');
        var address_ok = '';
        $.each(address_arrs, function(k, v) {
            if (v != '' && v != undefined) {
                if (k == (address_arrs.length - 1)) {
                    address_ok += v;
                } else {
                    address_ok += v + ' - ';
                }

            }
        });



        var left = (screen.width / 2) - (w / 2);
        var top = (screen.height / 2) - (h / 2);
        newwindow2 = window.open('', title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        var tmp = newwindow2.document;

        tmp.write('');
        var tmp_head = '';

        tmp_head += '<html lang="en">';
        tmp_head += '<head>';
        tmp_head += ' <meta charset="UTF-8">';
        // tmp_head += '<title>' + order_info + '</title>';
        tmp_head += '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        tmp_head += '<link href="https://v2.webbnc.net/modules/payment/themes/oncepage/css/print2.css?v=11" rel="stylesheet" type="text/css">';
        tmp_head += '</head>';
        tmp_head += '<body>';
        tmp_head += ' <div class="container">';
        tmp_head += ' <table class="table">';

        tmp_head += '<tr class="style9"><td><img src="' + logo + '" alt="" class="logo_img"></td><td></td><td></td><td></td><td colspan="4"><b>' + $('input[name="nxtinfo"]').attr('data-info-web') + '</b></td></tr>';

        tmp_head += '<tr class="style9"><td></td><td></td><td></td><td></td><td colspan="4">' + $('input[name="nxtinfo"]').attr('data-info-address') + '</td></tr>';

        tmp_head += '<tr class="style9"><td></td><td></td><td></td><td></td><td colspan="4">ĐT/Fax: ' + $('input[name="nxtinfo"]').attr('data-info-phone') + '</td></tr>';

        tmp_head += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';

        tmp_head += '<tr class="style9"><td colspan="8"><p class="text-center"><b class="k_h_title">' + order_info + '</b></p></td></tr>';

        tmp_head += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';


        tmp_head += '<tr class="style7">';
        tmp_head += '<td colspan="4">' + cus_name + ':' + name_cus + '</td>';
        tmp_head += '<td colspan="4">' + order_id + ': ' + $('input[name="nxtinfo"]').attr('data-info-order') + '</td>';
        tmp_head += '</tr>';

        tmp_head += '<tr class="style7">';
        tmp_head += '<td colspan="4">' + cus_phone + ': ' + phone + '</td>';
        tmp_head += '<td colspan="4">Email: ' + mail + '</td>';
        tmp_head += '</tr>';


        tmp_head += '<tr class="style7">';
        tmp_head += '<td colspan="8">' + cus_addr + ': ' + address_ok + '</td>';
        tmp_head += '</tr>';


        tmp_head += '<tr class="style7">';
        tmp_head += ' <td colspan="4">' + cus_method + ' : ' + hinhthucthanhtoan + '</td>';
        tmp_head += ' <td colspan="4">' + order_method_pay + ':</td>';
        tmp_head += '</tr>';


        tmp_head += '<tr class="style7">';
        tmp_head += ' <td colspan="8">' + cus_note + ': '+$('textarea[name="cus[comment]"]').val()+'</td>';
        tmp_head += '</tr>';



        tmp_head += '<tr class="style10">';
        tmp_head += '<td class="style16">' + cus_stt + '</td>';
        tmp_head += '<td class="style16">Ảnh</td>';
        tmp_head += '<td class="style16">' + cus_p_name + '</td>';
        tmp_head += '<td class="style16">' + cus_p_code + '</td>';
        tmp_head += '<td class="style16">' + cus_p_quantity + '</td>';
        tmp_head += '<td class="style16">' + cus_p_unit + '</td>';
        tmp_head += '<td class="style16">' + cus_p_price + '</td>';
        tmp_head += '<td class="style16">' + cus_p_total + '</td>';
        tmp_head += '</tr>';

        tmp.write(tmp_head);
        var dem = 0;
        $(".count_item_sp #idk").each(function() {
            dem += 1;
        });
        var tmp_product = '';
        $('.list-product').each(function(k, v) {
            var el = $(v);
            var parent = el.find('.product-info');
            var namesp = parent.find('input[name="namesp"]').val();
            var soluongsp = parent.find('input[name="soluongsp"]').val();
            var pricesp = parent.find('input[name="pricesp"]').val();
            var tmp_total = parent.find('.spanQuantityPrice').text();
            tmp_total = tmp_total.split('=');
            var total = tmp_total[1];
            var model = parent.find('a').attr('data-model');
            var unit = parent.find('a').attr('data-unit');
            var img=el.find('img').attr('src');
            var tmp_num = k + 1;
            tmp_product += ' <tr class="style11">';
            tmp_product += '<td class="style24">' + tmp_num + '</td>';
            tmp_product += '<td class="style24"><img src="'+img+'" alt=""></td>';
            tmp_product += '<td class="style24 textleft">' + namesp + '</td>';
            tmp_product += '<td class="style24" >' + model + '</td>'; //Ma san pham
            tmp_product += '<td class="style24 textright" >' + soluongsp + '</td>';
            tmp_product += '<td class="style24" >' + unit + '</td>'; //Don vi tinh
            tmp_product += '<td class="style24 textright">' + pricesp + ' </td>';
            tmp_product += '<td class="style24 textright">' + total + '</td>';
            tmp_product += '</tr>';

        });
        tmp.write(tmp_product);
        var tmp_footer = '';

         tmp_footer +='<tr class="style10"><td colspan="6"><b>Tiền hàng</b></td><td colspan="2" class="text-right">' + total_order + '</td></tr>'
        tmp_footer +='<tr class="style10"><td colspan="6"><b>'+cus_ship_fee+'</b></td><td colspan="2" class="text-right">'+shippingFee+'</td></tr>'
        tmp_footer +='<tr class="style10"><td colspan="6"><b>Khuyến mãi</b></td><td colspan="2" class="text-right">0</td></tr>'
        // tmp_footer +='<tr class="style10"><td colspan="6"><b>Khuyến mại</b></td><td colspan="2" class="text-right">9,999,000 VNĐ</td></tr>'
        tmp_footer +='<tr class="style10"><td colspan="6"><b>'+order_total+'</b></td><td colspan="2" class="text-right">' + total_order + '</td></tr>'
        tmp_footer += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        tmp_footer += '<tr class="style12"><td colspan="3">' + cus_name + '</td><td colspan="3">' + order_kt + '</td><td colspan="2">'+cus_explode+'</td></tr>';
        tmp_footer += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        tmp_footer += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        tmp_footer += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        tmp_footer += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        tmp_footer += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        tmp_footer += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        tmp_footer += '<tr class="style8"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';

        tmp_footer += '<tr class="style13"><td colspan="8" class="text-right">' + order_date + ':  ' + ngayht + '  </td></tr></table></div></body></html>';
        var abc_tmp="this.style.display='none';";
        tmp.write(tmp_footer);
        //tmp.write('<td class="style8"></td></tr></tbody></table>');
        tmp.write('<div class="inhoadon"><a onclick="'+abc_tmp+'window.print();return false" class="print_hd">' + order_print + '</a></div></br>');
        tmp.write('</body></html>');
        tmp.close();


        // tmp_head += '<html>';
        // tmp_head += '<head>';
        // tmp_head += '<title>' + order_detail + '</title>';
        // tmp_head += '<link rel="stylesheet" href="/modules/payment/themes/oncepage/css/print.css?v=3">';
        // tmp_head += '</head>';
        // tmp_head += '<body>';
        // tmp_head += '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:569pt;margin:auto" width="758">';
        // tmp_head += '<colgroup>';
        // tmp_head += '<col style="mso-width-source:userset;mso-width-alt:1280;width:26pt" width="35">';
        // tmp_head += '<col style="mso-width-source:userset;mso-width-alt:2304;width:47pt" width="100">';
        // tmp_head += '<col style="mso-width-source:userset;mso-width-alt:1240;width:26pt" width="40">';
        // tmp_head += '<col style="mso-width-source:userset;mso-width-alt:1938;width:150pt" width="150">';
        // tmp_head += '<col style="mso-width-source:userset;mso-width-alt:1828;width:150pt" width="150">';
        // tmp_head += '</colgroup>';
        // tmp_head += '<tbody>';
        // tmp_head += '<tr height="23" style="mso-height-source:userset;height:17.25pt">';
        // tmp_head += '<td align="left" height="23" style="height:17.25pt;width:26pt" valign="top" width="35">';
        // tmp_head += '<span style="mso-ignore:vglayout;position:absolute;z-index:1;margin-left:4px;margin-top:3px;width:255px;height:73px">';
        // tmp_head += '<img alt="logo" height="73" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);" src="' + logo + '" v:shapes="Picture_x0020_3" width="255">';
        // tmp_head += '</span>';
        // tmp_head += '<span style="mso-ignore:vglayout2">';
        // tmp_head += '<table cellpadding="0" cellspacing="0">';
        // tmp_head += '<tbody>';
        // tmp_head += '<tr>';
        // tmp_head += '<td class="style1" height="23" width="35">';
        // tmp_head += '</td>';
        // tmp_head += '</tr>';
        // tmp_head += '</tbody>';
        // tmp_head += '</table>';
        // tmp_head += '</span>';
        // tmp_head += '<td class="style2" width="63">';
        // tmp_head += '</td>';
        // tmp_head += '<td class="style3" width="60">';
        // tmp_head += '</td>';
        // tmp_head += '<td class="style4" colspan="5">' + $('input[name="nxtinfo"]').attr('data-info-web') + '</td>';
        // tmp_head += '<td class="style5" width="64">';
        // tmp_head += '</td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="23" style="mso-height-source:userset;height:17.25pt">';
        // tmp_head += '<td class="style6" height="23">';
        // tmp_head += '</td>';
        // tmp_head += '<td class="style7"></td>';
        // tmp_head += '<td class="style8"></td>';
        // tmp_head += '<td class="style9" colspan="5">' + $('input[name="nxtinfo"]').attr('data-info-address') + '</td>';
        // tmp_head += '<td class="style8"></td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="23" style="mso-height-source:userset;height:17.25pt">';
        // tmp_head += '<td class="style6" height="23"></td>';
        // tmp_head += '<td class="style7"></td>';
        // tmp_head += '<td class="style8"></td>';
        // tmp_head += '<td class="style9" colspan="5">ĐT/Fax: ' + $('input[name="nxtinfo"]').attr('data-info-phone') + '</td>';
        // tmp_head += '<td class="style8"></td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="18" style="mso-height-source:userset;height:13.5pt">';
        // tmp_head += '<td class="style10" height="18"></td>';
        // tmp_head += '<td class="style7"></td>';
        // tmp_head += '<td class="style8"></td>';
        // tmp_head += '<td class="style11" colspan="5"></td>';
        // tmp_head += '<td class="style11"></td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="32" style="mso-height-source:userset;height:24.0pt">';
        // tmp_head += '<td class="style12" colspan="8" height="32">' + order_info + '</td>';
        // tmp_head += '<td class="style11"></td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="26" style="mso-height-source:userset;height:19.5pt">';
        // tmp_head += '<td class="style13" colspan="3" height="26" style="mso-ignore: colspan">' + cus_name + ': ' + name_cus + ' </td>';
        // tmp_head += '<td class="style8" colspan="6">' + order_id + ': ' + $('input[name="nxtinfo"]').attr('data-info-order') + '</td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="26" style="mso-height-source:userset;height:19.5pt">';
        // tmp_head += '<td class="style13" colspan="3" height="26" style="mso-ignore: colspan">' + cus_phone + ': ' + phone + '</td>';
        // tmp_head += '<td class="style14" colspan="6">Email: ' + mail + ' </td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="26" style="mso-height-source:userset;height:19.5pt">';
        // tmp_head += '<td class="style13" colspan="9" height="26" style="mso-ignore: colspan"> ' + cus_addr + ': ' + address_ok + '</td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr style="mso-height-source:userset;">';
        // tmp_head += '<td class="style46" colspan="3" style="mso-ignore: colspan">' + cus_method + ' : ' + hinhthucthanhtoan + '</td>';
        // tmp_head += '<td class="style46" colspan="6">' + order_method_pay + ':</td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="26" style="mso-height-source:userset;height:19.5pt">';
        // tmp_head += '<td class="style13" colspan="3" height="26" style="mso-ignore: colspan">' + cus_note + ': </td>';
        // tmp_head += '<td class="style14"></td>';
        // tmp_head += '<td class="style7">&nbsp;</td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="9" style="mso-height-source:userset;height:6.75pt">';
        // tmp_head += '<td class="style15" height="9"></td>';
        // tmp_head += '<td class="style8"></td>';
        // tmp_head += '<td class="style7"></td>';
        // tmp_head += '<td class="style7"></td>';
        // tmp_head += '<td class="style7"></td>';
        // tmp_head += '<td class="style7"></td>';
        // tmp_head += '<td class="style47"></td>';
        // tmp_head += '<td class="style8"></td>';
        // tmp_head += '</tr>';
        // tmp_head += '<tr height="45" style="height:33.75pt;background: #d7d7d7;">';
        // tmp_head += '<td class="style16" height="45">' + cus_stt + '</td>';
        // tmp_head += '<td class="style16" width="280">' + cus_p_name + '</td>';
        // tmp_head += '<td class="style16" width="53">' + cus_p_quantity + '</td>';
        // tmp_head += '<td class="style16" width="53">' + cus_p_price + '</td>';
        // tmp_head += '<td class="style16" width="53">' + cus_p_unit + '</td>';
        // tmp_head += '<td class="style16" width="53">' + cus_p_code + '</td>';
        // tmp_head += '<td class="style16" width="300">' + cus_p_total + '</td>';
        // tmp_head += '</tr>';
        // tmp.write(tmp_head);
        // var dem = 0;
        // $(".count_item_sp #idk").each(function() {
        //     dem += 1;
        // });
        // var tmp_product = '';
        // $('.list-product').each(function(k, v) {
        //     var el = $(v);
        //     var parent = el.find('.product-info');
        //     var namesp = parent.find('input[name="namesp"]').val();
        //     var soluongsp = parent.find('input[name="soluongsp"]').val();
        //     var pricesp = parent.find('input[name="pricesp"]').val();
        //     var tmp_total = parent.find('.spanQuantityPrice').text();
        //     tmp_total = tmp_total.split('=');
        //     var total = tmp_total[1];
        //     var model = parent.find('a').attr('data-model');
        //     var unit = parent.find('a').attr('data-unit');
        //     var tmp_num = k + 1;
        //     tmp_product += '<tr height="28" style="mso-height-source:userset;height:21.0pt">';
        //     tmp_product += '<td class="style24" height="28" style="border:1px solid #000">' + tmp_num + '</td>';
        //     tmp_product += '<td class="style24">' + namesp + '</td>';
        //     tmp_product += '<td class="style24" >' + soluongsp + '</td>';
        //     tmp_product += '<td class="style24" width="65">' + pricesp + ' </td>';
        //     tmp_product += '<td class="style24" >' + unit + '</td>'; //Don vi tinh
        //     tmp_product += '<td class="style24" >' + model + '</td>'; //Ma san pham
        //     tmp_product += '<td class="style24" width="76">' + total + '</td>';
        //     tmp_product += '</tr>';

        // });
        // tmp.write(tmp_product);
        // var tmp_footer = '';
        // tmp_footer += '<tr height="33" style="mso-height-source:userset;height:24.75pt;  background: #fff none repeat scroll 0 0;">';
        // tmp_footer += '<td class="style30" height="33">&nbsp;</td>';
        // tmp_footer += '<td class="style31">' + cus_ship_fee + '</td>';
        // tmp_footer += '<td class="style31">&nbsp;</td>';
        // tmp_footer += '<td class="style31">&nbsp;</td>';
        // tmp_footer += '<td class="style31" >&nbsp;</td>';
        // tmp_footer += '<td class="style33" colspan="1">&nbsp;</td>';
        // tmp_footer += '<td class="style34" colspan="1">' + shippingFee + '  </td>';
        // tmp_footer += '</tr>';

        // tmp_footer += '<tr height="33" style="mso-height-source:userset;height:24.75pt;  background: #d7d7d7 none repeat scroll 0 0;">';
        // tmp_footer += '<td class="style30" height="33">&nbsp;</td>';
        // tmp_footer += '<td class="style31">' + order_total + '</td>';
        // tmp_footer += '<td class="style31">&nbsp;</td>';
        // tmp_footer += '<td class="style31">&nbsp;</td>';
        // tmp_footer += '<td class="style31">&nbsp;</td>';
        // tmp_footer += '<td class="style33" colspan="1">&nbsp;</td>';
        // tmp_footer += '<td class="style34" colspan="1">' + total_order + '  </td>';
        // tmp_footer += '</tr>';

        // tmp_footer += '<tr height="17" style="mso-height-source:userset;height:12.75pt">';
        // tmp_footer += '<td class="style39" height="17"></td>';
        // tmp_footer += '<td class="style40"></td>';
        // tmp_footer += '<td class="style40"></td>';
        // tmp_footer += '<td class="style40"></td>';
        // tmp_footer += '<td class="style40"></td>';
        // tmp_footer += '<td class="style40"></td>';
        // tmp_footer += '<td class="style40"></td>';
        // tmp_footer += '<td class="style48"></td>';
        // tmp_footer += '<td class="style8"></td>';
        // tmp_footer += '</tr>';

        // tmp_footer += '<tr height="27" style="mso-height-source:userset;height:20.25pt">';

        // tmp_footer += '<td class="style7">' + cus_name + '</td>';
        // tmp_footer += '<td class="style8"><div style=" text-align:center; margin-left:200px">' + order_kt + '</div></td>';
        // tmp_footer += '<td class="style7">&nbsp;</td>';
        // tmp_footer += '<td class="style8"></td>';
        // tmp_footer += '<td class="style7">' + cus_explode + '</td>';
        // tmp_footer += '<td class="style8"></td>';
        // tmp_footer += '</tr>';

        // tmp_footer += '<tr height="27" style="mso-height-source:userset;height:20.25pt">';
        // tmp_footer += '<td class="style41" height="27"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style8"></td>';
        // tmp_footer += '</tr>';

        // tmp_footer += '<td class="style42" height="30"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style47"></td>';
        // tmp_footer += '<td class="style8"></td>';
        // tmp_footer += '</tr>';

        // tmp_footer += '<tr height="30" style="mso-height-source:userset;height:22.5pt">';
        // tmp_footer += '<td class="style42" height="30"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style7">' + order_date + ' <span style="mso-spacerun:yes"> </span>' + ngayht + '</td>';
        // tmp_footer += '</tr>';

        // // tmp_footer += '<tr height="30" style="mso-height-source:userset;height:22.5pt">';
        // // tmp_footer += '<td class="style43" colspan="2" height="30" style="text-underline-style: single;">Chú ý:<span style="mso-spacerun:yes">&nbsp;</span></td>';
        // // tmp_footer += '<td class="style44" colspan="6" style="mso-ignore: colspan">Thời gian giải quyết thắc mắc, khiếu nại của khách hàng là 48 tiếng (2 ngày) tính từ thời điểm nhận được hàng</td>';
        // // tmp_footer += '<td class="style8"></td>';
        // // tmp_footer += '</tr>';

        // tmp_footer += '<tr height="17" style="height:12.75pt">';
        // tmp_footer += '<td class="style45" height="17"></td>';
        // tmp_footer += '<td class="style7"></td>';
        // tmp_footer += '<td class="style8" colspan="5" style="mso-ignore: colspan"></td>';
        // tmp_footer += '<td class="style47"></td>';


        // tmp.write(tmp_footer);
        // tmp.write('<td class="style8"></td></tr></tbody></table>');
        // tmp.write('<div class="inhoadon"><a onclick="window.print();return false" class="print_hd">' + order_print + '</a></div></br>');
        // tmp.write('</body></html>');
        // tmp.close();

    }

    var handleRefeshFeeShipClick = function() {
        $('body').on('click', '.btnRefeshFee', function(event) {
            event.preventDefault();

            if ($('input[name="addressPay"]').val() != false) {
                var self = $('input[name="addressPay"][value="' + $('input[name="addressPay"]').val() + '"]');
                var provincename = self.attr('data-province');
                var districtname = self.attr('data-district');
                getListCarrierService(provincename, districtname);
            } else {
                handleRefeshFeeShip();
            }

        });
    };
    var handleRefeshFeeShip = function() {
        var districtname = $('.BNC_districtId option:selected').val();
        var provincename = $('.BNC_cityId option:selected').val();

        if (districtname != false && provincename != false && districtname != undefined && provincename != undefined) {
            getListCarrierService(provincename, districtname);
        } else {
            $('#methodShipping').html('<p class="text-danger">' + lang_PleaseDelivery + '</p>');
        }

    };
    var getDistric = function() {
        var home_url = $('base').attr('href');
        var lang = $('base').attr('lang');

        $('.BNC_cityId').change(function() {
            var district = $(this).parents('.BNC_address_genral').find('.BNC_districtId');
            var provinceid = $(this).val();
            if (provinceid === '') {
                if (lang == 'en') {
                    district.html('<option value="" selected>District/Convince</option>');
                }else{
                    district.html('<option value="" selected>Quận/Huyện</option>');
                }

                district.prop('disabled', true);
                return false;
            }
            $('#methodShipping').html('<p class="text-danger">' + lang_PleaseDelivery + '</p>');
            $.ajax({
                url: home_url + '/payment-oncepage-getDistrict.html',
                data: {
                    provinceid: provinceid
                },
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    //console.log(res);
                    if (lang == 'en') {
                        var html = '<option value="">District/Convince</option>';
                    }else{
                        var html = '<option value="">Quận/Huyện</option>';
                    }

                    $.each(res, function(k, v) {
                        html += '<option name="' + v.name + '" value="' + v.districtid + '">' + v.name + '</option>';
                    });
                    district.html(html);

                    district.prop("disabled", false);

                },
                error: function(error) {
                    //console.log(error);
                }
            });
        });
    };
    var chooseDistrict = function() {
        var home_url = $('base').attr('href');
        $('.BNC_districtId').change(function() {
            var provinceid;
            var districtid;
            handleRefeshFeeShip();
            //$("#methodShipping").html("Đang tính toán phí");
            $("#methodShipping").slideDown();
            /* thue theo khu vuc */
            refeshTax();
        });
    };
    var chooseAddress = function() {
        $('body').on('click', '.BNC_choose_address', function() {
            //Disable form other_address
            $('.BNC_other_address').slideUp();
            $('#BNC_other_address').find('.icon_add_more_address').text('+');
            var input = $(this).find('input[name="addressPay"]');
            $('input[name="addressPay"]').prop("checked", false);
            $('.BNC_other_address').find('input,select,textarea').prop({
                disabled: true
            });
            input.prop("checked", true);
            var provincename = input.attr('data-province');
            var districtname = input.attr('data-district');
            getListCarrierService(provincename, districtname);
            $("#methodShipping").slideDown();
        })
    }
    var other_address = function() {
        $('body').on('click', '#BNC_other_address', function(e) {
            e.preventDefault();
            $('input[name="addressPay"]').prop("checked", false);
            $(this).find('input[name="addressPay"]').prop("checked", true);
            $("#methodShipping").html('');
            if ($('.BNC_other_address').css('display') == 'none') {
                $('.BNC_other_address').find('input,select,textarea').prop({
                    disabled: false
                });
                $('.BNC_other_address').slideDown();
                $(this).find('.icon_add_more_address').text('-');
                //Cập nhật phí vận chuyển
                $.post(home_url + '/payment-oncepage-removeShipping.html');
                refeshTax();
            } else {
                $('.BNC_other_address').slideUp();
                $(this).find('.icon_add_more_address').text('+');
                $('.BNC_other_address').find('input,select,textarea').prop({
                    disabled: true
                });
            }
        });
    }
    var getListCarrierService = function(provincename, districtname) {

        var home_url = $('base').attr('href');
        $.ajax({
            url: home_url + '/payment-oncepage-getShippingMethod.html',
            data: {
                provincename: provincename,
                districtname: districtname
            },
            type: 'POST',
            dataType: 'html',
            success: function(json) {
                //console.log(json);
                //$("#methodShipping").html(json);
                //$('input[name="serviceId"]').addClass('validate[required,serviceId]');
                //refeshTax();
                $("#BNC_product_list .content").load(home_url + '/payment-oncepage.html #BNC_product_list > .content > *');
                    refeshTax();


            },
            error: function(error) {
                console.log(error);
            }
        });

    }
    var updateQuantity = function() {
        $('body').on('blur', '.BNC_product_quantity', function() {
            var home_url = $('base').attr('href');
            var url = home_url + '/payment-oncepage-updateQuantity.html';
            var order_product_id = $(this).attr('order-product-id');
            $.ajax({
                url: url,
                data: {
                    order_product_id: order_product_id,
                    quantity: $(this).val()
                },
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    if (res.status == false) {
                        alert("Kết nối mạng có vấn đề. Vui lòng thử lại !");
                        return;
                    }
                    $("#BNC_product_list .content").load(home_url + '/payment-oncepage.html #BNC_product_list > .content > *');
                    refeshTax();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    }

    function globalAjax(url, data, type, dataType) {
        var returnObj = new Array();
        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType: dataType,
            success: function(res) {
                returnObj = {
                    status: 1,
                    message: res
                };
            },
            error: function(error) {
                returnObj = {
                    status: 0,
                    message: error
                };
            }
        });
        return returnObj;
    }
    var removeProduct = function() {
        $('body').on('click', '.removeProduct', function() {
            var $this = $(this);
            var home_url = $('base').attr('href');
            var url = home_url + '/payment-oncepage-removeProduct.html';
            var order_product_id = $(this).attr('order-product-id');
            var product_id = $(this).attr('data-product-id');

            $.ajax({
                url: url,
                data: {
                    product_id: product_id,
                    order_product_id: order_product_id
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    if (data.status == 1) {
                        toastr.success(data.message);
                        $('#BNC_product_list').fadeOut('fast', function() {
                            $('#BNC_product_list').load(home_url + '/payment-oncepage.html #BNC_product_list > *', function() {
                                $('#BNC_product_list').fadeIn('fast');
                            });
                        });
                    } else if (data.status == 2) {
                        toastr.success(data.message);
                        window.location.href = data.redirect;
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });
    };
    var loginBaokim = function() {
        $('body').on('click', '#loginBaokim', function() {});
    };
    var backOrder=function(){
        $('body').on('click', '.backOrder', function(event){
            event.preventDefault();
            window.history.back();
            return;
        });
    }

    var handleCheckCoupon = function() {
        $('body').on('click', '.check_coupon', function(event) {
            event.preventDefault();
            var coupon = $('input[name="coupon"]').val();
            coupon = $.trim(coupon);
            if (coupon === '') {
                //Focus
                $('.divCost_coupon').slideUp();
                $('input[name="coupon"]').focus();
                toastr.error('Vui lòng điền thông tin mã giảm giá');
            } else {
                //Ajax
                $.ajax({
                    url: $('base').attr('href') + '/payment-oncepage-checkCoupon' + $('base').attr('extention'),
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        'coupon': coupon
                    },
                })
                    .success(function(res) {
                        if (res.status === false) {
                            $('.divCost_coupon').slideUp();
                            if (res.error === 'error') {
                                toastr.error(res.message);
                                return false;
                            } else {
                                toastr.warning(res.message);
                                return false;
                            }
                        } else {
                            $('.divCost_coupon').slideDown();
                            toastr.success(res.message);
                            var htm = '<i class="fa fa-long-arrow-down"></i> ' + res.message + '<br/>(<small>Ghi chú: ' + res.more + '</small>)';
                            $('.cost_coupon').html(htm);
                        }
                    });

            }
        });
    };
    var handleCheckPoint = function() {
        $('body').on('click', '.check_point', function(event) {
            event.preventDefault();
            var point_pay = $('input[name="point_pay"]').val();
            point_pay = $.trim(point_pay);
            if (point_pay === '') {
                //Focus
                $('.divCost_coupon').slideUp();
                $('input[name="coupon"]').focus();
                toastr.error('Vui lòng điền số điểm');
            } else {
                //Ajax
                $.ajax({
                    url: $('base').attr('href') + '/payment-oncepage-checkPoint' + $('base').attr('extention'),
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        'point_pay': point_pay
                    },
                })
                    .success(function(res) {
                        if (res.status === false) {
                            $('.divCost_point').slideUp();
                            if (res.error === 'error') {
                                toastr.error(res.message);
                                return false;
                            } else {
                                toastr.warning(res.message);
                                return false;
                            }
                        } else {
                            $('.divCost_point').slideDown();
                            toastr.success(res.message);
                            var htm = '<i class="fa fa-long-arrow-down"></i> ' + res.message + '<br/>(<small>Ghi chú: ' + res.more + '</small>)';
                            $('.cost_point').html(htm);
                        }
                    });

            }
        });
    };
    var handleClickCarrier = function() {
        $('body').on('change', 'input[name="shippingCarrier"]', function(event) {
            event.preventDefault();
            var city = $('select#cityId option:selected').val();
            var district = $('select#districtId option:selected').val();
            var carrier = $(this).attr('data-carrier');
            var home_url = $('base').attr('href');
            $.ajax({
                url: $('base').attr('href') + '/payment-oncepage-updateShipFee' + $('base').attr('extention'),
                type: 'POST',
                dataType: 'json',
                data: {
                    author: 'nxt',
                    city: city,
                    district: district,
                    carrier: carrier,
                },
            }).success(function(res) {
                if (res.status == true) {
                    refeshTax();
                }


            });
        });


    }
    var refeshTax = function(){
        var home_url = $('base').attr('href');
        $("#BNC_product_list .content .dola").load(home_url + '/payment-oncepage.html #BNC_product_list > .content > .dola >*');
        return false;
            // var cf_tax = $('#feeTaxConfig').val();
            //alert(1);
            // if(cf_tax==1)
            // {
            //     var home_url = $('base').attr('href');
            //     //var provinceid = $(this).val();
            //     var provinceid = $('.BNC_cityId option:selected').val();
            //     var total = $.trim($('#total_order').val());
            //     var total1 = total.replace('.','');
            //     var total2 = parseInt(total1.replace('.',''));
            //     console.log(total2);
            //     $.ajax({
            //         url: home_url + '/payment-oncepage-getTax.html',
            //         data: {
            //             provinceid: provinceid
            //         },
            //         type: 'POST',
            //         dataType: 'json',
            //         success: function(res) {
            //           //  console.log(res);
            //             if (res==null) {
            //               $('.feeTax').text(0);
            //             }else{
            //               $('.feeTax').text(res);
            //             }
            //             var total_ajax = (res*total2/100)+total2;
            //             total_ajax= numberFormat(total_ajax, 0, '.', '.');
            //             $('#total_order').val(total_ajax);
            //             $('.end-dola span:last-child').html(total_ajax);
            //         },
            //         error: function(error) {
            //             //console.log(error);
            //         }
            //     });
            // }
    };

    return {
        init: function() {
            handleOnload();
            handleCheckCoupon();
            handleCheckPoint();
            //setPrint();
            // slimScroll();
            getDistric();
            backOrder();
            chooseDistrict();
            updateQuantity();
            removeProduct();
            other_address();
            chooseAddress();
            handleRefeshFeeShipClick();
            handleClickCarrier();
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            $("#loginBaokim").fancybox({
                maxWidth: 800,
                maxHeight: 600,
                fitToView: false,
                width: '70%',
                height: '70%',
                autoSize: false,
                closeClick: false,
                openEffect: 'none',
                closeEffect: 'none',
                afterShow: function() {;
                    if ($("iframe").find(".vnp-group").length > 0) {
                        console.log($("iframe").find(".vnp-group").length);
                        alert('hi');
                    } else {
                        console.log($("iframe").find(".vnp-group").length);
                        alert('hù');
                    }
                },
            });
        }
    }


}();
$(function() {
    OncePage.init();
    //$('.submitPrint').text('');


});
function numberFormat(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
}
