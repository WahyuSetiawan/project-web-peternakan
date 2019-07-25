@extends("_part.layout", $head)

@section("content")


<div class="column">

    <h3 class="title-5 m-b-25">Riwayat Pembelian Ayam Pada ID Group Transaksi : <?php echo $id_group?></h3>

    @include('_part.message', ['flashdata' => $flashdata])

    <div class="row m-b-25">
        <div class="row">
            <form method="get">
                <input type="hidden" name="per_page" value="0" />
                <div class="row">
                    <div class="form-select">
                        <select class="js-select2" name="kandang">
                            <option value="0" <?=($id_kandang == "0") ? "selected" : ""?>>Semua Kandang</option>
                            <?php foreach ($semua_kandang as $value) {?>
                            <option value="<?=$value->id_kandang?>"
                                <?=($value->id_kandang == $id_kandang) ? "selected" : ""?>>
                                <?=$value->nama?>
                            </option>
                            <?php }?>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>

                    <div class="form-select">
                        <select class="js-select2" name="supplier">
                            <option value="0" <?=($id_supplier == "0") ? "selected" : ""?>>Semua Supplier</option>
                            <?php foreach ($supplier as $value) {?>
                            <option value="<?=$value->id_supplier?>"
                                <?=($value->id_supplier == $id_supplier) ? "selected" : ""?>>
                                <?=$value->nama?>
                            </option>
                            <?php }?>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>

                    <button class="btn" type="submit">
                        <i class="zmdi zmdi-filter-list"></i>Refresh</button>
                </div>

            </form>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Detail Pembelian</th>
                        <th>Group Transaksi</th>
                        <th>Kandang</th>
                        <th>Tanggal</th>
                        <th>Umur Sekarang</th>
                        <th>Harga</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value) {?>
                    <tr>
                        <td>
                            <?=($limit * $offset) + $key + 1?>
                        </td>
                        <td>
                            <?=$value->id_detail_pembelian_ayam?>
                        </td>
                        <td>
                            <?=$value->id_detail_group_transaksi?>
                        </td>
                        <td>
                            <?=$value->nama_kandang?>
                        </td>
                        <td>
                            <?=$value->tanggal?>
                        </td>
                        <td>
                            <?=$value->umur_ayam_sekarang?> Hari
                            <?php if ($value->umur_ayam_sekarang >= 120) {
    echo "(siap untuk dijual)";
}?>
                        </td>
                        <td>
                            Rp. <?=number_format($value->harga_ayam, 2, ',', '.')?>
                        </td>
                        <td>
                            <?=$value->nama_supplier?>
                        </td>

                        <td>
                            <?=$value->jumlah_ayam . " Ayam"?>

                            <?php if ($value->umur_ayam_sekarang >= 120 && ($value->jumlah_penjualan + $value->jumlah_kerugian_ayam) < $value->jumlah_ayam) {?>
                            <br>
                            <div style="color: blue"> (terjual = <?=$value->jumlah_penjualan?>)</div>
                            <div style="color: red"> (rugi = <?=$value->jumlah_kerugian_ayam?>)</div>
                            <?php }?>

                            <?php if ($value->umur_ayam_sekarang >= 120 && ($value->jumlah_penjualan + $value->jumlah_kerugian_ayam) >= $value->jumlah_ayam) {?>
                            <br>
                            <div style="color: blue">(sudah terjual semua)</div>
                            <?php }?>
                        </td>
                        <td style="text-align: center">
                            <button type="button" class="btn btn-success detail-pembelian"
                                data-pembelian='<?=json_encode($value)?>'><i class="fa fa-info-circle"></i></button>
                        </td>
                    </tr>
                    <?php }?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-5">
        Showing
        <?=$offset + 1?> to
        <?=($count < ($limit + $offset)) ? $count : ($limit + $offset)?> of
        <?=$count?> entries
    </div>
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

<!-- modal detail -->
<div class="modal" id="modal-detail-pembelian">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="detailTitleModal">Detail Pembelian <strong class="id"></strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 200px">Kode Pembelian Bibit</td>
                        <td class="id"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong> Data Terkait :</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Transaksi</td>
                        <td class="tanggal"> </td>
                    </tr>
                    <tr>
                        <td>Kandang</td>
                        <td class="kandang"> </td>
                    </tr>

                    <tr>
                        <td>Supplier</td>
                        <td class="supplier"> </td>
                    </tr>
                    <tr>
                        <td>Jumlah Ayam</td>
                        <td><strong class="jumlah">10</strong> Ayam</td>
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
                <button type="button" class="btn btn-info edit-pembelian" data-dismiss="modal">Ubah Data</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
var data_kandang = <?=json_encode($kandang)?>;
var modal = $('#modalPembelian');
var modaldetail = $("#modal-detail-pembelian");

modal.find('form').find("input[name='tanggal']").datepicker(defaultDatePicker);

$(document).on("click", '.detail-pembelian', function() {
    var data = $(this).data('pembelian');

    modaldetail.find(".id").html(": " + data.id_detail_pembelian_ayam);
    modaldetail.find(".tanggal").html(": " + data.tanggal);
    modaldetail.find(".kandang").html(": " + data.nama_kandang + " (" + data.id_kandang + ")");
    modaldetail.find(".supplier").html(": " + data.nama_supplier + " (" + data.id_supplier + ")");
    modaldetail.find(".jumlah").html(": " + data.jumlah_ayam);
    modaldetail.find(".created_at").html(": " + data.created_at);

    if (data.id_karyawan !== null) {
        modaldetail.find(".created_by").html(": " + data.nama_karyawan + " (Karyawan)");
    } else {
        modaldetail.find(".created_by").html(": " + data.nama_admin + " (Admin)");
    }

    if (data.udpated_at !== null) {
        modaldetail.find(".udpated_at").html(": " + data.updated_at);

        if (data.update_by_karyawan !== null) {
            modaldetail.find(".update_by").html(": " + data.update_by_karyawan_nama + " (Karyawan)");
        } else {
            modaldetail.find(".update_by").html(": " + data.update_by_admin_nama + " (Admin)");
        }
    } else {
        modaldetail.find(".udpated_at").html(":");
        modaldetail.find(".update_by").html(":");
    }

    modaldetail.find('.edit-pembelian').attr('data-pembelian', JSON.stringify(data));


    modaldetail.modal('show');
});
</script>
@endsection