<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?=$assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?='বিদেশে অধ্যয়নরত ভাইদের আপডেট তালিকা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
        
        </div>
    </div>

    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap container">
                    <?php if ($this->input->get('type') == 'edit') { ?>
                    <form action="<?php echo admin_url('departmentsreport/add-international-bideshe-study/' . $branch_id . '?type=edit&id=' . $this->input->get('id')) ?>" accept-charset="utf-8" method="post">
                    <?php } else { ?>
                        <form action="<?php echo admin_url('departmentsreport/add-international-bideshe-study/' . $branch_id) ?>" accept-charset="utf-8" method="post">
                    <?php } ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <div class="form-group">
                            <label for="name">নাম :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $international_bideshe_study['name'] : ''; ?>" id="name" name='name' required>
                        </div>
                        <div class="form-group">
                            <label for="country">দেশ :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $international_bideshe_study['country'] : ''; ?>" id="country" name='country' required>
                        </div>
                        <div class="form-group">
                            <label for="last_sang_man">সর্বশেষ সাংগঠনিক মান :</label>

                            <select
                                class="form-control"
                                id="last_sang_man"
                                name='last_sang_man' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $international_bideshe_study['last_sang_man']; ?></option>
                                <?php }  ?>
                                <option>সদস্য</option>
                                <option>সাথী</option>
                                <option>কর্মী</option>
                                <option>সমর্থক</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="last_dayitto">সর্বশেষ দায়িত্ব :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $international_bideshe_study['last_dayitto'] : ''; ?>" id="last_dayitto" name='last_dayitto' required>
                        </div>

                        <div class="form-group">
                            <label for="education">শিক্ষার স্তর :</label>
                            <<select
                                class="form-control"
                                id="education"
                                name='education' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $international_bideshe_study['education']; ?></option>
                                <?php }  ?>
                                <option>অনার্স</option>
                                <option>মাস্টার্স</option>
                                <option>এমফিল</option>
                                <option>পিএইচডি</option>
                                <option>পোস্ট ডক</option>
                            </select>     
                        </div>
                        <div class="form-group">
                            <label for="online_number">অনলাইন নম্বর :</label>
                            <input type="number" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $international_bideshe_study['online_number'] : ''; ?>" id="online_number" name='online_number' required>
                        </div>

                        <button type="submit" class="btn btn-success" value="<?php echo ($this->input->get('type') == 'edit') ? 'international_bideshe_study_update' : 'international_bideshe_study'; ?>"
                        name="<?php echo ($this->input->get('type') == 'edit') ? 'international_bideshe_study_update' : 'international_bideshe_study'; ?>">Submit</button>
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
