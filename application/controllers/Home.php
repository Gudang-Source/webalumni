<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Home Front Page
 * Created by Lut Dinar Fadila 2018
*/

class Home extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('KoordinatorAnggotaModel');
    }
    
    function index() {
        $data['title'] = 'Beranda IKASMA3BDG';
        $this->frontend_render('frontend/home', $data);
    }
    
    function cariTeman() {
        $data['title'] = 'Cari Teman';
        $data['dataAnggota'] = $this->FrontPageModel->getAllAnggota();

        $this->load->view('frontend/cariTeman', $data);
    }

    function forumBisnisAnggota() {
        $data['title'] = 'Forum Bisnis IKASMA3BDG';
        $data['forbis'] = $this->FrontPageModel->getForbisAnggota();

        $this->load->view('frontend/forumBisnis', $data);
    }
    
}
