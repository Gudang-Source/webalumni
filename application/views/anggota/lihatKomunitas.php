<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Komunitas</li>
    <li class="active"><a href="<?= base_url('anggota/Komunitas'); ?>">Lihat Komunitas</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">                    
    <h2> Lihat Komunitas</h2>
</div>

<?= showFlashMessage(); ?>

<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">
<!-- 
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Cari Komunitas</p>
                    <form action="<?= base_url('anggota/Komunitas/cariStatusKomunitas'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" class="form-control" name="namaKomunitas" placeholder="Komunitas mana yang akan anda cari ?">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <a href="<?= base_url('anggota/Komunitas/tambahKomunitas'); ?>" class="btn btn-primary">Reset Search</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <?php foreach ($komunitas as $A) { ?>
            <?php if ($A->stat_komunitas == 1): ?>
        <div class="col-md-4    ">
            <!-- CONTACT ITEM -->
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="profile-image">
                        <?php if ($A->logo_komunitas == NULL) { ?>
                            <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                        <?php } else { ?>
                            <img src="<?php echo base_url('uploads/avatars/'.$A->logo_komunitas); ?> " alt="<?= $A->nama_komunitas; ?>" title="<?= $A->nama_komunitas; ?>">
                        <?php } ?>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?= $A->nama_komunitas; ?></div>
                       
                    </div>
                </div>
                <div class="panel-body" style="height: 200px;">
                    <div class="contact-info">
                        <?php if ($A->tautat_komunitas == "") { ?>
                            <p><small>Tautan Komunitas</small><br>Belum di isi</p>
                        <?php } else { ?>
                            <p><small>Tautan Komunitas</small><br><?= $A->tautat_komunitas; ?></p>
                        <?php } ?>

                        <?php if ($A->date_created == "") { ?>
                            <p><small>Tanggal Dibuat</small><br>Belum di isi</p>
                        <?php } else { ?>
                            <p><small>Tanggal Dibuat</small><br><?= $A->date_created; ?></p>
                        <?php } ?>

                        <?php if ($A->time_created == "") { ?>
                            <p><small>Waktu Dibuat</small><br>Belum di isi</p>
                        <?php } else { ?>
                            <p><small>Waktu Dibuat</small><br><?= $A->time_created; ?></p>
                        <?php } ?>

                         <?php if ($A->id_pengupload == "") { ?>
                            <p><small>ID Pengupload Komunitas</small><br>Belum di isi</p>
                        <?php } else { ?>
                            <p><small>Pengupload Komunitas</small><br><?= $A->username; ?></p>
                        <?php } ?>

                    </div>
                </div>
            <!-- END CONTACT ITEM -->
        </div>
    </div>
        <?php endif ?>
    <?php } ?>
</div>
</div>


<script>
$("#form-ubah-komunitas-validate").validate();

$("#file-simple").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-danger",
    fileType: "any"
});

</script>

