<?php
ini_set('date.timezone', 'Asia/Jakarta');
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_admin_insert extends CI_Model
{
    public function coba()
    {
        echo "Berhasil";
        die;
    }
    public function tambah_siswa()
    {
        $NIS = membuat_NIS();
        $nama_lengkap = $this->input->post('nama_lengkap');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $kelas = $this->input->post('kelas');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $agama = $this->input->post('agama');
        $nama_ayah = $this->input->post('nama_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $data = [
            'NIS' => $NIS,
            'nama_lengkap' => strip_tags($nama_lengkap),
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => strip_tags($tempat_lahir),
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => strip_tags($agama),
            'nama_ayah' => strip_tags($nama_ayah),
            'nama_ibu' => strip_tags($nama_ibu),
            'alamat' => strip_tags($alamat),
            'email' => strip_tags($email),
            'no_hp' => $no_hp,
            'tahun_masuk' => date('Y'),
            'is_active' => 'Y'
        ];
        $foto = $_FILES['foto']['name'];
        if ($foto) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/pribadi/img/siswa/';
            $config['file_name'] = 'gambar' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
                $data['foto'] = $foto;
            } else {
                $error = $this->upload->display_errors();
                $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">$error</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
                $this->session->set_flashdata('message', $pesan);
                redirect('admin/siswa/tambah_siswa');
            }
        } else {
            $data['foto'] = 'default-' . $jenis_kelamin . '.jpg';
        }
        $this->db->insert('siswa', $data);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $kelas_siswa = [
                'NIS' => $NIS,
                'id_kelas' => $kelas
            ];
            $this->db->insert('kelas_siswa', $kelas_siswa);
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil menambah data siswa!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Gagal menambah data siswa!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
        }
        $this->session->set_flashdata('message', $pesan);
        redirect($this->session->userdata('previous_url'));
    }
    public function tambah_kelas()
    {
        $nama_kelas = $this->input->post('nama_kelas');
        $nama_ruangan = $this->input->post('nama_ruangan');
        $lantai = $this->input->post('lantai');
        $data = [
            'nama_kelas' => strip_tags($nama_kelas),
            'nama_ruangan' => strip_tags($nama_ruangan),
            'lantai' => strip_tags($lantai)
        ];
        $this->db->insert('kelas', $data);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $pesan = <<<EOL
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil menambah data kelas!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            EOL;
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Gagal menambah data kelas!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
        }
        $this->session->set_flashdata('message', $pesan);
        redirect('admin/kelas');
    }
    public function tambah_kriteria()
    {
        $kriteria = $this->input->post('kriteria');
        $cek_kriteria = $this->db->get_where('kriteria', ['kriteria' => $kriteria])->row_array();
        if (!$cek_kriteria) {
            $bobot = $this->input->post('bobot');
            $data = [
                'kriteria' => strip_tags($kriteria),
                'bobot' => $bobot
            ];
            $this->db->insert('kriteria', $data);
            $result = $this->db->affected_rows();
            if ($result > 0) {
                $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                    <div class="text-white">Berhasil menambah data kriteria!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                EOL;
                $this->session->set_flashdata('message', $pesan);
                redirect('admin/kriteria/');
            } else {
                $pesan = <<<EOL
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                    <div class="text-white">Gagal menambah data kriteria!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                EOL;
                $this->session->set_flashdata('message', $pesan);
                redirect('admin/kriteria/');
            }
        } else {
            $pesan = <<<EOL
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                    <div class="text-white">Kriteria $kriteria sudah tersedia!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    EOL;
            $this->session->set_flashdata('message', $pesan);
            $data['title'] = "Tambah Kriteria | " . $this->web;
            $data['judul'] = "Tambah Kriteria";
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/kriteria/tambah_kriteria');
            $this->load->view('template/admin/footer');
        }
    }
    public function tambah_pengguna($data)
    {
        $isi = [
            'is_active' => "Y",
            'password' => md5("admin" . date("Y"))
        ];
        $hasil = [];
        foreach (array_slice(array_keys($data), 1, 8) as $keys) {
            if ($keys === 'foto') {
                $foto = $_FILES[$keys]['name'];
                if ($foto) {
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size']     = '2048';
                    $config['upload_path'] = './assets/pribadi/img/admin/';
                    $config['file_name'] = 'gambar' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                        $foto = $this->upload->data('file_name');
                        $isi['foto'] = $foto;
                    } else {
                        $error = $this->upload->display_errors();
                        $pesan = <<<EOL
                        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                        <div class="text-white">$error</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        EOL;
                        $this->session->set_flashdata('message', $pesan);
                        redirect('admin/pengguna/tambah_pengguna');
                    }
                } else {
                    $isi['foto'] = 'default-' . $data['jenis_kelamin'] . '.jpg';
                }
            } else {
                $isi[$keys] = $this->input->post($keys);
            }
        }
        $this->db->insert('admin', $isi);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                    <div class="text-white">Berhasil menambah data pengguna!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect('admin/pengguna');
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                    <div class="text-white">Gagal menambah data pengguna!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
            $data['admin'] = $this->M_admin_select->select_row('admin', 1);
            $data['title'] = "Tambah Pengguna | " . $this->web;
            $data['judul'] = "Tambah Pengguna";
            $data['profile'] = $this->M_admin_select->data_profile('admin', ['id_admin' => $this->session->userdata('id')]);
            $data['kelas'] = $this->db->get('kelas')->result_array();
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('template/admin/topbar');
            $this->load->view('admin/pengguna/tambah_pengguna');
            $this->load->view('template/admin/footer');
        }
    }
}
