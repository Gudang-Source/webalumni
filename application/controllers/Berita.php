<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita
 * Created by Adhy Wiranto Sudjana - 173040038
*/

class Berita extends MY_Controller
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('M_berita');
        $this->load->model('M_kategori');
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
        $data['title'] = 'Berita';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['daftarBerita'] = $this->M_berita->getAllBerita();

        $this->frontend_render('frontend/berita/index', $data);
    }

    function baca($id)
    {
        $data['berita'] = $this->M_berita->findBeritaLikeId($id);
        $data['title'] = $data['berita'][0]->judul_berita;
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();

        $this->frontend_render('frontend/berita/bacaBerita', $data);
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // --------------------- SEARCH ---------------------
    // ==================================================
    function cariBerita()
    {
        $data['title'] = 'Berita';

        $judul = $this->input->post('judulBerita');

        $where = "tb_berita.stat_berita != 0";
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['daftarBerita'] = $this->M_berita->findBeritaLikeJudul($where, $judul);

        // var_dump($data['daftarBerita']);
        // die;

        $this->frontend_render('frontend/berita/index', $data);
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

    // ==================================================
    // --------------------- OTHERS ---------------------
    // ==================================================
}
