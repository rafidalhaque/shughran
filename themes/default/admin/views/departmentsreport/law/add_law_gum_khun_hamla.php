<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?=$assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?='গুম, খুন, হামলা নির্যাতন বিষয়ে আমাদের পক্ষ থেকে পত্রিকায় প্রচারসংক্রান্ত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
         <ul class="btn-tasks">
              
   
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
                    <form action="<?php echo admin_url('departmentsreport/add-law-gum-khun-hamla/' . $branch_id . '?type=edit&id=' . $this->input->get('id')) ?>" accept-charset="utf-8" method="post">
                    <?php } else { ?>
                        <form action="<?php echo admin_url('departmentsreport/add-law-gum-khun-hamla/' . $branch_id) ?>" accept-charset="utf-8" method="post">
                    <?php } ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <div class="form-group">
                            <label for="ghotonar_tarikh">ঘটনার তারিখ :</label>
                            <input type="date" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $law_gum_khun_hamla['ghotonar_tarikh'] : ''; ?>" id="ghotonar_tarikh" name='ghotonar_tarikh' required>
                        </div>
                        <div class="form-group">
                            <label for="procharer_tarikh">প্রচারের তারিখ :</label>
                            <input type="date" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $law_gum_khun_hamla['procharer_tarikh'] : ''; ?>" id="procharer_tarikh" name='procharer_tarikh' required>
                        </div>
                        <div class="form-group">
                            <label for="potrikar_nam">পত্রিকার নাম :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $law_gum_khun_hamla['potrikar_nam'] : ''; ?>" id="potrikar_nam" name='potrikar_nam' required>
                        </div>
                        <div class="form-group">
                            <label for="jader_bepare_prochar">যার/যাদের ব্যাপারে প্রচার :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $law_gum_khun_hamla['jader_bepare_prochar'] : ''; ?>" id="jader_bepare_prochar" name='jader_bepare_prochar' required>
                        </div>

                        <div class="form-group">
                            <label for="shong_shommelon">সাংবাদিক সন্মেলন হয়েছে কিনা?</label>
                            <select
                                class="form-control"
                                id="shong_shommelon"
                                name='shong_shommelon' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $law_gum_khun_hamla['shong_shommelon']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" value="<?php echo ($this->input->get('type') == 'edit') ? 'law_gum_khun_hamla_update' : 'law_gum_khun_hamla'; ?>"
                        name="<?php echo ($this->input->get('type') == 'edit') ? 'law_gum_khun_hamla_update' : 'law_gum_khun_hamla'; ?>">Submit</button>
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
