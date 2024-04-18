<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_ams_formula extends Model {
    protected $table = "ams_formula";

    public function get_by_for_id($for_id) {
        $sql = "SELECT * FROM $this->table WHERE for_id = '$for_id'";
        return $this->db->query($sql)->getRow();
    }

}