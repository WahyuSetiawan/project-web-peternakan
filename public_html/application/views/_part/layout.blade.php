<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="base_url_controller" content="{{ current_url() }}">
    <meta name="base_url" content="{{ base_url() }}">

    <title>Document</title>

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
                        <input type="button" class="btn btn-info" value="Change Password">
                        <input type="button" class="btn btn-danger" value="Log Out">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="sidemenu">
                @include('_part/sidemenu')
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

</html>