<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Student Edit</h3>
            </div>
			<?php echo form_open('student/edit/'.$student['studentID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="userID" class="control-label">User</label>
						<div class="form-group">
							<select name="userID" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['userID'] == $student['userID']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['userID'].'" '.$selected.'>'.$user['userID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="programID" class="control-label">Programcourse</label>
						<div class="form-group">
							<select name="programID" class="form-control">
								<option value="">select programcourse</option>
								<?php 
								foreach($all_programcourses as $programcourse)
								{
									$selected = ($programcourse['refNo'] == $student['programID']) ? ' selected="selected"' : "";

									echo '<option value="'.$programcourse['refNo'].'" '.$selected.'>'.$programcourse['programID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="studentNo" class="control-label">StudentNo</label>
						<div class="form-group">
							<input type="text" name="studentNo" value="<?php echo ($this->input->post('studentNo') ? $this->input->post('studentNo') : $student['studentNo']); ?>" class="form-control" id="studentNo" min="8" max="8" />
							<span class="text-danger"><?php echo form_error('studentNo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $student['status']); ?>" class="form-control" id="status" max="10" />
							<span class="text-danger"><?php echo form_error('status');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateAdded" class="control-label">DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo ($this->input->post('dateAdded') ? $this->input->post('dateAdded') : $student['dateAdded']); ?>" class="has-datetimepicker form-control" id="dateAdded" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateModified" class="control-label">DateModified</label>
						<div class="form-group">
							<input type="text" name="dateModified" value="<?php echo ($this->input->post('dateModified') ? $this->input->post('dateModified') : $student['dateModified']); ?>" class="has-datetimepicker form-control" id="dateModified" />
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