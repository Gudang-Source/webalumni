<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?= base_url('admin'); ?>">Beranda</a></li>
    <li class="active"><a href="<?= base_url('admin/ForumBisnis/kelolaCalonForBis'); ?>">Kelola Calon Forum Bisnis</a>
    </li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Calon Forum Bisnis IKASMA3BDG</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">
    <!-- <div class="row" style="margin-bottom:10px;">
        <div class="col-md-2">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahForbis">
                <i class="fa fa-plus-circle"></i>
                <span>Tambah Forum Bisnis</span>
            </button>
        </div>
    </div> -->

    <div class="row">

        <div class="col-md-12">

            <!-- START PANEL WITH STATIC CONTROLS -->
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <!-- <h3 class="panel-title">Forum Bisnis</h3> -->
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
                                    foreach ($kelolaCalonForBis as $forbis) {
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
                                            <button type="button" class="btn btn-primary mb-control btn-terima"
                                                data-box="#message-box-terima"
                                                id="<?= $forbis->id_forbis; ?>">Terima</button>
                                            <button type="button" class="btn btn-danger mb-control btn-tolak"
                                                data-box="#message-box-tolak"
                                                id="<?= $forbis->id_forbis; ?>">Tolak</button>
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


<!-- MESSAGE BOX ACCEPT CALON ANGGOTA -->
<div class="message-box animated zoomIn" data-sound="alert" id="message-box-terima">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-check"></span> Terima <strong> Sebagai Forum Bisnis baru di IKASMA3BDG </strong>
            </div>
            <form action="<?= base_url('admin/ForumBisnis/aktivasiCalonForBis'); ?>" class="form-horizontal"
                method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Apakah benar bahwa Calon Forum Bisnis di bawah ini akan diaktifkan sebagai Forum Bisnis Aktif
                            di IKASMA3BDG identitas sebagai berikut: </p><br>

                        <div class="form-group hidden">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="idCalonForbis" id="idCalonForbis" />
                                <!-- <input type="text" class="form-control" name="idPengupload" id="idPengupload"> -->
                                <input type="text" class="form-control" name="statForbis" id="statForbis" value="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Calon ForBis : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaCalForBis"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Deskripsi Calon Bisnis : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="deskripsiBis"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-info btn-lg mb-control-yes">Terima</button>
                        <button class="btn btn-default btn-lg mb-control-close">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MESSAGE BOX ACCEPT CALON ANGGOTA -->

<!-- MESSAGE BOX REJECT CALON ANGGOTA -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="message-box-tolak">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Tolak <strong>Calon Forum Bisnis</strong>
            </div>
            <form action="<?= base_url('admin/ForumBisnis/tolakCalonForBis'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Anda yakin akan menolak sebagai Calon Forum Bisnis dengan identitas sebagai
                            berikut :</p>

                        <div class="form-group hidden">
                            <input type="text" class="form-control" name="idCalonForbisTolak" id="idCalonForbisTolak" />
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Calon ForBis : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaCalForBisTolak"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Deskripsi Calon Bisnis : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="deskripsiBisTolak"></label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mb-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Tolak</button>
                        <button class="btn btn-default btn-lg mb-control-close">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MESSAGE BOX REJECT CALON ANGGOTA -->



<script>
$("#tambah-forbis-validate").validate();
$("#ubah-forbis-validate").validate();

$(".btn-terima").click(function() {
    console.log(this.id);
    var idForbis = this.id;

    $.post("<?= base_url('admin/ForumBisnis/getForbisById/') ?>", {
            id: idForbis
        },
        function(data, success) {
            console.log(data);
            var data_obj = JSON.parse(data);

            document.getElementById('idCalonForbis').value = data_obj.forbis[0].id_forbis;
            document.getElementById('namaCalForBis').value = data_obj.forbis[0].nama_bisnis_usaha;
            document.getElementById('namaCalForBis').innerHTML = data_obj.forbis[0].nama_bisnis_usaha;
            document.getElementById('deskripsiBis').value = data_obj.forbis[0].deskripsi_bisnis;
            document.getElementById('deskripsiBis').innerHTML = data_obj.forbis[0].deskripsi_bisnis;


        });
});


$(".btn-tolak").click(function() {
    console.log(this.id);
    var idForbis = this.id;

    $.post("<?= base_url('admin/ForumBisnis/getForbisById/') ?>", {
            id: idForbis
        },
        function(data, success) {
            console.log(data);
            var data_obj = JSON.parse(data);

            document.getElementById('idCalonForbisTolak').value = data_obj.forbis[0].id_forbis;
            document.getElementById('namaCalForBisTolak').value = data_obj.forbis[0].nama_bisnis_usaha;
            document.getElementById('namaCalForBisTolak').innerHTML = data_obj.forbis[0].nama_bisnis_usaha;
            document.getElementById('deskripsiBisTolak').value = data_obj.forbis[0].deskripsi_bisnis;
            document.getElementById('deskripsiBisTolak').innerHTML = data_obj.forbis[0].deskripsi_bisnis;


        });
});
</script>