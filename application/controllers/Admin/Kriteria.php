<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->web = nama_web();
        cek_status_login();
    }
    public function index()
    {
        $data['title'] = "Data Kriteria | " . $this->web;
        $data['judul'] = "Data Kriteria";
        $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['kriteria'] = $this->db->get('kriteria')->result_array();
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('template/admin/topbar');
        $this->load->view('admin/kriteria/data_kriteria');
        $this->load->view('template/admin/footer');
        $this->session->set_userdata('previous_url', current_url());
    }
    public function tambah_kriteria()
    {
        $this->form_validation->set_rules('kriteria', 'k', 'required|trim', [
            'required' => 'Kriteria wajib di isi',
        ]);
        $this->form_validation->set_rules('bobot', 'b', 'required|trim', [
            'required' => 'bobot wajib di isi',
        ]);
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = "Tambah Kriteria | " . $this->web;
            $data['judul'] = "Tambah Kriteria";
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/kriteria/tambah_kriteria');
            $this->load->view('template/admin/footer');
        } else {
            $this->M_admin_insert->tambah_kriteria();
        }
    }
    public function edit_kriteria($id_kriteria = null)
    {
        $cek_id = $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row_array();
        if ($cek_id) {
            $this->form_validation->set_rules('kriteria', 'k', 'required|trim', [
                'required' => 'Kriteria wajib di isi',
            ]);
            $this->form_validation->set_rules('bobot', 'b', 'required|trim', [
                'required' => 'bobot wajib di isi',
            ]);
            if ($this->form_validation->run() === FALSE) {
                $data['title'] = "Edit Kriteria | " . $this->web;
                $data['judul'] = "Edit Kriteria";
                $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
                $data['kelas'] = $this->db->get('kelas')->result_array();
                $data['kriteria'] = $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row_array();
                $this->load->view('template/admin/head', $data);
                $this->load->view('template/admin/sidebar');
                $this->load->view('template/admin/topbar');
                $this->load->view('admin/kriteria/edit_kriteria');
                $this->load->view('template/admin/footer');
            } else {
                $this->M_admin_update->edit_kriteria($id_kriteria);
            }
        } else {
            redirect($this->session->userdata('previous_url'));
        }
    }
    public function hapus_kriteria()
    {
        $id_kriteria = $this->input->post('id_kriteria');
        $this->M_admin_delete->hapus('kriteria', ['id_kriteria' => $id_kriteria]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->M_admin_delete->hapus('nilai_siswa', ['id_kriteria' => $id_kriteria]);
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil menghapus data kriteria!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Gagal menghapus data kriteria!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        }
        redirect($this->session->userdata('previous_url'));
    }
}
