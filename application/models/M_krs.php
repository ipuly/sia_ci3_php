<?php

class M_krs extends CI_Model
{
	public function get_krs_by_id($id_mahasiswa)
	{
		return $this->db->from('krs')
			->join('matakuliah', 'krs.id_matakuliah=matakuliah.id_matakuliah')
			->join('user', 'matakuliah.id_dosen=user.id_user')
			->where('krs.id_mahasiswa', $id_mahasiswa)
			->get()
			->result();
	}

	// insert makul
	public function insert_krs($data)
	{
		$this->db->insert('krs', $data);
	}

	// delete krs
	public function delete_krs($id_krs)
	{
		$this->db->where('id_krs', $id_krs);
		$this->db->delete('krs');
	}

	// get all krs
	public function get_all_krs_dosen($id_dosen)
	{
		return $this->db->from('krs')
			->join('matakuliah', 'krs.id_matakuliah=matakuliah.id_matakuliah')
			->join('user', 'krs.id_mahasiswa=user.id_user')
			->join('nilai', 'krs.id_krs=nilai.id_krs')
			->where('matakuliah.id_dosen', $id_dosen)
			->get()
			->result();
	}

	public function get_all_by_dosen($id_dosen)
	{
		return $this->db->from('krs')
			->join('matakuliah', 'krs.id_matakuliah=matakuliah.id_matakuliah')
			->join('user', 'krs.id_mahasiswa=user.id_user')
			->where('matakuliah.id_dosen', $id_dosen)
			->get()
			->result();
	}

	public function khs($id_mahasiswa)
	{
		return $this->db->from('krs')
			->join('matakuliah', 'krs.id_matakuliah=matakuliah.id_matakuliah')
			->join('user', 'matakuliah.id_dosen=user.id_user')
			->join('nilai', 'krs.id_krs=nilai.id_krs')
			->where('krs.id_mahasiswa', $id_mahasiswa)
			->get()
			->result();
	}
}
