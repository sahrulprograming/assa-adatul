<?php
ini_set('date.timezone', 'Asia/Jakarta');
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_admin_update extends CI_Model
{
    public function coba()
    {
        echo "Berhasil";
        die;
    }
    public function edit_siswa($NIS)
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $agama = $this->input->post('agama');
        $nama_ayah = $this->input->post('nama_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $is_active = $this->input->post('is_active');
        $id_kelas = $this->input->post('kelas');
        $data = [
            'NIS' => strip_tags($NIS),
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
            'is_active' => $is_active
        ];
        $foto = $_FILES['foto']['name'];
        if ($foto) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/pribadi/img/siswa/';
            $config['file_name'] = 'gambar' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto_lama = $this->input->post('foto_lama');
                if ($foto_lama != 'default-P.jpg' and $foto_lama != 'default-L.jpg') {
                    unlink(FCPATH . 'assets/pribadi/img/siswa/' . $foto_lama);
                }
                $foto = $this->upload->data('file_name');
                $data['foto'] = $foto;
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('admin/siswa/edit_siswa/' . $NIS);
            }
        }
        $this->db->update('siswa', $data, "NIS = $NIS");
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil edit data siswa!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        } else {
            // cek kelas berubah atau tidak
            $cek_kelas = $this->db->get_where('kelas_siswa', ['NIS' => $NIS, 'id_kelas' => $id_kelas])->row_array();
            if (!$cek_kelas) {
                $this->db->update('kelas_siswa', ['id_kelas' => $id_kelas], "NIS = $NIS");
                $result = $this->db->affected_rows();
                if ($result > 0) {
                    $pesan = <<<EOL
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                    <div class="text-white">Berhasil edit data siswa!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    EOL;
                    $this->session->set_flashdata('message', $pesan);
                }
            } else {
                $pesan = <<<EOL
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                    <div class="text-white">Gagal edit data siswa!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    EOL;
                $this->session->set_flashdata('message', $pesan);
            }
        }
        redirect('admin/siswa/edit_siswa/' . $NIS);
    }

    public function edit_kelas($id_kelas)
    {
        $nama_kelas = $this->input->post('nama_kelas');
        $nama_ruangan = $this->input->post('nama_ruangan');
        $lantai = $this->input->post('lantai');
        $data = [
            'nama_kelas' => strip_tags($nama_kelas),
            'nama_ruangan' => strip_tags($nama_ruangan),
            'lantai' => strip_tags($lantai)
        ];
        $this->db->update('kelas', $data, "id_kelas = $id_kelas");
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil edit data kelas!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Gagal edit data kelas!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
        }
        $this->session->set_flashdata('message', $pesan);
        redirect('admin/kelas/edit_kelas/' . $id_kelas);
    }
    public function edit_kriteria($id_kriteria)
    {
        $kriteria = $this->input->post('kriteria');
        $bobot = $this->input->post('bobot');
        $data = [
            'kriteria' => strip_tags($kriteria),
            'bobot' => $bobot
        ];
        $this->db->update('kriteria', $data, "id_kriteria = $id_kriteria");
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil edit data kriteria!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect('admin/kriteria');
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Gagal edit data kriteria!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect('admin/kriteria/edit_kriteria/' . $id_kriteria);
        }
    }
    public function edit_penilaian($NIS, $kriteria)
    {
        $kelas = nama_kelas(id_kelas($NIS));
        $hasil = [];
        foreach ($kriteria as $k) {
            $nama_kriteria = str_replace(" ", "_", $k['kriteria']);
            $nilai_kriteria = $this->input->post($nama_kriteria);
            $id_kriteria = $k['id_kriteria'];
            $grade = $this->db->query("SELECT grade FROM grade_nilai WHERE nilai_max >= $nilai_kriteria ORDER BY nilai_max ASC LIMIT 1")->row_array();
            $grade = $grade['grade'];
            $cek_kriteria = $this->db->get_where('nilai_siswa', ['NIS' => $NIS, 'kelas' => nama_kelas(id_kelas($NIS)), 'id_kriteria' => $id_kriteria])->num_rows();
            if (!$cek_kriteria) {
                $id_kriteria = $k['id_kriteria'];
                $tahun_ajaran = date('Y') . "/" . (date('Y') + 1);
                $isi = [
                    'id_kriteria' => $id_kriteria,
                    'NIS' => $NIS,
                    'nilai' => $nilai_kriteria,
                    'grade' => $grade,
                    'kelas' => $kelas,
                    'tahun_ajaran' => $tahun_ajaran
                ];
                $this->db->insert('nilai_siswa', $isi);
                $result = $this->db->affected_rows();
                array_push($hasil, $result);
            } else {
                $isi = [
                    'nilai' => $nilai_kriteria,
                    'grade' => $grade
                ];
                $this->db->update('nilai_siswa', $isi, "NIS = $NIS AND id_kriteria = $id_kriteria AND kelas = '$kelas'");
                $result = $this->db->affected_rows();
                array_push($hasil, $result);
            }
        }
        if (in_array(1, $hasil)) {
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil edit data penilaian!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect($this->session->userdata('previous_url'));
        } else {
            $cek_nilai = $this->db->get_where('nilai_siswa', ['NIS' => $NIS, 'kelas' => nama_kelas(id_kelas($NIS))])->num_rows();
            if (!$cek_nilai) {
                foreach ($kriteria as $k) {
                    $nama_kriteria = str_replace(" ", "_", $k['kriteria']);
                    $nilai_kriteria = $this->input->post($nama_kriteria);
                    $grade = $this->db->query("SELECT grade FROM grade_nilai WHERE nilai_max >= $nilai_kriteria ORDER BY nilai_max ASC LIMIT 1")->row_array();
                    $grade = $grade['grade'];
                    $id_kriteria = $k['id_kriteria'];
                    $tahun_ajaran = date('Y') . "/" . (date('Y') + 1);
                    $isi = [
                        'id_kriteria' => $id_kriteria,
                        'NIS' => $NIS,
                        'nilai' => $nilai_kriteria,
                        'grade' => $grade,
                        'kelas' => $kelas,
                        'tahun_ajaran' => $tahun_ajaran
                    ];
                    $this->db->insert('nilai_siswa', $isi);
                    $result = $this->db->affected_rows();
                    array_push($hasil, $result);
                }
                if (in_array(1, $hasil)) {
                    $pesan = <<<EOL
                        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                        <div class="text-white">Berhasil edit data penilaian!</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        EOL;
                    $this->session->set_flashdata('message', $pesan);
                    redirect($this->session->userdata('previous_url'));
                } else {
                    $pesan = <<<EOL
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                        <div class="text-white">Gagal edit data penilaian!</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        EOL;
                    $this->session->set_flashdata('message', $pesan);
                    redirect($this->session->userdata('previous_url'));
                }
            } else {
                $pesan = <<<EOL
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                    <div class="text-white">Data yang di masukan masih sama!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    EOL;
                $this->session->set_flashdata('message', $pesan);
                redirect('admin/penilaian/edit_penilaian/' . $NIS);
            }
        }
    }
    public function edit_pengguna($id_admin, $data_admin)
    {
        $hasil = [];
        foreach (array_slice(array_keys($data_admin), 1, 9) as $keys) {
            if ($keys != 'foto') {
                $isi = [
                    $keys => $this->input->post($keys)
                ];
                $this->db->update('admin', $isi, "id_admin = $id_admin");
                $result = $this->db->affected_rows();
                array_push($hasil, $result);
            } else {
                $foto = $_FILES['foto']['name'];
                if ($foto) {
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size']     = '2048';
                    $config['upload_path'] = './assets/pribadi/img/admin/';
                    $config['file_name'] = 'gambar' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                        $foto = $this->upload->data('file_name');
                        $this->db->update('admin', ['foto' => $foto], "id_admin = $id_admin");
                        $result = $this->db->affected_rows();
                        array_push($hasil, $result);
                        $foto_lama = $this->input->post('foto_lama');
                        if ($foto_lama != 'default-P.jpg' and $foto_lama != 'default-L.jpg') {
                            unlink(FCPATH . 'assets/pribadi/img/admin/' . $foto_lama);
                        }
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                        redirect('admin/pengguna/edit_pengguna/' . $id_admin);
                    }
                }
            }
        }
        if (in_array(1, $hasil)) {
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil edit data pengguna!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect('admin/pengguna/edit_pengguna/' . $id_admin);
        } else {
            $pesan = <<<EOL
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
            <div class="text-white">Tidak ada data yang di rubah!</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect('admin/pengguna/edit_pengguna/' . $id_admin);
        }
    }
    public function reset_password()
    {
        $id_admin = $this->input->post('id_admin');
        $password = md5("admin" . date('Y'));
        $data = [
            'password' => $password,
        ];
        $this->db->update('admin', $data, "id_admin = $id_admin");
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil Reset Pasword!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect('admin/pengguna/edit_pengguna/' . $id_admin);
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Password masih sama!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect('admin/pengguna/edit_pengguna/' . $id_admin);
        }
        redirect('admin/pengguna/edit_pengguna/' . $id_admin);
    }
}
