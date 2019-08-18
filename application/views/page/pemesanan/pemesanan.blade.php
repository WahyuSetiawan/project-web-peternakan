@extends("_part/layout_index")


@section("content")

<div style="text-align:center">
    <h1>Tampilan Pemesanan Pengunjung</h1>
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