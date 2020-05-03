<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends CI_Model {

    function getAllAnggota()
    {
        return $this->db->get('tb_anggota')->result();
    }

    function findAnggota($select, $where)
    {
        $this->db->select($select);
        $this->db->where($where);

        return $this->db->get('tb_anggota')->result();
    }

    function findAnggotaAndUser($where)
    {
        $this->db->where($where);
        $this->db->join('tb_user', 'tb_anggota.user_id = tb_user.id_user');

        return $this->db->get('tb_anggota')->result();
    }

    function findAnggotaLikeNama($where, $nama)
    {
        $this->db->where($where);
        $this->db->like('nama_lengkap', $nama, 'both');

        return $this->db->get('tb_anggota')->result();
    }

    function insertNewAnggota($anggota)
    {
        $this->db->insert('tb_anggota', $anggota);
    }

    function updateAnggota($anggota, $id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->update('tb_anggota', $anggota);
    }

    function deleteAnggota($id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->delete('tb_anggota');
    }

}