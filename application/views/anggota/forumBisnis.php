<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Forum Bisnis</li>
    <li class="active"><a href="<?= base_url('anggota/ForumBisnis'); ?>">Lihat Forum Bisnis</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Lihat Forum Bisnis</h2>
</div>

<?= showFlashMessage(); ?>

<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">
    <div class="row">
        <?php foreach ($forumBisnis as $A) { ?>
        <?php if ($A->nama_bisnis_usaha !== null) : ?>
        <div class="col-md-4    ">
            <!-- CONTACT ITEM -->
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="profile-image">
                        <?php if ($A->nama_foto_bisnis == NULL) { ?>
                        <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image"
                            title="Default Image">
                        <?php } else { ?>
                        <img src="<?php echo base_url('uploads/logo-bisnis/' . $A->nama_foto_bisnis); ?> "
                            alt="<?= $A->nama_bisnis_usaha; ?>" title="<?= $A->nama_bisnis_usaha; ?>">
                        <?php } ?>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?= $A->nama_bisnis_usaha; ?></div>

                    </div>
                </div>
                <div class="panel-body" style="height: 200px;">
                    <div class="contact-info">
                        <?php if ($A->deskripsi_bisnis == "") { ?>
                        <p><small>Deskripsi Bisnis</small><br>Belum di isi</p>
                        <?php } else { ?>
                        <p><small>Deskripsi Bisnis</small><br><?= $A->deskripsi_bisnis; ?></p>
                        <?php } ?>

                        <?php if ($A->alamat_bisnis == "") { ?>
                        <p><small>Alamat Bisnis</small><br>Belum di isi</p>
                        <?php } else { ?>
                        <p><small>Alamat Bisnis</small><br><?= $A->alamat_bisnis; ?></p>
                        <?php } ?>

                        <!-- <?php if ($A->id_pengupload == "") { ?>
                                                                                    <p><small>ID Pengupload Komunitas</small><br>Belum di isi</p>
                                                                <?php } else { ?>
                                                                                    <p><small>Pengupload Komunitas</small><br><?= $A->username; ?></p>
                                                                <?php } ?> -->

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