<?php
defined('BASEPATH') OR exit('Nodirect script access allowed');

class Kelola_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelola_user_model');
		$this->load->library('session');
      // Cek apakah user sudah login dan memiliki hak akses ke halaman ini
      if (!$this->session->userdata('logged_in') || $this->session->userdata('Tipe_User') != 'admin') {
          // Jika tidak, redirect ke halaman login
          redirect('auth');
	  }
	}
        
        public function index()
	{
		$data['title'] = 'Data User';
		$data['user'] = $this->kelola_user_model->get_data('tbl_user')->result();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/kelola_user', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah user';

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/tambah/tambah_user');
		$this->load->view('admin/templates/footer');
	}


	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->tambah();
		 } else {
			 $data = array(
				'Tipe_User' => $this->input->post('Tipe_User'),
				'Nama_User' => $this->input->post('Nama_User'),
				'Alamat' => $this->input->post('Alamat'),
				'Telepon' => $this->input->post('Telepon'),
				'Username' => $this->input->post('Username'),
				'Password' => $this->input->post('Password')

			);
			$this->kelola_user_model->insert_data($data,'tbl_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Behasil!</strong> Di Tambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/kelola_user');
		}
	}

	public function edit($Id_User)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->index();
		 } else {
			 $data = array(
			 	'Id_User' => $Id_User,
                 'Tipe_User' => $this->input->post('Tipe_User'),
                 'Nama_User' => $this->input->post('Nama_User'),
                 'Alamat' => $this->input->post('Alamat'),
                 'Telepon' => $this->input->post('Telepon'),
                 'Username' => $this->input->post('Username'),
                 'Password' => $this->input->post('Password')

			);
			$this->kelola_user_model->update_data($data,'tbl_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Data Behasil!</strong> Di Ubah.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
			redirect('admin/kelola_user');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('Tipe_User', 'Tipe User', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Nama_User', 'Nama User', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Telepon', 'Telepon', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Username', 'Username', 'required', array(
             'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('Password', 'Password', 'required', array(
             'required' => '%s harus diisi !!'
		));
	}

	public function delete($id)
	{
		$where = array('Id_user' => $id);

		$this->kelola_user_model->delete($where, 'tbl_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Data Behasil!</strong> Di Delete.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
	   redirect('admin/kelola_user');

	}
}