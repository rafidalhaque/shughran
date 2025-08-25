<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?=$assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?='জমি সংক্রান্ত তথ্য ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                    <form action="<?php echo admin_url('departmentsreport/add-foundation-jomi-shongkranto/' . $branch_id . '?type=edit&id=' . $this->input->get('id')) ?>" accept-charset="utf-8" method="post">
                    <?php } else { ?>
                        <form action="<?php echo admin_url('departmentsreport/add-foundation-jomi-shongkranto/' . $branch_id) ?>" accept-charset="utf-8" method="post">
                    <?php } ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <div class="form-group">
                            <label for="khotiyan_no">খতিয়ান নং :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_jomi_shongkranto['khotiyan_no'] : ''; ?>" id="khotiyan_no" name='khotiyan_no' required>
                        </div>
                        <div class="form-group">
                            <label for="jomir_poriman">জমির পরিমান :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_jomi_shongkranto['jomir_poriman'] : ''; ?>" id="jomir_poriman" name='jomir_poriman' required>
                        </div>
                        <div class="form-group">
                            <label for="registration_name">রেজিষ্ট্রেশন কার নামে?</label>
                            <select
                                class="form-control"
                                id="registration_name"
                                name='registration_name' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['registration_name']; ?></option>
                                <?php }  ?>
                                <option>ব্যক্তি</option>
                                <option>ফাউন্ডেশন</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namjarir_poriman">নামজারির পরিমান :</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_jomi_shongkranto['namjarir_poriman'] : ''; ?>" id="namjarir_poriman" name='namjarir_poriman' required>
                        </div>
                        <div class="form-group">
                            <label for="cs">পর্চা CS :</label>
                           <select
                                class="form-control"
                                id="cs"
                                name='cs' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['cs']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sa">পর্চা SA :</label>
                           <select
                                class="form-control"
                                id="sa"
                                name='sa' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['sa']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rs_ror">পর্চা RS/ ROR :</label>
                           <select
                                class="form-control"
                                id="rs_ror"
                                name='rs_ror' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['rs_ror']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dcr">পর্চা DCR :</label>
                           <select
                                class="form-control"
                                id="dcr"
                                name='dcr' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['dcr']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city_bs">পর্চা CITY/BS :</label>
                           <select
                                class="form-control"
                                id="city_bs"
                                name='city_bs' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['city_bs']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                      

                        <div class="form-group">
                            <label for="khajna_porishodh">খাজনা পরিশোধ করা হয়েছে কত সাল পর্যন্ত? </label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_jomi_shongkranto['khajna_porishodh'] : ''; ?>" id="khajna_porishodh" name='khajna_porishodh' required>
                        </div>

                        <div class="form-group">
                            <label for="gas_biddut_wasa">গ্যাস/ বিদ্যুত/ওয়াসা লাইন আছে কিনা?</label>
                            <select
                                class="form-control"
                                id="gas_biddut_wasa"
                                name='gas_biddut_wasa' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['gas_biddut_wasa']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                         </div>
                        <div class="form-group">
                            <label for="purber_dolil">পূর্বের সব দলীল আছে কিনা?</label>
                            <select
                                class="form-control"
                                id="purber_dolil"
                                name='purber_dolil' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['purber_dolil']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rajuk_onumoti">রাজউক/অথরিটির অনুমোদনের কাগজ আছে কিনা?</label>
                            <select
                                class="form-control"
                                id="rajuk_onumoti"
                                name='rajuk_onumoti' >   
                                <?php if($this->input->get('type') == 'edit') { ?> 
                                <option><?php echo $foundation_jomi_shongkranto['rajuk_onumoti']; ?></option>
                                <?php }  ?>
                                <option>হ্যাঁ</option>
                                <option>না</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comments">মন্তব্য</label>
                            <input type="text" class="form-control" value="<?php echo ($this->input->get('type') == 'edit') ? $foundation_jomi_shongkranto['comments'] : ''; ?>" id="comments" name='comments' required>
                        </div>

                        <button type="submit" class="btn btn-success" value="<?php echo ($this->input->get('type') == 'edit') ? 'foundation_jomi_shongkranto_update' : 'foundation_jomi_shongkranto'; ?>"
                        name="<?php echo ($this->input->get('type') == 'edit') ? 'foundation_jomi_shongkranto_update' : 'foundation_jomi_shongkranto'; ?>">Submit</button>
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
