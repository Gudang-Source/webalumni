<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita
 * Created by Adhy Wiranto Sudjana - 173040038
*/

class Berita extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('M_berita');
    }

    function index()
    {
        $data['title'] = 'Berita';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $this->frontend_render('frontend/berita/index', $data);
    }
}
