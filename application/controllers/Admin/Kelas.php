<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->web = nama_web();
        cek_status_login();
    }
    public function index()
    {
        $data['title'] = "Data Kelas | " . $this->web;
        $data['judul'] = "Data Kelas";
        $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('template/admin/topbar');
        $this->load->view('admin/kelas/data_kelas');
        $this->load->view('template/admin/footer');
        $this->session->set_userdata('previous_url', current_url());
    }
    public function tambah_kelas()
    {
        $this->form_validation->set_rules('nama_kelas', 'Nk', 'required|trim', [
            'required' => 'Nama Kelas wajib di isi',
        ]);
        $this->form_validation->set_rules('nama_ruangan', 'Nr', 'required|trim', [
            'required' => 'Nama Ruangan wajib di isi',
        ]);
        $this->form_validation->set_rules('lantai', 'l', 'required|trim', [
            'required' => 'Lantai ke wajib di isi',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Kelas | " . $this->web;
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/kelas/tambah_kelas');
            $this->load->view('template/admin/footer');
        } else {
            $nama_kelas = $this->input->post('nama_kelas');
            $cek_kelas = $this->db->get_where('kelas', ['nama_kelas' => $nama_kelas])->row_array();
            if (!$cek_kelas) {
                $this->M_admin_insert->tambah_kelas();
            } else {
                $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Nama kelas $nama_kelas sudah ada!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
                $this->session->set_flashdata('message', $pesan);
                $data['title'] = "Edit Kelas | " . $this->web;
                $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
                $data['kelas'] = $this->db->get('kelas')->result_array();
                $this->load->view('template/admin/head', $data);
                $this->load->view('template/admin/sidebar');
                $this->load->view('template/admin/topbar');
                $this->load->view('admin/kelas/tambah_kelas');
                $this->load->view('template/admin/footer');
            }
        }
    }
    public function edit_kelas($id_kelas = null)
    {
        $cek_id = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        if ($cek_id) {
            $this->form_validation->set_rules('nama_kelas', 'Nk', 'required|trim', [
                'required' => 'Nama Kelas wajib di isi',
            ]);
            $this->form_validation->set_rules('nama_ruangan', 'Nr', 'required|trim', [
                'required' => 'Nama Ruangan wajib di isi',
            ]);
            $this->form_validation->set_rules('lantai', 'l', 'required|trim', [
                'required' => 'Lantai ke wajib di isi',
            ]);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Kelas | " . $this->web;
                $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
                $data['kelas'] = $this->db->get('kelas')->result_array();
                $data['detail_kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                $this->load->view('template/admin/head', $data);
                $this->load->view('template/admin/sidebar');
                $this->load->view('template/admin/topbar');
                $this->load->view('admin/kelas/edit_kelas');
                $this->load->view('template/admin/footer');
            } else {
                $this->M_admin_update->edit_kelas($id_kelas);
            }
        } else {
            redirect('admin/kelas/data_kelas');
        }
    }
    public function hapus_kelas()
    {
        $id_kelas = $this->input->post('id_kelas');
        $this->M_admin_delete->hapus('kelas', ['id_kelas' => $id_kelas]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->M_admin_delete->hapus('kelas_siswa', ['id_kelas' => $id_kelas]);
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil menghapus data Kelas!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Gagal menghapus data Kelas!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        }
        redirect($this->session->userdata('previous_url'));
    }
}
