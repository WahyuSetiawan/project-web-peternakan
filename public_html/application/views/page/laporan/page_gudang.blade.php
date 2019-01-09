@extends("_part.layout", $head)


@section("content")

<?php
$CI = &get_instance();
?>
<div class="row">
	<h3 class="title-5 m-b-25">
		<?php echo $title ?>
	</h3>

	<?php /*
	<div class="col-lg-12  m-b-25">
		<div class="card card-info">
			<form method="get" action="">
				<div class="card-header">
					Pemilah Data
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Kandang : </label>
						<select class="form-control" name="id_kandang">
							<?php foreach ($kandang as $key => $value) { ?>
	<option value="<?= $value->id_kandang ?>" <?=(@$_GET['id_kandang']==$value->id_kandang) ? "selected" : "" ?>>
		<?= $value->nama ?>
	</option>
	<?php } ?>
	</select>
</div>
</div>
<div class="card-footer">
	<button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">Tampilkan Data</button>
</div>
</form>
</div>
</div>
*/?>

<div class="col-lg-12">
	<div class="table-data__tool">
		<div class="table-data__tool-left">
			<form method="get">
				<input type="hidden" name="per_page" value="0" />

				<div class="rs-select2--light rs-select2--md">
					<select class="js-select2" name="persediaan">
						<option value="0" <?=($id['persediaan']=="0" ) ? "selected" : "" ?>>Persediaan</option>
						<?php foreach ($persediaan as $value) { ?>
						<option value="<?= $value->id_persediaan ?>" <?=($value->id_persediaan == $id['persediaan']) ?
							"selected" : "" ?>>
							<?= $value->nama ?>
						</option>
						<?php } ?>
					</select>
					<div class="dropDownSelect2"></div>
				</div>

				<div class="rs-select2--light rs-select2--md">
					<select class="js-select2" name="supplier">
						<option value="0" <?=($id['supplier']=="0" ) ? "selected" : "" ?>>Supplier</option>
						<?php foreach ($supplier as $value) { ?>
						<option value="<?= $value->id_supplier ?>" <?=($value->id_supplier == $id['supplier']) ?
							"selected" : "" ?>>
							<?= $value->nama ?>
						</option>
						<?php } ?>
					</select>
					<div class="dropDownSelect2"></div>
				</div>

				<div class="rs-select2--light rs-select2--md">
					<select class="js-select2" name="aksi">
						<option>Semua</option>
						<option value="in" <?=($id['aksi']=="in" ) ? "selected" : "" ?>>Pemasukan</option>
						<option value="out" <?=($id['aksi']=="out" ) ? "selected" : "" ?>>Pengeluaran</option>
					</select>
					<div class="dropDownSelect2"></div>
				</div>


				<button class="au-btn-filter" type="submit">
					<i class="zmdi zmdi-filter-list"></i>filters</button>
			</form>
		</div>
		<div class="table-data__tool-right">
			{{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small btn-add-kandang">
				<i class="zmdi zmdi-plus"></i>Tambah Pembelian</button> --}}

			<form method="get">
				<?php foreach ($id as $key => $value) {?>
				<input type="hidden" name={{$key}} value={{$value}} />
				<?php }?>

				<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
					<select class="js-select2" name="type" onchange="this.form.submit()">
						<option selected="selected">Cetak</option>
						<option value="html">HTML</option>
						<option value="pdf">PDF</option>
					</select>
					<div class="dropDownSelect2"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php /*
	<div class="col-lg-12  m-b-25">
		<?php if ($CI->session->flashdata('kesalahan')) { ?>
<div class="alert alert-danger">
	<?= $CI->session->flashdata('kesalahan') ?>
</div>
<?php } ?>

<a href="<?php echo base_url(" laporan/gudang/null/print?" . $_SERVER['QUERY_STRING']) ?>" class="au-btn au-btn-icon
	au-btn--green au-btn--small btn-add-vaksin" type="button">
	<i class="zmdi zmdi-plus"></i>Print Data Transaksi</a>

</div> */
?>


<div class="col-lg-12">
	<div class="table-responsive table--no-card m-b-25">
		<table class="table table-borderless table-striped table-earning">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>Aksi</th>
					<th>Masuk</th>
					<th>Keluar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($transaksi as $key => $value) { ?>
				<tr>
					<td>
						<?= $key + 1 ?>
					</td>
					<td>
						<?= $value->id_persediaan ?>
					</td>
					<td>
						<?= $value->nama_persediaan ?>
					</td>
					<td>
						<?= $value->nama_supplier ?>
					</td>
					<td>
						<?= $value->aksi?>
					</td>
					<td>
						<?= $value->jumlah ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="col-lg-12">
	<div class="row">
		<div class="col">
			<?= $pagination ?>
		</div>
	</div>
</div>
</div>
@endsection