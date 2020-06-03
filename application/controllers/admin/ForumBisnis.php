<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Pengaturan Forum Bisnis
 * Created by Lut Dinar Fadila 2018
*/

class ForumBisnis extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_forumBisnis');
        $this->load->model('M_jenisBisnis');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 2) {
            redirect('koordinator');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 3) {
            redirect('anggota');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 4) {
            redirect('alumni');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == 5) {
            redirect('umum');
        }
    }

    function index()
    {
        $data['title'] = 'Admin - Forum Bisnis';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['forumBisnis'] = $this->M_forumBisnis->getAllForumBisnis();
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();
        // $data['pemilikForbis'] = $this->M_anggota->findAnggota('*', array('tb_anggota.support = ' => '1'));

        $where = array(
            'tb_anggota.status_anggota !=' => '0',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );

        $data['pemilikForbis'] = $this->M_anggota->findAnggota('*', $where);

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/kelolaForumBisnis', $data);
        }
    }

    function kelolaJenisBisnis()
    {
        $data['title'] = 'Admin - Kelola Jenis Bisnis';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $data['jenisBisnis'] = $this->M_jenisBisnis->getAllJenisBisnis();

        if ($this->session->userdata('role') == 1) {
            $this->admin_render('admin/kelolaJenisBisnis', $data);
        }
    }

    public function setAddForbis()
    {
        $forbis['nama_bisnis_usaha'] = $this->input->post('namaBisnisUsahaModal');
        $forbis['id_jenis_bisnis'] = $this->input->post('jenisBisnisUsahaModal');
        $forbis['deskripsi_bisnis'] = $this->input->post('deskripsiBisnisUsahaModal');
        $forbis['alamat_bisnis'] = $this->input->post('alamatBisnisUsahaModal');
        $forbis['no_telp_bisnis'] = $this->input->post('noTelpBisnisUsahaModal');
        $forbis['pemilik_id'] = $this->input->post('pemilikBisnisUsahaModal');

        $sukses = $this->M_forumBisnis->insertForumBisnis($forbis);

        if (!$sukses) {
            flashMessage('success', 'Bisnis / Usaha Anggota berhasil ditambahkan dan akan ditampilkan');
            redirect('admin/ForumBisnis');
        } else {
            flashMessage('error', 'Bisnis / Usaha Anggota gagal ditambahkan! Silahkan coba lagi.');
            redirect('admin/ForumBisnis');
        }
    }

    public function getForbisById()
    {
        $id = $this->input->post('id');

        $data['forbis'] = $this->M_forumBisnis->findForumBisnis(array('tb_forum_bisnis.id_forbis = ' => $id));

        echo json_encode($data);
    }

    public function getJenisBisnisById()
    {
        $id = $this->input->post('id');

        $data['jenisBisnis'] = $this->M_jenisBisnis->findJenisBisnis(array('tb_jenis_bisnis.id_jenis_bisnis = ' => $id));

        echo json_encode($data);
    }

    public function setUpdateForbis()
    {
        $id = $this->input->post('idForbisEdit');
        $forbis['nama_bisnis_usaha'] = $this->input->post('namaBisnisEdit');
        $forbis['id_jenis_bisnis'] = $this->input->post('jenisBisnisEdit');
        $forbis['deskripsi_bisnis'] = $this->input->post('deskripsiBisnisEdit');
        $forbis['alamat_bisnis'] = $this->input->post('alamatBisnisEdit');
        $forbis['no_telp_bisnis'] = $this->input->post('noTelpBisnisEdit');
        $forbis['pemilik_id'] = $this->input->post('pemilikBisnisEdit');

        $sukses = $this->M_forumBisnis->updateForumBisnis($forbis, $id);

        if (!$sukses) {
            flashMessage('success', 'Bisnis / Usaha Anggota berhasil diperbarui.');
            redirect('admin/ForumBisnis');
        } else {
            flashMessage('error', 'Bisnis / Usaha Anggota gagal diperbarui! Silahkan coba lagi.');
            redirect('admin/ForumBisnis');
        }
    }

    public function setDeleteForumBisnis()
    {
        $id = $this->input->post('idForbisDelete');

        $sukses = $this->M_forumBisnis->deleteForumBisnis($id);

        if (!$sukses) {
            flashMessage('success', 'Forum Bisnis berhasil dihapus');
            redirect('admin/ForumBisnis');
        } else {
            flashMessage('error', 'Forum Bisnis gagal dihapus! Silahkan coba lagi');
            redirect('admin/ForumBisnis');
        }
    }

    public function setAddJenisBisnis()
    {
        $data['nama_jenis_bisnis'] = $this->input->post('namaJenisBisnisModal');

        $sukses = $this->M_jenisBisnis->insertJenisBisnis($data);

        if (!$sukses) {
            flashMessage('success', 'Tambah jenis bisnis berhasil. Silahkan lihat pada Tambah Forum Bisnis');
            redirect('admin/ForumBisnis/kelolaJenisBisnis');
        } else {
            flashMessage('error', 'Tambah jenis bisnis gagal! Silahkan coba lagi.');
            redirect('admin/ForumBisnis/kelolaJenisBisnis');
        }
    }

    public function setDeleteJenisBisnis()
    {
        $id = $this->input->post('idJenisBisnisDelete');
        // $namaJenisDelete = $this->input->post('namaJenisBisnisDelete');

        $sukses = $this->M_jenisBisnis->deleteJenisBisnis($id);

        if (!$sukses) {
            flashMessage('success', 'Jenis Bisnis berhasil dihapus');
            redirect('admin/ForumBisnis/kelolaJenisBisnis');
        } else {
            flashMessage('error', 'Jenis Bisnis gagal dihapus! Silahkan coba lagi');
            redirect('admin/ForumBisnis/kelolaJenisBisnis');
        }
    }

    public function setUpdateJenisBisnis()
    {
        $id = $this->input->post('idJenisBisnisEdit');
        $namaJenis = $this->input->post('namaJenisBisnisEdit', true);

        $sukses = $this->M_jenisBisnis->updateJenisBisnis($namaJenis, $id);

        if (!$sukses) {
            flashMessage('success', 'Jenis Bisnis berhasil diperbarui');
            redirect('admin/ForumBisnis/kelolaJenisBisnis');
        } else {
            flashMessage('error', 'Jenis Bisnis gagal diperbarui! Silahkan coba lagi');
            redirect('admin/ForumBisnis/kelolaJenisBisnis');
        }
    }
}