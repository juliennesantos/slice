<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">User Details</h3>
			</div>
			<?php echo form_open('user/add'); ?>
			<div class="box-body">
				<div class="row clearfix">

					<div class="col-md-offset-2 col-md-8">
						<h4>Welcome to SLICe! Since it's your first time, please enter your details below:</h4>
						<label for="username" class="control-label">
							<span class="text-danger">*</span>ID Number</label>
						<div class="form-group">
							<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username"
							  data-inputmask='"mask": "11999999"' data-mask required />
							<span class="text-danger">
								<?php echo form_error('username');?>
							</span>
						</div>
					</div>
					<div class="col-md-offset-2 col-md-8">
						<label for="firstName" class="control-label">
							<span class="text-danger">*</span>First Name</label>
						<div class="form-group">
							<input type="text" name="firstName" value="<?php echo $this->input->post('firstName'); ?>" class="form-control" id="firstName"
							  required />
							<span class="text-danger">
								<?php echo form_error('firstName');?>
							</span>
						</div>
					</div>
					<div class="col-md-offset-2 col-md-8">
						<label for="lastName" class="control-label">
							<span class="text-danger">*</span>Last Name</label>
						<div class="form-group">
							<input type="text" name="lastName" value="<?php echo $this->input->post('lastName'); ?>" class="form-control" id="lastName"
							  required />
							<span class="text-danger">
								<?php echo form_error('lastName');?>
							</span>
						</div>
					</div>
					<div class="col-md-offset-2 col-md-8">
						<label for="middleName" class="control-label">
							<span class="text-danger">*</span>Middle Name</label>
						<div class="form-group">
							<input type="text" name="middleName" value="<?php echo $this->input->post('middleName'); ?>" class="form-control" id="middleName"
							  required />
							<span class="text-danger">
								<?php echo form_error('middleName');?>
							</span>
						</div>
					</div>
					<div class="col-md-offset-2 col-md-8">
						<label for="emailAddress" class="control-label">
							<span class="text-danger">*</span>Benilde Email Address</label>
						<div class="form-group">
							<input type="text" name="emailAddress" value="<?php echo $this->input->post('emailAddress'); ?>" class="form-control" id="emailAddress"
							  max="100" pattern=".+@benilde.edu.ph" title="Please provide only a Benilde email address" required/>
							<span class="text-danger">
								<?php echo form_error('emailAddress');?>
							</span>
						</div>
					</div>
					<div class="col-md-offset-2 col-md-8">
						<label for="contactNo" class="control-label">
							<span class="text-danger">*</span>Contact No</label>
						<div class="form-group">
							<input type="text" name="contactNo" value="<?php echo $this->input->post('contactNo'); ?>" class="form-control" id="contactNo"
							  data-inputmask='"mask": "(0999)999-9999"' data-mask required />
							<span class="text-danger">
								<?php echo form_error('contactNo');?>
							</span>
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