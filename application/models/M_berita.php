<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{
    function getAllBerita()
    {
        $queryBerita = "SELECT tb_berita.*, tb_user.username FROM tb_berita JOIN tb_user ON tb_berita.id_penulis = tb_user.id_user";
        $berita = $this->db->query($queryBerita)->result();

        return $berita;

    }

    function insertNewBerita($berita)
    {
        $this->db->insert('tb_berita', $berita);
    }
}