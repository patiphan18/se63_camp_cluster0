<!-- แบงค์ทำทั้งหมด -->
<style>
    .button {
        width: 183px;
        height: 56px;
        font-family: 'FC Minimal';
        font-size: 30px;
        font-weight: bold;
        
    }

    .buttonreset {
        width: 183px;
        height: 56px;
        font-family: 'FC Minimal';
        font-size: 30px;
        font-weight: bold;
        background-color: #EE3F4C;
        border-radius: 8px;
        color : white;
        border: none;
    }

    .buttonsupmit {
        width: 183px;
        height: 56px;
        font-family: 'FC Minimal';
        font-size: 30px;
        font-weight: bold;
        background-color: #34B956;
        border-radius: 8px;
        color : white;
        border: none;
    }

    .fontmodal {
        font-family: 'FC Minimal';
        font-size: 48px;
        font-weight: bold;
    }
</style>

<div id="main" class="container" style="margin-top: 80px;">
<div class="row flex-grow-1">
    <div class="col-12 col-md-12 col-sm-12 px-4 " >
        <div class="row px-3">
            <div class="col px-5">
                <a href="<?php echo base_url() ?>" class="text-decoration-none" style="color:black;">หน้าหลัก </a> >
                <a href="<?php echo base_url() . "/circulation/show_circulation" ?>" class="text-decoration-none" style="color:black;">จัดการครุภัณฑ์</a> >
                <a href="#" class="text-decoration-none" style="color:black;">แก้ไขครุภัณฑ์</a>
            </div>
        </div>
        <div class="col px-5">
            <table>
                <tr>
                    <td>
                        <div style="width: 8px; height: 55px; background: #EE3F4C; border-radius:5px;"></div>
                    </td>
                    <td>
                        <h1 class="px-2 fw-bold"> แก้ไขครุภัณฑ์</h1>
                    </td>
                </tr>
            </table>
            <form action="<?php echo base_url() . '/Asset/edit_asset' ?>" method="POST">
                <div class="row px-7">
                    <div class="col-5">
                        <div class="row my-3">
                            <div class="col-5 text-end my-2">
                                เลขทะเบียนครุภัณฑ์
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ast_id" value="<?php echo $opt_asset->ast_id ?>" hidden>
                                <input type="text" class="form-control" placeholder="<?php echo $opt_asset->ast_code ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 text-end my-2">
                                ชื่อครุภัณฑ์
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ast_name" value="<?php echo $opt_asset->ast_name ?>">
                            </div>
                        </div>
                        <div class="row  my-3">
                            <div class="col-5 text-end my-2">
                                วัน/เดือน/ปี ที่ลงทะเบียน
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ast_begin" value="<?php echo $opt_asset->ast_begin ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-5 text-end my-2">
                                วัน/เดือน/ปี ที่เลิกใช้งาน
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ast_end" value="<?php echo $opt_asset->ast_end ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-5 text-end my-2">
                                อายุการใช้งาน
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ast_lifespan" value="<?php echo $opt_asset->ast_lifespan ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-5 text-end my-2">
                                มูลค่าซื้อมา
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ast_price" value="<?php echo $opt_asset->ast_price ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-5 text-end my-2">
                                มูลค่าซาก
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ast_scrap" value="<?php echo $opt_asset->ast_scrap ?>">
                            </div>
                        </div>
                        <div class="row  my-3">
                            <div class="col-5 text-end my-2">
                                คำอธิบายเพิ่มเติม
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <textarea class="form-control p-2" style="height: 60px; color: grey;" name="ast_detail"><?php echo $opt_asset->ast_detail ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-5 text-end my-2">
                                ประเภทครุภัณฑ์
                            </div>
                            <div class="col">
                                <select class="form-select" name="student_cluster_id" required>
                                    <?php
                                    for ($i = 0; $i < count($opt_type); $i++) { ?>
                                        <?php if ($opt_type[$i]->typ_id == $opt_asset->cat_typ_id) { ?>
                                            <option value="<?php echo $opt_type[$i]->typ_id ?>" selected><?php echo $opt_type[$i]->typ_name ?></option>
                                        <?php }
                                        if ($opt_type[$i]->typ_id != $opt_asset->cat_typ_id) { ?>
                                            <option value="<?php echo $opt_type[$i]->typ_id ?>"><?php echo $opt_type[$i]->typ_name ?> </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-5 text-end my-2">
                                หมวดหมู่ครุภัณฑ์
                            </div>
                            <div class="col">
                                <select class="form-select" name="ast_cat_id" required>
                                    <?php
                                    for ($i = 0; $i < count($opt_category); $i++) { ?>
                                        <?php if ($opt_category[$i]->cat_id == $opt_asset->ast_cat_id) { ?>
                                            <option value="<?php echo $opt_category[$i]->cat_id ?>" selected><?php echo $opt_category[$i]->cat_name ?></option>
                                        <?php }
                                        if ($opt_category[$i]->cat_id != $opt_asset->ast_cat_id) { ?>
                                            <option value="<?php echo $opt_category[$i]->cat_id ?>"><?php echo $opt_category[$i]->cat_name ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row  my-3">
                            <div class="col-5 text-end my-2">
                                สูตรคำนวนค่าเสื่อมราคา 
                            </div>
                            <div class="col">
                                <select class="form-select" name="ast_for_id" required>
                                    <?php
                                    for ($i = 0; $i < count($opt_formula); $i++) { ?>
                                        <?php if ($opt_formula[$i]->for_id == $opt_asset->ast_for_id) { ?>
                                            <option value="<?php echo $opt_formula[$i]->for_id ?>" selected><?php echo $opt_formula[$i]->for_name ?></option>
                                        <?php }
                                        if ($opt_formula[$i]->for_id != $opt_asset->ast_for_id) { ?>
                                            <option value="<?php echo $opt_formula[$i]->for_id ?>"><?php echo $opt_formula[$i]->for_name ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col text-end">
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: #FFD771; border:none; color: white;" class="btn  btn-lg px-4 mx-2 button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">แก้ไข</a>
                            <a data-bs-toggle="modal" data-bs-target="#reset" style="background-color: #E3E3E3; border:none; color:#898989;" class="btn btn-lg px-4 button" data-bs-toggle="modal" data-bs-target="#cancel_return">ยกเลิก</a>
                        </div>
                    </div>
                </div>
                <button type="submit" id="submit_edit_asset" style="display: none;">บันทึก</button>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" style="top: 180px" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h5 class="modal-title" id="staticBackdropLabel">กรุณายืนยันการแก้ไขอีกครั้ง</h5><br>

                <div class="text-end">
                    <br><button data-bs-toggle="modal" data-bs-target="#supmid" type="submit" class="buttonsupmit" onclick="document.getElementById('submit_edit_asset').click()">ยืนยัน</button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="supmid" style="top: 180px" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <!-- <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h5 class="modal-title" id="staticBackdropLabel">กรุณายืนยันการแก้ไข้อีกครั้ง</h5><br> -->

                <div class="text-center">
                    <span class="iconify" data-icon="akar-icons:circle-check-fill" style="color: #34b956;" data-width="235" data-height="233"></span>
                </div>
                <div class="text-center fontmodal">
                    บันทึกสำเร็จ
                </div>

            </div>

        </div>
    </div>
</div>

<div data-delay="{ show: 100, hide: 100}" class="modal fade" id="reset" style="top: 180px" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
            <div class="modal-body">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h5 class="modal-title" id="staticBackdropLabel">คุณไม่ต้องการแก้ไขครุภัณฑ์ไช่หรือไม่</h5><br>

                <div class="text-end">
                    
                    <a href="<?php echo base_url() . '/asset/show_dashboard/'?>" ><button type="button" class="button button4 buttonreset">ยืนยัน</button></a>
                </div>
                <!-- </div>
          <div class="modal-footer"> -->

            </div>
        </div>
    </div>
</div>
</body>

<script>
    setTimeout(() => {
        const supmid = document.getElementById('supmid');
        supmid.style.display = 'none';
    }, 1000); 
</script>

</html>

