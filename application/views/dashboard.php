<div class="row">
<div class="col-md-12">
    <!-- PR -->
    <div class="col-lg-4">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Your Tutorial Requests
                </h3>

                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="1 approved tutorial request/s" class="badge bg-green">1</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="nav nav-stacked">
                    <li>Tutorial Requests <span class="pull-right badge bg-blue">1</span></li>
                    <li>Pending Tutorial Requests <span class="pull-right badge bg-aqua">1</span></li>
                    <li>Approved Tutorial Requests <span class="pull-right badge bg-green">1</span></li>
                </ul>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
    <!-- / PR -->

    <!-- Bids    -->
    <div class="col-lg-4">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Feedback
                </h3>

                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="1 approved bids" class="badge bg-light-blue">1</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="nav nav-stacked">
                    <li>All Feedbacks <span class="pull-right badge bg-blue">1</span></li>
                    <li>Pending Feedback <span class="pull-right badge bg-aqua">1</span></li>
                    <li>Answered Feedback <span class="pull-right badge bg-green">1</span></li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- / Bids -->

    <?php if($_SESSION['typeID'] == 2 || $_SESSION['typeID'] == 3 || $_SESSION['typeID'] == 4):?>

    <!-- PR Approval -->
    <div class="col-lg-4">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Purchase Requests for Approval
                </h3>

                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="1 pending PRs" class="badge bg-light-blue">1</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="nav nav-stacked">
                    <li>Pending Purchase Requests <span class="pull-right badge bg-aqua">1</span></li>
                    <li>Endorsed Purchase Requests <span class="pull-right badge bg-green"></span></li>
                    <li>Approved Purchase Requests <span class="pull-right badge bg-green">1</span></li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- / PR Approval -->
    <?php endif;?>
</div>
</div>
