<?php
ini_set('date.timezone', 'Asia/Jakarta');
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_admin_select extends CI_Model
{
    public function coba()
    {
        echo "Berhasil";
        die;
    }
    //>> SELECT <<
    public function select_all($table, $where)
    {
        return $this->db->get_where($table, $where)->result_array();
    }

    // select data admin
    public function data_profile($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    public function nilai_rata2($NIS, $kelas)
    {
        $data = $this->db->query("SELECT AVG(nilai) AS nilai_rata2 FROM v_nilai_siswa WHERE NIS = $NIS AND kelas = '$kelas'")->row_array();
        return round($data['nilai_rata2'], 2);
    }
    public function nilai_kriteria($NIS, $id_kriteria)
    {
        $kelas = $this->db->query("SELECT nama_kelas FROM v_kelas_siswa WHERE NIS = $NIS")->row_array();
        $kelas = $kelas['nama_kelas'];
        $data = $this->db->get_where('v_nilai_siswa', ['NIS' => $NIS, 'id_kriteria' => $id_kriteria, 'kelas' => $kelas])->row_array();
        return $data;
    }
    public function rangking($kelas = null)
    {
        $tahun_ajaran = date('Y') . "/" . (date('Y') + 1);
        $cek_nilai = $this->db->get_where('nilai_siswa', ['kelas' => $kelas, 'tahun_ajaran' => $tahun_ajaran])->result_array();
        $data_SAW = [];
        if ($cek_nilai) {
            $kelas_siswa = $this->db->get_where('v_kelas_siswa', ['nama_kelas' => $kelas])->result_array();
            foreach ($kelas_siswa as $ks) {
                $nilai_SAW = metode_SAW($ks['NIS'], $kelas);
                $data_SAW[$ks['NIS']] = $nilai_SAW;
            }
            arsort($data_SAW);
            $data_SAW = array_keys($data_SAW);
            return array_slice($data_SAW, 0, 5);
        } else {
            return $data_SAW;
        }
    }
    public function data_kelas()
    {
        $data = $this->db->query("SELECT nama_kelas FROM kelas ORDER BY id_kelas DESC")->result_array();
        return $data;
    }
}
