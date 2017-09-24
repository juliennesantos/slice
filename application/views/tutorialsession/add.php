<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutorialsession Add</h3>
            </div>
            <?php echo form_open('tutorialsession/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tutorID" class="control-label">Tutor</label>
						<div class="form-group">
							<select name="tutorID" class="form-control">
								<option value="">select tutor</option>
								<?php 
								foreach($all_tutors as $tutor)
								{
									$selected = ($tutor['tutorID'] == $this->input->post('tutorID')) ? ' selected="selected"' : "";

									echo '<option value="'.$tutor['tutorID'].'" '.$selected.'>'.$tutor['tutorID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="courseID" class="control-label">Course</label>
						<div class="form-group">
							<select name="courseID" class="form-control">
								<option value="">select course</option>
								<?php 
								foreach($all_courses as $course)
								{
									$selected = ($course['courseID'] == $this->input->post('courseID')) ? ' selected="selected"' : "";

									echo '<option value="'.$course['courseID'].'" '.$selected.'>'.$course['courseID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateTimeApproved" class="control-label">DateTimeApproved</label>
						<div class="form-group">
							<input type="text" name="dateTimeApproved" value="<?php echo $this->input->post('dateTimeApproved'); ?>" class="has-datetimepicker form-control" id="dateTimeApproved" />
						</div>
					</div>
					<div class="col-md-6">
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
						<label for="remarks" class="control-label">Remarks</label>
						<div class="form-group">
							<input type="text" name="remarks" value="<?php echo $this->input->post('remarks'); ?>" class="form-control" id="remarks" />
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