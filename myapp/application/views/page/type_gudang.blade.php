@extends("_part.layout",  $head)

@section("content")

<div class="row">
	<h3 class="title-5 m-b-25">Type Gudang</h3>

	<div class="col-lg-12  m-b-25">
		<button class="au-btn au-btn-icon au-btn--green au-btn--small btn-add-type_gudang" type="button">
			<i class="zmdi zmdi-plus"></i>Tambah Type Gudang</button>
	</div>
	<div class="col-lg-12">
		<div class="table-responsive table--no-card m-b-25">
			<table class="table table-borderless table-striped table-earning">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Keterangan</th>
						<th style="text-align: center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($type_gudang as $key => $value) { ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $value->id_type_gudang?></td>
							<td><?= $value->keterangan ?></td>
							<td style="text-align: center">
								<button type="button" class="btn btn-primary edit-type_gudang" data-supplier='<?= json_encode($value) ?>'><i class="fa fa-pen-square"></i></button>
								<button type="button" class="btn btn-danger del-type_gudang" data-supplier='<?= json_encode($value) ?>'><i class="fa fa-trash"></i></button>
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

@section("modal")

<!-- modal medium -->
<div class="modal fade" id="modalKandang" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form action="" method="post" id="form-type_gudang">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="mediumModalLabel">Tambah Kandang</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id">
					<div class="col-8">
						<div class="form-group">
							<label>Nama Type Gudang</label>
							<input type="text" class="form-control" name="keterangan">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- end modal medium -->

<div class="modal" id="modal-del-supplier">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post">
				<div class="modal-header">
					<h3 class="modal-title" id="mediumModalLabel">Hapus Type Gudang</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id">
					Anda yakin menghapus data <span class="id"></span> dengan nama <span class="nama"></span> ?
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="del">Ya</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('js')

<script>
	$(document).on("click", ".btn-add-type_gudang", function () {
		var modal = $('#modalKandang');

		modal.find('form').find("input[name='id']").val("");
		modal.find('form').find("input[name='keterangan']").val("");
		modal.find('form').find("button[name='submit']").attr('name', 'submit');

		modal.modal('show');
	});

	$(document).on("click", ".edit-type_gudang", function () {
		var data = $(this).data('supplier');
		var modal = $('#modalKandang');

		modal.find('form').find("input[name='id']").val(data.id_type_gudang);
		modal.find('form').find("input[name='keterangan']").val(data.keterangan);
		modal.find('form').find("button[name='submit']").attr('name', 'put');

		modal.modal('show');
	});

	$(document).on("click", '.del-type_gudang', function () {
		var data = $(this).data('supplier');

		var modal = $("#modal-del-supplier");

		modal.find('form').find("input[name='id']").val(data.id_type_gudang);
		modal.find('form').find("span[class='id']").html(data.id_type_gudang);
		modal.find('form').find("span[class='nama']").html(data.nama);

		modal.modal("show");
	});

	$(document).ready(function () {
		$("#form-type_gudang").validate({
			rules: {
				keterangan: {
					required: true,
					minlength: 1
				},
				maksimal_jumlah: {
					number: true,
					min: 1,
				}
			},
			messages: {
				keterangan: {
					required: "Nama tidak boleh kosong",
					minlength: "Minimal karakter adalah 1"
				},
				maksimal_jumlah: {
					number: "Harus Berupa Angka",
					min: "Minimal jumlah yang dinputkan adalah 1"
				}
			},
			errorElement: "em",
			errorPlacement: function (error, element) {
				error.addClass("help-block");

				if (element.prop("type") == "checkbox") {
					error.insertAfter(element.parent("label"));
				} else {
					error.insertAfter(element);
				}
			},
			highlight: function (element, errorClass, validClass) {
				$(element).parent(".form-group").addClass("has-warning").removeClass("has-success");
				$(element).addClass("is-invalid").removeClass("is-valid");
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).parent(".form-group").addClass("has-success").removeClass("has-warning");
				$(element).addClass("is-valid").removeClass("is-invalid");
			}
		});
	});
</script>
@endsection