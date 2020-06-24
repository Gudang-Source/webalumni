<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita
 * Created by Adhy Wiranto Sudjana - 173040038
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
        $this->frontend_render('frontend/forumbisnis', $data);
    }
}
