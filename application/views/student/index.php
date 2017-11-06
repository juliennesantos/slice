<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Students Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('student/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>StudentID</th>
						<th>UserID</th>
						<th>ProgramID</th>
						<th>StudentNo</th>
						<th>Status</th>
						<th>DateAdded</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($students as $s){ ?>
                    <tr>
						<td><?php echo $s['studentID']; ?></td>
						<td><?php echo $s['userID']; ?></td>
						<td><?php echo $s['programID']; ?></td>
						<td><?php echo $s['studentNo']; ?></td>
						<td><?php echo $s['status']; ?></td>
						<td><?php echo $s['dateAdded']; ?></td>
						<td><?php echo $s['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('student/edit/'.$s['studentID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('student/remove/'.$s['studentID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
