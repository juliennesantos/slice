<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Edit</h3>
            </div>
			<?php echo form_open('user/edit/'.$user['userID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="typeID" class="control-label">Usertype</label>
						<div class="form-group">
							<select name="typeID" class="form-control">
								<option value="">select usertype</option>
								<?php 
								foreach($all_usertypes as $usertype)
								{
									$selected = ($usertype['typeID'] == $user['typeID']) ? ' selected="selected"' : "";

									echo '<option value="'.$usertype['typeID'].'" '.$selected.'>'.$usertype['typeID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
						<div class="form-group">
							<input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $user['password']); ?>" class="form-control" id="password" />
							<span class="text-danger"><?php echo form_error('password');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
						<div class="form-group">
							<input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $user['username']); ?>" class="form-control" id="username" />
							<span class="text-danger"><?php echo form_error('username');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="firstName" class="control-label"><span class="text-danger">*</span>FirstName</label>
						<div class="form-group">
							<input type="text" name="firstName" value="<?php echo ($this->input->post('firstName') ? $this->input->post('firstName') : $user['firstName']); ?>" class="form-control" id="firstName" />
							<span class="text-danger"><?php echo form_error('firstName');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lastName" class="control-label"><span class="text-danger">*</span>LastName</label>
						<div class="form-group">
							<input type="text" name="lastName" value="<?php echo ($this->input->post('lastName') ? $this->input->post('lastName') : $user['lastName']); ?>" class="form-control" id="lastName" />
							<span class="text-danger"><?php echo form_error('lastName');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="middleName" class="control-label"><span class="text-danger">*</span>MiddleName</label>
						<div class="form-group">
							<input type="text" name="middleName" value="<?php echo ($this->input->post('middleName') ? $this->input->post('middleName') : $user['middleName']); ?>" class="form-control" id="middleName" />
							<span class="text-danger"><?php echo form_error('middleName');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="emailAddress" class="control-label"><span class="text-danger">*</span>EmailAddress</label>
						<div class="form-group">
							<input type="text" name="emailAddress" value="<?php echo ($this->input->post('emailAddress') ? $this->input->post('emailAddress') : $user['emailAddress']); ?>" class="form-control" id="emailAddress" max="100" pattern=".+@benilde.edu.ph" title="Please provide only a Benilde email address"/>
							<span class="text-danger"><?php echo form_error('emailAddress');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contactNo" class="control-label"><span class="text-danger">*</span>ContactNo</label>
						<div class="form-group">
							<input type="text" name="contactNo" value="<?php echo ($this->input->post('contactNo') ? $this->input->post('contactNo') : $user['contactNo']); ?>" class="form-control" id="contactNo" />
							<span class="text-danger"><?php echo form_error('contactNo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label"><span class="text-danger">*</span>Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $user['status']); ?>" class="form-control" id="status" />
							<span class="text-danger"><?php echo form_error('status');?></span>
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