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
}
