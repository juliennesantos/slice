<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Programs Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('program/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>ProgramID</th>
						<th>SchoolID</th>
						<th>Name</th>
						<th>ProgramCode</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($programs as $p){ ?>
                    <tr>
						<td><?php echo $p['programID']; ?></td>
						<td><?php echo $p['schoolID']; ?></td>
						<td><?php echo $p['name']; ?></td>
						<td><?php echo $p['programCode']; ?></td>
						<td><?php echo $p['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('program/edit/'.$p['programID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('program/remove/'.$p['programID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
