<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Faculty Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('faculty/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>FacultyID</th>
						<th>UserID</th>
						<th>ProgramID</th>
						<th>FacultyNo</th>
						<th>Status</th>
						<th>DateAdded</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($faculty as $f){ ?>
                    <tr>
						<td><?php echo $f['facultyID']; ?></td>
						<td><?php echo $f['userID']; ?></td>
						<td><?php echo $f['programID']; ?></td>
						<td><?php echo $f['facultyNo']; ?></td>
						<td><?php echo $f['status']; ?></td>
						<td><?php echo $f['dateAdded']; ?></td>
						<td><?php echo $f['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('faculty/edit/'.$f['facultyID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('faculty/remove/'.$f['facultyID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
