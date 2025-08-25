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
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'সদস্য মানোন্নয়ন'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
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
                            <?php echo form_input('date', '', 'class="form-control date" id="date" required="required"'); ?>
                        </div>
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
         

        
         
   
  

        var _URL = window.URL || window.webkitURL;
        
        var variants = <?=json_encode($vars);?>;
       
   
       

        
        
    });

 
    
    
     
</script>

 