<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Subjects Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>SubjectID</th>
						<th>SubjectCode</th>
						<th>Name</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($subjects as $s){ ?>
                    <tr>
						<td><?php echo $s['subjectID']; ?></td>
						<td><?php echo $s['subjectCode']; ?></td>
						<td><?php echo $s['name']; ?></td>
						<td><?php echo $s['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('subject/edit/'.$s['subjectID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('subject/remove/'.$s['subjectID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
