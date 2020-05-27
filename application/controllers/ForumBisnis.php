<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita
 * Created by Adhy Wiranto Sudjana - 173040038
*/

class ForumBisnis extends MY_Controller
{
    function index()
    {
        $data['title'] = 'Forum Bisnis';
        $this->frontend_render('frontend/forumbisnis/index', $data);
    }
}