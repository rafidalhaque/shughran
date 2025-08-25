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














                        <?php if($this->uri->segment(2) == 'organization') {?>


                                <li id="" class="<?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)))) ? 'active' : '' ?>">
                                    <a href="<?= admin_url('organization') ?>">
                                        <i class="fa fa-cogs"></i><span class="text"> <?= "একনজরে "; ?></span>
                                    </a>
                                </li>
 

                                <li class="mm_worker_decrease">
                                    <a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'শিক্ষাপ্রতিষ্ঠান'; ?> </span>
                                        <span class="chevron closed"></span>
                                    </a>
                                    <ul style="<?php echo ($this->uri->segment(2) == 'organization') ? 'display:block' : '' ?>">

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'institutionlist')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/institutionlist') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "শিক্ষাপ্রতিষ্ঠান তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'institution_increase')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/institution_increase') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "শিক্ষাপ্রতিষ্ঠান বৃদ্ধি তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'institution_decrease')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/institution_decrease') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "শিক্ষাপ্রতিষ্ঠান ঘাটতি তালিকা"; ?></span>
                                            </a>
                                        </li>



                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'institutionwithorg')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/institutionwithorg') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "যে সব প্রতিষ্ঠানে সংগঠন আছে"; ?></span>
                                            </a>
                                        </li>
                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'institutionbutorg')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/institutionbutorg') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "যে সব প্রতিষ্ঠানে সংগঠন নেই"; ?></span>
                                            </a>
                                        </li>


                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'institution_org_increase')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/institution_org_increase') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সংগঠন বৃদ্ধি তালিকা"; ?></span>
                                            </a>
                                        </li>
                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'institution_org_decrease')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/institution_org_decrease') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সংগঠন ঘাটতি তালিকা"; ?></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>


                              


                                <?php } ?>

 

                                <?php if($this->uri->segment(2) == 'organization' ||  ( $this->uri->segment(2) == 'others' && $this->uri->segment(3) == 'organizationinfo'    ) ) {?>

                                <li class="mm_worker_decrease">
                                    <a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'থানা'; ?> </span>
                                        <span class="chevron closed"></span>
                                    </a>
                                    <ul style="<?php echo ($this->uri->segment(2) == 'organization') ? 'display:block' : '' ?>">

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'thanalist')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/thanalist') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "থানা তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'thana_increase')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/increaselist_thana') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "থানা বৃদ্ধি তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'thana_decrease')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/decreaselist_thana') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "থানা ঘাটতি তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'thana_pending')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/thana_pending') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "থানা পেন্ডিং তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'ideal_thana')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/ideal_thana') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "আদর্শ থানা তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'increaselist_ideal_thana')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/increaselist_ideal_thana') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "আদর্শ থানা বৃদ্ধি তালিকা"; ?></span>
                                            </a>
                                        </li>


                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'decreaselist_ideal_thana')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/decreaselist_ideal_thana') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "আদর্শ থানা ঘাটতি তালিকা"; ?></span>
                                            </a>
                                        </li>


                                        <li class="divider"></li>


                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'wardlist')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/wardlist') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "ওয়ার্ড তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'ward_increase')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/increaselist_ward') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "ওয়ার্ড বৃদ্ধি তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'ward_decrease')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/decreaselist_ward') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "ওয়ার্ড ঘাটতি তালিকা"; ?></span>
                                            </a>
                                        </li>
                                        <li class="divider"></li>


                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'uposhakhalist')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/uposhakhalist') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "উপশাখা তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'uposhakha_increase')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/increaselist_uposhakha') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "উপশাখা বৃদ্ধি তালিকা"; ?></span>
                                            </a>
                                        </li>

                                        <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'organization' &&  ($this->uri->segment(3) == 'uposhakha_decrease')) ? 'active' : '' ?>">
                                            <a href="<?= admin_url('organization/decreaselist_uposhakha') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "উপশাখা ঘাটতি তালিকা"; ?></span>
                                            </a>
                                        </li>















  
                                    </ul>
                                </li>


                                <?php } ?>



                                <?php if($this->uri->segment(2) != 'others' ||  $this->uri->segment(3) !='organizationinfo') {?>
                               
                                <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'others' &&  ($this->uri->segment(3) == 'administration')) ? 'active' : '' ?>"><a href="<?= admin_url('others/administration'); ?>"><i class="fa fa-cogs"></i>প্রশাসনিক বিবরণ</a></li>
                                <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'others' &&  ($this->uri->segment(3) == 'administrative_area_list')) ? 'active' : '' ?>"><a href="<?= admin_url('others/administrative_area_list'); ?>"><i class="fa fa-cogs"></i>প্রশাসনিক এলাকা</a></li>
                                 
                                <li class="tmp_hidden <?php echo ($this->uri->segment(2) == 'others' &&  ($this->uri->segment(3) == 'administrationbutorg')) ? 'active' : '' ?>"><a href="<?= admin_url('others/administrationbutorg'); ?>"><i class="fa fa-cogs"></i>যে সব এলাকায় সংগঠন নেই</a></li>
                                <?php } ?>


                                <li class="<?=$this->uri->segment(3) != 'organizationinfo'?'hidden':''?> <?php echo ($this->uri->segment(2) == 'others' &&  ($this->uri->segment(3) == 'organizationinfo')) ? 'active' : '' ?>"><a href="<?= admin_url('others/organizationinfo'); ?>"><i class="fa fa-cogs"></i>সাংগঠন একনজরে</a></li>





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