@extends("_part.layout_laporan")

@section('title', $title)

@section("content")
<div style="width: 100%; display: flex;flex-direction: row;justify-content:space-between; margin-bottom: 10px">
    <div></div>
    <div> Tanggal:
        <?php echo date("Y-m-d") ?>
    </div>
</div>

<div id="outtable">
    <table class="data">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Kelompok Transaksi</th>
                <th>Kandang</th>
                <th>Supplier</th>
                <th>Harga Pembelian</th>
                <th>Total Penjualan</th>
                <th>Keuntungan</th>
                <th>Jumlah Pembelian</th>
                <th>Jumlah Terjual</th>
                <th>Jumlah Kerugian</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value) {?>
            <tr>
                <td>
                    <?=($limit * $offset) + $key + 1?>
                </td>
                <td>
                    <?=$value->id_detail_group_transaksi?>
                </td>
                <td>
                    <?=$value->nama_kandang?>
                </td>
                <td>
                    <?php foreach ($value->supplier as $keySupplier => $valueSupplier) {
    if ($keySupplier > 0) {
        echo ", ";
    }
    echo $valueSupplier->nama;
}?>
                </td>
                <td>
                    Rp. <?=number_format($value->pembelian, 2, ',', '.')?>
                </td>
                <td>
                    Rp. <?=number_format($value->penjualan, 2, ',', '.')?>
                </td>
                <td>
                    Rp. <?=number_format($value->penjualan - $value->pembelian, 2, ',', '.')?>
                </td>
                <td>
                    <?=$value->jumlah_ayam_pembelian . " Ayam"?>
                </td>
                <td>
                    <?=$value->jumlah_ayam_penjualan . " Ayam"?>
                </td>
                <td>
                    <?=$value->jumlah_ayam_kerugian . " Ayam"?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

@include('_part.footer_laporan')
@endsection