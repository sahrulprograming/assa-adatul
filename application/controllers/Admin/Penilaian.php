<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->web = nama_web();
        cek_status_login();
    }
    public function index($id_kelas = null)
    {
        $cek_id = $this->db->get_where('kelas', ['id_kelas' => $id_kelas]);
        if ($cek_id) {
            $data['title'] = "Nilai Siswa | " . $this->web;
            $data['judul'] = "Nilai Siswa Kelas " . nama_kelas($id_kelas);
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $data['kriteria'] = $this->db->get('kriteria')->result_array();
            $data['siswa'] = $this->db->get_where('v_kelas_siswa', ['id_kelas' => $id_kelas])->result_array();
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/penilaian/data_penilaian');
            $this->load->view('template/admin/footer');
            $this->session->set_userdata('previous_url', current_url());
        } else {
            redirect($this->session->userdata('previous_url'));
        }
    }
    public function detail_penilaian($NIS = null)
    {
        $cek_NIS = $this->db->get_where('siswa', ['NIS' => $NIS])->row_array();
        if ($cek_NIS) {
            $data['title'] = "Data Siswa | $this->web";
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $data['kriteria'] = $this->db->get('kriteria')->result_array();
            $cek_active = $this->M_admin_select->data_profile('siswa', ['NIS' => $NIS]);
            if ($cek_active['is_active'] == 'Y') {
                $table = 'v_kelas_siswa';
            } else {
                $table = 'v_siswa_non_active';
            }
            $data['siswa'] = $this->M_admin_select->data_profile($table, ['NIS' => $NIS]);
            $data['nilai_SAW'] = metode_SAW($NIS, $data['siswa']['nama_kelas']);
            $data['nilai_rata2'] = $this->M_admin_select->nilai_rata2($NIS, $data['siswa']['nama_kelas']);
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/penilaian/detail_penilaian');
            $this->load->view('template/admin/footer');
        } else {
            redirect('admin/siswa/semua_data_siswa');
        }
    }
    public function edit_penilaian($NIS = null)
    {
        $cek_NIS = $this->db->get_where('siswa', ['NIS' => $NIS])->row_array();
        if ($cek_NIS) {
            // Mengambil Seluruh data kriteria
            $data['kriteria'] = $this->db->get('kriteria')->result_array();
            foreach ($data['kriteria'] as $data_kriteria) {
                $kriteria = str_replace(" ", "_", $data_kriteria['kriteria']);
                $this->form_validation->set_rules($kriteria, $kriteria, 'required|trim', [
                    'required' => "nilai " . str_replace("_", " ", $kriteria) . " wajib di isi",
                ]);
            }
            if ($this->form_validation->run() === FALSE) {
                $data['title'] = "Edit Penilaian | " . $this->web;
                $data['judul'] = "Edit Penilaian";
                $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
                $data['kelas'] = $this->db->get('kelas')->result_array();
                $data['NIS'] = $NIS;
                $this->load->view('template/admin/head', $data);
                $this->load->view('template/admin/sidebar');
                $this->load->view('template/admin/topbar');
                $this->load->view('admin/penilaian/edit_penilaian');
                $this->load->view('template/admin/footer');
            } else {
                $this->M_admin_update->edit_penilaian($NIS, $data['kriteria']);
            }
        } else {
            redirect('admin/siswa/semua_data_siswa');
        }
    }
}
