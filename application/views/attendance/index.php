<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Attendance Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('attendance/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>LogID</th>
						<th>TutorID</th>
						<th>Term</th>
						<th>SchoolYr</th>
						<th>TimeIn</th>
						<th>TimeOut</th>
						<th>Remarks</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($attendance as $a){ ?>
                    <tr>
						<td><?php echo $a['logID']; ?></td>
						<td><?php echo $a['tutorID']; ?></td>
						<td><?php echo $a['term']; ?></td>
						<td><?php echo $a['schoolYr']; ?></td>
						<td><?php echo $a['timeIn']; ?></td>
						<td><?php echo $a['timeOut']; ?></td>
						<td><?php echo $a['remarks']; ?></td>
						<td>
                            <a href="<?php echo site_url('attendance/edit/'.$a['logID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('attendance/remove/'.$a['logID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
