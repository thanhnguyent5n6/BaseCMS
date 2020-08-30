<script>
    'use strict';
    // Class definition

    var ProductDatatable = function() {
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
                    input: $('#generalSearch'),
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
                    }, {
                        field: 'code',
                        title: 'Mã sản phẩm',
                    }, {
                        field: 'name',
                        title: 'Tên sản phẩm',
                    }, {
                        field: 'description',
                        title: 'Mô tả',
                    },
                    {
                        field: 'unit_price',
                        title: 'Giá gốc',
                    },
                    {
                        field: 'sales',
                        title: 'Khuyến mãi',
                    },{
                        field: 'unit',
                        title: 'Đơn vị',
                    },
                    {
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
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 110,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            let urlEdit = "{{ route('admin.products.edit',['id' => 'txt_edit_id']) }}";
                            var url = urlEdit.replace('txt_edit_id', row.id);
                            return `
						<a href="`+url+`" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Cập nhật">
							<i class="la la-edit"></i>
						</a>`;
                        },
                    }],
            });

            $('#kt_form_parent_id').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'parent');
            });


            $('#kt_form_parent_id').selectpicker();

            $('#btn_delete_record').on('click', function (){

                let row_selected  = datatable.getSelectedRecords();
                let ids = [];

                $.each(row_selected, function(key, item) {
                    ids.push($(item).find('input').val());
                });

                if(ids.length == 0) {
                    alert("Bạn chưa chọn danh mục!");
                    return false;
                }

                if(confirm('Bạn có chắc muốn xóa '+ids.length+' danh mục này?')) {
                    let urlDelete = `{{ route('admin.products.destroy') }}`;
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
        ProductDatatable.init();
    });


</script>
