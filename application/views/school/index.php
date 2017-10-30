<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Schools Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('school/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>SchoolID</th>
						<th>Name</th>
						<th>SchoolCode</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($schools as $s){ ?>
                    <tr>
						<td><?php echo $s['schoolID']; ?></td>
						<td><?php echo $s['name']; ?></td>
						<td><?php echo $s['schoolCode']; ?></td>
						<td><?php echo $s['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('school/edit/'.$s['schoolID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('school/remove/'.$s['schoolID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
