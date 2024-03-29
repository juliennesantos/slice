<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SLICE - Student Learning Informtation Center</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
  <!--Select2-->
  <link rel="stylesheet" href="<?php echo site_url(); ?>bower_components\select2\dist\css\select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url('resources\ionicons\css\ionicons.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo site_url('bower_components//datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
  <!-- Datetimepicker -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo site_url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url(); ?>resources/img/announcements/icon.png" type="image/ico">
  <!-- Google reCaptcha -->
</head>

<body class="hold-transition skin-black sidebar-mini ">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <img src="<?=site_url();?>resources/img/announcements/icon.png" width="30px" height="45px" />
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
          <img src="<?=site_url();?>resources/img/announcements/logo2.png" width="75px" height="45px" />
        </span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <!--a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<#?php echo site_url('resources/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs">ADMIN</span>
                                </a-->
              <a href="<?php echo site_url()?>login/logout" class="btn">Sign out</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <!--div class="user-panel">
                        <div class="pull-left image">
                            <img src="<#?php echo site_url('resources/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Alexander Pierce</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div-->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li>
            <a class="text-center">Welcome,
              <?= $_SESSION['fn'] ?>
                <?= $_SESSION['ln'] ?>!</a>
          </li>
          <?php if($_SESSION['typeID'] == 1):?>
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?php echo site_url();?>">
              <i class="fa fa-desktop"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="treeview">
            <a href="<?php echo site_url('tutorialsession/tutee');?>">
              <i class="fa fa-hourglass"></i>
              <span>Tutorial Sessions</span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="<?php echo site_url('tutorialsession/tutee');?>">
                  <i class="fa fa-list-ul"></i> View All Sessions</a>
              </li>
              <li>
                <a href="<?php echo site_url('tutorialsession/add');?>">
                  <i class="fa fa-plus"></i> Request New Session</a>
              </li>
            </ul>
          </li>
          <!-- <li>
                            <a href="#">
                                <i class="fa fa-paper-plane"></i> <span>Feedback</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('feedback/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('feedback/tuteeview');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li> -->
          <?php endif; ?>
          <?php if($_SESSION['typeID'] == 2):?>
          <li class="header">TUTOR NAVIGATION</li>
          <li>
            <a href="<?php echo site_url();?>">
              <i class="fa fa-desktop"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('attendance/tutor');?>">
              <i class="fa fa-pencil-square-o"></i>
              <span>Attendance</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-paper-plane"></i>
              <span>Feedback</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="<?php echo site_url('feedback/tutor_index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="<?php echo site_url('tutorialsession/tutor_index');?>">
              <i class="fa fa-hourglass"></i>
              <span>View Tutorial Sessions</span>
            </a>
            <!-- <ul class="treeview-menu">
								<li>
                                    <a href="<?php echo site_url('tutorialsession/tutor_index');?>"><i class="fa fa-list-ul"></i> View Sessions</a>
                                </li>
							</ul> -->
          </li>
          <!-- <<li>
            <a href="<?php echo site_url('tutorexpertise/index');?>">
              <i class="fa fa-lightbulb-o"></i>
              <span>Tutor Expertise</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span> 
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('tutorexpertise/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('tutorexpertise/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li> --> 
          <?php endif; ?>
        
          <?php if($_SESSION['typeID'] == 5):?>
          <li class="header">COORDINATOR NAVIGATION</li>
          <li class="treeview">
            <a href="<?php echo site_url();?>">
              <i class="fa fa-desktop"></i>
              <span>Dashboard</span>
              
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('attendance/index');?>">
              <i class="fa fa-pencil-square-o"></i>
              <span>Attendance</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('feedback/index');?>">
              <i class="fa fa-paper-plane"></i>
              <span>Feedback</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('tutorialsession/approvalview');?>">
              <i class="fa fa-hourglass"></i>
              <span>Tutorial Sessions</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('auditlog/index');?>">
              <i class="fa fa-clipboard"></i>
              <span>Auditlog</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-user-circle"></i>
              <span>Tutor</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('tutor/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('tutor/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-clock-o"></i>
              <span>Timeblock</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('timeblock/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('timeblock/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Subject</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('subject/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('subject/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <?php endif;?>
          <?php if($_SESSION['typeID'] == 4):?>
          <li class="treeview">
            <a href="<?php echo site_url();?>">
              <i class="fa fa-desktop"></i>
              <span>Dashboard</span>
              
            </a>
          </li>
          <li>
            <a href="<?=site_url('tutorschedule/index')?>">
              <i class="fa fa-users"></i>
              <span>Tutors</span>
            </a>
          </li>
          <?php endif;?>

          
          <?php if($_SESSION['typeID'] == 4 || $_SESSION['typeID'] == 5):?>
          <li class="header">REPORTS</li>
          <li class="treeview">
            <a href="<?php echo site_url('tutorialsession/recordsperstudent');?>">
              <i class="fa fa-address-card"></i>
              <span>Records By Student</span>
            </a>
          </li>
          <li class="treeview">
            <a href="<?php echo site_url('tutor/tutorpdf');?>" target="_blank">
              <i class="fa fa-users"></i>
              <span>Tutors List</span>
            </a>
          </li>
          <li>
            <a href="<?=site_url('tutee/tuteepdf')?>" target="_blank">
              <i class="fa fa-user"></i>
              <span>Tutees List</span>
            </a>
          </li>
          <li>
            <a href="<?=site_url('tutorialsession/sessionspdf')?>" target="_blank">
              <i class="fa fa-hourglass"></i>
              <span>Tutorial Sessions</span>
            </a>
          </li>
          <li>
            <a href="<?=site_url('attendance/attendancepdf')?>" target="_blank">
              <i class="fa fa-calendar"></i>
              <span>Attendance List</span>
            </a>
          </li>
          <?php endif;?>

          <?php if($_SESSION['typeID'] == 0):?>
          <li class="header">UNNECESSARY OR AUTOMATED</li>
          <li>
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Faculty</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('faculty/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('faculty/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Program Course</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('programcourse/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('programcourse/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-graduation-cap"></i>
              <span>Program</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('program/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('program/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-institution"></i>
              <span>School</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('school/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('school/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-user-o"></i>
              <span>Student</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('student/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('student/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-child"></i>
              <span>Tutee</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('tutee/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('tutee/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-check-square-o"></i>
              <span>Tutorial Checklist</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('tutorialchecklist/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('tutorialchecklist/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-user-circle"></i>
              <span>Tutor</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('tutor/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('tutor/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Tutor Schedule</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('tutorschedule/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('tutorschedule/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-user-circle-o"></i>
              <span>User</span>
            </a>
            <ul class="treeview-menu">
              <li class="active">
                <a href="<?php echo site_url('user/add');?>">
                  <i class="fa fa-plus"></i> Add</a>
              </li>
              <li>
                <a href="<?php echo site_url('user/index');?>">
                  <i class="fa fa-list-ul"></i> Listing</a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>SLICE</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->

      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <input type="hidden" class="siteurl" data-siteurl="<?=site_url();?>">
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js'); ?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo site_url('resources/js/bootstrap.min.js'); ?>"></script>

  <!-- FastClick -->
  <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
  <!-- Select2 -->
  <script src="<?php echo site_url('bower_components\select2\dist\js\select2.full.min.js');?>"></script>
  
  <!-- DatePicker -->
  <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
  <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
  <script src="<?php echo site_url('resources/js/global.js');?>"></script>
  <!-- DatePicker -->
  <script src="<?php echo site_url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js');?>"></script>
  <!-- DataTables -->
  <script src="<?php echo site_url('bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo site_url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
  <!-- InputMask -->
  <script src="<?=site_url();?>plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?=site_url();?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- Custom JS -->
  <script src="<?=site_url('resources\js\tutee\tuteeindex.js')?>"></script>
  <script src="<?=site_url();?>resources\custom.js"></script>
  
</body>

</html>