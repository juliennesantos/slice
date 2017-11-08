<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3>Subjects Listing</h3>
            </div>
            <div class="panel-body">
                <a href="<?php echo site_url('subject/add'); ?>" class="btn btn-block btn-success"><i class="fa fa-plus"></i>&emsp; Add</a> 
                <table class="table table-striped datatable">
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
                            <a href="<?php echo site_url('subject/edit/'.$s['subjectID']); ?>" class="btn btn-warning" title="Edit"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('subject/remove/'.$s['subjectID']); ?>" class="btn btn-danger" title="Delete"><span class="fa fa-trash"></span></a>
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
