
    <style>
    .headtabal {
        background-color: #00659D;
        color: #FFFFFF;
        height: 56px;
        font-size: 22px;
        font-family: 'FC Minimal';
        border-radius: 50px;
    }

    .tabal {
        border-style: solid;
        border-color: coral;
        background-color: #F9F8F8;
        color: #808184;
        font-size: 20px;
        font-family: 'FC Minimal';
    }

    tr {
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
    }
    </style>

    <title>ดูค่าเสื่อมราคา</title>
    <style>
        .arrow_up {
            width: 0px; 
            height: 0px; 
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 20px solid #f6f4ee;
        }
    </style>
<div id="main" class="container-fluid" style="margin-top: 80px;">
<div class="row px-5">
            <div class="col-12 col-md-12 col-sm-12 px-4">
                <div class="row">
                    <div class="col" >
                        <a href="<?php echo base_url() ?>" class="text-decoration-none"  style="color:black;">หน้าหลัก</a> > 
                        <a href="<?php echo base_url() . "/circulation/show_circulation" ?>" class="text-decoration-none"  style="color:black;">รายงานค่าเสื่อมราคารายชิ้น</a>
                    </div>
                </div>
                
                <div class="row py-2">      
                    <div class="col">
                    <table>
                    <tr>
                        <td><div style="width: 8px; height: 55px; background: #EE3F4C; border-radius:5px;"></div></td>
                        <td><h1 class="px-2 fw-bold">รายงานค่าเสื่อมราคารายชิ้น</h1></td>
                    </tr>
                </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row my-2">
                            <div class="col-4"></div>
                            <div class="col-6">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                                    <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="https://www.jib.co.th/img_master/product/original/2021111210015949783_1.jpg" class="d-block" style="height: 200px; margin:auto;" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://www.jib.co.th/img_master/product/original/2021111210015949783_1.jpg" class="d-block" style="height: 200px; margin:auto;" alt="...">
                                            </div>
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
                        <div class="row my-2">
                            <div class="col-4 text-end">เลขทะเบียนครุภัณฑ์</div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="6201010001" disabled>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 text-end">ชื่อครุภัณฑ์</div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Notebook Asus" disabled>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 text-end">วันที่ซื้อมา</div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="01-01-2562" disabled>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 text-end">วันที่เลิกใช้งาน</div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="-" disabled>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 text-end">ราคาที่ซื้อ</div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="30,000" disabled>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 text-end">อายุการใช้งาน(เดือน)</div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="60" disabled>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 text-end">ราคาซาก</div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="5,000" disabled>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 text-end">สูตรคำนวณค่าเสื่อมราคา</div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="สูตรเส้นตรง" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    <table class="table table-borderless" id="table">
		<thead class="headtabal">
		    <tr class = " text-center">
			    <th class = "border border-white">ปี</th>
			    <th class = "border border-white">ค่าเสื่อม ณ ปีนั้น</th>
			    <th class = "border border-white">ค่าเสื่อมสะสม</th>
			    <th class = "border border-white">มูลค่าคงเหลือ</th>
			</tr><!--แสดงหัวตาราง-->
		</thead>
		    <tbody class="text-center">
                <tr>
                    <td>2562</td>
                    <td>5,000</td>
                    <td>5,000</td>
                    <td>25,000</td>
                </tr>
                <tr>
                    <td>2563</td>
                    <td>5,000</td>
                    <td>10,000</td>
                    <td>20,000</td>
                </tr>
                <tr>
                    <td>2564</td>
                    <td>5,000</td>
                    <td>15,000</td>
                    <td>15,000</td>
                </tr>
			</tbody>
	</table>
                    </div>
                </div>
<div class="row my-5">
    <div class="col"></div>
</div>

</body>