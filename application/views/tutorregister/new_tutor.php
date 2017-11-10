<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Learning Information System | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/AdminLTE.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css">
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url(); ?>resources/img/announcements/icon.png" type="image/ico">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
  </head>

<body>
<div class="row" id="topbreak">
    <div class="col-lg-offset-2 col-lg-8">
      	<div class="box">
            <div class="box-header">
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
            	<button type="submit" class="btn btn-success center-block">
            		<i class="fa fa-save"></i>&emsp; Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
  
</body>

</html>