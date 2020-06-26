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
        <!--  -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Cari Forum Bisnis</p>
                    <form action="<?= base_url('anggota/ForumBisnis/cariForumBisnis'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" class="form-control" name="namaBisnis" placeholder="Temukan nama bisnis anda disini.">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <a href="<?= base_url('anggota/ForumBisnis'); ?>" class="btn btn-primary">Reset Pencarian</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--  -->
    </div>

    <?php if ($forumBisnis == NULL) : ?>

        <div class="row">
            <div class="col-md-12">
                <!-- <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 style="float: left; margin-top: 7px; margin-right:8px">Anda belum memiliki forum bisnis</h4>
                        <a class="btn btn-success" href="<?= base_url('anggota/ForumBisnis/tambahCalonForbis'); ?>">
                            <i class="fa fa-plus-circle"></i>
                            <span>Tambah Forum Bisnis Sekarang</span>
                        </a>
                    </div>
                </div> -->
                <h2 class="text-center" style="margin-top: 10px;">Ups . . . ! Berita tidak ditemukan</h2>
            </div>
        </div>

    <?php else : ?>

        <div class="row">
            <?php foreach ($forumBisnis as $A) { ?>
                <?php if ($A->nama_bisnis_usaha !== null) : ?>
                    <div class="col-md-4    ">
                        <!-- CONTACT ITEM -->
                        <div class="panel panel-default">
                            <div class="panel-body profile">
                                <div class="profile-image">
                                    <?php if ($A->nama_foto_bisnis == NULL) { ?>
                                        <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('uploads/logo-bisnis/' . $A->nama_foto_bisnis); ?> " alt="<?= $A->nama_bisnis_usaha; ?>" title="<?= $A->nama_bisnis_usaha; ?>">
                                    <?php } ?>
                                </div>
                                <div class="profile-data">
                                    <div class="profile-data-name"><?= $A->nama_bisnis_usaha; ?></div>
                                </div>

                                <div class="profile-controls">
                                    <a class="profile-control-left btn-ubah-forbis" title="Ubah" id="<?= $A->id_forbis; ?>" data-toggle="modal" data-target="#ubahForbis"><span class="fa fa-edit"></span></a>
                                    <a class="profile-control-right btn-hapus-forbis" title="Hapus" id="<?= $A->id_forbis; ?>" data-toggle="modal" data-target="#hapusForbis"><span class="fa fa-trash-o"></span></a>
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


                                </div>
                            </div>
                            <!-- END CONTACT ITEM -->
                        </div>
                    </div>
                <?php endif ?>
            <?php } ?>
        </div>

    <?php endif; ?>

</div>


<!-- MODALS UBAH FORUM BISNIS -->
<div class="modal animated zoomIn" id="ubahForbis" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Ubah Forum Bisnis Anggota</h4>
            </div>
            <form action="<?= base_url('anggota/ForumBisnis/setUpdateForbis'); ?>" class="form-horizontal" id="ubah-forbis-validate" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="idForbisEdit" id="idForbisEdit" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Foto Bisnis / Usaha :</label>
                        <div class="col-sm-3">

                            <input type="text" class="form-control" id="fileLogoEdit" disabled>

                        </div>
                        <div class="col-md-3">
                            <input type="file" name="fileLogoEdit" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <input type="disable" class="form-control" name="namaBisnisEdit" id="namaBisnisEdit" placeholder="Nama Bisnis / Usaha" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Jenis Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <select name="jenisBisnisEdit" id="jenisBisnisEdit" class="validate[required] form-control select" required>
                                <option value="">Pilih Jenis</option>
                                <?php foreach ($jenisBisnis as $jb) { ?>
                                    <option value="<?= $jb->id_jenis_bisnis ?>"><?= $jb->nama_jenis_bisnis ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Deskripsi Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" name="deskripsiBisnisEdit" id="deskripsiBisnisEdit" placeholder="Alamat Bisnis / Usaha" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Alamat Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" name="alamatBisnisEdit" id="alamatBisnisEdit" placeholder="Alamat Bisnis / Usaha" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* No. Telepon :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="noTelpBisnisEdit" id="noTelpBisnisEdit" placeholder="No Telepon Bisnis / Usaha" required />
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="pemilikBisnisEdit" name="pemilikBisnisEdit">

                </div>

                <div class="modal-footer">
                    <div class="col-md-12" style="text-align: left;">
                        <label class="control-label">* harus diisi</label>
                    </div>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL UBAH FORUM BISNIS -->


<!-- MODAL DELETE FORUM BISNIS -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="hapusForbis">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Forum Bisnis</strong>
            </div>
            <form action="<?= base_url('anggota/ForumBisnis/setDeleteForumBisnis'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p style="font-size: 16px;">Anda yakin akan menghapus Forum Bisnis <label class="control-label" id="namaForumBisnisDelete"></label> ?</p>

                        <div class="form-group hidden">
                            <input type="text" id="idForbisDelete" name="idForbisDelete" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Hapus</button>
                        <button type="button" class="btn btn-default btn-lg mb-control-close">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MODAL DELETE FORUM BISNIS -->

<script>
    $("#form-ubah-komunitas-validate").validate();

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

    $(".btn-ubah-forbis").click(function() {
        console.log(this.id);
        var idForbis = this.id;

        $.post("<?= base_url('anggota/ForumBisnis/getForbisById/') ?>", {
                id: idForbis
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idForbisEdit').value = data_obj.forbis[0].id_forbis;
                document.getElementById('namaBisnisEdit').value = data_obj.forbis[0].nama_bisnis_usaha;
                document.getElementById('deskripsiBisnisEdit').value = data_obj.forbis[0].deskripsi_bisnis;
                document.getElementById('alamatBisnisEdit').value = data_obj.forbis[0].alamat_bisnis;
                document.getElementById('noTelpBisnisEdit').value = data_obj.forbis[0].no_telp_bisnis;
                document.getElementById('fileLogoEdit').value = data_obj.forbis[0].nama_foto_bisnis;

                $("#jenisBisnisEdit").val(data_obj.forbis[0].id_jenis_bisnis).change();
                $("#pemilikBisnisEdit").val(data_obj.forbis[0].pemilik_id).change();


            });
    });
</script>