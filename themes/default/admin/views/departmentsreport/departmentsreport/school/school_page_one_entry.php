<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">

                    </ul>
                </li>
             
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>জনশক্তি</b></td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পুর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>
                            <?php
                                $pk = (isset($school_manpower['id']))?$school_manpower['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> সদস্য </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prev" data-title="Enter"><?php echo $member_prev =  (isset($school_manpower['member_prev'])) ? $school_manpower['member_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_pres" data-title="Enter"><?php echo $member_pres =  (isset($school_manpower['member_pres'])) ? $school_manpower['member_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_bri" data-title="Enter"><?php echo $member_bri =  (isset($school_manpower['member_bri'])) ? $school_manpower['member_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_gha" data-title="Enter"><?php echo $member_gha =  (isset($school_manpower['member_gha'])) ? $school_manpower['member_gha'] : '' ?></a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সদস্য প্রার্থী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prarthi_prev" data-title="Enter"><?php echo $member_prarthi_prev =  (isset($school_manpower['member_prarthi_prev'])) ? $school_manpower['member_prarthi_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prarthi_pres" data-title="Enter"><?php echo $member_prarthi_pres =  (isset($school_manpower['member_prarthi_pres'])) ? $school_manpower['member_prarthi_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prarthi_bri" data-title="Enter"><?php echo $member_prarthi_bri =  (isset($school_manpower['member_prarthi_bri'])) ? $school_manpower['member_prarthi_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prarthi_gha" data-title="Enter"><?php echo $member_prarthi_gha =  (isset($school_manpower['member_prarthi_gha'])) ? $school_manpower['member_prarthi_gha'] : '' ?></a>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> সাথী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prev" data-title="Enter"><?php echo $associate_prev =  (isset($school_manpower['associate_prev'])) ? $school_manpower['associate_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_pres" data-title="Enter"><?php echo $associate_pres =  (isset($school_manpower['associate_pres'])) ? $school_manpower['associate_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_bri" data-title="Enter"><?php echo $associate_bri =  (isset($school_manpower['associate_bri'])) ? $school_manpower['associate_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_gha" data-title="Enter"><?php echo $associate_gha =  (isset($school_manpower['associate_gha'])) ? $school_manpower['associate_gha'] : '' ?></a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সাথী প্রার্থী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prarthi_prev" data-title="Enter"><?php echo $associate_prarthi_prev =  (isset($school_manpower['associate_prarthi_prev'])) ? $school_manpower['associate_prarthi_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prarthi_pres" data-title="Enter"><?php echo $associate_prarthi_pres =  (isset($school_manpower['associate_prarthi_pres'])) ? $school_manpower['associate_prarthi_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prarthi_bri" data-title="Enter"><?php echo $associate_prarthi_bri =  (isset($school_manpower['associate_prarthi_bri'])) ? $school_manpower['associate_prarthi_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prarthi_gha" data-title="Enter"><?php echo $associate_prarthi_gha =  (isset($school_manpower['associate_prarthi_gha'])) ? $school_manpower['associate_prarthi_gha'] : '' ?></a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698">কর্মী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_prev" data-title="Enter"><?php echo $worker_prev =  (isset($school_manpower['worker_prev'])) ? $school_manpower['worker_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_pres" data-title="Enter"><?php echo $worker_pres =  (isset($school_manpower['worker_pres'])) ? $school_manpower['worker_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_bri" data-title="Enter"><?php echo $worker_bri =  (isset($school_manpower['worker_bri'])) ? $school_manpower['worker_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_gha" data-title="Enter"><?php echo $worker_gha =  (isset($school_manpower['worker_gha'])) ? $school_manpower['worker_gha'] : '' ?></a>
                                </td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>দাওয়াত</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পুর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>
                            <?php
                                $pk = (isset($school_dawat['id']))?$school_dawat['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সমর্থক </td>
                                
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="supporter_prev" data-title="Enter">
                                        <?php echo $supporter_prev =  (isset($school_dawat['supporter_prev'])) ? $school_dawat['supporter_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="supporter_pres" data-title="Enter">
                                        <?php echo $supporter_pres =  (isset($school_dawat['supporter_pres'])) ? $school_dawat['supporter_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="supporter_bri" data-title="Enter">
                                        <?php echo $supporter_bri =  (isset($school_dawat['supporter_bri'])) ? $school_dawat['supporter_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="supporter_gha" data-title="Enter">
                                        <?php echo $supporter_gha =  (isset($school_dawat['supporter_gha'])) ? $school_dawat['supporter_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> বন্ধু </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bondhu_prev" data-title="Enter">
                                        <?php echo $bondhu_prev =  (isset($school_dawat['bondhu_prev'])) ? $school_dawat['bondhu_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bondhu_pres" data-title="Enter">
                                        <?php echo $bondhu_pres =  (isset($school_dawat['bondhu_pres'])) ? $school_dawat['bondhu_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bondhu_bri" data-title="Enter">
                                        <?php echo $bondhu_bri =  (isset($school_dawat['bondhu_bri'])) ? $school_dawat['bondhu_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bondhu_gha" data-title="Enter">
                                        <?php echo $bondhu_gha =  (isset($school_dawat['bondhu_gha'])) ? $school_dawat['bondhu_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>


                            <tr>

                                <td class="tg-y698 type_1"> অমুসলিম সমর্থক </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_supporter_prev" data-title="Enter">
                                        <?php echo $omuslim_supporter_prev =  (isset($school_dawat['omuslim_supporter_prev'])) ? $school_dawat['omuslim_supporter_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_supporter_pres" data-title="Enter">
                                        <?php echo $omuslim_supporter_pres =  (isset($school_dawat['omuslim_supporter_pres'])) ? $school_dawat['omuslim_supporter_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_supporter_bri" data-title="Enter">
                                        <?php echo $omuslim_supporter_bri =  (isset($school_dawat['omuslim_supporter_bri'])) ? $school_dawat['omuslim_supporter_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_supporter_gha" data-title="Enter">
                                        <?php echo $omuslim_supporter_gha =  (isset($school_dawat['omuslim_supporter_gha'])) ? $school_dawat['omuslim_supporter_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> অমুসলিম বন্ধু </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_bondhu_prev" data-title="Enter">
                                        <?php echo $omuslim_bondhu_prev =  (isset($school_dawat['omuslim_bondhu_prev'])) ? $school_dawat['omuslim_bondhu_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_bondhu_pres" data-title="Enter">
                                        <?php echo $omuslim_bondhu_pres =  (isset($school_dawat['omuslim_bondhu_pres'])) ? $school_dawat['omuslim_bondhu_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_bondhu_bri" data-title="Enter">
                                        <?php echo $omuslim_bondhu_bri =  (isset($school_dawat['omuslim_bondhu_bri'])) ? $school_dawat['omuslim_bondhu_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_bondhu_gha" data-title="Enter">
                                        <?php echo $omuslim_bondhu_gha =  (isset($school_dawat['omuslim_bondhu_gha'])) ? $school_dawat['omuslim_bondhu_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698">শুভাকাঙ্ক্ষী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shuvakankhi_prev" data-title="Enter">
                                        <?php echo $shuvakankhi_prev =  (isset($school_dawat['shuvakankhi_prev'])) ? $school_dawat['shuvakankhi_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shuvakankhi_pres" data-title="Enter">
                                        <?php echo $shuvakankhi_pres =  (isset($school_dawat['shuvakankhi_pres'])) ? $school_dawat['shuvakankhi_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shuvakankhi_bri" data-title="Enter">
                                        <?php echo $shuvakankhi_bri =  (isset($school_dawat['shuvakankhi_bri'])) ? $school_dawat['shuvakankhi_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shuvakankhi_gha" data-title="Enter">
                                        <?php echo $shuvakankhi_gha =  (isset($school_dawat['shuvakankhi_gha'])) ? $school_dawat['shuvakankhi_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>সংগঠন</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পুর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>
                            <?php
                                $pk = (isset($school_shongothon['id']))?$school_shongothon['id']:'';
                            ?>

                            <tr>

                                <td class="tg-y698 type_1"> উপশাখা </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uposhakah_prev" data-title="Enter">
                                        <?php echo $uposhakah_prev =  (isset($school_shongothon['uposhakah_prev'])) ? $school_shongothon['uposhakah_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uposhakah_pres" data-title="Enter">
                                        <?php echo $uposhakah_pres =  (isset($school_shongothon['uposhakah_pres'])) ? $school_shongothon['uposhakah_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uposhakah_bri" data-title="Enter">
                                        <?php echo $uposhakah_bri =  (isset($school_shongothon['uposhakah_bri'])) ? $school_shongothon['uposhakah_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uposhakah_gha" data-title="Enter">
                                        <?php echo $uposhakah_gha =  (isset($school_shongothon['uposhakah_gha'])) ? $school_shongothon['uposhakah_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সমর্থক সংগঠন </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ss_prev" data-title="Enter">
                                        <?php echo $ss_prev =  (isset($school_shongothon['ss_prev'])) ? $school_shongothon['ss_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ss_pres" data-title="Enter">
                                        <?php echo $ss_pres =  (isset($school_shongothon['ss_pres'])) ? $school_shongothon['ss_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ss_bri" data-title="Enter">
                                        <?php echo $ss_bri =  (isset($school_shongothon['ss_bri'])) ? $school_shongothon['ss_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ss_gha" data-title="Enter">
                                        <?php echo $ss_gha =  (isset($school_shongothon['ss_gha'])) ? $school_shongothon['ss_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>প্রশিক্ষণ</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_proshikkhon['id']))?$school_proshikkhon['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> সাথী টিসি/টিএস </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_tc_num" data-title="Enter">
                                        <?php echo $sathi_tc_num =  (isset($school_proshikkhon['sathi_tc_num'])) ? $school_proshikkhon['sathi_tc_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_tc_pre" data-title="Enter">
                                        <?php echo $sathi_tc_pre =  (isset($school_proshikkhon['sathi_tc_pre'])) ? $school_proshikkhon['sathi_tc_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sathi_tc_pre!=0 && $sathi_tc_num!=0 )? $sathi_tc_pre / $sathi_tc_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> কর্মী টিসি/টিএস </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_tc_num" data-title="Enter">
                                        <?php echo $kormi_tc_num =  (isset($school_proshikkhon['kormi_tc_num'])) ? $school_proshikkhon['kormi_tc_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_tc_pre" data-title="Enter">
                                        <?php echo $kormi_tc_pre =  (isset($school_proshikkhon['kormi_tc_pre'])) ? $school_proshikkhon['kormi_tc_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($kormi_tc_pre!=0 && $kormi_tc_num!=0 ) ?$kormi_tc_pre / $kormi_tc_num:0  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাথী শব্বেদারী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_shobbedari_num" data-title="Enter">
                                        <?php echo $sathi_shobbedari_num =  (isset($school_proshikkhon['sathi_shobbedari_num'])) ? $school_proshikkhon['sathi_shobbedari_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_shobbedari_pre" data-title="Enter">
                                        <?php echo $sathi_shobbedari_pre =  (isset($school_proshikkhon['sathi_shobbedari_pre'])) ? $school_proshikkhon['sathi_shobbedari_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sathi_shobbedari_pre!=0 && $sathi_shobbedari_num!=0 )? $sathi_shobbedari_pre / $sathi_shobbedari_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সমর্থক টিএস </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="somorthok_tc_num" data-title="Enter">
                                        <?php echo $somorthok_tc_num =  (isset($school_proshikkhon['somorthok_tc_num'])) ? $school_proshikkhon['somorthok_tc_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="somorthok_tc_pre" data-title="Enter">
                                        <?php echo $somorthok_tc_pre =  (isset($school_proshikkhon['somorthok_tc_pre'])) ? $school_proshikkhon['somorthok_tc_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($somorthok_tc_pre!=0 && $somorthok_tc_num!=0 )? $somorthok_tc_pre / $somorthok_tc_num:0  ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> একাডেমিক টিএস </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="academic_tc_num" data-title="Enter">
                                        <?php echo $academic_tc_num =  (isset($school_proshikkhon['academic_tc_num'])) ? $school_proshikkhon['academic_tc_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="academic_tc_pre" data-title="Enter">
                                        <?php echo $academic_tc_pre =  (isset($school_proshikkhon['academic_tc_pre'])) ? $school_proshikkhon['academic_tc_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($academic_tc_pre!=0 && $academic_tc_num!=0 )? $academic_tc_pre / $academic_tc_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সামষ্টিক পাঠ </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sham_path_num" data-title="Enter">
                                        <?php echo $sham_path_num =  (isset($school_proshikkhon['sham_path_num'])) ? $school_proshikkhon['sham_path_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sham_path_pre" data-title="Enter">
                                        <?php echo $sham_path_pre =  (isset($school_proshikkhon['sham_path_pre'])) ? $school_proshikkhon['sham_path_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo($sham_path_pre!=0 && $sham_path_num!=0 )? $sham_path_pre / $sham_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কুরআন তালিম </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quran_talim_num" data-title="Enter">
                                        <?php echo $quran_talim_num =  (isset($school_proshikkhon['quran_talim_num'])) ? $school_proshikkhon['quran_talim_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quran_talim_pre" data-title="Enter">
                                        <?php echo $quran_talim_pre =  (isset($school_proshikkhon['quran_talim_pre'])) ? $school_proshikkhon['quran_talim_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($quran_talim_pre!=0 && $quran_talim_num!=0 )? $quran_talim_pre / $quran_talim_num:0  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">আলোচনা চক্র </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="alochona_num" data-title="Enter">
                                        <?php echo $alochona_num =  (isset($school_proshikkhon['alochona_num'])) ? $school_proshikkhon['alochona_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="alochona_pre" data-title="Enter">
                                        <?php echo $alochona_pre =  (isset($school_proshikkhon['alochona_pre'])) ? $school_proshikkhon['alochona_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($alochona_pre!=0 && $alochona_num!=0 )?$alochona_pre / $alochona_num :0 ?>
                                </td>
                            </tr>
                        </table>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-izx2 {
        border-color: black;
        background-color: #efefef;
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
    }

    .tg .tg-0pky {
        border-color: black;
        vertical-align: top
    }

    .tg .tg-y698 {
        background-color: #efefef;
        border-color: black;
        vertical-align: top
    }

    .tg .tg-0lax {
        border-color: black;
        vertical-align: top
    }

    @media screen and (max-width: 767px) {
        .tg {
            width: auto !important;
        }

        .tg col {
            width: auto !important;
        }

        .tg-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
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

    .table-header-rotated td.rotate>div {
        -webkit-transform: translate(10px, 51px) rotate(270deg);
        transform: translate(10px, 51px) rotate(270deg);
        width: 20px;
    }

    .table-header-rotated td.rotate>div>span {

        padding: 5px 10px;
    }

    .table-header-rotated td.row-header {
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>