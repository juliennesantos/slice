<div class="row">
<div class="col-lg-12">
    <!--BOX1-->
    <div class="col-lg-6">
        <div class="list-group">
            <li class="list-group-item list-group-item-warning">Your Tutorial Requests</li>
            <a href="#" class="list-group-item">Tutorial Requests<span class="badge">
            <?php 
            if($_SESSION['typeID'] == 1){
                echo $user_sess;
            }
            if($_SESSION['typeID'] == 2){
                echo $tutor_sess;
            }
            ?>
            </span></a>
            <a href="#" class="list-group-item">Pending Tutorial Requests<span class="badge">
            <?php 
            if($_SESSION['typeID'] == 1){
                echo $user_pend;
            }
            if($_SESSION['typeID'] == 5){
                echo $tutor_pend;
            }
            ?>
            </span></a>
            <a href="#" class="list-group-item">Approved Tutorial Requests<span class="badge">21</span></a>
        </div>
    </div>
    <!--BOX1-->

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
    
    <?php if($_SESSION['typeID'] == 2 || $_SESSION['typeID'] == 3 || $_SESSION['typeID'] == 4):?>

    <?php endif;?>
</div>
</div>