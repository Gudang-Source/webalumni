<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Komunitas</li>
    <li class="active"><a href="<?= base_url('anggota/Komunitas/tambahKomunitas'); ?>">Tambah Komunitas</li></a>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Tambah Komunitas</h2>
</div>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Permohonan Calon Komunitas</a>
                </ul>

                <div class="panel-body tab-content">

                    <div class="tab-pane active" id="tab-first">
                        <p>Daftar Permohonan Calon Komunitas IKASMA3BDG.</p>
                
                        <div class="form-group">
                            <form action="<?= base_url('anggota/Komunitas/tambahCalonKomunitas'); ?>" class="form-horizontal"
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



<script>

$("#file-simple").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-danger",
    fileType: "any"
});

</script>

