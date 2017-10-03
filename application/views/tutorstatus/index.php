<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutorstatus Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tutorstatus/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>StatusID</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tutorstatus as $t){ ?>
                    <tr>
						<td><?php echo $t['statusID']; ?></td>
						<td><?php echo $t['status']; ?></td>
						<td>
                            <a href="<?php echo site_url('tutorstatus/edit/'.$t['statusID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tutorstatus/remove/'.$t['statusID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
