<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li class="active"><a href="<?= base_url('alumni'); ?>">Beranda</a></li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-title">
    <h2> Beranda</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal">

                <div class="panel panel-default tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab-data-diri" role="tab" data-toggle="tab">Data Diri</a></li>
                        <li><a href="#tab-domisili" role="tab" data-toggle="tab">Domisili</a></li>
                        <li><a href="#tab-profesi" role="tab" data-toggle="tab">Profesi</a></li>
                        <li><a href="#tab-info-program" role="tab" data-toggle="tab">Info Program</a></li>
                        <li><a href="#tab-keanggotaan" role="tab" data-toggle="tab">Keanggotaan</a></li>
                    </ul>

                    <div class="panel-body tab-content">

                        <!-- TAB 1 -->
                        <div class="tab-pane active" id="tab-data-diri">
                            <div class="pull-right">
                                <button type="button" class="btn btn-info btn-data-diri" data-toggle="modal"
                                    data-target="#modal_data_diri" id="<?= $info[0]->id_anggota; ?>">
                                    <span>
                                        <i class="fa fa-pencil"></i> Ubah
                                    </span>
                                </button>
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Lengkap :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="namaLengkap" value="<?= $info[0]->nama_lengkap; ?>" readonly /> -->
                                        <label class="control-label"><?= $info[0]->nama_lengkap; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin :</label>
                                    <div class="col-md-3">
                                        <!-- <input type="text" id="jenisKelamin" readonly /> -->
                                        <?php if ($info[0]->jenis_kelamin == 1) { ?>
                                        <label class="control-label">Laki-Laki</label>
                                        <?php } else if ($info[0]->jenis_kelamin == 2) { ?>
                                        <label class="control-label">Perempuan</label>
                                        <?php } else { ?>
                                        <label class="control-label">Belum diisi</label>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Panggilan / alias :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="panggilanAlias" readonly /> -->
                                        <label class="control-label"><?= $info[0]->nama_panggilan_alias;; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tempat, Tanggal Lahir:</label>
                                    <div class="col-md-6">
                                        <!-- <input type="text" class="form-control" id="tempatLahir" readonly /> -->
                                        <label class="control-label"><?= $info[0]->tempat_lahir; ?>, </label>
                                        <label class="control-label"><?= $info[0]->tanggal_lahir; ?></label>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <input type="text" class="form-control" id="tanggalLahir" readonly />
                                    </div> -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Angkatan :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="number" id="angkatan" class="form-control" readonly /> -->
                                        <label class="control-label"><?= $info[0]->angkatan; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Golongan Darah :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="golonganDarah" readonly /> -->
                                        <label class="control-label"><?= $info[0]->golongan_darah; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Telepon / Telp. Alternatif :</label>
                                    <div class="col-md-2">
                                        <!-- <input type="text" class="form-control" id="telepon" readonly> -->
                                        <label class="control-label"><?= $info[0]->no_telp; ?></label>
                                        <b> / </b>
                                        <label class="control-label"><?= $info[0]->no_telp_alternatif; ?></label>
                                    </div>
                                    <!-- <div class="col-md-2"> -->
                                    <!-- <input type="text" class="form-control" id="teleponAlternatif" readonly> -->
                                    <!-- </div> -->
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">NIK :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="number" class="form-control" id="nik" readonly /> -->
                                        <label class="control-label"><?= $info[0]->NIK; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="email" id="email" class="form-control" readonly /> -->
                                        <label class="control-label"><?= $info[0]->email; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2 -->
                        <div class="tab-pane" id="tab-domisili">
                            <div class="pull-right">
                                <button type="button" class="btn btn-info btn-domisili" data-toggle="modal"
                                    data-target="#modal_domisili" id="<?= $info[0]->id_anggota; ?>">
                                    <span>
                                        <i class="fa fa-pencil"></i> Ubah
                                    </span>
                                </button>
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Negara :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="negara" readonly /> -->
                                        <label class="control-label"><?= $info[0]->negara; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Provinsi :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="provinsi" readonly /> -->
                                        <label class="control-label"><?= $info[0]->provinsi; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kabupaten / Kota :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="kabupatenKota" readonly /> -->
                                        <label class="control-label"><?= $info[0]->kabupaten_kota; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat Lengkap :</label>
                                    <div class="col-md-9">
                                        <!-- <textarea rows="5" class="form-control" id="alamatLengkap" readonly></textarea> -->
                                        <label class="control-label"><?= $info[0]->alamat; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3 -->
                        <div class="tab-pane" id="tab-profesi">
                            <div class="pull-right">
                                <button type="button" class="btn btn-info btn-profesi" data-toggle="modal"
                                    data-target="#modal_profesi" id="<?= $info[0]->id_anggota; ?>">
                                    <span>
                                        <i class="fa fa-pencil"></i> Ubah
                                    </span>
                                </button>
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Pendidikan Terakhir :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="pendidikanTerakhir" readonly /> -->
                                        <label class="control-label"><?= $info[0]->pendidikan_terakhir; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Status Bekerja :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="statusBekerja" readonly /> -->
                                        <?php if ($info[0]->status_bekerja == 0) : ?>
                                        <label class="control-label">Tidak Bekerja</label>
                                        <?php else : ?>
                                        <label class="control-label">Bekerja</label>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Industri :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" id="bidangIndustri" class="form-control" readonly /> -->
                                        <label class="control-label"><?= $info[0]->bidang_industri; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jabatan :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="jabatan" readonly /> -->
                                        <label class="control-label"><?= $info[0]->jabatan; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Perusahaan :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="namaPerusahaan" readonly /> -->
                                        <label class="control-label"><?= $info[0]->nama_perusahaan; ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bisnis / Usaha :</label>
                                    <div class="col-md-9">
                                        <!-- <input type="text" class="form-control" id="bisnisUsaha" readonly /> -->
                                        <?php if ($info[0]->bisnis_usaha == 0) : ?>
                                        <label class="control-label">Tidak</label>
                                        <?php else : ?>
                                        <label class="control-label">Ya</label>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 4 -->
                        <div class="tab-pane" id="tab-info-program">
                            <div class="pull-right">
                                <button type="button" class="btn btn-info btn-info-program" data-toggle="modal"
                                    data-target="#modal_info_program" id="<?= $info[0]->id_anggota; ?>">
                                    <span>
                                        <i class="fa fa-pencil"></i> Ubah
                                    </span>
                                </button>
                            </div>

                            <div class="panel-body">

                                <?php if ($info[0]->sosial_pendidikan == 1) : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" checked="checked" id="infoProgram1"
                                                class="icheckbox" /> Sosial Pendidikan</label>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" id="infoProgram1"
                                                class="icheckbox" /> Sosial Pendidikan</label>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($info[0]->sosial_kemanusiaan == 1) : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" checked="checked" id="infoProgram2"
                                                class="icheckbox" /> Sosial
                                            Kemanusiaan</label>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" id="infoProgram2"
                                                class="icheckbox" /> Sosial Kemanusiaan</label>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($info[0]->pengembangan_sarana_prasarana == 1) : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" checked="checked" id="infoProgram3"
                                                class="icheckbox" /> Pengembangan Sarana Prasarana</label>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" id="infoProgram3"
                                                class="icheckbox" /> Pengembangan Sarana Prasarana</label>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($info[0]->silaturahim_kebersamaan == 1) : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" checked="checked" id="infoProgram4"
                                                class="icheckbox" /> Silaturahim Kebersamaan</label>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" id="infoProgram4"
                                                class="icheckbox" /> Silaturahim Kebersamaan</label>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <?php if ($info[0]->penawaran_sponsorship_donasi == 1) : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" checked="checked" id="infoProgram5"
                                                class="icheckbox" /> Penawaran Sponsorship &amp; Donasi</label>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" id="infoProgram5"
                                                class="icheckbox" /> Penawaran Sponsorship &amp; Donasi</label>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>

                        <!-- TAB 5 -->
                        <div class="tab-pane" id="tab-keanggotaan">
                            <div class="pull-right">
                                <button type="button" class="btn btn-info btn-keanggotaan" data-toggle="modal"
                                    data-target="#modal_keanggotaan" id="<?= $info[0]->id_anggota; ?>">
                                    <span>
                                        <i class="fa fa-pencil"></i> Ubah
                                    </span>
                                </button>
                            </div>

                            <div class="panel-body">
                                <?php if ($info[0]->support == 1) : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" class="icheckbox" checked="checked"
                                                id="keanggotaan1" /> Support</label>
                                    </div>
                                    <div class="col-md-9">
                                        <p>Iuran Pendaftaran sebesar Rp. 10.000 (sepuluh ribu rupiah) 1x seumur hidup.
                                        </p>
                                        <p>Iuran Wajib Tahunan sebesar Rp. 25.000 (dua puluh lima ribu rupiah).</p>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" class="icheckbox" id="keanggotaan1"
                                                disabled /> Support</label>
                                    </div>
                                    <div class="col-md-9">
                                        <p>Iuran Pendaftaran sebesar Rp. 10.000 (sepuluh ribu rupiah) 1x seumur hidup.
                                        </p>
                                        <p>Iuran Wajib Tahunan sebesar Rp. 25.000 (dua puluh lima ribu rupiah).</p>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <div class="form-group">
                                    <?php if ($info[0]->loyalist == 1) : ?>
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" class="icheckbox" checked="checked"
                                                id="keanggotaan2" /> Loyalist</label>
                                    </div>
                                    <?php else : ?>
                                    <div class="col-md-5">
                                        <label class="check"><input type="checkbox" class="icheckbox"
                                                id="keanggotaan2" /> Loyalist</label>
                                    </div>
                                    <?php endif; ?>


                                    <div class="col-md-9">
                                        <p>Iuran sukarela sebesar : </p>
                                        <!-- <input type="number" class="form-control" id="iuranSukarela" readonly /> -->
                                        <?php if ($info[0]->iuran_sukarela == NULL || $info[0]->iuran_sukarela == 0) { ?>
                                        <label class="control-label">Rp. 0</label>
                                        <?php } else { ?>
                                        <label class="control-label"><?= $info[0]->iuran_sukarela; ?></label>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>

</div>

<!-- MODALS DATA DIRI -->
<div class="modal animated zoomIn" id="modal_data_diri" tabindex="-1" role="dialog" aria-labelledby="defModalHead"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Data Diri</h4>
            </div>
            <form action="<?= base_url('alumni/Profile/setUpdateDataDiri') ?>" class="form-horizontal"
                id="data-diri-validate" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" name="idAnggotaDataDiri" id="idAnggotaDataDiriModal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Lengkap :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaLengkap" id="namaLengkapModal" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Jenis Kelamin :</label>
                        <div class="col-md-3">
                            <select class="validate[required] select form-control" name="jenisKelamin"
                                id="jenisKelaminModal" required>
                                <option value="">Pilih</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Panggilan / alias :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="panggilanAlias" id="panggilanAliasModal"
                                required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Tempat, Tanggal Lahir:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="tempatLahir" id="tempatLahirModal" required />
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control datepicker" name="tanggalLahir"
                                id="tanggalLahirModal" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Angkatan :</label>
                        <div class="col-md-9">
                            <input type="number" name="angkatan" id="angkatanModal" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Golongan Darah :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="golonganDarah" id="golonganDarahModal"
                                required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Telepon / Telp. Alternatif :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="telepon" id="teleponModal" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="teleponAlternatif"
                                id="teleponAlternatifModal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">* NIK :</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="nik" id="nikModal" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Email :</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="emailModal" class="form-control" required />
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
<!-- END MODAL DATA DIRI -->

<!-- MODALS DOMISILI -->
<div class="modal animated zoomIn modal-info" id="modal_domisili" tabindex="-1" role="dialog"
    aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Domisili</h4>
            </div>
            <form action="<?= base_url('alumni/Profile/setUpdateDomisili') ?>" id="domisili-validate"
                class="form-horizontal" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" name="idAnggotaDomisili" id="idAnggotaDomisiliModal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Negara :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="negaraModal" name="negara" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Provinsi :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="provinsiModal" name="provinsi" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Kabupaten / Kota :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="kabupatenKotaModal" name="kabupatenKota"
                                required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Alamat Lengkap :</label>
                        <div class="col-md-9">
                            <textarea rows="5" class="form-control" id="alamatLengkapModal" name="alamatLengkap"
                                required></textarea>
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
<!-- END MODAL DOMISILI -->

<!-- MODALS PROFESI -->
<div class="modal animated zoomIn" id="modal_profesi" tabindex="-1" role="dialog" aria-labelledby="defModalHead"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Profesi</h4>
            </div>
            <form action="<?= base_url('alumni/Profile/setUpdateProfesi') ?>" id="profesi-validate"
                class="form-horizontal" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" name="idAnggotaProfesi" id="idAnggotaProfesiModal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Pendidikan Terakhir :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="pendidikanTerakhirModal"
                                name="pendidikanTerakhir" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Status Bekerja :</label>
                        <div class="col-md-9">
                            <select class="validate[required] select form-control" name="statusBekerja"
                                id="statusBekerjaModal">
                                <option value="">Pilih</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Bidang Industri :</label>
                        <div class="col-md-9">
                            <input type="text" id="bidangIndustriModal" class="form-control" name="bidangIndustri" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Jabatan :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="jabatanModal" name="jabatan" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Perusahaan :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="namaPerusahaanModal" name="namaPerusahaan" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <select class="validate[required] select form-control" name="bisnisUsaha"
                                id="bisnisUsahaModal">
                                <option value="">Pilih</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
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
<!-- END MODAL PROFESI -->

<!-- MODALS INFO PROGRAM -->
<div class="modal animated zoomIn" id="modal_info_program" tabindex="-1" role="dialog" aria-labelledby="defModalHead"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Info Program</h4>
            </div>
            <form action="<?= base_url('alumni/Profile/setUpdateInfoProgram'); ?>" id="info-program-validate"
                class="form-horizontal" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" name="idAnggotaInfoProgram" id="idAnggotaInfoProgramModal">
                        </div>
                    </div>
                    <?php if ($info[0]->sosial_pendidikan == 1) : ?>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" checked="checked" value="1"
                                    id="infoProgram1Modal" class="icheckbox" name="infoProgram1" /> Sosial
                                Pendidikan</label>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" value="1" id="infoProgram1Modal"
                                    class="icheckbox" name="infoProgram1" /> Sosial Pendidikan</label>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($info[0]->sosial_kemanusiaan == 1) : ?>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" checked="checked" value="1"
                                    id="infoProgram2Modal" class="icheckbox" name="infoProgram2" /> Sosial
                                Kemanusiaan</label>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" value="1" id="infoProgram2Modal"
                                    class="icheckbox" name="infoProgram2" /> Sosial Kemanusiaan</label>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($info[0]->pengembangan_sarana_prasarana == 1) : ?>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" checked="checked" value="1"
                                    id="infoProgram3Modal" class="icheckbox" name="infoProgram3" /> Pengembangan Sarana
                                Prasarana</label>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" value="1" id="infoProgram3Modal"
                                    class="icheckbox" name="infoProgram3" /> Pengembangan Sarana Prasarana</label>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($info[0]->silaturahim_kebersamaan == 1) : ?>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" checked="checked" value="1"
                                    id="infoProgram4Modal" class="icheckbox" name="infoProgram4" /> Silaturahim
                                Kebersamaan</label>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" value="1" id="infoProgram4Modal"
                                    class="icheckbox" name="infoProgram4" /> Silaturahim Kebersamaan</label>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($info[0]->penawaran_sponsorship_donasi == 1) : ?>
                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="check"><input type="checkbox" checked="checked" value="1"
                                    id="infoProgram5Modal" class="icheckbox" name="infoProgram5" /> Penawaran
                                Sponsorship &amp; Donasi</label>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="check"><input type="checkbox" value="1" id="infoProgram5Modal"
                                    class="icheckbox" name="infoProgram5" /> Penawaran Sponsorship &amp; Donasi</label>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL INFO PROGRAM -->

<!-- MODALS KEANGGOTAAN -->
<div class="modal animated zoomIn" id="modal_keanggotaan" tabindex="-1" role="dialog" aria-labelledby="defModalHead"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Keanggotaan</h4>
            </div>
            <form action="<?= base_url('alumni/Profile/setUpdateKeanggotaan'); ?>" id="keanggotaan-validate"
                class="form-horizontal" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" name="idAnggotaKeanggotaan" id="idAnggotaKeanggotaanModal">
                        </div>
                    </div>

                    <?php if ($info[0]->support == 1) : ?>
                    <div class="form-group">
                        <div class="col-md-9">
                            <label class="check"><input type="checkbox" class="icheckbox" value="1" checked="checked"
                                    id="keanggotaan1" name="support" /> Support</label>
                        </div>
                        <div class="col-md-9">
                            <p>Iuran Pendaftaran sebesar Rp. 10.000 (sepuluh ribu rupiah) 1x seumur hidup.</p>
                            <p>Iuran Wajib Tahunan sebesar Rp. 25.000 (dua puluh lima ribu rupiah).</p>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <div class="col-md-9">
                            <label class="check"><input type="checkbox" class="icheckbox" value="1" id="keanggotaan1"
                                    name="support" /> Support</label>
                        </div>
                        <div class="col-md-9">
                            <p>Iuran Pendaftaran sebesar Rp. 10.000 (sepuluh ribu rupiah) 1x seumur hidup.</p>
                            <p>Iuran Wajib Tahunan sebesar Rp. 25.000 (dua puluh lima ribu rupiah).</p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <?php if ($info[0]->loyalist == 1) : ?>
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" class="icheckbox" checked="checked" value="1"
                                    id="keanggotaan2" name="loyalist" /> Loyalist</label>
                        </div>
                        <?php else : ?>
                        <div class="col-md-5">
                            <label class="check"><input type="checkbox" value="1" class="icheckbox" id="keanggotaan2"
                                    name="loyalist" /> Loyalist</label>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-9">
                            <p>Iuran sukarela sebesar : </p>
                            <input type="number" class="form-control" id="iuranSukarelaModal" name="iuranSukarela" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL KEANGGOTAAN -->

<script type="text/javascript">
$("#data-diri-validate").validate();
$("#domisili-validate").validate();
$("#profesi-validate").validate();
$("#info-program-validate").validate();
$("#keanggotaan-validate").validate();

$(".btn-data-diri").click(function() {
    console.log(this.id);
    var idAnggota = this.id;

    $.post("<?= base_url('alumni/Profile/getDataDiriAnggota/') ?>", {
            id: idAnggota
        },
        function(data, sukses) {

            var data_obj = JSON.parse(data);

            document.getElementById('idAnggotaDataDiriModal').value = data_obj.dataDiri[0].id_anggota;
            document.getElementById('namaLengkapModal').value = data_obj.dataDiri[0].nama_lengkap;
            document.getElementById('panggilanAliasModal').value = data_obj.dataDiri[0]
                .nama_panggilan_alias;
            document.getElementById('tempatLahirModal').value = data_obj.dataDiri[0].tempat_lahir;
            document.getElementById('tanggalLahirModal').value = data_obj.dataDiri[0].tanggal_lahir;
            document.getElementById('angkatanModal').value = data_obj.dataDiri[0].angkatan;
            document.getElementById('golonganDarahModal').value = data_obj.dataDiri[0].golongan_darah;
            document.getElementById('teleponModal').value = data_obj.dataDiri[0].no_telp;
            document.getElementById('teleponAlternatifModal').value = data_obj.dataDiri[0]
                .no_telp_alternatif;
            document.getElementById('nikModal').value = data_obj.dataDiri[0].NIK;
            document.getElementById('emailModal').value = data_obj.dataDiri[0].email;

            $("#jenisKelaminModal").val(data_obj.dataDiri[0].jenis_kelamin).change();
        });

});

$(".btn-domisili").click(function() {
    console.log(this.id);
    var idAnggota = this.id;

    $.post("<?= base_url('alumni/Profile/getDomisiliAnggota/') ?>", {
            id: idAnggota
        },
        function(data, sukses) {

            var data_obj = JSON.parse(data);

            document.getElementById('idAnggotaDomisiliModal').value = data_obj.domisili[0].id_anggota;
            document.getElementById('negaraModal').value = data_obj.domisili[0].negara;
            document.getElementById('provinsiModal').value = data_obj.domisili[0].provinsi;
            document.getElementById('kabupatenKotaModal').value = data_obj.domisili[0].kabupaten_kota;
            document.getElementById('alamatLengkapModal').value = data_obj.domisili[0].alamat;

        });

});

$(".btn-profesi").click(function() {
    console.log(this.id);
    var idAnggota = this.id;

    $.post("<?= base_url('alumni/Profile/getProfesiAnggota/') ?>", {
            id: idAnggota
        },
        function(data, sukses) {

            var data_obj = JSON.parse(data);

            document.getElementById('idAnggotaProfesiModal').value = data_obj.profesi[0].id_anggota;
            document.getElementById('pendidikanTerakhirModal').value = data_obj.profesi[0]
                .pendidikan_terakhir;
            document.getElementById('bidangIndustriModal').value = data_obj.profesi[0].bidang_industri;
            document.getElementById('jabatanModal').value = data_obj.profesi[0].jabatan;
            document.getElementById('namaPerusahaanModal').value = data_obj.profesi[0].nama_perusahaan;

            $("#statusBekerjaModal").val(data_obj.profesi[0].status_bekerja).change();
            $("#bisnisUsahaModal").val(data_obj.profesi[0].bisnis_usaha).change();
        });
});

$(".btn-info-program").click(function() {
    var idAnggota = this.id;

    $.get("<?= base_url('alumni/Profile/getInfoProgramAnggota/'); ?>" + idAnggota, function(data) {

        var dataObj = JSON.parse(data);
        console.log(dataObj);

        document.getElementById('idAnggotaInfoProgramModal').value = dataObj.infoProgram[0].id_anggota;

    });
});

$(".btn-keanggotaan").click(function() {

    var idAnggota = this.id;

    $.get("<?= base_url('alumni/Profile/getKeanggotaanAnggota/'); ?>" + idAnggota, function(data) {
        var dataObj = JSON.parse(data);

        document.getElementById('idAnggotaKeanggotaanModal').value = dataObj.keanggotaan[0].id_anggota;
        document.getElementById('iuranSukarelaModal').value = dataObj.keanggotaan[0].iuran_sukarela;
    });

});
</script>