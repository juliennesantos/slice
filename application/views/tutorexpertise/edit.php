<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutorexpertise Edit</h3>
            </div>
			<?php echo form_open('tutorexpertise/edit/'.$tutorexpertise['expertiseID']); ?>
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
									$selected = ($tutor['tutorID'] == $tutorexpertise['tutorID']) ? ' selected="selected"' : "";

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
									$selected = ($course['courseID'] == $tutorexpertise['courseID']) ? ' selected="selected"' : "";

									echo '<option value="'.$course['courseID'].'" '.$selected.'>'.$course['courseID'].'</option>';
								} 
								?>
							</select>
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