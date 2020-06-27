<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Anggota Admin
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

        $this->anggota_render('anggota/lihatKomunitas', $data);
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
        $this->anggota_render('anggota/tambahKomunitas', $data);
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
            redirect('anggota/Komunitas');
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
            if ($this->session->userdata('role') == 3) {
                $data['stat_komunitas'] = '0';
            } else {
                $data['stat_komunitas'] = '1';
            }

            // echo json_encode($data);
            $sukses = $this->M_komunitas->insertNewKomunitas($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Komunitas Baru berhasil di daftarkan. Tunggu Verivikasi dari Admin 1x24 jam');
                redirect('anggota/Komunitas');
            } else {
                flashMessage('error', 'Calon Komunitas Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('anggota/Komunitas');
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
    // --------------------- SEARCH ---------------------
    // ==================================================
    function cariStatusKomunitas()
    {
        $data['title'] = 'Kelola Status Komunitas';

        $nama = $this->input->post('namaKomunitas');

        $where = "tb_komunitas.stat_komunitas != 0";
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeNama($where, $nama);

        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 3) {
            $this->anggota_render('anggota/lihatKomunitas', $data);
        }
    }
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
}
