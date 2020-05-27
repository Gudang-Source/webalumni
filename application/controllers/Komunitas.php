<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends MY_Controller {

    function index()
    {
        $data['title'] = 'Komunitas';
        $this->frontend_render('frontend/komunitas/index', $data);
    }

}