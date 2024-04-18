<!-- ส่วนของแถบเมนูด้านซ้าย -->
        <!-- <div class="shadow position-fixed p-3 sidebar" style="height: 100%; bottom:0; left:0; width:15; background-color:white;">
            <div class="row" style="margin-top: 40%;"></div>
            <a href="<?php echo base_url() ?>" class="text-decoration-none" style="font-size: 20px;">
                <div class="row my-3 px-0">
                    <div class="col-10 px-1" style="<?php if(session()->getFlashdata('main') == "จัดการครุภัณฑ์") { echo 'color: #00178D;'; } else { echo 'color: black;'; } ?>">
                        <span class="iconify" data-icon="fluent:box-edit-24-regular" data-width="24" data-height="24"></span>&nbsp; จัดการครุภัณฑ์
                    </div>
                    <div class="col-1 text-end" style="color: #EE3F4C;"><i class='bi bi-chevron-right'></i></div>
                </div>
            </a>
            <a href="<?php echo base_url() . "/circulation/show_circulation" ?>" class="text-decoration-none fs-5">
            <div class="row p-0">
                <div class="col-10 px-1" style="<?php if(session()->getFlashdata('main') == "ยืม-คืนครุภัณฑ์") { echo 'color: #00178D;'; } else { echo 'color: black;'; } ?>"><span class="iconify" data-icon="fluent:box-checkmark-24-regular" data-width="24" data-height="24"></span>&nbsp; ยืม-คืนครุภัณฑ์</div>
                <div class="col-1 text-end" style="color: #EE3F4C;"><i class='bi bi-chevron-right'></i></div>
            </div>
            </a>
            <a href="<?php echo base_url() . "/audit/show_audit" ?>" class="text-decoration-none fs-5">
            <div class="row my-3">
                <div class="col-10 px-1" style="<?php if(session()->getFlashdata('main') == "ค่าเสื่อมราคา") { echo 'color: #00178D;'; } else { echo 'color: black;'; } ?>"><span class="iconify" data-icon="ant-design:audit-outlined" data-width="24" data-height="24"></span>&nbsp; ค่าเสื่อมราคา</div>
                <div class="col-1 text-end" style="color: #EE3F4C;"><i class='bi bi-chevron-right'></i></div>
            </div>
            </a>
        </div> -->
<div id="sidenav" class="sidenav bg-white">
    <div class="row first px-2">
        <div class="col-10 px-0"><a href="<?php echo base_url() ?>"><span class="iconify" data-icon="fluent:box-edit-24-regular" data-width="24" data-height="24"></span>&nbsp; จัดการครุภัณฑ์</a></div>
        <div class="col-2 text-end py-2" style="color: #EE3F4C; font-size:18px;"><i class='bi bi-chevron-right'></i></div>
    </div>
    <div class="row px-2">
        <div class="col-10 px-0"><a href="<?php echo base_url() . "/circulation/show_circulation" ?>"><span class="iconify" data-icon="fluent:box-checkmark-24-regular" data-width="24" data-height="24"></span>&nbsp; ยืม-คืนครุภัณฑ์</a></div>
        <div class="col-2 text-end py-2" style="color: #EE3F4C; font-size:18px;"><i class='bi bi-chevron-right'></i></div>
    </div>
    <div class="row px-2">
        <div class="col-10 px-0"><a href="<?php echo base_url() . "/audit/show_balance" ?>"><span class="iconify" data-icon="ant-design:audit-outlined" data-width="24" data-height="24"></span>&nbsp; รายงานค่าเสื่อมราคา</a></div>
        <div class="col-2 text-end py-2" style="color: #EE3F4C; font-size:18px;"><i class='bi bi-chevron-right'></i></div>
    </div>
    <div class="row small px-2">
        <div class="col-10 px-0"><a href="<?php echo base_url() . "/admin/show_profile" ?>"><span class="iconify" data-icon="bx:user" data-width="24" data-height="24"></span>&nbsp; ข้อมูลผู้ใช้</a></div>
        <div class="col-2 text-end py-2" style="color: #EE3F4C; font-size:18px;"><i class='bi bi-chevron-right'></i></div>
    </div>
    <div class="row small px-2">
        <div class="col-10 px-0"><a href="<?php echo base_url() . "/admin/logout" ?>"><span class="iconify" data-icon="ri:logout-box-line" data-width="24" data-height="24"></span>&nbsp; ออกจากระบบ</a></div>
    </div>
</div>