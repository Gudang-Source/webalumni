<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Anggota Koordinator
 * Created by Lut Dinar Fadila 2018
*/

class Anggota extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_user');

        if ($this->session->userdata('logged_in') == '' && $this->session->userdata('username') == '' && $this->session->userdata('role') == '') {
            redirect('login');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '1') {
            redirect('admin');
        } elseif ($this->session->userdata('logged_in') == 'Sudah Login' && $this->session->userdata('role') == '3' || $this->session->userdata('role') == '4') {
            redirect('anggota');
        }
    }

    function index()
    {
        $data['title'] = 'Kelola Calon Anggota';

        $where = array(
            'tb_anggota.status_anggota = ' => '0',
            'tb_anggota.nama_lengkap != ' => 'admin'
        );

        $data['calonAnggota'] = $this->M_anggota->findAnggota('*', $where);
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id' => $this->session->userdata('uid')));

        if ($this->session->userdata('role') == 2) {
            $this->koordinator_render('koordinator/anggotaBaru', $data);
        }
    }

    function kelolaAnggota()
    {
        $data['title'] = 'Kelola Anggota';
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('uid')));
        $angkatan = $data['info'][0]->angkatan;

        $where = array(
            'tb_anggota.angkatan' => $angkatan,
            'tb_anggota.status_anggota = ' => '1',
            'tb_anggota.user_id != ' => $this->session->userdata('uid')
        );
        $data['anggota'] = $this->M_anggota->findAnggota('*', $where);
        $this->koordinator_render('koordinator/kelolaAnggota', $data);
    }

    // function dataMaster() {
    //     $data['title'] = 'Data Anggota Master';
    //     $data['info'] = $this->KoordinatorAnggotaModel->getInfoBySessionId($this->session->userdata('aid'));
    //     $data['dataMaster'] = $this->KoordinatorAnggotaModel->getAllDataMaster();

    //     $this->koordinator_render('koordinator/dataMasterAnggota', $data);
    // }

    public function tambahCalonAnggota()
    {
        $namaLengkap = $this->input->post('namaLengkap');
        $namaPanggilan = $this->input->post('namaPanggilanAlias');
        $angkatan = $this->input->post('angkatan');
        $noTelepon = $this->input->post('noTelepon');
        $email = $this->input->post('email');

        $filename = "anggota-" . $namaLengkap . "-" . time();

        // Set preferences
        $config['upload_path'] = './uploads/avatars';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $filename;


        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileSaya')) {
            flashMessage('error', 'Maaf, Upload gambar calon anggota gagal! Silahkan coba lagi');
            redirect('koordinator/Anggota');
        } else {
            $upload_data = $this->upload->data();

            $data['nama_lengkap'] = $namaLengkap;
            $data['nama_panggilan_alias'] = $namaPanggilan;
            $data['tanggal_lahir'] = $this->input->post('tglLahir');
            $data['angkatan'] = $angkatan;
            $data['no_telp'] = $noTelepon;
            $data['email'] = $email;
            $data['nama_foto'] = $upload_data['file_name'];
            $data['status_anggota'] = '0';

            // echo json_encode($data);
            $sukses = $this->M_anggota->insertNewAnggota($data);

            if (!$sukses) {
                flashMessage('success', 'Calon Anggota Baru berhasil di daftarkan. Silahkan verifikasi di Permohonan Calon Anggota');
                redirect('koordinator/Anggota');
            } else {
                flashMessage('error', 'Calon Anggota Baru gagal di daftarkan! Silahkan coba lagi');
                redirect('koordinator/Anggota');
            }
        }
    }

    function anggotaJSON($id)
    {

        $data['anggota'] = $this->M_anggota->findAnggota('*', array('tb_anggota.id_anggota = ' => $id));

        echo json_encode($data);
    }

    function aktivasiCalonAnggota()
    {
        $this->load->model('M_user');

        $pass = $this->input->post('password');
        $idAnggota = $this->input->post('idAnggota');

        $user['username'] = $this->input->post('username');
        $user['password'] = md5($pass);
        $user['status_akun'] = '1';
        $user['role'] = $this->input->post('role');

        // echo json_encode($user);
        $sukses = $this->M_user->insertUser($user);

        if ($sukses != 0) {

            $anggota['user_id'] = $sukses;
            $anggota['status_anggota'] = '1';
            $updateAnggota = $this->M_anggota->updateAnggota($anggota, $idAnggota);

            if (!$updateAnggota) {
                flashMessage('success', 'Calon Anggota berhasil di aktifkan dan dapat masuk menggunakan Username & Password sesuai yang tertera pada saat Aktivasi');
                redirect('koordinator/Anggota');
            } else {
                flashMessage('error', 'Aktivasi Calon Anggota gagal! Silahkan coba lagi...');
                redirect('koordinator/Anggota');
            }
        } else {
            flashMessage('error', 'Maaf, Terjadi kesalahan pada saat proses pembuatan akun anggota baru');
            redirect('koordinator/Anggota');
        }
    }

    function tolakCalonAnggota()
    {
        $idAnggota = $this->input->post('idCalonAnggota');

        $sukses = $this->M_anggota->deleteAnggota($idAnggota);

        if (!$sukses) {
            flashMessage('success', 'Calon Anggota berhasil ditolak sebagai keanggotaan');
            redirect('koordinator/Anggota');
        } else {
            flashMessage('error', 'Calon Anggota gagal ditolak sebagai keanggotaan! Silahkan coba lagi');
            redirect('koordinator/Anggota');
        }
    }

    function getAnggotaByIds($id)
    {
        $data['anggota'] = $this->M_anggota->findAnggota('*', array('tb_anggota.id_anggota = ' => $id));

        echo json_encode($data);
    }

    public function setUpdateAnggota()
    {
        $idAnggota = $this->input->post('idAnggota');
        $idUser = $this->input->post('idUser');
        // $sosialPendidikan = $this->input->post('infoProgram1');
        // $sosialKemanusiaan = $this->input->post('infoProgram2');
        // $pengembanganSarPras = $this->input->post('infoProgram3');
        // $silaturahim = $this->input->post('infoProgram4');
        // $sponsorshipDonasi = $this->input->post('infoProgram5');
        // $support = $this->input->post('keanggotaan1');
        // $loyalist = $this->input->post('keanggotaan2');

        $anggota['nama_lengkap'] = $this->input->post('namaLengkap');
        $anggota['nama_panggilan_alias'] = $this->input->post('panggilanAlias');
        $anggota['jenis_kelamin'] = $this->input->post('jenisKelamin');
        $anggota['tempat_lahir'] = $this->input->post('tempatLahir');
        $anggota['tanggal_lahir'] = $this->input->post('tanggalLahir');
        $anggota['angkatan'] = $this->input->post('angkatan');
        $anggota['golongan_darah'] = $this->input->post('golonganDarah');
        $anggota['no_telp'] = $this->input->post('telepon');
        $anggota['no_telp_alternatif'] = $this->input->post('teleponAlternatif');
        $anggota['NIK'] = $this->input->post('nik');
        $anggota['email'] = $this->input->post('email');
        $anggota['negara'] = $this->input->post('negara');
        $anggota['provinsi'] = $this->input->post('provinsi');
        $anggota['kabupaten_kota'] = $this->input->post('kabupatenKota');
        $anggota['alamat'] = $this->input->post('alamat');
        $anggota['pendidikan_terakhir'] = $this->input->post('pendidikanTerakhir');
        $anggota['status_bekerja'] = $this->input->post('statusBekerja');
        $anggota['bidang_industri'] = $this->input->post('bidangIndustri');
        $anggota['jabatan'] = $this->input->post('jabatan');
        $anggota['nama_perusahaan'] = $this->input->post('namaPerusahaan');
        $anggota['bisnis_usaha'] = $this->input->post('bisnisUsaha');

        // if ($sosialPendidikan == "on") {
        //     $anggota['sosial_pendidikan'] = "1";
        // } else {
        //     $anggota['sosialPendidikan'] = "0"; 
        // }

        // if ($sosialKemanusiaan == "on") {
        //     $anggota['sosial_kemanusiaan'] = "1";
        // } else {
        //     $anggota['sosial_kemanusiaan'] = "0";
        // }

        // if ($pengembanganSarPras == "on") {
        //     $anggota['pengembangan_sarana_prasarana'] = "1";
        // } else {
        //     $anggota['pengembangan_sarana_prasarana'] = "0";
        // }

        // if ($silaturahim == "on") {
        //     $anggota['silaturahim_kebersamaan'] = "1";
        // } else {
        //     $anggota['silaturahim_kebersamaan'] = "0";
        // }

        // if ($sponsorshipDonasi == "on") {
        //     $anggota['penawaran_sponsorship_donasi'] = "1";
        // } else {
        //     $anggota['penawaran_sponsorship_donasi'] = "0";
        // }

        // if ($support == "on") {
        //     $anggota['support'] = "1";
        // } else {
        //     $anggota['support'] = "0";
        // }

        // if ($loyalist == "on") {
        //     $anggota['loyalist'] = "1";
        // } else {
        //     $anggota['loyalist'] = "0";
        // }

        // $anggota['iuran_sukarela'] = $this->input->post('iuranSukarela');

        $user['username'] = $this->input->post('username');
        $user['role'] = $this->input->post('hakAkses');

        $updateAnggota = $this->M_anggota->updateAnggota($anggota, $idAnggota);

        if (!$updateAnggota) {

            $updateUser = $this->M_user->updateUser($user, $idUser);

            if (!$updateUser) {
                flashMessage('success', 'Data anggota berhasil diubah');
                redirect('admin/Anggota/kelolaAnggota');
            } else {
                flashMessage('error', 'Data anggota gagal diubah! Silahkan coba lagi');
                redirect('admin/Anggota/kelolaAnggota');
            }
        } else {
            flashMessage('error', 'Maaf, Terjadi kesalahan pada perubahan data anggota');
            redirect('admin/Anggota/kelolaAnggota');
        }
    }

    public function hapusAnggota()
    {
        $id = $this->input->post('idAnggotaHapus');
        $idUser = $this->input->post('idUserHapus');

        $deleteAnggota = $this->M_anggota->deleteAnggota($id);

        if (!$deleteAnggota) {

            $deleteUser = $this->M_user->deleteUser($idUser);
            if ($deleteUser) {
                flashMessage('success', 'Anggota berhasil dihapus');
                redirect('koordinator/Anggota/kelolaAnggota');
            } else {
                flashMessage('error', 'Anggota gagal dihapus! Silahkan coba lagi');
                redirect('koordinator/Anggota/kelolaAnggota');
            }
        } else {
            flashMessage('error', 'Maaf, Terjadi kesalahan pada saat penghapusan data anggota');
            redirect('koordinator/Anggota/kelolaAnggota');
        }
    }

    function cariAnggota()
    {
        $nama = $this->input->post('namaAnggota');
        $data['info'] = $this->M_anggota->findAnggota('*', array('tb_anggota.user_id = ' => $this->session->userdata('aid')));
        $angkatan = $data['info'][0]->angkatan;

        $where = "tb_anggota.angkatan = " . $angkatan;
        $anggota['anggota'] = $this->KoordinatorAnggotaModel->getAnggotaByName($where, $nama);

        echo json_encode($anggota);
        echo '<br>';
        echo json_encode($nama);
    }
}
