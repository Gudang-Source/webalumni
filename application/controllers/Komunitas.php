<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends MY_Controller {

    function index()
    {
        echo 'komunitas/index<br>';
        echo 'halaman ini tidak perlu login dahulu, user dapat langsung melihat link-link grup komunitas yang tersedia :)';
    }

}