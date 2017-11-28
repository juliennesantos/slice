<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3>Timeblocks Listing</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <a href="<?php echo site_url('timeblock/add'); ?>" class="btn btn-block btn-success"><i class="fa fa-plus"></i>&emsp; Add Timeblock</a> 
                </div>
                <table class="table table-striped datatable">
                    <tr>
						<th>Timeblock ID</th>
						<th>Time Start</th>
						<th>Time End</th>
						<th>Status</th>
						<th>Date Modified</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($timeblocks as $t){ ?>
                    <tr>
						<td><?php echo $t['timeblockID']; ?></td>
						<td><?php echo $t['timeStart']; ?></td>
						<td><?php echo $t['timeEnd']; ?></td>
						<td><?php echo $t['status']; ?></td>
						<td><?php echo $t['dateModified']; ?></td>
						<td>
                            <a href="<?php echo site_url('timeblock/edit/'.$t['timeblockID']); ?>" class="btn btn-warning" title="Edit"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('timeblock/remove/'.$t['timeblockID']); ?>" class="btn btn-danger" title="Delete"><span class="fa fa-trash"></span></a>
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
