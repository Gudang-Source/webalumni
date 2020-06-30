<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Komunitas Alumni
 * Created by 
 *      Adhy Wiranto Sudjana
 *      Dicky Ardianto
 *      Rafly Yunandi Aliansyah
 * Architecture by 
 *      Lut Dinar Fadila
 * 
 * 2020
*/

class Komunitas extends MY_Controller
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_user');
        $this->load->model('M_komunitas');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        }
    }
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    function index()
    {
        $data['title'] = 'Lihat Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $data['komunitas'] = $this->M_komunitas->getAllKomunitas();

        $this->alumni_render('alumni/lihatKomunitas', $data);
    }

    function komunitasNonaktif()
    {
        $data['title'] = 'Komunitas Nonaktif';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $data['komunitas'] = $this->M_komunitas->getAllKomunitas();

        if ($this->session->userdata('role') == 4) {
            $this->alumni_render('alumni/komunitasNonaktif', $data);
        }
    }

    function kelolaKomunitas()
    {
        $data['title'] = 'Lihat Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $where = "tb_komunitas.stat_komunitas != 0";

        $data['komunitas'] = $this->M_komunitas->getAllKomunitasForSpecificUser($where, $data['info'][0]->user_id);

        if ($this->session->userdata('role') == 4) {
            $this->alumni_render('alumni/kelolaKomunitas', $data);
        }
    }

    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    //
    //
    //    
    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================
    function tambahKomunitas()
    {
        $data['title'] = 'Tambah Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['komunitas'] = $this->M_komunitas->getAllKomunitas();
        $this->alumni_render('alumni/tambahKomunitas', $data);
    }

    public function tambahCalonKomunitas()
    {
        date_default_timezone_set("Asia/Jakarta");
        $jam = date("H:i:s");
        $tanggal = date("Y-m-d", mktime(date('m'), date("d"), date('Y')));

        $this->load->model('M_anggota');

        $sifatKomunitas = $this->input->post('sifatKomunitas');
        $jenisKomunitas = $this->input->post('jenisKomunitas');
        $lokasiKomunitas = $this->input->post('lokasiKomunitas');
        $anggotaKomunitas = $this->input->post('anggotaKomunitas');
        $deskKomunitas = $this->input->post('deskKomunitas');

        $namaKomunitas = $this->input->post('namaKomunitas');
        $tautatKomunitas = $this->input->post('tautatKomunitas');
        $tglPengajuan = $tanggal;
        $waktuPengajuan = $jam;
        $idPengupload = $this->input->post('idPengupload');

        $filename = "komunitas-" . $namaKomunitas . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/content/komunitas/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('alumni/Komunitas');
        } else {
            $upload_data = $this->upload->data();

            $data['sifat_komunitas'] = $sifatKomunitas;
            $data['jenis_komunitas'] = $jenisKomunitas;
            $data['lokasi_komunitas'] = $lokasiKomunitas;
            $data['anggota_komunitas'] = $anggotaKomunitas;
            $data['deskripsi_komunitas'] = $deskKomunitas;

            $data['nama_komunitas'] = $namaKomunitas;
            $data['tautat_komunitas'] = $tautatKomunitas;
            $data['date_created'] = $tglPengajuan;
            $data['time_created'] = $waktuPengajuan;
            $data['logo_komunitas'] = $upload_data['file_name'];
            $data['id_pengupload'] = $idPengupload;
            if ($this->session->userdata('role') == 4) {
                $data['stat_komunitas'] = '0';
            } else {
                $data['stat_komunitas'] = '1';
            }

            // echo json_encode($data);
            $sukses = $this->M_komunitas->insertNewKomunitas($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Komunitas Baru berhasil di daftarkan. Tunggu Verivikasi dari Admin 1x24 jam');
                redirect('alumni/Komunitas');
            } else {
                flashMessage('error', 'Calon Komunitas Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('alumni/Komunitas');
            }
        }
    }
    // ==================================================
    // --------------------- CREATE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    public function setUpdateKomunitas()
    {
        $sifatKomunitas = $this->input->post('sifatKomunitas');
        $jenisKomunitas = $this->input->post('jenisKomunitas');
        $lokasiKomunitas = $this->input->post('lokasiKomunitas');
        $anggotaKomunitas = $this->input->post('anggotaKomunitas');
        $deskKomunitas = $this->input->post('deskKomunitas');

        $idKomunitas = $this->input->post('idKomunitas');
        $namaKomunitas = $this->input->post('namaKomunitas');
        $tautatKomunitas = $this->input->post('tautatKomunitas');

        $filename = "komunitas-" . $namaKomunitas . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        $upload_data = $this->upload->data();

        $komunitas['sifat_komunitas'] = $sifatKomunitas;
        $komunitas['jenis_komunitas'] = $jenisKomunitas;
        $komunitas['lokasi_komunitas'] = $lokasiKomunitas;
        $komunitas['anggota_komunitas'] = $anggotaKomunitas;
        $komunitas['deskripsi_komunitas'] = $deskKomunitas;

        $komunitas['nama_komunitas'] = $namaKomunitas;
        $komunitas['tautat_komunitas'] = $tautatKomunitas;
        // $komunitas['logo_komunitas'] = $upload_data['file_name'];

        // echo json_encode($data);
        $sukses = $this->M_komunitas->updateKomunitas($komunitas, $idKomunitas);

        if (!$sukses) {
            flashMessage('success', 'Calon Komunitas Baru berhasil di daftarkan. Silahkan verifikasi di Permohonan Calon Anggota');
            redirect('alumni/Komunitas/kelolaKomunitas');
        } else {
            flashMessage('error', 'Calon Komunitas Baru gagal di daftarkan! Silahkan coba lagi');
            redirect('alumni/Komunitas/kelolaKomunitas');
        }
        // }
    }

    public function setUpdateFotoKomunitas()
    {
        $idUbahFoto = $this->input->post('idUbahFoto');

        $filename = "komunitas-" . $namaFotoKomunitas . "-" . time();
        $namaKomunitas = $this->input->post('namaKomunitas');

        $filename = "komunitas-" . $namaKomunitas . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/content/komunitas';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        // load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar Forum Bisnis gagal! Silahkan coba lagi');
            redirect('alumni/lihatKomunitas');
        } else {
            $upload_data = $this->upload->data();

            $data = $this->M_komunitas->findKomunitas('logo_komunitas', array('tb_komunitas.id_komunitas = ' => $idUbahFoto));

            $komunitas['logo_komunitas'] = $upload_data['file_name'];

            unlink(FCPATH . 'uploads/content/komunitas/' . $data[0]->logo_komunitas);

            // echo json_encode($data);
            $sukses = $this->M_komunitas->updateKomunitas($komunitas, $idUbahFoto);

            if (!$sukses) {
                flashMessage('success', 'Foto berhasil di ubah.');
                redirect('alumni/Komunitas/kelolaKomunitas');
            } else {
                flashMessage('error', 'Foto gagal di ubah! Silahkan coba lagi');
                redirect('alumni/Komunitas/kelolaKomunitas');
            }
        }
    }
    // ==================================================
    // --------------------- UPDATE ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- DELETE ---------------------
    // ==================================================	
    public function batalkanPermohonanKomunitas()
    {
        $this->load->model('M_komunitas');

        $id = $this->input->post('idKomunitasHapus');

        $deleteKomunitas = $this->M_komunitas->deleteKomunitas($id);

        if (!$deleteKomunitas) {
            flashMessage('success', 'Permohonan Komunitas berhasil dibatalkan');
            redirect('alumni/Komunitas/komunitasNonaktif');
        } else {
            flashMessage('error', 'Terjadi Error! Silahkan coba lagi');
            redirect('alumni/Komunitas/komunitasNonaktif');
        }
    }
    // ==================================================
    // --------------------- DELETE ---------------------
    // ==================================================	
    //
    //
    //
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    function cariKomunitas()
    {
        $data['title'] = 'Kelola Status Komunitas';

        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas != 0";
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNama($where, $nama);

        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 4) {
            if (!$nama) {
                redirect('alumni/Komunitas/kelolaKomunitas');
            }
            $this->alumni_render('alumni/kelolaKomunitas', $data);
        }
    }

    function cariStatusKomunitas()
    {
        $data['title'] = 'Kelola Status Komunitas';

        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas != 0";
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNama($where, $nama);

        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 4) {

            if (!$nama) {
                redirect('alumni/komunitas');
            }

            $this->alumni_render('alumni/lihatKomunitas', $data);
        }
    }

    function cariStatusKomunitasNonaktif()
    {
        $data['title'] = 'Kelola Status Komunitas';

        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas != 1";
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNama($where, $nama);

        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 4) {
            if (!$nama) {
                redirect('alumni/komunitas/komunitasNonaktif');
            }

            $this->alumni_render('alumni/komunitasNonaktif', $data);
        }
    }
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
    function komunitasJSON()
    {
        $id = $this->input->post('id');

        $data['komunitas'] = $this->M_komunitas->findKomunitas('*', array('tb_komunitas.id_komunitas = ' => $id));

        echo json_encode($data);
    }
    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
}
