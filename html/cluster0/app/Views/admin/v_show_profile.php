<div id="main" class="container-fluid" style="margin-top: 80px;">

<div class="row px-5">
<div class="col px-5">
        <table>
            <tr>
                <td>
                    <div style="width: 8px; height: 55px; background: #EE3F4C; border-radius:5px;"></div>
                    </td>
                <td>
                    <h1 class="px-2 fw-bold"> ข้อมูลผู้ใช้</h1>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="row my-5">
    <div class="col">
        <div class="row">
            <div class="col-md-4 col-sm-12 text-end"><img style="border-radius: 8px;" src="https://th.jobsdb.com/en-th/cms/employer/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" width="200px" alt=""></div>
            <div class="col-md-4 col-sm-12">
                <form action="<?php echo base_url() . "/admin/edit_full_name" ?>" method="POST">
                    <div class="row my-2">
                        <div class="col-md-2 text-end">ชื่อ</div>
                        <div class="col">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?php echo $obj_emp->emp_full_name ?>" name="full_name" required>
                                <span class="input-group-text p-0">
                                    <button class="py-0" type="submit" style="background-color: #61C47C; border:none;"><i class="bi bi-check-lg fs-4" style="color: white;"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row my-3">
                    <div class="col-md-2 text-end">อีเมล</div>
                    <div class="col">
                    <input type="text" class="form-control" placeholder="<?php echo $obj_emp->emp_email ?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-end">รหัสผ่าน</div>
                    <div class="col">
                        <div class="d-grid gap-2">
                            <button class="btn" type="button" style="background-color: #FF7A00; color:white;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <div class="row">
                                    <div class="col-md-4 text-start"><i class="bi bi-pencil-square"></i></div>
                                    <div class="col text-center">เปลี่ยนรหัสผ่าน</div>
                                    <div class="col"></div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
  
</div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="top:100px">
    <form action="<?php echo base_url() . "/admin/edit_password" ?>" method="POST">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-5">
            <h1 class="text-center">เปลี่ยนรหัสผ่าน</h1>
            <div class="row my-3">
                <div class="col">
                    <div class="input-group">
                        <input type="password" placeholder="รหัสผ่านเดิม" name="cur_pass" id="cur_pass" class="form-control" required>
                        <span class="input-group-text bg-white" onclick="show_cur_pass()" style="cursor: pointer; " ><i id="cur_eye" class="bi bi-eye-slash "></i></span>
                    </div>
                </div>
            </div>
            <div class="row  my-3">
                <div class="col">
                <div class="col">
                    <div class="input-group">
                        <input type="password" placeholder="รหัสผ่านใหม่" name="new_pass" id="new_pass" class="form-control" required>
                        <span class="input-group-text bg-white" onclick="show_new_pass()" style="cursor: pointer;" ><i id="new_eye" class="bi bi-eye-slash "></i></span>
                    </div>
                </div>
                </div>
            </div>
            <div class="row  my-3">
                <div class="col">
                    <div class="input-group">
                        <input type="password" placeholder="ยืนยันรหัสผ่านอีกครั้ง" name="confirm_pass" id="con_pass" class="form-control" required>
                        <span class="input-group-text bg-white" onclick="show_con_pass()" style="cursor: pointer; " ><i id="con_eye" class="bi bi-eye-slash "></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
                <button type="submit" class="btn px-5" style="background-color: #34B956; color:white;">ยืนยัน</button>
        </div>
        </div>
    </form>
    </div>
</div>

<div class="modal fade" id="alert" tabindex="-1" aria-labelledby="alert">
            <div class="modal-dialog" style="top: 10%;">
                <div class="modal-content">

                    <div class="modal-body text-center">
                        <?php if (session()->getFlashdata('msg_success')) { ?>
                            <i class="bi bi-check-circle-fill" style="font-size: 200px; color: green;"></i>
                            <h3 style="color: #414141;"><?php echo session()->getFlashdata('msg_success') ?></h3>
                        <?php } else { ?>
                            <i class="bi bi-x-circle-fill" style="font-size: 200px; color: red;"></i>
                            <h3 style="color: #414141;"><?php echo session()->getFlashdata('msg_fail') ?></h3>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>


        <?php if (session()->getFlashdata('msg_fail') || session()->getFlashdata('msg_success')) { ?>
            <script>
                var myModal = new bootstrap.Modal(document.getElementById("alert"), {});
                document.onreadystatechange = function() {
                    myModal.show();
                };
            </script>
        <?php } ?>
</body>

<script>
    function show_cur_pass() {
        let pass = document.getElementById("cur_pass");
        let eye = document.getElementById("cur_eye");
        if (pass.type === "password") {
            pass.type = "text";
            eye.setAttribute("class", "bi bi-eye");
        } else {
            pass.type = "password";
            eye.setAttribute("class", "bi bi-eye-slash");
        }
    }

    function show_new_pass() {
        let pass = document.getElementById("new_pass");
        let eye = document.getElementById("new_eye");
        if (pass.type === "password") {
            pass.type = "text";
            eye.setAttribute("class", "bi bi-eye");
        } else {
            pass.type = "password";
            eye.setAttribute("class", "bi bi-eye-slash");
        }
    }

    function show_con_pass() {
        let pass = document.getElementById("con_pass");
        let eye = document.getElementById("con_eye");
        if (pass.type === "password") {
            pass.type = "text";
            eye.setAttribute("class", "bi bi-eye");
        } else {
            pass.type = "password";
            eye.setAttribute("class", "bi bi-eye-slash");
        }
    }
</script>