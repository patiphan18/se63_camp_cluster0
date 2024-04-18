<?php

namespace App\Controllers;
use App\Models\M_ams_asset;
use App\Models\M_ams_employee;
use App\Models\M_ams_circulation;
use App\Models\M_ams_type;
use App\Models\M_ams_category;
use App\Models\M_ams_formula;
use App\Models\M_ams_status;

class Asset extends BaseController {

    public function show_dashboard() {
        if(!session()->get('emp_id')) {
            $login_url = base_url() . "/admin/show_login";
            header( "refresh: 0; url=$login_url" );
            exit(0);
        }
        session()->setFlashdata('main', 'หน้าหลัก');
        session()->setFlashdata('page_name', 'หน้าหลัก');

        $m_ams_asset = new M_ams_asset();
        $m_ams_type = new M_ams_type();
        // $m_ams_category = new M_ams_category();
        $m_ams_status = new M_ams_status();
        $data['arr_asset'] = $m_ams_asset->get_all();
        $data['arr_type'] = $m_ams_type->get_type();
        //   public function show_dashboard() {
        if(!session()->get('emp_id')) {
            $login_url = base_url() . "/admin/show_login";
            header( "refresh: 0; url=$login_url" );
            exit(0);
        }
        session()->setFlashdata('main', 'หน้าหลัก');
        session()->setFlashdata('page_name', 'หน้าหลัก');

        $m_ams_asset = new M_ams_asset();
        $m_ams_type = new M_ams_type();
        // $m_ams_category = new M_ams_category();
        $m_ams_status = new M_ams_status();
        $arr_asset = $m_ams_asset->get_all();

        $m_cir = new M_ams_circulation();
        $arr_emp = array();
        for($i=0;$i<count($arr_asset);$i++) {
            if($arr_asset[$i]->ast_sta_id == 2) {
                $obj_cir = $m_cir->get_borrow_now_by_ast_code($arr_asset[$i]->ast_code);
                if(isset($obj_cir)) {
                    $arr_emp[$i] = $obj_cir->emp_full_name;
                } else {
                    $arr_emp[$i] = "-";
                }
                
            } else {
                $arr_emp[$i] = "-";
            }
        }
        $data['arr_emp'] = $arr_emp;
        $data['arr_asset'] = $arr_asset;
        $data['arr_type'] = $m_ams_type->get_type();
        // $data['arr_category'] = $m_ams_category->get_category();
        $data['arr_status'] = $m_ams_status->get_status();

        $keyword = $this->request->getGet('keyword');

        $this->output('asset/v_show_dashboard',$data);
    }
    
    public function edit_asset() {
        if(!session()->get('emp_id')) {
            $login_url = base_url() . "/admin/show_login";
            header( "refresh: 0; url=$login_url" );
            exit(0);
        }
        $m_ast = new M_ams_asset();
        // $m_ast->ast_id = $this->request->getPost('ast_id');
        // $m_ast->ast_name = $this->request->getPost('ast_name');
        // $m_ast->ast_begin = $this->request->getPost('ast_begin');
        // $m_ast->ast_end = $this->request->getPost('ast_end');
        // $m_ast->ast_lifespan = $this->request->getPost('ast_lifespan');
        // $m_ast->ast_price = $this->request->getPost('ast_price');
        // $m_ast->ast_scrap = $this->request->getPost('ast_scrap');
        // $m_ast->ast_detail = $this->request->getPost('ast_detail');
        // $m_ast->ast_cat_id = $this->request->getPost('ast_cat_id');
        // $m_ast->ast_for_id = $this->request->getPost('ast_for_id');
        $ast_id = $this->request->getPost('ast_id');
        $ast_name = $this->request->getPost('ast_name');
        $ast_begin = $this->request->getPost('ast_begin');
        $ast_end = $this->request->getPost('ast_end');
        $ast_lifespan = $this->request->getPost('ast_lifespan');
        $ast_price = $this->request->getPost('ast_price');
        $ast_scrap = $this->request->getPost('ast_scrap');
        $ast_detail = $this->request->getPost('ast_detail');
        $ast_cat_id = $this->request->getPost('ast_cat_id');
        $ast_for_id = $this->request->getPost('ast_for_id');
        $m_ast->update_asset($ast_id, $ast_name, $ast_price, $ast_scrap, $ast_begin, $ast_end, $ast_lifespan, $ast_detail, $ast_cat_id, NULL, $ast_for_id);
        // echo $m_ast->ast_price;
        //$data['opt_formula'] = $m_ast->edit_asset();
        // print_r($data['opt_asset']);
        // $this->output('asset/v_show_edit_asset',$data);
        $login_url = base_url() . "/Asset/show_edit_asset/". $this->request->getPost('ast_id');
        // echo $login_url;
        header( "refresh: 0; url=$login_url" );
    }



