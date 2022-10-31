<?php

class M_register extends CI_Model
{

	public function insert_dosen($data)
	{
		return $this->db->insert('user', $data);
	}

	public function insert_mahasiswa($data)
	{
		return $this->db->insert('user', $data);
	}
}
