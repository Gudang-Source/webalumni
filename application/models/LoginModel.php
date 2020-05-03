<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Login Model
 * Created by Lut Dinar Fadila 2018
*/

class LoginModel extends CI_Model
{
    
    function cek_user($user, $pass)
    {
        $this->db->select('id_user, username, password, status_akun, role');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        
        return $this->db->get('tb_user')->result();
    }
    
    function saveRegisterAnggota($anggota) {
		$this->db->insert('tb_anggota', $anggota);
    }

}
