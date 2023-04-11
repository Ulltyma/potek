<?php
defined('BASEPATH') OR exit('Nodirect script access allowed');

class Kelola_obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelola_obat_model');
		$this->load->library('session');
      // Cek apakah user sudah login dan memiliki hak akses ke halaman ini
      if (!$this->session->userdata('logged_in') || $this->session->userdata('Tipe_User') != 'admin') {
          // Jika tidak, redirect ke halaman login
          redirect('auth');
	  }
	}
        
        public function index()
	{
		$data['title'] = 'Data obat';
		$data['obat'] = $this->kelola_obat_model->get_data('tbl_obat')->result();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/kelola_obat', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah obat';

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/tambah/tambah_obat');
		$this->load->view('admin/templates/footer');
	}


	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->tambah();
		 } else {
			 $data = array(
				'Kode_Obat' => $this->input->post('Kode_Obat'),
				'Nama_Obat' => $this->input->post('Nama_Obat'),
				'Expired_Date' => $this->input->post('Expired_Date'),
				'Jumlah' => $this->input->post('Jumlah'),
				'Harga' => $this->input->post('Harga')

			);
			$this->kelola_obat_model->insert_data($data,'tbl_obat');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Behasil!</strong> Di Tambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/kelola_obat');
		}
	}

	public function edit($Id_Obat)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->index();
		 } else {
			 $data = array(
			 	'Id_Obat' => $Id_Obat,
                 'Kode_Obat' => $this->input->post('Kode_Obat'),
                 'Nama_Obat' => $this->input->post('Nama_Obat'),
                 'Expired_Date' => $this->input->post('Expired_Date'),
                 'Jumlah' => $this->input->post('Jumlah'),
                 'Harga' => $this->input->post('Harga')

			);
			$this->kelola_obat_model->update_data($data,'tbl_obat');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Data Behasil!</strong> Di Ubah.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
			redirect('admin/kelola_obat');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('Kode_Obat', 'Nama obat', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Nama_Obat', 'Nama_Obat', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Expired_Date', 'Expired_Date', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Harga', 'Harga', 'required', array(
             'required' => '%s harus diisi !!'
		));
	}

	public function delete($id)
	{
		$where = array('Id_Obat' => $id);

		$this->kelola_obat_model->delete($where, 'tbl_obat');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Data Behasil!</strong> Di Delete.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
	   redirect('admin/kelola_obat');

	}
}