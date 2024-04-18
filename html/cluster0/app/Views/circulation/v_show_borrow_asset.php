        <!-- <div class="row flex-grow-1">
            <div class="col-2 col-md-2 col-sm-6"></div>
            <div class="col-6 col-md-10 col-sm-5 px-4 " style="margin-top: 90px;">
                <h1>เนื้อหา</h1>

            </div>
        </div>
    </div>
</body>
</html> -->


        <!-- <nav id="topnav" class="navbar fixed-top navbar-light bg-light px-1 shadow-sm">
  <div class="container-fluid px-4">
    <a class="navbar-brand" id="menu" onclick="openNav()" style="cursor: pointer;"><i class="bi bi-list" style="font-size: 25px;"></i></a>
    <a class="navbar-brand" href="#">Fixed top</a>
  </div>
</nav> -->




<div id="main" class="container" style="margin-top: 80px;">
            <div class="row flex-grow-1">
                <div class="col">
                    <div class="row px-3">
                        <div class="col px-5">
                            <a href="<?php echo base_url() ?>" class="text-decoration-none" style="color:black;">หน้าหลัก</a> >
                            <a href="<?php echo base_url() . "/circulation/show_circulation" ?>" class="text-decoration-none" style="color:black;">ยืม-คืนครุภัณฑ์</a> >
                            <a href="#" class="text-decoration-none" style="color:black;">ยืมครุภัณฑ์</a>
                        </div>
                    </div>

                    <div class="row px-3 py-2">
                        <div class="col px-5">
                            <table>
                                <tr>
                                    <td>
                                        <div style="width: 8px; height: 55px; background: #EE3F4C; border-radius:5px;"></div>
                                    </td>
                                    <td>
                                        <h1 class="px-2 fw-bold"> ยืมครุภัณฑ์</h1>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                        <form action="<?php echo base_url() . "/circulation/show_borrow_asset" ?>" method="GET">
                            <div class="row my-3">
                                <div class="col-4 text-end my-2">เลขทะเบียน</div>
                               
                                <div class="col">
                                    <div class="input-group">
                                        
                                        <input type="text" class="form-control" name="code" required value="<?php if(session()->getFlashdata('code')){ echo session()->getFlashdata('code');} ?>" >
                                        <span class="input-group-text">
                                            <button type="submit" class="btn p-0">
                                                <span class="iconify" data-icon="majesticons:reload-circle-line" data-width="24" data-height="24"></span>
                                            </button>
                                        
                                        </span>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php if (isset($obj_ast)) { ?>
                       
                        <div class="row px-2">
                            <div class="col-md-6 col-sm-12">
                            <form action="<?php echo base_url() . "/circulation/insert_circulation" ?>" method="POST">
                            <div class="row my-3">
                                    <div class="col-4 text-end">
                                        รหัสพนักงาน
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="emp_code" required>
                                        <input type="hidden" value="<?php echo $obj_ast->ast_id ?>" name="ast_id">
                                        <input type="submit" id="submit" style="display: none;">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-4 text-end">
                                        วันที่ทำการยืม
                                        <?php
                                            $now = date("d-m-Y");
                                            $year_now = substr($now, 6, 4);
                                            $year_now = $year_now + 543;
                                            $day_now = substr($now, 0, 2);
                                            $month_now = substr($now, 3, 2);
                                        ?>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" id="day" class="form-control" name="day" placeholder="<?php echo $day_now ?>" required>
                                            <input type="text" id="month" class="form-control" name="month" placeholder="<?php echo $month_now ?>" required>
                                            <input type="text" id="date" class="form-control" name="year" placeholder="<?php echo $year_now ?>" required>
                                        </div>
            
                                    </div>
                                </div>
                                </form>
                                <div class="row my-3">
                                    <div class="col-4 text-end">
                                        ชื่อครุภัณฑ์
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo $obj_ast->ast_name ?>" disabled>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-4 text-end">
                                        ประเภทครุภัณฑ์
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo $obj_ast->typ_name ?>" disabled>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-4 text-end ">
                                        หมวดหมู่ครุภัณฑ์
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo $obj_ast->cat_name ?>" disabled>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-4 text-end">
                                        คำอธิบายเพิ่มเติม
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <textarea class="form-control p-2" style="height: 60px; color: grey;" disabled><?php echo $obj_ast->ast_detail ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        <?php if(count($arr_img) > 0) { ?>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-7">
                                        <div id="carouselExampleControls" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                                            <div class="carousel-inner">
                                                <?php for ($i = 0; $i < count($arr_img); $i++) {
                                                    if ($i == 0) {
                                                ?>
                                                        <div class="carousel-item active">
                                                            <img src="<?php echo base_url() . "/picture" . "/" . $arr_img[$i]->img_name ?>" class="d-block" style="width: 100%;" alt="...">
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo base_url() . "/picture" . "/" . $arr_img[$i]->img_name ?>" class="d-block" style="width: 100%;" alt="...">
                                                        </div>
                                                <?php }
                                                } ?>
                                            </div>
                                            <button class="carousel-control-prev bg-white" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span aria-hidden="true">
                                                    <div class="col text-end fs-1" style="color: black;"><i class='bi bi-chevron-left'></i></div>
                                                </span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next bg-white" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span aria-hidden="true">
                                                    <div class="col text-end fs-1" style="color: black;"><i class='bi bi-chevron-right'></i></div>
                                                </span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>                            
                        <?php } ?>
                        </div>
                        
                        <div class="row" style="margin: 30px;">
                            <div class="col text-end">
                                <button type="button" style="background-color: #1F1592; border:none; color: white;" class="btn  btn-lg px-4 mx-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">ยืมครุภัณฑ์</button>
                                <button type="button" style="background-color: #E3E3E3; border:none; color:#898989;" class="btn btn-lg px-4" data-bs-toggle="modal" data-bs-target="#cancel_return">ยกเลิก</button>
                            </div>
                        </div>
                </div>
            <?php } else { ?>
                <div class="row my-5">
                    <div class="col text-center">
                        <h3><?php echo session()->getFlashdata('msg'); ?></h3>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" style="top: 20%">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col fw-bold px-4 fs-5" style="color:#414141;">คุณต้องการยืมครุภัณฑ์ใช่หรือไม่</div>
                        </div>
                        <div class="row">
                            <div class="col text-end">
                                <button type="button" class="btn px-4" onclick="document.getElementById('submit').click()" style="background-color: #34B956; border:none; color: white;">ยืนยัน</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="cancel_return" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" style="top: 20%">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col fw-bold px-4 fs-5" style="color:#414141;">คุณต้องการยกเลิกคืนครุภัณฑ์ใช่หรือไม่</div>
                        </div>
                        <div class="row">
                            <div class="col text-end">
                                <a style="display: none;" id="back" href="<?php echo base_url() . "/circulation/show_circulation" ?>"></a>
                                <button type="button" class="btn px-4" onclick="document.getElementById('back').click()" style="background-color: #EE3F4C; border:none; color: white;">ยืนยัน</button>
                            </div>

                        </div>
                    </div>
                </div>
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


        <style>
            .img-thumbs {
                background: #eee;
                border: 1px solid #ccc;
                border-radius: 0.25rem;
                margin: 0;
                padding: 0.75rem;
                height: 200px;
                overflow-x: auto;
            }

            .img-thumbs-hidden {
                display: none;
            }

            .wrapper-thumb {
                position: relative;
                display: inline-block;
                margin: 1rem 0;
                justify-content: space-around;
            }

            .img-preview-thumb {
                background: #fff;
                border: 1px solid none;
                border-radius: 0.25rem;
                box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
                margin-right: 1rem;
                max-width: 140px;
                padding: 0.25rem;
            }

            .remove-btn {
                position: absolute;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: .7rem;
                top: -5px;
                right: 10px;
                width: 20px;
                height: 20px;
                background: #EE3F4C;
                border-radius: 10px;
                font-weight: bold;
                cursor: pointer;
                color: white;
            }

            .remove-btn:hover {
                box-shadow: 0px 0px 3px grey;
                transition: all .3s ease-in-out;
            }
        </style>


        <?php if (session()->getFlashdata('msg_fail') || session()->getFlashdata('msg_success')) { ?>
            <script>
                var myModal = new bootstrap.Modal(document.getElementById("alert"), {});
                document.onreadystatechange = function() {
                    myModal.show();
                };
            </script>
        <?php } ?>

        <script>
            function openNav() {

                document.getElementById("sidenav").style.width = "260px";
                document.getElementById("sidenav").classList.add("shadow");
                document.getElementById("menu").setAttribute("onClick", "closeNav();");
            }

            function closeNav() {

                document.getElementById("sidenav").style.width = "0";
                document.getElementById("sidenav").classList.remove("shadow");
                document.getElementById("menu").setAttribute("onClick", "openNav();");
            }
        </script>

        </body>

        </html>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
            const ClickAddFile = () => {
                $('#upload-img').click();
            }


            var imgUpload = document.getElementById('upload-img'),
                imgPreview = document.getElementById('img-preview'),
                imgUploadForm = document.getElementById('form-upload'),
                totalFiles, previewTitle, previewTitleText, img;

            imgUpload.addEventListener('change', previewImgs, true);

            function img_del(name) {
                $(".cancel").append('<input type="checkbox" id="cancel_' + name + '" name="arr_img_cancel[]" value="' + name + '" checked>');
                //$(this).parent('.wrapper-thumb').remove();
            }

            function previewImgs(event) {
                totalFiles = imgUpload.files.length;

                if (!!totalFiles) {
                    imgPreview.classList.remove('img-thumbs-hidden');
                }

                let check = -1;
                let count = 0;
                for (var i = 0; i < totalFiles; i++) {
                    wrapper = document.createElement('div');
                    wrapper.classList.add('wrapper-thumb');
                    removeBtn = document.createElement("span");

                    //nodeRemove = document.createTextNode('x');
                    nodeRemove = document.createTextNode('x');
                    //id = document.setAttribute('name', event.target.files[i].name);
                    removeBtn.classList.add('remove-btn');
                    // removeBtn.addEventListener('click', function(){
                    //     img_del(name);
                    // });
                    removeBtn.appendChild(nodeRemove);
                    img = document.createElement('img');
                    img.src = URL.createObjectURL(event.target.files[i]);
                    // name = event.target.files[i].name;
                    img.classList.add('img-preview-thumb');
                    wrapper.id = event.target.files[i].name;
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    imgPreview.appendChild(wrapper);
                    // img_del(name);
                    // if(check != -1) {
                    //     check = -1;
                    //     break;

                    // }
                    
                    
                    
                    

                    // $('.remove-btn').click(img_del(name));

                }

                    $('.remove-btn').click(function() {

                        let targer = $(this).parent('.wrapper-thumb').attr('id');



                        //console.log(targer);
                        // let name = ''
                        // for (let i = 0; i < imgUpload.files.length; i++) {
                        //     if (event.target.files[i].name === targer) {
                        //         name = event.target.files[i].name
                        //     }
                        // }

                        console.log(targer);

                        $(".cancel").append('<input type="checkbox" name="arr_img_cancel[]" value="' + targer + '" checked>');

                        $(this).parent('.wrapper-thumb').remove();

                    });

            }

        </script>