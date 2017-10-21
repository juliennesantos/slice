<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SLICe</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition attendance-page">
  <!--div class="container-fluid">
    <div class="row">
      <tr>
        <div class="progress">
          <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
          <span class="sr-only">100% Complete</span>
          </div>
        </div>
      </tr>
    </div>
  </div>-->

  <div class="container">
    <div class="attendance-box">
      <div class="attendance-box-body col-lg-12">
          <!--div class="col-lg-4">
            <i class="fa fa-id-badge fa-3x text-center" style="font-size:150px;"></i>
          </div>
          <div class="col-lg-1">
          </div>
          <div class="col-lg-7 border-left"-->
            <h4 class="login-box-msg"><strong>Login for your attendance to be recorded</strong></h4>
            <br/>
            <?php echo form_open('attendance/add'); ?>
              <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control fc" id="username" placeholder="Username" />
                <span class="ion-person form-control-feedback" style="color:white;"></span>
              </div>
              <br/>
              <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control fc" id="password" placeholder="Password" />
                <span class="ion-locked form-control-feedback" style="color:white;"></span>
              </div>
              <br/>
              <div class="row">
                <div class="col-lg-12">
                  
                    <div class="col-lg-6">
                    <!-- <?php echo form_open('/attendance/add/'.$user['username']); ?> -->
                          <button type="submit" value="Time-in" class="btn btn-primary btn-circle btn-lg center-block"data-toggle="tooltip" title="Time-In">
                          <i class="fa fa-sign-in"></i></button
                          </form>
                    </div>

                  <div class="col-lg-6">
                    <!-- <?php echo form_open('/attendance/add/'.$user['username']); ?> -->
                          <button type="submit" value="Time-out" class="btn btn-danger btn-circle btn-lg center-block" data-toggle="tooltip" title="Time-Out">
                          <i class="fa fa-sign-out"></i></button>
                        </form>
                  </div>
                  
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
    </div>
  </div>
  <!--div class="login-box">
    <div class="login-box-body">
      <p class="login-box-msg">Check in to record your attendance</p>

      <div class="col-lg-4">
      <i class="fa fa-id-badge fa-3x center-block" stye="color:#00BFA5;"></i>
      </div>
      <div class="col-lg-6">
        <#?php echo form_open('attendance/add'); ?>
        <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control fc" id="username" placeholder="Username" />
        <span class="ion-person form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control fc" id="password" placeholder="Password" />
          <span class="ion-locked form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="col-lg-6">
          <#?php echo form_open('/attendance/add/'.$user['username']); ?> 
            <button type="submit" value="Time-in" class="btn btn-success btn-circle btn-lg center-block"data-toggle="tooltip" title="Time-In">
              <i class="fa fa-sign-in"></i></button
          </form>
        </div>
        <div class="col-lg-6">-->
          <!-- <#?php echo form_open('/attendance/add/'.$user['username']); ?> 
            <button type="submit" value="Time-out" class="btn btn-danger btn-circle btn-lg center-block" data-toggle="tooltip" title="Time-Out">
              <i class="fa fa-sign-out"></i></button>
          </form>
        </div>
            
          </div>
        </div>
      
        <?php echo form_close(); ?>
      </div>

  	</div>
  <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>  