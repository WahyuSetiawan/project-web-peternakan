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
                <th>Kode Kandang</th>
                <th>Nama Kandang</th>
                <th>Nama Penanggung Jawab</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kandang as $key => $value) { ?>
            <tr>
                <td>
                    <?= $key + 1 ?>
                </td>
                <td>
                    <?= $value->id_kandang ?>
                </td>
                <td>
                    <?= $value->nama ?>
                </td>
                <td>
                    <?= $value->nama_karyawan ?>
                </td>
                <td>
                    <?= $value->jumlah?> Ayam
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
@endsection