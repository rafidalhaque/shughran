<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'শাখার উদ্যোগে সাহিত্য প্রকাশ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                    <form action="<?php echo admin_url('departmentsreport/add-literature-publication/'. $branch_id.'?type=edit&id='.$this->input->get('id')) ?>" accept-charset="utf-8" method="post">
                    <?php  } else{ ?> 
                        <form action="<?php echo admin_url('departmentsreport/add-literature-publication/'. $branch_id) ?>" accept-charset="utf-8" method="post">
                    <?php  } ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                        <div class="form-group">			
                            <label for="literature_type">ধরন :</label>
                            <select class="form-control" id="literature_type" name='literature_type'>
                            <?php  if($this->input->get('type')=='edit'){ ?> 
                                <option><?php echo $shakhar_literature_publish['literature_type'] ?></option>
                                <option >কিশোর উপযোগী সাহিত্য পত্রিকা</option>
                                <option>বড়দের জন্য উপযোগী সাহিত্য পত্রিকা</option>
                                <option>বিশেষ সাময়িকী (স্মারক-জাতীয়)</option>
                                <option >দেয়ালিকা/ ক্রোড়পত্র/ বুলেটিন</option>
                                <option>লিটিল ম্যাগাজিন </option>
                                <?php  } else{ ?> 
                               
                                <option >কিশোর উপযোগী সাহিত্য পত্রিকা</option>
                                <option>বড়দের জন্য উপযোগী সাহিত্য পত্রিকা</option>
                                <option>বিশেষ সাময়িকী (স্মারক-জাতীয়)</option>
                                <option >দেয়ালিকা/ ক্রোড়পত্র/ বুলেটিন</option>
                                <option>লিটিল ম্যাগাজিন </option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="literature_time">সময়কাল :</label>
                            <select class="form-control" id="literature_time" name='literature_time'>
                               
                                <?php  if($this->input->get('type')=='edit'){ ?> 
                                <option><?php echo $shakhar_literature_publish['literature_time'] ?></option>
                                <option>মাসিক</option>
                                <option>দ্বিমাসিক</option>
                                <option>ত্রৈমাসিক</option>
                                <option>অন্যান্য</option>
                                <?php  } else{ ?> 
                                
                                <option>মাসিক</option>
                                <option>দ্বিমাসিক</option>
                                <option>ত্রৈমাসিক</option>
                                <option>অন্যান্য</option>
                                <?php  } ?>
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="literature_name">নাম :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$shakhar_literature_publish['literature_name']:''; ?>" id="literature_name" name='literature_name' required>
                        </div>
                         <!-- <div class="form-group">
                            <label for="literature_term">বিষয় :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$shakhar_literature_publish['literature_term']:''; ?>" id="literature_term" name='literature_term' required>
                        </div>  -->
                        <div class="form-group">
                            <label for="literature_amount">ইস্যু সংখ্যা :</label>
                            <input type="number" class="form-control" value="<?php echo ($this->input->get('type')=='edit')?$shakhar_literature_publish['literature_amount']:'0'; ?>" id="literature_amount" name='literature_amount' required>
                        </div>
                       
                        <button type="submit" class="btn btn-success" value="<?php echo ($this->input->get('type')=='edit')?'literature_publish_update':'literature_publish';?>" 
                        name="<?php echo ($this->input->get('type')=='edit')?'literature_publish_update':'literature_publish';?>">Submit</button>
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
