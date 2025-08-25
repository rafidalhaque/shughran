<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
        বিদেশে অধ্যয়নরত জনশক্তির তালিকা
        </h2>

    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap table-bordered">
                        <table class="table">
                            <form action="<?php echo admin_url('departmentsreport/detailupdate');?>) ?>" method="POST">
                                <tr>
                                    <th class="text-right">নাম:</th>
                                    <td><input type="text" name="name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th class="text-right">দেশ:</th>
                                    <td><input type="text" name="country" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th class="text-right">পূর্বের দায়িত্ব:</th>
                                    <td><input type="text" name="old_responsibility" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th class="text-right">অনার্স/ মাস্টার্স/পিএইচডি:</th>
                                    <td><input type="text" name="degree" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th class="text-right">যোগাযোগের মাধ্যম:</th>
                                    <td><input type="num" name="contact_media" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th class="text-right"></th>
                                    <td><input class="btn btn-info" type="submit"value="Submit"></td>
                                </tr>
                            </form>
                        </table>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-izx2{border-color:black;background-color:#efefef;}
    .tg .tg-pwj7{background-color:#efefef;border-color:black;}
    .tg .tg-0pky{border-color:black;vertical-align:top}
    .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
    .tg .tg-0lax{border-color:black;vertical-align:top}
    @media screen and (max-width: 767px) {
        .tg {width: auto !important;}
        .tg col {width: auto !important;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
    }

    .table-header-rotated {
        border-collapse: collapse;
    }
    .table-header-rotated td {
        width: 30px;
    }
    .no-csstransforms .table-header-rotated td {
        padding: 5px 10px;
    }
    .table-header-rotated td {
        text-align: center;
        padding: 10px 5px;
        border: 1px solid #ccc;
    }
    .table-header-rotated td.rotate {
        height: 140px;
        white-space: nowrap;
    }
    .table-header-rotated td.rotate > div {
        -webkit-transform: translate(10px, 51px) rotate(270deg);
        transform: translate(10px, 51px) rotate(270deg);
        width: 20px;
    }
    .table-header-rotated td.rotate > div > span {

        padding: 5px 10px;
    }
    .table-header-rotated td.row-header {
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }
    .table > tbody > tr > td {
        border: 1px solid #ccc;
    }
</style>
