<?php
defined('BASEPATH') OR exit('Nodirect script access allowed');

class Kelola_resep extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelola_resep_model');
		$this->load->library('session');
      // Cek apakah user sudah login dan memiliki hak akses ke halaman ini
      if (!$this->session->userdata('logged_in') || $this->session->userdata('Tipe_User') != 'apoteker') {
          // Jika tidak, redirect ke halaman login
          redirect('auth');
	  }
	}
        
        public function index()
	{
		$data['title'] = 'Data resep';
		$data['resep'] = $this->kelola_resep_model->get_data('tbl_resep')->result();

		$this->load->view('apoteker/templates/header', $data);
		$this->load->view('apoteker/templates/sidebar', $data);
		$this->load->view('apoteker/kelola_resep', $data);
		$this->load->view('apoteker/templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah resep';

		$this->load->view('apoteker/templates/header', $data);
		$this->load->view('apoteker/templates/sidebar', $data);
		$this->load->view('apoteker/tambah/tambah_resep');
		$this->load->view('apoteker/templates/footer');
	}


	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->tambah();
		 } else {
			 $data = array(
				'No_Resep' => $this->input->post('No_Resep'),
				'Tgl_Resep' => $this->input->post('Tgl_Resep'),
				'Nama_Dokter' => $this->input->post('Nama_Dokter'),
				'Nama_Pasien' => $this->input->post('Nama_Pasien'),
				'Nama_ObatDibeli' => $this->input->post('Nama_ObatDibeli'),
				'Jumlah_ObatDibeli' => $this->input->post('Jumlah_ObatDibeli'),
				'Id_Pasien' => $this->input->post('Id_Pasien')
			);
			$this->kelola_resep_model->insert_data($data,'tbl_resep');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Behasil!</strong> Di Tambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('apoteker/kelola_resep');
		}
	}

	public function edit($Id_Resep)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->index();
		 } else {
			 $data = array(
			 	'Id_Resep' => $Id_Resep,
                 'No_Resep' => $this->input->post('No_Resep'),
                 'Tgl_Resep' => $this->input->post('Tgl_Resep'),
                 'Nama_Dokter' => $this->input->post('Nama_Dokter'),
                 'Nama_Pasien' => $this->input->post('Nama_Pasien'),
                 'Nama_ObatDibeli' => $this->input->post('Nama_ObatDibeli'),
                 'Jumlah_ObatDibeli' => $this->input->post('Jumlah_ObatDibeli'),
                 'Id_Pasien' => $this->input->post('Id_Pasien')
			);
			$this->kelola_resep_model->update_data($data,'tbl_resep');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Data Behasil!</strong> Di Ubah.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
			redirect('apoteker/kelola_resep');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('No_Resep', 'No resep', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Tgl_Resep', 'Tgl_Resep', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Nama_Dokter', 'Nama_Dokter', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Nama_Pasien', 'Nama_Pasien', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Nama_ObatDibeli', 'Nama_ObatDibeli', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Jumlah_ObatDibeli', 'Nama_ObatDibeli', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Id_Pasien', 'Id_Pasien', 'required', array(
             'required' => '%s harus diisi !!'
		));
	}

	public function delete($id)
	{
		$where = array('Id_resep' => $id);

		$this->kelola_resep_model->delete($where, 'tbl_resep');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Data Behasil!</strong> Di Delete.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
	   redirect('apoteker/kelola_resep');

	}
}