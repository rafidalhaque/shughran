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
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'সদস্য output'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'autocomplete'=>'off');
                echo admin_form_open_multipart("manpower/memberoutput/".$memberlog->id, $attrib);
				echo form_hidden('logid', $memberlog->id );
                ?>

                <div class="col-md-5">
                     
                    <div >
                        <?=  'সদস্যর নাম'; ?>
						 :
                         <?=   $manpower->name; ?>
						 
                    </div>
					
					
                     
                    
                </div>
               

               



                <div class="col-md-12" >


                <div class="form-group all">
                        <?= lang('শিক্ষাপ্রতিষ্ঠানের ধরন', 'institution_type'); ?>
                          
                                    <?php
                                    $it[''] = lang('select').' '.lang('institution_type');
                                    foreach ($institution_types as $institution_type)   
                                        $it[$institution_type->id] = $institution_type->institution_type;
                                   //$manpower->institution_type
                                    echo form_dropdown('institution_type', $it, '' , 'id="institution_type"  class="form-control skip" style="width:100%;" required="required" ');
                                    ?>
                    </div>
                      

                      
                       
   
  
                  </div>


                <div class="col-md-12" >
                      

                      <div class="form-group all" id="institution">
                        
                        
                      </div>
                       
   
  
                  </div>
  
  
  
 



                <div class="col-md-12">
                      
                     <div class="form-group">
                         <?php echo form_submit('Update', 'Save', 'class="btn btn-primary"'); ?>
                     </div>
 
                 </div>










                <?= form_close(); ?>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

var member_single_digit = '<?php echo $memberlog->member_single_digit;?>'
 
var member_jsc_jdc = '<?php echo $memberlog->member_jsc_jdc;?>'
 
var member_ssc_dhakil = '<?php echo $memberlog->member_ssc_dhakil;?>'
 
var member_hsc_alim = '<?php echo $memberlog->member_hsc_alim;?>'
 
var member_department_position = '<?php echo $memberlog->member_department_position;?>'
 
var member_department_position_private = '<?php echo $memberlog->member_department_position_private;?>'
 
var member_influential = '<?php echo $memberlog->member_influential;?>'
 
var member_hc_science = '<?php echo $memberlog->member_hc_science;?>'
 
var member_madrasha = '<?php echo $memberlog->member_madrasha;?>'
 
var member_medical_college = '<?php echo $memberlog->member_medical_college;?>'
 
var member_ideal_college = '<?php echo $memberlog->member_ideal_college;?>'
 
var member_engineeering = '<?php echo $memberlog->member_engineeering;?>'
 
var member_agri = '<?php echo $memberlog->member_agri;?>'
 
var member_science = '<?php echo $memberlog->member_science;?>'
 
var member_business = '<?php echo $memberlog->member_business;?>'
 
var member_arts = '<?php echo $memberlog->member_arts;?>'





    $(document).ready(function () {
        $('form[data-toggle="validator"]').bootstrapValidator({ excluded: [':disabled'] });
        var audio_success = new Audio('<?= $assets ?>sounds/sound2.mp3');
        var audio_error = new Audio('<?= $assets ?>sounds/sound3.mp3');
      
       // var memberlog = '<?php echo  json_encode($memberlog);?>';

		 
 $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="token"]').attr('content')
    }
});
		 
	 
	 
 $('#institution_type').val(<?=$manpower->institution_type; ?>);
		 
 $.ajax({
            type: "get", async: false,
            url: "<?=admin_url('manpower/manpower_institution/')?>"+<?=$manpower->institution_type; ?> ,
            dataType: "json",
            success: function (data) {
               
                $('#institution').html(data.html); 
                
                if(member_single_digit==1)
                    $("input[name='member_single_digit']").prop("checked", true);
                if(member_jsc_jdc==1)
                    $("input[name='member_jsc_jdc']").prop("checked", true);
                if(member_ssc_dhakil==1)
                    $("input[name='member_ssc_dhakil']").prop("checked", true);
                if(member_hsc_alim==1)
                    $("input[name='member_hsc_alim']").prop("checked", true);
                if(member_department_position==1)
                    $("input[name='member_department_position']").prop("checked", true);
                if(member_department_position_private==1)
                    $("input[name='member_department_position_private']").prop("checked", true);  
                if(member_influential==1)
                    $("input[name='member_influential']").prop("checked", true);
                if(member_hc_science==1)
                    $("input[name='member_hc_science']").prop("checked", true);
                if(member_madrasha==1)
                    $("input[name='member_madrasha']").prop("checked", true);
                if(member_medical_college==1)
                    $("input[name='member_medical_college']").prop("checked", true);
                if(member_ideal_college==1)
                    $("input[name='member_ideal_college']").prop("checked", true);
                if(member_engineeering==1)
                    $("input[name='member_engineeering']").prop("checked", true); 
                    
                if(member_agri==1)
                    $("input[name='member_agri']").prop("checked", true);
                if(member_science==1)
                    $("input[name='member_science']").prop("checked", true);
                if(member_business==1)
                    $("input[name='member_business']").prop("checked", true);
                if(member_arts==1)
                    $("input[name='member_arts']").prop("checked", true);   

				
            }
        });
		
		
		


$('#institution_type').on('change', function (e) {
    console.log(this.value );
  
 
$.ajax({
            type: "get", async: false,
            url: "<?=admin_url('manpower/manpower_institution/')?>"+this.value ,
            dataType: "json",
            success: function (data) {
               
                $('#institution').html(data.html); 
                

                if(member_single_digit==1)
                    $("input[name='member_single_digit']").prop("checked", true);
                if(member_jsc_jdc==1)
                    $("input[name='member_jsc_jdc']").prop("checked", true);
                if(member_ssc_dhakil==1)
                    $("input[name='member_ssc_dhakil']").prop("checked", true);
                if(member_hsc_alim==1)
                    $("input[name='member_hsc_alim']").prop("checked", true);
                if(member_department_position==1)
                    $("input[name='member_department_position']").prop("checked", true);
                if(member_department_position_private==1)
                    $("input[name='member_department_position_private']").prop("checked", true);  
                if(member_influential==1)
                    $("input[name='member_influential']").prop("checked", true);
                if(member_hc_science==1)
                    $("input[name='member_hc_science']").prop("checked", true);
                if(member_madrasha==1)
                    $("input[name='member_madrasha']").prop("checked", true);
                if(member_medical_college==1)
                    $("input[name='member_medical_college']").prop("checked", true);
                if(member_ideal_college==1)
                    $("input[name='member_ideal_college']").prop("checked", true);
                if(member_engineeering==1)
                    $("input[name='member_engineeering']").prop("checked", true); 
                    
                if(member_agri==1)
                    $("input[name='member_agri']").prop("checked", true);
                if(member_science==1)
                    $("input[name='member_science']").prop("checked", true);
                if(member_business==1)
                    $("input[name='member_business']").prop("checked", true);
                if(member_arts==1)
                    $("input[name='member_arts']").prop("checked", true);

            }
        });

    });
 
  




        var _URL = window.URL || window.webkitURL;
        
        var variants = <?=json_encode($vars);?>;
       
   
       

        
        
    });

 
    
    
     
</script>

 