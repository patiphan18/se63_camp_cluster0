<?php

namespace App\Controllers;
use App\Models\M_ams_asset;
use App\Models\M_ams_employee;
use App\Models\M_ams_circulation;
use App\Models\M_ams_type;
use App\Models\M_ams_category;
use App\Models\M_ams_formula;

class Audit extends BaseController {
    public function __construct(){
        $this->M_ams_asset = new M_ams_asset();
    }//กำหนดค่าเริ่มต้น
    public function show_balance(){
        $base_url = base_url();

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        session()->setFlashdata('page_name','รายงานค่าเสื่อมราคา');
        $data=[
            'asset' => $this->M_ams_asset->get_all()
        ];
        // print_r($data['asset']);
        
        return $this->output('audit/v_show_balance', $data);
        
    }//คืนค่าข้อมูลที่อยู่ในตาราง ams_asset

    public function show_audit(){
        $base_url = base_url();

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        session()->setFlashdata('page_name','รายงานค่าเสื่อมราคา');
        $data=[
            'asset' => $this->M_ams_asset->get_audit()
        ];
        
        return $this->output('audit/v_show_audit', $data);
    }//คืนค่าข้อมูลที่อยู่ในตาราง ams_asset


    public function calcurate(){
                //สูตรเส้นตรง ค่าเสื่อม = (ราคาซื้อ - ราคาซาก) *  %อัตราค่าเสื่อม
                //สูตรลดยอด อัตราค่าเสื่อมคงที่% = 100 x (1 - รากที่ n ของ (ราคาซาก/ราคาทุน))
                //ค่าเสื่อม = มูลค่า x อัตราค่าเสื่อมคงที่ %
    }

}
