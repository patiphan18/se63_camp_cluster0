<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_ams_asset extends Model {
    protected $table = "ams_asset";

    public function insert_asset($code, $name, $price, $scrap, $begin_date, $life, $detail, $cat_id, $sta_id, $for_id) { 
        // begin_date วันที่ซือมา
        // end_date วันที่เลิกใช้งาน
        $sql = "INSERT INTO $this->table (ast_id, ast_code, ast_name, ast_price, ast_scrap, ast_begin, ast_end, ast_lifespan, ast_detail, ast_cat_id, ast_sta_id, ast_for_id)
                VALUES(NULL, '$code', '$name', '$price', '$scrap', '$begin_date', NULL, '$life', '$detail', '$cat_id', '$sta_id', '$for_id')";
        $this->db->query($sql);
    }
    
    public function delete_asset($ast_id) { 
        $sql = "DELETE FROM $this->table WHERE $this->table.ast_id = '$ast_id';";
        $this->db->query($sql);
    }
    public function add_asset($ast_code,$ast_name,$ast_price,$ast_scrap,$ast_begin,$ast_end,$ast_lifespan,$ast_detail,$ast_cat_id,$st_for_id,$ast_sta_id) { 
        $sql = "INSERT INTO $this->table VALUES(NULL, '$ast_code','$ast_name','$ast_price','$ast_scrap','$ast_begin','$ast_end','$ast_lifespan','$ast_detail','$ast_cat_id','$st_for_id','$ast_sta_id')";
        $this->db->query($sql);
    }

    public function update_asset($ast_id, $name, $price, $scrap, $begin_date, $end_date, $life, $detail, $cat_id, $sta_id, $for_id) { 
        $count = 0;
        $sql = "UPDATE $this->table SET ";

        if($name != NULL) {
            $sql .= "ast_name = '$name'";
            $count++;
        }

        if($price != NULL) {
            if($count == 0) {
                $sql .= "ast_price = '$price'";
                $count++;
            } else {
                $sql .= ",ast_price = '$price'";
            }      
        }

        if ($scrap != NULL) {
            if ($count == 0) {
                $sql .= "ast_scrap = '$scrap'";
                $count++;
            } else {
                $sql .= ",ast_scrap = '$scrap'";
            }      
        }

        if($begin_date != NULL) {
            if($count == 0) {
                $sql .= "ast_begin = '$begin_date'";
                $count++;
            } else {
                $sql .= ",ast_begin = '$begin_date'";
            }      
        }

        if($end_date != NULL) {
            if($count == 0) {
                $sql .= "ast_end = '$end_date'";
                $count++;
            } else {
                $sql .= ",ast_end = '$end_date'";
            }      
        }

        if($life != NULL) {
            if($count == 0) {
                $sql .= "ast_lifespan = '$life'";
                $count++;
            } else {
                $sql .= ",ast_lifespan = '$life'";
            }      
        }

        if($detail != NULL) {
            if($count == 0) {
                $sql .= "ast_detail = '$detail'";
                $count++;
            } else {
                $sql .= ",ast_detail = '$detail'";
            }      
        }

        if($cat_id != NULL) {
            if($count == 0) {
                $sql .= "ast_cat_id = '$cat_id'";
                $count++;
            } else {
                $sql .= ",ast_cat_id = '$cat_id'";
            }      
        }

        if($sta_id != NULL) {
            if($count == 0) {
                $sql .= "ast_sta_id = '$sta_id'";
                $count++;
            } else {
                $sql .= ",ast_sta_id = '$sta_id'";
            }      
        }

        if($for_id != NULL) {
            if($count == 0) {
                $sql .= "ast_for_id = '$for_id'";
                $count++;
            } else {
                $sql .= ",ast_for_id = '$for_id'";
            }      
        }

        if($count == 0) {
            return;
        }

        $sql .= " WHERE ast_id = '$ast_id'";

        $this->db->query($sql);
    }

    public function edit_asset() { 
        $sql = "UPDATE $this->table
                    SET ast_code = ?,
                    ast_name = ?,
                    ast_price = ?,
                    ast_scrap = ?,
                    ast_begin = ?,
                    ast_end = ?,
                    ast_lifespan = ?,
                    ast_detail = ?,
                    ast_cat_id = ?,
                    ast_for_id = ?,
                    ast_sta_id = ?
                    WHERE ast_id = ?";
        $this->db->query($sql, array($this->ast_code,$this->ast_name,$this->ast_price,$this->ast_scrap,$this->ast_begin,$this->ast_end,$this->ast_lifespan,$this->ast_detail,$this->ast_cat_id,$this->ast_for_id,$this->ast_sta_id));
    }

    public function get_by_ast_id($ast_id) { 
        $sql = "SELECT * FROM $this->table
        LEFT JOIN ams_category ON $this->table.ast_cat_id = ams_category.cat_id
        LEFT JOIN ams_type ON ams_category.cat_typ_id = ams_type.typ_id
        LEFT JOIN ams_status ON $this->table.ast_sta_id = ams_status.sta_id
        WHERE $this->table.ast_id = '$ast_id'";
        return $this->db->query($sql)->getRow();
    }

    // public function update_asset($ast_id){
    //     $search = $this->request->getPost('ast_code');
    //     $sql = "UPDATE $this->table 
    //     SET ast_sta_id = '$ast_sta_id'"

    //     $sql .= " WHERE ast_sta_id = 'ast_id'";
    //     $this->db->query($sql);
    // }
}