<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutorial Sessions Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('tutorialsession/add'); ?>" class="btn btn-success btn-sm">Request New Tutorial</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Student's Name</th>
                        <th>Previous Tutor</th>
                        <th>Subject</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($tutorialsessions as $t){ ?>
                    <tr>
                        <!-- tutorialNo -->
                        <td>
                            <?php echo $t['tutorialNo']; ?>
                        </td>
                        <!-- tutee name -->
                        <td>
                            <?php echo $t['uteeLN'].', '. $t['uteeFN']; ?>
                        </td>
                        <!-- previous tutor -->
                        <td>
                            <?php   if(empty($t['uaLN']))
                                        echo 'No previous tutor.';
                                    else 
                                        echo $t['uaLN'].', '. $t['uaFN'];
                         ?>
                        </td>
                        <!-- subject -->
                        <td>
                            <?php echo $t['subjectCode']; ?>
                        </td>
                        <!-- date of tutorial -->
                        <td>
                            <?php echo date('D, M j Y', strtotime($t['dateTimeRequested'])).', '.date('g:ia', strtotime($t['tbrTS'])).' to '.date('g:ia', strtotime($t['tbrTE']))?>
                        </td>
                        <!-- status -->
                        <td>
                            <?php echo $t['status']; ?>
                        </td>
                        <td class="col-lg-1">
                            <?php if($t['status'] != "Approved"):?>
                            <a href="<?php echo site_url('tutorialsession/edit/'.$t['tutorialNo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Change Request</a>
                            <a href="<?php echo site_url('tutorialsession/remove/'.$t['tutorialNo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Cancel Request</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>