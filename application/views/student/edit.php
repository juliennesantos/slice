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
						<label for="programID" class="control-label">Program</label>
						<div class="form-group">
							<select name="programID" class="form-control">
								<option value="">select program</option>
								<?php 
								foreach($all_programs as $program)
								{
									$selected = ($program['programID'] == $student['programID']) ? ' selected="selected"' : "";

									echo '<option value="'.$program['programID'].'" '.$selected.'>'.$program['programID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="studentNo" class="control-label"><span class="text-danger">*</span>StudentNo</label>
						<div class="form-group">
							<input type="text" name="studentNo" value="<?php echo ($this->input->post('studentNo') ? $this->input->post('studentNo') : $student['studentNo']); ?>" class="form-control" id="studentNo" />
							<span class="text-danger"><?php echo form_error('studentNo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label"><span class="text-danger">*</span>Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $student['status']); ?>" class="form-control" id="status" />
							<span class="text-danger"><?php echo form_error('status');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateAdded" class="control-label"><span class="text-danger">*</span>DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo ($this->input->post('dateAdded') ? $this->input->post('dateAdded') : $student['dateAdded']); ?>" class="has-datetimepicker form-control" id="dateAdded" />
							<span class="text-danger"><?php echo form_error('dateAdded');?></span>
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