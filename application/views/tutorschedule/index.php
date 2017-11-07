<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutorschedules Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tutorschedule/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
						<th>#</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>TimeblockID</th>
						<th>Term</th>
						<th>SchoolYear</th>
						<th>DateAdded</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tutorschedules as $t){ ?>
                    <tr>
						<td><?php echo $t['tutorScheduleID']; ?></td>
						<td><?php echo $t['lastName']; ?></td>
						<td><?php echo $t['firstName']; ?></td>
						<td><?php echo $t['timeblockID']; ?></td>
						<td><?php echo $t['term']; ?></td>
						<td><?php echo $t['schoolYr']; ?></td>
						<td><?php echo $t['dateAdded']; ?></td>
						<td>
                            <a href="<?php echo site_url('tutorschedule/edit/'.$t['tutorScheduleID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tutorschedule/remove/'.$t['tutorScheduleID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
