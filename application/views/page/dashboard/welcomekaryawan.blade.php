<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Sistem Peternakan Ayam Boiler</h2>
        </div>
    </div>
</div>
<?php 
/*<div>
    <div class="row">
        <div class="col-lg-10">
            <h2 class="title-1 m-b-25">Jumlah Kandang Dan Ayam</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Kandang</th>
                            <th>Maksimal Jumlah</th>
                            <th>Jumlah Sekarang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jumlah_ayam as $value) { ?>
<tr>
    <td>
        <?= $value->nama_kandang ?>
    </td>
    <td>
        <?= $value->maksimal_jumlah ?>
    </td>
    <td>
        <?= $value->jumlah_ayam ?>
    </td>
    <td>
        <?= $value->keterangan ?>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25">Jadwal Vaksin Bulan ini</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Perihal</th>
                        <th class="text-right">Type Durasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $value) { ?>
                    <tr>
                        <td>
                            <?= $value["date"] ?>
                        </td>
                        <td>
                            <?php
                                    switch ($value["class"]) {
                                        case "event-success":
                                            ?>
                            <span class="dot dot--green"></span>
                            <?php
                                            break;
                                        case "event-info":
                                            ?>
                            <span class="dot dot--blue"></span>
                            <?php
                                            break;
                                        case "event-important":
                                            ?>
                            <span class="dot dot--red"></span>
                            <?php
                                            break;
                                    }
                                    ?>
                        </td>
                        <td>
                            <?= ($value["title"]) ?>
                        </td>
                        <td class="text-right">
                            <?= $value["data"]->type_durasi ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

*/

?>