<?php

class M_kurikulum extends CI_Model
{

	// data makul
	function get_kurikulum()
	{
		return $this->db->from("kurikulum")
			->get()
			->result();
	}

	// insert makul
	function insert_kurikulum($data)
	{
		$this->db->insert('kurikulum', $data);
	}

	// get kurikulum by id
	public function get_kurikulum_by_id($id_kurikulum)
	{
		return $this->db->from('kurikulum')
			->where('id_kurikulum', $id_kurikulum)
			->get()
			->result();
	}

	// update kurikulum
	public function update_kurikulum($id_kurikulum, $data)
	{
		$this->db->where('id_kurikulum', $id_kurikulum);
		$this->db->update('kurikulum', $data);
	}

	// delete kurikulum
	// delete user
	public function delete_kurikulum($id_kurikulum)
	{
		$this->db->where('id_kurikulum', $id_kurikulum);
		$this->db->delete('kurikulum');
	}
}
