<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurikulum extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_kurikulum');
        // cek session yang login, 
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
        // maka halaman akan di alihkan kembali ke halaman login.
        if ($this->session->userdata('status') != "telah_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data['kurikulum'] = $this->M_kurikulum->get_kurikulum();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/kurikulum', $data);
        $this->load->view('dashboard/footer');
    }

    // start crud user
    public function kurikulum()
    {
        $data['kurikulum'] = $this->M_kurikulum->get_kurikulum();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/kurikulum', $data);
        $this->load->view('dashboard/footer');
    }

    public function kurikulum_tambah()
    {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/kurikulum_tambah');
        $this->load->view('dashboard/footer');
    }

    public function kurikulum_aksi()
    {
        // Wajib isi
        $this->form_validation->set_rules('nama_kurikulum', 'Nama Kurikulum', 'required');

        if ($this->form_validation->run() != false) {

            $nama_kurikulum = $this->input->post('nama_kurikulum');

            $data = array(
                'nama_kurikulum' => $nama_kurikulum,
            );


            $this->M_kurikulum->insert_kurikulum($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');

            redirect(base_url() . 'kurikulum');
        } else {
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/kurikulum_tambah');
            $this->load->view('dashboard/footer');
        }
    }

    public function kurikulum_edit($id_kurikulum)
    {
        $data['kurikulum'] = $this->M_kurikulum->get_kurikulum_by_id($id_kurikulum);
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/kurikulum_edit', $data);
        $this->load->view('dashboard/footer');
    }


    public function kurikulum_update()
    {
        // Wajib isi
        $this->form_validation->set_rules('nama_kurikulum', 'Nama Kurikulum', 'required');

        // get id
        
        $id = $this->input->post('id');

        if ($this->form_validation->run() != false) {


            $nama_kurikulum = $this->input->post('nama_kurikulum');

            $data = array(
                'nama_kurikulum' => $nama_kurikulum,
            );


            $this->M_kurikulum->update_kurikulum($id, $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Berhasil Diupdate!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');

            redirect(base_url() . 'kurikulum');
        } else {
            $data['kurikulum'] = $this->M_kurikulum->get_kurikulum_by_id($id);
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/kurikulum_edit', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function kurikulum_hapus($id)
    {
        $this->M_kurikulum->delete_kurikulum($id);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Berhasil Dihapus!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
        redirect(base_url() . 'kurikulum');
    }

}
