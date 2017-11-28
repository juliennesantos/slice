<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Attendance Log</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped datatable">
          <thead>
            <tr>
              <th>Time in</th>
              <th>Time out</th>
              <th>Remarks</th>
            </tr>
          </thead>
          <tbody>
          	<?php if($attendanceList == NULL):?>
            <tr>
              <td colspan="8" class="text-center">
                <h3>No Attendance!</h3>
              </td>
            </tr>
          	<?php endif;?>
          	<?php foreach($attendanceList as $a){ ?>
          	  <tr>
          		<td><?php echo date("D, M j Y g:i a",strtotime($a['timeIn']));?></td>
          		<td><?php echo date("D, M j Y g:i a",strtotime($a['timeOut']));?></td>
          		<td><?php echo $a['remarks'];?></td>
          	  </tr>
          	<?php }?>
          </tbody>
        </table>
		<div class="pull-right">
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
	</div>
  </div>
</div>