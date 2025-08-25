<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>@font-face {
  font-family: 'SolaimanLipi';
  src: url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.eot');
  src: url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.woff') format('woff'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.ttf') format('truetype'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.svg#SolaimanLipiNormal') format('svg'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}
#institution {
    font-family:  SolaimanLipi;
}

#institution td{ padding:2px; text-align: center;}
</style> 

<style>
 .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    cursor: text;
    background-color: #fff;
    opacity: 1;
}
 
 </style>


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
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'সদস্য মানোন্নয়ন'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'autocomplete'=>'off');
                echo admin_form_open_multipart("manpower/add", $attrib)
                ?>

                <div class="col-md-5">
                     
                    <div class="form-group">
                        <?= lang("সদস্য প্রার্থীর নাম", "manpower_id") ?>
						 
                        <?= form_input('manpower_id', (isset($_POST['manpower_id']) ? $_POST['name'] : ''), 'class="form-control" id="manpower_id" required="required"'); ?>
                    </div>
					
					
                   <div class="form-group">
                        <?php echo lang('শপথের তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date"  readonly required="required"'); ?>
                        </div>
                    </div>

                  
                    
 
				 
                      
					
					
					 
					 
								
						 		
				 
								
						 	

					 
						 
					
					 
					
					 
                    
                </div>
               

               



                <div class="col-md-12" >


                <div class="form-group all">
                        <?= lang('শিক্ষাপ্রতিষ্ঠানের ধরন', 'institution_type'); ?>
                          
                                    <?php
                                    $it[''] = lang('select').' '.lang('institution_type');
                                    foreach ($institution_types as $institution_type)   
                                        $it[$institution_type->id] = $institution_type->institution_type;
                                   
                                    echo form_dropdown('institution_type', $it, ( ''), 'id="institution_type"  class="form-control select" style="width:100%;" required="required" ');
                                    ?>
                    </div>
                      

                      
                       
   
  
                  </div>


                <div class="col-md-12" >
                      

                      <div class="form-group all" id="institution">
                        
                        
                      </div>
                       
   
  
                  </div>
  
  
  

                  <div class="col-md-12">
                      

                      <div class="form-group all">
                          <?= lang("মন্তব্য", "মন্তব্য") ?>
                          <?= form_textarea('notes', (isset($_POST['notes']) ? $_POST['notes'] : ''), 'class="form-control" id="notes"'); ?>
                      </div>
                       
   
  
                  </div>



                <div class="col-md-12">
                      
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
		 
	 
        
  $('#manpower_id').select2({
            minimumInputLength: 1,
            data: [],
            initSelection: function (element, callback) {
                $.ajax({
                    type: "get", async: false,
                    url: "<?=admin_url('manpower/getName/')?>"+$(element).val(),
                    dataType: "json",
                    success: function (data) {
					callback(data[0]);	
						 
                    }
                });
            },
            ajax: {
                url: site.base_url + "manpower/suggestions",
                dataType: 'json',
                quietMillis: 15,
                data: function (term, page) {
                    return {
                        term: term,
						token: $("meta[name=token]").attr("content"),
                        limit: 20
                    };
                },
                results: function (data, page) {
					 
					 if (data != null) {
                        return {results: data};
                    } else {
                        return {results: [{id: '', text: 'No Match Found'}]};
                    }
                     
                }
            } 
             
        });
         

        $('#manpower_id').on('select2-selecting', function (e) {
    
     var institution_type_id = e.object.institution_type;
     $.ajax({
                    type: "get", async: false,
                    url: "<?=admin_url('manpower/manpower_institution/')?>"+institution_type_id,
                    dataType: "json",
                    success: function (data) {
                       
					$('#institution_type').val(institution_type_id); // Select the option with a value of '1'
                    $('#institution_type').trigger('change'); // Notify any JS components that the value changed



                    //institution_type_id
                    $('#institution').html(data.html); 



                    }
                });

});
     


$('#institution_type').on('select2-selecting', function (e) {
    
   
//var institution_type_id = e.val;
$.ajax({
            type: "get", async: false,
            url: "<?=admin_url('manpower/manpower_institution/')?>"+e.val,
            dataType: "json",
            success: function (data) {
               
                $('#institution').html(data.html); 
            }
        });

    });
  

        var _URL = window.URL || window.webkitURL;
        
        var variants = <?=json_encode($vars);?>;
       
   
       

        
        
    });

 
    
    
     
</script>

 