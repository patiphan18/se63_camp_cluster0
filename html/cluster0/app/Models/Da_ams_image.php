<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_ams_image extends Model {
    protected $table = "ams_image";

    public function insert_image($img_name, $ast_id) {
        $sql = "INSERT INTO $this->table (img_id, img_name, img_ast_id)
                VALUES(NULL, '$img_name', '$ast_id')";
        $this->db->query($sql);
    }

}