<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Degreeprograms Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('degreeprogram/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ProgramID</th>
						<th>Name</th>
						<th>ProgramCode</th>
						<th>Description</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($degreeprograms as $d){ ?>
                    <tr>
						<td><?php echo $d['programID']; ?></td>
						<td><?php echo $d['name']; ?></td>
						<td><?php echo $d['programCode']; ?></td>
						<td><?php echo $d['description']; ?></td>
						<td>
                            <a href="<?php echo site_url('degreeprogram/edit/'.$d['programID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('degreeprogram/remove/'.$d['programID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
