<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_komunitas extends CI_Model
{

    function getAllKomunitas()
    {
        return $this->db->get('tb_komunitas')->result();
    }

    function findKomunitas($select, $where)
    {
        $this->db->select($select);
        $this->db->order_by('id_komunitas', 'DESC');
        $this->db->where($where);

        return $this->db->get('tb_komunitas')->result();
    }

    function findKomunitasLikeNama($where, $nama)
    {
        $this->db->where($where);
        $this->db->like('nama_komunitas', $nama, 'both');

        return $this->db->get('tb_komunitas')->result();
    }

    function insertNewKomunitas($komunitas)
    {
        $this->db->insert('tb_komunitas', $komunitas);
    }

    function updateKomunitas($komunitas, $id)
    {
        $this->db->where('id_komunitas', $id);
        $this->db->update('tb_komunitas', $komunitas);
    }

    function deleteKomunitas($id)
    {
        $this->db->where('id_komunitas', $id);
        $this->db->delete('tb_komunitas');
    }
}