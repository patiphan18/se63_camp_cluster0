<?php

namespace App\Controllers;
use App\Models\M_ams_asset;
use App\Models\M_ams_employee;
use App\Models\M_ams_circulation;
use App\Models\M_ams_type;
use App\Models\M_ams_category;
use App\Models\M_ams_formula;
use App\Models\M_ams_status;

class Admin extends BaseController {

    public $email;
    public $password;

    public function show_login() {
        $session = session();
        $base_url = base_url();

        if($session->get('emp_id')) {
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        return view('admin/v_show_login');
    }

    public function check_login() {
        $session = session();
        $base_url = base_url();
        $login_url = $base_url . "/admin/show_login";

        if($session->get('emp_id')) {
            header( "refresh: 0; url=$base_url" );
            exit(0);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if(!isset($email) || !isset($password)) { 
            $session->setFlashdata('msg', 'เกิดข้อผิดพลาดในการเข้าสู่ระบบ');     
            header( "refresh: 0; url=$login_url" );
            exit(0);
        } 

        $hash_pass = hash('sha256', $password);

        $m_emp = new M_ams_employee();

        $m_emp->emp_email =  $email;
        $m_emp->emp_password =  $hash_pass;

        $obj_emp = $m_emp->get_by_email_and_password();

        if(isset($obj_emp)) { // พบข้อมูลพนักงาน
            if(hash('sha256', $obj_emp->emp_email) == hash('sha256', $email)) {
                $ses_data = [
                    'emp_id' => $obj_emp->emp_id,
                    'emp_code' => $obj_emp->emp_code
                ]; 
    
                $session->set($ses_data);
                header("refresh: 0; url=$base_url");
                exit(0); 
            }
        }

        $session->setFlashdata('msg', 'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');
        header( "refresh: 0; url=$login_url" );
        exit(0);

    }

    public function logout() {
        $session = session();
        if(!$session->get('emp_id')) {
            $url = base_url();
            header( "refresh: 0; url=$url" );
            exit(0);
        }

        $session->destroy();
        $login_url = base_url() . "/admin/show_login";
        header( "refresh: 0; url=$login_url" );
        exit(0);
    }

    public function show_profile() {
        if(!session()->get('emp_id')) {
            $login_url = base_url() . "/admin/show_login";
            header( "refresh: 0; url=$login_url" );
            exit(0);
        }
        session()->setFlashdata('page_name','ข้อมูลผู้ใช้');
        $m_emp = new M_ams_employee();
        $m_emp->emp_id = session()->get('emp_id');
        $data['obj_emp'] = $m_emp->get_by_id();

        $this->output('admin/v_show_profile', $data);
    }    

    public function edit_full_name(){
        if(!session()->get('emp_id')) {
            $login_url = base_url() . "/admin/show_login";
            header( "refresh: 0; url=$login_url" );
            exit(0);
        }
        $data['page_name'] = "ข้อมูลส่วนตัว";
        $m_emp = new M_ams_employee();
        $m_emp->emp_id = session()->get('emp_id');
        $m_emp->emp_full_name = $this->request->getPost('full_name');
        $m_emp->update_full_name();
        $show_profile = base_url().'/Admin/show_profile';
        header("refresh: 0; url=$show_profile");
    }

    public function edit_password(){
        if(!session()->get('emp_id')) {
            $login_url = base_url() . "/admin/show_login";
            header( "refresh: 0; url=$login_url" );
            exit(0);
        }
        $data['page_name'] = "ข้อมูลส่วนตัว";
        $m_emp = new M_ams_employee();
        
        $cur_pass = $this->request->getPost('cur_pass');
        $new_pass = $this->request->getPost('new_pass');
        $confirm_pass = $this->request->getPost('confirm_pass');
        
        $obj_emp = $m_emp->get_by_emp_id(session()->get('emp_id'));

        $url = base_url().'/admin/show_profile';

        if(hash('sha256', $cur_pass) != $obj_emp->emp_password) {
            session()->setFlashdata('msg_fail', 'รหัสผ่านปัจจุบันไม่ถูกต้อง');
            header( "refresh: 0; url=$url" );
            exit(0);
        }

        if($new_pass != $confirm_pass) {
            session()->setFlashdata('msg_fail', 'รหัสผ่านใหม่ไม่ตรงกัน');
            header( "refresh: 0; url=$url" );
            exit(0);
        }

        if($new_pass == $cur_pass) {
            session()->setFlashdata('msg_fail', 'รหัสผ่านใหม่ต้องไม่เหมือนกับปัจจุบัน');
            header( "refresh: 0; url=$url" );
            exit(0);
        }

        $m_emp->update_password(session()->get('emp_id'), hash('sha256', $new_pass));
        
        session()->setFlashdata('msg_success', 'เปลี่ยนรหัสผ่านสำเร็จ');
        header( "refresh: 0; url=$url" );
        exit(0);
    }
}    