    public function get_data_category(){
        $base_url = base_url();

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        $m_ams_category = new M_ams_category();
        $m_ams_category->cat_typ_id = $this->request->getpost('typ_id');
        $data['arr_category'] = $m_ams_category->get_category();
        echo json_encode($data);
    }

    public function show_add_asset() {
        if(!session()->get('emp_id')) {
            $login_url = base_url() . "/admin/show_login";
            header( "refresh: 0; url=$login_url" );
            exit(0);
        }
        $m_ast = new M_ams_type();
        
        $arr_type = $m_ast->get_all_type();
        $data['arr_type'] = $arr_type;

        $arr_cat = array();
        $m_ast = new M_ams_category();
        for($i=0;$i<count($arr_type);$i++) {
            $arr_cat[$i] = $m_ast->get_by_typ_id($arr_type[$i]->typ_id);
        }
        $data['arr_cat'] = $arr_cat;

        $m_for = new M_ams_formula();
        $arr_for = $m_for->get_all();
        $data['arr_for'] = $arr_for;

        session()->setFlashdata('page_name','เพิ่มครุภัณฑ์');

        $this->output('asset/v_show_add_asset', $data);

    }

    public function add_asset() {
        $base_url =  base_url();
        if(!session()->get('emp_id')) { // ไม่ไดส่งค่า ast_id หรือ ยังไม่ได้ทำการ login
            header("refresh: 0; url=$base_url");
            exit(0);
        }
        $name = $this->request->getPost('name');
        $price = $this->request->getPost('price');
        $scrap = $this->request->getPost('scrap');
        $life = $this->request->getPost('life');
        $detail = $this->request->getPost('detail');

        $day = $this->request->getPost('day');
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');

        $category = $this->request->getPost('category');
        $formula = $this->request->getPost('formula');
        
        $add_url = base_url() . "/asset/show_add_asset";

        if(!isset($name)) {
            session()->setFlashdata('msg_fail', 'name');
            header( "refresh: 0; url=$add_url" );
            exit(0);
        }
            
        if(!isset($name) && !isset($price) && !isset($scrap) && !isset($life) && !isset($detail)) {
            session()->setFlashdata('msg_fail', 'ขาดตัวแปร1');
            header( "refresh: 0; url=$add_url" );
            exit(0);
        } else if(!isset($category) && !isset($formula)) {
            session()->setFlashdata('msg_fail', 'ขาดตัวแปร2');
            header( "refresh: 0; url=$add_url" );
            exit(0);
        }

        if(!is_numeric($price) && !is_numeric($scrap) && !is_numeric($life)) {
            session()->setFlashdata('msg_fail', 'ไม่ใช่ตัวเลข1');
            header( "refresh: 0; url=$add_url" );
            exit(0);
        } else if(!is_numeric($category) && !is_numeric($formula)) {
            session()->setFlashdata('msg_fail', 'ไม่ใช่ตัวเลข2');
            header( "refresh: 0; url=$add_url" );
            exit(0);
        } else if(!is_numeric($day) && !is_numeric($month) && !is_numeric($year)) {
            session()->setFlashdata('msg_fail', 'ไม่ใช่ตัวเลข3');
            header( "refresh: 0; url=$add_url" );
            exit(0);
        }

        $da_cat = new M_ams_category();
        $obj_cat = $da_cat->get_by_cat_id($category);

        $da_for = new M_ams_formula();
        $obj_for = $da_for->get_by_for_id($formula);

        $begin_date = $year;

        if($month < 9) {
            $begin_date .= "-0" . $month;
        } else {
            $begin_date .= "-" . $month;
        }

        if($day < 9) {
            $begin_date .= "-0" . $day;
        } else {
            $begin_date .= "-" . $day;
        }

        //if(isset($obj_cat) && isset($obj_for)) {
            $year_select = $year - 543;
            $first_date = $year_select . "-01-01";
            $last_date = $year_select . "-12-31";
    
            $da_ast = new M_ams_asset();
            $arr_ast = $da_ast->get_by_cat_id_and_begin_range($category, $first_date, $last_date);

            if(count($arr_ast) > 0) {
                $code = $arr_ast[0]->ast_code;

                $run_number = intval(substr($code, 6, 4));
                $run_number++;
                $ast_code = substr($code, 0, 6);

                if($run_number < 10) {
                    $ast_code .= "000$run_number";
                } else if($run_number < 100) {
                    $ast_code .= "00$run_number";
                } else if($run_number < 1000) {
                    $ast_code .= "0$run_number";
                } else {
                    $ast_code .= "$run_number";
                }
            } else {
                $ast_code = substr($begin_date, 2, 2);

                if($obj_cat->cat_typ_id < 9) {
                    $ast_code .= "0". $obj_cat->cat_typ_id;
                } else {
                    $ast_code .= $obj_cat->cat_typ_id;
                }

                if($obj_cat->cat_code < 9) {
                    $ast_code .= "0". $obj_cat->cat_code;
                } else {
                    $ast_code .= $obj_cat->cat_code;
                }

                $ast_code .= "0001";
            }

            $new_date = $year - 543;

            if($month < 9) {
                $new_date .= "-0" . $month;
            } else {
                $new_date .= "-" . $month;
            }
    
            if($day < 9) {
                $new_date .= "-0" . $day;
            } else {
                $new_date .= "-" . $day;
            }

            $da_ast->insert_asset($ast_code, $name, $price, $scrap, $new_date, $life, $detail, $category, 1, $formula);

            session()->setFlashdata('msg_success', 'เพิ่มครุภัณฑ์สำเร็จ');
            session()->setFlashdata('code', $ast_code);
            header( "refresh: 0; url=$add_url" );
            exit(0);
        //}

        session()->setFlashdata('msg_fail', 'เพิ่มครุภัณฑ์ไม่สำเร็จ');
        header( "refresh: 0; url=$add_url" );
        exit(0);        
    
    }

