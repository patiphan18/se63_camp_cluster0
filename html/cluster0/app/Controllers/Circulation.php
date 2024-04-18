<?php

namespace App\Controllers;
use App\Models\M_ams_asset;
use App\Models\M_ams_employee;
use App\Models\M_ams_circulation;
use App\Models\M_ams_type;
use App\Models\M_ams_category;
use App\Models\M_ams_formula;
use App\Models\M_ams_image;
use App\Models\M_ams_status;

class circulation extends BaseController {
    public function show_return_asset() { // ฟังก์ชันแสดงหน้าจอคืนครุภัณฑ์
        if(!session()->get('emp_id')) {
            $login_url = base_url() . "/admin/show_login";
            header( "refresh: 0; url=$login_url" );
            exit(0);
        }
        session()->setFlashdata('main', 'ยืม-คืนครุภัณฑ์');
        session()->setFlashdata('page_name', 'คืนครุภัณฑ์');

        $ast_code = $this->request->getGet('code'); // รับค่าเลขทะเบียนจากหน้า show_circulation
  
        if(isset($ast_code)) {
            $m_ast = new M_ams_asset();
            $obj_ast = $m_ast->get_by_ast_code($ast_code); // ตรวจสอบว่ามีครุภัณฑ์นี้อยู๋ในระบบหรือไม่

            if(isset($obj_ast)) { // มีครุภัณฑ์นี้อยู่ในระบบ
                $m_cir = new M_ams_circulation();
                $obj_cir = $m_cir->get_borrow_now_by_ast_code($ast_code); // ตรวจสอบว่าครุภัณฑ์นี้ถูกยืมอยู่หรือไม่

                if(isset($obj_cir)) { // ครุภัณฑ์ถูกยืมอยู่
                    $m_img = new M_ams_image();
                    $data['arr_img'] = $m_img->get_by_ast_id($obj_cir->ast_id); // get รูปภาพครุภัณฑ์จาก ams_image
                    $data['obj_cir'] = $obj_cir; // เซ็ตค่า object ของข้อมูล circulation

                    return $this->output('circulation/v_show_return_asset', $data); // ส่งค่าไปที่หน้า view
                } else {
                    session()->setFlashdata('msg', 'ครุภัณฑ์ไม่ได้ถูกยืมอยู่ในขณะนี้');
                }

            } else {
                session()->setFlashdata('msg', 'ไม่พบข้อมูลครุภัณฑ์จากเลขทะเบียนนี้');
            }

        }

        return $this->output('circulation/v_show_return_asset');
    }

