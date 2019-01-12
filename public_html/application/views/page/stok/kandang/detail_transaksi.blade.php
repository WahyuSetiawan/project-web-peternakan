@extends("_part.layout", $head)

@section('css')

@endsection

@section("content")
<div class="column">
    <h3 class="title-5 m-b-25">Jumlah Stok Ayam</h3>
    <div class="col-lg-12">
        <table class="table table-bordered m-b-25 detail">
            <thead class="thead-inverse">
                <tr>
                    <th colspan="4">Data Kandang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">Kode Kandang</td>
                    <td rowspan="3">
                        <?=$kandang->id_kandang?>
                    </td>
                    <td>Kandang</td>
                    <td>
                        <?=$kandang->nama?>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Ayam</td>
                    <td>
                        <?=$jumlah_ayam->jumlah ?> Ayam </td>
                </tr>
                <tr>
                    <td>Penanggung Jawab</td>
                    <td>
                        <?=$kandang->nama_karyawan?>
                    </td>
                </tr>
            </tbody>
            <thead class="thead-inverse">
                <tr>
                    <th colspan="4">Data Transaksi Pada Kandang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="2">Jumlah Transaki</td>
                    <td rowspan="2">
                        <?=$jumlah_ayam->jumlah_transaksi ?> Transaksi </td>
                    <td>Jumlah Pemasukan</td>
                    <td>
                        <?=$jumlah_ayam->jumlah_transaksi_masuk?> Transaksi </td>
                </tr>
                <tr>
                    <td>Jumlah Transaksi Keluar</td>
                    <td>
                        <?=$jumlah_ayam->jumlah_transaksi_keluar?> Transaksi </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-12">
        <div class="table-data__tool m-b-25">
            <div class="table-data__tool-left">
                <form method="get"><input type="hidden" name="per_page" value="0" />
                    <div class="rs-select2--light rs-select2--md"><select class="js-select2" name="supplier">
                            <option value="0" <?=($id_supplier=="0" ) ? "selected" : "" ?>>Supplier</option>
                            <?php foreach ($supplier as $value) {    ?>
                            <option value="<?= $value->id_supplier ?>" <?=($value->id_supplier==$id_supplier) ?
                                "selected": ""?>>
                                <?=$value->nama ?>
                            </option>
                            <?php } ?>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div><button class="au-btn-filter" type="submit"><i class="zmdi zmdi-filter-list"></i>filters</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Aksi</th>
                        <th>Karyawan</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key=> $value) {    ?>
                    <tr>
                        <td>
                            <?=$key+1?>
                        </td>
                        <td>
                            <?=$value->id_transaksi?>
                        </td>
                        <td>
                            <?=$value->transaksi?>
                        </td>
                        <td>
                            <?=$value->nama_karyawan?>
                        </td>
                        <td>
                            <?=$value->nama_supplier?>
                        </td>
                        <td>
                            <?=$value->jumlah_ayam . " Ayam"?>
                        </td>
                        <td>
                            <?=$value->keterangan?>
                        </td>
                        <td><button type="button" class="btn btn-success detail-transaksi" data-transaksi='<?= json_encode($value) ?>'><i
                                    class="fa fa-info-circle"></i></button></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-5">Showing
        <?=$offset+1?>to
        <?=($count < ($limit + $offset)) ? $count : ($limit + $offset)?>of
        <?=$count?>entries </div>
    <div class="col-lg-7 ">
        <div class="row pull-right">
            <div class="col">
                <?=$pagination?>
            </div>
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
                    <h3 class="modal-title" id="mediumModalLabel">Tambah Supplier</h3><button type="button" class="close"
                        data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;

                        </span></button>
                </div>
                <div class="modal-body"><input type="hidden" name="id">
                    <div class="col-6">
                        <div class="form-group"><label>Nama Supplier</label><select class="form-control" name="supplier">
                                <?php foreach ($supplier as $key=> $value) {    ?>
                                <option value="<?=$value->id?>">
                                    <?=$value->nama . " (". $value->notelepon . ")"?>
                                </option>
                                <?php }?>
                            </select></div>
                    </div>
                    <div class="col-3">
                        <div class="form-group"><label>Umur ayam (bulan) </label><input type="number" class="form-control"
                                name="umur" value="0"></div>
                    </div>
                    <div class="col-3">
                        <div class="form-group"><label>Jumlah Ayam</label><input type="number" class="form-control"
                                name="jumlah" value="1"></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-primary" name="submit">Simpan</button><button
                        type="button" class="btn btn-danger" data-dismiss="modal">Batal</button></div>
            </div>
        </form>
    </div>
</div>
<!-- end modal medium -->
<div class="modal" id="modal-penjualan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Penjualan Ayam</h3><button type="button" class="close"
                        data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;

                        </span></button>
                </div>
                <div class="modal-body"><input type="hidden" name="id">Anda yakin menghapus data <span class="id"></span>dengan
                    nama <span class="nama"></span>? </div>
                <div class="modal-footer"><button type="submit" class="btn btn-primary" name="del">Ya</button><button
                        type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button></div>
            </form>
        </div>
    </div>
</div>
<!-- modal detail -->
<div class="modal" id="modal-detail-transaksi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="detailTitleModal">Detail Transaksi <strong class="id"></strong></h3><button
                    type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered detail">
                    <thead>
                        <tr>
                            <th colspan="1">Kode Transaksi</th>
                            <th class="id" colspan="3" style="text-align: left"></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th colspan="4"><strong>Data Terkait :</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="1">Tanggal</td>
                            <td colspan="1" class="tanggal"> :</td>
                            <td colspan="2">
                                Keterangan :
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">Kandang</td>
                            <td colspan="1" class="kandang"> : </td>
                            <td colspan="2" rowspan="3" class="keterangan">

                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">Supplier</td>
                            <td colspan="1" class="supplier"> : </td>
                        </tr>
                        <tr>
                            <td colspan="1">Jumlah Ayam</td>
                            <td colspan="1"><strong class="jumlah"></strong></td>
                        </tr>
                        <tr>
                            <td colspan="1">Penanggung Jawab</td>
                            <td colspan="1"><strong class="penanggung_jawab"></strong></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th colspan="4"><strong>Mediator</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="col-50">Dibuat</td>
                            <td colspan="2" class="col-50">Diubah</td>
                        </tr>
                        <tr>
                            <td class="created_by"></td>
                            <td class="created_at"></td>
                            <td class="updated_by"></td>
                            <td class="updated_at"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button></div>
        </div>
    </div>
</div>@endsection @section('js') <script>
    var modaldetail = $('#modal-detail-transaksi');

    $(document).on("click", '.detail-transaksi', function () {
            var data = $(this).data('transaksi');

            modaldetail.find(".id").html(data.id_transaksi);
            modaldetail.find(".tanggal").html(data.tanggal);
            modaldetail.find(".kandang").html(data.nama_kandang + " (" + data.id_kandang + ")");
            modaldetail.find(".jumlah").html(data.jumlah_ayam);
            modaldetail.find(".created_at").html(data.created_at);
            modaldetail.find(".keterangan").html(data.keterangan);
            modaldetail.find(".penanggung_jawab").html(data.nama_penanggung_jawab);

            if (data.id_supplier != null) {
                if (data.nama_supplier != "null") {
                    modaldetail.find(".supplier").html(data.nama_supplier + " (" + data.id_supplier +
                        ")");
                } else {
                    modaldetail.find(".supplier").html("- (" + data.id_supplier + ")");
                }
            } else {
                modaldetail.find(".supplier").html("-");
            }
            if (data.id_karyawan !== null) {
                modaldetail.find(".created_by").html(" " + data.nama_karyawan + " (Karyawan)");
            } else {
                modaldetail.find(".created_by").html(" " + data.nama_admin + " (Admin)");
            }

            if (data.updated_at !== null) {
                modaldetail.find(".updated_at").html("" + data.updated_at);

                if (data.update_by_karyawan !== null) {
                    modaldetail.find(".updated_by").html(" " + data.update_by_karyawan_nama +
                        " (Karyawan)");
                } else {
                    modaldetail.find(".updated_by").html("" + data.update_by_admin_nama + " (Admin)");
                }
            } else {
                modaldetail.find(".updated_at").html("-");
                modaldetail.find(".updated_by").html("-");
            }

            modaldetail.modal('show');
        }

    );
</script>
@endsection