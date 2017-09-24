<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Programcourse Edit</h3>
            </div>
			<?php echo form_open('programcourse/edit/'.$programcourse['refNo']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="programID" class="control-label">Programcourse</label>
						<div class="form-group">
							<select name="programID" class="form-control">
								<option value="">select programcourse</option>
								<?php 
								foreach($all_programcourses as $programcourse)
								{
									$selected = ($programcourse['refNo'] == $programcourse['programID']) ? ' selected="selected"' : "";

									echo '<option value="'.$programcourse['refNo'].'" '.$selected.'>'.$programcourse['programID'].'</option>';
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
									$selected = ($course['courseID'] == $programcourse['courseID']) ? ' selected="selected"' : "";

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