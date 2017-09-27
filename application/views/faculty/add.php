<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Faculty Add</h3>
            </div>
            <?php echo form_open('faculty/add'); ?>
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
									$selected = ($user['userID'] == $this->input->post('userID')) ? ' selected="selected"' : "";

									echo '<option value="'.$user['userID'].'" '.$selected.'>'.$user['userID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="programID" class="control-label">Degreeprogram</label>
						<div class="form-group">
							<select name="programID" class="form-control">
								<option value="">select degreeprogram</option>
								<?php 
								foreach($all_degreeprograms as $degreeprogram)
								{
									$selected = ($degreeprogram['programID'] == $this->input->post('programID')) ? ' selected="selected"' : "";

									echo '<option value="'.$degreeprogram['programID'].'" '.$selected.'>'.$degreeprogram['programID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="userName" class="control-label">UserName</label>
						<div class="form-group">
							<input type="text" name="userName" value="<?php echo $this->input->post('userName'); ?>" class="form-control" id="userName" max="80" />
							<span class="text-danger"><?php echo form_error('userName');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="facultyNo" class="control-label">FacultyNo</label>
						<div class="form-group">
							<input type="text" name="facultyNo" value="<?php echo $this->input->post('facultyNo'); ?>" class="form-control" id="facultyNo" min="11" max="11" />
							<span class="text-danger"><?php echo form_error('facultyNo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" max="100" />
							<span class="text-danger"><?php echo form_error('status');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateAdded" class="control-label">DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo $this->input->post('dateAdded'); ?>" class="has-datetimepicker form-control" id="dateAdded" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateModified" class="control-label">DateModified</label>
						<div class="form-group">
							<input type="text" name="dateModified" value="<?php echo $this->input->post('dateModified'); ?>" class="has-datetimepicker form-control" id="dateModified" />
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