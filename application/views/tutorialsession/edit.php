<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutorialsession Edit</h3>
            </div>
			<?php echo form_open('tutorialsession/edit/'.$tutorialsession['tutorialNo']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tuteeID" class="control-label">Tutee</label>
						<div class="form-group">
							<select name="tuteeID" class="form-control">
								<option value="">select tutee</option>
								<?php 
								foreach($all_tutees as $tutee)
								{
									$selected = ($tutee['tuteeID'] == $tutorialsession['tuteeID']) ? ' selected="selected"' : "";

									echo '<option value="'.$tutee['tuteeID'].'" '.$selected.'>'.$tutee['tuteeID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tutorID" class="control-label">Tutor</label>
						<div class="form-group">
							<select name="tutorID" class="form-control">
								<option value="">select tutor</option>
								<?php 
								foreach($all_tutors as $tutor)
								{
									$selected = ($tutor['tutorID'] == $tutorialsession['tutorID']) ? ' selected="selected"' : "";

									echo '<option value="'.$tutor['tutorID'].'" '.$selected.'>'.$tutor['tutorID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="subjectID" class="control-label">Subject</label>
						<div class="form-group">
							<select name="subjectID" class="form-control">
								<option value="">select subject</option>
								<?php 
								foreach($all_subjects as $subject)
								{
									$selected = ($subject['subjectID'] == $tutorialsession['subjectID']) ? ' selected="selected"' : "";

									echo '<option value="'.$subject['subjectID'].'" '.$selected.'>'.$subject['subjectID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateTimeApproved" class="control-label">DateTimeApproved</label>
						<div class="form-group">
							<input type="text" name="dateTimeApproved" value="<?php echo ($this->input->post('dateTimeApproved') ? $this->input->post('dateTimeApproved') : $tutorialsession['dateTimeApproved']); ?>" class="has-datetimepicker form-control" id="dateTimeApproved" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateTimeStarted" class="control-label">DateTimeStarted</label>
						<div class="form-group">
							<input type="text" name="dateTimeStarted" value="<?php echo ($this->input->post('dateTimeStarted') ? $this->input->post('dateTimeStarted') : $tutorialsession['dateTimeStarted']); ?>" class="has-datetimepicker form-control" id="dateTimeStarted" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateTimeEnded" class="control-label">DateTimeEnded</label>
						<div class="form-group">
							<input type="text" name="dateTimeEnded" value="<?php echo ($this->input->post('dateTimeEnded') ? $this->input->post('dateTimeEnded') : $tutorialsession['dateTimeEnded']); ?>" class="has-datetimepicker form-control" id="dateTimeEnded" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateAdded" class="control-label"><span class="text-danger">*</span>DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo ($this->input->post('dateAdded') ? $this->input->post('dateAdded') : $tutorialsession['dateAdded']); ?>" class="has-datetimepicker form-control" id="dateAdded" />
							<span class="text-danger"><?php echo form_error('dateAdded');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateModified" class="control-label">DateModified</label>
						<div class="form-group">
							<input type="text" name="dateModified" value="<?php echo ($this->input->post('dateModified') ? $this->input->post('dateModified') : $tutorialsession['dateModified']); ?>" class="has-datetimepicker form-control" id="dateModified" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label"><span class="text-danger">*</span>Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $tutorialsession['status']); ?>" class="form-control" id="status" />
							<span class="text-danger"><?php echo form_error('status');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="remarks" class="control-label">Remarks</label>
						<div class="form-group">
							<textarea name="remarks" class="form-control" id="remarks"><?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $tutorialsession['remarks']); ?></textarea>
							<span class="text-danger"><?php echo form_error('remarks');?></span>
						</div>
					</div>
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