<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Komunitas</li>
    <li class="active"><a href="<?= base_url('admin/Komunitas'); ?>">Kelola Komunitas</li></a>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola calon Komunitas</h2>
</div>


<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Permohonan Calon Komunitas</a>
                    </li>
                    <li><a href="#tab-second" role="tab" data-toggle="tab">Tambah Calon Komunitas</a></li>
                </ul>

                <div class="panel-body tab-content">

                    <div class="tab-pane active" id="tab-first">
                        <p>Daftar Permohonan Calon Komunitas IKASMA3BDG.</p>

                        <div class="form-group">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions datatable">
                                        <thead>
                                            <tr>
                                                <th width="50">No</th>
                                                <th width="100">Logo Komunitas</th>
                                                <th width="100">Nama Komunitas</th>
                                                <th width="1000">Tautan Komunitas</th>
                                                <th width="100">Tanggal Permohonan</th>
                                                <th width="100">Waktu Permohonan</th>
                                                <th width="100">Id Pengupload</th>
                                                <th width="100">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;

                                            foreach ($calonKomunitas as $CA) { ?>
                                            <?php if ($CA->stat_komunitas == 0): ?>
                                            <tr id="trow_1">
                                                <td class="text-center"><?= $no; ?></td>
                                                <?php if ($CA->logo_komunitas == null) { ?>
                                                <td><img src="<?= base_url('uploads/no-image.jpg'); ?>"
                                                        alt="<?= $CA->nama_komunitas; ?>"
                                                        title="<?= $CA->nama_komunitas; ?>" width="80" /></td>
                                                <?php } else { ?>
                                                <td><img src="<?= base_url('uploads/avatars/' . $CA->logo_komunitas); ?>"
                                                        alt="<?= $CA->nama_komunitas; ?>"
                                                        title="<?= $CA->nama_komunitas; ?>" width="80" height="80" /></td>
                                                <?php } ?>

                                                <td><strong><?= $CA->nama_komunitas; ?></strong></td>

                                                <?php if ($CA->tautat_komunitas == null) { ?>
                                                <td>Belum di isi</td>
                                                <?php } else { ?>
                                                <td><?= $CA->tautat_komunitas; ?></td>
                                                <?php } ?>

                                                <!-- <td><span class="label label-success">New</span></td> -->
                                                <?php if ($CA->logo_komunitas == null) { ?>
                                                <td>Belum di isi</td>
                                                <?php } else { ?>
                                                <td><?= $CA->date_created; ?></td>
                                                <?php } ?>

                                                <?php if ($CA->time_created == null) { ?>
                                                <td>Belum di isi</td>
                                                <?php } else { ?>
                                                <td><?= $CA->time_created; ?></td>
                                                <?php } ?>

                                                <?php if ($CA->id_pengupload == null) { ?>
                                                <td>Belum di isi</td>
                                                <?php } else { ?>
                                                <td><?= $CA->id_pengupload; ?></td>
                                                <?php } ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary mb-control btn-terima"
                                                        data-box="#message-box-terima"
                                                        id="<?= $CA->id_komunitas; ?>">Terima</button>
                                                    <button type="button" class="btn btn-danger mb-control btn-tolak"
                                                        data-box="#message-box-tolak"
                                                        id="<?= $CA->id_komunitas; ?>">Tolak</button>
                                                </td>
                                            </tr>
                                                <?php endif ?>
                                            <?php
                                                $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-second">
                        <h5>Tambah Calon Komunitas Baru IKASMA3BDG</h5>

                        <div class="form-group">
                            <form action="<?= base_url('admin/Komunitas/tambahCalonKomunitas'); ?>" class="form-horizontal"
                                id="form-tambah-komunitas-validate" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama Komunitas</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="namaKomunitas"
                                                placeholder="Nama Komunitas Aktif" required clear />
                                            </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="idPengupload" value="<?= $info[0]->id_user?>">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tautat Komunitas</label>
                                        <div class="col-md-8"  >
                                            <textarea   class="form-control" name="tautatKomunitas" placeholder="Diskripsi Komunitas berserta linknya" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tanggal Pengajuan Calon Komunitas</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" id="dp-3" class="form-control datepicker"
                                                    data-date="06-06-2014" data-date-format="dd-mm-yyyy"
                                                    data-date-viewmode="years" name="tglPengajuan"
                                                    placeholder="<?php
                                                    $tanggal = mktime(date('m'), date("d"), date('Y'));
                                                    echo date("d-m-Y", $tanggal)?>" required />
                                                <span class="input-group-addon"><span
                                                        class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Waktu Pengajuan</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="waktuPengajuan"
                                                placeholder="" 
                                                <?php  
                                                date_default_timezone_set("Asia/Jakarta");
                                                $jam = date ("H:i:s");
                                                 
                                                ?> 
                                                value="<?= $jam ?>"/> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Logo Komunitas</label>
                                        <div class="col-md-8">
                                            <input type="file" class="file" id="file-simple" name="fileSaya" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-success pull-right">Simpan</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <label class="text-muted">Catatan : </label>
                                    <ol>
                                        <li>Calon Komunitas Baru harus diverifikasi terlebih dahulu agar terdaftar sebagai
                                            Komunitas aktif.</li>
                                        <li>Setelah di verifikasi, maka  Komunitas baru dapat ditampilkan di halaman user</li>
                                    </ol>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-three">
                        <h5>Tes Upload Gambar</h5>

                        <div class="form-group">

                            <form action="<?= base_url('admin/Anggota/uploadGambar'); ?>" method="post"
                                class="form-horizontal" id="upload-gambar-validate">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama Panggilan / Alias</label>
                                        <div class="col-md-8">
                                            <input type="file" class="form-control" name="file" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-success pull-right">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- MESSAGE BOX ACCEPT CALON ANGGOTA -->
<div class="message-box animated zoomIn" data-sound="alert" id="message-box-terima">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-check"></span> Terima <strong> Sebagai Komunitas baru di IKASMA3BDG </strong>
            </div>
            <form action="<?= base_url('admin/Komunitas/aktivasiCalonKomunitas'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Apakah benar bahwa Komunitas di bawah ini akan diaktifkan sebagai Komunitas Aktif di IKASMA3BDG
                            dan merupakan Media Alumni SMA 3 Bandung dengan identitas sebagai berikut: </p><br>

                        <div class="form-group hidden">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="idKomunitas" id="idKomunitas" />
                                <input type="text" class="form-control" name="idPengupload" id="idPengupload">
                                <input type="text" class="form-control" name="statKomunitas" id="statKomunitas" value="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Komunitas : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaKomun"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tautat Komunitas : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="tautatKomunitas"></label>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal permohonan : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="dateCreated"></label>
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
                <span class="fa fa-times"></span> Tolak <strong>Komunitas</strong>
            </div>
            <form action="<?= base_url('admin/Komunitas/tolakCalonKomunitas'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Anda yakin akan menolak sebagai keanggotaan IKASMA3BDG dengan identitas Calon Anggota sebagai
                            berikut :</p>

                        <div class="form-group hidden">
                            <input type="text" id="idCalonKomunitas" name="idCalonKomunitas" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Komunitas : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaCalonKomunitas"></label>
                            </div>
                        </div>

                      <div class="form-group">
                            <label class="col-md-3 control-label">Tautat Komunitas : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="tautatCalonKomunitas"></label>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Pengupload : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="idCalonPengupload"></label>
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

<script type="text/javascript">
$("#form-tambah-komunitas-validate").validate();

$("#file-simple").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-danger",
    fileType: "any"
});

