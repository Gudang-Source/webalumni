<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title><?= $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?= base_url('assets/html/favicon.ico'); ?>" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/html/css/theme-default.css'); ?>" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>

    <div class="container" style="margin-top: 80px;">
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="<?= base_url('berita'); ?>">Berita</a></li>
            <li class="active"><a href="<?= base_url('berita/baca/') . $berita[0]->id_berita; ?>">Baca Berita</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="page-title">
            <h5>Baca Berita</h5>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="col-md-12">
                            <div class="panel-body" style=" padding: 25px;">

                                <?php if ($berita[0]->judul_berita == "") { ?>
                                    <h2><b>Belum di isi</b></h2>
                                <?php } else { ?>
                                    <h2><b><a class="text-primary" id="bacaBerita" name="bacaBerita" href="<?= base_url('berita/baca/') . $berita[0]->id_berita; ?>"><?= $berita[0]->judul_berita; ?></a></b></h2>
                                <?php } ?>

                                <?php if ($berita[0]->username == "") { ?>
                                    <h2><b>Belum di isi</b></h2>
                                <?php } else { ?>
                                    <p class="text-primary" id="usernamePenulis" name="usernamePenulis"><b>Penulis : </b><?= $berita[0]->username; ?></p>
                                <?php } ?>

                                <?php if ($berita[0]->date_created == "") { ?>
                                    <p><small>Tanggal Dibuat</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small><?= date_format(date_create($berita[0]->date_created), "l, j F Y"); ?> <?= date_format(date_create($berita[0]->time_created), "H:m"); ?> WIB</small></p>
                                <?php } ?>

                            </div>
                            <div class="panel-body" style=" padding: 0 25px 0 25px;">
                                <div class="profile-image">
                                    <?php if ($berita[0]->foto == NULL) { ?>
                                        <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image" style="width: 100%;">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('uploads/content/berita/' . $berita[0]->foto); ?> " alt="<?= $berita[0]->judul_berita; ?>" title="<?= $berita[0]->judul_berita; ?>" style="width: 100%;">
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="panel-body" style=" padding: 25px;">
                                <?php if ($berita[0]->isi_berita == "") { ?>
                                    <h2><b>Belum di isi</b></h2>
                                <?php } else { ?>
                                    <p class="text-primary" id="isiBerita" name="isiBerita"><?= nl2br($berita[0]->isi_berita); ?></p>
                                <?php } ?>
                            </div>

                            <?php if ($berita[0]->credit != "" || $berita[0]->sumber != "") { ?>
                                <div class="panel-body" style=" padding: 25px;">
                                    <p class="text-primary" id="credit" name="credit"><b>Credit : </b><?= $berita[0]->credit; ?></p>
                                    <p class="text-primary" id="sumber" name="sumber"><b>Sumber : </b><?= $berita[0]->sumber; ?></p>
                                </div>
                            <?php } ?>

                            <?php if ($berita[0]->kategori != "") { ?>
                                <div class="panel-body" style=" padding: 0 25px 25px 25px;">
                                    <a class="btn btn-default" href="<?= base_url('berita/kategori/') . $berita[0]->id_kategori; ?>"><?= $berita[0]->kategori; ?></a>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- END CONTACT ITEM -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>