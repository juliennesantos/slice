<script type="text/javascript">
$(document).ready(function() {

	// $("#datepicker").change(function() {
	// 	// $(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
	// 	$.get('<?php echo site_url();?>tutorialsession/findSubject/' + $(this).val(), function(data) {
	// 		$("#subject").html(data);
	// 		$('#loader').slideUp(200, function() {
	// 			$(this).remove();
	// 		});
	// 	});	
    // });

	$("#subject").change(function() {
		// $(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
		$.get('<?php echo site_url();?>tutorialsession/findtimeblocks/' + $(this).val(), function(data) {
			$("#timeblock").html(data);
			$('#loader').slideUp(200, function() {
				$(this).remove();
			});
		});	
    });
 
});
</script>
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Request Tutorial Session</h3>
			</div>
			<?php echo form_open('tutorialsession/add'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-offset-2 col-md-8">
						<div class="form-group">
						<!-- subject -->
						<label for="subjectID" class="control-label">Subject</label>
							<div class="form-group">
								<select name="subjectID" class="form-control" id="subject">
									<option value="">Select subject...</option>
									<?php 
									foreach($all_subjects as $subject)
									{
										$selected = ($subject['subjectID'] == $this->input->post('subjectID')) ? ' selected="selected"' : "";

										echo '<option value="'.$subject['subjectID'].'" '.$selected.'>'.$subject['subjectCode'].'</option>';
									} 
									?>
								</select>
							</div>
							<!-- Timeblock -->
							<label for="timeblockID" class="control-label">Timeblock</label>
							<div class="form-group">
								<select name="timeblockID" class="form-control" id="timeblock">
									<option value="">Choose subject first!</option>
									<?php 
									foreach($all_timeblocks as $timeblock)
									{
										$selected = ($timeblock['timeblockID'] == $this->input->post('timeblockID')) ? ' selected="selected"' : "";

										echo '<option value="'.$timeblock['timeblockID'].'" '.$selected.'>'.$timeblock['timeStart'].' to '.$timeblock['timeEnd'].'</option>';
									} 
									?>
								</select>
							</div>
							<!-- Date -->
							<label>Date:</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control pull-right" id="datepicker" name="tutorialdate" placeholder="Choose your preferred date">
							</div>
							<br>
							
							<!-- Previous Tutor? -->
							<label for="tutorID" class="control-label">Previous Tutor?</label>
							<div class="form-group">
								<select name="tutorID" class="form-control" id='tutor'>
									<option value="">Select tutor</option>
									<?php 
									foreach($all_tutors as $tutor)
									{
										$selected = ($tutor['tutorID'] == $this->input->post('tutorID')) ? ' selected="selected"' : "";

										echo '<option value="'.$tutor['tutorID'].'" '.$selected.'>'.$tutor['lastName'].', '.$tutor['firstName'].'</option>';
									} 
									?>
								</select>
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->

					</div>
					<!-- <div class="col-md-6">
						<label for="dateTimeApproved" class="control-label">DateTimeApproved</label>
						<div class="form-group">
							<input type="text" name="dateTimeApproved" value="<?php echo $this->input->post('dateTimeApproved'); ?>" class="has-datetimepicker form-control" id="dateTimeApproved" />
						</div>
					</div> -->
					<!-- <div class="col-md-6">
						<label for="dateTimeStarted" class="control-label">DateTimeStarted</label>
						<div class="form-group">
							<input type="text" name="dateTimeStarted" value="<?php echo $this->input->post('dateTimeStarted'); ?>" class="has-datetimepicker form-control" id="dateTimeStarted" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateTimeEnded" class="control-label">DateTimeEnded</label>
						<div class="form-group">
							<input type="text" name="dateTimeEnded" value="<?php echo $this->input->post('dateTimeEnded'); ?>" class="has-datetimepicker form-control" id="dateTimeEnded" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateAdded" class="control-label"><span class="text-danger">*</span>DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo $this->input->post('dateAdded'); ?>" class="has-datetimepicker form-control" id="dateAdded" />
							<span class="text-danger"><?php echo form_error('dateAdded');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateModified" class="control-label">DateModified</label>
						<div class="form-group">
							<input type="text" name="dateModified" value="<?php echo $this->input->post('dateModified'); ?>" class="has-datetimepicker form-control" id="dateModified" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label"><span class="text-danger">*</span>Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
							<span class="text-danger"><?php echo form_error('status');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remarks" class="control-label">Remarks</label>
						<div class="form-group">
							<textarea name="remarks" class="form-control" id="remarks"><?php echo $this->input->post('remarks'); ?></textarea>
							<span class="text-danger"><?php echo form_error('remarks');?></span>
						</div>
					</div> -->
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
