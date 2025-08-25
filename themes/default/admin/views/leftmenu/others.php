<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<div class="container" id="container">
        <div class="row" id="main-con">
        <table class="lt"><tr><td class="sidebar-con">
            <div id="sidebar-left">
                <div class="sidebar-nav nav-collapse collapse navbar-collapse" id="sidebar_menu">
                    <ul class="nav main-menu">
                        <li class="mm_welcome">
                            <a href="<?= admin_url() ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="text"> <?= lang('dashboard'); ?></span>
                            </a>
                        </li>

                       
						<li id="" class="<?php  echo ($this->uri->segment(2)=='bm' &&  ($this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('bm') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "বিএম"; ?></span>
                                            </a>
                             </li>
   
   
   
    <li id="" class="<?php  echo ($this->uri->segment(2)=='guest' &&  ($this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('guest') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সফর"; ?></span>
                                            </a>
                             </li>
							 
												 
                        
					<?php if ($Owner || $Admin) { ?>
                            
							<li id="" class="<?php  echo ($this->uri->segment(2)=='guest' &&  ($this->uri->segment(3) == 'guestlist' ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('guest/guestlist') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সফরকারী "; ?></span>
                                            </a>
                             </li>

						<?php } ?>
                            
				 
							
							
							 
							 
							 
							 <li id="" class="<?php  echo ($this->uri->segment(2)=='training' &&  ($this->uri->segment(3) == 'communication' ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('training/communication') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "যোগাযোগ"; ?></span>
                                            </a>
                             </li>
							<li id="" class="<?php  echo ($this->uri->segment(2)=='training' &&  ($this->uri->segment(3) == 'trainingelement' ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('training/trainingelement') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "উপকরণ"; ?></span>
                                            </a>
                             </li>
							 
							 
							 <li class="hidden <?php echo ($this->uri->segment(3)=='school-karjokrom-bivag')?'active':'' ?>"><a href="<?= admin_url('departmentsreport/school-karjokrom-bivag'); ?>"><i class="fa fa-cogs"></i>স্কুল কার্যক্রম </a></li>
							 
							 
							
                             <li id="" class="hidden <?php  echo ($this->uri->segment(2)=='others' &&  ($this->uri->segment(3) == 'administration' ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('others/administration') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "প্রশাসনিক বিবরণ "; ?></span>
                                            </a>
                             </li>
							 
							 <li id="" class="hidden <?php  echo ($this->uri->segment(2)=='others' &&  ($this->uri->segment(3) == 'organizationinfo' ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('others/organizationinfo') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সাংগঠনিক বিবরণ"; ?></span>
                                            </a>
                             </li>
							 
							
							 
							 
                           
                             <li id="" class="hidden <?php  echo ($this->uri->segment(2)=='others' &&  ($this->uri->segment(3) == 'administrationbutorg' ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('others/administrationbutorg') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "যেখানে সংগঠন নেই"; ?></span>
                                            </a>
                             </li>
                             


						

                        
                    </ul>
                </div>
                <a href="#" id="main-menu-act" class="full visible-md visible-lg">
                    <i class="fa fa-angle-double-left"></i>
                </a>
            </div>
            </td><td class="content-con">
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
                                        <a href="#" id="<?= $n->id ?>" class="close hideComment external"
                                           data-dismiss="alert">&times;</a>
                                        <?= $n->comment; ?>
                                    </div>
                                <?php }
                            }
                        } ?>
                        <div class="alerts-con"></div>

