<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutor Edit</h3>
            </div>
			<?php echo form_open('tutor/register/'.$_SESSION['userID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label class="control-label">Tutor expertise</label>
						<div class="form-group">
							<select name="subject" class="form-control" id="expertise">
								<option value="">Select a subject</option>
								<?php 
								foreach($all_subjects as $subject)
								{

									echo '<option value="'.$subject['subjectID'].'">'.$subject['subjectCode'].'</option>';
								} 
								?> 
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label">Desired Schedule</label>
						<div class="form-group">
							<select name="schedule" class="form-control">
								<option value="">Select a schedule</option>
								<?php 
								foreach($all_timeblocks as $schedule)
								{
									echo '<option value="'.$schedule['timeblockID'].'">'.$schedule['dayofweek'].' '.$schedule['timeStart'].'-'.$schedule['timeEnd'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>

<!-- <script>

 	$(document).ready(function(){
 		$("#expertise").kendoMultiSelect({
 			dataSource: dataSource,
 			dataTextField: "<?php echo $all_subjects['subjectCode']; ?>",
 			dataValueField: "<?php echo $all_subjects['subjectID']; ?>"
 		});
 	});

</script> -->