    public function delete_asset() {
        $base_url =  base_url();
        $ast_id = $this->request->getpost('ast_id');
        if(!session()->get('emp_id') || !isset($ast_id)) { // ไม่ไดส่งค่า ast_id หรือ ยังไม่ได้ทำการ login
            header("refresh: 0; url=$base_url");
            exit(0);
        }

        $m_ast = new M_ams_asset();
        $obj_ast = $m_ast->get_by_ast_id($ast_id); // มีครุภัณฑ์นี้อยู่หรือไม่

        if(isset($obj_ast)) { // มีครุภัณฑ์นี้อยู่ในระบบ
            $m_cir = new M_ams_circulation();
            $obj_cir = $m_cir->get_borrow_now_by_ast_code($obj_ast->ast_code); // ครุภัณฑ์กำลังถูกยืมอยู่หรือไม่
            if(!isset($obj_cir)) { // ครุภัณฑ์ไม่ได้ถูกใครยืมอยู่
                $m_ast->delete_asset($ast_id);
                session()->setFlashdata('msg_success', "ลบครุภัณฑ์สำเร็จ");
                header("refresh: 0; url=$base_url");
                exit(0);
            }
        }
        session()->setFlashdata('msg_fail', "ลบครุภัณฑ์ไม่สำเร็จ");
        header("refresh: 0; url=$base_url");
        exit(0);
    }

    public function show_edit_asset($ast_id) {
        $base_url = base_url();

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        $m_cat = new M_ams_category();
        $data['opt_category'] = $m_cat ->get_all_category();
        $m_typ = new M_ams_type();
        $data['opt_type'] = $m_typ ->get_all_type();
        $m_for = new M_ams_formula();
        $data['opt_formula'] = $m_for ->get_all();
        $m_ast = new M_ams_asset();
        $data['opt_asset'] = $m_ast->get_by_ast_id($ast_id);
        // print_r($data['opt_asset']);
        $this->output('asset/v_show_edit_asset',$data);
    }

    public function get_ast_type(){
        $base_url = base_url();

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }
        $arr_name = array();
        $m_ams_asset = new M_ams_asset();
        if($this->request->getPost('cat_id') == 'none'){
            $m_ams_asset->typ_id = $this->request->getPost('typ_id');
            $arr_asset = $m_ams_asset->get_data_by_type_id();
        }else{
            $m_ams_asset->typ_id = $this->request->getPost('typ_id');
            $m_ams_asset->cat_id = $this->request->getPost('cat_id');
            $arr_asset = $m_ams_asset->get_data_type_id_cat_id();
            
            
        }
        $m_cir = new M_ams_circulation();
        for($i=0;$i<count($arr_asset);$i++) {
            if($arr_asset[$i]->ast_sta_id == 2) {
                $obj_cir = $m_cir->get_borrow_now_by_ast_code($arr_asset[$i]->ast_code);
                $arr_asset[$i]->ast_detail = $obj_cir->emp_full_name;
            } else {
                $arr_asset[$i]->ast_detail = "-";
            }
        }
        //$data['arr_name'] = $arr_name;
        $data['arr_asset'] = $arr_asset;
        echo json_encode($data);
    }
  

}
