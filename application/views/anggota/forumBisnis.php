<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?= base_url('anggota'); ?>">Beranda</a></li>                    
    <li class="active"><a href="<?= base_url('anggota/Forbis'); ?>">Forum Bisnis</a></li>
</ul>
<!-- END BREADCRUMB -->      

<div class="page-title">                    
    <h2> Kelola Forum Bisnis Anggota</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">
                
    <div class="row">
        <div class="col-md-12">
            <form action="#" class="form-horizontal">

                <div class="panel panel-default">
                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title">Kelola Forum Bisnis IKASMA3BDG</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-cog"></span></a>                                            
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                        </ul>
                    </div>

                    <?php if (!empty($forbis)) { ?>
                        <div class="panel-body">
                            <div class="pull-right">
                                <button class="btn btn-info btn-ubah-forbis" id="<?= $forbis[0]->id_forbis; ?>" data-toggle="modal" data-target="#modal_edit_forbis">
                                    <i class="fa fa-pencil-square"></i>
                                    <span>Ubah</span>
                                </button>
                            </div><br><br>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama Bisnis/Usaha :</label>
                                <div class="col-md-9">
                                    <label class="control-label"><?= $forbis[0]->nama_bisnis_usaha; ?></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Pemilik Bisnis/Usaha :</label>
                                <div class="col-md-9">
                                    <label class="control-label"><?= $forbis[0]->nama_lengkap; ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Jenis Bisnis/Usaha :</label>
                                <div class="col-md-3">
                                    <label class="control-label"><?= $forbis[0]->nama_jenis_bisnis; ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Deskripsi Bisnis/Usaha :</label>
                                <div class="col-md-9">
                                    <!-- <input type="text" class="form-control" value="<?= $forbis[0]->nama_panggilan_alias; ?>" readonly /> -->
                                    <label class="control-label"><?= $forbis[0]->deskripsi_bisnis; ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Alamat Bisnis/Usaha :</label>
                                <div class="col-md-9">
                                    <!-- <input type="text" class="form-control" value="<?= $forbis[0]->tempat_lahir; ?>" readonly /> -->
                                    <label class="control-label"><?= $forbis[0]->alamat; ?></label>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">No. Telepon :</label>
                                <div class="col-md-9">
                                    <!-- <input type="number" class="form-control" value="<?= $forbis[0]->angkatan; ?>" readonly /> -->
                                    <label class="control-label"><?= $forbis[0]->no_telp_bisnis; ?></label>
                                </div>
                            </div>
                            
                        </div>
                    <?php } else { ?>
                        <div class="panel-body">
                            <div style="padding-top: 20px; padding-bottom: 20px;">
                                <h3 class="text-center">Maaf, Anda tidak memiliki Forum Bisnis di IKASMA3BDG!</h3>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_forbis">
                                    <span>Buat Sekarang</span>
                                </button>
                            </div>
                        </div>
                    <?php } ?>

                </div>

            </form>

        </div>
    </div>

</div>

<!-- MODALS TAMBAH FORUM BISNIS -->
<div class="modal animated zoomIn modal-info" id="modal_tambah_forbis" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Tambah Forum Bisnis Anda</h4>
            </div>
            <form action="<?= base_url('anggota/Forbis/setTambahForbis'); ?>" id="tambah-forbis-validate" class="form-horizontal" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">  
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="idAnggotaBisnisModal" value="<?= $info[0]->id_anggota; ?>" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Bisnis/Usaha :</label>  
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaBisnisModal" placeholder="Nama Bisnis / Usaha" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Jenis Bisnis/Usaha :</label>
                        <div class="col-md-9">
                            <select name="jenisBisnisModal" class="select form-control">
                                <option value="">Pilih jenis Bisnis</option>
                                <?php foreach ($jenisBisnis as $jb) { ?>
                                    <option value="<?= $jb->id_jenis_bisnis ?>"><?= $jb->nama_jenis_bisnis; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Deskripsi Bisnis/Usaha :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" name="deskripsiBisnisModal" placeholder="Deskripsi Bisnis / Usaha" required ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Alamat Lengkap :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" name="alamatBisnisModal" placeholder="Alamat Tempat Bisnis / Usaha" required ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">No. Telepon :</label>
                        <div class="col-md-9">
                            <input type="text" name="noTelpBisnisModal" class="form-control" placeholder="No. Telepon Tempat Bisnis / Usaha" required >
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <label class="control-label pull-left">* harus diisi</label><br>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL TAMBAH FORUM BISNIS -->

<!-- MODALS EDIT FORUM BISNIS -->
<div class="modal animated zoomIn modal-info" id="modal_edit_forbis" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Ubah Forum Bisnis Anda</h4>
            </div>
            <form action="<?= base_url('anggota/Forbis/setEditForbis'); ?>" id="ubah-forbis-validate" class="form-horizontal" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">  
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="idForbisEdit" id="idForbisEdit" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Bisnis/Usaha :</label>  
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaBisnisEdit" id="namaBisnisEdit" placeholder="Nama Bisnis / Usaha" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Jenis Bisnis/Usaha :</label>
                        <div class="col-md-9">
                            <select name="jenisBisnisEdit" id="jenisBisnisEdit" class="select form-control">
                                <option value="">Pilih jenis Bisnis</option>
                                <?php foreach ($jenisBisnis as $jb) { ?>
                                    <option value="<?= $jb->id_jenis_bisnis ?>"><?= $jb->nama_jenis_bisnis; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Deskripsi Bisnis/Usaha :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" name="deskripsiBisnisEdit" id="deskripsiBisnisEdit" placeholder="Deskripsi Bisnis / Usaha" required ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Alamat Lengkap :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" name="alamatBisnisEdit" id="alamatBisnisEdit" placeholder="Alamat Tempat Bisnis / Usaha" required ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">No. Telepon :</label>
                        <div class="col-md-9">
                            <input type="text" name="noTelpBisnisEdit" id="noTelpBisnisEdit" class="form-control" placeholder="No. Telepon Tempat Bisnis / Usaha" required >
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <label class="control-label pull-left">* harus diisi</label><br>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL EDIT FORUM BISNIS -->

<script>
    $("#tambah-forbis-validate").validate();
    $("#ubah-forbis-validate").validate();

    $(".btn-ubah-forbis").click(function() {
        console.log(this.id);
        var idForbis = this.id;

        $.post("<?= base_url('anggota/Forbis/getForbisById/') ?>",
        {
            id: idForbis
        },
        function(data, success) {
            console.log(data);

            var data_obj = JSON.parse(data);

            document.getElementById('idForbisEdit').value = data_obj.forbis[0].id_forbis;
            document.getElementById('namaBisnisEdit').value = data_obj.forbis[0].nama_bisnis_usaha;
            document.getElementById('deskripsiBisnisEdit').value = data_obj.forbis[0].deskripsi_bisnis;
            document.getElementById('alamatBisnisEdit').value = data_obj.forbis[0].alamat;
            document.getElementById('noTelpBisnisEdit').value = data_obj.forbis[0].no_telp_bisnis;
            
            $("#jenisBisnisEdit").val(data_obj.forbis[0].id_jenis_bisnis).change();

        });
    });
</script>