$(".btn-terima").click(function() {
    console.log(this.id);
    var idKomunitas = this.id;

    $.post("<?= base_url('admin/Komunitas/komunitasJSON/'); ?>", {
            id: idKomunitas
        },
        function(data) {
            var data_obj = JSON.parse(data);

            var namaKomunitas = data_obj.komunitas[0].nama_komunitas;
            var tautatKomunitas = data_obj.komunitas[0].tautat_komunitas;
            // var logoKomunitas = data_obj.komunitas[0].logo_komunitas;
            var dateCreated = data_obj.komunitas[0].date_created;
            // var timeCreated = data_obj.komunitas[0].time_created;
            // var idPengupload = data_obj.komunitas[0].id_pengupload;
            var statKomunitas = data_obj.komunitas[0].stat_komunitas;

            document.getElementById('idKomunitas').value = data_obj.komunitas[0].id_komunitas;
            document.getElementById('namaKomun').innerHTML = namaKomunitas;
            document.getElementById('tautatKomunitas').innerHTML = tautatKomunitas;
            // document.getElementById('idPengupload').innerHTML = idPengupload;
            document.getElementById('dateCreated').innerHTML = dateCreated;

            if (stat_komunitas == null) {
                document.getElementById('statKomunitas').value = 0;
            } else {
                document.getElementById('statKomunitas').value = 1;
            }

        });
});

$(".btn-tolak").click(function() {
    console.log(this.id);
    var idCalonKomunitas = this.id;

    $.post("<?= base_url('admin/Komunitas/KomunitasJSON/') ?>", {
            id: idCalonKomunitas
        },
        function(data) {
            var data_obj = JSON.parse(data);

            var namaCalonKomunitas = data_obj.komunitas[0].nama_komunitas;
            var tautatCalonKomunitas = data_obj.komunitas[0].tautat_komunitas;
            // var logoKomunitas = data_obj.komunitas[0].logo_komunitas;
            // var dateCreated = data_obj.komunitas[0].dateCreated;
            // var timeCreated = data_obj.komunitas[0].time_created;
            var idCalonPengupload = data_obj.komunitas[0].id_pengupload;
            var statKomunitas = data_obj.komunitas[0].stat_komunitas;

            document.getElementById('idCalonKomunitas').value = data_obj.komunitas[0].id_komunitas;
            document.getElementById('namaCalonKomunitas').innerHTML = data_obj.komunitas[0].nama_komunitas;
            document.getElementById('tautatCalonKomunitas').innerHTML = tautatCalonKomunitas;
            document.getElementById('idCalonPengupload').innerHTML = idCalonPengupload;

             if (stat_komunitas == null) {
                document.getElementById('statKomunitas').value = 0;
            } else {
                document.getElementById('statKomunitas').value = 1;
            }
        });
});
</script>