<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends CI_Model
{

    function getAllAnggota()
    {
        return $this->db->get('tb_anggota')->result();
    }

    function findAnggota($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_anggota', 'DESC');
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

    function deletePemulihan($id)
    {
        $this->db->where('id_pemulihan', $id);
        $this->db->delete('tb_pemulihan');
    }

    function getAllPemulihanAnggota()
    {
        return $this->db->get('tb_pemulihan')->result();
    }

    function findPemulihan($where)
    {
        $query = "SELECT * FROM `tb_pemulihan` WHERE tb_pemulihan.id_pemulihan = $where";
        return $this->db->query($query)->result();
    }

    function findIdUserPemulihan($user)
    {
        $this->db->select('id_user');
        $this->db->where('id_pemulihan', $user);

        return $this->db->get('tb_pemulihan')->result();
    }

    function updatePemulihan($anggota, $id)
    {
        $this->db->where('id_pemulihan', $id);
        $this->db->update('tb_pemulihan', $anggota);
    }

    function pemilikForbis()
    { }
}