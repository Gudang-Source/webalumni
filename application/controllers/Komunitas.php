<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('M_komunitas');
        $this->load->model('M_anggota');
    }

    function index()
    {
        $data['title'] = 'Komunitas';
        $data['komunitas'] = $this->M_komunitas->getAllKomunitas();

        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $this->frontend_render('frontend/komunitas/index', $data);
    }

    function detailKomunitas($id)
    {
        $data['komunitas'] = $this->M_komunitas->findKomunitasLikeId($id);
        $data['title'] = 'Detail Komunitas';
        $data['komunitas'] = $this->M_komunitas->getAllKomunitas();
        // $data['info'] = $this->FrontPageModel->getInfoBySessionId();

        // $data['daftarBerita'] = $this->M_berita->getBerita(5, 0);
        // $data['daftarKategori'] = $this->M_kategori->getAllKategori();

        $this->frontend_render('frontend/komunitas/detailKomunitas', $data);
    }
    
}
