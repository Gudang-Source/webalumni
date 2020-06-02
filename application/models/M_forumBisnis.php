<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_forumBisnis extends CI_Model
{

    function getAllForumBisnis()
    {
        $this->db->join('tb_jenis_bisnis', 'tb_forum_bisnis.id_jenis_bisnis = tb_jenis_bisnis.id_jenis_bisnis');
        $this->db->join('tb_anggota', 'tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota');
        return $this->db->get('tb_forum_bisnis')->result();
    }

    // function findForumBisnis($where)
    // {
    //     $this->db->where($where);
    //     $this->db->join('tb_jenis_bisnis', 'tb_forum_bisnis.id_jenis_bisnis = tb_jenis_bisnis.id_jenis_bisnis');
    //     $this->db->join('tb_anggota', 'tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota');

    //     return $this->db->get('tb_forum_bisnis')->result();
    // }

    function findForumBisnis($where)
    {
        $this->db->where($where);
        return $this->db->get('tb_forum_bisnis')->result();
    }

    function insertForumBisnis($forumBisnis)
    {
        $this->db->insert('tb_forum_bisnis', $forumBisnis);
    }

    function updateForumBisnis($forumBisnis, $id)
    {
        $this->db->where('id_forum_bisnis', $id);
        $this->db->update('tb_forum_bisnis', $forumBisnis);
    }

    function deleteForumBisnis($id)
    {
        $this->db->delete('tb_forum_bisnis', ['id_forbis' => $id]);
    }
}