<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->web = "assa'adatul";
    }
    // Login
    public function index()
    {
        if ($this->session->userdata('level')) {
            redirect('admin/home');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Email / Username wajib di isi',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'required' => 'Password wajib di isi',
            'min_length' => 'Password Minimal 6 Character'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login | $this->web";
            $this->load->view('template/auth/head', $data);
            $this->load->view('template/auth/topbar');
            $this->load->view('login');
            $this->load->view('template/auth/footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $this->M_auth->login($_POST);
    }

    // Logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
