<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_user');

        // cek session yang login, 
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
        // maka halaman akan di alihkan kembali ke halaman login.
        if ($this->session->userdata('status') != "telah_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data['user'] = $this->M_user->get_all_user();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/user', $data);
        $this->load->view('dashboard/footer');
    }

    // start crud user
    public function user()
    {
        $data['user'] = $this->M_user->get_all_user();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/user', $data);
        $this->load->view('dashboard/footer');
    }


    public function user_tambah()
    {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/user_tambah');
        $this->load->view('dashboard/footer');
    }

    public function user_aksi()
    {
        // Wajib isi
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus di isi',
            'is_unique' => 'Username telah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Password Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            if ($level === '2') {
                $nomor_identitas = 'D' . str_pad($this->M_user->get_jumlah_dosen() + 1, 3, '0', STR_PAD_LEFT);
            } elseif ($level === '1') {
                $nomor_identitas = 'M' . str_pad($this->M_user->get_jumlah_mahasiswa() + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $nomor_identitas = null;
            }
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'nomor_identitas' => $nomor_identitas,
                'level' => $level,
                'status' => $status
            );


            $this->M_user->insert_user($data, 'user');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url() . 'user');
        } else {
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/user_tambah');
            $this->load->view('dashboard/footer');
        }
    }

    public function user_edit($id_user)
    {
        $data['user'] = $this->M_user->get_user_by_id($id_user);
        // var_dump($data);
        // die;
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/user_edit', $data);
        $this->load->view('dashboard/footer');
    }


    public function user_update()
    {
        // Wajib isi
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

        // get id
        $id = $this->input->post('id');

        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            $data = array(
                'username'  => $username,
                'password'  => $password,
                'nama'      => $nama,
                'email'     => $email,
                'alamat'    => $alamat,
                'no_hp'     => $no_hp,
                'level'     => $level,
                'status'    => $status
            );

            $this->M_user->update_user($id, $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Berhasil Diupdate!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url() . 'user');
        } else {
            redirect(base_url() . 'user/user_edit/' . $id);
        }
    }

    public function user_hapus($id_user)
    {
        $this->M_user->delete_user($id_user);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Berhasil Dihapus!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
        redirect(base_url() . 'user');
    }

    // mahasiswa

    public function mahasiswa()
    {
        $data['mahasiswa'] = $this->M_user->get_all_mahasiswa();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/mahasiswa', $data);
        $this->load->view('dashboard/footer');
    }

    public function mahasiswa_setting()
    {
        $data['mahasiswa'] = $this->M_user->get_all_mahasiswa();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/mahasiswa_setting', $data);
        $this->load->view('dashboard/footer');

        // Wajib isi
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

        // get id
        $id = $this->input->post('id');

        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            $data = array(
                'username'  => $username,
                'password'  => $password,
                'nama'      => $nama,
                'email'     => $email,
                'alamat'    => $alamat,
                'no_hp'     => $no_hp,
                'level'     => $level,
                'status'    => $status
            );

            $this->M_user->update_user($id, $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Berhasil Diupdate!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url() . 'user/mahasiswa');
        } else {
            redirect(base_url() . 'user/mahasiswa_setting/' . $id);
        }
    }

    public function mahasiswa_tambah()
    {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/mahasiswa_tambah');
        $this->load->view('dashboard/footer');
    }

    public function mahasiswa_aksi()
    {
        // Wajib isi
        $this->form_validation->set_rules('username','NIM Mahasiswa','required|trim|is_unique[user.username]', [
            'required' => 'NIM harus di isi',
            'is_unique' => 'NIM telah digunakan'
        ]);
        $this->form_validation->set_rules('nama_mahasiswa','Nama Mahasiswa','required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP Pengguna', 'required');

        if($this->form_validation->run() != false){

            $username = $this->input->post('username');
            $nama_mahasiswa = $this->input->post('nama_mahasiswa');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');

            $data = array(
                'id_user' => '',
                'username' => $username,
                'password' => $username,
                'nama' => $nama_mahasiswa,
                'email' => $email,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'nomor_identitas' => $username,
                'level' => '1',
                'status' => '0'
            );


            $this->M_user->insert_mahasiswa($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url().'user/mahasiswa');  

        }else{
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/mahasiswa_tambah');
            $this->load->view('dashboard/footer');
        }
    }

    public function mahasiswa_edit($id_user)
    {
        $data['user'] = $this->M_user->get_user_by_id($id_user);
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/mahasiswa_edit', $data);
        $this->load->view('dashboard/footer');
    }


    public function mahasiswa_update()
    {
        // Wajib isi
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

        // get id
        $id = $this->input->post('id');

        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            $data = array(
                'username'  => $username,
                'password'  => $password,
                'nama'      => $nama,
                'email'     => $email,
                'alamat'    => $alamat,
                'no_hp'     => $no_hp,
                'level'     => $level,
                'status'    => $status
            );

            $this->M_user->update_user($id, $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Berhasil Diupdate!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url() . 'user/mahasiswa');
        } else {
            redirect(base_url() . 'user/mahasiswa_edit/' . $id);
        }
    }

    public function mahasiswa_hapus($id_user)
    {
        $this->M_user->delete_user($id_user);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Berhasil Dihapus!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
        redirect(base_url().'user/mahasiswa');
    }

    public function mahasiswa_cetak()
    {
        $data['mahasiswa'] = $this->M_user->get_all_mahasiswa();
        $this->load->view('dashboard/mahasiswa_cetak', $data);
    }

    public function mahasiswa_cetak_excel()
    {
        $data['mahasiswa'] = $this->M_user->get_all_mahasiswa();
        $this->load->view('dashboard/mahasiswa_cetak_excel', $data);
    }

    // end mahasiswa

    // dosen
    public function dosen()
    {
        $data['dosen'] = $this->M_user->get_all_dosen();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/dosen', $data);
        $this->load->view('dashboard/footer');
    }

    public function dosen_setting()
    {
        if ($this->session->userdata('level') != 2) {
            redirect(base_url() . 'user/dosen_setting');
        }

        // Wajib isi
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

        // get id
        $id = $this->input->post('id');

        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            $data = array(
                'username'  => $username,
                'password'  => $password,
                'nama'      => $nama,
                'email'     => $email,
                'alamat'    => $alamat,
                'no_hp'     => $no_hp,
                'level'     => $level,
                'status'    => $status
            );

            $this->M_user->update_user($id, $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Berhasil Diupdate!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url() . 'user/dosen');
        } else {
            redirect(base_url() . 'user/dosen_setting/' . $id);
        }
    }

    public function dosen_tambah()
    {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/dosen_tambah');
        $this->load->view('dashboard/footer');
    }

    public function dosen_aksi()
    {
        // Wajib isi
        $this->form_validation->set_rules('username','NIP Dosen','required|trim|is_unique[user.username]', [
            'required' => 'NIP harus di isi',
            'is_unique' => 'NIP telah digunakan'
        ]);
        $this->form_validation->set_rules('nama_dosen','Nama Dosen','required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP Pengguna', 'required');

        if($this->form_validation->run() != false){

            $username = $this->input->post('username');
            $nama_dosen = $this->input->post('nama_dosen');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');

            $data = array(
                'id_user' => '',
                'username' => $username,
                'password' => $username,
                'nama' => $nama_dosen,
                'email' => $email,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'nomor_identitas' => $username,
                'level' => '2',
                'status' => '0'
            );


            $this->M_user->insert_dosen($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url().'user/dosen');  

        }else{
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/dosen_tambah');
            $this->load->view('dashboard/footer');
        }
    }

    public function dosen_edit($id_user)
    {
        $data['user'] = $this->M_user->get_user_by_id($id_user);
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/dosen_edit', $data);
        $this->load->view('dashboard/footer');
    }


    public function dosen_update()
    {
        // Wajib isi
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

        // get id
        $id = $this->input->post('id');

        if ($this->form_validation->run() != false) {

            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            $data = array(
                'username'  => $username,
                'password'  => $password,
                'nama'      => $nama,
                'email'     => $email,
                'alamat'    => $alamat,
                'no_hp'     => $no_hp,
                'level'     => $level,
                'status'    => $status
            );

            $this->M_user->update_user($id, $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Berhasil Diupdate!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url() . 'user/dosen');
        } else {
            redirect(base_url() . 'user/dosen_edit/' . $id);
        }
    }

    public function dosen_hapus($id_user)
    {
        $this->M_user->delete_user($id_user);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Berhasil Dihapus!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
        redirect(base_url().'user/dosen');
    }

    public function dosen_cetak()
    {
        $data['dosen'] = $this->M_user->get_all_dosen();
        $this->load->view('dashboard/dosen_cetak', $data);
    }

    public function dosen_cetak_excel()
    {
        $data['dosen'] = $this->M_user->get_all_dosen();
        $this->load->view('dashboard/dosen_cetak_excel', $data);
    }
    // end dosen
}
