<!-- ส่วนของแถบด้านบน -->

<!-- <body>
    <div class="container-fluid"> -->
        <!-- <div class="row shadow topbar fixed-top"> 
            <div class="col-md-2 col-sm-1 px-4"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() . "/picture/topbarlogo.png" ?>" width="200px"></a></div>
            <div class="col-md-10 col-sm-10 text-end py-3 px-5">
                <div class="btn-group">
                    <button type="button" class="btn btn-white p-0" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo session()->get('emp_code') ?><span class="iconify mx-2" data-icon="carbon:user-avatar-filled" data-width="32" data-height="32"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end py-2">
                        <li><a class="dropdown-item" href="#">ข้อมูลผู้ใช้</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo base_url() .'/admin/logout' ?>">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-0 shadow">
        <div class="container-fluid py-1">
            <a href="#" class="navbar-brand py-0"><img src="<?php echo base_url() . "/picture/topbarlogo.png" ?>" width="180px"></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                </div>
                <div class="navbar-nav ms-auto">

                    <button type="button" class="btn btn-white p-0" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo session()->get('emp_code') ?><span class="iconify mx-2" data-icon="carbon:user-avatar-filled" data-width="32" data-height="32"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="right: 10px; top:50px">
                        <li><a class="dropdown-item" href="#">ข้อมูลผู้ใช้</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo base_url() .'/admin/logout' ?>">ออกจากระบบ</a></li>
                    </ul>

                </div>
            </div>
            
        </div>
    </nav>    -->

    <!-- <nav class="container-fluid navbar navbar-expand-md navbar-light bg-white py-1 shadow-sm fixed-top">
        <div class="container-fluid px-1">
            <a href="#" class="navbar-brand py-0"><img src="<?php echo base_url() . "/picture/topbarlogo.png" ?>" width="180px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <div class="navbar-nav ms-auto">
                    <button type="button" class="btn btn-white p-0" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo session()->get('emp_code') ?><span class="iconify mx-2" data-icon="carbon:user-avatar-filled" data-width="32" data-height="32"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="right: 10px; top:50px">
                        <li><a class="dropdown-item" href="#">ข้อมูลผู้ใช้</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo base_url() .'/admin/logout' ?>">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
           
        </div>

        <div class="collapse " id="navbarToggleExternalContent">
            <div class="bg-white px-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-size: 18px; color: black;">จัดการครุภัณฑ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-size: 18px; color: black;">ยืมคืนครุภัณฑ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-size: 18px; color: black;">ค่าเสื่อมราคา</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-nav ms-auto">

                <button type="button" class="btn btn-white p-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo session()->get('emp_code') ?><span class="iconify mx-2" data-icon="carbon:user-avatar-filled" data-width="32" data-height="32"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="right: 10px; top:50px">
                    <li><a class="dropdown-item" href="#">ข้อมูลผู้ใช้</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo base_url() .'/admin/logout' ?>">ออกจากระบบ</a></li>
                </ul>

            </div>
        </div>

    </nav> -->
<body>
    <nav class="container-fluid navbar py-0 navbar-expand-md navbar-light bg-white mb-4 shadow-sm fixed-top">
    <div class="container-fluid py-0">
        <a class="navbar-brand mx-2" id="menu" onclick="openNav()" style="cursor: pointer;"><i class="bi bi-list" style="font-size: 25px;"></i></a>
        <a class="nav-link p-0" href="#" ><img src="<?php echo base_url() . "/picture/topbarlogo.png" ?>" width="180px"></a>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <div class="navbar-nav ms-auto">
                <button type="button" class="btn btn-white p-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo session()->get('emp_code') ?><span class="iconify mx-2" data-icon="carbon:user-avatar-filled" data-width="32" data-height="32"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="right: 10px; top:50px">
                    <li><a class="dropdown-item" href="<?php echo base_url() .'/admin/show_profile' ?>">ข้อมูลผู้ใช้</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo base_url() .'/admin/logout' ?>">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
