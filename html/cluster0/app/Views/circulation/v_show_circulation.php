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

    .bottomreturn {
        font-family: 'FC Minimal';
        width: 109px;
        height: 32px;
        color: #FFFFFF;
        font-size: 20px;
        background-color: #CFAAF4;
    }

    .bottomreborrow {
        font-family: 'FC Minimal';
        width: 151px;
        height: 40px;
        color: #FFFFFF;
        background-color: #1F1592;
        font-weight: bold;
    }

    .icon {
        width: 15px;

    }

    tr {
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
    }


    .icon {
        font-family: 'FontAwesome';
        margin: 1.2rem;
        font-size: 3.2em;
        color: rgba(0, 0, 0, 0.8);
        -webkit-font-smoothing: antialiased;
    }

    .icon .expand-icon:after {
        content: "\f150";

    }

    .light {
        -webkit-text-stroke: 4px white;
    }

    .supersized {
        font-size: 10rem;
    }

    .expand-icon:after {
        content: "\f150";
    }

    .outline {
        -webkit-text-stroke: 1px red;
    }

    .overlap {
        -webkit-text-stroke: 4px rgba(255, 0, 0, 1);
    }

    .block {
        display: inline-block;
        vertical-align: top;
        text-align: center;
        width: 20%;
        height: 150px;
        border: 1px solid #999;
        padding: 1%;
        margin: 1%;
    }
</style>
<div id="main" class="container-fluid" style="margin-top: 80px;">

    <div class="row px-3 py-2">
        <div class="row px-3">
            <div class="col px-5">
                <a href="<?php echo base_url() ?>" class="text-decoration-none" style="color:black;">หน้าหลัก </a> >
                <a class="text-decoration-none" style="color:black;">ยืม-คืนครุภัณฑ์</a>
            </div>
        </div>
        <div class="col px-5">
            <table>
                <tr>
                    <td>
                        <div style="width: 8px; height: 55px; background: #EE3F4C; border-radius:5px;"></div>
                    </td>
                    <td>
                        <h1 class="px-2 fw-bold"> ยืม-คืนครุภัณฑ์</h1>
                    </td>
                </tr>
            </table>
            <!-- <p class = "text-center">ค้นหา&emsp;<input type="search" id="site-search" name="q">&emsp;<button>Search</button></p> -->
            <div class="row">
                <div class="col text-end">
                    <a href="<?php echo base_url(). "/circulation/show_borrow_asset" ?>">
                        <button type="button" class="btn btn-outlinex-primary bottomreborrow py-1" style="color : #FFFFFF">ยืมครุภัณฑ์&emsp; <i class="bi bi-plus-circle " style="font-size: 15.43px; "></i></button>
                    </a>
                </div>
            </div>
            <table class="table table-borderless my-1" id="table">
                <thead class="headtabal">
                    <tr class=" text-center ">
                        <td class="border border-white ">เลขทะเบียน</td>
                        <td class="border border-white">รายการครุภัณฑ์</td>
                        <td class="border border-white">ประเภท</td>
                        <td class="border border-white">ผู้ครอบครอง</td>
                        <td class="border border-white">รหัสพนักงาน</td>
                        <td class="border border-white">การดำเนินงาน</td>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($opt_circulation); $i++) { ?>
                        <tr class="tabal text-center border border-white">
                            <td><?php echo $opt_circulation[$i]->ast_code ?></td>
                            <td><?php echo $opt_circulation[$i]->ast_name ?></td>
                            <td><?php echo $opt_circulation[$i]->typ_name ?></td>
                            <td><?php echo $opt_circulation[$i]->emp_full_name ?></td>
                            <td><?php echo $opt_circulation[$i]->emp_code ?></td>
                            <td>
                                <a href="<?php echo base_url() . "/circulation/show_return_asset?code=" . $opt_circulation[$i]->ast_code; ?>">
                                <button type="button" class="btn btn-outlinex-primary bottomreturn py-1" style="color : #593588">คืนครุภัณฑ์</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    </body>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    searchPlaceholder: "รหัสครุภัณฑ์, ชื่อครุภัณฑ์",
                    emptyTable: " "
                },
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "ย้อนกลับ",
                        "sNext": "ถัดไป"
                    },
                    "sInfoEmpty": "",
                    "sInfo": "",
                    "sZeroRecords": "",
                    "sInfoFiltered": "",
                    "sSearch": "ค้นหา "
                }
            });

        });
    </script>

    </html>