<script>
$(document).ready(function() {
  $("form").attr('autocomplete', 'off');
});
</script>

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
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
</head>

<body id="loginbody">
<div id="container">
    <div id="oneb">
    </div> 
  <div id="one">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      <div class="item active">
        <div class="bg-blend4">
          <div class="carousel-caption">
            <h1 id="loginfont">Welcome</h1>
            <h4>Student Learning Information Center</h4>
          </div>
          </div>
        </div>

        <div class="item">
          <div class="bg-blend1">
          <div class="carousel-caption">
            <h1 id="loginfont">Mission</h3>
            <p>Provide academic support that promote student success</p>
          </div>
          </div>
        </div>

        <div class="item">
        <div class="bg-blend2">
          <div class="carousel-caption">
            <h1 id="loginfont">Services</h3>
            <p>Conduct tutorial sessions for students who may either </p>
            <p>have academic concerns or wish to excel.</p>
          </div>
          </div>
        </div>

        <div class="item">
        <div class="bg-blend3">
          <div class="carousel-caption">
            <h1 id="loginfont">Tutors</h3>
            <p>are populated mainly by the institution’s Honor Scholars,</p>
            <p>who are required by their program to render a minimum of nine </p>
            <p>(9) hours of academic service in the Student Learning Center (SLC).</p>
          </div>
          </div>
        </div>
        

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> 
  </div>
</div>
  <div id="two">
<div class="login-box">
      <div class="login-box-body">
        <?php echo form_open('login/validate'); ?>
          <h5 class="text-danger"><?=$errormsg?></h5>
          <br/>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="add"><i class="fa fa-user"></i></span>
              <input type="text" name="username" class="fc" placeholder="ID Number" 
                autocomplete="off" id="uname" maxlength="30" required/>
            </div>
          </div>
          <br/>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="add"><i class="fa fa-key"></i></span>
              <input type="password" style="display:none" />            
              <input type="password" name="password" class="fc" id="pw" 
                placeholder="Password" autocomplete="off" maxlength="30" required/>
            </div>
          </div>
          <br/>
          <div class="form-group col-xs-offset-1">
            <div class="input-group">
              <input type="checkbox" name="remember_me" value="remember" />&emsp;Remember me           
            </div>
          </div>

            <br/><br/>

            <div class="container">
              <div class="btn-group col-xs-8 col-lg-5">
                <button type="submit" class="btn btn-login1" name='signin'>Log in</button>
                <a href="<?php echo site_url()?>tutorregister/new_tutor" class="btn btn-outline">New Tutor? Register Here</a>
              </div><br/>
            </div>
          </form>
        </div>
      </div>
          
      <footer class="footer" id="spaceleft">
          <div class="row text-center">
            <table class="borderspace">
              <col width="80">
              <col width="100">
              <col width="90">
              <col width="100">
              <tr>
                <td><h5>SLICE 2017</h5></td> 
                <td><h5>Privacy Policy</h5></td>
                <td><h5>Terms of Use</h5></td>
                <td><h5>About Team</h5></td>
              </tr>
            </table>
          </div>
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
      $('#myCarousel').carousel();
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