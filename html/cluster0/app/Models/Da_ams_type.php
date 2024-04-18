<?php
// คลาส Da_ams_type

namespace App\Models;
use CodeIgniter\Model;

class Da_ams_type extends Model {
    protected $table = "ams_type";

    public function update_type($typ_id, $typ_name) {
        /* 
            ฟังก์ชันอัปเดตชื่อประเภทครุภัณฑ์
            รับค่า ไอดีประเภท ชื่อประเภท
        */
        $sql = "UPDATE $this->table SET ";

        $count = 0;

        if($typ_name != NULL) {
            $sql .= "$this->table.typ_name = '$typ_name'";
            $count++;
        }

        if($count == 0) {
            return;
        }

        $sql .= " WHERE $this->table.typ_id = '$typ_id'";

        $this->db->query($sql);
    }

    public function get_join(){
        $sql = "SELECT * FROM $this->table
            --LEFT JOIN $this->table ON ams_type.typ_id = ams_category.cat_typ_id
            LEFT JOIN ams_category ON $this->table.typ_id = ams_category.cat_typ_id";
        
        return $this->db->query($sql)->getRow();
    }

}