<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Anggota Admin
 * Created by Lut Dinar Fadila 2018
*/

class Komunitas extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load Admin Anggota Model
        $this->load->model('AdminAnggotaModel');
        $this->load->model('AdminHomeModel');
        $this->load->model('M_anggota');
        $this->load->model('M_komunitas');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '3') {
            redirect('anggota');
        }
    }

    function index()
    {
        $data['title'] = 'Kelola Komunitas';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));


        $data['calonKomunitas'] = $this->M_komunitas->getAllKomunitas();

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/KelolaKomunitas', $data);
        }
        //         echo json_encode($data);
    }

        public function tambahCalonKomunitas()
    {
        $this->load->model('M_anggota');

        $namaKomunitas = $this->input->post('namaKomunitas');
        $tautatKomunitas = $this->input->post('tautatKomunitas');
        $tglPengajuan = $this->input->post('tglPengajuan');
        $waktuPengajuan = $this->input->post('waktuPengajuan');
        $idPengupload = $this->input->post('idPengupload');


        $filename = "komunitas-" . $namaKomunitas . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('admin/Komunitas');
        } else {
            $upload_data = $this->upload->data();

            $data['nama_komunitas'] = $namaKomunitas;
            $data['tautat_komunitas'] = $tautatKomunitas;
            $data['date_created'] = $this->input->post('tglPengajuan');
            $data['time_created'] = $waktuPengajuan;
            $data['logo_komunitas'] = $upload_data['file_name'];
            $data['id_pengupload'] = $idPengupload;
            $data['stat_komunitas'] = '0';

            // echo json_encode($data);
            $sukses = $this->M_komunitas->insertNewKomunitas($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Komunitas Baru berhasil di daftarkan. Silahkan verifikasi di Permohonan Calon Anggota');
                redirect('admin/Komunitas');
            } else {
                flashMessage('error', 'Calon Komunitas Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('admin/Komunitas');
            }
        }
    }

    function komunitasJSON()
    {
        $id = $this->input->post('id');

        $data['komunitas'] = $this->M_komunitas->findKomunitas('*', array('tb_komunitas.id_komunitas = ' => $id));

        echo json_encode($data);
    }


    function aktivasiCalonKomunitas()
    {
        $this->load->model('M_komunitas');

        $komunitas['stat_komunitas'] = $this->input->post('statKomunitas');
        $idKomunitas = $this->input->post('idKomunitas');

        // echo json_encode($user);
        $sukses = $this->M_komunitas->updateKomunitas($komunitas, $idKomunitas);


        if ($sukses != 0) {

            $komunitas['user_id'] = $sukses;
            $updateKomunitas = $this->M_komunitas->updateKomunitas($komunitas, $idKomunitas);

    
            if (!$updateKomunitas) {
                flashMessage('success', 'Calon Komunitas berhasil di aktifkan dan dapat masuk menggunakan Username & Password sesuai yang tertera pada saat Aktivasi');
                redirect('admin/Komunitas');
            } else {
                flashMessage('error', 'Aktivasi Calon Komunitas gagal! Silahkan coba lagi...');
                redirect('admin/Komunitas');
            }
        } else {
            flashMessage('error', 'Maaf, Terjadi kesalahan pada saat proses pembuatan akun Komunitas baru');
            redirect('admin/Komunitas');
        }
    }

    function tolakCalonKomunitas()
    {
        $idKomunitas = $this->input->post('idCalonKomunitas');

        $sukses = $this->M_komunitas->deleteKomunitas($idKomunitas);

        if (!$sukses) {
            flashMessage('success', 'Calon Komunitas berhasil ditolak sebagai keKomunitasan');
            redirect('admin/Komunitas');
        } else {
            flashMessage('error', 'Calon Komunitas gagal ditolak sebagai keKomunitasan! Silahkan coba lagi');
            redirect('admin/Komunitas');
        }
        // echo json_encode($idKomunitas);
    }


}