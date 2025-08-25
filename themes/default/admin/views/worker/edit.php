<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
 <style>
.section-label{padding-left:15px; font-size:20px;}
</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-edit"></i><?= 'কর্মীর  তথ্য সম্পাদন'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext hidden"><?php echo lang('update_info'); ?></p>
                <?php
				
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo admin_form_open_multipart("worker/edit/" . $manpower->id, $attrib)
                ?>
                <div class="col-md-5">
                     <?php if(in_array($manpower->process_id,array(10,9,14,11))){ ?> 
                    <div class="form-group all">
                        <?= lang("নাম", "name") ?>
                        <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ($manpower ? $manpower->name : '')), 'class="form-control" id="name" required="required"'); ?>
                    </div>
                     <?php } ?> 
					 
					 
					  <?php if(in_array($manpower->process_id,array(10,9,14,11))){ ?> 
							<div class="form-group">
                                    <?= lang("শাখা", "branch"); ?>
                                    <?php
                                    $wh[''] = lang('select').' '.lang('branch');
                                   if($this->Admin || $this->Owner)
								     $flag = 1;
								   else
									   $flag = 2;
								   foreach ($branches as $branch) 
								   {	
								     if($flag == 1)
                                        $wh[$branch->id] = $branch->name;
									 elseif($branch->id==$this->session->userdata('branch_id')) 
										$wh[$branch->id] = $branch->name;
									
                                   }
                                    echo form_dropdown('branch', $wh, ($manpower->branch_id ? $manpower->branch_id : ''), 'id="branch" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
					 <?php } ?> 
                     
                   

                     
                    
                      
					
					 <?php if(in_array($manpower->process_id,array(10,9,14,11))){ ?> 
					
                     <div class="form-group">
                        <?php echo lang('তারিখ ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', $manpower->date ? $this->sma->hrsd($manpower->date) : '' , 'class="form-control date" id="date" required="required" readonly="readonly"'); ?>
                        </div>
                    </div>
					
					 <?php } ?> 
					

                     
					<?php if(in_array($manpower->process_id,array(10,9,14,11))){ ?> 
                      <div class="form-group">
                                    <?= lang("সর্বশেষ দায়িত্ব", "responsibility"); ?>
                                   
								    <?php echo form_input('responsibility', $manpower->responsibility ? $this->sma->hrsd($manpower->responsibility) : '' , 'class="form-control" id="responsibility" '); ?>
                                </div>
								
								 <?php } ?> 
								
                     
					 
					 
					 
					 
					 
					 
				 
                    
				 
					  
				   
							<?php if(in_array($manpower->process_id,array(14,11))){ ?>   
							  
							<div class="form-group all">
								<?= lang("মোবাইল নং", "mobile") ?>
								<?= form_input('mobile', (isset($_POST['mobile']) ? $_POST['mobile'] : ($manpower ? $manpower->mobile : '')), 'class="form-control" id="mobile" required="required" '); ?>
						 </div>
						 <?php } ?> 
							
							<?php if(in_array($manpower->process_id,array(11))){ ?>  
							<div class="form-group all">
								<?= lang("ইমেইল", "email") ?>
								<?= form_input('email', (isset($_POST['email']) ? $_POST['email'] : ($manpower ? $manpower->email : '')), 'class="form-control" id="email" required="required" '); ?>
						    </div>
						 <?php } ?> 
							
				  
				  <?php if(in_array($manpower->process_id,array(11))){ ?> 
                    <div class="form-group all">
                        <?= lang("শিক্ষা প্রতিষ্ঠানের নাম", "higher_education_institution") ?>
                        <?= form_input('higher_education_institution', (isset($_POST['higher_education_institution']) ? $_POST['higher_education_institution'] : ($manpower ? $manpower->higher_education_institution : '')), 'class="form-control" id="higher_education_institution" required="required" '); ?>
                    </div>
					<?php }?> 
					
					<?php if(in_array($manpower->process_id,array(11))){ ?> 
				  <div class="form-group all">
                        <?= lang("উচ্চশিক্ষার ধরন", "type_higher_education") ?>
                        <?= form_input('type_higher_education', (isset($_POST['type_higher_education']) ? $_POST['type_higher_education'] : ($manpower ? $manpower->type_higher_education : '')), 'class="form-control" id="type_higher_education" required="required" '); ?>
                    </div>
					<?php }?> 
					 
					 <?php if(in_array($manpower->process_id,array(14,11))){ ?> 
					<div class="form-group">
                                    <?= lang("দেশের নাম ", "foreign_country"); ?>
                                    <?php
                                    $ct[''] = lang('select').' '.lang('country');
                                    foreach ($countries as $country)   
                                        $ct[$country->id] = $country->name;
                                   
                                    echo form_dropdown('foreign_country', $ct, ($manpower->foreign_country ? $manpower->foreign_country : ''), 'id="foreign_country"  class="form-control select" style="width:100%;" required="required" ');
                                    ?>
                                </div>
					<?php }?> 
					
				  
				   <?php if(in_array($manpower->process_id,array(14))){ ?> 
					  <div class="form-group all">
							<?= lang("শহরের নাম", "foreign_address") ?>
							<?= form_input('foreign_address', (isset($_POST['foreign_address']) ? $_POST['foreign_address'] : ($manpower ? $manpower->foreign_address : '')), 'class="form-control" id="foreign_address" required="required" '); ?>
						</div>
				  <?php }?> 
				  
				   <?php if(in_array($manpower->process_id,array(14))){ ?> 
				  
						 <div class="form-group all">
								<?= lang("পেশার ধরন", "type_of_profession") ?>
								<?= form_input('type_of_profession', (isset($_POST['type_of_profession']) ? $_POST['type_of_profession'] : ($manpower ? $manpower->type_of_profession : '')), 'class="form-control" id="type_of_profession" required="required" '); ?>
							</div>
							
							 <?php }?> 
							 
							 
							 <?php if(in_array($manpower->process_id,array(14,11))){ ?> 
							 <div class="form-group all">
								 
							 
								<?= lang("ফোরামে যুক্ত হয়েছেন কিনা?", "is_forum") ?> <br/>
								 <input type="checkbox" class="checkbox" value="1" name="is_forum" id="is_forum" <?= empty($manpower->is_forum) ? '' : 'checked="checked"' ?>/>
                       
								
							</div>
							
							<?php }?> 
							
				 
					 
					 
                </div>
              







 
			
			
			 
				
				
				<hr  style="clear:both"/>
				
			
				
				<div class="col-md-12">
				 <div class="">
				 
				 
				 <div class="col-md-5">
				  <?php if(in_array($manpower->process_id,array(10))){ ?> 
                    <div class="form-group all">
                        <?= lang("প্রতিপক্ষ", "opposition") ?>
                        <?= form_input('opposition', (isset($_POST['opposition']) ? $_POST['opposition'] : ($manpower ? $manpower->opposition : '')), 'class="form-control" id="opposition" '); ?>
                    </div>
				   <?php } ?> 	
				   
					 <?php if(in_array($manpower->process_id,array(10,9))){ ?> 
					
					<div class="form-group">
                                     
                                 <?= lang( ( $process_id==10 ?  "শাহাদাতের " : "ইন্তেকালের   " )  ."তারিখ", "date_death"); ?>
                        <?= form_input('date_death', (isset($_POST['date_death']) ? $_POST['date_death'] : ($manpower ? $manpower->date_death : '')), 'class="form-control date" id="date_death" '); ?>
                                </div>
					
					<?php } ?> 
				 </div>
				  <div class="col-md-6 col-md-offset-1">
				  
				    <?php if(in_array($manpower->process_id,array(10))){ ?> 
					  <div class="form-group all">
							<?= lang("কততম শহিদ", "myr_serial") ?>
							<?= form_input('myr_serial', (isset($_POST['myr_serial']) ? $_POST['myr_serial'] : ($manpower ? $manpower->myr_serial : '')), 'class="form-control" id="myr_serial" '); ?>
						</div>
				  <?php } ?> 
				  
				    <?php if(in_array($manpower->process_id,array(9))){ ?> 
						 <div class="form-group all">
								<?= lang("কীভাবে", "how_death") ?>
								<?= form_input('how_death', (isset($_POST['how_death']) ? $_POST['how_death'] : ($manpower ? $manpower->how_death : '')), 'class="form-control" id="how_death" '); ?>
							</div>
							
						<?php } ?>	
							  
							
							
							
							
				 </div>
				 
				 
				 </div>
				</div>
				
				










				<div class="col-md-12">
                     

                   
                    

                    <div class="form-group all">
                        <?= lang("notes", "notes") ?>
                        <?= form_textarea('notes', (isset($_POST['notes']) ? $_POST['notes'] : $manpower->notes), 'class="form-control" id="notes"'); ?>
                    </div>
                    
 

                </div>
				
				
				<div class="col-md-12">

                    
                    <div class="form-group">
                        <?php echo form_submit('edit', $this->lang->line("edit"), 'class="btn btn-primary"'); ?>
                    </div>

                </div>
               
				
				
				
                
                <?= form_close(); ?>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('form[data-toggle="validator"]').bootstrapValidator({ excluded: [':disabled'] });
        var audio_success = new Audio('<?= $assets ?>sounds/sound2.mp3');
        var audio_error = new Audio('<?= $assets ?>sounds/sound3.mp3');
        var items = {};
         
        
 

        
         
        $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'add_item');

        

         

        

         

        var su = 2;
        

        var _URL = window.URL || window.webkitURL;
        $("input#images").on('change.bs.fileinput', function () {
            var ele = document.getElementById($(this).attr('id'));
            var result = ele.files;
            $('#img-details').empty();
            for (var x = 0; x < result.length; x++) {
                var fle = result[x];
                for (var i = 0; i <= result.length; i++) {
                    var img = new Image();
                    img.onload = (function (value) {
                        return function () {
                            ctx[value].drawImage(result[value], 0, 0);
                        }
                    })(i);

                    img.src = 'images/' + result[i];
                }
            }
        });
       
        
         
        var row, branches = <?= json_encode($branches); ?>;
       

       
    });

     
    
</script>
 
