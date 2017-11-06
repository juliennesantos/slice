<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutorialchecklists Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tutorialchecklist/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>ChecklistID</th>
						<th>TutorialNo</th>
						<th>SubjectArea</th>
						<th>DateAdded</th>
						<th>DateModified</th>
						<th>Status</th>
						<th>Comment</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tutorialchecklists as $t){ ?>
                    <tr>
						<td><?php echo $t['checklistID']; ?></td>
						<td><?php echo $t['tutorialNo']; ?></td>
						<td><?php echo $t['subjectArea']; ?></td>
						<td><?php echo $t['dateAdded']; ?></td>
						<td><?php echo $t['dateModified']; ?></td>
						<td><?php echo $t['status']; ?></td>
						<td><?php echo $t['comment']; ?></td>
						<td>
                            <a href="<?php echo site_url('tutorialchecklist/edit/'.$t['checklistID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tutorialchecklist/remove/'.$t['checklistID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
