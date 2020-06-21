<script>
    'use strict';
    // Class definition

    var KTDatatableDataLocalDemo = function() {
        // Private functions

        // demo initializer
        var demo = function() {
            var dataJSONArray = JSON.parse('[{"RecordID":1,"OrderID":"0374-5070","Country":"China","ShipCountry":"CN","ShipCity":"Jiujie","ShipName":"Rempel Inc","ShipAddress":"60310 Schiller Center","CompanyEmail":"cdodman0@wsj.com","CompanyAgent":"Cordi Dodman","CompanyName":"Kris-Wehner","Currency":"CNY","Notes":"sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus","Department":"Kids","Website":"tripadvisor.com","Latitude":39.952319,"Longitude":119.598195,"ShipDate":"8/27/2017","PaymentDate":"2016-09-15 22:18:06","TimeZone":"Asia/Chongqing","TotalPayment":"$336309.10","Status":6,"Type":2,"Actions":null},\n' +
                '{"RecordID":2,"OrderID":"63868-257","Country":"Philippines","ShipCountry":"PH","ShipCity":"Gibgos","ShipName":"Muller, Leannon and McKenzie","ShipAddress":"26734 Mitchell Drive","CompanyEmail":"kscritch1@google.es","CompanyAgent":"Katrinka Scritch","CompanyName":"Stanton, Friesen and Grant","Currency":"PHP","Notes":"ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur","Department":"Tools","Website":"elpais.com","Latitude":13.8503992,"Longitude":123.7585154,"ShipDate":"9/3/2017","PaymentDate":"2016-09-05 16:27:07","TimeZone":"Asia/Manila","TotalPayment":"$786612.37","Status":1,"Type":2,"Actions":null},\n' +
                '{"RecordID":3,"OrderID":"49288-0815","Country":"Paraguay","ShipCountry":"PY","ShipCity":"General Elizardo Aquino","ShipName":"Fahey, Rosenbaum and Leannon","ShipAddress":"9 Daystar Center","CompanyEmail":"neberlein2@google.ca","CompanyAgent":"Nevin Eberlein","CompanyName":"Cartwright, Hilpert and Hartmann","Currency":"PYG","Notes":"bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris","Department":"Electronics","Website":"bing.com","Latitude":-24.4436327,"Longitude":-56.9014072,"ShipDate":"4/23/2016","PaymentDate":"2016-01-01 08:03:07","TimeZone":"America/Asuncion","TotalPayment":"$216102.85","Status":5,"Type":1,"Actions":null},\n' +
                '{"RecordID":100,"OrderID":"50865-056","Country":"Honduras","ShipCountry":"HN","ShipCity":"Yuscarán","ShipName":"Anderson, Pfannerstill and Miller","ShipAddress":"116 Bay Way","CompanyEmail":"hensley2r@businessweek.com","CompanyAgent":"Hamil Ensley","CompanyName":"Kessler, Greenfelder and Gaylord","Currency":"HNL","Notes":"nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis","Department":"Kids","Website":"dell.com","Latitude":13.9448964,"Longitude":-86.8508942,"ShipDate":"1/14/2016","PaymentDate":"2016-12-27 22:25:10","TimeZone":"America/Tegucigalpa","TotalPayment":"$386091.31","Status":6,"Type":3,"Actions":null}]');

            let dataItems = {!! @$data_items !!};

            var datatable = $('.kt-datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'local',
                    source: dataItems,
                    pageSize: 10,
                },

                // layout definition
                layout: {
                    scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                    // height: 450, // datatable's body's fixed height
                    footer: false, // display/hide footer
                },

                // column sorting
                sortable: true,

                pagination: true,

                search: {
                    input: $('#generalSearch'),
                },

                // columns definition
                columns: [
                    {
                        field: 'stt',
                        title: 'STT',
                    }, {
                        field: 'name',
                        title: 'Tên danh mục',
                    }, {
                        field: 'icon',
                        title: 'Icon',
                    }, {
                        field: 'priority',
                        title: 'Độ ưu tiên',
                    }, {
                        field: 'status',
                        title: 'Trạng thái',
                        // callback function support for column rendering
                        template: function(row) {
                            var status = {
                                0: {'title': 'Khóa', 'class': ' kt-badge--danger'},
                                1: {'title': 'Hoạt động', 'class': ' kt-badge--success'}
                            };
                            return '<span class="kt-badge ' + status[row.status].class + ' kt-badge--inline kt-badge--pill">' + status[row.status].title + '</span>';
                        },
                    },
                    {
                        field: 'parent',
                        title: 'Danh mục cha',
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 110,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            let urlEdit = "{{ route('admin.categories.edit',['id' => 'txt_edit_id']) }}";
                            var url = urlEdit.replace('txt_edit_id', row.id);
                            return '\
						<a href="'+url+'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Cập nhật">\
							<i class="la la-edit"></i>\
						</a>\
						<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Xóa">\
							<i class="la la-trash"></i>\
						</a>\
					';
                        },
                    }],
            });

            $('#kt_form_parent_id').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'parent');
            });

            $('#kt_form_parent_id').selectpicker();

        };

        return {
            // Public functions
            init: function() {
                // init dmeo
                demo();
            },
        };
    }();

    jQuery(document).ready(function() {
        KTDatatableDataLocalDemo.init();
    });
</script>