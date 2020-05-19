<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Pengaturan Anggota
 * Created by Lut Dinar Fadila 2018
*/

class Pengaturan extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_anggota');
    }

    function index()
    {
        $data['title'] = 'Anggota - Pengaturan';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));

        $this->anggota_render('anggota/pengaturan', $data);
    }

    function setUpdateUsername() {
        $idUser = $this->input->post('idUserUsername');
        $user['username'] = $this->input->post('usernameBaru');

        $sukses = $this->M_user->updateUser($user, $idUser);

        if (!$sukses) {
            flashMessage('success', 'Username Anda telah diperbarui. Silahkan masuk kembali menggunakan Username Baru');
            redirect('login/Logout');
        } else {
            flashMessage('error', 'Username Anda gagal diperbarui! Silahkan coba lagi');
            redirect('anggota/Pengaturan');
        }
        
    }

    function setUpdatePassword() {
        $idUser = $this->input->post('idUserPassword');
        $password = $this->input->post('passwordBaru');
        $ulangiPassword = $this->input->post('ulangiPasswordBaru');

        if ($password == $ulangiPassword) {
            
            $user['password'] = $password;
            $sukses = $this->M_user->updateUser($user, $idUser);
            
            if (!$sukses) {
                flashMessage('success', 'Username Anda telah diperbarui. Silahkan masuk kembali menggunakan Username Baru');
                redirect('login/Logout');
            } else {
                flashMessage('error', 'Username Anda gagal diperbarui! Silahkan coba lagi');
                redirect('anggota/Pengaturan');
            }

        } else {
            flashMessage('error', 'Password Anda tidak sama! Silahkan coba lagi.');
            redirect('anggota/Pengaturan');
        }

    }

    function setUpdateImageProfile() {

        $idAnggota = $_POST['idPengguna'];
        $namaLengkap = $_POST['namaPengguna'];

        $filename = "IKA-SMA3-".$namaLengkap."-".time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar profil baru Anda gagal! Silahkan coba lagi');
            redirect('admin/Pengaturan');
        } else {
            $upload_data = $this->upload->data();

            $anggota['nama_foto'] = $upload_data['file_name'];

            // echo json_encode($data);
            $sukses = $this->M_anggota->updateAnggota($anggota, $idAnggota);

            if (!$sukses) {
                flashMessage('success', 'Foto profil Anda berhasil diperbarui');
                redirect('admin/Pengaturan');
            } else {
                flashMessage('error', 'Foto profil Anda gagal diperbarui! Silahkan coba lagi');
                redirect('admin/Pengaturan');
            }
        }

    }

}
