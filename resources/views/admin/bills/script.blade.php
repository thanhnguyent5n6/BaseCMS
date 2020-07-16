<script>
    'use strict';
    // Class definition

    var CategoryDatatable = function() {
        // Private functions

        // demo initializer
        var demo = function() {

            var dataItems = {!! @$data_items !!};

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
                    input: $('#kt_datatable_search_query'),
                },

                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        type: 'number',
                        selector: {class: 'kt-checkbox--solid'},
                        textAlign: 'center',
                    },
                    {
                        field: 'stt',
                        title: 'STT',
                        width: 30,
                    }, {
                        field: 'code',
                        title: 'Mã hóa đơn',
                    }, {
                        field: 'customer_name',
                        title: 'Tên người mua',
                    },
                    {
                        field: 'total',
                        title: 'Tổng tiền',
                    },
                    {
                        field: 'payment',
                        title: 'Hình thức thanh toán',
                    },
                    {
                        field: 'date_order',
                        title: 'Ngày đặt hàng',
                    }, {
                        field: 'status',
                        title: 'Trạng thái',
                        // callback function support for column rendering
                        template: function(row) {
                            var status = {
                                1: {
                                    'title': 'Mới tạo',
                                    'class': ' label-light-primary'
                                },
                                2: {
                                    'title': 'Đang xử lý',
                                    'class': ' label-light-warning'
                                },
                                3: {
                                    'title': 'Đã giao hàng',
                                    'class': ' label-light-success'
                                },
                                4: {
                                    'title': 'Trả lại',
                                    'class': ' label-light-danger'
                                },
                            };
                            return '<span class="label font-weight-bold label-lg ' + status[row.status].class + ' label-inline">' + status[row.status].title + '</span>';
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Chi tiết',
                        sortable: false,
                        width: 110,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            let urlEdit = "{{ route('admin.bill.detail',['id' => 'txt_edit_id']) }}";
                            var url = urlEdit.replace('txt_edit_id', row.id);
                            return `
						<a href="`+url+`" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Chi tiết đơn hàng">
							<i class="fa fa-eye"></i>
						</a>`;
                        },
                    }],
            });

            $('#filter_status').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'status');
            });


            $('#filter_status').selectpicker();

            $('#btn_delete_record').on('click', function (){

                let row_selected  = datatable.getSelectedRecords();
                let ids = [];

                $.each(row_selected, function(key, item) {
                    ids.push($(item).find('input').val());
                });

                if(ids.length == 0) {
                    alert("Bạn chưa chọn hóa đơn!");
                    return false;
                }

                if(confirm('Bạn có chắc muốn xóa '+ids.length+' hóa đơn này?')) {
                    let urlDelete = `{{ route('admin.bill.destroy') }}`;
                    $.ajax({
                        url: urlDelete,
                        type: "POST",
                        data: {ids: ids},
                        success: function (result) {
                            location.reload();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(thrownError);
                        }
                    });
                }
            });

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
        CategoryDatatable.init();
    });


</script>
