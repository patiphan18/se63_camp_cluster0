<?php
namespace App\Models;
use CodeIgniter\Model;

class M_ams_formula extends Da_ams_formula {

    public function get_all() {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }
}