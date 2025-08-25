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
            
<!-- ====== Report serial code ======= --> 
<?php 
// This function renders a department report form with serial number information
// based on the branch, report, department, and user roles provided.
render_dept_report_serial_form($branch_id, $report_info, $department_id, $serial_info, $this->Owner, $this->Admin, $this->departmentuser); 
?>
<!-- ====== /. Report serial code ===== -->
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

                    <?php
                    $pk = (isset($school_karjokocom_bibag['id']))?$school_karjokocom_bibag['id']:'';
                    ?>

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
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bothok_sathib_sonka" data-title="Enter"><?php echo $bothok_sathib_sonka=  (isset( $school_karjokocom_bibag['bothok_sathib_sonka']))? $school_karjokocom_bibag['bothok_sathib_sonka']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bothok_sathib_u" data-title="Enter"><?php echo $bothok_sathib_u=  (isset( $school_karjokocom_bibag['bothok_sathib_u']))? $school_karjokocom_bibag['bothok_sathib_u']:'' ?></a>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-0pky">সদস্য</td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sodoso_ps" data-title="Enter"><?php echo $jonosokti_sodoso_ps=  (isset( $school_karjokocom_bibag['jonosokti_sodoso_ps']))? $school_karjokocom_bibag['jonosokti_sodoso_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sodoso_bs" data-title="Enter"><?php echo $jonosokti_sodoso_bs=  (isset( $school_karjokocom_bibag['jonosokti_sodoso_bs']))? $school_karjokocom_bibag['jonosokti_sodoso_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sodoso_ag" data-title="Enter"><?php echo $jonosokti_sodoso_ag=  (isset( $school_karjokocom_bibag['jonosokti_sodoso_ag']))? $school_karjokocom_bibag['jonosokti_sodoso_ag']:'' ?>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sodoso_mu" data-title="Enter"><?php echo $jonosokti_sodoso_mu=  (isset( $school_karjokocom_bibag['jonosokti_sodoso_mu']))? $school_karjokocom_bibag['jonosokti_sodoso_mu']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    সাথী প্রার্থী বৈঠক
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bothok_sathipb_sonka" data-title="Enter"><?php echo $bothok_sathipb_sonka=  (isset( $school_karjokocom_bibag['bothok_sathipb_sonka']))? $school_karjokocom_bibag['bothok_sathipb_sonka']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bothok_sathipb_u" data-title="Enter"><?php echo $bothok_sathipb_u=  (isset( $school_karjokocom_bibag['bothok_sathipb_u']))? $school_karjokocom_bibag['bothok_sathipb_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">সদস্য প্রার্থী</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sodosop_ps" data-title="Enter"><?php echo $jonosokti_sodosop_ps=  (isset( $school_karjokocom_bibag['jonosokti_sodosop_ps']))? $school_karjokocom_bibag['jonosokti_sodosop_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sodosop_bs" data-title="Enter"><?php echo $jonosokti_sodosop_bs=  (isset( $school_karjokocom_bibag['jonosokti_sodosop_bs']))? $school_karjokocom_bibag['jonosokti_sodosop_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sodosop_ag" data-title="Enter"><?php echo $jonosokti_sodosop_ag=  (isset( $school_karjokocom_bibag['jonosokti_sodosop_ag']))? $school_karjokocom_bibag['jonosokti_sodosop_ag']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sodosop_mu" data-title="Enter"><?php echo $jonosokti_sodosop_mu=  (isset( $school_karjokocom_bibag['jonosokti_sodosop_mu']))? $school_karjokocom_bibag['jonosokti_sodosop_mu']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    কর্মী বৈঠক
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bothok_kb_sonka" data-title="Enter"><?php echo $bothok_kb_sonka=  (isset( $school_karjokocom_bibag['bothok_kb_sonka']))? $school_karjokocom_bibag['bothok_kb_sonka']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bothok_kb_u" data-title="Enter"><?php echo $bothok_kb_u=  (isset( $school_karjokocom_bibag['bothok_kb_u']))? $school_karjokocom_bibag['bothok_kb_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">সাথী</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sathi_ps" data-title="Enter"><?php echo $jonosokti_sathi_ps=  (isset( $school_karjokocom_bibag['jonosokti_sathi_ps']))? $school_karjokocom_bibag['jonosokti_sathi_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sathi_bs" data-title="Enter"><?php echo $jonosokti_sathi_bs=  (isset( $school_karjokocom_bibag['jonosokti_sathi_bs']))? $school_karjokocom_bibag['jonosokti_sathi_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sathi_ag" data-title="Enter"><?php echo $jonosokti_sathi_ag=  (isset( $school_karjokocom_bibag['jonosokti_sathi_ag']))? $school_karjokocom_bibag['jonosokti_sathi_ag']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sathi_mu" data-title="Enter"><?php echo $jonosokti_sathi_mu=  (isset( $school_karjokocom_bibag['jonosokti_sathi_mu']))? $school_karjokocom_bibag['jonosokti_sathi_mu']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    স্কুল প্রতিনিধি বেঠক
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bothok_spb_sonka" data-title="Enter"><?php echo $bothok_spb_sonka=  (isset( $school_karjokocom_bibag['bothok_spb_sonka']))? $school_karjokocom_bibag['bothok_spb_sonka']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bothok__spb_u" data-title="Enter"><?php echo $bothok__spb_u=  (isset( $school_karjokocom_bibag['bothok__spb_u']))? $school_karjokocom_bibag['bothok__spb_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky"> সাথী প্রার্থী</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sathip_ps" data-title="Enter"><?php echo $jonosokti_sathip_ps=  (isset( $school_karjokocom_bibag['jonosokti_sathip_ps']))? $school_karjokocom_bibag['jonosokti_sathip_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_ssathip_bs" data-title="Enter"><?php echo $jonosokti_ssathip_bs=  (isset( $school_karjokocom_bibag['jonosokti_ssathip_bs']))? $school_karjokocom_bibag['jonosokti_ssathip_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sathip_ag" data-title="Enter"><?php echo $jonosokti_sathip_ag=  (isset( $school_karjokocom_bibag['jonosokti_sathip_ag']))? $school_karjokocom_bibag['jonosokti_sathip_ag']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_sathip_mu" data-title="Enter"><?php echo $jonosokti_sathip_mu=  (isset( $school_karjokocom_bibag['jonosokti_sathip_mu']))? $school_karjokocom_bibag['jonosokti_sathip_mu']:'' ?></a>
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
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_k_ps" data-title="Enter"><?php echo $jonosokti_k_ps=  (isset( $school_karjokocom_bibag['jonosokti_k_ps']))? $school_karjokocom_bibag['jonosokti_k_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_k_bs" data-title="Enter"><?php echo $jonosokti_k_bs=  (isset( $school_karjokocom_bibag['jonosokti_k_bs']))? $school_karjokocom_bibag['jonosokti_k_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_k_ag" data-title="Enter"><?php echo $jonosokti_k_ag=  (isset( $school_karjokocom_bibag['jonosokti_k_ag']))? $school_karjokocom_bibag['jonosokti_k_ag']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonosokti_k_mu" data-title="Enter"><?php echo $jonosokti_k_mu=  (isset( $school_karjokocom_bibag['jonosokti_k_mu']))? $school_karjokocom_bibag['jonosokti_k_mu']:'' ?></a>
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
                                   <b>প্রোগ্রামের ধরণ</b>
                                </td>
                                <td class="tg-0pky">

                                </td>
                                <td class="tg-0pky">

                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">সমর্থক</td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dawat_somthok_ps" data-title="Enter"><?php echo $dawat_somthok_ps=  (isset( $school_karjokocom_bibag['dawat_somthok_ps']))? $school_karjokocom_bibag['dawat_somthok_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dawat_somthok_bs" data-title="Enter"><?php echo $dawat_somthok_bs=  (isset( $school_karjokocom_bibag['dawat_somthok_bs']))? $school_karjokocom_bibag['dawat_somthok_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dawat_somthok_b" data-title="Enter"><?php echo $dawat_somthok_b=  (isset( $school_karjokocom_bibag['dawat_somthok_b']))? $school_karjokocom_bibag['dawat_somthok_b']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_somthok_g" data-title="Enter"><?php echo $datwat_somthok_g=  (isset( $school_karjokocom_bibag['datwat_somthok_g']))? $school_karjokocom_bibag['datwat_somthok_g']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    শ্রেণী প্রতিনিধি অভিষেক
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_spo_s" data-title="Enter"><?php echo $owatimulokpogam_spo_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_spo_s']))? $school_karjokocom_bibag['owatimulokpogam_spo_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_spo_u" data-title="Enter"><?php echo $owatimulokpogam_spo_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_spo_u']))? $school_karjokocom_bibag['owatimulokpogam_spo_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">বন্ধু</td>

                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_bondu_ps" data-title="Enter"><?php echo $datwat_bondu_ps=  (isset( $school_karjokocom_bibag['datwat_bondu_ps']))? $school_karjokocom_bibag['datwat_bondu_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dawat_bondu_bs" data-title="Enter"><?php echo $dawat_bondu_bs=  (isset( $school_karjokocom_bibag['dawat_bondu_bs']))? $school_karjokocom_bibag['dawat_bondu_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_bondu_b" data-title="Enter"><?php echo $datwat_bondu_b=  (isset( $school_karjokocom_bibag['datwat_bondu_b']))? $school_karjokocom_bibag['datwat_bondu_b']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_bondu_g" data-title="Enter"><?php echo $datwat_bondu_g=  (isset( $school_karjokocom_bibag['datwat_bondu_g']))? $school_karjokocom_bibag['datwat_bondu_g']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    মেধা যাচাই
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_mj_s" data-title="Enter"><?php echo $owatimulokpogam_mj_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_mj_s']))? $school_karjokocom_bibag['owatimulokpogam_mj_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_mj_u" data-title="Enter"><?php echo $owatimulokpogam_mj_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_mj_u']))? $school_karjokocom_bibag['owatimulokpogam_mj_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">অমুসলিম সমর্থক</td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_osomthok_ps" data-title="Enter"><?php echo $datwat_osomthok_ps=  (isset( $school_karjokocom_bibag['datwat_osomthok_ps']))? $school_karjokocom_bibag['datwat_osomthok_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_osomthok_bs" data-title="Enter"><?php echo $datwat_osomthok_bs=  (isset( $school_karjokocom_bibag['datwat_osomthok_bs']))? $school_karjokocom_bibag['datwat_osomthok_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_osomthok_b" data-title="Enter"><?php echo $datwat_osomthok_b=  (isset( $school_karjokocom_bibag['datwat_osomthok_b']))? $school_karjokocom_bibag['datwat_osomthok_b']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_osomthok_g" data-title="Enter"><?php echo $datwat_osomthok_g=  (isset( $school_karjokocom_bibag['datwat_osomthok_g']))? $school_karjokocom_bibag['datwat_osomthok_g']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    প্রতিযোগিতা
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_potijogita_s" data-title="Enter"><?php echo $owatimulokpogam_potijogita_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_potijogita_s']))? $school_karjokocom_bibag['owatimulokpogam_potijogita_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_potijogita_u" data-title="Enter"><?php echo $owatimulokpogam_potijogita_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_potijogita_u']))? $school_karjokocom_bibag['owatimulokpogam_potijogita_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">অমুসলিম বন্ধু</td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_obondu_ps" data-title="Enter"><?php echo $datwat_obondu_ps=  (isset( $school_karjokocom_bibag['datwat_obondu_ps']))? $school_karjokocom_bibag['datwat_obondu_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_obondu_bs" data-title="Enter"><?php echo $datwat_obondu_bs=  (isset( $school_karjokocom_bibag['datwat_obondu_bs']))? $school_karjokocom_bibag['datwat_obondu_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_obondu_b" data-title="Enter"><?php echo $datwat_obondu_b=  (isset( $school_karjokocom_bibag['datwat_obondu_b']))? $school_karjokocom_bibag['datwat_obondu_b']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_obonbu_g" data-title="Enter"><?php echo $datwat_obonbu_g=  (isset( $school_karjokocom_bibag['datwat_obonbu_g']))? $school_karjokocom_bibag['datwat_obonbu_g']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    শিক্ষা সফর
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_shikasofor_s" data-title="Enter"><?php echo $owatimulokpogam_shikasofor_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_shikasofor_s']))? $school_karjokocom_bibag['owatimulokpogam_shikasofor_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_shikasofor_u" data-title="Enter"><?php echo $owatimulokpogam_shikasofor_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_shikasofor_u']))? $school_karjokocom_bibag['owatimulokpogam_shikasofor_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky">শুভাকাঙ্খী </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_subuk_ps" data-title="Enter"><?php echo $datwat_subuk_ps=  (isset( $school_karjokocom_bibag['datwat_subuk_ps']))? $school_karjokocom_bibag['datwat_subuk_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_subuk_bs" data-title="Enter"><?php echo $datwat_subuk_bs=  (isset( $school_karjokocom_bibag['datwat_subuk_bs']))? $school_karjokocom_bibag['datwat_subuk_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_subuk_b" data-title="Enter"><?php echo $datwat_subuk_b=  (isset( $school_karjokocom_bibag['datwat_subuk_b']))? $school_karjokocom_bibag['datwat_subuk_b']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="datwat_subuk_g" data-title="Enter"><?php echo $datwat_subuk_g=  (isset( $school_karjokocom_bibag['datwat_subuk_g']))? $school_karjokocom_bibag['datwat_subuk_g']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    সংগীত, উপস্থাপনা
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_su_s" data-title="Enter"><?php echo $owatimulokpogam_su_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_su_s']))? $school_karjokocom_bibag['owatimulokpogam_su_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_su_U" data-title="Enter"><?php echo $owatimulokpogam_su_U=  (isset( $school_karjokocom_bibag['owatimulokpogam_su_U']))? $school_karjokocom_bibag['owatimulokpogam_su_U']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="2">সংগঠন </td>
                                <td class="tg-0pky" >
                                    উপশাখা
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="songothon_uposaka_ps" data-title="Enter"><?php echo $songothon_uposaka_ps=  (isset( $school_karjokocom_bibag['songothon_uposaka_ps']))? $school_karjokocom_bibag['songothon_uposaka_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="songothon_uposaka_bs" data-title="Enter"><?php echo $songothon_uposaka_bs=  (isset( $school_karjokocom_bibag['songothon_uposaka_bs']))? $school_karjokocom_bibag['songothon_uposaka_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="songothon_uposaka_b" data-title="Enter"><?php echo $songothon_uposaka_b=  (isset( $school_karjokocom_bibag['songothon_uposaka_b']))? $school_karjokocom_bibag['songothon_uposaka_b']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="songothon_uposaka_g" data-title="Enter"><?php echo $songothon_uposaka_g=  (isset( $school_karjokocom_bibag['songothon_uposaka_g']))? $school_karjokocom_bibag['songothon_uposaka_g']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    চিত্র প্রদর্শনী
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_chtop_s" data-title="Enter"><?php echo $owatimulokpogam_chtop_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_chtop_s']))? $school_karjokocom_bibag['owatimulokpogam_chtop_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_chtop_u" data-title="Enter"><?php echo $owatimulokpogam_chtop_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_chtop_u']))? $school_karjokocom_bibag['owatimulokpogam_chtop_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সমর্থক সংগঠন
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="songothon_somothoks_ps" data-title="Enter"><?php echo $songothon_somothoks_ps=  (isset( $school_karjokocom_bibag['songothon_somothoks_ps']))? $school_karjokocom_bibag['songothon_somothoks_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="songothon_somothks_bs" data-title="Enter"><?php echo $songothon_somothks_bs=  (isset( $school_karjokocom_bibag['songothon_somothks_bs']))? $school_karjokocom_bibag['songothon_somothks_bs']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="songothon_somothoks_b" data-title="Enter"><?php echo $songothon_somothoks_b=  (isset( $school_karjokocom_bibag['songothon_somothoks_b']))? $school_karjokocom_bibag['songothon_somothoks_b']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="songothon_somothoks_g" data-title="Enter"><?php echo $songothon_somothoks_g=  (isset( $school_karjokocom_bibag['songothon_somothoks_g']))? $school_karjokocom_bibag['songothon_somothoks_g']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    বিজ্ঞানী ও মনীষীদের জীবনী আলোকপাত
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_bmjap_s" data-title="Enter"><?php echo $owatimulokpogam_bmjap_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_bmjap_s']))? $school_karjokocom_bibag['owatimulokpogam_bmjap_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_bmjap_u" data-title="Enter"><?php echo $owatimulokpogam_bmjap_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_bmjap_u']))? $school_karjokocom_bibag['owatimulokpogam_bmjap_u']:'' ?></a>
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
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_sk_s" data-title="Enter"><?php echo $owatimulokpogam_sk_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_sk_s']))? $school_karjokocom_bibag['owatimulokpogam_sk_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_sk_u" data-title="Enter"><?php echo $owatimulokpogam_sk_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_sk_u']))? $school_karjokocom_bibag['owatimulokpogam_sk_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সাথী টিসি/টিএস
                                </td>
                                <td class="tg-0pky" >

                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_sathitcts_s" data-title="Enter"><?php echo $p_sathitcts_s=  (isset( $school_karjokocom_bibag['p_sathitcts_s']))? $school_karjokocom_bibag['p_sathitcts_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_sathitcts_u" data-title="Enter"><?php echo $p_sathitcts_u=  (isset( $school_karjokocom_bibag['p_sathitcts_u']))? $school_karjokocom_bibag['p_sathitcts_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($p_sathitcts_s!=0)?$p_sathitcts_u/$p_sathitcts_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    আবৃত্তি/ছড়া
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_as_s" data-title="Enter"><?php echo $owatimulokpogam_as_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_as_s']))? $school_karjokocom_bibag['owatimulokpogam_as_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_as_u" data-title="Enter"><?php echo $owatimulokpogam_as_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_as_u']))? $school_karjokocom_bibag['owatimulokpogam_as_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    কর্মী টিসি/টিএস
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_ktcts_s" data-title="Enter"><?php echo $p_ktcts_s=  (isset( $school_karjokocom_bibag['p_ktcts_s']))? $school_karjokocom_bibag['p_ktcts_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_ktcts_u" data-title="Enter"><?php echo $p_ktcts_u=  (isset( $school_karjokocom_bibag['p_ktcts_u']))? $school_karjokocom_bibag['p_ktcts_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($p_ktcts_s!=0)?$p_ktcts_u/$p_ktcts_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    বইমেলা
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_bm_s" data-title="Enter"><?php echo $owatimulokpogam_bm_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_bm_s']))? $school_karjokocom_bibag['p_sathisdari_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_bm_u" data-title="Enter"><?php echo $owatimulokpogam_bm_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_bm_u']))? $school_karjokocom_bibag['owatimulokpogam_bm_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সাথী শব্বেদারী
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_sathisdari_s" data-title="Enter"><?php echo $p_sathisdari_s=  (isset( $school_karjokocom_bibag['p_sathisdari_s']))? $school_karjokocom_bibag['p_sathisdari_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_sathisdari_u" data-title="Enter"><?php echo $p_sathisdari_u=  (isset( $school_karjokocom_bibag['p_sathisdari_u']))? $school_karjokocom_bibag['p_sathisdari_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($p_sathisdari_s!=0)?$p_sathisdari_u/$p_sathisdari_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    সাধারণ জ্ঞানের আসর
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_sgs_s" data-title="Enter"><?php echo $owatimulokpogam_sgs_s=  (isset( $school_karjokocom_bibag['owatimulokpogam_sgs_s']))? $school_karjokocom_bibag['owatimulokpogam_sgs_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_sga_u" data-title="Enter"><?php echo $owatimulokpogam_sga_u=  (isset( $school_karjokocom_bibag['owatimulokpogam_sga_u']))? $school_karjokocom_bibag['owatimulokpogam_sga_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    কর্মী শব্বেদারী
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_kormisdari_s" data-title="Enter"><?php echo $p_kormisdari_s=  (isset( $school_karjokocom_bibag['p_kormisdari_s']))? $school_karjokocom_bibag['p_kormisdari_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_kormisdari_u" data-title="Enter"><?php echo $p_kormisdari_u=  (isset( $school_karjokocom_bibag['p_kormisdari_u']))? $school_karjokocom_bibag['p_kormisdari_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($p_kormisdari_s!=0)?$p_kormisdari_u/$p_kormisdari_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    চা চক্র
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_chackro_s" data-title="Enter"><?php echo $jonosokti_sathip_mu=  (isset( $school_karjokocom_bibag['owatimulokpogam_chackro_s']))? $school_karjokocom_bibag['owatimulokpogam_chackro_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_chackro_u" data-title="Enter"><?php echo $jonosokti_sathip_mu=  (isset( $school_karjokocom_bibag['owatimulokpogam_chackro_u']))? $school_karjokocom_bibag['owatimulokpogam_chackro_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সর্মথক টিএস
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_sts_s" data-title="Enter"><?php echo $p_sts_s=  (isset( $school_karjokocom_bibag['p_sts_s']))? $school_karjokocom_bibag['p_sts_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_sts_u" data-title="Enter"><?php echo $p_sts_u=  (isset( $school_karjokocom_bibag['p_sts_u']))? $school_karjokocom_bibag['p_sts_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($p_sts_s!=0)?$p_sts_u/$p_sts_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_onono_s" data-title="Enter"><?php echo $jonosokti_sathip_mu=  (isset( $school_karjokocom_bibag['owatimulokpogam_onono_s']))? $school_karjokocom_bibag['owatimulokpogam_onono_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_onono_u" data-title="Enter"><?php echo $jonosokti_sathip_mu=  (isset( $school_karjokocom_bibag['owatimulokpogam_onono_u']))? $school_karjokocom_bibag['owatimulokpogam_onono_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    একাডেমিক টিএস
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_ats_s" data-title="Enter"><?php echo $p_ats_s=  (isset( $school_karjokocom_bibag['p_ats_s']))? $school_karjokocom_bibag['p_ats_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_ats_u" data-title="Enter"><?php echo $p_ats_u=  (isset( $school_karjokocom_bibag['p_ats_u']))? $school_karjokocom_bibag['p_ats_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($p_ats_s!=0)?$p_ats_u/$p_ats_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    উইন্টার ক্যাম্প
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_uk_s" data-title="Enter"><?php echo $jonosokti_sathip_mu=  (isset( $school_karjokocom_bibag['owatimulokpogam_uk_s']))? $school_karjokocom_bibag['owatimulokpogam_uk_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="owatimulokpogam_uk_u" data-title="Enter"><?php echo $jonosokti_sathip_mu=  (isset( $school_karjokocom_bibag['owatimulokpogam_uk_u']))? $school_karjokocom_bibag['owatimulokpogam_uk_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সামষ্টিক পাঠ
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_sp_s" data-title="Enter"><?php echo $p_sp_s=  (isset( $school_karjokocom_bibag['p_sp_s']))? $school_karjokocom_bibag['p_sp_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_sp_u" data-title="Enter"><?php echo $p_sp_u=  (isset( $school_karjokocom_bibag['p_sp_u']))? $school_karjokocom_bibag['p_sp_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo number_format(($p_sp_s!=0)?$p_sp_u/$p_sp_s:0,2)?>
                                </td>
                                <td class="tg-0pky" rowspan="6">
                                    কর্মশালা
                                </td>
                                <td class="tg-0pky" >
                                    সাথী
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_sathi_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['ks_sathi_s']))? $school_karjokocom_bibag['ks_sathi_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_sathi_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['ks_sathi_u']))? $school_karjokocom_bibag['ks_sathi_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    কোরআন তালিম
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_kt_s" data-title="Enter"><?php echo $p_kt_s=  (isset( $school_karjokocom_bibag['p_kt_s']))? $school_karjokocom_bibag['p_kt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_kt_u" data-title="Enter"><?php echo $p_kt_u=  (isset( $school_karjokocom_bibag['p_kt_u']))? $school_karjokocom_bibag['p_kt_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($p_kt_s!=0)?$p_kt_u/$p_kt_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    সাথী প্রার্থী
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_sathip_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['ks_sathip_s']))? $school_karjokocom_bibag['ks_sathip_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_sathip_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['ks_sathip_u']))? $school_karjokocom_bibag['ks_sathip_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    আলোচনা চক্র
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_ackro_s" data-title="Enter"><?php echo $p_ackro_s=  (isset( $school_karjokocom_bibag['p_ackro_s']))? $school_karjokocom_bibag['p_ackro_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="p_ackro_u" data-title="Enter"><?php echo $p_ackro_u=  (isset( $school_karjokocom_bibag['p_ackro_u']))? $school_karjokocom_bibag['p_ackro_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($p_ackro_s!=0)?$p_ackro_u/$p_ackro_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    কর্মী
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_kormi_S" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['ks_kormi_S']))? $school_karjokocom_bibag['ks_kormi_S']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_kormi_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['ks_kormi_u']))? $school_karjokocom_bibag['ks_kormi_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="7">ধর্মীয় ও সামাজিক কার্যক্রম </td>
                                <td class="tg-0pky" >
                                    গল্প শুনি
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_gs_s" data-title="Enter"><?php echo $dsk_gs_s=  (isset( $school_karjokocom_bibag['dsk_gs_s']))? $school_karjokocom_bibag['dsk_gs_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_gs_u" data-title="Enter"><?php echo $dsk_gs_u=  (isset( $school_karjokocom_bibag['dsk_gs_u']))? $school_karjokocom_bibag['dsk_gs_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($dsk_gs_s!=0)?$dsk_gs_u/$dsk_gs_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    স্কুল কার্যক্রম সম্পাদক
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_sks_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['ks_sks_s']))? $school_karjokocom_bibag['ks_sks_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_sks_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['ks_sks_u']))? $school_karjokocom_bibag['ks_sks_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Health Camp
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_hc_s" data-title="Enter"><?php echo $dsk_hc_s=  (isset( $school_karjokocom_bibag['dsk_hc_s']))? $school_karjokocom_bibag['dsk_hc_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_hc_u" data-title="Enter"><?php echo $dsk_hc_u=  (isset( $school_karjokocom_bibag['dsk_hc_u']))? $school_karjokocom_bibag['dsk_hc_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($dsk_hc_s!=0)?$dsk_hc_u/$dsk_hc_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    স্কুল সাথী
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_ssathi_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['ks_ssathi_s']))? $school_karjokocom_bibag['ks_ssathi_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_ssathi_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['ks_ssathi_u']))? $school_karjokocom_bibag['ks_ssathi_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    পরিস্কার পরিচ্ছন্নতা অভিযান
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_ppo_s" data-title="Enter"><?php echo $dsk_ppo_s=  (isset( $school_karjokocom_bibag['dsk_ppo_s']))? $school_karjokocom_bibag['dsk_ppo_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_ppo_u" data-title="Enter"><?php echo $dsk_ppo_u=  (isset( $school_karjokocom_bibag['dsk_ppo_u']))? $school_karjokocom_bibag['dsk_ppo_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($dsk_ppo_s!=0)?$dsk_ppo_u/$dsk_ppo_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    স্কুল দায়িত্বশীল
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_ssathi_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['ks_ssathi_u']))? $school_karjokocom_bibag['ks_ssathi_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ks_sds_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['ks_sds_u']))? $school_karjokocom_bibag['ks_sds_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    শীতবস্ত্র বিতরণ
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_sbb_s" data-title="Enter"><?php echo $dsk_sbb_s=  (isset( $school_karjokocom_bibag['dsk_sbb_s']))? $school_karjokocom_bibag['dsk_sbb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_sbb_u" data-title="Enter"><?php echo $dsk_sbb_u=  (isset( $school_karjokocom_bibag['dsk_sbb_u']))? $school_karjokocom_bibag['dsk_sbb_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($dsk_sbb_s!=0)?$dsk_sbb_u/$dsk_sbb_s:0,2)?>
                                </td>
                                <td class="tg-0pky" rowspan="15" >
                                    বিতরণ
                                </td>
                                <td class="tg-0pky" >
                                    কিশোর পত্রিকা বাংলা
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_kpb_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_kpb_s']))? $school_karjokocom_bibag['b_kpb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_kpb_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_kpb_u']))? $school_karjokocom_bibag['b_kpb_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    দিবস পালন
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_dp_s" data-title="Enter"><?php echo $dsk_dp_s=  (isset( $school_karjokocom_bibag['dsk_dp_s']))? $school_karjokocom_bibag['dsk_dp_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_dp_u" data-title="Enter"><?php echo $dsk_dp_u=  (isset( $school_karjokocom_bibag['dsk_dp_u']))? $school_karjokocom_bibag['dsk_dp_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($dsk_dp_s!=0)?$dsk_dp_u/$dsk_dp_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    ছাত্রসংবাদ
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_ss_s" data-title="Enter"><?php echo (isset( $school_karjokocom_bibag['b_ss_s']))? $school_karjokocom_bibag['b_ss_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_ss_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_ss_u']))? $school_karjokocom_bibag['b_ss_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    বৃক্ষরোপণ অভিযান
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_bro_s" data-title="Enter"><?php echo $dsk_bro_s=  (isset( $school_karjokocom_bibag['dsk_bro_s']))? $school_karjokocom_bibag['dsk_bro_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_bro_u" data-title="Enter"><?php echo $dsk_bro_u=  (isset( $school_karjokocom_bibag['dsk_bro_u']))? $school_karjokocom_bibag['dsk_bro_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($dsk_bro_s!=0)?$dsk_bro_u/$dsk_bro_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    কিশোর পত্রিকা ইংরেজী
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_kpe_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_kpe_s']))? $school_karjokocom_bibag['b_kpe_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_kpe_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_kpe_u']))? $school_karjokocom_bibag['b_kpe_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_onnono_s" data-title="Enter"><?php echo $dsk_onnono_s=  (isset( $school_karjokocom_bibag['dsk_onnono_s']))? $school_karjokocom_bibag['dsk_onnono_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_onnono_u" data-title="Enter"><?php echo $dsk_onnono_u=  (isset( $school_karjokocom_bibag['dsk_onnono_u']))? $school_karjokocom_bibag['dsk_onnono_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($dsk_onnono_s!=0)?$dsk_onnono_u/$dsk_onnono_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
--------
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_jfbhthrri_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_jfbhthrri_s']))? $school_karjokocom_bibag['b_jfbhthrri_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_jfbhthrri_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_jfbhthrri_u']))? $school_karjokocom_bibag['b_jfbhthrri_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan="8">ক্যারিয়ার ডিজাইন </td>
                                <td class="tg-0pky" >
                                    মেধার শীর্ষে যারা সেই মেধাবীদের সেরা কারা ?
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_msjm_s" data-title="Enter"><?php echo $kd_msjm_s=  (isset( $school_karjokocom_bibag['kd_msjm_s']))? $school_karjokocom_bibag['kd_msjm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_msjm_u" data-title="Enter"><?php echo $kd_msjm_u=  (isset( $school_karjokocom_bibag['kd_msjm_u']))? $school_karjokocom_bibag['kd_msjm_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($kd_msjm_s!=0)?$kd_msjm_u/$kd_msjm_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    স্টিকার/কার্ড
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_sk_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_sk_s']))? $school_karjokocom_bibag['b_sk_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_sk_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_sk_u']))? $school_karjokocom_bibag['b_sk_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Academic & Moral Development Programme
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_amd_s" data-title="Enter"><?php echo $kd_amd_s=  (isset( $school_karjokocom_bibag['kd_amd_s']))? $school_karjokocom_bibag['kd_amd_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_amd_u" data-title="Enter"><?php echo $kd_amd_u=  (isset( $school_karjokocom_bibag['kd_amd_u']))? $school_karjokocom_bibag['kd_amd_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($kd_amd_s!=0)?$kd_amd_u/$kd_amd_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    ক্লাস রুটিন
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_sr_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_sr_s']))? $school_karjokocom_bibag['b_sr_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_sr_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_sr_u']))? $school_karjokocom_bibag['b_sr_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Spoken English
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_se_s" data-title="Enter"><?php echo $kd_se_s=  (isset( $school_karjokocom_bibag['kd_se_s']))? $school_karjokocom_bibag['kd_se_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_se_u" data-title="Enter"><?php echo $kd_se_u=  (isset( $school_karjokocom_bibag['kd_se_u']))? $school_karjokocom_bibag['kd_se_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($kd_se_s!=0)?$kd_se_u/$kd_se_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    দেয়ালিকা
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_dlk_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_dlk_s']))? $school_karjokocom_bibag['b_dlk_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_dlk_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_dlk_u']))? $school_karjokocom_bibag['b_dlk_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Computer Course
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_cc_s" data-title="Enter"><?php echo $kd_cc_s=  (isset( $school_karjokocom_bibag['kd_cc_s']))? $school_karjokocom_bibag['kd_cc_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_cc_u" data-title="Enter"><?php echo $kd_cc_u=  (isset( $school_karjokocom_bibag['kd_cc_u']))? $school_karjokocom_bibag['kd_cc_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($kd_cc_s!=0)?$kd_cc_u/$kd_cc_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    ছড়া পাতা
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_sp_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_sp_s']))? $school_karjokocom_bibag['b_sp_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_sp_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_sp_u']))? $school_karjokocom_bibag['b_sp_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Academic Exam.
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_ae_s" data-title="Enter"><?php echo $kd_ae_s=  (isset( $school_karjokocom_bibag['kd_ae_s']))? $school_karjokocom_bibag['kd_ae_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_ae_u" data-title="Enter"><?php echo $kd_ae_u=  (isset( $school_karjokocom_bibag['kd_ae_u']))? $school_karjokocom_bibag['kd_ae_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($kd_ae_s!=0)?$kd_ae_u/$kd_ae_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    পরীক্ষার রুটিন
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_pr_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_pr_s']))? $school_karjokocom_bibag['b_pr_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_pr_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_pr_u']))? $school_karjokocom_bibag['b_pr_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    Career Guideline Programme
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_cgd_s" data-title="Enter"><?php echo $kd_cgd_s=  (isset( $school_karjokocom_bibag['kd_cgd_s']))? $school_karjokocom_bibag['kd_cgd_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_cgp_u" data-title="Enter"><?php echo $kd_cgp_u=  (isset( $school_karjokocom_bibag['kd_cgp_u']))? $school_karjokocom_bibag['kd_cgp_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($kd_cgd_s!=0)?$kd_cgp_u/$kd_cgd_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    মাসিক/দ্বিমাসিক সাময়িকী
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_m2ms_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_m2ms_s']))? $school_karjokocom_bibag['b_m2ms_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_m2ms_u" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_m2ms_u']))? $school_karjokocom_bibag['b_m2ms_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    দেশটাকে গড়তে চাই
                                    বেশি করে পড়ছি তাই
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_dgchaibkpt_s" data-title="Enter"><?php echo $kd_dgchaibkpt_s=  (isset( $school_karjokocom_bibag['kd_dgchaibkpt_s']))? $school_karjokocom_bibag['kd_dgchaibkpt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_dgchaibkpt_u" data-title="Enter"><?php echo $kd_dgchaibkpt_u=  (isset( $school_karjokocom_bibag['kd_dgchaibkpt_u']))? $school_karjokocom_bibag['kd_dgchaibkpt_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($kd_dgchaibkpt_s!=0)?$kd_dgchaibkpt_u/$kd_dgchaibkpt_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    হাসির কাগজ (হাসবিনা দোস্ত)
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_hkhbnad_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_hkhbnad_s']))? $school_karjokocom_bibag['b_hkhbnad_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_hkhbnad_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_hkhbnad_u']))? $school_karjokocom_bibag['b_hkhbnad_u']:'' ?></a>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-0pky" >
                                    সুন্দর হাতের লিখা
                                </td>
                                <td class="tg-0pky" >
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_shl_s" data-title="Enter"><?php echo $kd_shl_s=  (isset( $school_karjokocom_bibag['kd_shl_s']))? $school_karjokocom_bibag['kd_shl_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_shl_u" data-title="Enter"><?php echo $kd_shl_u=  (isset( $school_karjokocom_bibag['kd_shl_u']))? $school_karjokocom_bibag['kd_shl_u']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo number_format(($kd_shl_s!=0)?$p_sathitcts_u/$kd_shl_s:0,2)?>
                                </td>
                                <td class="tg-0pky" >
                                    ফুলেল শুভেচ্ছা বাণী
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_fsb_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_fsb_s']))? $school_karjokocom_bibag['b_fsb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_fsb_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_fsb_u']))? $school_karjokocom_bibag['b_fsb_u']:'' ?></a>
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
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_s_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_s_s']))? $school_karjokocom_bibag['b_s_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_s_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_s_u']))? $school_karjokocom_bibag['b_s_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    সার্কুলার
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_sarkular_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_sarkular_s']))? $school_karjokocom_bibag['jogaj_sarkular_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_sarkular_k" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['jogaj_sarkular_k']))? $school_karjokocom_bibag['jogaj_sarkular_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_sarkular_saka_" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_sarkular_saka_']))? $school_karjokocom_bibag['jogaj_sarkular_saka_']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_sarkular_onn" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_sarkular_onn']))? $school_karjokocom_bibag['jogaj_sarkular_onn']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    সাহিত্য
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_spt_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['b_spt_s']))? $school_karjokocom_bibag['b_spt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_spt_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_spt_u']))? $school_karjokocom_bibag['b_spt_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    চিঠি
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_chithi_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_chithi_s']))? $school_karjokocom_bibag['jogaj_chithi_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_chithi_k" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_chithi_k']))? $school_karjokocom_bibag['jogaj_chithi_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_chithi_saka" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_chithi_saka']))? $school_karjokocom_bibag['jogaj_chithi_saka']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_chithi_onn" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_chithi_onn']))? $school_karjokocom_bibag['jogaj_chithi_onn']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_onn_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_onn_s']))? $school_karjokocom_bibag['b_onn_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_onn_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['b_onn_u']))? $school_karjokocom_bibag['b_onn_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    ই-মেইল
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_b_email_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_b_email_s']))? $school_karjokocom_bibag['jogaj_b_email_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_b_email_k" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['jogaj_b_email_k']))? $school_karjokocom_bibag['jogaj_b_email_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_b_email_saka" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['jogaj_b_email_saka']))? $school_karjokocom_bibag['jogaj_b_email_saka']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_b_email_onn" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_b_email_onn']))? $school_karjokocom_bibag['jogaj_b_email_onn']:'' ?></a>
                                </td>
                                <td class="tg-0pky" rowspan="5">
                                    স্পোর্টস
                                </td>
                                <td class="tg-0pky">
                                    ক্রিকেট
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_kt_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_kt_s']))? $school_karjokocom_bibag['spt_kt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_kt_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_kt_u']))? $school_karjokocom_bibag['spt_kt_u']:'' ?></a>
                                </td>

                            </tr>



                            <tr>
                                <td class="tg-0pky" >
                                    SMS
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_sms_s" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_sms_s']))? $school_karjokocom_bibag['jogaj_sms_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_sms_k" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_sms_k']))? $school_karjokocom_bibag['jogaj_sms_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_sms_saka" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_sms_saka']))? $school_karjokocom_bibag['jogaj_sms_saka']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jogaj_sms_onn" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['jogaj_sms_onn']))? $school_karjokocom_bibag['jogaj_sms_onn']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    ফুটবল
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_fb_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_fb_s']))? $school_karjokocom_bibag['spt_fb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_fb_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_fb_u']))? $school_karjokocom_bibag['spt_fb_u']:'' ?></a>
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
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_bb_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_bb_s']))? $school_karjokocom_bibag['spt_bb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_bb_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_bb_u']))? $school_karjokocom_bibag['spt_bb_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    কেন্দ্র
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sofor_k_kotobar" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['sofor_k_kotobar']))? $school_karjokocom_bibag['sofor_k_kotobar']:'' ?></a>
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
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_bmtn_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_bmtn_s']))? $school_karjokocom_bibag['spt_bmtn_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_bmtn_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_bmtn_u']))? $school_karjokocom_bibag['spt_bmtn_u']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" >
                                    শাখা
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sofor_saka_kotobar" data-title="Enter"><?php echo  (isset( $school_karjokocom_bibag['sofor_saka_kotobar']))? $school_karjokocom_bibag['sofor_saka_kotobar']:'' ?></a>
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
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_onn_s" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_onn_s']))? $school_karjokocom_bibag['spt_onn_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="school_karjokocom_bibag" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="spt_onn_u" data-title="Enter"><?php echo   (isset( $school_karjokocom_bibag['spt_onn_u']))? $school_karjokocom_bibag['spt_onn_u']:'' ?></a>
                                </td>
                            </tr>








                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

