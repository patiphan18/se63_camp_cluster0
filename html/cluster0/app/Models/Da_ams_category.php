<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_ams_category extends Model {
    protected $table = "ams_category";
    public $cat_typ_id;


    public function update_category($cat_id, $cat_name, $typ_id) {
        $sql = "UPDATE $this->table SET ";

        $count = 0;

        if($cat_name != NULL) {
            $sql .= "$this->table.cat_name = '$cat_name'";
            $count++;
        }

        if($typ_id != NULL) {
            if($count == 0) {
                $sql .= "$this->table.typ_id = '$typ_id'";
                $count++;
            } else {
                $sql .= ",$this->table.typ_id = '$typ_id'";
            }
            
        }

        if($count == 0) {
            return;
        }

        $sql .= " WHERE $this->table.cat_id = '$cat_id'";

        $this->db->query($sql);
    }

    public function get_by_cat_id($cat_id) {
        $sql = "SELECT * FROM $this->table WHERE $this->table.cat_id = '$cat_id'";
        return $this->db->query($sql)->getRow();
    }

}