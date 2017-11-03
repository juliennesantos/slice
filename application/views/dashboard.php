    <!--tutee tutsess box-->
<?php if($_SESSION['typeID'] == 1): ?>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        <?php
                            if($_SESSION['typeID'] == 1){
                                echo $user_sess;
                            }
                        ?>
                    </h3>

                    <p>Tutorial Requests</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-comment-o"></i>
                    </div>
                    <a href="<?php echo site_url()?>tutorialsession/tutor_index" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        <?php
                            if($_SESSION['typeID'] == 1){
                                echo $user_pend;
                            }
                        ?>
                    </h3>

                    <p>Pending Tutorial Requests</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-commenting"></i>
                    </div>
                    <a href="<?php echo site_url()?>tutorialsession/tutor_index" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        <?php
                            if($_SESSION['typeID'] == 1){
                                echo $user_app;
                            }
                        ?>
                    </h3>

                    <p>Approved Tutorial Requests</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-check-circle"></i>
                    </div>
                    <a href="<?php echo site_url()?>tutorialsession/tutor_index" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
    </div>
<?php endif; ?>
    <!--tutee tutsess box-->


    <!--tutor tutsess box-->
<?php if($_SESSION['typeID'] == 2): ?>
    <div class="row">
        <div class="col-lg-offset-6 col-lg-3 col-xs-12 col-sm-6">
            <div class="info-box2">
                <span class="info-box-icon2 bg-boxblend"><i class="fa fa-clock-o"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Hours Rendered</span>
                <span class="info-box-number"><!-- <?php echo $hours_rendered;?>hrs --></span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-3 col-xs-12 col-sm-6">
            <div class="info-box2">
                <span class="info-box-icon2 bg-boxblendr"><i class="fa fa-clock-o"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Hours Left</span>
                <span class="info-box-number">00:00:00</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
    <br/><br/><br/><br/>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        <?php
                            if($_SESSION['typeID'] == 2){
                                echo $tutor_sess;
                            }
                        ?>
                    </h3>

                    <p>All Tutorial Sessions</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-hourglass"></i>
                    </div>
                    <a href="<?php echo site_url()?>tutorialsession/tutor_index"" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>

        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        <?php
                            if($_SESSION['typeID'] == 2){
                                echo $tutor_start;
                            }
                        ?>
                    </h3>

                    <p>Upcoming Sessions</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-hourglass-1"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        <?php
                            if($_SESSION['typeID'] == 2){
                                echo $tutor_end;
                            }
                        ?>
                    </h3>

                    <p>Finished Sessions</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-hourglass-3"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
    </div>
<?php endif; ?>
    <!--tutor tutsess box-->


    <!--admin tutsess box-->
<?php if($_SESSION['typeID'] == 3 || $_SESSION['typeID'] == 5): ?>
    <div class="row">
        <div class="col-lg-4 col-xs-12 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-boxblend"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Number of Tutors</span>
                <span class="info-box-number">100000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-boxblend"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Number of Tutees</span>
                <span class="info-box-number">10000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-boxblend"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Subjects Taught</span>
                <span class="info-box-number">1,410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>    
    </div>   

    <div class="row">
        <div class="col-lg-4 col-xs-12 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-boxblend"><i class="fa fa-commenting"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Subjects Requested to</span>
                <span class="info-box-text"> be Tutored</span>
                <span class="info-box-number">100000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-boxblend"><i class="fa fa-calendar-check-o"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Sessions for Today</span>
                <span class="info-box-number">10000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
   
    </div>       

    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        <?php
                            if($_SESSION['typeID'] == 5){
                                echo $admin_sess;
                            }
                        ?>
                    </h3>

                    <p>All Tutorial Sessions</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-hourglass"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><?php
                        if($_SESSION['typeID'] == 5){
                            echo $admin_pend;
                        }
                        ?>
                    </h3>

                    <p>Pending Sessions</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-hourglass-1"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><?php
                        if($_SESSION['typeID'] == 5){
                            echo $admin_feedback;
                        }
                        ?>
                    </h3>

                    <p>Finished Feedbacks</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-paper-plane-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
    </div>
    <?php endif; ?>

