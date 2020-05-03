<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Home Admin
 * Created by Lut Dinar Fadila 2018
*/

class Home extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('AdminHomeModel');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 2) {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 3) {
            redirect('anggota');
        }
    }

    function index() {
        $data['title'] = 'Beranda Admin';
        $data['info'] = $this->AdminHomeModel->getInfoBySessionId();
        
        $this->admin_render('admin/home', $data);
    }
}