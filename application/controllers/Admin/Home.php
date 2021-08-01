<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->web = nama_web();
        cek_status_login();
    }
    public function index()
    {
        $data['title'] = "Dasboard | $this->web";
        $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['kriteria'] = $this->db->get('kriteria')->result_array();
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('template/admin/topbar');
        $this->load->view('admin/index');
        $this->load->view('template/admin/footer');
        $this->session->set_userdata('previous_url', current_url());
    }
    public function notfound()
    {
        $data['title'] = "Tidak Ditemukan | assa'adatul";
        $this->load->view('template/user/haed', $data);
        $this->load->view('404');
        $this->load->view('template/user/footer');
    }
}
