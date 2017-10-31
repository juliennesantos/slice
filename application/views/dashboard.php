    <!--tutee tutsess box-->
    <?php if($_SESSION['typeID'] == 1): ?>
    <div class="col-lg-6">
        <div class="list-group">
            <li class="list-group-item list-group-item-warning"><?=$title1?></li>
            <a href="#" class="list-group-item">Tutorial Requests<span class="badge">
            <?php 
            if($_SESSION['typeID'] == 1){
                echo $user_sess;
            }
            ?>
            </span></a>
            <a href="#" class="list-group-item">Pending Tutorial Requests<span class="badge">
            <?php 
            if($_SESSION['typeID'] == 1){
                echo $user_pend;
            }
            ?>
            </span></a>
            <a href="#" class="list-group-item">Approved Tutorial Requests<span class="badge">
            <?php 
            if($_SESSION['typeID'] == 1){
                echo $user_app;
            }
            ?>
            </span></a>
        </div>
    </div>
    <?php endif; ?>
    <!--tutee tutsess box-->


    <!--tutor tutsess box-->
    <?php if($_SESSION['typeID'] == 2): ?>
    <div class="col-lg-6">
        <div class="list-group">
            <li class="list-group-item list-group-item-warning"><?=$title1?></li>
            <a href="#" class="list-group-item">All Tutorial Sessions<span class="badge">
            <?php 
            if($_SESSION['typeID'] == 2){
                echo $tutor_sess;
            }
            ?>
            </span></a>
            <a href="#" class="list-group-item">Upcoming Sessions<span class="badge">
            <?php 
            if($_SESSION['typeID'] == 2){
                echo $tutor_start;
            }
            ?>
            </span></a>
            <a href="#" class="list-group-item">Finished Sessions<span class="badge">
            <?php 
            if($_SESSION['typeID'] == 2){
                echo $tutor_end;
            }
            ?>
            </span></a>
        </div>
    </div>
    <?php endif; ?>
    <!--tutor tutsess box-->


    <!--admin tutsess box-->
<?php if($_SESSION['typeID'] == 3 || $_SESSION['typeID'] == 5): ?>
    <div class="row">
        <div class="col-lg-4 col-xs-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Number of Tutors</span>
                <span class="info-box-number">100000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-4 col-xs-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Number of Tutees</span>
                <span class="info-box-number">10000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-4 col-xs-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Subjects Taught</span>
                <span class="info-box-number">1,410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>    
    </div>   

    <div class="row">
        <div class="col-lg-4 col-xs-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-commenting"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Subjects Requested to be Tutored</span>
                <span class="info-box-number">100000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-lg-4 col-xs-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-calendar-check-o"></i></span>

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
            <div class="small-box bg-aqua">
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
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-aqua">
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
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-aqua">
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
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
    </div>
    <?php endif; ?>

