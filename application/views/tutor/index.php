<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3>Tutors Listing</h3>
            </div>
            <div class="panel-body">
            <a href="<?php echo site_url('tutor/add'); ?>" class="btn btn-block btn-success"><i class="fa fa-plus"></i>&emsp; Add</a> 

                <table class="table table-striped datatable">
                    <tr>
						<th>ID number</th>
						<th>Name</th>
						<th>Status</th>
						<th>TutorType</th>
						<th>DateAdded</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tutors as $t){ ?>
                    <tr>
						<td><?php echo $t['username']; ?></td>
						<td><?php echo $t['lastName'].', '.$t['firstName']; ?></td>
						<td><?php echo $t['status']; ?></td>
						<td><?php echo $t['tutorType']; ?></td>
						<td><?php echo $t['dateAdded']; ?></td>
						<td><?php echo $t['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('tutor/edit/'.$t['tutorID']); ?>" class="btn btn-info" title="Edit"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('tutor/remove/'.$t['tutorID']); ?>" class="btn btn-danger" title="Delete"><span class="fa fa-trash"></span></a>
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
