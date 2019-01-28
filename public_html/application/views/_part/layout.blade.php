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
    <link rel="stylesheet" href="{{base_url('asset/css/base.css?v=').date("Y/m/d") }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <?php /* <link rel="stylesheet" href="<?php echo base_url("css/bootstrap-datetimepicker.min.css") ?>" /> */ ?>
</head>

<body>
    <div class="container">
        <div class="top-nav">
            <div class="header">
                <a class="title">Peternakan</a>
            </div>
            <div class="pull-right drop-menu">
                <div class="button js-open-menu">Admin</div>

                <div class="nav-menu">
                    <div class="body">
                        <p>Username :</p>
                        <p>Login : </p>
                    </div>
                    <div class="footer">
                        <input type="button" class="btn btn-info change-password" value="Change Password" data-user="{{json_encode($head['username'])}}">
                        <a href="{{base_url("login/out")}}" class="btn btn-danger">Log Out</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="sidemenu">
                @include('_part/sidemenu', $head)
            </div>
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
                    <h3 class="modal-title" id="mediumModalLabel">Tambah Kandang</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="text" class="form-control" name="old_password" placeholder="Password Lama">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="text" class="form-control" name="new_password" placeholder="Password Baru">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Ulangi Password</label>
                            <input type="text" class="form-control" name="repeat_new_password" placeholder="Ulangi Password">
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js" type="text/javascript"></script>
<script src="{{base_url('asset/js/ui.js?v=').date("Y/m/dms") }}" type="text/javascript"></script>


<script>
    $(document).ready(function () {
        var a = ".sidemenu .menu a[href='" + $("meta[name='base_url_controller']").attr(
            'content').replace("index.php/", '') + "']";

        $(a).addClass('active').parents(".menu").addClass('active');
    });

    $(document).on("click", ".js-open-menu", function () {
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
    $(document).on("click", ".change-password", function () {
        var user = $(this).data('user');

        $("#modal-change-karyawan").modal('show');
    });

        $(document).ready(function () {
        $("#form-change-password").validate({
            rules: {
                nama: {
                    required: true,
                    minlength: 1
                },
                maksimal_jumlah: {
                    number: true,
                    min: 1,
                }
            },
            messages: {
                nama: {
                    required: "Nama tidak boleh kosong",
                    minlength: "Minimal karakter adalah 1"
                },
                maksimal_jumlah: {
                    number: "Harus Berupa Angka",
                    min: "Minimal jumlah yang dinputkan adalah 1"
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                error.addClass("help-block");

                if (element.prop("type") == "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parent(".form-group").addClass("has-warning").removeClass("has-success");
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent(".form-group").addClass("has-success").removeClass("has-warning");
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });


</script>

</html>