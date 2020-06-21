<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Pengaturan Anggota
 * Created by Lut Dinar Fadila 2018
*/

class Anggota extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load Admin Anggota Model

        $this->load->model('M_anggota');
    }

    public function index()
    {
        $data['title'] = 'Tambah Calon Anggota';

        $where = array(
            'tb_anggota.status_anggota = ' => '0',
            'tb_anggota.nama_lengkap != ' => 'admin'
        );

        $data['calonAnggota'] = $this->M_anggota->findAnggota('*', $where);
        $data['daftarHakAkses'] = $this->M_anggota->getAllRole();
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 5) {
            $this->umum_render('umum/tambahAnggota', $data);
        }
    }



    public function tambahCalonAnggota()
    {
        $namaLengkap = $this->input->post('namaLengkap');
        $namaPanggilan = $this->input->post('namaPanggilanAlias');
        $angkatan = $this->input->post('angkatan');
        $noTelepon = $this->input->post('noTelepon');
        $email = $this->input->post('email');

        $filename = "IKA-SMA3-" . $namaLengkap . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('umum/Anggota');
        } else {
            $upload_data = $this->upload->data();
            $data['nama_lengkap'] = $namaLengkap;
            $data['nama_panggilan_alias'] = $namaPanggilan;
            $data['tanggal_lahir'] = $this->input->post('tglLahir');
            $data['angkatan'] = $angkatan;
            $data['no_telp'] = $noTelepon;
            $data['email'] = $email;
            $data['nama_foto'] = $upload_data['file_name'];
            $data['status_anggota'] = '0';

            $sukses = $this->M_anggota->insertNewAnggota($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Anggota Baru berhasil di daftarkan. Silahkan verifikasi di Permohonan Calon Anggota');
                redirect('umum/Anggota');
            } else {
                flashMessage('error', 'Calon Anggota Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('umum/Anggota');
            }
        }
    }
}