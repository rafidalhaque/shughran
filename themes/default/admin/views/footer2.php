<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//var_dump($m);

?>

<div class="clearfix"></div>
<?= '</div></div></div></td></tr></table></div></div>'; ?>
<div class="clearfix"></div>
<footer>
<a href="#" id="toTop" class="blue" style="position: fixed; bottom: 30px; right: 30px; font-size: 30px; display: none;">
    <i class="fa fa-chevron-circle-up"></i>
</a>

    <p style="text-align:center;">&copy; <?= date('Y') . " " . $Settings->site_name; ?> (<a href="<?= base_url('documentation.pdf'); ?>" target="_blank">v<?= $Settings->version; ?></a>
        ) <?php if ($_SERVER["REMOTE_ADDR"] == '127.0.0.1') {
            echo ' - Page rendered in <strong>{elapsed_time}</strong> seconds';
        } ?></p>
</footer>
<?= '</div>'; ?>
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div class="modal fade in" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true"></div>
<div id="modal-loading" style="display: none;">
    <div class="blackbg"></div>
    <div class="loader"></div>
</div>
<div id="ajaxCall"><i class="fa fa-spinner fa-pulse"></i></div>
<?php unset($Settings->setting_id, $Settings->smtp_user, $Settings->smtp_pass, $Settings->smtp_port, $Settings->update, $Settings->reg_ver, $Settings->allow_reg, $Settings->default_email, $Settings->mmode, $Settings->timezone, $Settings->restrict_calendar, $Settings->restrict_user, $Settings->auto_reg, $Settings->reg_notification, $Settings->protocol, $Settings->mailpath, $Settings->smtp_crypto, $Settings->corn, $Settings->customer_group, $Settings->envato_username, $Settings->purchase_code); ?>
<script type="text/javascript">
var dt_lang = <?=$dt_lang?>, dp_lang = <?=$dp_lang?>, site = <?=json_encode(array('url' => base_url(), 'base_url' => admin_url(), 'assets' => $assets, 'settings' => $Settings, 'dateFormats' => $dateFormats))?>;
var lang = {paid: '<?=lang('paid');?>', pending: '<?=lang('pending');?>', completed: '<?=lang('completed');?>', ordered: '<?=lang('ordered');?>', received: '<?=lang('received');?>', partial: '<?=lang('partial');?>', sent: '<?=lang('sent');?>', r_u_sure: '<?=lang('r_u_sure');?>', due: '<?=lang('due');?>', returned: '<?=lang('returned');?>', transferring: '<?=lang('transferring');?>', active: '<?=lang('active');?>', inactive: '<?=lang('inactive');?>', unexpected_value: '<?=lang('unexpected_value');?>', select_above: '<?=lang('select_above');?>', download: '<?=lang('download');?>'};
</script>
<?php
$s2_lang_file = read_file('./assets/config_dumps/s2_lang.js');
foreach (lang('select2_lang') as $s2_key => $s2_line) {
    $s2_data[$s2_key] = str_replace(array('{', '}'), array('"+', '+"'), $s2_line);
}
$s2_file_date = $this->parser->parse_string($s2_lang_file, $s2_data, true);
?>
<script type="text/javascript" src="<?= $assets ?>js/bootstrap.min.js"></script>
 
<script type="text/javascript" src="<?= $assets ?>js/select2.min.js"></script>
 
 <script type="text/javascript" src="<?= $assets ?>js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?= $assets ?>js/dataTables.fixedColumns.js"></script>
 
 
 	
 <script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>	
<script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>	
<script type="text/javascript" src="//unpkg.com/blob.js@1.0.1/Blob.js"></script>	
<script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script> 
 
<?= 1 ? '<script type="text/javascript" src="' . $assets . 'plugins/xedit/bootstrap3-editable/js/bootstrap-editable.min.js"></script>' : ''; ?>
 

 
 

<script type="text/javascript" charset="UTF-8">var oTable = '', r_u_sure = "<?=lang('r_u_sure')?>";
    <?=$s2_file_date?>
    
    
    $(window).load(function () {
        $('.mm_<?=$m?>').addClass('active');
        $('.mm_<?=$m?>').find("ul").first().slideToggle();
        $('#<?=$m?>_<?=$v?>').addClass('active');
        $('.mm_<?=$m?> a .chevron').removeClass("closed").addClass("opened");
    });
</script>

 



