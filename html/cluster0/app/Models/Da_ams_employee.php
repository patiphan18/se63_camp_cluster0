<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_ams_employee extends Model {
    protected $table = "ams_employee";

    public function update_password($emp_id, $new_password) {
        $sql = "UPDATE $this->table SET $this->table.emp_password = '$new_password'
                WHERE $this->table.emp_id = '$emp_id'";
        $this->db->query($sql);
    }

    public function update_full_name() {
        $sql = "UPDATE $this->table SET $this->table.emp_full_name = ?
                WHERE $this->table.emp_id =?";
        $this->db->query($sql , array($this->emp_full_name, $this->emp_id));
    }

    public function get_by_emp_id($emp_id) {
        $sql = "SELECT * FROM $this->table
                LEFT JOIN ams_department ON $this->table.emp_dep_id = ams_department.dep_id
                WHERE emp_id = '$emp_id'";
        return $this->db->query($sql)->getRow();
    }
    
}