<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutorexpertise Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tutorexpertise/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ExpertiseID</th>
						<th>TutorID</th>
						<th>CourseID</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tutorexpertise as $t){ ?>
                    <tr>
						<td><?php echo $t['expertiseID']; ?></td>
						<td><?php echo $t['tutorID']; ?></td>
						<td><?php echo $t['courseID']; ?></td>
						<td>
                            <a href="<?php echo site_url('tutorexpertise/edit/'.$t['expertiseID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tutorexpertise/remove/'.$t['expertiseID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
