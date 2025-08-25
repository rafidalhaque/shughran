

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?=$assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?='স্কুল ও কলেজভিত্তিক ম্যাগাজিন সার্কুলেশন প্রতিবেদন ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
         <ul class="btn-tasks">
                <li class="dropdown">

                </li>
              
            </ul>
        </div>
    </div>

    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap container">
                    <?php if ($this->input->get('type') == 'edit') { ?>
                    <form action="<?php echo admin_url('departmentsreport/add-science-biggan-school-magazine-circulation/' . $branch_id . '?type=edit&id=' . $this->input->get('id')) ?>" accept-charset="utf-8" method="post">
                    <?php } else { ?>
                        <form action="<?php echo admin_url('departmentsreport/add-science-biggan-school-magazine-circulation/' . $branch_id) ?>" accept-charset="utf-8" method="post">
                    <?php } ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        
                        <div class="form-group">
                            <label for="protishan_name">শিক্ষা প্রতিষ্ঠানের নাম :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $science_biggan_school_magazine_circulation['protishan_name'] : ''; ?>" id="protishan_name" name='protishan_name' required>
                        </div>
                        <div class="form-group">
                            <label for="pathokforum">পাঠক ফোরাম আছে কিনা?</label>
                            <select
                                class="form-control"
                                id="pathokforum"
                                name='pathokforum' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $science_biggan_school_magazine_circulation['pathokforum']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                               
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="class_protinidhi">কতটি ক্লাসে প্রতিনিধি দেয়া হয়েছে? </label>
                            <input type="number" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $science_biggan_school_magazine_circulation['class_protinidhi'] : ''; ?>" id="class_protinidhi" name='class_protinidhi' required>
                        </div>
                        <div class="form-group">
                            <label for="mg_circulation_num">ম্যাগাজিন সার্কুলেশন সংখ্যা :</label>
                            <input type="number" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $science_biggan_school_magazine_circulation['mg_circulation_num'] : ''; ?>" id="mg_circulation_num" name='mg_circulation_num' required>
                        </div>

                        <button type="submit" class="btn btn-success" value="<?php echo ($this->input->get('type') == 'edit') ? 'science_biggan_school_magazine_circulation_update' : 'science_biggan_school_magazine_circulation'; ?>"
                        name="<?php echo ($this->input->get('type') == 'edit') ? 'science_biggan_school_magazine_circulation_update' : 'science_biggan_school_magazine_circulation'; ?>">Submit</button>
                    </form>
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
