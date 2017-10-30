<div class="row">
<div class="col-lg-12">
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
    <?php if($_SESSION['typeID'] == 3): ?>
    <div class="col-lg-6">
        <div class="list-group">
            <li class="list-group-item list-group-item-warning"><?=$title1?></li>
            <a href="#" class="list-group-item">All Tutorial Sessions<span class="badge">
            <?php
            if($_SESSION['typeID'] == 5){
                echo $count_adminall;
            }
            ?>
            </span></a>
            <a href="#" class="list-group-item">Pending Sessions<span class="badge">
            <?php
            if($_SESSION['typeID'] == 5){
                echo $count_adminpending;
            }
            ?>
            </span></a>
            <a href="#" class="list-group-item">Finished Feedbacks<span class="badge">
            <?php
            if($_SESSION['typeID'] == 5){
                echo $count_adminfeedback;
            }
            ?>
            </span></a>
        </div>
    </div>
    <?php endif; ?>
    <!--admin tutsess box-->

    <!--BOX2-->
    <div class="col-lg-6">
        <div class="list-group">
            <li class="list-group-item list-group-item-warning">Feedback</li>
            <a href="#" class="list-group-item">All Feedbacks<span class="badge">21</span></a>
            <a href="#" class="list-group-item">Pending Feedbacks<span class="badge">21</span></a>
            <a href="#" class="list-group-item">Answered Feedbacks<span class="badge">21</span></a>
        </div>
    </div>
    <!--BOX2-->

</div>
</div>