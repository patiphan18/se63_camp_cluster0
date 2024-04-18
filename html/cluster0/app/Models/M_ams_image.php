<?php
namespace App\Models;
use CodeIgniter\Model;

class M_ams_image extends Da_ams_image {
    public function delete_by_ast_id($ast_id) {
        $sql = "DELETE FROM $this->table WHERE img_ast_id = '$ast_id'";
        
        $this->db->query($sql);
    }

    public function get_by_ast_id($ast_id) {
        $sql = "SELECT * FROM $this->table WHERE $this->table.img_ast_id = '$ast_id'";
        
        return $this->db->query($sql)->getResult();
    }
}