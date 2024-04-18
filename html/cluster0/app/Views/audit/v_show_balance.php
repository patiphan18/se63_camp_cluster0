
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
                        <a href="<?php echo base_url() . "/circulation/show_circulation" ?>" class="text-decoration-none"  style="color:black;">รายงานค่าเสื่อมราคา</a>
                    </div>
                </div>
                
                <div class="row py-2">      
                    <div class="col">
                    <table>
                    <tr>
                        <td><div style="width: 8px; height: 55px; background: #EE3F4C; border-radius:5px;"></div></td>
                        <td><h1 class="px-2 fw-bold">รายงานค่าเสื่อมราคา</h1></td>
                    </tr>
                </table>
                    </div>
                </div>

	<table class="table table-borderless" id="table">
		<thead class="headtabal">
		    <tr class = " text-center">
			    <th class = "border border-white">ประเภท</th>
			    <th class = "border border-white">มูลค่าซื้อมา</th>
			    <th class = "border border-white">ค่าเสื่อม ณ ปีที่เลือก</th>
			    <th class = "border border-white">ค่าเสื่อมสะสม</th>
			    <th class = "border border-white">มูลค่าคงเหลือ</th>
			</tr><!--แสดงหัวตาราง-->
		</thead>
		    <tbody>
                <?php foreach($asset as $new_asset){ ?>
                <tr class = "tabal text-center">
                    <!-- <th class = "border border-white"><php?=// esc($new_asset->typ_name); ?></th> -->
                    <!-- <th class = "border border-white"><php?=// esc($new_asset->sum_price); ?></th> -->
                    <!--<th class = "border border-white"><//?= esc($new_asset['cat_typ_id']); ?></th>
                    <th class = "border border-white"><//?= esc($new_asset['ast_scrap']); ?></th>
                    <th class = "border border-white"><//?= esc($new_asset['ast_scrap']); ?></th>-->
                <?php } ?>
                </tr></a>
			</tbody>
	</table>
</body>