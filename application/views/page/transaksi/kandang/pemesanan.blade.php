@extends("_part.layout", $head)

@section("content")

<?php
$jumlah_stok_ayam = 0;

// foreach ($pembelian as $value) {
//     if ($value->id_detail_pembelian_ayam == $id_pembelian) {
//         $jumlah_stok_ayam = $value->jumlah_sisa_ayam;
//     }
// }
?>

<div class="column">
    <h3 class="title-5 m-b-25">Halaman Pemesanan Ayam</h3>

    @include('_part.message', ['flashdata' => $flashdata])

    <div style="color: red">
        <?php
$data_validation = validation_errors();

if ($data_validation != "") {
    echo $data_validation;
}
?>
    </div>


    <div class="row m-b-25">
        <div class="row">
            <div class="row">
                <form method="get">
                    <input type="hidden" name="per_page" value="0" />

                    <div class="row">
                        <div class="form-select">
                            <select class="js-select2" name="status">
                                <option value="0" <?=($status == "0") ? "selected" : ""?>>Semua Status</option>
                                <option value="pesan" <?=($status == "pesan") ? "selected" : ""?>>Pemesanan</option>
                                <option value="ditolak" <?=($status == "ditolak") ? "selected" : ""?>>Dibatalkan</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                    <button class="btn" type="submit">
                        <i class="zmdi "></i>Refresh</button>
                </div>
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
                        <th>ID Pemesanan</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Jumlah Pemesanan</th>
                        <th>Sisa Pemesanan</th>
                        <th>Harga Terjual</th>
                        <th>Transaksi</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (count($data) <= 0) {?>
                    <tr>
                        <td colspan="9">
                            Tidak Terdapat data penjualan
                        </td>
                    </tr>

                    <?php } else {
    foreach ($data as $key => $value) {?>
                    <tr>
                        <td>
                            <?=($limit * $offset) + $key + 1?>
                        </td>
                        <td>
                            PM_<?=substr("0000" . $value->id_pemesanan, strlen("0000" . $value->id_pemesanan) - 4, 4)?>
                        </td>
                        <td>
                            <?=$value->nama?>
                        </td>
                        <td>
                            <?=$value->telepon?>
                        </td>
                        <td>
                            <?=$value->alamat?>
                        </td>
                        <td>
                            <?=$value->tanggal?>
                        </td>
                        <td>
                            <?=$value->jumlah_ayam . " Ayam"?>
                        </td>
                        <td>
                            <?=$value->sisa_jumlah . " Ayam"?>
                        </td>
                        <td>
                            Rp. <?=number_format($value->jumlah_penjualan, 2, ',', '.')?>
                        </td>
                        <td>
                            <?php
$transaksi = "";

        foreach ($value->penjualan as $keypenjualan => $valuepenjualan) {
            $transaksi = "<a class='edit-penjualan' data-penjualan='" . json_encode($valuepenjualan) . "' data-pemesanan='" . json_encode($value) . "'>" . $valuepenjualan->id_detail_penjualan_ayam . "</a>";
        }

        echo $transaksi;
        ?>
                        </td>
                        <td style="text-align: center">
                            <?php
if ($value->status == "ditolak") {
            echo "Pemesanan ditolak";
        } elseif ($value->sisa_jumlah <= 0) {
            echo "Pemesanan telah usai";
        } else {?>
                            <button type="button" class="btn btn-primary btn-add-penjualan"
                                data-penjualan='<?=json_encode($value)?>'><i class="fa fa-edit"></i></button>
                            <?php if (count($value->penjualan) <= 0) {?>

                            <button type="button" class="btn btn-danger del-penjualan"
                                data-penjualan='<?=json_encode($value)?>'><i class="fa fa-minus"></i></button>
                            <?php }}?>
                        </td>
                    </tr>
                    <?php }}?>
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

@section('modal')

