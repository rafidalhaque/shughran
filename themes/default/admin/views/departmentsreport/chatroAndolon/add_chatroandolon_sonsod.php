<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?=$assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?='ছাত্রসংসদ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                    <form action="<?php echo admin_url('departmentsreport/add-chatroandolon-sonsod/' . $branch_id . '?type=edit&id=' . $this->input->get('id')) ?>" accept-charset="utf-8" method="post">
                    <?php } else { ?>
                        <form action="<?php echo admin_url('departmentsreport/add-chatroandolon-sonsod/' . $branch_id) ?>" accept-charset="utf-8" method="post">
                    <?php } ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                     

                        <div class="form-group">
                            <label for="imp_ins">গুরুত্বপূর্ণ শিক্ষাপ্রতিষ্ঠানের নাম :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $chatroandolon_sonsod['imp_ins'] : ''; ?>" id="imp_ins" name='imp_ins' required>
                        </div>
                        <div class="form-group">
                            <label for="sonsod_act">ছাত্রসংসদ কার্যকর আছে কিনা? </label>

                            <select
                                class="form-control"
                                id="sonsod_act"
                                name='sonsod_act' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $chatroandolon_sonsod['sonsod_act']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sonsod_vote">সর্বশেষ নির্বাচন হয়েছে কত সালে? </label>
                            <input type="number" min='1900' max='2099'  class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $chatroandolon_sonsod['sonsod_vote'] : 1900; ?>" id="sonsod_vote" name='sonsod_vote' required>
                        </div>

                        <div class="form-group">
                            <label for="sonsod_rulling_party">ছাত্রসংসদ কার্যকর থাকলে কোন সংগঠনের নিয়ন্ত্রণে আছে?</label>
                            <select
                                class="form-control"
                                id="sonsod_rulling_party"
                                name='sonsod_rulling_party' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $chatroandolon_sonsod['sonsod_rulling_party']; ?></option>
                                <?php }  ?>
                                <option>ছাত্রশিবির</option>
                                <option>ছাত্রলীগ</option>
                                <option>ছাত্রদল</option>
                                <option>বাম সংগঠন</option>
                                <option>অন্যান্য</option>
                               
                            </select>   
                        </div>
                        <div class="form-group">
                            <label for="next_sonsod_panel">পরবর্তী নির্বাচনে আমাদের প্যানেল ঘোষণার প্রস্তুতি আছে কিনা?  </label>

                            <select
                                class="form-control"
                                id="next_sonsod_panel"
                                name='next_sonsod_panel' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $chatroandolon_sonsod['next_sonsod_panel']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" value="<?php echo ($this->input->get('type') == 'edit') ? 'chatroandolon_sonsod_update' : 'chatroandolon_sonsod'; ?>"
                        name="<?php echo ($this->input->get('type') == 'edit') ? 'chatroandolon_sonsod_update' : 'chatroandolon_sonsod'; ?>">Submit</button>
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
