<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_forumBisnis extends CI_Model
{

    function getAllForumBisnis()
    {
        $query = "SELECT * FROM `tb_forum_bisnis` JOIN `tb_jenis_bisnis` ON
        `tb_forum_bisnis`.`id_jenis_bisnis` = `tb_jenis_bisnis`.`id_jenis_bisnis` JOIN `tb_anggota` ON
        `tb_forum_bisnis`.`pemilik_id` = `tb_anggota`.`id_anggota` ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

        // $this->db->join('tb_jenis_bisnis', 'tb_forum_bisnis.id_jenis_bisnis = tb_jenis_bisnis.id_jenis_bisnis');
        // $this->db->join('tb_anggota', 'tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota');
        return $this->db->query($query)->result();
    }

    function getAllForbisById()
    {
        $data['info'] = $this->M_anggota->findAnggotaAndUser(array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $id_pemilik = $data['info'];

        $id = $id_pemilik[0]->id_anggota;

        // var_dump($id);
        // die;

        // $queryKomunitas = "SELECT tb_komunitas.*, tb_user.username FROM tb_komunitas JOIN tb_user ON tb_komunitas.id_pengupload = tb_user.id_user";

        $queryForbisById = "SELECT * FROM tb_forum_bisnis JOIN tb_anggota ON tb_forum_bisnis.pemilik_id = tb_anggota.id_anggota WHERE tb_forum_bisnis.pemilik_id = $id";

        $forbis = $this->db->query($queryForbisById)->result();

        return $forbis;

        // return $this->db->get('tb_komunitas')->result();
    }

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
        $this->db->where('id_forbis', $id);
        $this->db->update('tb_forum_bisnis', $forumBisnis);
    }

    function deleteForumBisnis($id)
    {
        $this->db->delete('tb_forum_bisnis', ['id_forbis' => $id]);
    }
}