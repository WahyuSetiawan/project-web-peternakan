@extends("_part.layout", $head)

@section("content")

<div class="column">
    <h3 class="title-5 m-b-25">Kerugian Ayam</h3>

    @include('_part.message', ['flashdata' => $flashdata])

    <div class="row m-b-25">
        <div class="row">
            <div class="row">
                <form method="get">
                    <input type="hidden" name="per_page" value="0" />

                    <div class="row">

                        <div class="form-select">
                            <select class="js-select2" name="pembelian">
                                <?php foreach ($pembelian as $value) { ?>
                                    <option value="<?= $value->id_detail_pembelian_ayam ?>" <?= ($value->id_detail_pembelian_ayam == $id_pembelian) ?
                                                                                                "selected" : "" ?>>
                                        <?= $value->id_detail_pembelian_ayam . " (" . $value->jumlah_sisa_ayam . " ayam)"  ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                        <button class="btn" type="submit">
                            <i class="zmdi "></i>Refresh</button>
                    </div>
                </form>
            </div>
            <div class="table-data__tool-right">
                <button class="btn btn-success btn-add-penjualan">
                    <i class="fa fa-plus"></i> Tambah Kerugian</button>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Kerugian</th>
                        <th>ID Pembelian Ayam</th>
                        <th>ID Kandang</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($data) <= 0) { ?>
                        <tr>
                            <td colspan="7">
                                Tidak terdapat data kerugian ayam
                            </td>
                        </tr>
                    <?php
                } else {
                    foreach ($data as $key => $value) { ?>
                            <tr>
                                <td>
                                    <?= ($limit * $offset) + $key + 1 ?>
                                </td>
                                <td>
                                    <?= $value->id_detail_kerugian_ayam ?>
                                </td>
                                <td>
                                    <?= $value->id_detail_pembelian_ayam ?>
                                </td>
                                <td>
                                    <?= $value->nama_kandang ?>
                                </td>
                                <td>
                                    <?= $value->tanggal ?>
                                </td>
                                <td>
                                    <?= $value->jumlah . " Ayam" ?>
                                </td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-success detail-penjualan" data-penjualan='<?= json_encode($value) ?>'><i class="fa fa-info-circle"></i></button>
                                    <button type="button" class="btn btn-primary edit-penjualan" data-penjualan='<?= json_encode($value) ?>'><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger del-penjualan" data-penjualan='<?= json_encode($value) ?>'><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php }
                } ?>

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
<div class="modal fade" id="modal-form-penjualan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-kandang">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Tambah Kerugian Ayam</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-8">
                        <div class="form-group">
                            <label>No Kerugian Ayam</label>
                            <input type="text" class="form-control" name="id" readonly="" placeholder="KA_xxxx">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>No Pembelian Ayam</label>
                            <input type="text" class="form-control" name="pembelian" readonly="" value="<?= $id_pembelian ?>">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="text" class="form-control" name="tanggal" placeholder="<?= date(" d-m-Y") ?>" />
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Jumlah Ayam</label>
                            <input type="text" class="form-control" name="jumlah" placeholder="0" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan tentang pengeluaran jumlah ayam, seperti: kematian, penyakit, hibah dll" />
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

<div class="modal" id="modal-del-penjualan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Hapus Data Kerugian Ayam</h3>
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

<div class="modal" id="modal-detail-penjualan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="detailTitleModal">Detail Penjualan Ayam <strong class="id"></strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 200px">Kode Pembelian Bibit</td>
                        <td class="id"> : </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong> Data Terkait :</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Transaksi</td>
                        <td class="tanggal"> : </td>
                    </tr>
                    <tr>
                        <td>Kandang</td>
                        <td class="kandang"> : </td>
                    </tr>
                    <tr>
                        <td>Jumlah Ayam</td>
                        <td><strong class="jumlah"></strong> Ayam</td>
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
                <button type="button" class="btn btn-info edit-penjualan" data-dismiss="modal">Ubah Data</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    var modal = $('#modal-form-penjualan');
    var modaldetail = $('#modal-detail-penjualan');

    modal.find('form').find("input[name='tanggal']").datepicker(defaultDatePicker);

    $(document).on("click", ".btn-add-penjualan", function() {
        modal.find('form').find("input[name='id']").val("");
        modal.find('form').find("input[name='nama']").val("");
        modal.find('form').find("input[name='tanggal']").val("");
        modal.find("form").find('input[name="jumlah"]').val("");
        modal.find("form").find('input[name="keterangan"]').val("");
        modal.find('form').find("button[name='submit']").attr('name', 'submit');

        modal.modal('show');
    });

    $(document).on("click", ".edit-penjualan", function() {
        var data = $(this).data('penjualan');

        modal.find('form').find("input[name='id']").val(data.id_detail_kerugian_ayam);
        modal.find('form').find("select[name='pembelian']").val(data.id_detail_pembelian_ayam);
        modal.find('form').find("input[name='karyawan']").val(data.id_karyawan);
        modal.find('form').find("input[name='jumlah']").val(data.jumlah);
        modal.find('form').find("input[name='tanggal']").val(data.tanggal);
        modal.find('form').find("input[name='keterangan']").val(data.keterangan);
        modal.find('form').find("button[name='submit']").attr('name', 'put');

        modal.modal('show');
    });

    $(document).on("click", ".detail-penjualan", function() {
        var data = $(this).data("penjualan");

        modaldetail.find(".id").html(data.id_detail_kerugian_ayam);

        modaldetail.find(".id").html(": " + data.id_detail_kerugian_ayam);
        modaldetail.find(".tanggal").html(": " + data.tanggal);
        modaldetail.find(".kandang").html(": " + data.nama_kandang + " (" + data.id_kandang + ")");
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

        modaldetail.find(".edit-penjualan").attr("data-penjualan", JSON.stringify(data));
        modaldetail.modal('show');
    });

    $(document).on("click", '.del-penjualan', function() {
        var data = $(this).data('penjualan');

        var modal = $("#modal-del-penjualan");

        modal.find('form').find("input[name='id']").val(data.id_detail_kerugian_ayam);
        modal.find('form').find("span[class='id']").html(data.id_detail_kerugian_ayam);
        modal.find('form').find("span[class='nama']").html(data.nama);

        modal.modal("show");
    });

    $(document).ready(function() {

        $("#form-penjualan").validate({
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