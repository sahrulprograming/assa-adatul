<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['title'] = nama_web();
        $data['kelas'] = $this->M_admin_select->data_kelas();
        $data['kelas2'] = $this->M_admin_select->data_kelas();
        $this->session->set_userdata('previous_url', current_url());
        $this->load->view('template/user/haed', $data);
        $this->load->view('template/user/topbar');
        $this->load->view('home');
        $this->load->view('template/user/footer');
    }
    public function detail_nilai($semester = null)
    {
        $NIS = $this->input->post('NIS');
        if ($NIS) {
            $data['nama'] = $this->session->userdata('nama');
            $data['title'] = 'Detail Nilai' . nama_web();
            $data['kriteria'] = $this->db->get('kriteria')->result_array();
            $data['semester'] = $semester;
            $cek_active = $this->M_admin_select->data_profile('siswa', [
                'NIS' => $NIS,
            ]);
            if ($cek_active['is_active'] == 'Y') {
                $table = 'v_kelas_siswa';
            } else {
                $table = 'v_siswa_non_active';
            }
            $data['siswa'] = $this->M_admin_select->data_profile($table, [
                'NIS' => $NIS,
            ]);
            // $data['nilai_SAW'] = metode_SAW($NIS, $data['siswa']['nama_kelas']);
            // $data['nilai_rata2'] = $this->M_admin_select->nilai_rata2($NIS);
            $this->session->set_userdata('previous_url', current_url());
            $this->load->view('template/user/haed', $data);
            $this->load->view('template/user/topbar');
            $this->load->view('detail_nilai');
            $this->load->view('template/user/footer');
        } else {
            redirect('home');
        }
    }
    public function notfound()
    {
        $data['title'] = "Tidak Ditemukan | assa'adatul";

        $this->load->view('template/user/haed', $data);
        $this->load->view('404');
        $this->load->view('template/user/footer');
    }
}
