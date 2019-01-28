@extends("_part.layoutLaporan")

@section('title',  $title)

@section("content")
<div style="width: 100%; display: flex;flex-direction: row;justify-content:space-between; margin-bottom: 10px">
	<div>
		Bibit : <?php echo $data_ayam->id_pembelian_terbaru . " (" . $data_ayam->tanggal_pembelian_terbaru . ")" ?>
	</div>
	<div>
		Tanggal: <?php echo date("Y-m-d") ?>

	</div>
</div>
<div id="outtable">
	<table class="data">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode</th>
				<th>Nama</th>
				<th>Pemasukan</th>
				<th>Digunakan</th>
				<th>Sisa</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($transaksi as $key => $value) { ?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><?= $value->id_kandang ?></td>
					<td><?= $value->nama ?></td>
					<td><?= $value->masuk ?></td>
					<td><?= $value->keluar ?></td>
					<td><?= $value->masuk - $value->keluar ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
@endsection