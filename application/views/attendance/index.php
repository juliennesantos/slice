<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Attendance Listing</h3>
            	<!-- <div class="box-tools">
                    <a href="<?php echo site_url('attendance/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div> -->
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>Tutor Name</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Remarks</th>
						<!-- <th>Actions</th> -->
                    </tr>
                    <?php foreach($attendanceList as $a){ ?>
                    <tr>
						<td><?php echo $a['firstName'].' '. $a['lastName']; ?></td>
                        <td><?php echo $a['timeIn']; ?></td>
                        <td><?php echo $a['timeOut']; ?></td>
						<td><?php echo $a['remarks']; ?></td>
						<!-- <td>
                            <a href="<?php echo site_url('attendance/view/'.$a['tutorID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> View</a> 
                            <a href="<?php echo site_url('attendance/remove/'.$a['logID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> 
                        </td> -->
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
