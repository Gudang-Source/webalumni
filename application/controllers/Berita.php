<?php

if (defined('BASEPATH') or exit('No direct script access allowed'));

/*
 * class Berita
 * Created by Adhy Wiranto Sudjana - 173040038
*/

class Berita extends MY_Controller
{
    function index()
    {
        $data['title'] = 'Berita';
        $this->frontend_render('frontend/berita/index', $data);
    }
}