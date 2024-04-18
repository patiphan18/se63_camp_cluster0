<?php
/*
    คลาส M_ams_circulation
    สำหรับเชื่อมต่อกับตาราง ams_circulation
*/

namespace App\Models;
use CodeIgniter\Model;

class M_ams_circulation extends Da_ams_circulation {

    public function update_return($cir_id, $return_date) {
        $sql = "UPDATE $this->table SET $this->table.cir_return = '$return_date'
                WHERE $this->table.cir_id = '$cir_id'";
         $this->db->query($sql);
    }

    public function get_by_cir_id($cir_id) {
        $sql = "SELECT * FROM $this->table
                WHERE $this->table.cir_id = '$cir_id'";
         return $this->db->query($sql)->getRow();
    }

    public function get_borrow_now_by_ast_code($ast_code) {
        $sql = "SELECT * FROM $this->table 
                LEFT JOIN ams_asset ON $this->table.cir_ast_id = ams_asset.ast_id
                LEFT JOIN ams_employee ON $this->table.cir_emp_id = ams_employee.emp_id
                LEFT JOIN ams_status ON ams_asset.ast_sta_id = ams_status.sta_id
                LEFT JOIN ams_category ON ams_asset.ast_cat_id = ams_category.cat_id
                LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
                WHERE ams_asset.ast_code = '$ast_code' AND $this->table.cir_return IS NULL";
                
        return $this->db->query($sql)->getRow();       
    }
    //ดึงข้อมูลรูปภาพ
    // public function get_ams_image() {
    //     $sql = "SELECT * FROM ams_image
    //      WHERE img_ast_id=?";
    //      return $this->db->query($sql, array($this->img_ast_id))->getResult();
    // }
    public function get_show_borrow_and_return() {
        $sql = "SELECT * FROM $this->table
                JOIN ams_asset ON $this->table.cir_ast_id = ams_asset.ast_id
                JOIN ams_employee ON $this->table.cir_emp_id = ams_employee.emp_id
                JOIN ams_status ON ams_asset.ast_sta_id = ams_status.sta_id
                JOIN ams_category ON ams_asset.ast_cat_id = ams_category.cat_id
                JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
                WHERE $this->table.cir_return IS NULL";        
        return $this->db->query($sql)->getResult();    
    }
}