<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{
    function getAllBerita()
    {
        $queryBerita = "SELECT tb_berita.*, tb_user.username, tb_kategori_berita.kategori FROM (tb_berita JOIN tb_user ON tb_berita.id_penulis = tb_user.id_user) JOIN tb_kategori_berita ON tb_berita.id_kategori = tb_kategori_berita.id";
        $berita = $this->db->query($queryBerita)->result();

        return $berita;

    }

    function findBerita($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_berita', 'DESC');
        $this->db->where($where);

        return $this->db->get('tb_berita')->result();
    }

    function insertNewBerita($berita)
    {
        $this->db->insert('tb_berita', $berita);
    }

    function updateBerita($berita, $id)
    {
        $this->db->where('id_berita', $id);
        $this->db->update('tb_berita', $berita);
    }

    function deleteBerita($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->delete('tb_berita');
    }

    function getAllKategori()
    {
        return $this->db->get('tb_kategori_berita')->result();
    }
}