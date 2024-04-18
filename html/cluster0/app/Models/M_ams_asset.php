<?php
namespace App\Models;
use CodeIgniter\Model;

class M_ams_asset extends Da_ams_asset {

    public function update_status($ast_id, $sta_id) {
        $sql = "UPDATE $this->table SET ast_sta_id = '$sta_id'
                WHERE ast_id = '$ast_id'";
                
        $this->db->query($sql); 
    }

    public function get_by_cat_id_and_begin_range($cat_id, $first_date, $last_date) { 
        $sql = "SELECT * FROM $this->table
                WHERE (ast_begin BETWEEN '$first_date' AND '$last_date' ) AND $this->table.ast_cat_id = '$cat_id'
                ORDER BY $this->table.ast_id DESC";
        return $this->db->query($sql)->getResult();
    }

    public function get_all() {
        $sql = "SELECT * FROM $this->table
        LEFT JOIN ams_category ON $this->table.ast_cat_id = ams_category.cat_id
        LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
        LEFT JOIN ams_status ON $this->table.ast_sta_id = ams_status.sta_id"; 
        
        return $this->db->query($sql)->getResult();
    }

    public function search_asset_by_ast_code_ast_name($keyword){
        $sql = "SELECT * FROM $this->table
        LEFT JOIN ams_circulation ON $this->table.ast_id = ams_circulation.cir_ast_id
        LEFT JOIN ams_employee ON ams_circulation.cir_emp_id = ams_employee.emp_id
        LEFT JOIN ams_category ON $this->table.ast_cat_id = ams_category.cat_id
        LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
        LEFT JOIN ams_status ON $this->table.ast_sta_id = ams_status.sta_id
        WHERE $this->table.ast_code = '$keyword' || ams_employee.emp_name = '$keyword'";

        return $this->db->query($sql)->getResult();
    }

    public function search_asset_by_type_name($typ_name){
        $sql = "SELECT * FROM $this->table
        LEFT JOIN ams_circulation ON $this->table.ast_id = ams_circulation.cir_ast_id
        LEFT JOIN ams_employee ON ams_circulation.cir_emp_id = ams_employee.emp_id
        LEFT JOIN ams_category ON $this->table.ast_cat_id = ams_category.cat_id
        LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
        LEFT JOIN ams_status ON $this->table.ast_sta_id = ams_status.sta_id
        WHERE $this->table.ast_code = '$typ_name' || ams_employee.emp_name = '$typ_name'";

        return $this->db->query($sql)->getResult();
    }


    public function get_audit(){
        $sql = "SELECT typ.typ_name, SUM(ams_asset.ast_price) AS sum_price, ast_scrap, ast_lifespan, ast_price FROM ams_asset 
        JOIN ams_category AS cat
        ON ams_asset.ast_cat_id = cat.cat_id
        JOIN ams_type AS typ
        ON cat.cat_typ_id = typ.typ_id
        GROUP BY cat.cat_typ_id";
        return $this->db->query($sql)->getResult();

    }
    public $table = "ams_asset";
    public function get_by_asset() {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }
    public function get_by_ast_code($ast_code) {
        $sql = "SELECT * FROM $this->table
                LEFT JOIN ams_category ON $this->table.ast_cat_id = ams_category.cat_id
                LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
                LEFT JOIN ams_formula ON $this->table.ast_for_id = ams_formula.for_id
                LEFT JOIN ams_status ON $this->table.ast_sta_id = ams_status.sta_id
                WHERE $this->table.ast_code = '$ast_code'"; 
                
        return $this->db->query($sql)->getRow(); 
    }
    public function get_borrow_asset() {
        $sql = "SELECT * FROM ams_asset
                JOIN ams_category
                ON ams_asset.ast_cat_id = ams_category.cat_id
                JOIN ams_type
                ON ams_category.cat_typ_id = ams_type.typ_id
                JOIN ams_image
                ON ams_asset.ast_id = ams_image.img_ast_id
                WHERE ast_code=?"; //เลขครุภัณฑ์ที่ต้องการค้นหา 
        return $this->db->query($sql, array($this->ast_code))->getResult();
    }
        public function get_all_cat() {
        $sql = "SELECT * FROM ams_category";
        return $this->db->query($sql)->getResult();
    }

    public function get_data_by_type_id(){
        $sql = "SELECT * FROM $this->table
        LEFT JOIN ams_category ON $this->table.ast_cat_id = ams_category.cat_id
        LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
        LEFT JOIN ams_status ON $this->table.ast_sta_id = ams_status.sta_id
        WHERE ams_type.typ_id = ?";
        return $this->db->query($sql, array($this->typ_id))->getResult();
    }

    //ใช้คืนค่าครุภัณฑ์แสดงแบบประเภท
    public function get_data_type_id_cat_id(){
        $sql = "SELECT * FROM $this->table
        LEFT JOIN ams_category ON $this->table.ast_cat_id = ams_category.cat_id
        LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
        LEFT JOIN ams_status ON $this->table.ast_sta_id = ams_status.sta_id
        WHERE ams_type.typ_id = ? AND ams_category.cat_id = ?";
        return $this->db->query($sql, array($this->typ_id, $this->cat_id))->getResult();
    }

}