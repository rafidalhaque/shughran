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

                       
  
                        <li class="mm_transfer">
                            <a href="<?= admin_url('manpowertransfer/add') ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="text"> সাথী প্রার্থী/কর্মী স্থানান্তর</span>
                            </a>
                        </li>
                        <li class="mm_transfer">
                            <a href="<?= admin_url('dashboard') ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="text">সাথী প্রার্থী/কর্মী স্থানান্তর/আগমন তালিকা</span>
                            </a>
                        </li>

                            

                         <li class="mm_manpowerlist">
                            <a href="<?= admin_url('manpowerlist') ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="text"> <?= 'জনশক্তি তালিকা'; ?></span>
                            </a>
                        </li>

                      
				 
                            <li class="mm_auth mm_manpowersummary">
                                <a class="submenu" href="<?= admin_url('manpower?type=current'); ?>">
                                <i class="fa fa-users"></i>
                                <span class="text"> <?= lang('একনজরে '); ?> </span>
                                
                                </a>
                                 
                            </li>
					 
                            
                            
                                <li class="mm_manpower">
                                    <a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সদস্য'; ?> </span>
                                        <span class="chevron closed"></span>
                                    </a>
                                    <ul>
                                        <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='member')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/member') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সদস্য তালিকা"; ?></span>
                                            </a>
                                        </li>
									
									<li class="mm_manpower_increase <?php echo ($this->uri->segment(3)=='memberincreaselist')?'active':'' ?>">	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সদস্য  বৃদ্ধি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php echo ($this->uri->segment(3)=='memberincreaselist')?'display:block':'' ?>">  
                                        
                                        <li id="mm_manpower_improvement" class="<?php echo ($this->uri->segment(3)=='memberincreaselist' && $this->uri->segment(4)=='2')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberincreaselist/2') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'মানোন্নয়ন'; ?></span>
                                            </a>
                                        </li>
                                        
										
										 <li id="mm_manpower_arrival" class="<?php echo ($this->uri->segment(3)=='memberincreaselist' && $this->uri->segment(4)=='15')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberincreaselist/15') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "আগমন"; ?></span>
                                            </a>
                                        </li>
										</ul>
									</li>
                                         
                                    <li class="mm_manpower_decrease">	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সদস্য ঘাটতি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php echo ($this->uri->segment(3)=='memberdecreaselist')?'display:block':'' ?>">  
                                         
                                        <li id="mm_manpower_endstd" class="<?php echo ($this->uri->segment(3)=='memberdecreaselist' && $this->uri->segment(4)=='8')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberdecreaselist/8') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'ছাত্রত্ব শেষ'; ?></span>
                                            </a>
                                        </li>
                                        
										
										 <li id="mm_manpower_transfer" class="<?php echo ($this->uri->segment(3)=='memberdecreaselist' && $this->uri->segment(4)=='15')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberdecreaselist/15') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "স্থানান্তর "; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_manpower_cancel" class="<?php echo ($this->uri->segment(3)=='memberdecreaselist' && $this->uri->segment(4)=='12')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberdecreaselist/12') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বাতিল"; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_manpower_higheredu" class="<?php echo ($this->uri->segment(3)=='memberdecreaselist' && $this->uri->segment(4)=='11')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberdecreaselist/11') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বিদেশ (উচ্চশিক্ষা)"; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_manpower_jobabroad" class="<?php echo ($this->uri->segment(3)=='memberdecreaselist' && $this->uri->segment(4)=='14')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberdecreaselist/14') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বিদেশ (চাকুরী)"; ?></span>
                                            </a>
                                        </li>
										<li id="mm_manpower_death" class="<?php echo ($this->uri->segment(3)=='memberdecreaselist' && $this->uri->segment(4)=='9')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberdecreaselist/9') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "ইন্তেকাল"; ?></span>
                                            </a>
                                        </li>
										<li id="mm_manpower_martyrs" class="<?php echo ($this->uri->segment(3)=='memberdecreaselist' && $this->uri->segment(4)=='10')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/memberdecreaselist/10') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "শাহাদাত"; ?></span>
                                            </a>
                                        </li>
										</ul>
									</li>
                                          
                                       
                                       <li id="mm_manpower_postpone" class="<?php echo ($this->uri->segment(3)=='postponelist')?'active':'' ?>">
                                            <a href="<?= admin_url('manpower/postponelist') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "মূলতবী"; ?></span>
                                            </a>
                                        </li>   
                                         
                                       
                                         
                                    </ul>
                                </li>
                            
                            
                              
							  
							  
							  
							  
							  
							
                         <li class="mm_membercandidate">
                                    <a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সদস্য প্রার্থী '; ?> </span> 
                                        <span class="chevron closed"></span>
                                    </a>
                                    <ul>
                                        <li id="mm_associate_index"  class="<?php echo ($this->uri->segment(2)=='membercandidate' && $this->uri->segment(3)=='' )? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সদস্য প্রার্থী  তালিকা"; ?></span>
                                            </a>
                                        </li>
									
									<li class="mm_membercandidate_increase" >	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সদস্য প্রার্থী   বৃদ্ধি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php  echo ($this->uri->segment(3)=='membercandidateincreaselist')? 'display:block':'' ?>">  
                                        
                                        <li id="mm_membercandidate_improvement" class="<?php  echo ($this->uri->segment(3)=='membercandidateincreaselist' && $this->uri->segment(4)=='2')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidateincreaselist/2') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'সদস্য প্রার্থী মানোন্নয়ন'; ?></span>
                                            </a>
                                        </li>
                                        
										
										 <li id="mm_membercandidate_arrival" class="<?php  echo ($this->uri->segment(3)=='membercandidateincreaselist' && $this->uri->segment(4)=='15')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidateincreaselist/15') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "সদস্য প্রার্থী আগমন"; ?></span>
                                            </a>
                                        </li>
										</ul>
									</li>
                                         
                                    <li class="mm_membercandidate_decrease">	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সদস্য প্রার্থী  ঘাটতি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php  echo ($this->uri->segment(3)=='membercandidatedecreaselist')? 'display:block':'' ?>">  
                                         
                                        <li id="mm_membercandidate_endstd" class="<?php  echo ($this->uri->segment(3)=='membercandidatedecreaselist' && $this->uri->segment(4)=='8')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidatedecreaselist/8') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'ছাত্রত্ব শেষ'; ?></span>
                                            </a>
                                        </li>
                                        
										
										 <li id="mm_membercandidate_transfer" class="<?php  echo ($this->uri->segment(3)=='membercandidatedecreaselist' && $this->uri->segment(4)=='15')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidatedecreaselist/15') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "স্থানান্তর "; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_membercandidate_cancel" class="<?php  echo ($this->uri->segment(3)=='membercandidatedecreaselist' && $this->uri->segment(4)=='12')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidatedecreaselist/12') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বাতিল"; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_membercandidate_higheredu" class="<?php  echo ($this->uri->segment(3)=='membercandidatedecreaselist' && $this->uri->segment(4)=='11')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidatedecreaselist/11') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বিদেশ (উচ্চশিক্ষা)"; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_membercandidate_jobabroad" class="<?php  echo ($this->uri->segment(3)=='membercandidatedecreaselist' && $this->uri->segment(4)=='14')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidatedecreaselist/14') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বিদেশ (চাকুরী)"; ?></span>
                                            </a>
                                        </li>
										<li id="mm_membercandidate_death" class="<?php  echo ($this->uri->segment(3)=='membercandidatedecreaselist' && $this->uri->segment(4)=='9')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidatedecreaselist/9') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "ইন্তেকাল"; ?></span>
                                            </a>
                                        </li>
										<li id="mm_membercandidate_martyrs" class="<?php  echo ($this->uri->segment(3)=='membercandidatedecreaselist' && $this->uri->segment(4)=='10')? 'active':'' ?>">
                                            <a href="<?= admin_url('membercandidate/membercandidatedecreaselist/10') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "শাহাদাত"; ?></span>
                                            </a>
                                        </li>
										</ul>
									</li>
                                          
                                       
                                       
                                       
                                         
                                    </ul>
                                </li>
                            
							
							
							  
							  <li class="mm_associate">
                                    <a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সাথী '; ?> </span>
                                        <span class="chevron closed"></span>
                                    </a>
                                    <ul>
                                        <li id="mm_associate_index" class="<?php  echo ($this->uri->segment(2)=='associate' && $this->uri->segment(3)=='')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সাথী  তালিকা"; ?></span>
                                            </a>
                                        </li>
									
									<li class="mm_associate_increase">	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সাথী   বৃদ্ধি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php  echo ($this->uri->segment(3)=='associateincreaselist')? 'display:block':'' ?>">  
                                        
                                        <li id="mm_associate_improvement" class="<?php  echo ($this->uri->segment(3)=='associateincreaselist' && $this->uri->segment(4)=='2')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associateincreaselist/2') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'মানোন্নয়ন'; ?></span>
                                            </a>
                                        </li>
                                        
										
										 <li id="mm_associate_arrival" class="<?php  echo ($this->uri->segment(3)=='associateincreaselist' && $this->uri->segment(4)=='15')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associateincreaselist/15') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "আগমন"; ?></span>
                                            </a>
                                        </li>
										</ul>
									</li>
                                         
                                    <li class="mm_associate_decrease">	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সাথী  ঘাটতি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php  echo ($this->uri->segment(3)=='associatedecreaselist')? 'display:block':'' ?>">  
                                         
                                        <li id="mm_associate_endstd" class="<?php  echo ($this->uri->segment(3)=='associatedecreaselist' && $this->uri->segment(4)=='8')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associatedecreaselist/8') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'ছাত্রত্ব শেষ'; ?></span>
                                            </a>
                                        </li>
                                        
										
										 <li id="mm_associate_transfer" class="<?php  echo ($this->uri->segment(3)=='associatedecreaselist' && $this->uri->segment(4)=='15')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associatedecreaselist/15') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "স্থানান্তর "; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_associate_cancel" class="<?php  echo ($this->uri->segment(3)=='associatedecreaselist' && $this->uri->segment(4)=='12')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associatedecreaselist/12') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বাতিল"; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_associate_higheredu" class="<?php  echo ($this->uri->segment(3)=='associatedecreaselist' && $this->uri->segment(4)=='11')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associatedecreaselist/11') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বিদেশ (উচ্চশিক্ষা)"; ?></span>
                                            </a>
                                        </li>
										
										<li id="mm_associate_jobabroad" class="<?php  echo ($this->uri->segment(3)=='associatedecreaselist' && $this->uri->segment(4)=='14')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associatedecreaselist/14') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বিদেশ (চাকুরী)"; ?></span>
                                            </a>
                                        </li>
										<li id="mm_associate_death" class="<?php  echo ($this->uri->segment(3)=='associatedecreaselist' && $this->uri->segment(4)=='9')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associatedecreaselist/9') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "ইন্তেকাল"; ?></span>
                                            </a>
                                        </li>
										<li id="mm_associate_martyrs" class="<?php  echo ($this->uri->segment(3)=='associatedecreaselist' && $this->uri->segment(4)=='10')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associatedecreaselist/10') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "শাহাদাত"; ?></span>
                                            </a>
                                        </li>

                                            <li id="mm_associate_not_found" class="<?php  echo ($this->uri->segment(3)=='associatedecreaselist' && $this->uri->segment(4)=='18')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/associatedecreaselist/18') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "পাওয়া যায়নি"; ?></span>
                                            </a>
                                        </li>

                                        
										</ul>
									</li>
                                          
                                       
                                       <li id="mm_associate_postpone" class="<?php  echo ($this->uri->segment(2)=='associate' && $this->uri->segment(3)=='postponelist')? 'active':'' ?>">
                                            <a href="<?= admin_url('associate/postponelist') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "মূলতবী"; ?></span>
                                            </a>
                                        </li>   
                                         
                                       
                                         
                                    </ul>
                                </li>
                            


                                
							
						  <li class="mm_worker">
                                    <a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সাথীপ্রার্থী'; ?> </span>
                                        <span class="chevron closed"></span>
                                    </a>
                                    <ul>
                                         
                                    <li  >	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সাথীপ্রার্থী  বৃদ্ধি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php  echo ($this->uri->segment(3)=='assocandidatearrivallist' )? 'display:block':'' ?>">  
                                         
                                        <li   class="<?php  echo ($this->uri->segment(3)=='assocandidatearrivallist')? 'active':'' ?>">
                                            <a href="<?= admin_url('manpowertransfer/assocandidatearrivallist') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'আগমন'; ?></span>
                                            </a>
                                        </li>
                                          
										</ul>
									</li>
                                         
                                    <li  >	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'সাথীপ্রার্থী  ঘাটতি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php  echo ($this->uri->segment(3)=='assocandidatedeparturelist' )? 'display:block':'' ?>">  
                                         
                                        <li id="mm_worker_higheredu" class="<?php  echo ($this->uri->segment(3)=='assocandidatedeparturelist')? 'active':'' ?>">
                                            <a href="<?= admin_url('manpowertransfer/assocandidatedeparturelist') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'স্থানান্তর'; ?></span>
                                            </a>
                                        </li>
                                          
										</ul>
									</li>
                                          
                                        
                                       
                                         
                                    </ul>
                                </li>
                            




							
						  <li class="mm_worker">
                                    <a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'কর্মী '; ?> </span>
                                        <span class="chevron closed"></span>
                                    </a>
                                    <ul>
                                         
									 
                                    <li class="mm_worker_decrease">	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'কর্মী  বৃদ্ধি '; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php  echo ($this->uri->segment(3)=='workerarrivallist' )? 'display:block':'' ?>">  
                                         
                                       

                                       <li   class="<?php  echo ($this->uri->segment(3)=='workerarrivallist' )? 'active':'' ?>">
                                            <a href="<?= admin_url('manpowertransfer/workerarrivallist') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'আগমন'; ?></span>
                                            </a>
                                        </li>
 
										</ul>
									</li>

                                         
                                    <li class="mm_worker_decrease">	
										<a class="dropmenu" href="#">
                                        <i class="fa fa-cog"></i><span class="text"> <?= 'কর্মী   ঘাটতি'; ?> </span>
                                        <span class="chevron closed"></span>
                                     </a>
                                       <ul style="<?php  echo ($this->uri->segment(3)=='workerdecreaselist' )? 'display:block':'' ?>">  
                                         
                                       <li   class="<?php  echo ($this->uri->segment(3)=='workerdeparturelist')? 'active':'' ?>">
                                            <a href="<?= admin_url('manpowertransfer/workerdeparturelist') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'স্থানান্তর'; ?></span>
                                            </a>
                                        </li>


                                        


                                        <li id="mm_worker_higheredu" class="<?php  echo ($this->uri->segment(3)=='workerdecreaselist' && $this->uri->segment(4)=='11')? 'active':'' ?>">
                                            <a href="<?= admin_url('worker/workerdecreaselist/11') ?>">
                                                <i class="fa fa-money"></i><span class="text"> <?= 'বিদেশ (উচ্চশিক্ষা)'; ?></span>
                                            </a>
                                        </li>
                                         <li id="mm_worker_jobabroad" class="<?php  echo ($this->uri->segment(3)=='workerdecreaselist' && $this->uri->segment(4)=='14')? 'active':'' ?>">
                                            <a href="<?= admin_url('worker/workerdecreaselist/14') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "বিদেশ (চাকুরী)"; ?></span>
                                            </a>
                                        </li>
										<li id="mm_worker_death" class="<?php  echo ($this->uri->segment(3)=='workerdecreaselist' && $this->uri->segment(4)=='9')? 'active':'' ?>">
                                            <a href="<?= admin_url('worker/workerdecreaselist/9') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "ইন্তেকাল"; ?></span>
                                            </a>
                                        </li>
										<li id="mm_membercandidate_martyrs" class="<?php  echo ($this->uri->segment(3)=='workerdecreaselist' && $this->uri->segment(4)=='10')? 'active':'' ?>">
                                            <a href="<?= admin_url('worker/workerdecreaselist/10') ?>">
                                                <i class="fa fa-building-o"></i><span class="text"> <?= "শাহাদাত"; ?></span>
                                            </a>
                                        </li>
										</ul>
									</li>
                                          
                                        
                                       
                                         
                                    </ul>
                                </li>
                            
						
						
						
						
						
						 
                                <li class="<?php  echo ($this->uri->segment(2)=='manpower' && $this->uri->segment(3)=='manpower_output')? 'active':'' ?>">
                                            <a href="<?= admin_url('manpower/manpower_output') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "সকল জনশক্তির আউটপুট"; ?></span>
                                            </a>
                             </li>
							
							
							<li class="<?php  echo ($this->uri->segment(2)=='dawat' && $this->uri->segment(3)=='increased_output')? 'active':'' ?>">
                                            <a href="<?= admin_url('dawat/increased_output') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "বৃদ্ধিকৃতদের আউটপুট"; ?></span>
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

