<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * class Front Page Model
 * Created by Lut Dinar Fadila
 */
class FrontPageModel extends CI_Model
{
	
	function getAllAnggota()
	{
		$this->db->select('nama_lengkap, angkatan, email, nama_foto, no_telp, support');
		$this->db->where('nama_lengkap !=', 'admin');
		$this->db->order_by('nama_lengkap', 'ASC');

		return $this->db->get('tb_anggota')->result();
	}

	function getForbisAnggota()
	{
		$this->db->select('nama_bisnis_usaha, nama_jenis_bisnis, nama_lengkap, angkatan');
		$this->db->join('tb_jenis_bisnis', 'tb_jenis_bisnis.id_jenis_bisnis = tb_forum_bisnis.id_jenis_bisnis');
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_forum_bisnis.pemilik_id');

		return $this->db->get('tb_forum_bisnis')->result();
	}
}
