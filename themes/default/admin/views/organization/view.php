<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.table td.text-right {
     text-align: right;  
}
.table td.text-left {
     text-align: left;  
}
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $title;?></h4>
        </div>
        
       
		<div class="modal-body">
           

            <div class="row">

                 
				
				<div class="col-md-6 col-sm-6">
                     

               <h1>  Detail Here</h1>

               <table class="table table-hover">
                  <?php foreach($institution as $key=>$item){?>
               <tr><td class="text-right"><?php echo $key;?></td><td class="text-left"><?php echo $item;?></td></tr>

               <?php }?>

               </table>

 
                  
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
 
 