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
<script type="text/javascript">
</script>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-edit"></i><?= lang('edit_page'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php echo lang('update_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo admin_form_open_multipart("pages/edit/" . $page->id, $attrib)
                ?>
                <div class="col-md-5">
                    
                    <div class="form-group all">
                        <?= lang("page_title", "title") ?>
                        <?= form_input('title', (isset($_POST['title']) ? $_POST['title'] : ($page ? $page->title : '')), 'class="form-control" id="title" required="required"'); ?>
                    </div>
                     

                     
					 <div class="form-group all">
                        <?= lang("priority", "priority") ?>
                        <?= form_input('priority', (isset($_POST['priority']) ? $_POST['priority'] : ($page ? $page->priority : '')), 'class="form-control" id="priority" '); ?>
                    </div> 
					 
					 
					 
					  
                     
					<div class="form-group">
                        <input type="checkbox" class="checkbox" value="1" name="status" id="status" <?= empty($page->status) ? '' : 'checked="checked"' ?>/>
                        <label for="status" class="padding05">
                            <?= lang('status'); ?>
                        </label>
                    </div> 
					 
					 
					  
					 
					
					
                    <div class="form-group all">
                        <?= lang("page_image", "page_image") ?>
                        <input id="page_image" type="file" data-browse-label="<?= lang('browse'); ?>" name="page_image" data-show-upload="false"
                               data-show-preview="false" accept="image/*" class="form-control file">
                    </div>

                     
                </div>
                

                <div class="col-md-12">

                      <div class="form-group all">
                        <?= lang("Detail", "Detail") ?>
                        <?= form_textarea('notes', (isset($_POST['notes']) ? $_POST['notes'] : ($page ? $this->sma->decode_html($page->notes) : '')), 'class="form-control skip" id="notes"'); ?>
                    </div>
                    

					 
					
						 
					
                    <div class="form-group">
                        <?php echo form_submit('edit_page', $this->lang->line("edit_page"), 'class="btn btn-primary"'); ?>
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
         
       
 

        

        
        $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'add_item');

       

        var su = 2;
        

        var _URL = window.URL || window.webkitURL;
       
       
         
        var row; 
        $(document).on('click', '.attr td:not(:last-child)', function () {
            row = $(this).closest("tr");
            $('#aModalLabel').text(row.children().eq(0).find('span').text());
            $('#awarehouse').select2("val", (row.children().eq(1).find('input').val()));
            $('#aquantity').val(row.children().eq(2).find('span').text());
            $('#aprice').val(row.children().eq(3).find('span').text());
            $('#aModal').appendTo('body').modal('show');
        });

        
    });

     
     
</script>
 
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>
  tinymce.init({ selector:'textarea' ,
   plugins: "code",
  toolbar_drawer: 'floating',
  toolbar: 'undo redo | styleselect | alignleft aligncenter alignright | bold italic underline | superscript subscript code | link image'
  });
  </script>