<?php if(isset($flashdata['update_success'])){?>
<div class="col-lg-12 m-b-25">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Sukses!</strong>
        <?= $flashdata['update_success']?>
    </div>
</div>
<?php }?>

<?php if(isset($flashdata['update_failed'])){?>
<div class="col-lg-12 m-b-25">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Gagal!</strong>
        <?= $flashdata['update_success']?>
    </div>
</div>
<?php }?>

<?php if(isset($flashdata['insert_success'])){?>
<div class="col-lg-12 m-b-25">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Sukses!</strong>
        <?= $flashdata['insert_success']?>
    </div>
</div>
<?php }?>

<?php if(isset($flashdata['insert_failed'])){?>
<div class="col-lg-12 m-b-25">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Gagal!</strong>
        <?= $flashdata['insert_failed']?>
    </div>
</div>
<?php }?>

<?php if(isset($flashdata['delete_success'])){?>
<div class="col-lg-12 m-b-25">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Sukses!</strong>
        <?= $flashdata['delete_success']?>
    </div>
</div>
<?php }?>

<?php if(isset($flashdata['delete_failed'])){?>
<div class="col-lg-12 m-b-25">
    <div class="alert alert-failed alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Failed!</strong>
        <?= $flashdata['delete_failed']?>
    </div>
</div>
<?php }?>