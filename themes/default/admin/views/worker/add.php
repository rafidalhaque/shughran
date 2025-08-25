<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
	.form-control[disabled],
	.form-control[readonly],
	fieldset[disabled] .form-control {
		cursor: text;
		background-color: #fff;
		opacity: 1;
	}
</style>



<div class="box">
	<div class="box-header">
		<h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'কর্মী ঘাটতি'; ?></h2>
	</div>
	<div class="box-content">
		<div class="row">
			<div class="col-lg-12">

				<p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

				<?php
				$process_id =   $this->uri->segment(4);
				$attrib = array('data-toggle' => 'validator', 'role' => 'form', 'autocomplete' => 'off');
				echo admin_form_open_multipart("worker/add/" . $process_id, $attrib, array('process_id' => $process_id));


				?>

				<div class="col-md-6">
					<?php if (in_array($process_id, array(10, 9, 14, 11))) { ?>
						<div class="form-group">
							<?= lang("নাম", "name") ?>

							<?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ''), 'class="form-control" id="name" required="required"'); ?>
						</div>

					<?php } ?>





					<?php if (in_array($process_id, array(10, 9, 14, 11))) { ?>
						<div class="form-group">
							<?= lang("সর্বশেষ দায়িত্ব", "responsibility"); ?>

							<?php
							$wrt[''] = lang('select') . ' ' . lang('responsibility');
							foreach ($responsibilities as $responsibility) {

								if (strpos($responsibility->orgstatus_id, '3,') !== false)
									$wrt[$responsibility->id] = $responsibility->responsibility;
							}

							echo form_dropdown('responsibility', $wrt, (isset($_POST['responsibility']) ? $_POST['responsibility'] : ''), 'id="responsibility"   class="form-control select" style="width:100%;" required="required" ');
							?>


							<?php  //echo  form_input('responsibility', (isset($_POST['responsibility']) ? $_POST['responsibility'] : ''), 'class="form-control" id="responsibility" '); 
							?>




						</div>

					<?php } ?>



				</div>


				<div class="col-md-6">


					<?php if (in_array($process_id, array(10, 9, 14, 11))) { ?>

						<div class="form-group">
							<?php echo lang('তারিখ', 'date'); ?>
							<div class="controls">
								<?php echo form_input('date', '', 'class="form-control fixed_date" id="date" required="required" readonly="readonly"'); ?>
							</div>
						</div>
					<?php } ?>









					<?php if (in_array($process_id, array(10, 9, 14, 11))) { ?>


						<div class="form-group">
							<?= lang("শাখা", "branch"); ?>
							<?php
							$wh[''] = lang('select') . ' ' . lang('branch');
							if ($this->Admin || $this->Owner)
								$flag = 1;
							else
								$flag = 2;
							foreach ($branches as $branch) {
								if ($flag == 1)
									$wh[$branch->id] = $branch->name;
								elseif ($branch->id == $this->session->userdata('branch_id'))
									$wh[$branch->id] = $branch->name;
							}
							echo form_dropdown('branch', $wh, (isset($_POST['branch']) ? $_POST['branch'] : ''), 'id="branch" required="required" class="form-control select" style="width:100%;" ');
							?>
						</div>


					<?php } ?>







				</div>









				<hr style="clear:both" />





				<div class="col-md-6">










					<?php if (in_array($process_id, array(14, 11))) { ?>
						<div class="form-group all">
							<?= lang("মোবাইল নং", "mobile") ?>
							<?= form_input('mobile', (isset($_POST['mobile']) ? $_POST['mobile'] : ('')), 'class="form-control" id="mobile" required="required" '); ?>
						</div>
					<?php } ?>

					<?php if (in_array($process_id, array(11))) { ?>
						<div class="form-group all">
							<?= lang("ইমেইল", "email") ?>
							<?= form_input('email', (isset($_POST['email']) ? $_POST['email'] : ('')), 'class="form-control" id="email" required="required" '); ?>
						</div>
					<?php } ?>


					<?php if (in_array($process_id, array(11))) { ?>
						<div class="form-group all">
							<?= lang("শিক্ষা প্রতিষ্ঠানের নাম", "higher_education_institution") ?>
							<?= form_input('higher_education_institution', (isset($_POST['higher_education_institution']) ? $_POST['higher_education_institution'] : ('')), 'class="form-control" id="higher_education_institution"  required="required" '); ?>
						</div>
					<?php } ?>
					<?php if (in_array($process_id, array(11))) { ?>
						<div class="form-group all">
							<?= lang("উচ্চশিক্ষার ধরন", "type_higher_education") ?>
							<?= form_input('type_higher_education', (isset($_POST['type_higher_education']) ? $_POST['type_higher_education'] : ('')), 'class="form-control" id="type_higher_education"  required="required"'); ?>
						</div>
					<?php } ?>

					<?php if (in_array($process_id, array(14, 11))) { ?>
						<div class="form-group">
							<?= lang("দেশের নাম ", "foreign_country"); ?>
							<?php
							$ct[''] = lang('select') . ' ' . lang('country');
							foreach ($countries as $country)
								$ct[$country->id] = $country->name;

							echo form_dropdown('foreign_country', $ct, '', 'id="foreign_country"  class="form-control select" style="width:100%;" required="required" ');
							?>
						</div>
					<?php } ?>


					<?php if (in_array($process_id, array(14))) { ?>
						<div class="form-group all">
							<?= lang("শহরের নাম", "foreign_address") ?>
							<?= form_input('foreign_address', (isset($_POST['foreign_address']) ? $_POST['foreign_address'] : ''), 'class="form-control" id="foreign_address" required="required" '); ?>
						</div>
					<?php } ?>
					<?php if (in_array($process_id, array(14))) { ?>
						<div class="form-group all">
							<?= lang("পেশার ধরন", "type_of_profession") ?>
							<?= form_input('type_of_profession', (isset($_POST['type_of_profession']) ? $_POST['type_of_profession'] :  ''), 'class="form-control" id="type_of_profession" required="required" '); ?>
						</div>
					<?php } ?>
					<?php if (in_array($process_id, array(14, 11))) { ?>
						<div class="form-group all">


							<?= lang("ফোরামে যুক্ত হয়েছেন কিনা?", "is_forum") ?> <br />
							<input type="checkbox" class="checkbox" value="1" name="is_forum" id="is_forum" />


						</div>
					<?php } ?>



				</div>

				<div class="col-md-6">
					<div class="form-group">
						<?= lang('জনশক্তির মান', 'orgstatus_id'); ?>

						<div class="radio">
							<input type="radio" class="checkbox" name="orgstatus_id" value="13" id="associatecandidate" <?= 1 ? 'checked="checked"' : ''; ?> />
							<label for="associatecandidate" class="padding05"><?= 'সাথী প্রার্থী' ?></label>
						</div>

						<div class="radio">
							<input type="radio" class="checkbox" name="orgstatus_id" value="3" id="worker" <?= 0 ? 'checked="checked"' : ''; ?>>
							<label for="worker" class="padding05"><?= 'কর্মী ' ?></label>

						</div>
					</div>
				</div>





				<hr style="clear:both" />



				<div class="col-md-12">
					<div class="">


						<div class="col-md-5">
							<?php if (in_array($process_id, array(10))) { ?>
								<div class="form-group all">
									<?= lang("প্রতিপক্ষ", "opposition") ?>
									<?= form_input('opposition', (isset($_POST['opposition']) ? $_POST['opposition'] : ('')), 'class="form-control" required="required" id="opposition" '); ?>
								</div>
							<?php } ?>

							<?php if (in_array($process_id, array(10, 9))) { ?>
								<div class="form-group">

									<?= lang(($process_id == 10 ?  "শাহাদাতের " : "ইন্তেকালের   ")  . "তারিখ", "date_death"); ?>
									<?= form_input('date_death', (isset($_POST['date_death']) ? $_POST['date_death'] : ('')), 'class="form-control date" required="required" id="date_death" '); ?>
								</div>

							<?php } ?>
						</div>
						<div class="col-md-6 col-md-offset-1">
							<?php if (in_array($process_id, array(10))) { ?>
								<div class="form-group all">
									<?= lang("কততম শহিদ", "myr_serial") ?>
									<?= form_input('myr_serial', (isset($_POST['myr_serial']) ? $_POST['myr_serial'] : ('')), 'class="form-control" required="required" id="myr_serial" '); ?>
								</div>
							<?php } ?>

							<?php if (in_array($process_id, array(9))) { ?>
								<div class="form-group all">
									<?= lang("কীভাবে", "how_death") ?>
									<?= form_input('how_death', (isset($_POST['how_death']) ? $_POST['how_death'] : ('')), 'class="form-control" required="required"  id="how_death" '); ?>
								</div>

							<?php } ?>





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
	$(document).ready(function() {
		$('form[data-toggle="validator"]').bootstrapValidator({
			excluded: [':disabled']
		});
		var audio_success = new Audio('<?= $assets ?>sounds/sound2.mp3');
		var audio_error = new Audio('<?= $assets ?>sounds/sound3.mp3');




		$.ajaxSetup({
			headers: {
				'X-CSRF-Token': $('meta[name="token"]').attr('content')
			}
		});










		var _URL = window.URL || window.webkitURL;






	});
</script>