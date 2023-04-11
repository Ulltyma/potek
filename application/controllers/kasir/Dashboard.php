<?php
class Dashboard extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      // Load model dan library yang diperlukan
      $this->load->library('session');
      // Cek apakah user sudah login dan memiliki hak akses ke halaman ini
      if (!$this->session->userdata('logged_in') || $this->session->userdata('Tipe_User') != 'kasir') {
          // Jika tidak, redirect ke halaman login
          redirect('auth');
      }
  }

  public function index()
  {
      $data['title'] = 'Dashboard';

      $this->load->view('kasir/templates/header', $data);
      $this->load->view('kasir/templates/sidebar', $data);
      $this->load->view('kasir/dashboard', $data);
      $this->load->view('kasir/templates/footer', $data);
  }

 

}
