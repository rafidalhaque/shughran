<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
<script type="text/javascript">
    $(document).ready(function () {
         
       
        
        $('#manpowercode').bind('keypress', function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });
    });
</script>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-edit"></i><?= lang('edit_manpower'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php echo lang('update_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo admin_form_open_multipart("associate/edit/" . $manpower->id, $attrib)
                ?>
                <div class="col-md-5">
                    
                    <div class="form-group all">
                        <?= lang("manpower_name", "name") ?>
                        <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ($manpower ? $manpower->name : '')), 'class="form-control" id="name" required="required"'); ?>
                    </div>
                    

                     
                    <div class="form-group all">
                        <?= lang('sessionyear', 'sessionyear'); ?>
                        <?= form_input('sessionyear', set_value('sessionyear', ($manpower ? $manpower->sessionyear : '')), 'class="form-control tip" id="sessionyear"'); ?>
                    </div>

                     
                    
                     <div class="form-group all">
					 <?= lang('Student life', 'studentlife'); ?>
					 
				<div class="radio">	 
                <input type="radio" class="checkbox" name="studentlife" value="1"
                       id="running" <?= $manpower->studentlife == 1 ? 'checked="checked"' : ''; ?>/>
				  <label for="running" class="padding05"><?= 'Running' ?></label>
				</div>	
					
					<div class="radio">	
                <input type="radio" class="checkbox" name="studentlife" value="2"
                       id="completed" <?= $manpower->studentlife == 2 ? 'checked="checked"' : ''; ?>>
					   <label for="completed"  class="padding05"><?= 'Completed' ?></label>
                
						</div>
					</div>
					
					
					
					
                     
                     <div class="form-group all">
                        <?= lang('education', 'education'); ?>
                        <?= form_input('education', set_value('education', ($manpower ? $manpower->education : '')), 'class="form-control tip" id="education"'); ?>
                    </div>
                     
                     
                     
                     
                    	

                     

                    
                     
                </div>
                <div class="col-md-6 col-md-offset-1">
                    
                    <div class="form-group">
                        <?php echo lang('Oath date', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', $manpower->associate_oath_date ? $this->sma->hrsd($manpower->associate_oath_date) : '' , 'class="form-control date" id="date" required="required"'); ?>
                        </div>
                    </div>
					
					
					

                     <div class="form-group">
                                    <?= lang("district", "district"); ?>
                                    <?php
                                    $dt[''] = lang('select').' '.lang('district');
                                    foreach ($districts as $district)   
                                        $dt[$district->id] = $district->name;
                                   
                                    echo form_dropdown('district', $dt, ($manpower->district ? $manpower->district : ''), 'id="district" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
					 

                     

                     

                  
	
					<div class="form-group">
                                    <?= lang("Responsibility", "responsibility"); ?>
                                    <?php
                                    $rt[''] = lang('select').' '.lang('responsibility');
                                    foreach ($responsibilities as $responsibility)   
                                        $rt[$responsibility->id] = $responsibility->responsibility;
                                   
                                    echo form_dropdown('responsibility_id', $rt, ($manpower->responsibility_id ? $manpower->responsibility_id : ''), 'id="responsibility_id"   class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
                    
                     

                     

                </div>

				
				
				
				<div class="col-md-12">

                    
                    <div class="form-group">
                        <?php echo form_submit('edit_manpower', $this->lang->line("edit_manpower"), 'class="btn btn-primary"'); ?>
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
 
