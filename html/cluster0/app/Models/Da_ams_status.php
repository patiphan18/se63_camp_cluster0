<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_ams_status extends Model {
    protected $table = "ams_status";

    public function get_status(){
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }

}