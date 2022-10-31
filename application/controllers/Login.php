<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('M_user');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}

	public function aksi()
	{

		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username yang Anda Masukkan Salah']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password yang Anda Masukkan Salah']);

		if ($this->form_validation->run() != false) {

			// menangkap data username dan password dari halaman login
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where = array(
				'username' => $username,
				'password' => $password,
				'status' => '1'
			);

			$cek = $this->M_user->cek_login('user', $where)->num_rows();

			if ($cek > 0) {
				redirect(base_url().'login?alert=belum_aktif');
			}

			$where = array(
				'username' => $username,
				'password' => $password,
				'status' => '0'
			);

			// cek kesesuaian login pada table pengguna
			$cek = $this->M_user->cek_login('user', $where)->num_rows();

			// cek jika login benar
			if ($cek > 0) {

				// ambil data pengguna yang melakukan login
				$data = $this->M_user->cek_login('user', $where)->row();

				// buat session untuk pengguna yang berhasil login
				$data_session = array(
					'id' => $data->id_user,
					'username' => $data->username,
					'nama'	=> $data->nama,
					'level' => $data->level,
					'status' => 'telah_login'
				);
				$this->session->set_userdata($data_session);
				
				// alihkan halaman ke halaman dashboard pengguna

				redirect(base_url() . 'dashboard');
			}else {
				redirect(base_url() . 'login?alert=gagal');
			}
		} else {
			$this->load->view('login');
		}
	}
}
