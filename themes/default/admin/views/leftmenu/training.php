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

                        
                             
				 

                            

                         

                      
					 
				 
							
							  
                        <li id=""  class="<?php  echo ($this->uri->segment(2)=='others' &&  ($this->uri->segment(3) == 'centraltraining' ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('others/centraltraining') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "কেন্দ্রীয় প্রশিক্ষণ"; ?></span>
                                            </a>
                             </li>
							 
							
                             <li id="" class="<?php  echo ($this->uri->segment(2)=='training' &&  ($this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('training') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= " শাখা প্রশিক্ষণ"; ?></span>
                                            </a>
                             </li>
							 
							 
							 
							
							 
							 
							 
							 
							 
							 
							 
							<li id="" class="<?php  echo ($this->uri->segment(2)=='training' &&  ($this->uri->segment(3) == 'library' ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('training/library') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "পাঠাগার"; ?></span>
                                            </a>
                             </li>

					
							 
                            
                            
                              <li id="" class="<?php  echo ($this->uri->segment(2)=='highersyllabus' &&  ($this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('highersyllabus') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "উচ্চতর সিলেবাস"; ?></span>
                                            </a>
                             </li>
							 
												 
                        
					<?php if ($Owner || $Admin) { ?>
                            
							<li id="" class="<?php  echo ($this->uri->segment(2)=='highersyllabus' &&  ($this->uri->segment(3) == 'highersyllabuslist'  ) )? 'active':'' ?>">
                                            <a href="<?= admin_url('highersyllabus/highersyllabuslist') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "বিষয়ের নাম "; ?></span>
                                            </a>
                             </li>

						<?php } ?>
                            

                         
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

