<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_kurikulum');
        $this->load->model('M_matakuliah');
        $this->load->model('M_user');
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
        // $data['user'] = $this->M_user->get_data_join(); 
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/matakuliah', $data);
        $this->load->view('dashboard/footer');
    }

    // start crud matakuliah
    public function matakuliah()
    {
        $data['matakuliah'] = $this->M_matakuliah->get_makul(); 
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/matakuliah', $data);
        $this->load->view('dashboard/footer');
    }

    public function matakuliah_tambah()
    {
        $data['dosen'] = $this->M_user->get_all_dosen();
        $data['kurikulum'] = $this->M_kurikulum->get_kurikulum();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/matakuliah_tambah', $data);
        $this->load->view('dashboard/footer');
    }

    public function matakuliah_proses()
    {
        // Wajib isi
        $this->form_validation->set_rules('kode_matakuliah','Kode Mata Kuliah','required');
        $this->form_validation->set_rules('nama_matakuliah','Nama Mata Kuliah','required');
        $this->form_validation->set_rules('dosen', "Nama Dosen", 'required');
        $this->form_validation->set_rules('kurikulum', "Kurikulum", 'required');
        $this->form_validation->set_rules('semester', "Semester", 'required');
        $this->form_validation->set_rules('sks','Jumlah SKS','required');

        if($this->form_validation->run() != false){

            $kodemakul = $this->input->post('kode_matakuliah');
            $makul = $this->input->post('nama_matakuliah');
            $dosen = $this->input->post('dosen');
            $semester = $this->input->post('semester');
            $kurikulum = $this->input->post('kurikulum');
            $sks = $this->input->post('sks');

            $data = array(
                'id_matakuliah' => '',
                'id_kurikulum'      => $kurikulum,
                'id_dosen'          => $dosen,
                'kode_matakuliah'   => 'MK' . str_pad($this->M_matakuliah->get_jumlah_makul() + 1, 3, '0', STR_PAD_LEFT),
                'nama_matakuliah'   => $makul,
                'semester'          => $semester,
                'jumlah_sks'        => $sks
            );


            $this->M_matakuliah->insert_data("matakuliah", $data);

            redirect(base_url().'matakuliah');  

        }else{
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/matakuliah_tambah');
            $this->load->view('dashboard/footer');
        }
    }

    public function matakuliah_aksi()
    {
        // Wajib isi
        $this->form_validation->set_rules('nama_matakuliah','Nama Mata Kuliah','required');
        $this->form_validation->set_rules('kurikulum', "Kurikulum", 'required');
        $this->form_validation->set_rules('dosen', "Dosen", 'required');
        $this->form_validation->set_rules('semester', "Semester", 'required');
        $this->form_validation->set_rules('sks','Jumlah SKS','required');

        if($this->form_validation->run() != false){

            $makul = $this->input->post('nama_matakuliah');
            $dosen = $this->input->post('dosen');
            $semester = $this->input->post('semester');
            $kurikulum = $this->input->post('kurikulum');
            $sks = $this->input->post('sks');

            $data = array(
                'id_kurikulum'      => $kurikulum,
                'id_dosen'          => $dosen,
                'kode_matakuliah'   => 'MK' . str_pad($this->M_matakuliah->get_jumlah_makul() + 1, 3, '0', STR_PAD_LEFT),
                'nama_matakuliah'   => $makul,
                'semester'          => $semester,
                'nama_kurikulum'    => $kurikulum,
                'jumlah_sks'        => $sks
            );


            $this->M_matakuliah->insert_data("matakuliah", $data);

            redirect(base_url().'matakuliah');  

        }else{
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/matakuliah_tambah');
            $this->load->view('dashboard/footer');
        }
    }

    public function matakuliah_update()
    {
        // Wajib isi
        $this->form_validation->set_rules('kode_matakuliah','Kode Mata Kuliah','required');
        $this->form_validation->set_rules('nama_matakuliah','Nama Mata Kuliah','required');
        $this->form_validation->set_rules('dosen', "Nama Dosen", 'required');
        $this->form_validation->set_rules('kurikulum', "Kurikulum", 'required');
        $this->form_validation->set_rules('semester', "Semester", 'required');
        $this->form_validation->set_rules('sks','Jumlah SKS','required');

        if($this->form_validation->run() != false){

            $kodemakul = $this->input->post('kode_matakuliah');
            $makul = $this->input->post('nama_matakuliah');
            $dosen = $this->input->post('dosen');
            $semester = $this->input->post('semester');
            $kurikulum = $this->input->post('kurikulum');
            $sks = $this->input->post('sks');

           $data = array(
                'id_matakuliah' => '',
                'id_kurikulum'      => $kurikulum,
                'id_dosen'          => $dosen,
                'kode_matakuliah'   => 'MK' . str_pad($this->M_matakuliah->get_jumlah_makul() + 1, 3, '0', STR_PAD_LEFT),
                'nama_matakuliah'   => $makul,
                'semester'          => $semester,
                'jumlah_sks'        => $sks
            );
            
            $where = array(
                'id_matakuliah' => $id
            );

            $this->M_matakuliah->update_matakuliah($id, $data);

            redirect(base_url().'matakuliah');
        }else{
            redirect(base_url() . 'matakuliah/matakuliah_edit/' . $id);
        }
    }

    public function matakuliah_edit($id_matakuliah)
    {
        $data['matakuliah'] = $this->M_matakuliah->get_makul_by_id($id_matakuliah);
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/matakuliah_edit', $data);
        $this->load->view('dashboard/footer');
    }

    public function matakuliah_hapus($id)
    {
        $where = $id;

        $this->M_matakuliah->delete_data($where,'matakuliah');

        redirect(base_url().'matakuliah');
    }

    // end crud matakuliah

    public function matakuliah_cetak()
    {
        $data['matakuliah'] = $this->M_matakuliah->get_makul();
        $this->load->view('dashboard/matakuliah_cetak', $data);
    }

    public function matakuliah_cetak_excel()
    {
        $data['matakuliah'] = $this->M_matakuliah->get_makul();
        $this->load->view('dashboard/matakuliah_cetak_excel', $data);
    }

}