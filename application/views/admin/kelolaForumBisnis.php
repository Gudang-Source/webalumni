<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?= base_url('admin'); ?>">Beranda</a></li>
    <li class="active"><a href="<?= base_url('admin/ForumBisnis'); ?>">Kelola Forum Bisnis</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Forum Bisnis IKASMA3BDG</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-2">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahForbis">
                <i class="fa fa-plus-circle"></i>
                <span>Tambah Forum Bisnis</span>
            </button>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <!-- START PANEL WITH STATIC CONTROLS -->
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Forum Bisnis</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span
                                    class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        Collapse</a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>

                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-actions datatable">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th width="100">Logo Bisnis / Usaha</th>
                                        <th width="100">Nama Bisnis / Usaha</th>
                                        <th width="100">Pemilik</th>
                                        <th width="100">Angkatan</th>
                                        <th width="100">Alamat Bisnis / Usaha</th>
                                        <th width="100">Jenis Bisnis</th>
                                        <th width="100">No. Telepon</th>
                                        <th width="100">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($forumBisnis as $forbis) {
                                        ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <!-- <td><strong><?= $forbis->nama_foto_bisnis; ?></strong></td> -->

                                        <?php if ($forbis->nama_foto_bisnis == null) { ?>
                                        <td><img src="<?= base_url('uploads/no-image.jpg'); ?>"
                                                alt="<?= $forbis->nama_foto_bisnis; ?>"
                                                title="<?= $forbis->nama_foto_bisnis; ?>" width="80" /></td>
                                        <?php } else { ?>
                                        <td><img src="<?= base_url('uploads/logo-bisnis/' . $forbis->nama_foto_bisnis); ?>"
                                                alt="<?= $forbis->nama_foto_bisnis; ?>"
                                                title="<?= $forbis->nama_foto_bisnis; ?>" width="80" height="80" /></td>
                                        <?php } ?>

                                        <td><strong><?= $forbis->nama_bisnis_usaha; ?></strong></td>
                                        <td><?= $forbis->nama_lengkap; ?></td>
                                        <td><?= $forbis->angkatan; ?></td>
                                        <td><?= $forbis->alamat_bisnis; ?></td>
                                        <td><?= $forbis->nama_jenis_bisnis; ?></td>
                                        <td><?= $forbis->no_telp_bisnis; ?></td>
                                        <td>
                                            <button class="btn btn-info btn-rounded btn-ubah-forbis"
                                                id="<?= $forbis->id_forbis; ?>" title="Ubah" data-toggle="modal"
                                                data-target="#ubahForbis"><i class="fa fa-pencil"></i></button>

                                            <button class="btn btn-danger btn-rounded btn-hapus-forbis"
                                                id="<?= $forbis->id_forbis; ?>" title="Hapus" data-toggle="modal"
                                                data-target="#hapusForbis"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">

                </div>
            </div>
            <!-- END PANEL WITH STATIC CONTROLS -->

        </div>

    </div>
    <!-- END ROW -->

</div>
<!-- END PAGE CONTENT WRAP -->

<!-- MODALS TAMBAH FORUM BISNIS -->
<div class="modal animated zoomIn" id="tambahForbis" tabindex="-1" role="dialog" aria-labelledby="defModalHead"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Tambah Forum Bisnis Anggota</h4>
            </div>
            <form action="<?= base_url('admin/ForumBisnis/setAddForbis'); ?>" class="form-horizontal"
                id="tambah-forbis-validate" method="post" enctype="multipart/form-data">
                <div class="modal-body">


                    <div class="form-group">
                        <label class="col-md-3 control-label">* Foto Bisnis / Usaha :</label>
                        <div class="col-md-8">
                            <input type="file" id="file-simple" name="fileLogo" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaBisnisUsahaModal"
                                placeholder="Nama Bisnis / Usaha" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Jenis Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <select name="jenisBisnisUsahaModal" class="validate[required] form-control select"
                                required>
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
                            <textarea rows="5" class="form-control" name="deskripsiBisnisUsahaModal"
                                placeholder="Deskripsi Singkat Bisnis / Usaha" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Alamat Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" name="alamatBisnisUsahaModal"
                                placeholder="Alamat Bisnis / Usaha" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* No. Telepon :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="noTelpBisnisUsahaModal"
                                placeholder="No Telepon Bisnis / Usaha" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Pemilik :</label>
                        <div class="col-md-9">
                            <select name="pemilikBisnisUsahaModal" class="validate[required] form-control select">
                                <option value="">Pilih Pemilik</option>
                                <?php foreach ($pemilikForbis as $pf) { ?>
                                <option value="<?= $pf->id_anggota ?>"><?= $pf->nama_lengkap; ?></option>
                                <?php } ?>
                            </select>
                        </div>
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
<!-- END MODAL TAMBAH FORUM BISNIS -->

<!-- MODALS UBAH FORUM BISNIS -->
<div class="modal animated zoomIn" id="ubahForbis" tabindex="-1" role="dialog" aria-labelledby="defModalHead"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Ubah Forum Bisnis Anggota</h4>
            </div>
            <form action="<?= base_url('admin/ForumBisnis/setUpdateForbis'); ?>" class="form-horizontal"
                id="ubah-forbis-validate" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="idForbisEdit" id="idForbisEdit" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaBisnisEdit" id="namaBisnisEdit"
                                placeholder="Nama Bisnis / Usaha" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Jenis Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <select name="jenisBisnisEdit" id="jenisBisnisEdit"
                                class="validate[required] form-control select" required>
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
                            <textarea rows="5" class="form-control" name="deskripsiBisnisEdit" id="deskripsiBisnisEdit"
                                placeholder="Alamat Bisnis / Usaha" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Alamat Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" name="alamatBisnisEdit" id="alamatBisnisEdit"
                                placeholder="Alamat Bisnis / Usaha" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* No. Telepon :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="noTelpBisnisEdit" id="noTelpBisnisEdit"
                                placeholder="No Telepon Bisnis / Usaha" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Pemilik :</label>
                        <div class="col-md-9">
                            <select name="pemilikBisnisEdit" id="pemilikBisnisEdit"
                                class="validate[required] form-control select">
                                <option value="">Pilih Pemilik</option>
                                <?php foreach ($pemilikForbis as $pf) { ?>
                                <option value="<?= $pf->id_anggota; ?>"><?= $pf->nama_lengkap; ?></option>
                                <?php } ?>
                            </select>
                        </div>
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
<!-- END MODAL UBAH FORUM BISNIS -->


<!-- MODAL DELETE FORUM BISNIS -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="hapusForbis">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Forum Bisnis</strong>
            </div>
            <form action="<?= base_url('admin/ForumBisnis/setDeleteForumBisnis'); ?>" class="form-horizontal"
                method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p style="font-size: 16px;">Anda yakin akan menghapus Forum Bisnis <label class="control-label"
                                id="namaForumBisnisDelete"></label> ?</p>

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
$("#tambah-forbis-validate").validate();
$("#ubah-forbis-validate").validate();

$(".btn-ubah-forbis").click(function() {
    console.log(this.id);
    var idForbis = this.id;

    $.post("<?= base_url('admin/ForumBisnis/getForbisById/') ?>", {
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

            $("#jenisBisnisEdit").val(data_obj.forbis[0].id_jenis_bisnis).change();
            $("#pemilikBisnisEdit").val(data_obj.forbis[0].pemilik_id).change();


        });
});


$(".btn-hapus-forbis").click(function() {
    console.log(this.id);
    var idForbis = this.id;

    $.post("<?= base_url('admin/ForumBisnis/getForbisById/') ?>", {
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