<!-- modal medium -->
<div class="modal fade" id="modal-form-penjualan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-penjualan">
            <input type="hidden" name="jumlah_maksimal" value="">
            <input type="hidden" name="jumlah_pemesanan" value="">
            <input type="hidden" name="jumlah_penjualan" value="">
            <input type="hidden" name="id_pemesanan" value="">


            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Tambah Transaksi Penjualan Ayam</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-8">
                        <div class="form-group">
                            <label>No Penjualan Ayam</label>
                            <input type="text" class="form-control" name="id" readonly="" placeholder="KA_xxxx">
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-group">
                            <label>Kandang</label>
                            <select class="form-control" name="kandang">
                                <?php foreach ($kandang_stok as $key => $value) {?>
                                <option value="<?=$value->id_kandang?>" data-jual='<?=json_encode($value)?>''>
                                    <?=$value->nama . " (" . $value->jumlah . " Ayam) " . "(group : " . $value->id_detail_group_transaksi . ")"?> </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>No Pemesanan</label>
                            <input type="text" class="form-control" name="pemesanan" readonly="" placeholder="PM_xxxx">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>No Penjualan Ayam</label>
                            <input type="text" class="form-control" name="id_group" readonly="" placeholder="GT_xxxx">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="text" class="form-control" name="tanggal"
                                placeholder="<?=date(" d-m-Y")?>" />
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Jumlah Ayam</label>
                            <input type="text" class="form-control" name="jumlah" placeholder="0" />
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Harga Terjual</label>
                            <input type="text" class="form-control" name="harga" placeholder="0" />
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan"
                                placeholder="Keterangan tentang pengeluaran jumlah ayam, seperti: kematian, penyakit, hibah dll" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-warning del_data_penjualan">Hapus</button>
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
                    <h3 class="modal-title" id="mediumModalLabel">Hapus Supplier</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    Anda yakin membatalkan pesanan data <span class="id"></span> ?


                    <div class="col-12">
                        <div class="form-group">
                            <label>   Dengan Alasan</label>
                            <input type="text" class="form-control" name="alasan"
                                placeholder="Keterangan tentang pengeluaran jumlah ayam, seperti: kematian, penyakit, hibah dll" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="del">Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal" id="modal-del-data-penjualan">
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
                    Anda yakin menghapus data <span class="id"></span> dengan nama <span class="nama"></span> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="del-penjualan">Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
var data_kandang = <?=json_encode($kandang)?>;

var modal = $('#modal-form-penjualan');
var modaldetail = $('#modal-detail-penjualan');

modal.find('form').find("input[name='tanggal']").datepicker(defaultDatePicker);

$(function() {
    modal.find('form').on("click", "select[name='kandang']", function() {
        var data = $(this).find("option[value='" + $(this).val() + "']").data("jual");

        if(data != null){
            modal.find("form").find("input[name=jumlah_maksimal]").val(data.jumlah);
            modal.find("form").find("input[name=id_group]").val(data.id_detail_group_transaksi);
        }
    });
});

$(document).on("click", ".btn-add-penjualan", function() {
    var data = $(this).data('penjualan');

    modal.find('form').find("select[name='kandang']").find('option').remove();

    data_kandang.forEach(element => {
        modal.find('form').find("select[name='kandang']").append(
            $('<option />')
            .val(element.id_kandang)
            .attr({
                'data-jual': JSON.stringify(element)
            })
            .text(element.nama + " (" + element.jumlah + " Ayam)")
        );
    });

    modal.find("form").find("select[name='kandang']").find("option").first().attr("selected", "true");

    modal.find("form").find("select[name='kandang']").click();

    modal.find('form').find("input[name='id']").val("");
    modal.find('form').find("input[name='nama']").val("");
    modal.find('form').find("input[name='id_pemesanan']").val(data.id_pemesanan);
    modal.find('form').find("input[name='pemesanan']").val("PM_" + ("0000" + data.id_pemesanan).substring( ("0000" + data.id_pemesanan).length - 4,5));
    modal.find('form').find("input[name='jumlah_pemesanan']").val(data.sisa_jumlah);
    modal.find('form').find("input[name='jumlah_penjualan']").val(0);
    modal.find('form').find("input[name='tanggal']").val("");
    modal.find("form").find('input[name="jumlah"]').val("");
    modal.find('form').find("input[name='harga']").val(0);
    modal.find("form").find('input[name="keterangan"]').val("");
    modal.find('form').find("button[type='submit']").attr('name', 'submit');

    modal.find('form').find("select[name='kandang']").click();

    modal.find(".modal-title").html("Tambah Data Penjualan Ayam");

    modal.find('form').find("button.del_data_penjualan").hide();

    if(data_kandang.length == 0 ){
        alert("Stok masih kosong pada setiap kandang");
    }else{
        modal.modal('show');
    }
});

$(document).on("click", ".edit-penjualan", function() {
    var data = $(this).data('penjualan');
    var data_pemesanan = $(this).data('pemesanan');

    modal.find('form').find("select[name='kandang']").find('option').remove();

    modal.find('form').find("select[name='kandang']").append(
        $('<option />')
        .val(data.id_kandang)
        .attr({
            'data-jual': JSON.stringify(data)
        })
        .text(data.nama_kandang)
    );

    data_kandang.forEach(element => {
        if(data.id_kandang != element.id_kandang){
            modal.find('form').find("select[name='kandang']").append(
                $('<option />')
                .val(element.id_kandang)
                .attr({
                    'data-jual': JSON.stringify(element)
                })
                .text(element.nama + " (" + element.jumlah + " Ayam)")
            );
        }
    });

    modal.find("form").find("select[name='kandang']").find("option").first().attr("selected", "true");

    modal.find("form").find("select[name='kandang']").click();

    modal.find('form').find("input[name='id']").val(data.id_detail_penjualan_ayam);
    modal.find('form').find("select[name='kandang']").val(data.id_kandang);
    modal.find('form').find("input[name='karyawan']").val(data.id_karyawan);
    modal.find('form').find("input[name='jumlah']").val(data.jumlah_ayam);
    modal.find('form').find("input[name='tanggal']").val(data.tanggal);
    modal.find('form').find("input[name='harga']").val(data.harga);
    modal.find('form').find("input[name='keterangan']").val(data.keterangan);
    modal.find('form').find("input[name='id_pemesanan']").val(data_pemesanan.id_pemesanan);
    modal.find('form').find("input[name='jumlah_penjualan']").val(data.jumlah_ayam);
    modal.find('form').find("input[name='pemesanan']").val("PM_" + ("0000" + data_pemesanan.id_pemesanan).substring( ("0000" + data_pemesanan.id_pemesanan).length - 4,5));
    modal.find('form').find("input[name='jumlah_pemesanan']").val(data_pemesanan.sisa_jumlah);
    modal.find('form').find("button[type='submit']").attr('name', 'put');

    modal.find('form').find("select[name='kandang']").click();

    modal.find('form').find("button.del_data_penjualan").show();
    modal.find('form').find("button.del_data_penjualan").attr({
            'data-penjualan': JSON.stringify(data)
        });

    modal.find(".modal-title").html("Ubah Data Penjualan Ayam");

    modal.modal('show');
});

$(document).on("click", ".detail-penjualan", function() {
    var data = $(this).data("penjualan");

    modaldetail.find(".id").html(data.id_detail_penjualan_ayam);

    modaldetail.find(".id").html(": " + data.id_detail_pembelian_ayam);
    modaldetail.find(".tanggal").html(": " + data.tanggal);
    modaldetail.find(".kandang").html(": " + data.nama_kandang + " (" + data.id_kandang + ")");
    modaldetail.find(".jumlah").html(": " + data.jumlah_ayam);
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
    modal.find(".modal-title").html("Ubah Penjualan Ayam");

    modaldetail.modal('show');
});

$(document).on("click", '.del-penjualan', function() {
    var data = $(this).data('penjualan');

    var modal = $("#modal-del-penjualan");

    modal.find('form').find("input[name='id']").val(data.id_pemesanan);
    modal.find('form').find("span[class='id']").html(data.id_pemesanan);
    modal.find('form').find("span[class='nama']").html(data.nama);

    modal.modal("show");
});

$(document).on("click", '.del_data_penjualan', function() {
    var data = $(this).data('penjualan');

    var modal = $("#modal-del-data-penjualan");

    modal.find('form').find("input[name='id']").val(data.id_detail_penjualan_ayam);
    modal.find('form').find("span[class='id']").html(data.id_detail_penjualan_ayam);
    modal.find('form').find("span[class='nama']").html(data.nama);

    modal.modal("show");
});

$(document).ready(function() {

    $.validator.addMethod("maksimalStok", function(value, element, params) {
        var id_kandang = modal.find("form").find("select[name='kandang']").val();
        var data = modal.find("form").find("select[name='kandang']").find("option[value='" +
            id_kandang + "']").data("jual");

        var jumlah = 0;

        if(isNaN(data.jumlah_ayam) == false){
            jumlah = parseInt(data.jumlah_ayam);
        }else{
            jumlah = parseInt(data.jumlah);
        }

        console.log(jumlah);

        var mode = modal.find('form').find("button[type='submit']").attr('name');

        if (mode == "put" && (typeof data.id_detail_penjualan_ayam != "undefined")) {
            jumlah = jumlah + parseInt(data.stok_ayam);
        }

console.log(data);

        if (parseInt(value) <= jumlah){
            return true;
        }

        return false;
    }, "Melebihi maksimal stok yang diperbolehkan");

    $.validator.addMethod("jumlahPemesanan", function(value, element, params) {
        var jumlah_pemesanan = modal.find("form").find("input[name='jumlah_pemesanan']").val();

        var mode = modal.find('form').find("button[type='submit']").attr('name');

            var jumlah_penjualan = modal.find("form").find("input[name='jumlah_penjualan']").val();

            jumlah_pemesanan = jumlah_pemesanan + parseInt(jumlah_penjualan);


        if (parseInt(value) <= jumlah_pemesanan){
            return true;
        }

        return false;
    }, "Melebihi jumlah pemesanan ");


    $("#form-penjualan").validate({
        rules: {
            nama: {
                required: true,
                minlength: 10
            },
            jumlah: {
                required: true,
                number: true,
                min: 1,
                jumlahPemesanan: {},
                maksimalStok: {

                }
            },
            harga: {
                required: true,
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
                required: "Jumlah tidak boleh kosong",
                number: "Harus Berupa Angka",
                min: "Minimal jumlah yang dinputkan adalah 1",
                max: "Jumlah ayam penjualan melebihi stok ayan"
            },
            harga: {
                required: "Harga tidak boleh kosong",
                number: "Harga harus berupa angka",
                min: "Harga tidak boleh dibawah angak 0"
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