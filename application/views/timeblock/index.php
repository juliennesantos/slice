<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Timeblocks Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('timeblock/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>TimeblockID</th>
						<th>Dayofweek</th>
						<th>TimeStart</th>
						<th>TimeEnd</th>
						<th>Status</th>
						<th>DateModified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($timeblocks as $t){ ?>
                    <tr>
						<td><?php echo $t['timeblockID']; ?></td>
						<td><?php echo $t['dayofweek']; ?></td>
						<td><?php echo $t['timeStart']; ?></td>
						<td><?php echo $t['timeEnd']; ?></td>
						<td><?php echo $t['status']; ?></td>
						<td><?php echo $t['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('timeblock/edit/'.$t['timeblockID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('timeblock/remove/'.$t['timeblockID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
