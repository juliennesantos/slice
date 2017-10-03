<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Feedbacks Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('feedback/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>FeedbackID</th>
						<th>TutorialNo</th>
						<th>DateAdded</th>
						<th>Feedback</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($feedbacks as $f){ ?>
                    <tr>
						<td><?php echo $f['feedbackID']; ?></td>
						<td><?php echo $f['tutorialNo']; ?></td>
						<td><?php echo $f['dateAdded']; ?></td>
						<td><?php echo $f['feedback']; ?></td>
						<td>
                            <a href="<?php echo site_url('feedback/edit/'.$f['feedbackID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('feedback/remove/'.$f['feedbackID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
