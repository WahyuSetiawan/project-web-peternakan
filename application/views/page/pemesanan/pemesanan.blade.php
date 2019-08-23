@extends("_part/layout_index")


@section("content")

<div style="text-align:center" class="m-b-25">
    <h1>Tampilan Pemesanan Pengunjung</h1>
</div>

<div style="text-align:center" class="m-b-25">
    <h3>Peternakan Ayam Pak Jaiz - Bantul</h3>
    <p>Jogonanadang Triwidadi Pajangan Bantul RT. 01/RW. 03 Yogyakarta</p>
</div>

<div class="row full-width">
    <div class="col-4" style="text-align:center; padding-left: 40px">
        <h3 class="title-5 m-b-25">Halaman Manajemen Kandang</h3>
        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kandang</th>
                        <th>Jumlah Ayam</th>
                        <th>Umur ayam Sekarang</th>
                        <th>Status</th>
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
                            <?=$value->nama?>
                        </td>
                        <td>
                            <?=$value->jumlah?> Ayam
                        </td>
                        <td>
                            <?=$value->umur_ayam_sekarang?> Hari
                        </td>
                        <td>
                            <?php
if ($value->umur_ayam_sekarang > 35) {
    echo "Siap untuk dijual";
} elseif ($value->jumlah <= 0) {
    # code...
    echo "Tidak terdapat stok ayam";
} else {
    echo "Tidak siap untuk dijual";
}
    ?>
                        </td>
                    </tr>
                    <?php }?>

                </tbody>
            </table>
        </div>
    </div>

    <div class="col-6" style="text-align:center; padding-left: 40px">
        <div class="column full-width">
            <h3 class="title-5 m-b-25">Form Pemesanan</h3>
            <div class="col-lg-12  m-b-12">
                @include('_part.message', ['flashdata' => $flashdata])

                <div style="color: red;">
                    <?php
$data_validation = validation_errors();

if ($data_validation != "") {
    echo $data_validation;
}
?>
                </div>

                <form method="post" action="" id="filter_data">

                    <div class="card card-info">
                        <div class="card-header">
                            Form Tambah Pemesanan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Atas Nama : </label>
                                        <input type="text" name="nama" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Telepon : </label>
                                        <input type="text" name="telepon" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Alamat : </label>
                                        <input type="text" name="alamat" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Jumlah Ayam</label>
                                        <input type="text" class="form-control" name="jumlah" placeholder="0" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer row">
                            <button type="submit" class="btn btn-success" name="submit" value="put">Kirim
                                Pemesanan</button>
                        </div>
                        </divbar </form> </div> </div> </div> </div> @endsection


@section("js")

<script>

$("#filter_data").validate({
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
            alamat: {
                required: true,
                minlength: 6
            },
            telepon: {
                required: true,
                minlength: 6,
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
telepon: {
    required:"telepon tidak boleh kosong",
    minlength: "tidak boleh kurang dari 6 karakter"
},
alamat: {
    required : "alamat tidak boleh kosong",
    minlength: "karakter tidak boelh kurang dari 6"
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
</script>

@endsection