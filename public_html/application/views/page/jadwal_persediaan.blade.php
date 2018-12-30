@extends("_part.layout",  $head)

@section("css")
<link href="<?php echo base_url() ?>bower_components/bootstrap-calendar/css/calendar.min.css" rel="stylesheet">
@endsection

@section("content")
<div class="row">
    <h3 class="title-5 m-b-25">Jadwal Persediaan</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@section("modal")

<div class="modal fade" id="events-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url("jadwalpersediaan/setJadwalSelesai") ?>" method="post">
                <div class="modal-header">
                    <h3 class="modal-title">Event</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Aktifitas</label>
                        <input type="text" class="form-control aktivitas" disabled="true">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control date" disabled="true">
                    </div>
                    <div class="form-group">
                        <label>Kandang</label>
                        <input type="text" class="form-control kandang" disabled="true">
                    </div>
                    <div class="form-group">
                        <label>Persediaan</label>
                        <input type="text" class="form-control persediaan" disabled="true">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control keterangan" disabled="true">
                    </div>
                    <div class="form-group">
                        <label>Cara Pemakaian</label>
                        <input type="text" class="form-control cara_pemakaian" disabled="true">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="0">
                    </div>
                    <div class="alert alert-danger panel-warning">
                        Stok untuk persediaan ini telah habis, lakukan penambahan segera
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_kandang">
                    <input type="hidden" name="id_pembelian">
                    <input type="hidden" name="id_persediaan">
                    <input type="hidden" name="tanggal">
                    <input type="hidden" name="keterangan">
                    <button class="btn btn-success" type="submit">Telah Dilaksanakan</button> 
                    <button type="button" data-dismiss="modal" class="btn btn-danger" >Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript" src="<?php echo base_url() ?>bower_components/underscore/underscore-min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>bower_components/bootstrap-calendar/js/calendar.min.js"></script>

<script type="text/javascript">
    var calendar = $("#calendar").calendar({
        tmpl_path: base_url + "bower_components/bootstrap-calendar/tmpls/",
        modal: "#events-modal",
        modal_type: "ajax",
        view: "month",
        modal_title: function (e) {
            var form = $('#events-modal');

            if (e.class == "event-success") {
                form.find("button[type='submit']").hide();
            } else {
                form.find("button[type='submit']").show();
            }

            form.find('.aktivitas').val(e.title);
            form.find('.date').val(e.date);
            form.find('.kandang').val(e.data.nama_kandang);
            form.find('.persediaan').val(e.data.nama_persediaan);
            form.find('.keterangan').val(e.data.keterangan);
            form.find('.cara_pemakaian').val(e.data.cara_pemakaian);

            form.find("input[name='id_pembelian']").val(e.data.id_pembelian_terbaru);
            form.find("input[name='tanggal']").val(e.date);
            form.find("input[name='id_kandang']").val(e.data.id_kandang);
            form.find("input[name='id_persediaan']").val(e.data.id_persediaan);
            form.find("input[name='jumlah']").val(0);
            form.find("input[name='keterangan']").val(e.data.title);

            if (e.data.jumlah <= 0) {
                form.find(".panel-warning").show();
                form.find("button[type='submit']").hide();
            } else {
                form.find(".panel-warning").hide();
                form.find("button[type='submit']").show();
            }

            form.find("input[name='jumlah']").prop("disabled", e.data.jumlah <= 0);

            console.log((e.data.jumlah > 0));

            return "Events id : " + e.id;
        },
        modal_content: function (e) {
            return e.title;
        },
        events_source: base_url + "rest/jadwal"
    });

    $('.btn-group button[data-calendar-nav]').each(function () {
        var $this = $(this);
        $this.click(function () {
            calendar.navigate($this.data('calendar-nav'));
        });
    });
</script>
@endsection