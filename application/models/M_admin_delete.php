<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_admin_delete extends CI_Model
{
    public function coba()
    {
        echo "Berhasil";
        die;
    }
    public function hapus($table, $where)
    {
        $this->db->delete($table, $where);
    }
    public function hapus_pengguna()
    {
        $id_admin = $this->input->post('id_admin');
        $foto = $this->input->post('foto');
        $this->M_admin_delete->hapus('admin', ['id_admin' => $id_admin]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            if ($foto != 'default-L.jpg' and $foto != 'default-P.jpg') {
                unlink(FCPATH . 'assets/pribadi/img/admin/' . $foto);
            }
            $pesan = <<<EOL
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">Berhasil menghapus data pengguna!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        } else {
            $pesan = <<<EOL
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">Gagal menghapus data pengguna!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                EOL;
            $this->session->set_flashdata('message', $pesan);
        }
        redirect($this->session->userdata('previous_url'));
    }
}
