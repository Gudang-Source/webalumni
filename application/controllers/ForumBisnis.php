<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita
 * Created by Dicky Ardianto - 173040046
*/

class ForumBisnis extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FrontPageModel');
        $this->load->model('M_forumBisnis');
    }

    function index()
    {
        $data['title'] = 'Forum Bisnis';
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();
        $data['forumBisnis'] = $this->M_forumBisnis->getAllForumBisnis();
        $this->frontend_render('frontend/forumbisnis/forumBisnis', $data);
    }

    function lihatForbis($id)
    {
        $data['forumBisnis'] = $this->M_forumBisnis->getLihatAllForbisById($id);
        $data['title'] = 'Forum Bisnis';
        // $data['title'] = $data['berita'][0]->judul_berita;
        $data['info'] = $this->FrontPageModel->getInfoBySessionId();

        $this->frontend_render('frontend/forumbisnis/lihatForbis', $data);
    }
}
