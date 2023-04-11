<?php
defined('BASEPATH') OR exit('Nodirect script access allowed');

 class Kelola_resep_model extends CI_Model {

	public function get_data($table)
	{
		return $this->db->get($table);

	}

	public function insert_data($data, $table)
	{
		 $this->db->insert($table, $data);
	}

	public function update_data($data, $table)
	{
		 $this->db->where('Id_Resep', $data['Id_Resep']);
		 $this->db->update($table, $data);
	}

	public function delete($where, $table)
	{
		  $this->db->where($where);
		 $this->db->delete($table);
	}

}