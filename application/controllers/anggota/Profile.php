<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Profile Anggota
 * Created by Lut Dinar Fadila 2018
*/

class Profile extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('M_anggota');
        
        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        }
        
    }
    
    function setUpdateDataDiri() {
        $namaLengkap = $this->input->post('namaLengkap');
        $jenisKelamin = $this->input->post('jenisKelamin');
        $namaPanggilanAlias = $this->input->post('panggilanAlias');
        $tempatLahir = $this->input->post('tempatLahir');
        $tanggalLahir = $this->input->post('tanggalLahir');
        $angkatan = $this->input->post('angkatan');
        $golonganDarah = $this->input->post('golonganDarah');
        $telepon = $this->input->post('telepon');
        $teleponAlternatif = $this->input->post('teleponAlternatif');
        $nik = $this->input->post('nik');
        $email = $this->input->post('email');
        
        $idAnggota = $this->input->post('idAnggota');
        $anggota['nama_lengkap'] = $namaLengkap;
        $anggota['jenis_kelamin'] = $jenisKelamin;
        $anggota['nama_panggilan_alias'] = $namaPanggilanAlias;
        $anggota['tempat_lahir'] = $tempatLahir;
        $anggota['tanggal_lahir'] = $tanggalLahir;
        $anggota['angkatan'] = $angkatan;
        $anggota['golongan_darah'] = $golonganDarah;
        $anggota['no_telp'] = $telepon;
        $anggota['no_telp_alternatif'] = $teleponAlternatif;
        $anggota['NIK'] = $nik;
        $anggota['email'] = $email;
        
        $sukses = $this->M_anggota->updateAnggota($anggota, $idAnggota);
        
        if (!$sukses) {
            flashMessage('success', 'Data diri Anda berhasil diperbarui');
            redirect('anggota/Home');
        } else {
            flashMessage('error', 'Data diri Anda gagal diperbarui! Silahkan coba lagi');
            redirect('anggota/Home');
        }
        
    }

    function setUpdateDomisili() {
        
        $idAnggota = $this->input->post('idAnggotaDomisiliModal');
        $data['negara'] = $this->input->post('negaraModal');
        $data['provinsi'] = $this->input->post('provinsiModal');
        $data['kabupaten_kota'] = $this->input->post('kabupatenKotaModal');
        $data['alamat'] = $this->input->post('alamatLengkapModal');

        $sukses = $this->M_anggota->updateAnggota($data, $idAnggota);

        if (!$sukses) {
            flashMessage('success', 'Domisili Anda berhasil diperbarui');
            redirect('anggota/Home');
        } else {
            flashMessage('error', 'Domisili Anda gagal diperbarui! Silahkan coba lagi.');
            redirect('anggota/Home');
        }

    }

    function setUpdateProfesi()
    {
        $idAnggota = $this->input->post('idAnggotaProfesiModal');
        $data['pendidikan_terakhir'] = $this->input->post('pendidikanTerakhir');
        $data['status_bekerja'] = $this->input->post('statusBekerja');
        $data['bidang_industri'] = $this->input->post('bidangIndustri');
        $data['jabatan'] = $this->input->post('jabatan');
        $data['nama_perusahaan'] = $this->input->post('namaPerusahaan');
        $data['bisnis_usaha'] = $this->input->post('bisnisUsaha');

        $sukses = $this->M_anggota->updateAnggota($data, $idAnggota);

        if (!$sukses) {
            flashMessage('success', 'Profesi Anda berhasil diperbarui');
            redirect('anggota/Home');
        } else {
            flashMessage('error', 'Profesi Anda gagal diperbarui! Silahkan coba lagi.');
            redirect('anggota/Home');
        }
    }
    
}