<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="base_url_controller" content="{{ current_url() }}">
    <meta name="base_url" content="{{ base_url() }}">

    <title>Sistem Informasi Peternakan</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{base_url('asset/css/base.css?v=').date("d-m-Y") }}" />

    <link rel="stylesheet" href="<?php echo base_url("asset/css/jquery-ui.min.css") ?>" />
    <link rel="stylesheet" href="{{base_url('asset/js/datetimepicker/jquery.datetimepicker.min.css')}}" />
    <link rel="stylesheet" href="{{base_url('asset/js/morris/morris.css')}}" />
    <?php /* <link rel="stylesheet" href="<?php echo base_url("css/bootstrap-datetimepicker.min.css") ?>" /> */?>
</head>

<body style="background-color:#757575">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @yield("modal")
</body>

<div class="modal fade" id="modal-change-karyawan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{base_url('login/change')}}" method="post" id="form-change-password">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Ubah Sandi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <input type="hidden" name="password" id="password" value="{{$head['password']}}">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Sandi Lama</label>
                            <input type="text" class="form-control" name="old_password" placeholder="Sandi Lama">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Sandi Baru</label>
                            <input type="text" class="form-control" id="new_password" name="new_password"
                                placeholder="Sandi Baru">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Ulangi Sandi</label>
                            <input type="text" class="form-control" name="repeat_new_password"
                                placeholder="Ulangi Sandi">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo base_url('asset/') ?>vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('asset/js/jquery-ui.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/js/moment.min.js') ?>" type="text/javascript"></script>
<script src="{{base_url('asset/js/ui.js?v=').date("d-m-Y") }}" type="text/javascript"></script>
<script src="{{base_url('asset/js/jquery.validate.min.js')}}"></script>
<script src="{{base_url('asset/js/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
<script src="{{base_url('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{base_url('asset/js/morris/morris.min.js')}}"></script>
<script src="{{base_url('asset/js/home.js')}}"></script>
<script>
$(document).ready(function() {
    var a = ".sidemenu .menu a[href='" + $("meta[name='base_url_controller']").attr(
        'content').replace("index.php/", '') + "']";

    $(a).addClass('active').parents(".menu").addClass('active');
});

$(document).on("click", ".js-open-menu", function() {
    if ($(this).parent(".drop-menu").hasClass("active")) {
        $(this).parent(".drop-menu").removeClass("active");
    } else {
        $(this).parent(".drop-menu").addClass("active");
    }
});
</script>

<script>
var defaultDatePicker = {
    dateFormat: 'dd-mm-yy',
    autoUpdateInput: false
};
</script>

@yield('js')

<script>
$(document).on("click", ".change-password", function() {
    var user = $(this).data('user');

    $("#modal-change-karyawan").modal('show');
});

$(document).ready(function() {
    $(document).on("click", "button[href]", function() {
        var attr_href = $(this).attr("href");

        window.location.href = attr_href;
    });

    $("#form-change-password").validate({
        rules: {
            old_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            new_password: {
                required: true,
                minlength: 5
            },
            repeat_new_password: {
                required: true,
                equalTo: "#new_password"
            },
        },
        messages: {
            old_password: {
                required: "Sandi lama tidak boleh kosong",
                minlength: "Minimal Sandi 5 karakter"
            },
            new_password: {
                required: "Sandi baru tidak boleh kosong",
                minlength: "Minimal Sandi 5 karakter"
            },
            repeat_new_password: {
                required: "Ulangi sandi baru, tidak boleh kosong",
                equalTo: "Sandi tidak sama"
            },
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            error.addClass("help-block");

            if (element.prop("type") == "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parent(".form-group").addClass("has-warning").removeClass("has-success");
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parent(".form-group").addClass("has-success").removeClass("has-warning");
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});
</script>

</html>