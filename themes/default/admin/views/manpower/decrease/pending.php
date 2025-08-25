<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $title;?></h4>
        </div>
        
       
		<div class="modal-body">
           

            <div class="row">

                 
				
				<div class="col-md-12 col-sm-12">
                     

                   <?php 
				   echo $msg;
					?>				   

                  
                </div>
				
				
				<div class="col-md-6 col-sm-6">
                     
                 
                  
                </div>
                 
                 
            </div>
			
			
		 




	 
				 
				 
				 
        </div>
        <div class="modal-footer">
             
        </div>
    </div>
   
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
