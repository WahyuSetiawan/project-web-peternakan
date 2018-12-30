@extends("_part.layout",  $head)

@section("content")

<div class="row">
    <h3 class="title-5 m-b-25">Admin</h3>

    <div class="col-lg-12  m-b-25">
        <button class="au-btn au-btn-icon au-btn--green au-btn--small btn-add-admin" type="button">
            <i class="zmdi zmdi-plus"></i>Tambah Admin</button>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admin as $key => $value) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->password ?></td>
                            <td style="text-align: center">
                                <button type="button" class="btn btn-primary edit-admin" data-admin='<?= json_encode($value) ?>'><i class="fa fa-pen-square"></i></button>
                                <button type="button" class="btn btn-danger del-admin" data-admin='<?= json_encode($value) ?>'><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <?= $pagination ?>
            </div>
        </div>
    </div>
</div>
@endsection

@section("modal")

<!-- modal medium -->
<div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-admin">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Tambah Supplier</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password">
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
<!-- end modal medium -->

<div class="modal" id="modal-del-admin">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Hapus Supplier</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    Anda yakin menghapus data <span class="id"></span> dengan nama <span class="username"></span> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="del">Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/additional-methods.min.js') ?>"></script>

<script>
    $(document).on("click", ".btn-add-admin", function () {
        var modalAdmin = $('#modalAdmin');

        modalAdmin.find("input[name='id']").val("");
        modalAdmin.find("input[name='username']").val("");
        modalAdmin.find("input[name='password']").val("");
        modalAdmin.find("button[name='submit']").attr('name', 'submit');

        modalAdmin.modal('show');
    });

    $(document).on("click", ".edit-admin", function () {
        var data = $(this).data('admin');

        var modalAdmin = $('#modalAdmin');

        modalAdmin.find("input[name='id']").val(data.id);
        modalAdmin.find("input[name='username']").val(data.username);
        modalAdmin.find("input[name='password']").val("");
        modalAdmin.find("button[name='submit']").attr('name', 'put');

        modalAdmin.modal('show');
    });

    $(document).on("click", '.del-admin', function () {
        var data = $(this).data('admin');

        var modal = $("#modal-del-admin");

        modal.find("input[name='id']").val(data.id);
        modal.find("span[class='id']").html(data.id);
        modal.find("span[class='nama']").html(data.username);

        modal.modal("show");
    });

    $(document).ready(function () {
        $("#form-admin").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Nama tidak boleh kosong"
                },
                password: {
                    required: "Password tidak boleh kosong"
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
@endsection