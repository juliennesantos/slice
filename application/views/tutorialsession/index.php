<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutorialsessions Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tutorialsession/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>TutorialNo</th>
						<th>TuteeID</th>
						<th>TutorID</th>
						<th>SubjectID</th>
						<th>DateTimeApproved</th>
						<th>DateTimeStarted</th>
						<th>DateTimeEnded</th>
						<th>DateAdded</th>
						<th>DateModified</th>
						<th>Status</th>
						<th>Remarks</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tutorialsessions as $t){ ?>
                    <tr>
						<td><?php echo $t['tutorialNo']; ?></td>
						<td><?php echo $t['tuteeID']; ?></td>
						<td><?php echo $t['tutorID']; ?></td>
						<td><?php echo $t['subjectID']; ?></td>
						<td><?php echo $t['dateTimeApproved']; ?></td>
						<td><?php echo $t['dateTimeStarted']; ?></td>
						<td><?php echo $t['dateTimeEnded']; ?></td>
						<td><?php echo $t['dateAdded']; ?></td>
						<td><?php echo $t['dateModified']; ?></td>
						<td><?php echo $t['status']; ?></td>
						<td><?php echo $t['remarks']; ?></td>
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
