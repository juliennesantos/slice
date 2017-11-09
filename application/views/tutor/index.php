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
                        <th>Course</th>
						<th>Status</th>
						<th>TutorType</th>
						<th>DateAdded</th>
						<th>DateModified</th>
                    </tr>
                    <?php foreach($tutors as $t){ ?>
                    <tr>
						<td><?php echo $t['username']; ?></td>
						<td><?php echo $t['lastName'].', '.$t['firstName']; ?></td>
                        <td><?php echo $t['programCode'];?></td>
						<td><?php echo $t['status']; ?></td>
						<td><?php echo $t['tutorType']; ?></td>
						<td><?php echo $t['dateAdded']; ?></td>
						<td><?php echo $t['dateModified']; ?></td>
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
