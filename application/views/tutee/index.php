<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutees Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tutee/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>TuteeID</th>
						<th>StudentID</th>
						<th>Status</th>
						<th>DateAdded</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tutees as $t){ ?>
                    <tr>
						<td><?php echo $t['tuteeID']; ?></td>
						<td><?php echo $t['StudentID']; ?></td>
						<td><?php echo $t['status']; ?></td>
						<td><?php echo $t['dateAdded']; ?></td>
						<td><?php echo $t['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('tutee/edit/'.$t['tuteeID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tutee/remove/'.$t['tuteeID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
