<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutors Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tutor/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>TutorID</th>
						<th>UserID</th>
						<th>StatusID</th>
						<th>TutorType</th>
						<th>DateAdded</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tutors as $t){ ?>
                    <tr>
						<td><?php echo $t['tutorID']; ?></td>
						<td><?php echo $t['userID']; ?></td>
						<td><?php echo $t['statusID']; ?></td>
						<td><?php echo $t['tutorType']; ?></td>
						<td><?php echo $t['dateAdded']; ?></td>
						<td><?php echo $t['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('tutor/edit/'.$t['tutorID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tutor/remove/'.$t['tutorID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
