<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Auditlogs Listing</h3>
            	
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						
						<th>UserID</th>
                        <th>Name</th>
						<th>LogType</th>
                        <th>Description</th>
						<th>TimeStamp</th>
                    </tr>
                    <?php foreach($auditlogs as $a){ ?>
                    <tr>
						<td><?php echo $a['username']; ?></td>
						<td><?php echo $a['lastName'].', '.$a['firstName']; ?></td>
						<td><?php echo $this->encryption->decrypt($a['logType']); ?></td>
                        <td><?php echo $this->encryption->decrypt($a['description']); ?></td>
						<td><?php echo $a['timeStamp']; ?></td>	
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
