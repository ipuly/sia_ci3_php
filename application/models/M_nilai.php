<?php

class M_nilai extends CI_Model
{

	public function get_nilai()
	{
		return $this->db->from('nilai')
			->join('krs', 'nilai.id_krs=krs.id_krs')
			->get()
			->result();
	}

	public function insert_nilai($table, $data)
	{
		$this->db->insert($table, $data);
	}

	// update nilai
	public function update_nilai($id_nilai, $data)
	{
		$this->db->where('id_nilai', $id_nilai);
		$this->db->update('nilai', $data);
	}

	// delete nilai
	public function delete_nilai($id_nilai)
	{
		$this->db->where('id_nilai', $id_nilai);
		$this->db->delete('nilai');
	}

}
