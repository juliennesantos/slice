<!--?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	p {
		margin: 12px 15px 12px 15px;
	}
	</style>
	</head>
	<body>
		<div id="container">
			<h1><#?php echo $heading; ?></h1>
			<#?php echo $message; ?>
		</div>
	</body>
</html>-->
<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Student Learning Information System | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	   
	  <!-- Bootstrap 3.3.7 -->
	  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
	  <!-- Theme style-->
	  <link rel="stylesheet" href="../resources/css/AdminLTE.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
	  <!-- iCheck -->
	  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
	  <!--favicon-->
	  <link rel="icon" href="../resources/img/announcements/icon.png" type="image/ico">
	  
	  <!-- Google Font -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet"/>
	  <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet"/>
	  </head>
	
	<body class="err" style="background-color:#404142; color:white;">
		<div class="row">
				<div class="col-lg-5" id="spaceleft"><br/><br/><br/><br/>
					<img src="../resources/img/announcements/logo.png" width="150" height="90"/>
					<h1 class="errorhead">OOPS!</h1>
					<h3>You have some problems. The page you're trying to view was moved, removed, renamed
						or might never existed.</h3>
					</h3>
				</div>
				<div class="col-lg-6">
				<img src="../resources/img/announcements/404.png" class="errorg" width="700" height="450"/>
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