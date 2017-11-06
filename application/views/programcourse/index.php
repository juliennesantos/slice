<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Programcourses Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('programcourse/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>RefNo</th>
						<th>ProgramID</th>
						<th>SubjectID</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($programcourses as $p){ ?>
                    <tr>
						<td><?php echo $p['refNo']; ?></td>
						<td><?php echo $p['programID']; ?></td>
						<td><?php echo $p['subjectID']; ?></td>
						<td>
                            <a href="<?php echo site_url('programcourse/edit/'.$p['refNo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('programcourse/remove/'.$p['refNo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
