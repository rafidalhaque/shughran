<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
 
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('add_page'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo admin_form_open_multipart("pages/add", $attrib)
                ?>

                <div class="col-md-5">
                     
                    <div class="form-group all">
                        <?= lang("page_title", "title") ?>
                        <?= form_input('title', (isset($_POST['title']) ? $_POST['title'] : ($page ? $page->title : '')), 'class="form-control" id="title" required="required"'); ?>
                    </div>
                    
					
					<div class="form-group all">
                        <?= lang("priority", "priority") ?>
                        <?= form_input('priority', (isset($_POST['priority']) ? $_POST['priority'] : ($page ? $page->priority : '')), 'class="form-control" id="priority"  ') ?>
                     </div>

                    

                    
 
                    <div class="form-group">
                        <input type="checkbox" class="checkbox" value="1" name="status" id="status" <?= $this->input->post('status') ? 'checked="checked"' : ''; ?>>
                        <label for="status" class="padding05">
                            <?= lang('status'); ?>
                        </label>
                    </div>
                   
 

                     
					
					
					
					 
					
					
					

                  
					
					
					
					 
					
					
					

                   

                    
                     
                </div>
                <div class="col-md-6 col-md-offset-1">
                     
                    

                     

                 <div class="form-group all">
                        <?= lang("page_image", "page_image") ?>
                        <input id="page_image" type="file" data-browse-label="<?= lang('browse'); ?>" name="page_image" data-show-upload="false"
                               data-show-preview="true" accept="image/*" class="form-control file">
                    </div>

					 
					
					
					
                </div>

                <div class="col-md-12">
                    
                    

                     
                    

                    <div class="form-group all">
                        <?= lang("Detail", "Detail") ?>
                        <?= form_textarea('notes', (isset($_POST['notes']) ? $_POST['notes'] : ($page ? $page->notes : '')), 'class="form-control skip" id="notes"'); ?>
                    </div>
                    
					
					
					
					
					
					
					

                    <div class="form-group">
                        <?php echo form_submit('add_page', $this->lang->line("add_page"), 'class="btn btn-primary"'); ?>
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
      
        <?=isset($_POST['cf']) ? '$("#extras").iCheck("check");': '' ?>
         

       
        //$('#cost').removeAttr('required');
       
       
 
 
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
        
  
         
        var row;
        

        $('#aModal').on('shown.bs.modal', function () {
            $('#aquantity').focus();
            $(this).keypress(function( e ) {
                if ( e.which == 13 ) {
                    $('#updateAttr').click();
                }
            });
        });
         
    });

    <?php if ($page) { ?>
    $(document).ready(function () {
          
        
       
        $("#page_image").parent('.form-group').addClass("text-warning");
        $("#images").parent('.form-group').addClass("text-warning");
         
        
        
        
        
        

        var whs = $('.wh');
        $.each(whs, function () {
            $(this).val($('#r' + $(this).attr('id')).text());
        });
    });
    <?php } ?>
  
</script>

 
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>
  tinymce.init({ selector:'textarea' ,
   plugins: "code link",
  toolbar_drawer: 'floating',
  toolbar: 'undo redo | styleselect | alignleft aligncenter alignright | bold italic underline | link | superscript subscript code | image'
  });
  </script>