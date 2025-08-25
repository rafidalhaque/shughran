<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সাহিত্য সংগঠন সম্পর্কিত : ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                    <?php  if($this->input->get('type')=='edit'){ ?> 
                    <form action="<?php echo admin_url('departmentsreport/add-literature-songothon/'. $branch_id.'?type=edit&id='.$this->input->get('id')) ?>" accept-charset="utf-8" method="post">
                    <?php  } else{ ?> 
                        <form action="<?php echo admin_url('departmentsreport/add-literature-songothon/'. $branch_id) ?>" accept-charset="utf-8" method="post">
                    <?php  } ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                        <div class="form-group">			
                            
                        <div class="form-group ">
                            <label for="s_name">সাহিত্য সংগঠনের নাম </label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_name']:''; ?>" id="s_name" name='s_name' required>
                        </div>
                        <div class="form-group">
                            <div><label for="s_m">সদস্য :</label></div>
                            <div class="row">
                                <div class="col-sm-6">পূর্ব:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_m_p']:'0'; ?>" id="s_m" name='s_m_p' required> </div>
                                <div class="col-sm-6"> বর্তমান: <input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_m']:'0'; ?>" id="s_m" name='s_m' required> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div><label for="s_a">সাথী :</label></div>
                            <div class="row">
                                <div class="col-sm-6">পূর্ব:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_a_p']:'0'; ?>" id="s_a_p" name='s_a_p' required></div>
                                <div class="col-sm-6"> বর্তমান:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_a']:'0'; ?>" id="s_a" name='s_a' required></div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div><label for="s_w">কর্মী :</label></div>
                            <div class="row">
                                <div class="col-sm-6">পূর্ব:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_w_p']:'0'; ?>" id="s_w_p" name='s_w_p' required></div>
                                <div class="col-sm-6"> বর্তমান:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_w']:'0'; ?>" id="s_w" name='s_w' required></div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div><label for="s_s">সমর্থক :</label></div>
                            <div class="row">
                                <div class="col-sm-6">পূর্ব:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_s_p']:'0'; ?>" id="s_s_p" name='s_s_p' required></div>
                                <div class="col-sm-6"> বর্তমান:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_s']:'0'; ?>" id="s_s" name='s_s' required></div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div><label for="s_f">বন্ধু :</label></div>
                            <div class="row">
                                <div class="col-sm-6">পূর্ব:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_f_p']:'0'; ?>" id="s_f_p" name='s_f_p' required></div>
                                <div class="col-sm-6"> বর্তমান:<input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$literature_songothon_one['s_f']:'0'; ?>" id="s_f" name='s_f' required></div>
                            </div>
                        </div>    
                       
                        <button type="submit" class="btn btn-success" value="<?php echo ($this->input->get('type')=='edit')?'literature_songothon_update':'literature_songothon';?>" 
                        name="<?php echo ($this->input->get('type')=='edit')?'literature_songothon_update':'literature_songothon';?>">Submit</button>
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
