<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutorschedule Add</h3>
            </div>
            <?php echo form_open('tutorschedule/add'); ?>
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
						<label for="scheduleID" class="control-label">Schedule</label>
						<div class="form-group">
							<select name="scheduleID" class="form-control">
								<option value="">select schedule</option>
								<?php 
								foreach($all_schedule as $schedule)
								{
									$selected = ($schedule['scheduleID'] == $this->input->post('scheduleID')) ? ' selected="selected"' : "";

									echo '<option value="'.$schedule['scheduleID'].'" '.$selected.'>'.$schedule['scheduleID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="term" class="control-label">Term</label>
						<div class="form-group">
							<input type="text" name="term" value="<?php echo $this->input->post('term'); ?>" class="form-control" id="term" max="11" />
							<span class="text-danger"><?php echo form_error('term');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="schoolYear" class="control-label">SchoolYear</label>
						<div class="form-group">
							<input type="text" name="schoolYear" value="<?php echo $this->input->post('schoolYear'); ?>" class="form-control" id="schoolYear" min="4" max="4" />
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