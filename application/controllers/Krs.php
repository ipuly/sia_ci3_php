<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_kurikulum');
        $this->load->model('M_matakuliah');
        $this->load->model('M_user');
        $this->load->model('M_krs');
        // cek session yang login, 
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
        // maka halaman akan di alihkan kembali ke halaman login.
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
        }
    }

    public function index()
    { 
        $data['matakuliah'] = $this->M_matakuliah->get_makul(); 
        $data['krs'] = $this->M_krs->get_krs_by_id($this->session->userdata('id'));
   
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/krs', $data);
        $this->load->view('dashboard/footer');
    }

    // start crud matakuliah
    public function krs()
    {
        $data['matakuliah'] = $this->M_matakuliah->get_makul();
        $data['krs'] = $this->M_krs->get_krs_by_id($this->session->userdata('id'));

        $this->load->view('dashboard/header');
        $this->load->view('dashboard/matakuliah', $data);
        $this->load->view('dashboard/footer');
    }

    public function krs_aksi()
    {
        // Wajib isi
        $this->form_validation->set_rules('matakuliah','Nama Mata Kuliah','required');
        $this->form_validation->set_rules('tahun','Tahun Ajaran','required');

        if($this->form_validation->run() != false){

            $makul = $this->input->post('matakuliah');
            $tahun = $this->input->post('tahun');


            $data = array(
                'id_matakuliah' => $makul,
                'id_mahasiswa'  => $this->session->userdata('id'),
                'tahun_ajaran'  => $tahun,
            );


            $this->M_krs->insert_krs($data);

            redirect(base_url().'krs');  

        }else{
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/krs');
            $this->load->view('dashboard/footer');
        }
    }

    public function krs_hapus($id_krs)
    {
        $this->M_krs->delete_krs($id_krs);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                KRS Berhasil Dihapus!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
        redirect(base_url().'krs');
    }

}