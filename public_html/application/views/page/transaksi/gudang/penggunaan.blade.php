@extends("_part.layout", $head)

@section("content")

<div class="column">
    <h3 class="title-5 m-b-25">Penggunaan Gudang</h3>

    @include('_part.message', ['flashdata' => $flashdata])

    <div class="row m-b-25">
        <div class="row">

            <div class="row">
                <form method="get">

                    <input type="hidden" name="per_page" value="0" />
                    <div class="row">

                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="gudang">
                                <option value="0" <?= ($id_gudang == "0") ? "selected" : "" ?>>gudang</option>
                                <?php foreach ($gudang as $value) { ?>
                                    <option value="<?= $value->id_gudang ?>" <?= ($value->id_gudang == $id_gudang) ?
                                                                                    "selected" : "" ?>>
                                        <?= $value->nama ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                        <button class="btn" type="submit">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>

                    </div>
                </form>
            </div>

            <div class="table-data__tool-right">

                <button class="btn btn-success btn-add-pemakaian">
                    <i class="fa fa-plus"></i> Tambah Penggunaan</button>
                <!--                
                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type">
                                        <option selected="selected">Export</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                -->
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <div class='col-lg-12 m-b-25'>
            <label>Tanggal sekarang : <?= date("d-m-Y") ?></label>
        </div>

        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Detail Pemakaian</th>
                        <th>gudang</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                            <td>
                                <?= ($limit * $offset) + $key + 1 ?>
                            </td>
                            <td>
                                <?= $value->id_detail_penggunaan_gudang ?>
                            </td>
                            <td>
                                <?= $value->nama_gudang ?>
                            </td>
                            <td>
                                <?= $value->tanggal ?>
                            </td>
                            <td>
                                <?= $value->jumlah ?>
                            </td>
                            <td>
                                <?= $value->keterangan ?>
                            </td>
                            <td style="text-align: center">
                                <button type="button" class="btn btn-success detail-pemakaian" data-pemakaian='<?= json_encode($value) ?>'><i class="fa fa-info-circle"></i></button>
                                <button type="button" class="btn btn-primary edit-pemakaian" data-pemakaian='<?= json_encode($value) ?>'><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger del-pemakaian" data-pemakaian='<?= json_encode($value) ?>'><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modal-form-pemakaian" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-kandang">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Tambah Penggunaan Gudang</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-8">
                        <div class="form-group">
                            <label>No Pembelian Ayam</label>
                            <input type="text" class="form-control" name="id" readonly="">
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-group">
                            <label>Type Gudang</label>
                            <select class="form-control" name="gudang">
                                <?php foreach ($gudang as $key => $value) { ?>
                                    <option value="<?php echo $value->id_gudang ?>">
                                        <?php echo $value->nama ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="text" class="form-control" name="tanggal" placeholder="<?php echo date("d-m-Y") ?>" />
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="class-group">
                            <label>Jumlah Ayam</label>
                            <input type="text" class="form-control" name="jumlah" placeholder="0" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="class-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="keterangan tentang faktor pengeluaran misal: kerusakan, pemakaian, kadaluarsa dll" />
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

<div class="modal" id="modal-del-pemakaian">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Hapus Pemakaian gudang</h3>
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


<!-- modal detail -->
<div class="modal" id="modal-detail-pemakaian">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="detailTitleModal">Detail Pemakaian gudang <strong class="id"></strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 200px">Kode Pemakaian Bibit</td>
                        <td class="id"> : MA_0020</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong> Data Terkait :</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Transaksi</td>
                        <td class="tanggal"> :</td>
                    </tr>
                    <tr>
                        <td>gudang</td>
                        <td class="gudang"> : </td>
                    </tr>
                    <tr>
                        <td>Jumlah Ayam</td>
                        <td><strong class="jumlah">10</strong></td>
                    </tr>

                    <tr>
                        <td colspan="2"><strong>Mediator : </strong></td>
                    </tr>
                    <tr>
                        <td>Dibuat Pada</td>
                        <td class="created_at"></td>
                    </tr>
                    <tr>
                        <td>Dibuat Oleh</td>
                        <td class="created_by"></td>
                    </tr>
                    <tr>
                        <td>Diubah Terakhir</td>
                        <td class="udpated_at"></td>
                    </tr>
                    <tr>
                        <td>Diubah Oleh</td>
                        <td class="update_by"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info edit-pemakaian" data-dismiss="modal">Ubah Data</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    var modal = $('#modal-form-pemakaian');
    var modaldetail = $('#modal-detail-pemakaian');

    modal.find("form").find("input[name=tanggal]").datepicker(defaultDatePicker);

    $(document).on("click", ".btn-add-pemakaian", function() {
        modal.find('form').find("input[name='id']").val("");
        modal.find('form').find("input[name='nama']").val("");
        modal.find('form').find("input[name='tanggal']").val("");
        modal.find('form').find("input[name='jumlah']").val("");
        modal.find('form').find("input[name='keterangan']").val("");
        modal.find('form').find("button[name='submit']").attr('name', 'submit');

        modal.modal('show');
    });

    $(document).on("click", ".edit-pemakaian", function() {
        var data = $(this).data('pemakaian');

        modal.find('form').find("input[name='id']").val(data.id_detail_penggunaan_gudang);
        modal.find('form').find("select[name='gudang']").val(data.id_gudang);
        modal.find('form').find("input[name='karyawan']").val(data.id_karyawan);
        modal.find('form').find("select[name='kandang']").val(data.id_kandang);
        modal.find('form').find("input[name='jumlah']").val(data.jumlah);
        modal.find('form').find("input[name='tanggal']").val(data.tanggal);
        modal.find('form').find("input[name='keterangan']").val(data.keterangan);
        modal.find('form').find("button[name='submit']").attr('name', 'put');

        modal.modal('show');
    });


    $(document).on("click", '.detail-pemakaian', function() {
        var data = $(this).data('pemakaian');

        modaldetail.find(".id").html(": " + data.id_detail_penggunaan_gudang);
        modaldetail.find(".tanggal").html(": " + data.tanggal);
        modaldetail.find(".gudang").html(": " + data.nama_gudang + " (" + data.id_gudang + ")");
        modaldetail.find(".supplier").html(": " + data.nama_supplier + " (" + data.id_supplier + ")");
        modaldetail.find(".jumlah").html(": " + data.jumlah);
        modaldetail.find(".created_at").html(": " + data.created_at);

        if (data.id_karyawan !== null) {
            modaldetail.find(".created_by").html(": " + data.nama_karyawan + " (Karyawan)");
        } else {
            modaldetail.find(".created_by").html(": " + data.nama_admin + " (Admin)");
        }

        if (data.udpated_at !== null) {
            modaldetail.find(".udpated_at").html(": " + data.udpated_at);

            if (data.update_by_karyawan !== null) {
                modaldetail.find(".update_by").html(": " + data.update_by_karyawan_nama + " (Karyawan)");
            } else {
                modaldetail.find(".update_by").html(": " + data.update_by_admin_nama + " (Admin)");
            }
        } else {
            modaldetail.find(".udpated_at").html(":");
            modaldetail.find(".update_by").html(":");
        }

        modaldetail.find('.edit-pemakaian').attr('data-pemakaian', JSON.stringify(data));


        modaldetail.modal('show');
    });


    $(document).on("click", '.del-pemakaian', function() {
        var data = $(this).data('pemakaian');

        var modal = $("#modal-del-pemakaian");

        modal.find('form').find("input[name='id']").val(data.id_detail_penggunaan_gudang);
        modal.find('form').find("span[class='id']").html(data.id_detail_penggunaan_gudang);
        modal.find('form').find("span[class='nama']").html(data.nama);

        modal.modal("show");
    });

    $(document).ready(function() {
        $("#form-kandang").validate({
            rules: {
                nama: {
                    required: true,
                    minlength: 1
                },
                jumlah: {
                    number: true,
                    min: 1,
                }
            },
            messages: {
                nama: {
                    required: "Nama tidak boleh kosong",
                    minlength: "Minimal karakter adalah 1"
                },
                jumlah: {
                    number: "Harus Berupa Angka",
                    min: "Minimal jumlah yang dinputkan adalah 1"
                }
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
@endsection