    public function return_asset() { // ฟังก์ชันคืนครุภัณฑ์
        $base_url = base_url();
        $return_url = base_url() . "/circulation/show_return_asset";

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        $ast_code = $this->request->getPOST('ast_code'); // รับค่าเลขทะเบียนครุภัณฑ์จากหน้า show_return_asset
        $day = $this->request->getPOST('day'); // รับค่าวันที่ทำการคืนจากหน้า show_return_asset
        $month = $this->request->getPOST('month'); // รับค่าเดือนทำการที่คืนจากหน้า show_return_asset
        $year = $this->request->getPOST('year'); // รับค่าปีที่ทำการคืนจากหน้า show_return_asset
        //$arr_img_cancel = $this->request->getPost('arr_img_cancel');
        // echo '<pre>';
        // print_r($arr_img_cancel);
        // echo '</pre>';
        if(!isset($ast_code) || !isset($day) || !isset($month) || !isset($year)) { // ไม่ได้ส่งค่าเลขทะเบียนกับวันเดือนปีที่ทำการคืนมา
            
            session()->setFlashdata('msg_fail', "ข้อมูลไม่ครบ");
            header( "refresh: 0; url=$return_url" );
            exit(0);
        }
        /*
        $count = 0;
        $allowed = array('png', 'jpg'); // รับไฟล์นามสกุล png กับ jpg
        foreach ($_FILES['image']['name'] as $key => $val) { // ตรวจสอบนามสกุลไฟล์ว่าใช่รูปภาพหรือไม่
            $filename = $val;
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                session()->setFlashdata('msg_fail', "นามสกุลภาพ");
                header( "refresh: 0; url=$return_url" );
                exit(0);
            }
            $count++; // ตรวจสอบว่ามีไฟล์อยู่
        }

        if($count < 1) { // ไม่ได้ใส่รูปภาพมาเลย
            session()->setFlashdata('msg_fail', "บันทึกไม่สำเร็จ");
            header( "refresh: 0; url=$return_url" );
            exit(0);
        }
        */
        $year = $year - 543; // แปลงค่าวันที่จาก พ.ศ. เป็น ค.ศ. เพื่อใช้ในการเก็บลง database
        $date = $year . "-" . $month . "-" . $day;

        $m_cir = new M_ams_circulation();
        $obj_cir = $m_cir->get_borrow_now_by_ast_code($ast_code); // ตรวจสอบว่าถูกยืมอยู่หรือไม่

        $m_img = new M_ams_image();

        if(isset($obj_cir)) { // พบว่ากำลังถูกยืมอยู่
            $m_cir->update_return($obj_cir->cir_id, $date); // อัปเดตวันที่ทำการคืน
            /*
            $arr_img = $m_img->get_by_ast_id($obj_cir->ast_id);
            for($i=0;$i<count($arr_img);$i++) {
                unlink("./picture/" . $arr_img[$i]->img_name); // ลบรูปภาพออกจากโฟลเดอร์ picture
            }
            $m_img->delete_by_ast_id($obj_cir->ast_id); // ลบรูปภาพเก่าในตาราง ams_img ทิ้ง

            $check = 0;
            foreach ($_FILES['image']['name'] as $key => $val) { // อัปโหลดไฟล์รูปภาพใหม่เข้าสู่ระบบ
                $rand = rand('11111','999999');
                $check = 0;
               
                for($i=1; $i<count($arr_img_cancel); $i++) {
                    if($arr_img_cancel[$i] == $val) {
                        array_splice($arr_img_cancel, $i, 1);
                        $check = 1;
                    }
                }
                if($check == 0) {
                    $file = $rand . "_" . $val;
                    move_uploaded_file($_FILES["image"]["tmp_name"][$key], "picture/".$file);
                    $m_img->insert_image($file, $obj_cir->ast_id);
                }       
            }
            */
            $m_ast = new M_ams_asset();
            $m_ast->update_status($obj_cir->ast_id, 1); // อัปเดตสถานะครุภัณฑ์เป็น ว่าง

            session()->setFlashdata('msg_success', "บันทึกสำเร็จ"); // ข้อความแจ้งเตือนว่าบันทึกข้อมูลสำเร็จ
            
            $return_url = base_url() . "/circulation/show_return_asset";
            header( "refresh: 0; url=$return_url" ); // กลับหน้ายืมคืนครุภัณฑ์
            exit(0);
        }

    }
    //ยืมครุภัณฑ์
    public function show_borrow_asset() { 
        $base_url = base_url();

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        session()->setFlashdata('page_name','ยืมครุภัณฑ์');
        $ast_code = $this->request->getGet('code');
        // $base_url = base_url().'/Circulation/show_borrow_asset';
        if(isset($ast_code)) {
            session()->setFlashdata('code', $ast_code);
            $m_ast = new M_ams_asset();
            $obj_ast = $m_ast->get_by_ast_code($ast_code); // ตรวจสอบว่ามีครุภัณฑ์นี้อยู๋ในระบบหรือไม่

            if(isset($obj_ast)) { // มีครุภัณฑ์นี้อยู่ในระบบ
                $m_cir = new M_ams_circulation();
                $obj_cir = $m_cir->get_borrow_now_by_ast_code($ast_code); // ตรวจสอบว่าครุภัณฑ์นี้ถูกยืมอยู่หรือไม่

                if(!isset($obj_cir)) { // ครุภัณฑ์ไม่ถูกยืมอยู่
                    $m_img = new M_ams_image();
                    $data['arr_img'] = $m_img->get_by_ast_id($obj_ast->ast_id); // get รูปภาพครุภัณฑ์จาก ams_image
                    $data['obj_ast'] = $obj_ast; // เซ็ตค่า object ของข้อมูล circulation

                    return $this->output('circulation/v_show_borrow_asset', $data); // ส่งค่าไปที่หน้า view
                } else {
                    session()->setFlashdata('msg', 'ครุภัณฑ์ถูกยืมอยู่ในขณะนี้');
                }

            } else {
                session()->setFlashdata('msg', 'ไม่พบข้อมูลครุภัณฑ์จากเลขทะเบียนนี้');
            }

           }    
           return $this->output('circulation/v_show_borrow_asset');

    }
    //บันทึกข้อมูลการยืม
    public function insert_circulation(){
        $show_borrow = base_url().'/Circulation/show_borrow_asset';

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$show_borrow" );
            exit(0);
        }
        $ast_id = $this->request->getPOST('ast_id'); 
        $emp_code = $this->request->getPOST('emp_code'); 
        $day = $this->request->getPOST('day'); 
        $month = $this->request->getPOST('month'); 
        $year = $this->request->getPOST('year'); 

        $year = $year - 543; // แปลงค่าวันที่จาก พ.ศ. เป็น ค.ศ. เพื่อใช้ในการเก็บลง database
        $date = $year . "-" . $month . "-" . $day;

        $m_cir = new M_ams_circulation();      
        $m_emp = new M_ams_employee();
        $m_emp->emp_code = $emp_code;
        $emp_id = $m_emp->get_by_emp_code();
        if(!isset($emp_id)) {
            session()->setFlashdata('msg_fail', "บันทึกไม่สำเร็จ");
            header( "refresh: 0; url=$show_borrow" );
            exit(0);
        }
        $m_cir->cir_borrow = $date; 
        $m_cir->cir_ast_id = $ast_id;
        $m_cir->cir_emp_id = $emp_id->emp_id;
        
        $m_cir->insert_circulation();
        $m_ast = new M_ams_asset();
            $m_ast->update_status($ast_id, 2); // อัปเดตสถานะครุภัณฑ์เป็น ถูกยืม

        session()->setFlashdata('msg_success', "บันทึกสำเร็จ");
        
        header("refresh: 0; url=$show_borrow");
    }

    // public function update(){
    //     $m_asset = new M_ams_asset();
    //     $ast_id = $this->request->getPost('ast_id');
    //     $ast_sta_id = 2;
        
    //     $m_asset->update_asset($ast_sta_id);

    //     $show_borrow = base_url().'/Circulation/show_borrow_asset';
    //     header("refresh: 0; url=$show_borrow");
    // }

    // public function return_image_asset()
    // {
    //     $m_cir = new M_ams_circulation();
    //     $data['opt_image'] = $m_cir->get_ams_image();
    //     //$data['opt_asset'] = $this->request->getPost('ast_code');
        
    //     //print_r($data['opt_image']);
    //     $this->output('circulation/v_show_borrow_asset', $data[]);
    // }

    public function show_circulation() {
        $base_url = base_url();

        if(!session()->get('emp_id')) { // ยังไม่ได้ทำการ login
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        session()->setFlashdata('page_name','ยืม-คืนครุภัณฑ์');
        $m_cir = new M_ams_circulation();
        $data['opt_circulation'] = $m_cir->get_show_borrow_and_return();
        $data['page_name'] = "ยืม-คืน";
        $this->output('circulation/v_show_circulation', $data);
    }
}
