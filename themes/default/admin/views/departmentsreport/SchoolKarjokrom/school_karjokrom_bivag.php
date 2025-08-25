<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                    class="fa-fw fa fa-barcode"></i><?= 'স্কুল কার্যক্রম বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                 <li>
                            <a href="#" onclick="doit('xlsx','testTable1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
							
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/school-karjokrom-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/school-karjokrom-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>




                <div class="table-responsive">


                    <style type="text/css">
                        .tg  {border-collapse:collapse;border-spacing:0;}
                        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                        .tg .tg-izx2{border-color:black;background-color:#efefef;}
                        .tg .tg-pwj7{background-color:#efefef;border-color:black;}
                        .tg .tg-0pky{border-color:black;vertical-align:top}
                        .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
                        .tg .tg-0lax{border-color:black;vertical-align:top}
                        @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

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
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable1">

                            <tr>
                                <td class="tg-y698 type_1" rowspan="7"> জনশক্তি	</td>
                                <td class="tg-0pky" rowspan="2">বিবরণ </td>
                                <td class="tg-0pky" rowspan="2">
                                    পূর্ব সংখ্যা
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                    বর্তমান সংখ্যা
                                </td>
                                <td class="tg-0pky" colspan="2" >
                                    বৃদ্ধি
                                </td>
                                <td class="tg-0pky" rowspan="7">
                                    বৈঠক
                                </td>
                                <td class="tg-0pky" >
                                    বিবরণ
                                </td>
                                <td class="tg-0pky" >
                                    সংখ্যা
                                </td>
                                <td class="tg-0pky" >
                                    উপস্থিতি
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-0pky" >
                                    আগমন
                                </td>
                                <td class="tg-0pky" >
                                    মানোন্নয়ন
                                </td>
                                <td class="tg-0pky">
                                    সাথী বৈঠক
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bothok_sathib_sonka = $total_school_karjokocom_bibag['bothok_sathib_sonka'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bothok_sathipb_u = $total_school_karjokocom_bibag['bothok_sathipb_u'] ?>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-0pky">সদস্য</td>
                                <td class="tg-0pky" >
                                    <?php echo $jonosokti_sodoso_ps = $total_school_karjokocom_bibag['jonosokti_sodoso_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sodoso_bs = $total_school_karjokocom_bibag['jonosokti_sodoso_bs'] ?>
                                </td>
                                <td class="tg-0pky" >

                               <?php echo $jonosokti_sodoso_ag = $total_school_karjokocom_bibag['jonosokti_sodoso_ag'] ?> 
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sodoso_mu = $total_school_karjokocom_bibag['jonosokti_sodoso_mu'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    সাথী প্রার্থী বৈঠক
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bothok_sathipb_sonka = $total_school_karjokocom_bibag['bothok_sathipb_sonka'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bothok_sathipb_u = $total_school_karjokocom_bibag['bothok_sathipb_u'] ?>
                                </td>
                                
                            <tr>
                                <td class="tg-0pky">সদস্য প্রার্থী</td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sodosop_ps = $total_school_karjokocom_bibag['jonosokti_sodosop_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sodosop_ps = $total_school_karjokocom_bibag['jonosokti_sodosop_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sodosop_ag = $total_school_karjokocom_bibag['jonosokti_sodosop_ag'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $jonosokti_sodosop_mu = $total_school_karjokocom_bibag['jonosokti_sodosop_mu'] ?>
                                </td>   
                                <td class="tg-0pky" >
                                    কর্মী বৈঠক
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bothok_kb_sonka = $total_school_karjokocom_bibag['bothok_kb_sonka'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bothok_kb_u = $total_school_karjokocom_bibag['bothok_kb_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">সাথী</td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sathi_ps = $total_school_karjokocom_bibag['jonosokti_sathi_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sathi_bs = $total_school_karjokocom_bibag['jonosokti_sathi_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sathi_ag = $total_school_karjokocom_bibag['jonosokti_sathi_ag'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sathi_mu = $total_school_karjokocom_bibag['jonosokti_sathi_mu'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    স্কুল প্রতিনিধি বেঠক
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bothok_spb_sonka = $total_school_karjokocom_bibag['bothok_spb_sonka'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bothok__spb_u = $total_school_karjokocom_bibag['bothok__spb_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky"> সাথী প্রার্থী</td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sathip_ps = $total_school_karjokocom_bibag['jonosokti_sathip_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_ssathip_bs = $total_school_karjokocom_bibag['jonosokti_ssathip_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sathip_ag = $total_school_karjokocom_bibag['jonosokti_sathip_ag'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_sathip_mu = $total_school_karjokocom_bibag['jonosokti_sathip_mu'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                            </tr>



                            <tr>
                                <td class="tg-0pky">কর্মী</td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_k_ps = $total_school_karjokocom_bibag['jonosokti_k_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_k_bs = $total_school_karjokocom_bibag['jonosokti_k_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_k_ag = $total_school_karjokocom_bibag['jonosokti_k_ag'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jonosokti_k_mu = $total_school_karjokocom_bibag['jonosokti_k_mu'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="6"> দাওয়াত	</td>
                                <td class="tg-0pky">বিবরণ </td>
                                <td class="tg-0pky">
                                    পূর্ব সংখ্যা
                                </td>
                                <td class="tg-0pky">
                                    বর্তমান সংখ্যা
                                </td>
                                <td class="tg-0pky" >
                                    বৃদ্ধি
                                </td>
                                <td class="tg-0pky" >
                                    ঘাটতি
                                </td>
                                <td class="tg-0pky" rowspan="15">
                                    দাওয়াতীমূলক প্রোগ্রাম
                                </td>
                                <td class="tg-0pky">
                                    প্রোগ্রামের ধরণ
                                </td>
                                <td class="tg-0pky">

                                </td>
                                <td class="tg-0pky">

                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">সমর্থক</td>
                                <td class="tg-0pky">
                                <?php echo $dawat_somthok_ps = $total_school_karjokocom_bibag['dawat_somthok_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawat_somthok_bs = $total_school_karjokocom_bibag['dawat_somthok_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                               <?php echo $dawat_somthok_b = $total_school_karjokocom_bibag['dawat_somthok_b'] ?>
                                </td>
                              
                                <td class="tg-0pky" >
                                    শ্রেণী প্রতিনিধি অভিষেক
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_spo_s = $total_school_karjokocom_bibag['owatimulokpogam_spo_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                            
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">বন্ধু</td>
                                <td class="tg-0pky" >
v                            <?php echo $datwat_bondu_ps = $total_school_karjokocom_bibag['datwat_bondu_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawat_bondu_bs = $total_school_karjokocom_bibag['dawat_bondu_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                              <?php echo $datwat_bondu_b = $total_school_karjokocom_bibag['datwat_bondu_b'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_bondu_g = $total_school_karjokocom_bibag['datwat_bondu_g'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    মেধা যাচাই
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">অমুসলিম সমর্থক</td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_osomthok_ps = $total_school_karjokocom_bibag['datwat_osomthok_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_osomthok_bs = $total_school_karjokocom_bibag['datwat_osomthok_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_osomthok_b = $total_school_karjokocom_bibag['datwat_osomthok_b'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_osomthok_g = $total_school_karjokocom_bibag['datwat_osomthok_g'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    প্রতিযোগিতা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_potijogita_s = $total_school_karjokocom_bibag['owatimulokpogam_potijogita_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_potijogita_u = $total_school_karjokocom_bibag['owatimulokpogam_potijogita_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">অমুসলিম বন্ধু</td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    শিক্ষা সফর
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_shikasofor_s = $total_school_karjokocom_bibag['owatimulokpogam_shikasofor_s'] ?>
                                </td>
                                <td class="tg-0pky" >
v                                <?php echo $owatimulokpogam_shikasofor_u = $total_school_karjokocom_bibag['owatimulokpogam_shikasofor_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">শুভাকাঙ্খী </td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_subuk_ps = $total_school_karjokocom_bibag['datwat_subuk_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_subuk_bs = $total_school_karjokocom_bibag['datwat_subuk_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_subuk_b = $total_school_karjokocom_bibag['datwat_subuk_b'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $datwat_subuk_g = $total_school_karjokocom_bibag['datwat_subuk_g'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    সংগীত, উপস্থাপনা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_su_s = $total_school_karjokocom_bibag['owatimulokpogam_su_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_su_U = $total_school_karjokocom_bibag['owatimulokpogam_su_U'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="2">সংগঠন </td>
                                <td class="tg-0pky" >
                                    উপশাখা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $songothon_uposaka_ps = $total_school_karjokocom_bibag['songothon_uposaka_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $songothon_uposaka_bs = $total_school_karjokocom_bibag['songothon_uposaka_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $songothon_uposaka_b = $total_school_karjokocom_bibag['songothon_uposaka_b'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $songothon_uposaka_g = $total_school_karjokocom_bibag['songothon_uposaka_g'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    চিত্র প্রদর্শনী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_chtop_u = $total_school_karjokocom_bibag['owatimulokpogam_chtop_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সমর্থক সংগঠন
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $songothon_somothoks_ps = $total_school_karjokocom_bibag['songothon_somothoks_ps'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $songothon_somothks_bs = $total_school_karjokocom_bibag['songothon_somothks_bs'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $songothon_somothoks_b = $total_school_karjokocom_bibag['songothon_somothoks_b'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $songothon_somothoks_g = $total_school_karjokocom_bibag['songothon_somothoks_g'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    বিজ্ঞানী ও মনীষীদের জীবনী আলোকপাত
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_bmjap_s = $total_school_karjokocom_bibag['owatimulokpogam_bmjap_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_bmjap_u = $total_school_karjokocom_bibag['owatimulokpogam_bmjap_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="10">প্রশিক্ষণ </td>
                                <td class="tg-0pky" >
                                    ধরণ
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    সংখ্যা
                                </td>
                                <td class="tg-0pky" >
                                    উপস্থিতি
                                </td>
                                <td class="tg-0pky" >
                                    গড়
                                </td>
                                <td class="tg-0pky" >
                                    সামার ক্যাম্প
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_sk_s = $total_school_karjokocom_bibag['owatimulokpogam_sk_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_sk_u = $total_school_karjokocom_bibag['owatimulokpogam_sk_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সাথী টিসি/টিএস
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_sathitcts_s = $total_school_karjokocom_bibag['p_sathitcts_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $v = $total_school_karjokocom_bibag['p_sathitcts_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    আবৃত্তি/ছড়া
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_sk_u = $total_school_karjokocom_bibag['owatimulokpogam_as_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_as_u = $total_school_karjokocom_bibag['owatimulokpogam_as_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    কর্মী টিসি/টিএস
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_ktcts_s = $total_school_karjokocom_bibag['p_ktcts_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_ktcts_u = $total_school_karjokocom_bibag['p_ktcts_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    বইমেলা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_bm_s = $total_school_karjokocom_bibag['owatimulokpogam_bm_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_bm_u = $total_school_karjokocom_bibag['owatimulokpogam_bm_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সাথী শব্বেদারী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_sathisdari_s = $total_school_karjokocom_bibag['p_sathisdari_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_sathisdari_u = $total_school_karjokocom_bibag['p_sathisdari_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    সাধারণ জ্ঞানের আসর
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_sgs_s = $total_school_karjokocom_bibag['owatimulokpogam_sgs_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_sga_u = $total_school_karjokocom_bibag['owatimulokpogam_sga_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    কর্মী শব্বেদারী
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    চা চক্র
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_chackro_s = $total_school_karjokocom_bibag['owatimulokpogam_chackro_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_chackro_u = $total_school_karjokocom_bibag['owatimulokpogam_chackro_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সর্মথক টিএস
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_sts_s = $total_school_karjokocom_bibag['p_sts_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_sts_u = $total_school_karjokocom_bibag['p_sts_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_onono_s = $total_school_karjokocom_bibag['owatimulokpogam_onono_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_onono_u = $total_school_karjokocom_bibag['owatimulokpogam_onono_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    একাডেমিক টিএস
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_ats_s = $total_school_karjokocom_bibag['p_ats_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_ats_u = $total_school_karjokocom_bibag['p_ats_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    উইন্টার ক্যাম্প
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_uk_s = $total_school_karjokocom_bibag['owatimulokpogam_uk_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $owatimulokpogam_uk_u = $total_school_karjokocom_bibag['owatimulokpogam_uk_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সামষ্টিক পাঠ
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_sp_s = $total_school_karjokocom_bibag['p_sp_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_sp_u = $total_school_karjokocom_bibag['p_sp_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky">

                                </td>
                                <td class="tg-0pky" rowspan="6">
                                    কর্মশালা
                                </td>
                                <td class="tg-0pky" >
                                    সাথী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_sathi_s = $total_school_karjokocom_bibag['ks_sathi_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_sathi_u = $total_school_karjokocom_bibag['ks_sathi_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    কোরআন তালিম
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_kt_s = $total_school_karjokocom_bibag['p_kt_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_kt_u= $total_school_karjokocom_bibag['p_kt_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    সাথী প্রার্থী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_sathip_s= $total_school_karjokocom_bibag['ks_sathip_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_sathip_u= $total_school_karjokocom_bibag['ks_sathip_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    আলোচনা চক্র
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_ackro_s = $total_school_karjokocom_bibag['p_ackro_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $p_ackro_u = $total_school_karjokocom_bibag['p_ackro_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    কর্মী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_kormi_S = $total_school_karjokocom_bibag['ks_kormi_S'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_kormi_u = $total_school_karjokocom_bibag['ks_kormi_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="7">ধর্মীয় ও সামাজিক কার্যক্রম </td>
                                <td class="tg-0pky" >
                                    গল্প শুনি
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_gs_s = $total_school_karjokocom_bibag['dsk_gs_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_gs_u = $total_school_karjokocom_bibag['dsk_gs_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    স্কুল কার্যক্রম সম্পাদক
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_sks_s = $total_school_karjokocom_bibag['ks_sks_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_sks_u = $total_school_karjokocom_bibag['ks_sks_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Health Camp
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_hc_s = $total_school_karjokocom_bibag['dsk_hc_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_hc_u = $total_school_karjokocom_bibag['dsk_hc_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    স্কুল সাথী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_ssathi_s = $total_school_karjokocom_bibag['ks_ssathi_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_ssathi_u = $total_school_karjokocom_bibag['ks_ssathi_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    পরিস্কার পরিচ্ছন্নতা অভিযান
                                </td>
                                <td class="tg-0pky" >
                                
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_ppo_s = $total_school_karjokocom_bibag['dsk_ppo_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_ppo_u = $total_school_karjokocom_bibag['dsk_ppo_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    স্কুল দায়িত্বশীল
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_sds_S = $total_school_karjokocom_bibag['ks_sds_S'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ks_sds_u = $total_school_karjokocom_bibag['ks_sds_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    শীতবস্ত্র বিতরণ
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_sbb_s = $total_school_karjokocom_bibag['dsk_sbb_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_sbb_u = $total_school_karjokocom_bibag['dsk_sbb_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" rowspan="15" >
                                    বিতরণ
                                </td>
                                <td class="tg-0pky" >
                                    কিশোর পত্রিকা বাংলা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_kpb_s = $total_school_karjokocom_bibag['b_kpb_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_kpb_u = $total_school_karjokocom_bibag['b_kpb_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    দিবস পালন
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_dp_s = $total_school_karjokocom_bibag['dsk_dp_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_dp_u = $total_school_karjokocom_bibag['dsk_dp_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    ছাত্রসংবাদ
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_ss_s = $total_school_karjokocom_bibag['b_ss_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_ss_u = $total_school_karjokocom_bibag['b_ss_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    বৃক্ষরোপণ অভিযান
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_bro_s = $total_school_karjokocom_bibag['dsk_bro_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dsk_bro_u = $total_school_karjokocom_bibag['dsk_bro_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    কিশোর পত্রিকা ইংরেজী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_kpe_s = $total_school_karjokocom_bibag['b_kpe_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_kpe_u = $total_school_karjokocom_bibag['b_kpe_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_onn_s = $total_school_karjokocom_bibag['b_onn_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_onn_u = $total_school_karjokocom_bibag['b_onn_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="8">ক্যারিয়ার ডিজাইন </td>
                                <td class="tg-0pky" >
                                    মেধার শীর্ষে যারা সেই মেধাবীদের সেরা কারা ?
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_msjm_s = $total_school_karjokocom_bibag['kd_msjm_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_msjm_u = $total_school_karjokocom_bibag['kd_msjm_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    স্টিকার/কার্ড
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_sk_s = $total_school_karjokocom_bibag['b_sk_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_sk_u = $total_school_karjokocom_bibag['b_sk_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Academic & Moral Development Programme
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_amd_s = $total_school_karjokocom_bibag['kd_amd_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_amd_u = $total_school_karjokocom_bibag['kd_amd_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    ক্লাস রুটিন
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_sr_s = $total_school_karjokocom_bibag['b_sr_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_sr_u = $total_school_karjokocom_bibag['b_sr_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Spoken English
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_se_s = $total_school_karjokocom_bibag['kd_se_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_se_u = $total_school_karjokocom_bibag['kd_se_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    দেয়ালিকা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_dlk_s = $total_school_karjokocom_bibag['b_dlk_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_dlk_u = $total_school_karjokocom_bibag['b_dlk_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Computer Course
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_cc_s = $total_school_karjokocom_bibag['kd_cc_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_cc_u = $total_school_karjokocom_bibag['kd_cc_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    ছড়া পাতা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_sp_s = $total_school_karjokocom_bibag['b_sp_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_sp_u = $total_school_karjokocom_bibag['b_sp_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Academic Exam.
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_kd_ae_scc_u = $total_school_karjokocom_bibag['kd_ae_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_ae_u = $total_school_karjokocom_bibag['kd_ae_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    পরীক্ষার রুটিন
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_pr_s = $total_school_karjokocom_bibag['b_pr_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_pr_u = $total_school_karjokocom_bibag['b_pr_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Career Guideline Programme
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_cgd_s = $total_school_karjokocom_bibag['kd_cgd_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_cgp_u = $total_school_karjokocom_bibag['kd_cgp_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    মাসিক/দ্বিমাসিক সাময়িকী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_m2ms_s = $total_school_karjokocom_bibag['b_m2ms_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_m2ms_u = $total_school_karjokocom_bibag['b_m2ms_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    দেশটাকে গড়তে চাই
                                    বেশি করে পড়ছি তাই
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_dgchaibkpt_s = $total_school_karjokocom_bibag['kd_dgchaibkpt_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_dgchaibkpt_u = $total_school_karjokocom_bibag['kd_dgchaibkpt_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    হাসির কাগজ (হাসবিনা দোস্ত)
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_hkhbnad_s = $total_school_karjokocom_bibag['b_hkhbnad_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_hkhbnad_u = $total_school_karjokocom_bibag['b_hkhbnad_u'] ?>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-0pky" >
                                    সুন্দর হাতের লিখা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_shl_s = $total_school_karjokocom_bibag['kd_shl_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kd_shl_u = $total_school_karjokocom_bibag['kd_shl_u'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    ফুলেল শুভেচ্ছা বাণী
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_fsb_s = $total_school_karjokocom_bibag['b_fsb_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_fsb_u = $total_school_karjokocom_bibag['b_fsb_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="5">যোগাযোগ</td>
                                <td class="tg-0pky" >
                                    ধরণ
                                </td>
                                <td class="tg-0pky" >
                                    সংখ্যা
                                </td>
                                <td class="tg-0pky" >
                                    কেন্দ্র থেকে
                                </td>
                                <td class="tg-0pky" >
                                    শাখা থেকে
                                </td>
                                <td class="tg-0pky" >
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky" >
                                    সংক্ষিপ্ত পরিচিতি
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_spt_s = $total_school_karjokocom_bibag['b_spt_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_spt_u = $total_school_karjokocom_bibag['b_spt_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সার্কুলার
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_sarkular_s = $total_school_karjokocom_bibag['jogaj_sarkular_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_sarkular_k = $total_school_karjokocom_bibag['jogaj_sarkular_k'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_sarkular_saka_ = $total_school_karjokocom_bibag['jogaj_sarkular_saka_'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_sarkular_onn = $total_school_karjokocom_bibag['jogaj_sarkular_onn'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    সাহিত্য
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_s_s = $total_school_karjokocom_bibag['b_s_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $b_s_u = $total_school_karjokocom_bibag['b_s_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    চিঠি
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_chithi_s = $total_school_karjokocom_bibag['jogaj_chithi_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_chithi_k = $total_school_karjokocom_bibag['jogaj_chithi_k'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_chithi_saka = $total_school_karjokocom_bibag['jogaj_chithi_saka'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_chithi_onn = $total_school_karjokocom_bibag['jogaj_chithi_onn'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    ই-মেইল
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" rowspan="5">
                                    স্পোর্টস
                                </td>
                                <td class="tg-0pky">
                                    ক্রিকেট
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_kt_s = $total_school_karjokocom_bibag['spt_kt_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_kt_u = $total_school_karjokocom_bibag['spt_kt_u'] ?>
                                </td>

                            </tr>



                            <tr>
                                <td class="tg-0pky" >
                                    SMS
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_sms_s = $total_school_karjokocom_bibag['jogaj_sms_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_sms_k = $total_school_karjokocom_bibag['jogaj_sms_k'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_sms_saka = $total_school_karjokocom_bibag['jogaj_sms_saka'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jogaj_sms_onn = $total_school_karjokocom_bibag['jogaj_sms_onn'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    ফুটবল
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_fb_s = $total_school_karjokocom_bibag['spt_fb_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_fb_u = $total_school_karjokocom_bibag['spt_fb_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="3">সফর</td>
                                <td class="tg-0pky" >
                                    কোথা থেকে
                                </td>
                                <td class="tg-0pky" >
                                    কতবার
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    ভলিবল
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_bb_s = $total_school_karjokocom_bibag['spt_bb_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_bb_u = $total_school_karjokocom_bibag['spt_bb_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    কেন্দ্র
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sofor_k_kotobar = $total_school_karjokocom_bibag['sofor_k_kotobar'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    ব্যাডমিন্টন
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_bmtn_s = $total_school_karjokocom_bibag['spt_bmtn_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_bmtn_u = $total_school_karjokocom_bibag['spt_bmtn_u'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    শাখা
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sofor_saka_kotobar = $total_school_karjokocom_bibag['sofor_saka_kotobar'] ?>
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_onn_s = $total_school_karjokocom_bibag['spt_onn_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $spt_spt_onn_uonn_s = $total_school_karjokocom_bibag['spt_onn_u'] ?>
                                </td>
                            </tr>








                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
 
