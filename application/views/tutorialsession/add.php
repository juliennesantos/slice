<script type="text/javascript">
$(document).ready(function() {

	var subject;

	$("#subject").change(function() {
		subject = $(this).val();
		$.get('<?php echo site_url();?>tutorialsession/findtimeblocks/' + $(this).val(), function(data) {
			$("#timeblock").html(data);
			// $('#loader').slideUp(200, function() {
			// 	$(this).remove();
			// });
		});
	});

	$("#timeblock").change(function() {
		$.get('<?php echo site_url();?>tutorialsession/unavailabledates/' + subject + '/' + $(this).val(), function(data) {
			var array = ['2017-10-16'];
			$("input#datepicker").datepicker({
				daysOfWeekDisabled:: function(date){
				var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
				return [ array.indexOf(string) == -1 ];
			}
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
							<!-- Tutorschedule -->
							<label for="tutorschedrequestedID" class="control-label">Timeblock</label>
							<div class="form-group">
								<select name="tutorschedrequestedID" class="form-control" id="timeblock">
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
								<input type="date" class="form-control pull-right datepicker" id="datepicker" name="tutorialdate" placeholder="Choose your preferred date">
							</div>
							<br>
							
							<!-- Previous Tutor? -->
							<label for="previoustutorID" class="control-label">Previous Tutor?</label>
							<div class="form-group">
								<select name="previoustutorID" class="form-control" id='tutor'>
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
							<!-- Remarks -->
							<label for="remarks" class="control-label">Remarks</label>
							<div class="form-group">
								<textarea name="remarks" class="form-control" id="remarks"><?php echo $this->input->post('remarks'); ?></textarea>
								<span class="text-danger"><?php echo form_error('remarks');?></span>
							</div>
						</div>
						<!-- /.input group -->
					</div>
					<!-- /.form group -->
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
