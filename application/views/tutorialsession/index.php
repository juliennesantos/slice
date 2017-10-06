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
                        <th>Previous Tutor</th>
						<th>Your Tutor</th>
						<th>Subject</th>
                        <th>Requested Date</th>
						<th>Approved Date</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tutorialsessions as $t){ ?>
                    <tr>
						<td><?php echo $t['tutorialNo']; ?></td>
						<td><?php echo $t['urLN'].', '. $t['urFN']; ?></td>
                        <td><?php   if(empty($t['uaLN']))
                                        echo 'No tutor yet!';
                                    else 
                                        echo $t['uaLN'].', '. $t['uaFN'];
                         ?>
                         </td>
						<td><?php echo $t['subjectCode']; ?></td>
                        <td><?php echo date('D, M j Y', strtotime($t['dateTimeRequested'])).', '.date('g:ia', strtotime($t['tbrTS'])).' to '.date('g:ia', strtotime($t['tbrTE']))?></td>
                        <td><?php 
                            if(empty($t['dateTimeApproved']))
                            echo 'No date yet!';
                            else 
                            echo $t['dateTimeApproved'].', '.$t['tsadow'].', '.$t['tbaTS'].' to '.$t['tbaTE']?></td>
						<td><?php echo $t['status']; ?></td>
						<td>
                            <a href="<?php echo site_url('tutorialsession/edit/'.$t['tutorialNo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tutorialsession/remove/'.$t['tutorialNo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
