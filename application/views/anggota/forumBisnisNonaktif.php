<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Forum Bisnis</li>
    <li class="active"><a href="<?= base_url('anggota/ForumBisnis'); ?>">Lihat Forum Bisnis</a></li>
    <li><a href="<?= base_url('anggota/ForumBisnis/forumBisnisNonaktif'); ?>">Forum Bisnis Nonaktif</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2>Forum Bisnis Nonaktif</h2>
</div>

<?= showFlashMessage(); ?>


<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Cari Forum Bisnis</p>
                    <form action="<?= base_url('anggota/ForumBisnis/cariForumBisnisNonAktif'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" class="form-control" name="namaBisnis" placeholder="Temukan forum bisnis anda.">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <a href="<?= base_url('anggota/ForumBisnis/forumBisnisNonaktif'); ?>" class="btn btn-primary">Reset Pencarian</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if ($forumBisnis == NULL) : ?>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center" style="margin-top: 10px;">Ups . . . ! Forum Bisnis anda tidak ditemukan</h2>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <?php foreach ($forumBisnis as $B) { ?>

                <div class="col-md-4">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <?php if ($B->nama_foto_bisnis == NULL) { ?>
                                    <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/logo-bisnis/' . $B->nama_foto_bisnis); ?> " alt="<?= $B->nama_foto_bisnis; ?>" title="<?= $B->nama_bisnis_usaha; ?>">
                                <?php } ?>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= $B->nama_bisnis_usaha; ?></div>
                            </div>
                            <div class="profile-controls">
                                <a class="profile-control-right btn-hapus-forbis" title="Hapus" id="<?= $B->id_forbis; ?>" data-toggle="modal" data-target="#hapusForbis"><span class="fa fa-trash-o"></span></a>
                            </div>
                        </div>
                        <div class="panel-body" style="height: 100%;">
                            <div class="contact-info">

                                <?php if ($B->deskripsi_bisnis == "") { ?>
                                    <p><small>Deskripsi Bisnis</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small>Deskripsi Bisnis</small><br><?= $B->deskripsi_bisnis; ?></p>
                                <?php } ?>

                                <?php if ($B->alamat_bisnis == "") { ?>
                                    <p><small>Alamat Bisnis</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small>Alamat Bisnis</small><br><?= $B->alamat_bisnis; ?></p>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- END CONTACT ITEM -->
                    </div>
                </div>
            <?php } ?>

        </div>
    <?php endif; ?>
</div>

<!-- MODAL DELETE FORUM BISNIS -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="hapusForbis">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Pengajuan Forum Bisnis</strong>
            </div>
            <form action="<?= base_url('anggota/ForumBisnis/setDeleteForumBisnisNonaktif'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p style="font-size: 16px;">Anda yakin akan menghapus pengajuan Forum Bisnis <label class="control-label" id="namaForumBisnisDelete"></label> ?</p>

                        <div class="form-group hidden">
                            <input type="text" id="idForbisDelete" name="idForbisDelete" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Hapus</button>
                        <a href="<?= base_url('anggota/ForumBisnis/forumBisnisNonaktif'); ?>" class="btn btn-default btn-lg">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MODAL DELETE FORUM BISNIS -->



<script>
    $("#form-ubah-berita-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });

    $(".btn-hapus-forbis").click(function() {
        console.log(this.id);
        var idForbis = this.id;

        $.post("<?= base_url('anggota/ForumBisnis/getForbisById/') ?>", {
                id: idForbis
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idForbisDelete').value = data_obj.forbis[0].id_forbis;
                document.getElementById('namaForumBisnisDelete').innerHTML = data_obj.forbis[0]
                    .nama_bisnis_usaha;
            })
    });
</script>