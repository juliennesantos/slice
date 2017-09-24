<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Schedule Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('schedule/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ScheduleID</th>
						<th>Day</th>
						<th>TimeStart</th>
						<th>TimeEnd</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($schedule as $s){ ?>
                    <tr>
						<td><?php echo $s['scheduleID']; ?></td>
						<td><?php echo $s['day']; ?></td>
						<td><?php echo $s['timeStart']; ?></td>
						<td><?php echo $s['timeEnd']; ?></td>
						<td>
                            <a href="<?php echo site_url('schedule/edit/'.$s['scheduleID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('schedule/remove/'.$s['scheduleID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
