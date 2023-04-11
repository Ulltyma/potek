<?php
defined('BASEPATH') OR exit('Nodirect script access allowed');

class Kelola_laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelola_laporan_model');
		$this->load->library('session');
      // Cek apakah user sudah login dan memiliki hak akses ke halaman ini
      if (!$this->session->userdata('logged_in') || $this->session->userdata('Tipe_User') != 'admin') {
          // Jika tidak, redirect ke halaman login
          redirect('auth');
	  }
	}
        
        public function index()
	{
		$data['title'] = 'Data laporan';
		$data['laporan'] = $this->kelola_laporan_model->get_data('tbl_transaksi')->result();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/kelola_laporan', $data);
		$this->load->view('admin/templates/footer');
	}

}