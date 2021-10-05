<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->web = nama_web();
        cek_status_login();
    }
    public function index()
    {
        $data['title'] = "Hasil Analisis | $this->web";
        $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
        $data['kelas'] = $this->M_admin_select->data_kelas();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['kelas2'] = $this->db->get('kelas')->result_array();
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('template/admin/topbar');
        $this->load->view('admin/analisis/index');
        $this->load->view('template/admin/footer');
    }
}
