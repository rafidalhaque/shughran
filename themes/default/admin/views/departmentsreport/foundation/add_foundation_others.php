<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?=$assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?='অন্যান্য' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
         <ul class="btn-tasks">
                <li class="dropdown">

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?="সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">

                        </ul>
                    </li>
                <?php } ?>
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
                    <form action="<?php echo admin_url('departmentsreport/add-foundation-others/' . $branch_id . '?type=edit&id=' . $this->input->get('id')) ?>" accept-charset="utf-8" method="post">
                    <?php } else { ?>
                        <form action="<?php echo admin_url('departmentsreport/add-foundation-others/' . $branch_id) ?>" accept-charset="utf-8" method="post">
                    <?php } ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <div class="form-group">
                            <label for="guide_coaching_name">গাইড ও কোচিংয়ের নাম :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_others['guide_coaching_name'] : ''; ?>" id="guide_coaching_name" name='guide_coaching_name' required>
                        </div>
                        <div class="form-group">
                            <label for="reg_ache_kina">রেজিন্ট্রেশন/অনুমোদন আছে কিনা? </label>
                           <select
                                class="form-control"
                                id="reg_ache_kina"
                                name='reg_ache_kina' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_others['reg_ache_kina']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kon_sreni">কোন শ্রেণির? </label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_others['kon_sreni'] : ''; ?>" id="kon_sreni" name='kon_sreni' required>
                        </div>
                        <div class="form-group">
                            <label for="total_ay">মোট আয় :</label>
                            <input type="number" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_others['total_ay'] : ''; ?>" id="total_ay" name='total_ay' required>
                        </div>
                        <div class="form-group">
                            <label for="total_bey">মোট ব্যয় : </label>
                            <input type="number" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_others['total_bey'] : ''; ?>" id="total_bey" name='total_bey' required>
                        </div>

                        <button type="submit" class="btn btn-success" value="<?php echo ($this->input->get('type') == 'edit') ? 'foundation_others_update' : 'foundation_others'; ?>"
                        name="<?php echo ($this->input->get('type') == 'edit') ? 'foundation_others_update' : 'foundation_others'; ?>">Submit</button>
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
