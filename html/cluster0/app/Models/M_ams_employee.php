<?php
namespace App\Models;
use CodeIgniter\Model;

class M_ams_employee extends Da_ams_employee {


    public function get_by_email_and_password() {
        // ฟังก์ชันสำหรับ login เข้าสู่ระบบ
        $sql = "SELECT * FROM $this->table WHERE emp_email = ? AND emp_password = ?";
        return $this->db->query($sql, array($this->emp_email, $this->emp_password))->getRow();
    }
    public function get_by_emp_code(){
        $sql = "SELECT $this->table.emp_id FROM $this->table WHERE emp_code = ?";
        return $this->db->query($sql, array($this->emp_code))->getRow();
    }


    public function get_by_id(){
        // ฟังก์ชันสำหรับดึงข้อมูลชื่อ
        $sql = "SELECT * FROM $this->table WHERE emp_id = ?"; 
        return $this->db->query($sql, array($this->emp_id))->getRow();
    }
    



}