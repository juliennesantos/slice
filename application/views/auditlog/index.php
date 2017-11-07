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
						
						<th>UserID</th>
                        <th>Name</th>
						<th>LogType</th>
						<th>TimeStamp</th>
						<th>Description</th>
						
                    </tr>
                    <?php foreach($auditdecrypt as $a){ ?>
                    <tr>
						<td><?php echo $a['username']; ?></td>
						<td><?php echo $a['lastName'].', '.$a['firstName']; ?></td>
						<td><?php echo $a['logType']; ?></td>
						<td><?php echo $a['timeStamp']; ?></td>
						<td><?php echo $a['description']; ?></td>
						
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
