<?php
namespace App\Models;
use CodeIgniter\Model;

class M_ams_category extends Da_ams_category {

    public function get_category(){
        $sql = "SELECT * FROM $this->table WHERE cat_typ_id = ?";
        return $this->db->query($sql, array($this->cat_typ_id))->getResult();
    }
    
    public function get_all_category() {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }

    public function get_by_typ_id($typ_id) {
        $sql = "SELECT * FROM $this->table WHERE cat_typ_id = '$typ_id'";

        return $this->db->query($sql)->getResult();
    }

}