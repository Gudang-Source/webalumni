<!DOCTYPE html>
<html lang="en">
    <head>        
            <title><?= $title; ?></title>            
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            
            <link rel="icon" href="<?= base_url('assets/html/favicon.ico'); ?>" type="image/x-icon" />
            <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/html/css/theme-default.css') ?>"/>
    </head>
    <body>
    
    <div class="container" style="margin-top: 80px;">
    
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li>Komunitas</li>
        <li class="active"><a href="<?= base_url('Komunitas'); ?>">Lihat Komunitas</a></li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="page-title">
        <h2> Lihat Komunitas</h2>
    </div>

    <?= showFlashMessage(); ?>

    <!-- PAGE CONTENT WRAP -->
    <div class="page-content-wrap">

    <!-- SEARCH -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <p>Cari Komunitas</p>
                        <form action="<?= base_url('anggota/Komunitas/cariStatusKomunitas'); ?>" method="post">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="namaKomunitas" placeholder="Komunitas mana yang akan anda cari ?">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-2">
                            <div class="form-group">
                                <a href="<?= base_url('anggota/Komunitas'); ?>" class="btn btn-primary">Reset
                                    Pencarian</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SEARCH -->


    <?php if (empty($komunitas)) : ?>
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center" style="margin-top: 10px;">Komunitas tidak ditemukan</h2>
            </div>
        </div>
    <?php endif; ?>

    <!-- KOMUNITAS CONTENT -->
    <div class="row">
        <?php foreach ($komunitas as $A) { ?>
            <?php if ($A->stat_komunitas == 1) : ?>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <?php if ($A->logo_komunitas == NULL) { ?>
                                    <img src="<?php echo base_url('uploads/content/komunitas/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/content/komunitas/' . $A->logo_komunitas); ?> " alt="<?= $A->nama_komunitas; ?>" title="<?= $A->nama_komunitas; ?>">
                                <?php } ?>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">
                                    <h3 style="color:white;"><?= $A->nama_komunitas; ?><h3>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="contact-info">
                                <h3>Info Singkat :</h3>
                                <div class="panel-body">
                                    <div class="contact-info">
                                        <p><i class="fa fa-eye" aria-hidden="true"></i> <strong> <?= $komunitas[0]->sifat_komunitas ?> </strong><br>
                                                <h5>Semua orang bisa join ke komunitas ini.</h5>
                                            </p>
                                        <p><i class="fa fa-link" aria-hidden="true"></i> <strong>Link Komunitas</strong><br>
                                            <h5><a><?= $A->tautat_komunitas; ?></a></h5>
                                        </p>

                                        <p><i class="fa fa-users" aria-hidden="true"></i> <strong>Anggota</strong><br>
                                            <h5>+- <?= $A->anggota_komunitas ?></h5>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body text-center">
                            <a href="<?=  base_url('Komunitas/detailKomunitas/') .  $A->id_komunitas; ?>  " class="btn btn-primary btn-block" title="Detail komunitas" id="<?= $A->id_komunitas; ?>"><i class="fa fa-eye"></i>Selengkapnya >></a>
                        </div>
                        <!-- END CONTACT ITEM -->
                    </div>
                </div>
            <?php endif ?>
        <?php } ?>
        <!-- KOMUNITAS CONTENT -->
    </div>
</div>
<!-- PAGE CONTENT WRAP -->



<script>
    $("#form-ubah-komunitas-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
</script>
    </body>
</html>