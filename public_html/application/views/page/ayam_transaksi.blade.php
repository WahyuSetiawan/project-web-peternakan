@extends("_part.layout",  $head)

@section("content")

<div class="row">
    <h3 class="title-5 m-b-25">Rekap Transaksi Perkandang (Kandang : <?= $kandang->id_kandang ?>)</h3>

    <div class="col-lg-12">
        <div class="col-lg-12  m-b-25">
            <div class="card">
                <div class="card-body">
                    <div class="row  m-b-10">
                        <div class="col-md-12">
                            <h4>Informasi Kandang</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            Kandang 
                        </div>
                        <div class="col-md-3">
                            : <?= $kandang->nama_kandang ?>
                        </div>
                        <div class="col-md-3">
                            Jumlah Ayam Sekarang 
                        </div>
                        <div class="col-md-3">
                            : <strong><?= $kandang->jumlah_ayam ?></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Tanggal Pembelian Ayam 
                        </div>
                        <div class="col-md-3">
                            : <strong><?= $kandang->tanggal_pembelian_terbaru ?></strong>
                        </div>
                        <div class="col-md-3">
                            Keterangan
                        </div>
                        <div class="col-md-3">
                            : <?= $kandang->keterangan ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success btn-add-pembelian-ayam" type="button">
                        <i class="zmdi zmdi-plus"></i> Pemasukan Ayam</button>

                    <button class="btn btn-danger btn-add-kerugian-ayam" type="button">
                        <i class="zmdi zmdi-plus"></i> Pengeluaran Ayam</button>
                </div>
            </div>
        </div>


        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah Ayam</th>
                        <th>Ket..</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jumlah_ayam as $key => $value) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value->tanggal_transaksi ?></td>
                            <td><?= $value->jumlah_ayam ?></td>
                            <td><span class="<?= ($value->ket == "pemasukan") ? "status--process" : "status--denied" ?>"><?= $value->ket ?></span></td>
                            <td style="text-align: center">
                                <button type="button" class="btn btn-success pembelian-ayam" data-transaksi='<?= json_encode($value) ?>'><i class="fa fa-plus"></i> Ubah</button>
                                <button type="button" class="btn btn-danger hapus-transaksi-ayam" data-transaksi='<?= json_encode($value) ?>'><i class="fa fa-minus"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section("modal")

