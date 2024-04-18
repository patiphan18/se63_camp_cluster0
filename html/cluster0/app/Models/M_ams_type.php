<?php
namespace App\Models;
use CodeIgniter\Model;

class M_ams_type extends Da_ams_type {
    /*protected $table = 'ams_type';

    public function getAll($slug = false){
        if($slug === false){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }*/
    
    /*public function get_all(){
        return $this->db->table('ams_type')
        //->join('ams_asset', on ams_asset.ams_cat_id = ams_category.cat_id)
        ->join('ams_category','ams_category.cat_typ_id = ams_type.typ_id')
        ->get()->getResultArray();
    }*/
    public function get_all_type() {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }

    // public function get_all(){
    //     return $this->db->table('ams_type')
    //     ->join('ams_category', 'ams_type.typ_id = ams_category.cat_typ_id')
    //     ->get()->getResultArray();
        
    // }
    public function get_type(){
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }

    public function get_all() {
        $sql = "SELECT * FROM $this->table
        LEFT JOIN ams_circulation ON $this->table.ast_id = ams_circulation.cir_ast_id
        LEFT JOIN ams_employee ON ams_circulation.cir_emp_id = ams_employee.emp_id
        LEFT JOIN ams_category ON $this->table.ast_cat_id = ams_category.cat_id
        LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
        LEFT JOIN ams_status ON $this->table.ast_sta_id = ams_status.sta_id"; 
        
        return $this->db->query($sql)->getResult();
    }


    public function get_by_asset() {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }

    public function get_by_typ_id() {
        $sql = "SELECT * FROM $this->table
                JOIN ams_category AS cat
                ON cat.cat_id = $this->table.ast_cat_id
                WHERE cat.cat_typ_id = ?";
                
        return $this->db->query($sql, array($this->cat_typ_id))->getRow(); 
    }
}