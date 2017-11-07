<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Auditlogs Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('auditlog/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>AuditID</th>
						<th>UserID</th>
                        <th>Name</th>
						<th>LogType</th>
						<th>TimeStamp</th>
						<th>Description</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($auditdecrypt as $a){ ?>
                    <tr>
<<<<<<< HEAD
						<td><?php echo $a['username']; ?></td>
						<td><?php echo $a['lastName'].', '.$a['firstName']; ?></td>
						<td><?php echo $a['logType']; ?></td>
						<td><?php echo $a['timeStamp']; ?></td>
						<td><?php echo $a['description']; ?></td>
						
=======
						<td><?php echo $a['auditID']; ?></td>
						<td><?php echo $a['userID']; ?></td>
						<td><?php echo $a['logType']; ?></td>
						<td><?php echo $a['timeStamp']; ?></td>
						<td><?php echo $a['description']; ?></td>
						<td>
                            <a href="<?php echo site_url('auditlog/edit/'.$a['auditID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('auditlog/remove/'.$a['auditID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
>>>>>>> parent of 1c32b12... auditlog
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
