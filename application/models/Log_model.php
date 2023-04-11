<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

	public function delete($where, $table)
	{
		  $this->db->where($where);
		 $this->db->delete($table);
    }
    public function insert($data)
    {
        // Insert data login ke dalam tabel log
        $this->db->insert('tbl_log', $data);
    }

    public function get_logs($sort_by = 'Waktu', $sort_order = 'desc')
{
    $this->db->select('tbl_log.*, tbl_user.Nama_User');
    $this->db->join('tbl_user', 'tbl_user.Id_User = tbl_log.Id_User', 'left');
    $this->db->order_by($sort_by, $sort_order);
    $query = $this->

db->get('tbl_log');
return $query->result();
}

}
