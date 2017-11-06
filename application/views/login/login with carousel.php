<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style-->
  <link rel="stylesheet" href="../../../resources/css/AdminLTE.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/iCheck/square/blue.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../../resources/css/cssr.css">
  


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
      <!-- Carousel -->
      <script type="text/javascript" src="../../../resources/js/jquery-1.9.1.min.js"></script>
      <script type="text/javascript" src="../../../resources/js/jssor.slider.min.js"></script>
      <script>
          jQuery(document).ready(function ($) {
              //Reference https://www.jssor.com/development/slider-with-slideshow.html
              //Reference https://www.jssor.com/development/tool-slideshow-transition-viewer.html

              var _SlideshowTransitions = [
                  //Fade
                  { $Duration: 1200, $Opacity: 2 }
              ];

              var options = {
                  $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                  $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                  $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                  $Idle: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                  $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                      $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                      $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                      $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                      $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                  }
              };

              var jssor_slider1 = new $JssorSlider$('slider1_container', options);
          });
      </script> <!-- Temporary; Apply div absolute center -->
      <div id="slider1_container" style="position:relative;width:600px;height:300px;">
          <!-- Loading Screen -->
          <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
              <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../../../resources/svg/spin.svg" />
          </div>

          <!-- Slides Container -->
          <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 750px; height: 500px;
              overflow: hidden;">
              <div>
                  <img u=image src="../../../resources/img/announcements/1.png"/>
              </div>
              <div>
                  <img u=image src="../../../resources/img/announcements/2.png"/>
              </div>
              <div>
                  <img u=image src="../../../resources/img/announcements/3.jpg"/>
              </div>
              <div>
                  <img u=image src="../../../resources/img/announcements/4.jpg"/>
              </div>
          </div>
      </div>
      <!-- End Carousel -->

       </div>
      </div>
    </div>
  </div>

  </div>
  <div id="two">
  <div class="row">
  <div class="col-lg-offset-7 col-lg-5" id="spacetop">
  <a href="../tutorregister/new_tutor" class="btn btn-outline">New Member? Sign Up Here</a>
  </div>
  </div>
    <div class="login-box">
      <div class="login-box-body">

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
  <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../../../plugins/iCheck/icheck.min.js"></script>
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