<script type="text/javascript" charset="UTF-8">
    $(function() {
        $("li.dropdown").hover(
            function(){ $(this).addClass('open') },
            function(){ $(this).removeClass('open')
            });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="token"]').attr('content')
        }
    });
    (function() {
        var original = $.fn.editableutils.setCursorPosition;
        $.fn.editableutils.setCursorPosition = function() {
            try {
                original.apply(this, Array.prototype.slice.call(arguments));
            } catch (e) { /* noop */ }
        };
    })();

	 

    $(document).ready(function() {
		
		<?php if( $this->input->get('type')  ) {?>
		
		$('.editable').addClass('disabled');
		$('.editable').click(function(e) {
			e.preventDefault();
    
		});
		<?php }?>
		
		
		
		
        <?php if(  ($this->input->get('type') !='annual' && $this->input->get('type') !='half_yearly' )&&  (  ($this->Owner || $this->Admin) ||  $this->session->userdata('group_id')== 8 || ( $entry_permission !=false)  )) {?>
             $('.editable').editable({
				 mode:'inline',
				 showbuttons: false,
                 params: function(params) {
                     // add additional params from data-attributes of trigger element
                     params.table = $(this).editable().data('table');
                     params.id = $(this).editable().data('id');
                     params.idname = $(this).editable().data('idname');
                     params.branch_id =  <?php echo isset($branch->id) ? $branch->id : "''";?>;
                     params.token = $("meta[name=token]").attr("content");
                     return params;
                 },
                 success: function (response , config) {
                     
                    console.log(config.error);

                      var data = $.parseJSON(response);
                      if(data.flag==3)
                          location.reload();
                      else if(data.flag==1) {
                        // config.error.call(this, data.msg);
                         alert(data.msg);
                        // location.reload();
                      }
                  },
                 error: function (response) {
                     console.log(response);
                 }
             });
	
	
              
	
	
	 $('.yes_no').editable(
				{
					mode:'inline',
					 prepend: "not selected",
				inputclass: 'form-control',
				source: [{
					value: 'Yes',
					text: 'Yes'
				}, {
					value: 'No',
					text: 'No'
				}],	
                
				params: function(params) {
                     // add additional params from data-attributes of trigger element
                     params.table = $(this).editable().data('table');
                     params.id = $(this).editable().data('id');
                     params.idname = $(this).editable().data('idname');
                     params.branch_id =  <?php echo isset($branch->id) ? $branch->id : "''";?>;
                     params.token = $("meta[name=token]").attr("content");
                     return params;
                 },
                 success: function (response) {  console.log('test',response);
                     var data = $.parseJSON(response);
                     if(data.flag==3)
                         location.reload();
                     else if(data.flag==1)
                         alert(data.msg);
                 },
                 error: function (response) {
                     console.log(response);
                 } 
             }
	 
	 
	 
	 
	 
	 
	  );
	
	
     
	
	
	
	
	
	
	
	
        <?php } else if($this->input->get('type') !='annual' &&  $this->input->get('type') !='half_yearly' ) { ?>

        $('.editable').click(function(e) {
            e.preventDefault();
			 
        });
		 
        <?php } ?>

        function sumcols(class_name,target_name){
			
            var totalPrice = 0;
            $("."+class_name).each(function(){
                if(!isNaN(parseInt($(this).text())))
                    totalPrice += parseInt($(this).text());
            });
            $("."+target_name).html(totalPrice);
        }
        for (i = 1; i < 36; i++) {
            sumcols('type_'+i,'total_'+i);
		} 
        Finalamount  = parseInt($('.income').text())-parseInt($('.total_2').text());
        $(".Finalamount").html(Math.abs(Finalamount));
		 $("#Finalamount_label").html(Finalamount > 0 ? 'উদ্বৃত্ত=' : 'ঘাটতি =' );
        $(".fa-barcode").click(function(e) {
            window.open('data:application/vnd.ms-excel,' + $("#testTable").html());
            e.preventDefault();
        });
    });
	
	
	
	
	
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
	//	order: [],
		info: false,
		ordering: false,
		"columnDefs": [
			{ className: "dt-body-center", "targets": [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34 ] }
		  ]
  
  
    } );
    new $.fn.dataTable.FixedColumns( table );
} );
	
  
 	
	
	jQuery(document).ready(function(e) {
    e("#main-menu-act").click(function() {
        if (e(this).hasClass("full")) {
            //$.cookie('sma_sidebar', 'minified', { path: '/' });
            e(this).removeClass("full").addClass("minified").find("i").removeClass("fa-angle-double-left").addClass("fa-angle-double-right");
            e("body").addClass("sidebar-minified");
            e("#content").addClass("sidebar-minified");
            e("#sidebar-left").addClass("minified");
            e(".dropmenu > .chevron").removeClass("opened").addClass("closed");
            e(".dropmenu").parent().find("ul").hide();
            e("#sidebar-left > div > ul > li > a > .chevron").removeClass("closed").addClass("opened");
            e("#sidebar-left > div > ul > li > a").addClass("open");
            $('#fixed').hide();
        } else {
            //$.cookie('sma_sidebar', 'full', { path: '/' });
            e(this).removeClass("minified").addClass("full").find("i").removeClass("fa-angle-double-right").addClass("fa-angle-double-left");
            e("body").removeClass("sidebar-minified");
            e("#content").removeClass("sidebar-minified");
            e("#sidebar-left").removeClass("minified");
            e("#sidebar-left > div > ul > li > a > .chevron").removeClass("opened").addClass("closed");
            e("#sidebar-left > div > ul > li > a").removeClass("open");
            $('#fixed').show();
        }
        return false;
    });
	 });
	 
	 
	 function doit(type, id, fn, dl) {	
	var elt = document.getElementById(id);	
	var file_name = document.getElementById(id).getAttribute('data-branch');	
	var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet 1"});	
	return dl ?	
		XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :	
		 
		XLSX.writeFile(wb, fn || (file_name+'.' + (type || 'xlsx')));
}	
	var path = window.location.href;
	$(".box-header a[href='"+path+"']").addClass("btn btn-primary disabled");
	//$('a[href^="'+document.location+'"]').addClass("");
	
	$(function(){
      // bind change event to select
      $('#nav_branch_id').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
	
</script>
</body>
</html>
