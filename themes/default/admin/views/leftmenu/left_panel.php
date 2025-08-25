<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<div class="container" id="container">
    <div class="row" id="main-con">
        <table class="lt">
            <tr>
                <td class="sidebar-con">
                    <div id="sidebar-left">
                        <div class="sidebar-nav nav-collapse collapse navbar-collapse" id="sidebar_menu">
                            <ul class="nav main-menu">
                                <li class="mm_welcome">
                                    <a href="<?= admin_url() ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="text"> <?= lang('dashboard'); ?></span>
                                    </a>
                                </li>


                                <li class="mm_transfer">
                                    <a href="<?= admin_url('mancomminglist') ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="text">জনশক্তি আগমন পেন্ডিং তালিকা <?= isset($pending_list) ? '(' . $pending_list . ')' : '' ?></span>
                                    </a>
                                </li>

                                <li class="mm_transfer">
                                    <a href="<?= admin_url('mantransferlist') ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="text">জনশক্তি স্থানান্তর পেন্ডিং তালিকা <?= isset($manpowertransferout) ? '(' . $manpowertransferout . ')' : '' ?></span>
                                    </a>
                                </li>

                                <li class="mm_transfer">
                                    <a href="<?= admin_url('memberpending') ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="text">সদস্য ঘাটতি পেন্ডিং তালিকা  <?= isset($manpowerstdout) ? '(' . $manpowerstdout . ')' : '' ?></span>
                                    </a>
                                </li>

                                <li class="mm_transfer">
                                    <a href="<?= admin_url('membercandidatepending') ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="text">সদস্যপ্রার্থী ঘাটতি পেন্ডিং তালিকা  <?= isset($membercandidatepending) ? '(' . $membercandidatepending . ')' : '' ?></span>
                                    </a>
                                </li>

                               

                                

                                <li class="mm_transfer">
                                    <a href="<?= admin_url('manpowertransfer/add') ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="text">সাথীপ্রার্থী/কর্মী স্থানান্তর করুন</span>
                                    </a>
                                </li>


                                <li class="mm_transfer">
                                    <a href="<?= admin_url('dashboard') ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="text">সাথীপ্রার্থী/কর্মী আগমন তালিকা <?= isset($assocandidateworkerin) ? '(' . $assocandidateworkerin . ')' : '' ?></span>
                                    </a>
                                </li>
                                <li class="mm_transfer">
                                    <a href="<?= admin_url('dashboardtransfer') ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="text">সাথীপ্রার্থী/কর্মী স্থানান্তর তালিকা <?= isset($assocandidateworkerout) ? '(' . $assocandidateworkerout . ')' : '' ?></span>
                                    </a>
                                </li>

                                <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'thana_pending')) ? 'active' : '' ?>">
                                    <a href="<?= admin_url('organization/thana_pending') ?>">
                                        <i class="fa fa-cogs"></i><span class="text"> <?= "থানা পেন্ডিং তালিকা"; ?> <?= isset($thanapendingcount) ? '(' . $thanapendingcount . ')' : '' ?></span>
                                    </a>
                                </li>




                                <?php
                                if ($Owner || $Admin) {
                                ?>



                                    <li class="mm_manpowerlist hidden">
                                        <a href="<?= admin_url('manpowerlist') ?>">
                                            <i class="fa fa-dashboard"></i>
                                            <span class="text"> <?= 'জনশক্তি তালিকা'; ?></span>
                                        </a>
                                    </li>







                                    <li class="mm_auth mm_customers mm_suppliers mm_billers">
                                        <a class="dropmenu" href="#">
                                            <i class="fa fa-users"></i>
                                            <span class="text"> <?= lang('people'); ?> </span>
                                            <span class="chevron closed"></span>
                                        </a>
                                        <ul>
                                            <?php if ($Owner) { ?>
                                                <li id="auth_users">
                                                    <a class="submenu" href="<?= admin_url('users'); ?>">
                                                        <i class="fa fa-users"></i><span class="text"> <?= lang('list_users'); ?></span>
                                                    </a>
                                                </li>
                                                <li id="auth_create_user">
                                                    <a class="submenu" href="<?= admin_url('users/create_user'); ?>">
                                                        <i class="fa fa-user-plus"></i><span class="text"> <?= lang('new_user'); ?></span>
                                                    </a>
                                                </li>


                                            <?php } ?>


                                        </ul>
                                    </li>
                                    <li class="mm_notifications">
                                        <a class="submenu" href="<?= admin_url('notifications'); ?>">
                                            <i class="fa fa-info-circle"></i><span class="text"> <?= lang('notifications'); ?></span>
                                        </a>
                                    </li>

                                    <li class="mm_confirmreport">
                                        <a class="submenu" href="<?= admin_url('confirmreport'); ?>">
                                            <i class="fa fa-info-circle"></i><span class="text"> <?= 'কনফার্ম রিপোর্ট'; ?></span>
                                        </a>
                                    </li>


                                    <li class="mm_reportingtime">
                                        <a class="submenu" href="<?= admin_url('reportingtime'); ?>">
                                            <i class="fa fa-info-circle"></i><span class="text"> <?= 'রিপোর্টিং সিডিউল'; ?></span>
                                        </a>
                                    </li>



                                    <li class="mm_calendar">
                                        <a class="submenu" href="<?= admin_url('calendar'); ?>">
                                            <i class="fa fa-calendar"></i><span class="text"> <?= lang('calendar'); ?></span>
                                        </a>
                                    </li>
                                    <?php if ($Owner) { ?>
                                        <li class="mm_system_settings <?= strtolower($this->router->fetch_method()) == 'sales' ? '' : 'mm_pos' ?>">
                                            <a class="dropmenu" href="#">
                                                <i class="fa fa-cog"></i><span class="text"> <?= lang('settings'); ?> </span>
                                                <span class="chevron closed"></span>
                                            </a>
                                            <ul>
                                                <li id="system_settings_index">
                                                    <a href="<?= admin_url('system_settings') ?>">
                                                        <i class="fa fa-cogs"></i><span class="text"> <?= lang('system_settings'); ?></span>
                                                    </a>
                                                </li>

                                                <li id="system_settings_change_logo">
                                                    <a href="<?= admin_url('system_settings/change_logo') ?>" data-toggle="modal" data-target="#myModal">
                                                        <i class="fa fa-upload"></i><span class="text"> <?= lang('change_logo'); ?></span>
                                                    </a>
                                                </li>
                                                <li id="system_settings_currencies">
                                                    <a href="<?= admin_url('system_settings/currencies') ?>">
                                                        <i class="fa fa-money"></i><span class="text"> <?= lang('currencies'); ?></span>
                                                    </a>
                                                </li>


                                                <li id="system_settings_branches">
                                                    <a href="<?= admin_url('system_settings/branches') ?>">
                                                        <i class="fa fa-building-o"></i><span class="text"> <?= lang('branches'); ?></span>
                                                    </a>
                                                </li>

                                                <li id="system_settings_departments">
                                                    <a href="<?= admin_url('system_settings/departments') ?>">
                                                        <i class="fa fa-folder-open"></i><span class="text"> <?= lang('departments'); ?></span>
                                                    </a>
                                                </li>

                                                 <li id="system_settings_dawats">
                                                    <a href="<?= admin_url('system_settings/dawats') ?>">
                                                        <i class="fa fa-folder-open"></i><span class="text"> <?= lang('dawats'); ?></span>
                                                    </a>
                                                </li>


                                                <li id="system_settings_zones">
                                                    <a href="<?= admin_url('system_settings/zones') ?>">
                                                        <i class="fa fa-folder-open"></i><span class="text"> <?= lang('zones_tree'); ?></span>
                                                    </a>
                                                </li>

                                                <li id="system_settings_zones">
                                                    <a href="<?= admin_url('system_settings/zones_list') ?>">
                                                        <i class="fa fa-folder-open"></i><span class="text"> <?= lang('zones'); ?></span>
                                                    </a>
                                                </li>



                                                <li id="system_settings_categories">
                                                    <a href="<?= admin_url('system_settings/categories') ?>">
                                                        <i class="fa fa-folder-open"></i><span class="text"> <?= lang('categories'); ?></span>
                                                    </a>
                                                </li>

                                                <li id="system_settings_units">
                                                    <a href="<?= admin_url('system_settings/units') ?>">
                                                        <i class="fa fa-wrench"></i><span class="text"> <?= lang('units'); ?></span>
                                                    </a>
                                                </li>


                                                <li id="system_settings_email_templates">
                                                    <a href="<?= admin_url('system_settings/email_templates') ?>">
                                                        <i class="fa fa-envelope"></i><span class="text"> <?= lang('email_templates'); ?></span>
                                                    </a>
                                                </li>
                                                <li id="system_settings_user_groups">
                                                    <a href="<?= admin_url('system_settings/user_groups') ?>">
                                                        <i class="fa fa-key"></i><span class="text"> <?= lang('group_permissions'); ?></span>
                                                    </a>
                                                </li>
                                                <li id="system_settings_backups">
                                                    <a href="<?= admin_url('system_settings/backups') ?>">
                                                        <i class="fa fa-database"></i><span class="text"> <?= lang('backups'); ?></span>
                                                    </a>
                                                </li>
                                                <!-- <li id="system_settings_updates">
                                            <a href="<?= admin_url('system_settings/updates') ?>">
                                                <i class="fa fa-upload"></i><span class="text"> <?= lang('updates'); ?></span>
                                            </a>
                                        </li> -->
                                            </ul>
                                        </li>
                                    <?php } ?>



                                    <?php if ($Owner || $Admin) { ?>

                                        <li class="mm_pages">
                                            <a class="dropmenu" href="#">
                                                <i class="fa fa-barcode"></i>
                                                <span class="text"> <?= lang('pages'); ?> </span>
                                                <span class="chevron closed"></span>
                                            </a>
                                            <ul>
                                                <li id="dailycontents_index">
                                                    <a class="submenu" href="<?= admin_url('pages'); ?>">
                                                        <i class="fa fa-barcode"></i>
                                                        <span class="text"> <?= lang('list_pages'); ?></span>
                                                    </a>
                                                </li>
                                                <li id="dailycontents_add">
                                                    <a class="submenu" href="<?= admin_url('pages/add'); ?>">
                                                        <i class="fa fa-plus-circle"></i>
                                                        <span class="text"> <?= lang('add_page'); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                    <?php } ?>










                                <?php
                                } else { // not owner and not admin
                                ?>



                                    <?php if ($GP['confirmreport-index']) { ?>

                                        <li class="mm_customer_groups hidden">



                                            <a class="submenu" href="<?= admin_url('confirmreport'); ?>">
                                                <i class="fa fa-info-circle"></i><span class="text"> <?= 'কন্ফার্ম রিপোর্ট '; ?></span>
                                            </a>
                                        </li>


                                    <?php } ?>





                                <?php } ?>


                                <li class="mm_transfer">
                                    <a href="<?= admin_url('export') ?>">
                                        <i class="icon fa fa-file-excel-o"></i>
                                        <span class="text">Export Report</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                        <a href="#" id="main-menu-act" class="full visible-md visible-lg">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    </div>
                </td>
                <td class="content-con">
                    <div id="content">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <ul class="breadcrumb">
                                    <?php
                                    foreach ($bc as $b) {
                                        if ($b['link'] === '#') {
                                            echo '<li class="active">' . $b['page'] . '</li>';
                                        } else {
                                            echo '<li><a href="' . $b['link'] . '">' . $b['page'] . '</a></li>';
                                        }
                                    }
                                    ?>
                                    <li class="right_log hidden-xs">
                                        <?= lang('your_ip') . ' ' . $ip_address . " <span class='hidden-sm'>( " . lang('last_login_at') . ": " . date($dateFormats['php_ldate'], $this->session->userdata('old_last_login')) . " " . ($this->session->userdata('last_ip') != $ip_address ? lang('ip:') . ' ' . $this->session->userdata('last_ip') : '') . " )</span>" ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if ($message) { ?>
                                    <div class="alert alert-success">
                                        <button data-dismiss="alert" class="close" type="button">×</button>
                                        <?= $message; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger">
                                        <button data-dismiss="alert" class="close" type="button">×</button>
                                        <?= $error; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($warning) { ?>
                                    <div class="alert alert-warning">
                                        <button data-dismiss="alert" class="close" type="button">×</button>
                                        <?= $warning; ?>
                                    </div>
                                <?php } ?>
                                <?php
                                if ($info) {
                                    foreach ($info as $n) {
                                        if (!$this->session->userdata('hidden' . $n->id)) {
                                ?>
                                            <div class="alert alert-info">
                                                <a href="#" id="<?= $n->id ?>" class="close hideComment external" data-dismiss="alert">&times;</a>
                                                <?= $n->comment; ?>
                                                
                                            </div>
                                <?php }
                                    }
                                } ?>
                                <div class="alerts-con"></div>