<?php
defined('BASEPATH') OR exit('Nodirect script access allowed');

class Kelola_transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelola_transaksi_model');
		$this->load->library('session');
      // Cek apakah user sudah login dan memiliki hak akses ke halaman ini
      if (!$this->session->userdata('logged_in') || $this->session->userdata('Tipe_User') != 'kasir') {
          // Jika tidak, redirect ke halaman login
          redirect('auth');
	  }
	}
        
        public function index()
	{
		$data['title'] = 'Data transaksi';
		$data['transaksi'] = $this->kelola_transaksi_model->get_data('tbl_transaksi')->result();

		$this->load->view('kasir/templates/header', $data);
		$this->load->view('kasir/templates/sidebar', $data);
		$this->load->view('kasir/kelola_transaksi', $data);
		$this->load->view('kasir/templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah transaksi';

		$this->load->view('kasir/templates/header', $data);
		$this->load->view('kasir/templates/sidebar', $data);
		$this->load->view('kasir/tambah/tambah_transaksi');
		$this->load->view('kasir/templates/footer');
	}


	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->tambah();
		 } else {
			 $data = array(
				'No_transaksi' => $this->input->post('No_transaksi'),
				'Tgl_transaksi' => $this->input->post('Tgl_transaksi'),
				'Total_Bayar' => $this->input->post('Total_Bayar'),
				'Id_User' => $this->input->post('Id_User'),
				'Id_Obat' => $this->input->post('Id_Obat'),
				'Id_Resep' => $this->input->post('Id_Resep')
			);
			$this->kelola_transaksi_model->insert_data($data,'tbl_transaksi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Behasil!</strong> Di Tambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('kasir/kelola_transaksi');
		}
	}

	public function edit($Id_Transaksi)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->index();
		 } else {
			 $data = array(
			 	'Id_Transaksi' => $Id_Transaksi,
                 'No_transaksi' => $this->input->post('No_transaksi'),
                 'Tgl_transaksi' => $this->input->post('Tgl_transaksi'),
                 'Total_Bayar' => $this->input->post('Total_Bayar'),
                 'Id_User' => $this->input->post('Id_User'),
                 'Id_Obat' => $this->input->post('Id_Obat'),
                 'Id_Resep' => $this->input->post('Id_Resep')
			);
			$this->kelola_transaksi_model->update_data($data,'tbl_transaksi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Data Behasil!</strong> Di Ubah.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
			redirect('kasir/kelola_transaksi');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('No_transaksi', 'No transaksi', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Tgl_transaksi', 'Tgl_transaksi', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Total_Bayar', 'Total_Bayar', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Id_User', 'Id_User', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Id_Obat', 'Id_Obat', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Id_Resep', 'Id_Obat', 'required', array(
             'required' => '%s harus diisi !!'
		));
	}

	public function delete($id)
	{
		$where = array('Id_Transaksi' => $id);

		$this->kelola_transaksi_model->delete($where, 'tbl_transaksi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Data Behasil!</strong> Di Delete.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
	   redirect('kasir/kelola_transaksi');

	}
}