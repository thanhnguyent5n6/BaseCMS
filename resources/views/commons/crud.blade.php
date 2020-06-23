<script>
    Crud = {
        _urlLoadDataItems: null,
        _urlAdd: null,
        _urlStore: null,
        _urlEdit: null,
        _urlUpdate: null,
        _urlDelete: null,
        _urlDestroy: null,
        _parameters: null,
        _select2Class: null,
        _formStore: null,
        _formUpdate: null,
        _formDestroy: null,
        _keywordSearch: "keyword_search",

        initParameter: function(parameters = array()) {
            Crud._parameters = parameters;
        },

        getParameter: function() {

            var data = {};

            $.each(Crud._parameters, function(key, elementName) {
                if($("#"+elementName).is("input")) {
                    data[elementName] = $("#"+elementName).val();
                }
                if($("#"+elementName).is("select")) {
                    if($("#"+elementName).attr('multiple') == "multiple") {
                        data[elementName] = $("#"+elementName).val();
                    }
                    else {
                        data[elementName] = $("#"+elementName).find("option:selected").val()
                    }
                }
                if ($("#"+elementName).is(":radio")) {
                    data[elementName] = $("[id="+elementName+"]:checked").val();
                }
            });

            return data;
        },

        init: function (urlLoadDataItems = null, urlAdd = null, urlStore = null, urlEdit = null, urUpdate = null, urlDelete = null, urlDestroy = null) {

            Crud._urlLoadDataItems = urlLoadDataItems;
            Crud._urlAdd = urlAdd;
            Crud._urlStore = urlStore;
            Crud._urlEdit = urlEdit;
            Crud._urlUpdate = urUpdate;
            Crud._urlDelete = urlDelete;
            Crud._urlDestroy = urlDestroy;
        },

        initForm: function(formStore = null, formUpdate = null, formDestroy = null) {
            if(formStore != null)
                Crud._formStore = "#"+formStore;
            if(formUpdate != null)
                Crud._formUpdate = "#"+formUpdate;
            if(formDestroy != null)
                Crud._formDestroy = "#"+formDestroy;
        },

        loadDataItems: function (is_export = null) {
            // overLoadingData($('#div_overlay_process'));
            let data_type;

            if (is_export == 1) {
                data_type = 'json';
            }
            else {
                data_type = 'text';
            }

            let this_data = Crud.getParameter();

            $.ajax({
                url: Crud._urlLoadDataItems,
                type: "POST",
                dataType: data_type,
                data: {
                    is_export: is_export,
                    data: this_data,
                },
                success: function (result) {
                    if (is_export == 1) {
                        var a = document.createElement("a");
                        a.href = result.file;
                        a.download = result.name;
                        document.body.appendChild(a);
                        a.click();
                        a.remove();
                    } else {
                        $('#data-items').html(result);
                    }
                    // hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },

        add: function () {
            $.ajax({
                url: Crud._urlAdd,
                type: "POST",
                data: {},
                success: function (result) {
                    $('#div_modal_box').html(result);
                    $('#div_modal_box').modal({show: true});
                    $(".select2").select2();

                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },

        store: function() {
            let url, method;
            if($(Crud._formStore).attr('action') != "") {
                url = $(Crud._formStore).attr('action');
                method = $(Crud._formStore).attr('method');
            }
            else {
                url =    Crud._urlStore
                method = "POST";
            }
            $.ajax({
                url: url,
                type: method,
                data: $(Crud._formStore).serialize(),
                success: function (result) {
                    let data = JSON.parse(result);
                    if(data.status == 200) {
                        swal({
                            title: data.title,
                            icon: "success",
                            type: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        Crud.loadDataItems(1);
                        $('#div_modal_box').modal('hide');
                        return false;
                    }
                    else {
                        swal({
                            title: data.title,
                            icon: "error",
                            type: "error",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }

                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (response) {
                    let message = response.responseJSON.errors;
                    $.each(message, function(key, item) {
                        swal({
                            title: item,
                            icon: "error",
                            type: "error",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        return false;
                    });
                }
            });
        },

        edit: function (id) {
            $.ajax({
                url: Crud._urlEdit,
                type: "POST",
                data: {id:id},
                success: function (result) {
                    $('#div_modal_box').html(result);
                    $('#div_modal_box').modal({show: true});
                    $(".select2").select2();

                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },

        update: function() {
            let url, method;
            if($(Crud._formUpdate).attr('action') != "") {
                url = $(Crud._formUpdate).attr('action');
                method = $(Crud._formUpdate).attr('method');
            }
            else {
                url =    Crud._urlUpdate;
                method = "POST";
            }
            $.ajax({
                url : url,
                type : method,
                data : $(Crud._formUpdate).serialize(),
                success: function (result) {
                    let data = JSON.parse(result);
                    if(data.status == 200) {
                        swal({
                            title: data.title,
                            icon: "success",
                            type: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#div_modal_box').modal('hide');
                        Crud.loadDataItems(1);
                        return false;
                    }else{
                        swal({
                            title: data.title,
                            icon: "error",
                            type: "error",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }

                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (response) {
                    let message = response.responseJSON.errors;
                    $.each(message, function(key, item) {
                        swal({
                            title: item,
                            icon: "error",
                            type: "error",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        return false;
                    });
                }
            });
        },

        delete: function (id) {
            $.ajax({
                url: Crud._urlDelete,
                type: "POST",
                data: {id:id},
                success: function (result) {
                    $('#div_modal_box').html(result);
                    $('#div_modal_box').modal({show: true});
                    hideOverLoadingData($('#div_overlay_process'));
                    Crud.loadDataItems(1);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },

        destroy: function(id) {
            $.ajax({
                type: 'POST',
                url : Crud._urlDestroy,
                data: {
                    id: id,
                },
                success: function (result) {
                    let data = JSON.parse(result);
                    if (data.status===200){
                        swal({
                            title: data.title,
                            icon: "success",
                            type: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        Crud.loadDataItems(1);
                    }else {
                        swal({
                            title: data.title,
                            icon: "errors",
                            type: "errors",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }
                    $('#div_modal_box').modal('hide');
                    hideOverLoadingData($('#div_overlay_process'));
                    Crud.loadDataItems(1);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },
    }
</script>
