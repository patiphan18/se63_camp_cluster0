<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_ams_circulation extends Model {
    public $ast_code;
    protected $table = "ams_circulation";

    
    public function insert_circulation() {
        $sql = "INSERT INTO ams_circulation (cir_borrow, cir_ast_id, cir_emp_id)
                VALUES(?, ?, ?)";
        $this->db->query($sql, array($this->cir_borrow, $this->cir_ast_id, $this->cir_emp_id));
    }
    
}