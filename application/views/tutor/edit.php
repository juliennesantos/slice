<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutor Edit</h3>
            </div>
			<?php echo form_open('tutor/edit/'.$tutor['tutorID']); ?>
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
									$selected = ($user['userID'] == $tutor['userID']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['userID'].'" '.$selected.'>'.$user['userID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="statusID" class="control-label">Tutorstatus</label>
						<div class="form-group">
							<select name="statusID" class="form-control">
								<option value="">select tutorstatus</option>
								<?php 
								foreach($all_tutorstatus as $tutorstatus)
								{
									$selected = ($tutorstatus['statusID'] == $tutor['statusID']) ? ' selected="selected"' : "";

									echo '<option value="'.$tutorstatus['statusID'].'" '.$selected.'>'.$tutorstatus['statusID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tutorType" class="control-label"><span class="text-danger">*</span>TutorType</label>
						<div class="form-group">
							<input type="text" name="tutorType" value="<?php echo ($this->input->post('tutorType') ? $this->input->post('tutorType') : $tutor['tutorType']); ?>" class="form-control" id="tutorType" />
							<span class="text-danger"><?php echo form_error('tutorType');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateAdded" class="control-label"><span class="text-danger">*</span>DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo ($this->input->post('dateAdded') ? $this->input->post('dateAdded') : $tutor['dateAdded']); ?>" class="has-datetimepicker form-control" id="dateAdded" />
							<span class="text-danger"><?php echo form_error('dateAdded');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateModified" class="control-label">DateModified</label>
						<div class="form-group">
							<input type="text" name="dateModified" value="<?php echo ($this->input->post('dateModified') ? $this->input->post('dateModified') : $tutor['dateModified']); ?>" class="has-datetimepicker form-control" id="dateModified" />
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