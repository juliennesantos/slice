<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutor Add</h3>
            </div>
            <?php echo form_open('Tutorregister/new_tutor'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="firstname" class="control-label"><span class="text-danger">*</span>First Name</label>
						<div class="form-group">
							<input type="text" name="firstName" value="<?php echo $this->input->post('firstname'); ?>" class="form-control" id="firstname" />
							<span class="text-danger"><?php echo form_error('firstname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lastname" class="control-label"><span class="text-danger">*</span>Last Name</label>
						<div class="form-group">
							<input type="text" name="lastName" value="<?php echo $this->input->post('lastname'); ?>" class="form-control" id="lastname" />
							<span class="text-danger"><?php echo form_error('lastname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="middlename" class="control-label"><span class="text-danger">*</span>Middle Name</label>
						<div class="form-group">
							<input type="text" name="middleName" value="<?php echo $this->input->post('middlename'); ?>" class="form-control" 
							id="middlename" />
							<span class="text-danger"><?php echo form_error('middlename');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="emailAddress" class="control-label"><span class="text-danger">*</span>EmailAddress</label>
						<div class="form-group">
							<input type="text" name="emailAddress" value="<?php echo $this->input->post('emailAddress'); ?>" class="form-control" 
							id="emailAddress" max="100" pattern=".+@benilde.edu.ph" title="Please provide only a Benilde email address"/>
							<span class="text-danger"><?php echo form_error('emailAddress');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contactno" class="control-label"><span class="text-danger">*</span>Contact No.</label>
						<div class="form-group">
							<input type="text" name="contactNo" value="<?php echo $this->input->post('contactNo'); ?>" class="form-control" id="contactno" />
							<span class="text-danger"><?php echo form_error('contactno');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
						<div class="form-group">
							<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
							<span class="text-danger"><?php echo form_error('username');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
							<span class="text-danger"><?php echo form_error('password');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tutorType" class="control-label"><span class="text-danger">*</span>TutorType</label>
						<div class="form-group">
							<label class="radio-inline"><input type="radio" name="tutorType" value="Volunteer Tutor" class="radio" id="tutorType" >Volunteer Tutor</label>
							<label class="radio-inline"><input type="radio" name="tutorType" value="Honor Scholar" class="radio" id="tutorType" />Honor Scholar</label>
							<span class="text-danger"><?php echo form_error('tutorType');?></span>
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