<div id="main" class="container-fluid px-5" style="margin-top: 80px;">
<div class="row flex-grow-1">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col" >
                        <a href="<?php echo base_url() ?>" class="text-decoration-none"  style="color:black;">หน้าหลัก</a> > 
                        <a href="<?php echo base_url() . "/asset/show_dashboard" ?>" class="text-decoration-none"  style="color:black;">ยืม-คืนครุภัณฑ์</a>
                    </div>
                </div>
                
                <div class="row py-2">      
                    <div class="col">
                        <table>
                        <tr>
                            <td><div style="width: 8px; height: 55px; background: #EE3F4C; border-radius:5px;"></div></td>
                            <td><h1 class="px-2 fw-bold"> จัดการครุภัณฑ์</h1></td>
                        </tr>
                        </table>
                    </div>
                </div>
            
            <div class="row">
                <div class="col">
                    <!-- เลือกประเภท -->
                    <label for="type">ประเภท</label>
                    <select name="type" id="type" onclick="myFunction(),sort()">
                        <option value="none" selected disabled hidden>เลือกประเภท</option>
                        <?php for($i = 0; $i < count($arr_type); $i++) { ?>
                            <option value="<?php echo $arr_type[$i]->typ_id ?>"> <?php echo $arr_type[$i]->typ_name ?> </option>
                        <?php } ?>
                    </select>
                     <!-- เลือกหมวดหมู่ -->
                    <label for="category">หมวดหมู่</label>
                        <select name="category" id="div_cat" onclick="sort()">
                        <option value="none" selected disabled hidden>เลือกหมวดหมู่</option>
                        </select>
                    <!-- เลือกสถานะ -->
                    <label for="category">สถานะ</label>
                        <select name="category" id="category" default>
                        <option value="none" selected disabled hidden>เลือกสถานะ</option>
                            <?php for($i = 0; $i < count($arr_status); $i++) { ?>
                                <option value="<?php echo $arr_status[$i]->sta_id?>"> <?php echo $arr_status[$i]->sta_name ?> </option>
                            <?php } ?>
                        </select>
                        
                </div>
                <div class="col text-end">
                <a href="<?php echo base_url() . "/asset/show_add_asset" ?>">
                    <button type="button" class="btn btn-outlinex-primary  bottomreborrow py-1"style="color: white" >เพิ่มครุภัณฑ์&emsp; <i class="bi bi-plus-circle " ></i></button>
                </a>
                </div>
                    
                         
                </div>
            <!-- แสดงตาราง-->
            <div class="row py-3">
                <div class="col-md-12" align="center" id="table_div">
                        <table class="data_table table" id="table" style="width:100%">
                            <thead class="h_table">
                                <tr>
                                    <th class="border border-white "><div  align="center" >เลขทะเบียน</div></th>
                                    <th class="border border-white "><div  align="center" >รายการครุภัณฑ์</div></th>
                                    <th class="border border-white "><div  align="center" >ประเภท</div></th>
                                    <th class="border border-white "><div  align="center" >หมวดหมู่</div></th>
                                    <th class="border border-white "><div  align="center" >ผู้ครอบครอง</div></th>
                                    <th class="border border-white "><div  align="center" >สถานะ</div></th>
                                    <th class="border border-white "><div  align="center" >การดำเนินการ</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i = count($arr_asset)-1; $i >= 0; $i--) { ?>
                                    <tr>
                                        <td class="border border-white "><div align="center"><?php echo $arr_asset[$i]->ast_code ?></div></td>
                                        <td class="border border-white "><div align="left"><?php echo $arr_asset[$i]->ast_name ?></div></td>
                                        <td class="border border-white "><div align="center"><?php echo $arr_asset[$i]->typ_name ?></div></td>
                                        <td class="border border-white "><div align="center"><?php echo $arr_asset[$i]->cat_name ?></div></td>

                                        <td class="border border-white "><div align="center"><?php echo $arr_emp[$i]?></div></td>
   
                                        <td class="border border-white "><div align="center"><?php echo $arr_asset[$i]->sta_name?></div></td>
                                        <td  style="border: none;"><div align="center">
                                        <a href="<?php echo base_url() . "/audit/show_audit?ast_code=" . $arr_asset[$i]->ast_code ?>" style="text-decoration:none;">
                                            <button type="button" class="btn btn-info py-1" ><span class="iconify" style="color: white;" data-icon="ant-design:audit-outlined"></span></button>
                                        </a>
                                        <a href="<?php echo base_url() . "/asset/show_edit_asset/" . $arr_asset[$i]->ast_id ?>" style="text-decoration:none;">
                                            <button type="submit" class="btn btn-warning py-1" ><i class="bi bi-pencil-square" style="color: white;"></i></button>
                                        </a>
                                        <button type="button" class="btn btn-danger py-1" onclick="add_value('<?php echo $arr_asset[$i]->ast_id ?>')" data-bs-toggle="modal" data-bs-target="#del" style="color: white"><i class="bi bi-trash"></i></button>
                                        </div></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table> 
                        <br>
                </div>                     
            </div>

            </div>
    
            <div class="modal fade" id="del" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" style="top: 20%">
                <div class="modal-content">
                    <form action="<?php echo base_url() . "/asset/delete_asset/" ?>" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                            </div>
                            <div class="row mb-3">
                                <input type="hidden" id="ast_id" name="ast_id">
                                <div class="col fw-bold px-4 fs-5" style="color:#414141;">คุณต้องการลบครุภัณฑ์ใช่หรือไม่</div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn px-4" style="background-color: #EE3F4C; border:none; color: white;">ยืนยัน</button>
                                </div>

                            </div>
                        </div>
                    </form> 
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


        <?php if (session()->getFlashdata('msg_fail') || session()->getFlashdata('msg_success')) { ?>
            <script>
                var myModal = new bootstrap.Modal(document.getElementById("alert"), {});
                document.onreadystatechange = function() {
                    myModal.show();
                };
            </script>
        <?php } ?>                            

</body>
</html>
<script>
    function add_value(id) {
        document.getElementById("ast_id").value = id;
    }
</script>

<script>

//datatable ใช้แล้วพัง
 $('#table1').dataTable( {
     language: {
         searchPlaceholder: "รหัสครุภัณฑ์, ชื่อครุภัณฑ์"
     },
     "oLanguage": {
                 "oPaginate": {
                     "sPrevious": "ย้อนกลับ",
                     "sNext": "ถัดไป"
                 },
                 "sInfo": "",
                 "sSearch": "ค้นหา "
             },
             
 } );  

 //แสดงตารงแบบเลือกประเภท
function myFunction() {
  var x = document.getElementById("type").value;
  $.ajax({
    url: "<?php echo base_url().'/Asset/get_data_category'; ?>",
    type: "POST",
    dataType: "JSON",
    data:{typ_id:x},
    success: function(data){
        console.log(data);
        let ast_cat = "";
        ast_cat += '<label for="cat_id">หมวดหมู่</label>';
        ast_cat += '<select name="cat_id" id="cat_id" class="form-control">';
        ast_cat += '<option value="none" selected disabled hidden>เลือกหมวดหมู่</option>';
        for(let i = 0; i < data['arr_category'].length; i++){
            ast_cat += '<option value="' +  data['arr_category'][i].cat_id + '">'+  data['arr_category'][i].cat_name +'</option>';	
        }
        ast_cat += '</select>';
        $('#div_cat').html(ast_cat);
    },
    error: function(){
        alert("Error");
    }
  });  
}

//แสดงตารงแบบเลือกหมวดหมู่   
function sort() {
  var y = document.getElementById("type").value;
  var cat_id = document.getElementById("div_cat").value;
  $.ajax({
    url: "<?php echo base_url().'/Asset/get_ast_type'; ?>",
    type: "POST",
    dataType: "JSON",
    data:{typ_id:y, cat_id:cat_id},
    success: function(data){
        // console.log(data);
        let sort_type = "";
        sort_type += '<table class="data_table table" id="table" style="width:100%">';
        sort_type += '<thead class="h_table">';
        sort_type += '<th class="border border-white "><div  align="center" >เลขทะเบียน</div></th><th class="border border-white "><div  align="center" >รายการครุภัณฑ์</div></th><th class="border border-white "><div  align="center" >ประเภท</div></th> <th class="border border-white "><div  align="center" >หมวดหมู่</div></th> <th class="border border-white "><div  align="center" >ผู้ครอบครอง</div></th><th class="border border-white "><div  align="center" >สถานะ</div></th><th class="border border-white "><div  align="center" >การดำเนินการ</div></th>';
        sort_type += '<tr>';
        sort_type += '</thead>';
        sort_type += '<tbody>';
        let arr_asset = data['arr_asset'];
        for(let i = arr_asset.length-1; i >= 0; i--){
            sort_type += '<tr>';
            sort_type += '<td class="border border-white "><div align="center">'+arr_asset[i].ast_code+'</div></td>';
            sort_type += '<td class="border border-white "><div align="left">'+arr_asset[i].ast_name+'</div></td>';
            sort_type += '<td class="border border-white "><div align="center">'+arr_asset[i].typ_name+'</div></td>';
            sort_type += '<td class="border border-white "><div align="center">'+arr_asset[i].cat_name+'</div></td>';
            sort_type += '<td class="border border-white "><div align="center">'+arr_asset[i].ast_detail+'</div></td>';
            sort_type += '<td class="border border-white "><div align="center">'+arr_asset[i].sta_name+'</div></td>';
            sort_type += '<td ><div align="center"><button type="button" class="btn btn-info py-1" ><i class="bi bi-clipboard-data"></i></button><button type="button" class="btn btn-warning py-1" ><i class="bi bi-pencil-square"></i></button><button type="button" class="btn btn-danger py-1" ><i class="bi bi-trash"></i></button></div></td>';
            sort_type += '<tr>';
        }
        sort_type += '</tbody>';
        sort_type += '</table>';
        $('#table_div').html(sort_type);
        // console.log(sort_type);

    },
    error: function(){
        alert("Error");
    }
  });   
}




</script>          

<style>
    .h_table{
        background-color: #00659D;
        color: white    ;
    }

    .bottomreborrow {
        font-family: 'FC Minimal';
        width: 151px;
        height: 40px;
        color: #FFFFFF;
        background-color: #1F1592;
        font-weight: bold;
    }

</style>
