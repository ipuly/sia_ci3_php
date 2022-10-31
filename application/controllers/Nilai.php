<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_krs');
        $this->load->model('M_nilai');
        $this->load->model('M_matakuliah');

        // cek session yang login, 
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
        // maka halaman akan di alihkan kembali ke halaman login.
        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data['krs'] = $this->M_krs->get_all_krs_dosen($this->session->userdata('id'));
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/nilai', $data);
        $this->load->view('dashboard/footer');
    }

    public function nilai_tambah()
    {
        $data['matakuliah'] = $this->M_krs->get_all_by_dosen($this->session->userdata('id'));
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/nilai_tambah', $data);
        $this->load->view('dashboard/footer');
    }

    public function nilai_aksi()
    {
        // Wajib isi
        $this->form_validation->set_rules('makul','Nama Mata Kuliah','required|trim|is_unique[matakuliah.nama_matakuliah]', [
            'required' => 'Nilai harus di isi',
            'is_unique' => 'Nilai Mata Kuliah ada'
        ]);
        $this->form_validation->set_rules('nilai', "Nilai", 'required');

        if($this->form_validation->run() != false){

            $makul = $this->input->post('makul');
            $nilai = $this->input->post('nilai');

            if ($nilai >= 80) {
                $grade = "A";
                $poin = "4";
            } elseif ($nilai >= 70 && $nilai < 80) {
                $grade = "B";
                $poin = "3";
            } elseif ($nilai >= 60 && $nilai < 70) {
                $grade = "C";
                $poin = "2";
            } elseif ($nilai >= 50 && $nilai < 60) {
                $grade = "D";
                $poin = "1";
            } else {
                $grade = "E";
                $poin = "0";
            }

            $data = array(
                'id_krs' => $makul,
                'nilai' => $nilai,
                'grade' => $grade,
                'poin' => $poin,
            );


            $this->M_nilai->insert_nilai("nilai", $data);

            redirect(base_url().'nilai');  

        }else{
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/nilai_tambah');
            $this->load->view('dashboard/footer');
        }
    }

    public function nilai_edit($id_nilai)
    {   
        $data['id_nilai'] = $id_nilai;
        $data['matakuliah'] = $this->M_krs->get_all_by_dosen($this->session->userdata('id'));
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/nilai_edit', $data);
        $this->load->view('dashboard/footer');
    }


    public function nilai_update($id_nilai)
    {
        // Wajib isi
        $this->form_validation->set_rules('makul','Nama Mata Kuliah','required|trim|is_unique[matakuliah.nama_matakuliah]', [
            'required' => 'Nilai harus di isi',
            'is_unique' => 'Nilai Mata Kuliah ada'
        ]);
        $this->form_validation->set_rules('nilai', "Nilai", 'required');

        if($this->form_validation->run() != false){

            $makul = $this->input->post('makul');
            $nilai = $this->input->post('nilai');

            if ($nilai >= 80) {
                $grade = "A";
                $poin = "4";
            } elseif ($nilai >= 70 && $nilai < 80) {
                $grade = "B";
                $poin = "3";
            } elseif ($nilai >= 60 && $nilai < 70) {
                $grade = "C";
                $poin = "2";
            } elseif ($nilai >= 50 && $nilai < 60) {
                $grade = "D";
                $poin = "1";
            } else {
                $grade = "E";
                $poin = "0";
            }

            $data = array(
                'id_krs' => $makul,
                'nilai' => $nilai,
                'grade' => $grade,
                'poin' => $poin,
            );

            $this->M_nilai->update_nilai($id_nilai, $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Berhasil Diupdate!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect(base_url() . 'nilai');
        } else {
            redirect(base_url() . 'user/nilai_edit/' . $id);
        }
    }

    public function nilai_hapus($id_nilai)
    {
        $this->M_nilai->delete_nilai($id_nilai);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Berhasil Dihapus!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
        redirect(base_url().'nilai');
    }

}