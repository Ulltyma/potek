<?php
class Dashboard extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      // Load model dan library yang diperlukan
      $this->load->model('log_model');
      $this->load->library('session');
      // Cek apakah user sudah login dan memiliki hak akses ke halaman ini
      if (!$this->session->userdata('logged_in') || $this->session->userdata('Tipe_User') != 'admin') {
          // Jika tidak, redirect ke halaman login
          redirect('auth');
      }
  }

  public function index()
  {
      $data['title'] = 'Dashboard';

      // Memanggil data join dari model
      $data['logs'] = $this->log_model->get_logs();

      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar', $data);
      $this->load->view('admin/dashboard', $data);
      $this->load->view('admin/templates/footer', $data);
  }

  public function delete($Id_Log)
  {
      $where = array('Id_Log' => $Id_Log);

      $this->log_model->delete($where, 'tbl_log');
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Behasil!</strong> Di Delete.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
     redirect('admin/dashboard');

  }

}
