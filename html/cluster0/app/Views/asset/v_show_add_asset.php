<div id="main" class="container" style="margin-top: 80px;">
            <div class="row flex-grow-1">
                <div class="row px-3">
                    <div class="col px-5" >
                        <a href="<?php echo base_url() ?>" class="text-decoration-none"  style="color:black;">หน้าหลัก</a> > 
                        <a href="<?php echo base_url() . "/asset/show_dashboard" ?>" class="text-decoration-none"  style="color:black;">จัดการครุภัณฑ์</a> > 
                        <a href="#" class="text-decoration-none"  style="color:black;">เพิ่มครุภัณฑ์</a>
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
                                        <h1 class="px-2 fw-bold"> เพิ่มครุภัณฑ์</h1>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
        <!-- code here -->
        <form action="<?php echo base_url() . "/asset/add_asset" ?>" method="POST">
        <div class="row justify-content-md-center">
            <div class="col-md-6 col-sm-12">
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        ชื่อครุภัณฑ์
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        วันที่ทำการลงทะเบียน
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control" name="day">
                            <input type="text" class="form-control" name="month">
                            <input type="text" class="form-control" name="year">
                        </div>
                    </div>
                </div>
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        อายุการใช้งาน
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <input type="text" class="form-control" name="life" required>
                    </div>
                </div>
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        มูลค่าซื้อมา
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <input type="text" class="form-control" name="price" required>
                    </div>
                </div>
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        มูลค่าซาก
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <input type="text" class="form-control" name="scrap" required>
                    </div>
                </div>
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        คำอธิบายเพิ่มเติม
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <textarea class="form-control" name="detail" align="right" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        ประเภทครุภัณฑ์
                    </div>
                    <div class="col-md-7 col-sm-12">
                    <select class="form-select" id="type" onchange="change_category();">
                                    <option value="" disabled selected>เลือกประเภทครุภัณฑ์</option>
                                    <?php for($i=0; $i<count($arr_type); $i++) { ?>
                                        <option value="<?php echo $arr_type[$i]->typ_id ?>"><?php echo $arr_type[$i]->typ_name ?></option>
                                    <?php } ?>
                                </select>
                    </div>
                </div>
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12"  align="right">
                        หมวดหมู่ครุภัณฑ์
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <select class="form-select" name="category" id="category" required>
                            <option value="" selected>กรุณาเลือกประเภทครุภัณฑ์ก่อน</option>
                        </select>

                            <div class="container" style="display: none;">
                                    <?php for($i=0; $i<count($arr_type); $i++) { ?>
                                    <select class="form-select" id="<?php echo $arr_type[$i]->typ_id ?>">
                                        <?php for($j=0; $j<count($arr_cat[$i]); $j++) { ?>
                                            <option value="<?php echo $arr_cat[$i][$j]->cat_id ?>"><?php echo $arr_cat[$i][$j]->cat_name ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php } ?>
                                </div>
                    </div>
                </div>
                <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        สูตรการคำนวณค่าเสื่อมราคา
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <select class="form-select" name="formula" required>
                            <option disabled selected value>กรุณาเลือกสูตร</option>
                                <option value="1">สูตรเส้นตรง</option>
                                <option value="2">สูตรลดยอด</option>
                        </select>
                    </div>
                </div>
                <div class="cancel" style="display: none;">
                                        <input type="checkbox" id="cancel" name="arr_img_cancel[]" value="/" checked>
                                    </div>

                <!-- <div class="row pt-4 justify-content-md-center">
                    <div class="col-md-4 col-sm-12" align="right">
                        เพิ่มรูปภาพครุภัณฑ์
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="card text-left">
                            <div class="card-header text-end">
                                <button type="button" class="btn btn-primary" onclick="ClickAddFile()">เลือกรูปภาพ</button>
                                <input style="display: none;" accept="image/png, image/jpeg" type="file" class="form-control" name="image[]" multiple id="upload-img" />
                            </div>

                        </div>
                        <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
                    </div>
                </div> -->
                <input type="submit" id="submit" style="display: none;">
            </div>
            
            <div class="row" style="margin: 30px;">
                    <div class="col text-end">
                        <button type="button" style="background-color: #1F1592; border:none; color: white;" class="btn  btn-lg px-5 mx-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">เพิ่ม</button>
                        <button type="button" style="background-color: #E3E3E3; border:none; color:#898989;" class="btn btn-lg px-4" data-bs-toggle="modal" data-bs-target="#cancel_return">ยกเลิก</button>
                    </div>
                </div>
        </div>
        </form>
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
                            <div class="col fw-bold px-4 fs-5" style="color:#414141;">คุณต้องการเพิ่มครุภัณฑ์ใช่หรือไม่</div>
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
                            <div class="col fw-bold px-4 fs-5" style="color:#414141;">คุณไม่ต้องการเพิ่มครุภัณฑ์ใช่หรือไม่</div>
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

        <div class="modal fade" id="alert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" style="top: 10%;">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body text-center">
                        <?php if (session()->getFlashdata('msg_success')) { ?>
                            <i class="bi bi-check-circle-fill" style="font-size: 200px; color: green;"></i>
                            <h3 style="color: #414141;">เลขทะเบียน: <?php echo session()->getFlashdata('code') ?></h3>
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

    function change_category() {
        let id = document.getElementById("type").value;
        document.getElementById("category").innerHTML = document.getElementById(id).innerHTML;
    }
</script>

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
</body>
</html>
