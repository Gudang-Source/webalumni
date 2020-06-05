<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{
    public function getAllBerita()
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');

        return $this->db->get()->result();

    }

    function findBerita($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_berita', 'DESC');
        $this->db->where($where);

        return $this->db->get('tb_berita')->result();
    }

    function findBeritaLikeJudul($where, $judul)
    {
        $this->db->select('tb_berita.*, tb_user.username, tb_kategori_berita.kategori');
        $this->db->from('tb_berita');
        $this->db->join('tb_user', 'tb_berita.id_penulis=tb_user.id_user');
        $this->db->join('tb_kategori_berita', 'tb_berita.id_kategori = tb_kategori_berita.id');
        $this->db->where($where);
        $this->db->like('judul_berita', $judul, 'both');

        return $this->db->get()->result();
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
}