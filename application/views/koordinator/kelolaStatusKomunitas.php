<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Komunitas</li>
    <li class="active"><a href="<?= base_url('admin/Komunitas/kelolaStatusKomunitas'); ?>">Kelola Status Komunitas</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">                    
    <h2> Kelola Status Komunitas</h2>
</div>

<?= showFlashMessage(); ?>

<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Cari Komunitas</p>
                    <form action="<?= base_url('koordinator/Komunitas/cariStatusKomunitas'); ?>" method="post">
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
                                <a href="<?= base_url('koordinator/Komunitas/kelolaStatusKomunitas'); ?>" class="btn btn-primary">Reset Search</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    <div class="profile-controls">
                        <a class="profile-control-left btn-ubah-anggota" title="Ubah" id="<?= $A->id_komunitas; ?>" data-toggle="modal" data-target="#ubahAnggota"><span class="fa fa-edit"></span></a>
                        <a class="profile-control-right btn-hapus-anggota" title="Hapus" id="<?= $A->id_komunitas; ?>" data-toggle="modal" data-target="#message-box-delete-anggota"><span class="fa fa-trash-o"></span></a>
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


        <!-- MODAL UBAH ANGGOTA -->
        <div class="modal animated zoomIn" id="ubahAnggota" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('koordinator/Komunitas/setUpdateKomunitas'); ?>" class="form-horizontal" id="ubah-anggota-validate" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="defModalHead">Ubah Komunitas</h4>
                        </div>
                            <div>
                                <div class="panel-body tab-content">
                                <div class="form-group hidden">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="idKomunitas" name="idKomunitas" value="<?= $komunitas[0]->id_komunitas ?>" /> 
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Komunitas</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="namaKomunitas" placeholder="Nama Komunitas"
                                      />
                                </div>
                            </div>

                           <div class="form-group">
                                        <label class="col-md-2 control-label">Tautat Komunitas</label>
                                        <div class="col-md-8"  >
                                            <textarea   class="form-control" name="tautatKomunitas"  placeholder="Diskripsi Komunitas berserta linknya" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>

                                <div class="form-group">
                                        <label class="col-md-2 control-label">Logo Komunitas</label>
                                        <div class="col-md-8">
                                            <input type="file" class="file" id="file-simple" name="fileSaya" required />
                                    </div>
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
        <!-- END MODAL UBAH ANGGOTA -->


        <!-- MODAL DELETE ANGGOTA -->
        <div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="message-box-delete-anggota">
                    
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title">
                        <span class="fa fa-times"></span> Hapus <strong>Komunitas</strong>
                    </div>
                    <form action="<?= base_url('koordinator/Komunitas/hapusKomunitas'); ?>" class="form-horizontal" method="post">
                        <div class="mb-content">
                            <div class="panel-body">
                                <p>Anda yakin akan menghapus komunitas dari IKASMA3BDG dengan identitas sebagai berikut :</p>
                                
                                <div class="form-group hidden">
                            <input type="text" id="idKomunitasHapus" name="idKomunitasHapus" class="form-control" value="<?= $komunitas[0]->id_komunitas ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Komunitas : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaAktifKomunitas"></label>
                            </div>
                        </div>

                      <div class="form-group">
                            <label class="col-md-3 control-label">Tautat Komunitas : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="tautatAktifKomunitas"></label>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Pengupload : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="idAktifPengupload"></label>
                            </div>
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
        <!-- END MODAL DELETE ANGGOTA -->

<script>
$("#form-ubah-komunitas-validate").validate();

$("#file-simple").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-danger",
    fileType: "any"
});

$(".btn-hapus-anggota").click(function() {
    console.log(this.id);
    var idKomunitasHapus = this.id;

    $.post("<?= base_url('koordinator/Komunitas/KomunitasJSON/') ?>", {
            id: idKomunitasHapus
        },
        function(data) {
            var data_obj = JSON.parse(data);

            var namaAktifKomunitas = data_obj.komunitas[0].nama_komunitas;
            var tautatAktifKomunitas = data_obj.komunitas[0].tautat_komunitas;
            var idAktifPengupload = data_obj.komunitas[0].id_pengupload;

            document.getElementById('idKomunitasHapus').value = data_obj.komunitas[0].id_komunitas;
            document.getElementById('namaAktifKomunitas').innerHTML = data_obj.komunitas[0].nama_komunitas;
            document.getElementById('tautatAktifKomunitas').innerHTML = data_obj.komunitas[0].tautat_komunitas;
            document.getElementById('idAktifPengupload').innerHTML = data_obj.komunitas[0].id_pengupload;

        });
});

</script>

