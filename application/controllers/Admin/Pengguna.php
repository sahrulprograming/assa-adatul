<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->web = nama_web();
        cek_status_login();
    }
    public function index()
    {
        $data['title'] = "Data Pengguna | $this->web";
        $data['judul'] = "Data Pengguna";
        $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
        $data['admin'] = $this->db->get('v_admin')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('template/admin/topbar');
        $this->load->view('admin/pengguna/index');
        $this->load->view('template/admin/footer');
        $this->session->set_userdata('previous_url', current_url());
    }
    public function tambah_pengguna()
    {

        // Mengambil 1 data admin
        $data['admin'] = $this->M_admin_select->select_row('admin', 1);
        foreach (array_slice(array_keys($data['admin'][0]), 1, 8) as $keys) {
            if ($keys === 'foto' || $keys === 'no_telp') {
                $this->form_validation->set_rules($keys, $keys, 'trim');
            } elseif ($keys === 'nama_lengkap' || $keys === 'username' || $keys === 'email') {
                $this->form_validation->set_rules($keys, $keys, "required|trim|is_unique[admin.$keys]", [
                    'required' => str_replace("_", " ", $keys) . ' wajib di isi',
                    'is_unique' => str_replace("_", " ", $keys) . ' Sudah digunakan',
                ]);
            } else {
                $this->form_validation->set_rules($keys, $keys, 'required|trim', [
                    'required' => str_replace("_", " ", $keys) . ' wajib di isi',
                ]);
            }
        }
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = "Tambah Pengguna | " . $this->web;
            $data['judul'] = "Tambah Pengguna";
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/pengguna/tambah_pengguna');
            $this->load->view('template/admin/footer');
        } else {
            $this->M_admin_insert->tambah_pengguna($data['admin'][0]);
        }
    }
    public function edit_pengguna($id_admin)
    {
        $cek_id = $this->db->get_where('admin', ['id_admin' => $id_admin])->row_array();
        if ($cek_id) {
            // Mengambil Seluruh data kriteria
            $data['admin'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $id_admin]);
            foreach (array_slice(array_keys($data['admin']), 1, 9) as $keys) {
                $this->form_validation->set_rules($keys, $keys, 'trim');
            }
            if ($this->form_validation->run() === FALSE) {
                $data['title'] = "Edit Pengguna | " . $this->web;
                $data['judul'] = "Edit Pengguna";
                $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
                $data['kelas'] = $this->db->get('kelas')->result_array();
                $this->load->view('template/admin/head', $data);
                $this->load->view('template/admin/sidebar');
                $this->load->view('template/admin/topbar');
                $this->load->view('admin/pengguna/edit_pengguna');
                $this->load->view('template/admin/footer');
            } else {
                $this->M_admin_update->edit_pengguna($id_admin, $this->M_admin_select->data_profile('admin', ['id_admin' => $id_admin]));
            }
        } else {
            redirect('admin/pengguna');
        }
    }
    public function reset_password()
    {
        $this->M_admin_update->reset_password();
    }
    public function hapus_pengguna()
    {
        $this->M_admin_delete->hapus_pengguna();
    }
}
