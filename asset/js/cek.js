var modal = $('#modal-form-pemakaian');
var modaldetail = $('#modal-detail-pemakaian');

$(function() {
    $("#datepicker").datepicker();
    // $("#datepicker").datepicker('setDate', new Date(
    // "<?= (isset($current_date_view_target)) ? $current_date_view_target : $current_time_view ?>"
    // .replace(/(\d{4})-(\d{2})-(\d{2})/, "$2/$3/$1")));

    $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");

    modal.find("form").find("input[name=tanggal]").datetimepicker({
        format: "H:i",
        datepicker: false
    });

    modal.find('form').on("click", "select[name='jadwal']", function() {
        var data = $(this).find("option[value='" + $(this).val() + "']").data("jadwal");

        modal.find('form').find("input[name='gudang']").val(data.nama_gudang);
        modal.find('form').find("input[name='kandang']").val(data.nama_kandang);

        modal.find('form').find("input[name='waktu_mulai']").val(data.waktu_mulai_format + " sampai " + data.waktu_selesai_format);
    });

    // modal.find("form").find("input[name=tanggal]").datetimepicker('setDate', new Date(
    // "<?= (isset($current_date_view_target)) ? $current_date_view_target : $current_time_view ?>"
    // .replace(/(\d{4})-(\d{2})-(\d{2})/, "$2/$3/$1")));
    // modal.find("form").find("input[name=tanggal]").datetimepicker("option", "dateFormat", "yy-mm-dd");
});

$(document).on("click", ".btn-add-pemakaian", function() {
    modal.find('form').find("input[name='id']").val("");
    modal.find('form').find("input[name='nama']").val("");

    // modal.find("form").find("input[name=tanggal]").datepicker('setDate', new Date(
    // "<?= (isset($current_date_view_target)) ? $current_date_view_target : $current_time_view ?>"
    // .replace(/(\d{4})-(\d{2})-(\d{2})/, "$2/$3/$1")));

    modal.find('form').find("input[name='tanggal']").val("<?= $current_time_view ?>");
    modal.find('form').find("input[name='jumlah']").val("");
    modal.find('form').find("input[name='keterangan']").val("");
    modal.find('form').find("button[name='submit']").attr('name', 'submit');

    modal.modal('show');
});

$(document).on("click", ".edit-pemakaian", function() {
    var data = $(this).data('pemakaian');

    modal.find('form').find("input[name='id']").val(data.id_detail_penggunaan_gudang);
    modal.find('form').find("input[name='gudang']").val(data.id_gudang);
    modal.find('form').find("input[name='karyawan']").val(data.id_karyawan);
    modal.find('form').find("input[name='kandang']").val(data.id_kandang);
    modal.find('form').find("select[name='jadwal']").val(data.id_jadwal_kandang);
    modal.find('form').find("input[name='jumlah']").val(data.jumlah);

    // modal.find("form").find("input[name=tanggal]").datepicker('setDate', new Date(
    // "<?= (isset($current_date_view_target)) ? $current_date_view_target : $current_time_view ?>"
    // .replace(/(\d{4})-(\d{2})-(\d{2})/, "$2/$3/$1")));

    modal.find("form").find("input[name=tanggal]").val(data.tanggal_time_only);
    modal.find('form').find("input[name='keterangan']").val(data.keterangan);
    modal.find('form').find("button[name='submit']").attr('name', 'put');

    modal.find('form').find("select[name='jadwal']").onclick

    modal.modal('show');
});


$(document).on("click", '.detail-pemakaian', function() {
    var data = $(this).data('pemakaian');

    modaldetail.find(".id").html(": " + data.id_detail_penggunaan_gudang);
    modaldetail.find(".tanggal").html(": " + data.tanggal);
    modaldetail.find(".gudang").html(": " + data.nama_gudang + " (" + data.id_gudang + ")");
    modaldetail.find(".supplier").html(": " + data.nama_supplier + " (" + data.id_supplier + ")");
    modaldetail.find(".jumlah").html(": " + data.jumlah);
    modaldetail.find(".created_at").html(": " + data.created_at);

    if (data.id_karyawan !== null) {
        modaldetail.find(".created_by").html(": " + data.nama_karyawan + " (Karyawan)");
    } else {
        modaldetail.find(".created_by").html(": " + data.nama_admin + " (Admin)");
    }

    if (data.udpated_at !== null) {
        modaldetail.find(".udpated_at").html(": " + data.udpated_at);

        if (data.update_by_karyawan !== null) {
            modaldetail.find(".update_by").html(": " + data.update_by_karyawan_nama + " (Karyawan)");
        } else {
            modaldetail.find(".update_by").html(": " + data.update_by_admin_nama + " (Admin)");
        }
    } else {
        modaldetail.find(".udpated_at").html(":");
        modaldetail.find(".update_by").html(":");
    }

    modaldetail.find('.edit-pemakaian').attr('data-pemakaian', JSON.stringify(data));


    modaldetail.modal('show');
});


$(document).on("click", '.del-pemakaian', function() {
    var data = $(this).data('pemakaian');

    var modal = $("#modal-del-pemakaian");

    modal.find('form').find("input[name='id']").val(data.id_detail_penggunaan_gudang);
    modal.find('form').find("span[class='id']").html(data.id_detail_penggunaan_gudang);
    modal.find('form').find("span[class='nama']").html(data.nama);

    modal.modal("show");
});

$(document).ready(function() {
    $("#form-kandang").validate({
        rules: {
            nama: {
                required: true,
                minlength: 1
            },
            jumlah: {
                number: true,
                min: 1,
            }
        },
        messages: {
            nama: {
                required: "Nama tidak boleh kosong",
                minlength: "Minimal karakter adalah 1"
            },
            jumlah: {
                number: "Harus Berupa Angka",
                min: "Minimal jumlah yang dinputkan adalah 1"
            }
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            error.addClass("help-block");

            if (element.prop("type") == "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parent(".form-group").addClass("has-warning").removeClass("has-success");
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parent(".form-group").addClass("has-success").removeClass("has-warning");
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});