<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'মুলতবি   ' . " (" . $manpower->associatecode . ")"; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form','id'=>'membercandidatepostpone', 'autocomplete'=>'off');
        echo admin_form_open_multipart("membercandidate/membercandidatepostpone/" . $manpower->id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $manpower->branch; ?>" name="branch_id"/>
		<input type="hidden" value="<?php echo $manpower->id; ?>" name="manpower_id"/>
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				
				<div class="col-md-6 col-sm-6">
                     

                    <div class="form-group">
                        <?php echo lang('তারিখ ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>

                  
                </div>
				
				
				<div class="col-md-6 col-sm-6">
                     
               
                  
                </div>
                 
                 
            </div>
 <div class="row">
<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("note", "note"); ?>
                        <?php echo form_textarea('note', '', 'class="form-control" id="note" style="height:100px;"'); ?>
                    </div>
                </div>
				 </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('membercandidatepostpone', 'Submit', 'class="btn btn-primary memberdecrease"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

<script>

 
 $("#decrease_member1").submit(function(e) {


    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               console.log(data); // show response from the php script.
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
 
 

  
 
</script>
