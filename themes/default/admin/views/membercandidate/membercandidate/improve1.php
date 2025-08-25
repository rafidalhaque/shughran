<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
if (!empty($variants)) {
    foreach ($variants as $variant) {
        $vars[] = addslashes($variant->name);
    }
} else {
    $vars = array();
}
?>
 
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'Membercandidate Improve'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo admin_form_open_multipart("membercandidate/add", $attrib)
                ?>

                <div class="col-md-6">
                     
                    <div class="form-group">
                        <?= lang("Manpower", "name") ?>
						 
                        <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ''), 'class="form-control" id="name" required="required"'); ?>
                    </div>
					
					
                   
                  
                    
					<div class="form-group">
                        <?= lang('sessionyear', 'sessionyear'); ?>
                        <?= form_input('sessionyear', set_value('sessionyear', ''), 'class="form-control tip" id="sessionyear"'); ?>
                    </div>

                     
					 
					  
					 
					 
					 
					   <div class="form-group">
                        <?= lang('education', 'education'); ?>
                        <?= form_input('education', set_value('education', ''), 'class="form-control tip" id="education"'); ?>
                    </div>
                      
					 
					
				 
					<div class="form-group">
                                    <?= lang("district", "district"); ?>
                                    <?php
                                    $dt[''] = lang('select').' '.lang('district');
                                    foreach ($districts as $district)   
                                        $dt[$district->id] = $district->name;
                                   
                                    echo form_dropdown('district', $dt, (isset($_POST['district']) ? $_POST['district'] : ''), 'id="district" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
					
					
					
					<div class="form-group">
                                    <?= lang("Responsibility", "responsibility"); ?>
                                    <?php
                                    $rt[''] = lang('select').' '.lang('responsibility');
                                    foreach ($responsibilities as $responsibility)   
                                        $rt[$responsibility->id] = $responsibility->responsibility;
                                   
                                    echo form_dropdown('responsibility_id', $rt, (isset($_POST['responsibility_id']) ? $_POST['responsibility_id'] : ''), 'id="responsibility_id"   class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
					
                    
                </div>
               

                <div class="col-md-6">
                     
                   
					
					
                   <div class="form-group">
                        <?php echo lang('Oath date', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control date" id="date" required="required"'); ?>
                        </div>
                    </div>

                  
                    
					 
                     
					 
					 <div class="form-group">
					 <?= lang('Student life', 'studentlife'); ?>
					 
				<div class="radio">	 
                <input type="radio" class="checkbox" name="studentlife" value="1"
                       id="running" <?= 1 ? 'checked="checked"' : ''; ?>/>
				  <label for="running" class="padding05"><?= 'Running' ?></label>
				</div>	
					
					<div class="radio">	
                <input type="radio" class="checkbox" name="studentlife" value="2"
                       id="completed" <?= 0 ? 'checked="checked"' : ''; ?>>
					   <label for="completed"  class="padding05"><?= 'Completed' ?></label>
                
						</div>
					</div>
					 
					 
					  
                      
					 
					
					<div class="form-group">
                                    <?= lang("branch", "branch"); ?>
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
                                    echo form_dropdown('branch', $wh, (isset($_POST['branch']) ? $_POST['branch'] : ''), 'id="branch" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
					
					
					
					
					
					
                    
                </div>
                
				
				
				
				<div class="col-md-12">
                     

                   
                    

                    <div class="form-group all">
                        <?= lang("notes", "notes") ?>
                        <?= form_textarea('notes', (isset($_POST['notes']) ? $_POST['notes'] : ''), 'class="form-control" id="notes"'); ?>
                    </div>
                    

                    <div class="form-group">
                        <?php echo form_submit('add_manpower', 'Save', 'class="btn btn-primary"'); ?>
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
      
         

		 
 $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="token"]').attr('content')
    }
});
		 
	 
        
   

        
         
   
  

        var _URL = window.URL || window.webkitURL;
        
        var variants = <?=json_encode($vars);?>;
       
   
       

        
        
    });

 
    
    
     
</script>

 