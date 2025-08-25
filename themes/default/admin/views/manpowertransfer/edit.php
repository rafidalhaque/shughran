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
                <p class="introtext hidden"><?php echo lang('update_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo admin_form_open_multipart("manpower/edit/" . $manpower->id, $attrib)
                ?>
                <div class="col-md-5">
                    
                    <div class="form-group all">
                        <?= lang("নাম ", "name") ?>
                        <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ($manpower ? $manpower->name : '')), 'class="form-control" id="name" required="required"'); ?>
                    </div>
                    

                     
                    <div class="form-group all">
                        <?= lang('সেশন', 'sessionyear'); ?>
                        <?= form_input('sessionyear', set_value('sessionyear', ($manpower ? $manpower->sessionyear : '')), 'class="form-control tip" id="sessionyear"'); ?>
                    </div>

                     
                    
                     <div class="form-group all">
					 <?= lang('ছাত্র জীবন', 'studentlife'); ?>
					 
				<div class="radio">	 
                <input type="radio" class="checkbox" name="studentlife" value="1"
                       id="running" <?= $manpower->studentlife == 1 ? 'checked="checked"' : ''; ?>/>
				  <label for="running" class="padding05"><?= 'অব্যাহত ' ?></label>
				</div>	
					
					<div class="radio">	
                <input type="radio" class="checkbox" name="studentlife" value="2"
                       id="completed" <?= $manpower->studentlife == 2 ? 'checked="checked"' : ''; ?>>
					   <label for="completed"  class="padding05"><?= 'শেষ ' ?></label>
                
						</div>
					</div>
					
					
					
					
                     
                     <div class="form-group all">
                        <?= lang('শিক্ষা ', 'education'); ?>
                        <?= form_input('education', set_value('education', ($manpower ? $manpower->education : '')), 'class="form-control tip" id="education"'); ?>
                    </div>
                     
                     
                     
                     
                     

                     

                     

                  

                    
                     

                    <div class="form-group all">
                        <?= lang("manpower_image", "manpower_image") ?>
                        <input id="manpower_image" type="file" data-browse-label="<?= lang('browse'); ?>" name="manpower_image" data-show-upload="false"
                               data-show-preview="false" accept="image/*" class="form-control file">
                    </div>

                    
                     
                </div>
                <div class="col-md-6 col-md-offset-1">
                    
                    

                     

                     

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
 
