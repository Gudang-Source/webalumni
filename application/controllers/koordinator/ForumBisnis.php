<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * class Forum Bisnis
 * Created by Lut Dinar Fadila 2018
 */
class ForumBisnis extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('KoordinatorForbisModel');

		if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '3' || $this->session->userdata('role') == '4') {
            redirect('anggota');
        }
	}

	function index()
	{
		$data['title'] = 'Koordinator - Forum Bisnis';
        $data['info'] = $this->KoordinatorForbisModel->getInfoBySessionId($this->session->userdata('aid'));
        $data['forumBisnis'] = $this->KoordinatorForbisModel->getAllForbis();
        $data['jenisBisnis'] = $this->KoordinatorForbisModel->getJenisBisnis();
        $data['pemilikForbis'] = $this->KoordinatorForbisModel->getPemilikForbis();

        $this->admin_render('koordinator/kelolaForumBisnis', $data);
	}
}