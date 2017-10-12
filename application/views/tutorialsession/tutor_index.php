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
                        <th>Remarks</th>
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
                        <!-- Tutee Remarks -->
                        <td class="col-md-3">
                            <?php echo $t['tuteeRemarks']?>
                        </td>
                        <!-- status -->
                        <td>
                            <?php echo $t['status']; ?>
                        </td>
                        <td>
                            <?php if($t['status'] == "Approved"):?>
                            <button type="submit" name="start" class="btn btn-success" title="Start Session"><span class="fa fa-hourglass-start"></span></a>
                            <button type="submit" name="end" class="btn btn-danger" title="End Session"><span class="fa fa-hourglass-end"></span></a>
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