<?php

class M_matakuliah extends CI_Model
{
	// hitung jumlah makul
	function get_jumlah_makul()
	{
		$data = $this->db->query("SELECT * FROM matakuliah");
		return $data->num_rows();
	}

	// data makul
	function get_makul()
	{
		$query = "SELECT a.*,b.nama_kurikulum, c.nama FROM matakuliah AS a
		JOIN kurikulum AS b
		ON a.id_kurikulum = b.id_kurikulum
		JOIN user as c
		ON a.id_dosen = c.id_user";

		return $this->db->query($query)->result();
	}

	public function get_makul_by_id($id_matakuliah)
	{
		return $this->db->from('matakuliah')
			->where('id_matakuliah', $id_matakuliah)
			->get()
			->result();
	}

	// insert makul
	function insert_data($table, $data)
	{
		$this->db->insert($table,$data);
	}

	// update matakuliah
	public function update_matakuliah($id_matakuliah, $data)
	{
		$this->db->where('id_matakuliah', $id_matakuliah);
		$this->db->update('matakuliah', $data);
	}

	// delete makul
	public function delete_data($id_matakuliah)
	{
		$this->db->where('id_matakuliah', $id_matakuliah);
		$this->db->delete('matakuliah');
	}

}
