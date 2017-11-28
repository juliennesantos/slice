<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3 class="text-center">Auditlog</h3>
            </div>
            <div class="panel-body">
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
						<td><?php echo date("M j, Y g:i a",strtotime($a['timeStamp'])); ?></td>	
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
