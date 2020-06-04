<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

class ForumBisnis extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_user');
        $this->load->model('M_forumBisnis');
        $this->load->model('M_jenisBisnis');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '4') {
            redirect('alumni');
        }
    }


    function index()
    {
        $data['title'] = 'Kelola Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $data['forumBisnis'] = $this->M_forumBisnis->getAllForbisById();

        $this->anggota_render('anggota/ForumBisnis', $data);
    }

    function tambahCalonForbis()
    {
        $data['title'] = 'Tambah Calon Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        $data['forumBisnis'] = $this->M_forumBisnis->getAllForbisById();

        $this->anggota_render('anggota/tambahCalonForBis', $data);
    }

    public function setAddForbis()
    {
        $namaBisnisUsaha = $this->input->post('namaBisnisUsahaModal');
        $jenisBisnisUsaha = $this->input->post('jenisBisnisUsahaModal');
        $deskripsiBisnis = $this->input->post('deskripsiBisnisUsahaModal');
        $alamatBisnis = $this->input->post('alamatBisnisUsahaModal');
        $noTelpBisnis = $this->input->post('noTelpBisnisUsahaModal');
        $pemilikBisnis = $this->input->post('pemilikBisnisUsahaModal');

        $filename = "logo-" . $namaBisnisUsaha . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/logo-bisnis';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileLogo')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('admin/ForumBisnis');
        } else {
            $upload_data = $this->upload->data();

            $data['nama_bisnis_usaha'] = $namaBisnisUsaha;
            $data['id_jenis_bisnis'] = $jenisBisnisUsaha;
            $data['deskripsi_bisnis'] = $deskripsiBisnis;
            $data['alamat_bisnis'] = $alamatBisnis;
            $data['no_telp_bisnis'] = $noTelpBisnis;
            $data['nama_foto_bisnis'] = $upload_data['file_name'];
            $data['pemilik_id'] = $pemilikBisnis;
            $data['stat_forbis'] = 0;


            // echo json_encode($data);
            // $sukses = $this->M_anggota->insertNewAnggota($data);

            $sukses = $this->M_forumBisnis->insertForumBisnis($data);

            if (!$sukses) {
                flashMessage('success', 'Bisnis / Usaha Anggota berhasil ditambahkan tunggu konfirmasi selanjutnya untuk ditampilkan');
                redirect('anggota/ForumBisnis/tambahCalonForbis');
            } else {
                flashMessage('error', 'Bisnis / Usaha Anggota gagal ditambahkan! Silahkan coba lagi.');
                redirect('anggota/ForumBisnis/tambahCalonForbis');
            }
        }
    }
}