<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->web = nama_web();
        cek_status_login();
    }
    public function index()
    {
        $data['judul'] = "DATA SELURUH SISWA";
        $data['title'] = "Data Siswa | $this->web";
        $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['siswa'] = $this->db->get('v_kelas_siswa')->result_array();
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('template/admin/topbar');
        $this->load->view('admin/siswa/data_siswa');
        $this->load->view('template/admin/footer');
        $this->session->set_userdata('previous_url', current_url());
    }
    public function data_siswa($id_kelas = null)
    {
        $cek_kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        if ($cek_kelas) {
            $data['judul'] = "DATA SISWA KELAS " . nama_kelas($id_kelas);
            $data['title'] = "Data Siswa | $this->web";
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $data['siswa'] = $this->M_admin_select->select_all('v_kelas_siswa', ['id_kelas' => $id_kelas]);
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/siswa/data_siswa');
            $this->load->view('template/admin/footer');
        } else {
            redirect('admin/siswa/semua_data_siswa');
        }
        $this->session->set_userdata('previous_url', current_url());
    }
    public function siswa_non_active()
    {
        $data['judul'] = "DATA SISWA NON ACTIVE";
        $data['title'] = "Data Siswa | $this->web";
        $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['siswa'] = $this->db->get('v_siswa_non_active')->result_array();
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('template/admin/topbar');
        $this->load->view('admin/siswa/data_siswa');
        $this->load->view('template/admin/footer');
        $this->session->set_userdata('previous_url', current_url());
    }
    public function tambah_siswa()
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $this->form_validation->set_rules('nama_lengkap', 'Nl', "required|trim|is_unique[siswa.nama_lengkap]", [
            'required' => 'Nama lengkap wajib di isi',
            'is_unique' => "nama $nama_lengkap sudah terdaftar",
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jk', 'required|trim', [
            'required' => 'Jenis kelamin wajib di isi',
        ]);
        $this->form_validation->set_rules('kelas', 'k', 'required|trim', [
            'required' => 'Kelas wajib di isi',
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'tl', 'trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tgl', 'required|trim', [
            'required' => 'Tanggal lahir wajib di isi',
        ]);
        $this->form_validation->set_rules('agama', 'agm', 'trim');
        $this->form_validation->set_rules('nama_ayah', 'na', 'required|trim', [
            'required' => 'Nama ayah wajib di isi',
        ]);
        $this->form_validation->set_rules('nama_ibu', 'ni', 'required|trim', [
            'required' => 'Nama ibu wajib di isi',
        ]);
        $this->form_validation->set_rules('alamat', 'almt', 'required|trim', [
            'required' => 'Alamat wajib di isi',
        ]);
        $this->form_validation->set_rules('email', 'eml', 'trim');
        $this->form_validation->set_rules('no_hp', 'nohp', 'trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Siswa | $this->web";
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/siswa/tambah_siswa');
            $this->load->view('template/admin/footer');
        } else {
            $this->M_admin_insert->tambah_siswa();
        }
    }
    public function detail_siswa($NIS = null)
    {
        $cek_NIS = $this->db->get_where('siswa', ['NIS' => $NIS])->row_array();
        if ($cek_NIS) {
            $data['title'] = "Data Siswa | $this->web";
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $cek_active = $this->M_admin_select->data_profile('siswa', ['NIS' => $NIS]);
            if ($cek_active['is_active'] == 'Y') {
                $table = 'v_kelas_siswa';
            } else {
                $table = 'v_siswa_non_active';
            }
            $data['siswa'] = $this->M_admin_select->data_profile($table, ['NIS' => $NIS]);
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/siswa/detail_siswa');
            $this->load->view('template/admin/footer');
        } else {
            redirect('admin/siswa/semua_data_siswa');
        }
    }
    public function edit_siswa($NIS = null)
    {
        $cek_NIS = $this->db->get_where('siswa', ['NIS' => $NIS])->row_array();
        if ($cek_NIS) {
            $this->form_validation->set_rules('nama_lengkap', 'Nl', 'required|trim', [
                'required' => 'Nama lengkap wajib di isi',
            ]);
            $this->form_validation->set_rules('jenis_kelamin', 'jk', 'required|trim', [
                'required' => 'Jenis kelamin wajib di isi',
            ]);
            $this->form_validation->set_rules('kelas', 'k', 'required|trim', [
                'required' => 'Kelas wajib di isi',
            ]);
            $this->form_validation->set_rules('tempat_lahir', 'tl', 'trim');
            $this->form_validation->set_rules('tanggal_lahir', 'tgl', 'required|trim', [
                'required' => 'Tanggal lahir wajib di isi',
            ]);
            $this->form_validation->set_rules('agama', 'agm', 'trim');
            $this->form_validation->set_rules('nama_ayah', 'na', 'required|trim', [
                'required' => 'Nama ayah wajib di isi',
            ]);
            $this->form_validation->set_rules('nama_ibu', 'ni', 'required|trim', [
                'required' => 'Nama ibu wajib di isi',
            ]);
            $this->form_validation->set_rules('alamat', 'almt', 'required|trim', [
                'required' => 'Alamat wajib di isi',
            ]);
            $this->form_validation->set_rules('email', 'eml', 'trim');
            $this->form_validation->set_rules('no_hp', 'nohp', 'trim');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Dasboard | $this->web";
                $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
                $data['kelas'] = $this->db->get('kelas')->result_array();
                $cek_active = $this->M_admin_select->data_profile('siswa', ['NIS' => $NIS]);
                if ($cek_active['is_active'] == 'Y') {
                    $table = 'v_kelas_siswa';
                } else {
                    $table = 'v_siswa_non_active';
                }
                $data['siswa'] = $this->M_admin_select->data_profile($table, ['NIS' => $NIS]);
                $this->load->view('template/admin/head', $data);
                $this->load->view('template/admin/sidebar');
                $this->load->view('template/admin/topbar');
                $this->load->view('admin/siswa/edit_siswa');
                $this->load->view('template/admin/footer');
            } else {
                $this->M_admin_update->edit_siswa($NIS);
            }
        } else {
            redirect('admin/siswa/semua_data_siswa');
        }
    }
    public function hapus_siswa()
    {
        $NIS = $this->input->post('NIS');
        $foto = $this->input->post('foto');
        $this->M_admin_delete->hapus('siswa', ['NIS' => $NIS]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            if ($foto != 'default-L.jpg' and $foto != 'default-P.jpg') {
                unlink(FCPATH . 'assets/pribadi/img/siswa/' . $foto);
            }
            $this->M_admin_delete->hapus('kelas_siswa', ['NIS' => $NIS]);
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil menghapus data siswa!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Gagal menghapus data siswa!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        }
        redirect($this->session->userdata('previous_url'));
    }
}
