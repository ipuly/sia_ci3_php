<?php

class M_user extends CI_Model
{

	// cek login
	public function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	// insert user
	public function insert_user($data)
	{
		return $this->db->insert('user', $data);
	}

	// jumlah dosen
	public function get_jumlah_dosen()
	{
		return $this->db->from('user')
			->where('level', '2')
			->get()
			->num_rows();
	}

	// jumlah mahasiswa
	public function get_jumlah_mahasiswa()
	{
		return $this->db->from('user')
			->where('level', '1')
			->get()
			->num_rows();
	}

	// semua mahasiswa
	public function get_all_mahasiswa()
	{
		return $this->db->from('user')
			->where('level', '1')
			->get()
			->result();
	}

	// semua dosen
	public function get_all_dosen()
	{
		return $this->db->from('user')
			->where('level', '2')
			->get()
			->result();
	}

	// semua user
	public function get_all_user()
	{
		return $this->db->from('user')
			->get()
			->result();
	}

	// get data by id
	public function get_user_by_id($id_user)
	{
		return $this->db->from('user')
			->where('id_user', $id_user)
			->get()
			->result();
	}

	// update user
	public function update_user($id_user, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	// delete user
	public function delete_user($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}

	// insert dosen
	public function insert_dosen($data)
	{
		return $this->db->insert('user', $data);
	}

	public function insert_mahasiswa($data)
	{
		return $this->db->insert('user', $data);
	}

}
