<?php
ini_set('date.timezone', 'Asia/Jakarta');
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_auth extends CI_Model
{
    public function login($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $admin = $this->db->query("SELECT * FROM admin WHERE username = '$username' or email = '$username'")->row_array();
        if ($admin) {
            if ($admin['password'] === md5($password)) {
                $data_ses = [
                    'id' => $admin['id_admin'],
                    'level' => $admin['level'],
                    'nama' => $admin['nama_lengkap'],
                ];
                $this->session->set_userdata($data_ses);
                redirect('admin');
            } else {
                $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Password Salah</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
                $this->session->set_flashdata('message', $pesan);
                redirect('auth');
            }
        } else {
            $pesan = <<<EOL
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Email / Username Belum Terdaftar</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            EOL;
            $this->session->set_flashdata('message', $pesan);
            redirect('auth');
        }
    }
}
