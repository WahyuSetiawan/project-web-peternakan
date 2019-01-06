@extends("_part.layout", $head)

@section("content")

<div class="row">
    <h3 class="title-5 m-b-25">Persediaan</h3>

        @include('_part.message', ['flashdata' => $flashdata])

    <div class="col-lg-12  m-b-25">
        <button class="au-btn au-btn-icon au-btn--green au-btn--small btn-add-persediaan" type="button">
            <i class="zmdi zmdi-plus"></i>Tambah Persediaan</button>
    </div>

    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Cara pemakaian</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($type_gudang as $key => $value) { ?>
                    <tr>
                        <td>
                            <?= ($limit * $offset) + $key + 1 ?>
                        </td>
                        <td>
                            <?= $value->id_persediaan ?>
                        </td>
                        <td>
                            <?= $value->nama?>
                        </td>
                        <td>
                            <?= $value->cara_pemakaian?>
                        </td>
                        <td style="text-align: center">
                            <button type="button" class="btn btn-primary edit-persediaan" data-persediaan='<?= json_encode($value) ?>'><i
                                    class="fa fa-pen-square"></i></button>
                            <button type="button" class="btn btn-danger del-persediaan" data-persediaan='<?= json_encode($value) ?>'><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-5">
        Showing
        <?= $offset + 1 ?> to
        <?= ($count < ($limit + $offset)) ? $count : ($limit + $offset) ?> of
        <?= $count ?> entries
    </div>
    <div class="col-lg-7 ">
        <div class="row pull-right">
            <div class="col">
                <?= $pagination ?>
            </div>
        </div>
    </div>
</div>

@endsection

@section("modal")

<!-- modal medium -->
<div class="modal fade" id="modal-persediaan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-type_gudang">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Tambah Persediaan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-8">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" readonly>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Nama Persediaan</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Cara Pemakaian</label>
                            <textarea name="cara_pemakaian" cols="30" rows="10" class="form-control"></textarea>
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

<div class="modal" id="modal-del-persediaan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Hapus Persediaan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    Anda yakin menghapus data <span class="id"></span> dengan nama <span class="nama"></span> ?
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

<script>
    var modal = $('#modal-persediaan');
    var modaldelete = $("#modal-del-persediaan");

    $(document).on("click", ".btn-add-persediaan", function () {


        modal.find('form').find("input[name='id']").val("");
        modal.find('form').find("input[name='keterangan']").val("");
        modal.find('form').find("textarea[name='keterangan']").html("");
        modal.find('form').find("button[name='submit']").attr('name', 'submit');

        modal.modal('show');
    });

    $(document).on("click", ".edit-persediaan", function () {
        var data = $(this).data('persediaan');

        modal.find('form').find("input[name='id']").val(data.id_persediaan);
        modal.find('form').find("input[name='keterangan']").val(data.nama);
        modal.find('form').find("textarea[name='keterangan']").html(data.cara_pemakaian);
        modal.find('form').find("button[name='submit']").attr('name', 'put');

        modal.modal('show');
    });

    $(document).on("click", '.del-persediaan', function () {
        var data = $(this).data('persediaan');

        modaldelete.find('form').find("input[name='id']").val(data.id_persediaan);
        modaldelete.find('form').find("span[class='id']").html(data.id_persediaan);
        modaldelete.find('form').find("span[class='nama']").html(data.nama);

        modaldelete.modal("show");
    });

    $(document).ready(function () {
        $("#form-type_gudang").validate({
            rules: {
                keterangan: {
                    required: true,
                    minlength: 1
                },
                maksimal_jumlah: {
                    number: true,
                    min: 1,
                }
            },
            messages: {
                keterangan: {
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
@endsection