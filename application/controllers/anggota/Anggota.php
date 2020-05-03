<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Anggota
 * Created by Lut Dinar Fadila 2018
*/

class Anggota extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        
        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '2') {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        }
        
    }

    function index()
    {
        $data['title'] = 'Anggota - Lihat Anggota';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        
        $where = array(
            'tb_anggota.nama_lengkap != ' => 'admin',
            'tb_anggota.status_anggota != ' => '0'
        );
        $data['dataMaster'] = $this->M_anggota->findAnggota('*', $where);

        $this->anggota_render('anggota/lihatAnggota', $data);
        
    }

}