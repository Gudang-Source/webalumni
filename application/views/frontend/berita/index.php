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
            <li class="active"><a href="<?= base_url('berita'); ?>">Berita</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="page-title">
            <h5>Berita</h5>
        </div>

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Cari Berita</p>
                        <form action="<?= base_url('berita/cariBerita'); ?>" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="judulBerita" placeholder="Berita mana yang akan anda cari ?">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <a href="<?= base_url('berita'); ?>" class="btn btn-primary">Reset Pencarian</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($title != 'Berita') : ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $kategori; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <?php foreach ($daftarBerita as $B) : ?>
                        <?php if ($daftarBerita) : ?>
                            <?php if ($B->stat_berita == 1) : ?>
                                <!-- CONTACT ITEM -->
                                <a href="<?= base_url('berita/baca/') . $B->id_berita; ?>">
                                    <div class="panel panel-default" style="padding: 15px;">
                                        <div class="col-md-4">
                                            <div class="panel-body">
                                                <div class="profile-image" style="width: 200px; height: 150px; overflow: hidden;">
                                                    <?php if ($B->foto == NULL) { ?>
                                                        <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image" style="width: 100%;">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url('uploads/content/berita/' . $B->foto); ?> " alt="<?= $B->judul_berita; ?>" title="<?= $B->judul_berita; ?>" style="height: 100%;">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body" style="transform: translate(0, 50%);">

                                                <?php if ($B->judul_berita == "") { ?>
                                                    <h2><b>Belum di isi</b></h2>
                                                <?php } else { ?>
                                                    <h3 class="text-primary" id="bacaBerita" name="bacaBerita"><b><?= $B->judul_berita; ?></b></h3>
                                                    <!-- <h3><b><a class="text-primary" id="bacaBerita" name="bacaBerita" href="<?= base_url('berita/baca/') . $B->id_berita; ?>"><?= $B->judul_berita; ?></a></b></h3> -->
                                                <?php } ?>

                                                <?php if ($B->date_created == "") { ?>
                                                    <p><small>Tanggal Dibuat</small><br>Belum di isi</p>
                                                <?php } else { ?>
                                                    <p class="text-primary"><small><b class="text-info" style="margin-right: 10px;">Berita </b><?= date_format(date_create($B->date_created), "l, j F Y"); ?> <?= date_format(date_create($B->time_created), "H:m"); ?> WIB</small></p>
                                                    <!-- <p><small><b class="text-info" style="margin-right: 10px;">Berita </b><?= date_format(date_create($B->date_created), "l, j F Y"); ?> <?= date_format(date_create($B->time_created), "H:m"); ?> WIB</small></p> -->
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <!-- END CONTACT ITEM -->
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php else : ?>
                            <p>Data tidak ditemukan!</p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="panel panel-default" style="padding: 15px;">
                        <div class="col-md-12">
                            <div class="panel-body">
                                <h3><b><?= $this->pagination->create_links(); ?></b></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>