<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Usertypes Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('usertype/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>TypeID</th>
						<th>UserType</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($usertypes as $u){ ?>
                    <tr>
						<td><?php echo $u['typeID']; ?></td>
						<td><?php echo $u['userType']; ?></td>
						<td>
                            <a href="<?php echo site_url('usertype/edit/'.$u['typeID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('usertype/remove/'.$u['typeID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
