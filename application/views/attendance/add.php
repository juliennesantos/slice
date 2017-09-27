<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Attendance Log</h3>
            </div>
            <?php echo form_open('attendance/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tutorID" class="control-label">Tutor</label>
						<div class="form-group">
							<select name="tutorID" class="form-control" min="11" max="11">
								<option value="">select tutor</option>
								<?php 
								foreach($all_tutors as $tutor)
								{
									$selected = ($tutor['tutorID'] == $this->input->post('tutorID')) ? ' selected="selected"' : "";

									echo '<option value="'.$tutor['tutorID'].'" '.$selected.'>'.$tutor['tutorID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="term" class="control-label">Term</label>
						<div class="form-group">
							<input type="text" name="term" value="<?php echo $this->input->post('term'); ?>" class="form-control" id="term" min="11" max="11" />
							<span class="text-danger"><?php echo form_error('term');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="schoolYr" class="control-label">School Year</label>
						<div class="form-group">
							<input type="text" name="schoolYr" value="<?php echo $this->input->post('schoolYr'); ?>" class="form-control" id="schoolYr" min="4" max="4" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="timeIn" class="control-label">Time In</label>
						<div class="form-group">
							<input type="text" name="timeIn" value="<?php echo $this->input->post('timeIn'); ?>" class="has-datetimepicker form-control" id="timeIn" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="timeOut" class="control-label">Time Out</label>
						<div class="form-group">
							<input type="text" name="timeOut" value="<?php echo $this->input->post('timeOut'); ?>" class="has-datetimepicker form-control" id="timeOut" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="remarks" class="control-label">Remarks</label>
						<div class="form-group">
							<textarea name="remarks" class="form-control" id="remarks" max="500"><?php echo $this->input->post('remarks'); ?></textarea>
							<span class="text-danger"><?php echo form_error('remarks');?></span>
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