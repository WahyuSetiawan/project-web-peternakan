@extends("_part.layout",  $head)

@section("content")

<div class="row">
    <h3 class="title-5 m-b-25">Jumlah Stok Persediaan</h3>

    <div class="col-lg-12 m-b-10">
        <p>
            Jumlah persediaan semua berjumlah :
        </p>
    </div>

    <div class="col-lg-12">        
        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Persediaan</th>
                        <th>Nama Persediaan</th>
                        <th>Jumlah Persediaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value->id_persediaan ?></td>
                            <td><?= $value->nama_persediaan ?></td>
                            <td><?= $value->jumlah_persediaan ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section("modal")

<!-- modal medium -->
<div class="modal fade" id="modal-pembelian" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" id="form-pembelian-ayam">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Tambah Supplier</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <select class="form-control" name="supplier">
                                <?php foreach ($supplier as $key => $value) { ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama . " (" . $value->notelepon . ")" ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Umur ayam (bulan) </label>
                            <input type="number" class="form-control" name="umur" value="0">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Jumlah Ayam</label>
                            <input type="number" class="form-control" name="jumlah" value="1">
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

<div class="modal" id="modal-penjualan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="mediumModalLabel">Penjualan Ayam</h3>
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
    $(document).on("click", ".btn-add-supplier", function () {
        var modalPembelian = $('#modal-pembelian');

        modalPembelian.find('form').find("input[name='id']").val("");
        modalPembelian.find('form').find("input[name='nama']").val("");
        modalPembelian.find('form').find("textarea[name='alamat']").html("");
        modalPembelian.find('form').find("input[name='telepon']").val("");
        modalPembelian.find('form').find("button[name='submit']").attr('name', 'submit');

        modalPembelian.modal('show');
    });

    $(document).on("click", ".pembelian-ayam", function () {
        var val = $(this).data("kandang");

        document.location.href = "stokayam/transaksi/" + val.id_kandang;
    });

    $(document).on("click", '.penjualan-ayam', function () {
        var val = $(this).data("kandang");

        document.location.href = "stokayam/transaksi/" + val.id_kandang;
    });

    $(document).ready(function () {
        $("#form-pembelian-ayam").validate({
            rules: {
                supplier: {
                    required: true
                },
                umur: {
                    required: true,
                    number: true,
                    min: 0
                },
                jumlah: {
                    required: true,
                    number: true,
                    min: 1
                }
            },
            messages: {
                supplier: {
                    required: "Supplier tidak boleh kosong"
                },
                umur: {
                    required: "Umur tidak boleh kosong",
                    number: "Umur harus berupa angka",
                    min: "Minimal angka yang diinputkan andalah 0"
                },
                jumlah: {
                    required: "Jumlah tidak boleh kosong",
                    number: "Jumlah harus berupa angka",
                    min: "Jumlah minimal 1"
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