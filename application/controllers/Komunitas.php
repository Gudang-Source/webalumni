<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('M_komunitas');
    }

    function index()
    {
        $data['title'] = 'Komunitas';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $this->frontend_render('frontend/komunitas/index', $data);
    }
}
