<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-black">
			<div class="panel-heading">
				<h3>Request Tutorial Session</h3>
			</div>
			<?php echo form_open('tutorialsession/add'); ?>
			<div class="panel-body">
				<div class="row clearfix">
					<div class="col-md-offset-2 col-md-8">
						<div class="form-group">
						<!-- subject -->
						<label for="subjectID" class="control-label">Subject</label>
							<div class="form-group">
								<select name="subjectID" class="form-control" id="subject" required>
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
								<select name="tutorschedrequestedID" class="form-control" id="timeblock" required>
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
								<input type="date" class="form-control pull-right datepicker" id="datepicker" name="tutorialdate" placeholder="Choose your preferred date" required>
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
				<button type="submit" class="btn btn-success center-block">
            		<i class="fa fa-check"></i>&emsp; Request Now
            	</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>