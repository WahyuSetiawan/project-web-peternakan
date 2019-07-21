@extends("_part.layout", $head)

@section("content")
<div class="column full-width">
    <h3 class="title-5 m-b-25">Halaman Manajemen Data Karyawan</h3>
    <div class="col-lg-12  m-b-12">
    <form method="post" action="" id="filter_data">
            <div class="card card-info">

                <div class="card-header">
                    Ubah data karyawan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama : </label>
                                <input type="text" name="nama" value="{{$karyawan->nama}}" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Telepon : </label>
                                <input type="text" name="telepon" value="{{$karyawan->no_hp}}" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Username : </label>
                                <input type="text" name="username" value="{{$karyawan->username}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer row">
                    <button type="submit" class="btn btn-success" name="put" value="put">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section("modal")

@endsection

@section('js')

<script>
    $(document).on("click", ".js-btn-add-kandang", function () {
        var modal = $('#modalKandang');

        modal.find('form').find("input[name='id']").val("");
        modal.find('form').find("input[name='nama']").val("");
        modal.find('form').find("input[name='tanggal']").val("");
        modal.find('form').find("button[name='submit']").attr('name', 'submit');

        modal.modal('show');
    });

    $(document).on("click", ".edit-kandang", function () {
        var data = $(this).data('supplier');
        var modal = $('#modalKandang');

        modal.find('form').find("input[name='id']").val(data.id_kandang);
        modal.find('form').find("input[name='nama']").val(data.nama);
        modal.find('form').find("input[name='tanggal']").val(data.tanggal);
        modal.find('form').find("button[name='submit']").attr('name', 'put');

        modal.modal('show');
    });

    $(document).on("click", '.del-kandang', function () {
        var data = $(this).data('supplier');

        var modal = $("#modal-del-supplier");

        modal.find('form').find("input[name='id']").val(data.id_kandang);
        modal.find('form').find("span[class='id']").html(data.id_kandang);
        modal.find('form').find("span[class='nama']").html(data.nama);

        modal.modal("show");
    });

    // $(document).ready(function () {
    //     $("#form-kandang").validate({
    //         rules: {
    //             nama: {
    //                 required: true,
    //                 minlength: 1
    //             },
    //             maksimal_jumlah: {
    //                 number: true,
    //                 min: 1,
    //             }
    //         },
    //         messages: {
    //             nama: {
    //                 required: "Nama tidak boleh kosong",
    //                 minlength: "Minimal karakter adalah 1"
    //             },
    //             maksimal_jumlah: {
    //                 number: "Harus Berupa Angka",
    //                 min: "Minimal jumlah yang dinputkan adalah 1"
    //             }
    //         },
    //         errorElement: "em",
    //         errorPlacement: function (error, element) {
    //             error.addClass("help-block");

    //             if (element.prop("type") == "checkbox") {
    //                 error.insertAfter(element.parent("label"));
    //             } else {
    //                 error.insertAfter(element);
    //             }
    //         },
    //         highlight: function (element, errorClass, validClass) {
    //             $(element).parent(".form-group").addClass("has-warning").removeClass("has-success");
    //             $(element).addClass("is-invalid").removeClass("is-valid");
    //         },
    //         unhighlight: function (element, errorClass, validClass) {
    //             $(element).parent(".form-group").addClass("has-success").removeClass("has-warning");
    //             $(element).addClass("is-valid").removeClass("is-invalid");
    //         }
    //     });
    // });
</script>
@endsection