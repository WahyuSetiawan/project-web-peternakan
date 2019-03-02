@extends("_part.layout", $head)


@section("content")

<?php
$CI = &get_instance();
?>
<div class="column">
	<h3 class="title-5 m-b-25">
		<?php echo $title ?>
	</h3>

	@include('_part.message', ['flashdata' => $flashdata])

	<div class="row m-b-25">
		<div class="row">
			<div class="row">

				<input type="hidden" name="per_page" value="0" />
				<div class="row">

					<div class="form-select">
						<select class="js-select2" name="supplier">
							<option value="0" <?=($id['supplier']=="0" ) ? "selected" : "" ?>>Supplier</option>
							<?php foreach ($supplier as $value) { ?>
							<option value="<?= $value->id_supplier ?>" <?=($value->id_supplier == $id['supplier']) ?
								"selected" : "" ?>>
								{{ $value->nama }}
							</option>
							<?php } ?>
						</select>
						<div class="dropDownSelect2"></div>
					</div>

					<div class="form-select">
						<select class="js-select2" name="aksi">
							<option>Semua</option>
							<option value="in" <?=($id['aksi']=="in" ) ? "selected" : "" ?>>Pemasukan</option>
							<option value="out" <?=($id['aksi']=="out" ) ? "selected" : "" ?>>Pengeluaran</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>


					<button class="btn" type="submit">
						<i class="zmdi zmdi-filter-list"></i>filters</button>

				</div>
			</div>

		</div>
		</form>
	</div>

	<div class="col-lg-12">
		<div class="table-responsive table--no-card m-b-25">
			<table class="table table-borderless table-striped table-earning">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Kandang</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($transaksi as $key => $value) { ?>
					<tr>
						<td>{{ $key + 1 }} </td>
						<td>{{ $value->id_gudang }} </td>
						<td>{{ $value->nama_gudang }} </td>
					<td>
						<a href="{{base_url("laporan/stokgudang/".$value->id_gudang."/html")}}" class="btn btn-info">Cetak</a>
						<a href="{{base_url("laporan/stokgudang/".$value->id_gudang."/pdf")}}" class="btn btn-warning">Cetak Pdf</a>
					</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-lg-5">Showing
		{{$offset+1}} to
		{{($count < ($limit + $offset)) ? $count : ($limit + $offset)}} of {{$count}} entries </div> <div class="col-lg-12">
			<div class="row pull-right">
				<div class="row">
					<?= $pagination ?>
				</div>
			</div>
	</div>
</div>
@endsection

@section('js')
<script>
	var modal = $("#filter_data");

	modal.find("select[name='tahun']").on("click", function () {
		changeBulan();
	});

	function changeBulan() {
		var select = modal.find("select[name='tahun']");

		var data = $(select).find('option[value="' + $(select).val() + '"]').data("bulan");
		var bulan = modal.find("select[name='bulan']");

		bulan.empty();

		bulan.append(
			$('<option />')
			.text("Semua")
		);

		$.each(data, function (index, value) {
			bulan.append(
				$('<option />').val(value.bulan)
				.text(value.bulan)
			);
		});
	}
</script>
@endsection