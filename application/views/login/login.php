<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body id="loginbody">
<div id="container">
  <div id="one">
     <h1 id="spaceleft">asdasd CAROUSEL HERE djhsasdksjahdjaksdajjjjjjjjjjjjjjjjjjjjjjjjdhsjjj2jjjl</h1>
  </div>
  <div id="two">
  <div class="row">
  <div class="col-lg-offset-7 col-lg-5" id="spacetop">
  <a href="<?php echo site_url()?>tutorregister/new_tutor" class="btn btn-outline">New Member? Sign Up Here</a>
  </div>
  </div>
    <div class="login-box">
      <div class="login-box-body">
        <?php echo form_open('login/validate'); ?>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="add"><i class="fa fa-user"></i></span>
              <input type="text" name="username" class="fc" id="username" placeholder="Username" />
            </div>
          </div>
          <br/>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="add"><i class="fa fa-key"></i></span>
              <input type="password" name="password" class="fc" id="password" placeholder="Password" />
            </div>
          </div>

          <br/><br/>

            <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-login1 pull-left" name='signin'>Sign In</button>
            </div><br/>

        </form>
      </div>
    </div>
        
    <footer class="footer">
      <div class="container">
      <table>
        <tr>
          <td class="col-lg-4"><h5>SLICE</h5></td>
          <td class="pull-right"><h5>2017</h5></td>
        </tr>
  </table>
  </div>
      </footer>
  </div>
</div>

  
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