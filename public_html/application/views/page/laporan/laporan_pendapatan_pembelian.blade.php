@extends("_part.layout_laporan")

@section('title', $title)

@section("content")
<div style="width: 100%; display: flex;flex-direction: row;justify-content:space-between; margin-bottom: 10px">
    <div></div>
    <div> Tanggal:
        <?php echo date("Y-m-d") ?>
    </div>
</div>

<pre>
<?php
var_dump($data);
?>

</pre>

<div id="outtable">
    <table class="data">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Detail Penjualan</th>
                <th>ID Detail Pembelian</th>
                <th>ID Kandang</th>
                <th>Tanggal</th>
                <th>Karyawan</th>
                <th>Jumlah</th>
                <th>Harga Terjual</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_pembelian as $key => $value) { ?>
                <tr>
                    <td>
                        <?= ($limit * $offset) + $key + 1 ?>
                    </td>
                    <td>
                        <?= $value->id_detail_penjualan_ayam ?>
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
                        <?= $value->nama_karyawan ?>
                    </td>
                    <td>
                        <?= $value->jumlah_ayam . " Ayam" ?>
                    </td>
                    <td>
                        Rp. <?= number_format($value->harga, 2, ',', '.') ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
@endsection