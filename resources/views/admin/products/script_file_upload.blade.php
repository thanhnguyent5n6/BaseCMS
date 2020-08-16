<script>
    "use strict";
    // Class definition

    var KTDropzoneDemo = function () {

        return {
            // public functions
            init: function() {
                $('#kt_dropzone_3').dropzone({
                    url: "{{ route('file.upload') }}", // Set the url for your upload script location
                    paramName: "file", // The name that will be used to transfer the file
                    maxFiles: 10,
                    maxFilesize: 10, // MB
                    addRemoveLinks: true,
                    acceptedFiles: "image/*,application/pdf,.psd",
                    accept: function(file, done) {
                        done();
                    }, success: function(result, data) {
                        let inputElm = `<input type="hidden" value=`+data+` name="image_id[]">`;
                        $("#input-file-name").append(inputElm);
                    }
                });
            }
        };
    }();

    KTUtil.ready(function() {
        KTDropzoneDemo.init();
    });

</script>
