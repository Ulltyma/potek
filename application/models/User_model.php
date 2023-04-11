<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function login($username, $password)
    {
        // Query untuk mengambil data user berdasarkan username dan password
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_user');

        // Jika data user ditemukan, return data user
        if ($query->num_rows() == 1) {
            return $query->row();
        }

        // Jika data user tidak ditemukan, return false
        return false;
    }

}
