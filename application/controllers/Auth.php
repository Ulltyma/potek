<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('log_model');
    }

    public function index()
    {
        // Validasi form login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            // Jika validasi gagal, tampilkan halaman login
            $this->load->view('login');
        }
        else
        {
            // Ambil data username dan password dari form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Cek apakah username dan password cocok dengan data yang ada di database
            $user = $this->user_model->login($username, $password);

            if ($user) {
                // Buat session berdasarkan tipe user dan redirect ke halaman dashboard
                $session_data = array(
                    'Id_User' => $user->Id_User,
                    'Username' => $user->Username,
                    'Tipe_User' => $user->Tipe_User,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                // Masukkan data login ke dalam tabel log
                $log_data = array(
                    'Id_User' => $user->Id_User,
                    'aktifitas' => 'Login',
                    'Waktu' => date('Y-m-d H:i:s')
                );
                $this->log_model->insert($log_data);

                // Redirect ke halaman dashboard berdasarkan tipe user
                switch ($user->Tipe_User) {
                    case 'admin':
                        redirect('admin/dashboard');
                        break;
                    case 'apoteker':
                        redirect('apoteker/dashboard');
                        break;
                    case 'kasir':
                        redirect('kasir/dashboard');
                        break;
                }
            } else {
                // Jika username dan password tidak cocok, tampilkan pesan error
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        // Ambil data user yang sedang login dari session
        $user = $this->session->userdata('Id_User');
    
        // Masukkan data logout ke dalam tabel log
        $log_data = array(
            'Id_User' => $user,
            'aktifitas' => 'Logout',
            'Waktu' => date('Y-m-d H:i:s')
        );
        $this->log_model->insert($log_data);
    
        // Hapus semua session dan redirect ke halaman login
        $this->session->sess_destroy();
        redirect('auth');
    }
    

}
