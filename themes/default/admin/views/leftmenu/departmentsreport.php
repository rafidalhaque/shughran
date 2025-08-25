<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
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

						 <li class="mm_literature">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">সাহিত্য বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='literature-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/literature-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='literature-page-two')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/literature-page-two') ?>" >
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                            
                            </ul>
                        </li>
						

						 <li class="mm_education">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">শিক্ষা বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
								<li id="mm_education_index" class="<?php echo ($this->uri->segment(3)=='shikha-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/shikha-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
								<li id="mm_education_index" class="<?php echo ($this->uri->segment(3)=='shikha-page-two')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/shikha-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
								<li id="mm_education_index" class="<?php echo ($this->uri->segment(3)=='shikha-page-three')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/shikha-page-three') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৩</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
							<li class="mm_international">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">আন্তর্জাতিক বিভাগ </span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='international-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/international-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='international-page-two')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/international-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
						
						<li class="mm_manobadhikar">
                            <a href="<?= admin_url('departmentsreport/manobadhikar-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">মানবাধিকার বিভাগ</span>  
                            </a>
                       </li>
					   <li class="mm_it">
                            <a href="<?= admin_url('departmentsreport/it-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">তথ্যপ্রযুক্তি বিভাগ</span>                               
                            </a>
                        </li>




                        <li class="mm_sm">
                            <a href="<?= admin_url('departmentsreport/it-bivag_sm') ?>">
                                <i class="fa fa-cog"></i><span class="text">সোশ্যাল মিডিয়া বিভাগ</span>
                               
                            </a>
                        </li>


                        
						<li class="mm_library">
                            <a  href="<?= admin_url('departmentsreport/pathagar-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">পাঠাগার  বিভাগ</span>
                            </a>
                        </li>
						<li class="mm_manpower">
                            <a  href="<?= admin_url('departmentsreport/manpower-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">মানবসম্পদ ব্যবস্থাপনা বিভাগ</span>
                            </a>
                        </li>
							 <li class="mm_poriklpona">
                            <a  href="<?= admin_url('departmentsreport/poriklpona-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">প্লানিং এন্ড ডেভেলপমেন্ট বিভাগ</span>
                            </a>
                        </li>
					   	<li class="mm_information">
                            <a  href="<?= admin_url('departmentsreport/information-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">তথ্য বিভাগ</span>
                            </a>    
                        </li>
							<li class="mm_chatrokollan">
                            <a href="<?= admin_url('departmentsreport/chatrokollan-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">ছাত্রকল্যাণ বিভাগ</span>
                            </a>
                        </li>
						<li class="mm_chatro_andolon">
                            <a href="<?= admin_url('departmentsreport/chatro-andolon-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">ছাত্র অধিকার বিভাগ</span>
                            </a>
                        </li>
						<li class="mm_dawah">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">দাওয়াহ বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_dawah_index" class="<?php echo ($this->uri->segment(3)=='dawah-page-one')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/dawah-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১ </span>
                                    </a>
                                </li>

                                <li id="mm_dawah_index" class="<?php echo ($this->uri->segment(3)=='dawah-page-two')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/dawah-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						<li class="mm_research">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">গবেষণা বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='research-page-one')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/research-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='research-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/research-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
							<li class="mm_social">
                            <a href="<?= admin_url('departmentsreport/social-welfare-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">সমাজ সেবা</span>
                            </a>   
                        </li>
						<li class="mm_debate">
                             <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">বিতর্ক বিভাগ</span>
								 <span class="chevron closed"></span>
                            </a>
							<ul>
                                <li id="mm_bitorko_index" class="<?php echo ($this->uri->segment(3)=='bitorko-page-one')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/bitorko-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_bitorko_index" class="<?php echo ($this->uri->segment(3)=='bitorko-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/bitorko-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
							</ul>
                           
                        </li>
						 
						 <li class="mm_foundation">
                            <a  href="<?= admin_url('departmentsreport/foundation-bivag') ?>">
                                <i class="fa fa-cog"></i><span class="text">ফাউন্ডেশন বিভাগ</span>
                            </a>
                           
                        </li>
						 
						
						<li class="mm_publicity">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">প্রচার বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='publicity-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/publicity-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='publicity-page-two')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/publicity-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২ </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
							<li class="mm_law">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">আইন বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='law-page-one')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/law-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='law-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/law-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                            
                            </ul>
							
							
                        </li>
						
			
						<li class="mm_school">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">স্কুল বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='school-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/school-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='school-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/school-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
			 					<li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='school-page-three')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/school-page-three') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৩</span>
                                    </a>
                                </li>
								<li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='school-page-four')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/school-page-four') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৪</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="mm_media">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">মিডিয়া বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_media_index" class="<?php echo ($this->uri->segment(3)=='media-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/media-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_media_index"class="<?php echo ($this->uri->segment(3)=='media-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/media-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                                <li id="mm_media_index" class="<?php echo ($this->uri->segment(3)=='media-page-three')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/media-page-three') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৩</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
					
						
					
						<li class="mm_publication">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">প্রকাশনা বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='publication-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/publication-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='publication-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/publication-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                             
                                
                            </ul>
                        </li>
						
						<li class="mm_business">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">ব্যবসায় শিক্ষা  বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_business_index" class="<?php echo ($this->uri->segment(3)=='business-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/business-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_business_index" class="<?php echo ($this->uri->segment(3)=='business-page-two')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/business-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

						<li class="mm_sports">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text"> স্পোর্টস বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                             <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='sports-page-one')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/sports-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='sports-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/sports-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                            
                            </ul>
                        </li> 
				
						<li class="mm_culture">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">সাংস্কৃতিক বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='culture-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/culture-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='culture-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/culture-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='culture-page-three')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/culture-page-three') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৩</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
					
						
				
						 <li class="mm_college">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">কলেজ বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                              <!--   <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='college-page-one')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/college-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li> -->
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='college-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/college-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১ </span>
                                    </a>
                                </li>
								<li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='college-page-three')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/college-page-three') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						<li class="mm_madrasha">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">মাদরাসা বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='madrasha-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/madrasha-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='madrasha-page-two')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/madrasha-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='madrasha-page-three')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/madrasha-page-three') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৩</span>
                                    </a>
                                </li>
                                <li id="mm_madrasha_index" class="<?php echo ($this->uri->segment(3)=='madrasha-page-four')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/madrasha-page-four') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৪</span>
                                    </a>
                                </li>
								 <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='madrasha-page-five')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/madrasha-page-five') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৫</span>
                                    </a>
                                </li>
                                <li id="mm_madrasha_index" class="<?php echo ($this->uri->segment(3)=='madrasha-page-six')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/madrasha-page-six') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৬</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
					
						
						<li class="mm_science">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text">বিজ্ঞান বিভাগ</span>
                                <span class="chevron closed"></span>
                            </a>
                            <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='science-page-one')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/science-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='science-page-two')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/science-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='science-page-three')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/science-page-three') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৩</span>
                                    </a>
                                </li>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='science-page-four')?'active':'' ?>">
                                    <a href="<?= admin_url('departmentsreport/science-page-four') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৪</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li> 
					
					
						
						
		
						<li class="mm_others">
                            <a class="dropmenu" href="#">
                                <i class="fa fa-cog"></i><span class="text"> অন্যান্য</span>
                                <span class="chevron closed"></span>
                            </a>
                             <ul>
                                <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='others-page-one')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/others-page-one') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০১</span>
                                    </a>
                                </li>
                               <!--  <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='others-page-two')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/others-page-two') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li> -->
								<!-- <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='others-page-three')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/others-page-three') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৩</span>
                                    </a>
                                </li> -->
								<li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='others-page-four')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/others-page-four') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০২</span>
                                    </a>
                                </li>
								<li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='others-page-five')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/others-page-five') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৩</span>
                                    </a>
                                </li>
                            <li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='others-page-six')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/others-page-six') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৪</span>
                                    </a>
                                </li>
								<li id="mm_manpower_index" class="<?php echo ($this->uri->segment(3)=='others-page-seven')?'active':'' ?>" >
                                    <a href="<?= admin_url('departmentsreport/others-page-seven') ?>">
                                        <i class="fa fa-cogs"></i><span class="text">পেইজ ০৫</span>
                                    </a>
                                </li>
                            
                            
                            </ul>
                        </li> 
                        
						
						
                       
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

