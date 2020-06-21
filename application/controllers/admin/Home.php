<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Anggota Admin
 * Created by 
 *      Adhy Wiranto Sudjana
 *      Dicky Ardianto
 *      Rafly Yunandi Aliansyah
 * Architecture by 
 *      Lut Dinar Fadila
 * 
 * 2020
*/

class Home extends MY_Controller 
{
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================    
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
    // ==================================================
    // ------------------ CONTSTRUCTOR ------------------
    // ==================================================
    //
    //
    //
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================
    function index() {
        $data['title'] = 'Beranda Admin';
        $data['info'] = $this->AdminHomeModel->getInfoBySessionId();
        
        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/home', $data);
        }
    }
    // ==================================================
    // ---------------------- READ ----------------------
    // ==================================================

}