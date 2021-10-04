<?php
ini_set('date.timezone', 'Asia/Jakarta');
function nama_web()
{
    return "Assa'adatul";
}

function cek_status_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('level')) {
        redirect('auth');
    } else {
        $level = $ci->session->userdata('level');
        $menu = $ci->uri->segment(1);

        $querymenu = $ci->db->get_where('controller_access', ['controller' => $menu])->row_array();

        $controller = $querymenu['controller'];

        $access = $ci->db->get_where('controller_access', ['level' => $level, 'controller' => $controller])->num_rows();
        if ($access < 1) {
            redirect('auth/login');
        }
        if (strtolower($level) == 'user') {
            $orang_tua = $ci->db->get_where('orang_tua', ['kd_ortu' => $ci->session->userdata('kd_ortu')])->row_array();
            if ($orang_tua['nik'] == 0) {
                redirect('auth/form_data_diri');
            }
        }
    }
}

function membuat_NIS()
{
    $ci = get_instance();
    $kd_role = 2;
    $NIS = $ci->db->query("SELECT NIS FROM siswa ORDER BY `NIS` DESC LIMIT 1")->row_array();
    if ($NIS) {
        $tahun = strval(substr($NIS['NIS'], 1, 2));
        $siswa_ke = strval(substr($NIS['NIS'], 3));
        if ($tahun === date('y')) {
            $kode = $kd_role . $tahun . $siswa_ke;
            $kode = (int)$kode + 1;
        } else {
            $tahun = (int)$tahun + 1;
            $kode = $kd_role . $tahun . "0001";
        }
    } else {
        $tahun = date('y');
        $siswa_ke = "0001";
        $kode = $kd_role . $tahun . $siswa_ke;
    }

    return (int)$kode;
}



function tanggal_helper($tanggal)
{
    $arr = explode('-', $tanggal);
    $tanggal = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
    return $tanggal;
}

function nama_kelas($id_kelas)
{
    $ci = get_instance();
    $kelas = $ci->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
    return $kelas['nama_kelas'] ? $kelas['nama_kelas'] : false;
}
function nama_siswa($NIS)
{
    $ci = get_instance();
    $siswa = $ci->db->get_where('siswa', ['NIS' => $NIS])->row_array();
    return $siswa['nama_lengkap'];
}
function foto_siswa($NIS)
{
    $ci = get_instance();
    $siswa = $ci->db->get_where('siswa', ['NIS' => $NIS])->row_array();
    return $siswa['foto'];
}

function jumlah_siswa($id_kelas)
{
    $ci = get_instance();
    return $ci->db->get_where('v_kelas_siswa', ['id_kelas' => $id_kelas])->num_rows();
}
function id_kelas($NIS)
{
    $ci = get_instance();
    $data = $ci->db->get_where('v_kelas_siswa', ['NIS' => $NIS])->row_array();
    return $data['id_kelas']  ? $data['id_kelas'] : false;
}

function sum_bobot($data)
{
    $total_bobot = 0;
    foreach ($data as $total) {
        $total_bobot = $total_bobot + $total['bobot'];
    }
    return $total_bobot;
}
function normalisasi_bobot($kriteria, $total_bobot)
{
    $bobot_normalisasi = [];
    foreach ($kriteria as $nb) {
        $id_kriteria = $nb['id_kriteria'];
        $bobot_normalisasi[$id_kriteria] = $nb['bobot'] / $total_bobot;
    }
    return $bobot_normalisasi;
}
function normalisasi_nilai($nilai_siswa, $kelas)
{
    $ci = get_instance();
    $normalisasi_nilai = [];
    foreach ($nilai_siswa as $ns) {
        $id_kriteria = $ns['id_kriteria'];
        $tahun_ajaran = date('Y') . "/" . (date('Y') + 1);
        // Mencari Nilai Maximum Berdasarkan Kriteria
        $smt = $ns['semester'];
        $nilai = $ci->db->query("SELECT max(nilai) AS `nilai_max` FROM `nilai_siswa` 
        INNER JOIN kelas_siswa ON nilai_siswa.NIS = kelas_siswa.NIS
        INNER JOIN kelas ON kelas_siswa.id_kelas = kelas.id_kelas
        WHERE id_kriteria = $id_kriteria  AND kelas.nama_kelas = '$kelas' AND tahun_ajaran = '$tahun_ajaran' AND semester = $smt")->row_array();
        // Normalisasi Nilai
        $normalisasi_nilai[$id_kriteria] = $ns['nilai'] / $nilai['nilai_max'];
    }
    return $normalisasi_nilai;
}

function metode_SAW($NIS = null, $kelas = null, $smt = null)
{
    $ci = get_instance();
    // mengambil data kriteria

    $kriteria = $ci->db->query('SELECT * FROM kriteria')->result_array();

    // Menjumlahkan Total Bobot
    $total_bobot = sum_bobot($kriteria);
    // Normalisasi bobot
    // RUMUS = bobot / total_bobot
    $bobot_normalisasi = normalisasi_bobot($kriteria, $total_bobot);

    // Mengambil data nilai siswa
    $nilai_siswa = $ci->db->get_where('v_nilai_siswa', ['NIS' => $NIS, 'kelas' => $kelas, 'semester' => $smt])->result_array();
    // var_dump($nilai_siswa);
    // die;

    // Normalisasi nilai siswa
    // RUMUS = nilai / nilai_max
    $nilai_normalisasi = normalisasi_nilai($nilai_siswa, $kelas);

    // RUMUS SAW 
    // menambahkan suruh akumulasi nilai kriteria siswa
    // RUMUS = (nilai_normalisasi(1) * bobot_normalisasi(1)) + (nilai_normalisasi(n) * bobot_normalisasi(n)) 
    $total = 0;
    foreach ($nilai_siswa as $sk) {
        $total = $total + $nilai_normalisasi[$sk['id_kriteria']] * $bobot_normalisasi[$sk['id_kriteria']];
    }
    return round($total * 100, 2);
}
