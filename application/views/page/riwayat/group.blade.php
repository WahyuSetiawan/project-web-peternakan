@extends("_part.layout", $head)

@section("content")


<div class="column">

    <h3 class="title-5 m-b-25">Riwayat Pembelian Ayam Yang Telah Usai</h3>

    @include('_part.message', ['flashdata' => $flashdata])

    <div class="row m-b-25">
        <div class="row">
            <div class="row">
                <form method="get">
                    <input type="hidden" name="per_page" value="0" />

                    <div class="row">
                        <div class="form-select">
                            <select class="js-select2" name="kandang">
                                <option value="0" <?=($id_kandang == "0") ? "selected" : ""?>>Kandang</option>
                                <?php foreach ($kandang as $value) {?>
                                <option value="<?=$value->id_kandang?>" <?=($value->id_kandang == $id_kandang) ?
    "selected" : ""?>>
                                    <?=$value->nama?>
                                </option>`
                                <?php }?>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                        <div class="form-select">
                            <select class="js-select2" name="supplier">
                                <option value="0" <?=($id_supplier == "0") ? "selected" : ""?>>Supplier</option>
                                <?php foreach ($supplier as $value) {?>
                                <option value="<?=$value->id_supplier?>" <?=($value->id_supplier == $id_supplier) ?
    "selected" : ""?>>
                                    <?=$value->nama?>
                                </option>
                                <?php }?>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                        <button class="btn" type="submit">
                            <i class="zmdi "></i>Sesuaikan</button>
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
                        <th>ID Detail Pembelian</th>
                        <th>Kandang</th>
                        <th>Supplier</th>
                        <th>Harga Pembelian</th>
                        <th>Total Penjualan</th>
                        <th>Keuntungan</th>
                        <th>Jumlah Terjual</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($data) == 0) {?>
                    <tr>
                        <td colspan="9">Tidak terdapat riwayat penjualan tidak terlaksana</td>
                    </tr>
                    <?php }

foreach ($data as $key => $value) {?>
                    <tr>
                        <td>
                            <?=($limit * $offset) + $key + 1?>
                        </td>
                        <td>
                            <?=$value->id_detail_group_transaksi?>
                        </td>
                        <td>
                            <?=$value->id_kandang?>
                        </td>
                        <td>
                            <?=$value->updated_at?>
                        </td>
                        <td>
                            Rp. <?=number_format($value->pembelian, 2, ',', '.')?>
                        </td>
                        <td>
                            Rp. <?=number_format($value->penjualan, 2, ',', '.')?>
                        </td>
                        <td>
                            Rp. <?=number_format($value->pembelian - $value->penjualan, 2, ',', '.')?>
                        </td>
                        <td>
                            Pembelian : <?=$value->jumlah_ayam_pembelian . " Ayam"?><br>
                            Penjualan : <?=$value->jumlah_ayam_penjualan . " Ayam"?><br>
                            Kerugian : <?=$value->jumlah_ayam_kerugian . " Ayam"?><br>
                        </td>
                        <td style="text-align: center">
                            <button type="button" class="btn btn-success detail-pembelian"
                                data-pembelian='<?=json_encode($value)?>'><i class="fa fa-info-circle"></i></button>
                            <button type="button"
                                href="<?=base_url("riwayat/group/pembelian/" . $value->id_detail_group_transaksi)?>"
                                class="btn btn-info"><i class="fa fa-info-circle"></i></button>
                            <button type="button"
                                href="<?=base_url("riwayat/group/penjualan/" . $value->id_detail_group_transaksi)?>"
                                class="btn btn-info"><i class="fa fa-info-circle"></i></button>
                            <button type="button"
                                href="<?=base_url("riwayat/group/kerugian/" . $value->id_detail_group_transaksi)?>"
                                class="btn btn-info"><i class="fa fa-info-circle"></i></button>
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
@section('js')

<script>
var modal = $('#modalKandang');
var modaldetail = $("#modal-detail-pembelian");

modal.find('form').find("input[name='tanggal']").datepicker(defaultDatePicker);

$(function() {
    $(document).on("click", "button[href]", function() {
        var attr_href = $(this).attr("href");

        window.location.href = attr_href;
        // var data = $(this).find("option[value='" + $(this).val() + "']").data("jual");

        // modal.find("form").find("input[name=jumlah_maksimal]").val(data.jumlah);
        // modal.find("form").find("input[name=id_group]").val(data.id_detail_group_transaksi);
    });
});

$(document).on("click", ".btn-add-kandang", function() {
    modal.find('form').find("input[name='id']").val("");
    modal.find('form').find("input[name='nama']").val("");
    modal.find('form').find("input[name='tanggal']").val("");
    modal.find("form").find('input[name=umur]').val("");
    modal.find("form").find("input[name=harga]").val(0);
    modal.find('form').find("input[name=jumlah]").val("");
    modal.find('form').find("button[name='submit']").attr('name', 'submit');

    modal.modal('show');
});

$(document).on("click", ".edit-pembelian", function() {
    var data = $(this).data('pembelian');

    modal.find('form').find("input[name='id']").val(data.id_detail_pembelian_ayam);
    modal.find('form').find("select[name='kandang']").val(data.id_kandang);
    modal.find('form').find("select[name='supplier']").val(data.id_supplier);
    modal.find('form').find("input[name='karyawan']").val(data.id_karyawan);
    modal.find('form').find("input[name='jumlah']").val(data.jumlah_ayam);
    modal.find("form").find('input[name=umur]').val(data.umur);
    modal.find("form").find("input[name=harga]").val(data.harga_ayam);
    modal.find('form').find("input[name='tanggal']").val(data.tanggal);
    modal.find('form').find("button[name='submit']").attr('name', 'put');

    modal.modal('show');
});

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

    console.log(data);

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

$(document).on("click", '.del-pembelian', function() {
    var data = $(this).data('pembelian');

    var modal = $("#modal-del-supplier");

    modal.find('form').find("input[name='id']").val(data.id_detail_pembelian_ayam);
    modal.find('form').find("span[class='id']").html(data.id_detail_pembelian_ayam);
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