<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_register');
    }

    public function register_dosen()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus di isi',
            'is_unique' => 'Username telah digunakan'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {

            if ($this->input->post()) {
                $data = [
                    'username' => $this->input->post('username'),
                    'nama' => $this->input->post('nama'),
                    'password' => $this->input->post('password'),
                    'nomor_identitas' => $this->input->post('username'),
                    'level' => '2',
                    'status' => '1'
                ];

                $this->M_register->insert_dosen($data);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    Register Akun Dosen Berhasil!
                    </div> <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <small>Silahkan Tunggu atau Hubungi Staff untuk Aktivasi!<small>
                    </div>');
                return redirect('login');
            }

        }else{
            $this->load->view('register_dosen'); 
        }
    }

    public function register_mahasiswa()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus di isi',
            'is_unique' => 'Username telah digunakan'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {

            if ($this->input->post()) {
                $data = [
                    'username' => $this->input->post('username'),
                    'nama' => $this->input->post('nama'),
                    'password' => $this->input->post('password'),
                    'nomor_identitas' => $this->input->post('username'),
                    'level' => '1',
                    'status' => '1'
                ];
                $this->M_register->insert_mahasiswa($data);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    Register Akun Mahasiswa Berhasil!
                    </div> <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <small>Silahkan Tunggu atau Hubungi Staff untuk Aktivasi!<small>
                    </div>');
                return redirect('login');
            }

        }else{
            $this->load->view('register_mahasiswa'); 
        }
    }

}
