<?php /* 
    หน้าจอเข้าสู่ระบบ

*/?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() . "/assets/main.css" ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <title>เข้าสู่ระบบ</title>
    <style>
        .arrow_up {
            width: 0px; 
            height: 0px; 
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 20px solid #f6f4ee;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">
            <div class="col-md "></div>
            <div class="col-md-4 px-4 text-center">
                <img src="<?php echo base_url() . "/picture/clicknext.png" ?>" class="img-fluid">
            </div>
            <div class="col-md "></div>
        </div>        
        <div class="row my-2">
            <div class="col-md col-sm"></div>
            <div class="col-md-4 col-sm-10">          
                <form action="<?php echo base_url() . "/admin/check_login" ?>" method="POST">
                    <p style="color: red;" class="text-center">
                        <?php if(session()->getFlashdata('msg')){ echo session()->getFlashdata('msg'); } ?>
                    </p>
                    <div class="input-group mb-3 input-group-lg border border-1" style="border-color: #D0D0D0; border-radius: 8px;">
                        <span class="input-group-text bg-white" id="inputGroup-sizing-default" style="border-color: #D0D0D0; border: none;">
                            <span class="iconify" data-icon="ep:user" data-width="20" data-height="20"></span>
                        </span>
                        <input type="email" placeholder="อีเมล" name="email" class="form-control" style="font-size: 18px; border: none; border-radius: 0px 8px 8px 0px;" required>
                    </div>
                    <div class="input-group mb-3 input-group-lg border border-1" style="border-radius: 8px;">
                        <span class="input-group-text bg-white" id="inputGroup-sizing-default" style="border: none; border-radius: 8px 0px 0px 8px;" >
                            <span class="iconify" data-icon="codicon:lock" data-width="20" data-height="20"></span>
                        </span>
                        <input type="password" placeholder="รหัสผ่าน" name="password" id="password" class="form-control" style="font-size: 18px; border: none; border-radius: 0px 8px 8px 0px;" required>
                        <span class="input-group-text bg-white" onclick="show_password()" style="border: none; cursor: pointer; " ><i id="eye_icon" class="bi bi-eye-slash "></i></span>
                    </div>
                    <div class="d-grid gap-2" style="margin-top: 20px;">
                        <button class="btn btn-lg" type="submit" style="background-color: #001FC5; color: white; border-radius: 8px;">ลงชื่อเข้าใช้</button>
                    </div>
                </form>
                
            </div>  
            <div class="col-md col-sm"></div>
        </div>
    </div>
  
    
</body>
</html>

<script>
    function show_password() {
        let pass = document.getElementById("password");
        let eye = document.getElementById("eye_icon");
        if (pass.type === "password") {
            pass.type = "text";
            eye.setAttribute("class", "bi bi-eye");
        } else {
            pass.type = "password";
            eye.setAttribute("class", "bi bi-eye-slash");
        }
    }
</script>