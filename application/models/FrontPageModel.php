<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * class Front Page Model
 * Created by Lut Dinar Fadila
 */
class FrontPageModel extends CI_Model
{
	function getInfoBySessionId()
	{
		$this->db->select('tb_anggota.nama_lengkap, tb_anggota.nama_foto, tb_user_role.role');
		$this->db->from('tb_anggota');
		$this->db->join('tb_user', 'tb_anggota.user_id=tb_user.id_user');
		$this->db->join('tb_user_role', 'tb_user.role=tb_user_role.id');
		$this->db->where('user_id', $this->session->userdata('uid'));

		return $this->db->get()->result();
	}

	// function getRoleInfo()

	function getAllAnggota()
	{
		$this->db->select('nama_lengkap, angkatan, email, nama_foto, no_telp, support');
		$this->db->where('nama_lengkap !=', 'admin');
		$this->db->order_by('nama_lengkap', 'ASC');

		return $this->db->get('tb_anggota')->result();
	}

	function getAllForumBisnis()
	{
		$query = "SELECT * FROM `tb_forum_bisnis` JOIN `tb_jenis_bisnis` ON
        `tb_forum_bisnis`.`id_jenis_bisnis` = `tb_jenis_bisnis`.`id_jenis_bisnis` JOIN `tb_anggota` ON
        `tb_forum_bisnis`.`pemilik_id` = `tb_anggota`.`id_anggota` WHERE `tb_forum_bisnis`.`stat_forbis` = 1 ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";
		return $this->db->query($query)->result();
	}

	function findForumBisnisLikeNama($nama)
	{
		$query = "SELECT * FROM `tb_forum_bisnis` JOIN `tb_jenis_bisnis` ON
        `tb_forum_bisnis`.`id_jenis_bisnis` = `tb_jenis_bisnis`.`id_jenis_bisnis` JOIN `tb_anggota` ON
		`tb_forum_bisnis`.`pemilik_id` = `tb_anggota`.`id_anggota` WHERE `tb_forum_bisnis`.`nama_bisnis_usaha` LIKE '%$nama%'  AND  `tb_forum_bisnis`.`stat_forbis` = 1 ORDER BY `tb_forum_bisnis`.`id_forbis` DESC";

		return $this->db->query($query)->result();
	}

	function findForumBisnis($where)
	{
		$this->db->where($where);
		return $this->db->get('tb_forum_bisnis')->result();
	}
}