<!-- modal medium -->
<div class="modal fade" id="modal-pembelian" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-pembelian-ayam">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Pembelian Ayam</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <select class="form-control" name="supplier">
                                <?php foreach ($supplier as $key => $value) { ?>
                                    <option value="<?= $value->id_supplier ?>"><?= $value->nama . " (" . $value->notelepon . ")" ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label>Tanggal Pembelian </label>
                            <input type="datetime" class="form-control tanggal_transaksi" name="tanggal">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Jumlah Ayam</label>
                            <input type="number" class="form-control" name="jumlah" value="1">
                        </div>
                    </div>

                    <div class="col-12">
                        <p class="text-danger">
                            Catatan : Penambahan pembelian akan mengubah tanggal jadwal vaksin mengikuti tanggal terbaru pada data pembelian Ayam
                        </p>
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

<!-- modal medium -->
<div class="modal fade" id="modal-penjualan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-penjualan-ayam">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Penjualan Ayam</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">

                    <div class="col-12">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="text" class="form-control tanggal_transaksi" name="tanggal" >
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Jumlah Ayam</label>
                            <input type="number" class="form-control" name="jumlah" value="1">
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

<!-- modal medium -->
<div class="modal fade" id="modal-kerugian" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-kerugian-ayam">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Kerugian Ayam</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">

                    <div class="col-12">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="text" class="form-control tanggal_transaksi" name="tanggal" >
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Bibit:</label>
                            <select class="form-control" name="id_pemasukan_ayam">
                                <?php foreach ($pemasukan_ayam as $key => $value) { ?>
                                    <option value="<?= $value->id_detail_pemasukan_ayam ?>"><?= $value->id_detail_pemasukan_ayam . " (" . $value->id_kandang . ")" ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan tentang kejadian">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Jumlah Ayam</label>
                            <input type="number" class="form-control" name="jumlah" placeholder="Jumlah ayam yang berkurang">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit-kerugian">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end modal medium -->

<div class="modal" id="modal-hapus-transaksi-ayam">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Pembelian Ayam</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    Anda yakin menghapus data transaksi <span class="id"></span> ?
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
    $(".tanggal_transaksi").datepicker();
    $(".tanggal_transaksi").datepicker("option", "showAnim", "slideDown");
    $(".tanggal_transaksi").datepicker("option", "dateFormat", "yy-mm-dd");
    $(".tanggal_transaksi").datepicker('setDate', new Date());

    $(document).on("click", ".btn-add-kerugian-ayam", function () {
        var modalKerugian = $('#modal-kerugian');

        modalKerugian.find("input[name='keterangan']").val("");
        modalKerugian.find("input[name='jumlah']").val(1);
        modalKerugian.find("button[type='submit']").attr('name', 'submit-kerugian');

        modalKerugian.modal('show');
    });

    $(document).on("click", ".btn-add-pembelian-ayam", function () {
        var modalPembelian = $('#modal-pembelian');

        modalPembelian.find("select[name='supplier']").val("");
        modalPembelian.find("input[name='umur']").val("1");
        modalPembelian.find("input[name='jumlah']").val("1");
        modalPembelian.find("button[type='submit']").attr('name', 'submit');

        modalPembelian.modal('show');
    });

    $(document).on("click", ".pembelian-ayam", function () {
        var data = $(this).data('transaksi');

        switch (data.ket) {
            case "pengeluaran":
                var modalKerugian = $('#modal-kerugian');

                modalKerugian.find("input[name='id']").val(data.id);
                modalKerugian.find("input[name='id_pemasukan_ayam']").val(data.id_pemasukan_ayam);
                modalKerugian.find("input[name='tanggal']").val(data.tanggal_transaksi);
                modalKerugian.find("input[name='keterangan']").val(data.keterangan);
                modalKerugian.find("input[name='jumlah']").val(data.jumlah_ayam);
                modalKerugian.find("button[type='submit']").attr('name', 'put-rugi');

                modalKerugian.modal('show');
                break;
            case "pemasukan":
                var modalPembelian = $('#modal-pembelian');

                modalPembelian.find("input[name='id']").val(data.id);
                modalPembelian.find("select[name='supplier']").val(data.id_vendor);
                modalPembelian.find("input[name='tanggal']").val(data.tanggal_transaksi);
                modalPembelian.find("input[name='umur']").val(data.umur_awal);
                modalPembelian.find("input[name='jumlah']").val(data.jumlah_ayam);
                modalPembelian.find("button[type='submit']").attr('name', 'put-beli');

                modalPembelian.modal('show');
                break;
        }
    });

    $(document).on("click", '.hapus-transaksi-ayam', function () {
        var data = $(this).data('transaksi');

        var modal = $("#modal-hapus-transaksi-ayam");

        modal.find("input[name='id']").val(data.id);
        modal.find("span[class='id']").html(data.id);
        modal.find("button[type='submit']").attr('name', 'del-' + data.ket);

        modal.modal("show");
    });

    $(document).ready(function () {
        $("#form-pembelian-ayam").validate({
            rules: {
                supplier: {
                    required: true
                },
                umur: {
                    required: true,
                    number: true,
                    min: 0
                },
                jumlah: {
                    required: true,
                    number: true,
                    min: 1
                }
            },
            messages: {
                supplier: {
                    required: "Supplier tidak boleh kosong"
                },
                umur: {
                    required: "Umur tidak boleh kosong",
                    number: "Umur harus berupa angka",
                    min: "Minimal angka yang diinputkan andalah 0"
                },
                jumlah: {
                    required: "Jumlah tidak boleh kosong",
                    number: "Jumlah harus berupa angka",
                    min: "Jumlah minimal 1"
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