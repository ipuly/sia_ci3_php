<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khs extends CI_Controller {

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
        $data['khs'] = $this->M_krs->khs($this->session->userdata('id'));
   
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/khs', $data);
        $this->load->view('dashboard/footer');
    }

    public function print()
    {
        $data['khs'] = $this->M_krs->khs($this->session->userdata('id'));
        $this->load->view('print_khs', $data);
    }

    public function print_excel()
    {
        $data['khs'] = $this->M_krs->khs($this->session->userdata('id'));
        $this->load->view('print_excel_khs', $data);
    }

}