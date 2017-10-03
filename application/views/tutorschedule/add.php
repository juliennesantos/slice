<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutorschedule Add</h3>
            </div>
            <?php echo form_open('tutorschedule/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tutorID" class="control-label">Tutor</label>
						<div class="form-group">
							<select name="tutorID" class="form-control">
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
						<label for="timeblockID" class="control-label">Timeblock</label>
						<div class="form-group">
							<select name="timeblockID" class="form-control">
								<option value="">select timeblock</option>
								<?php 
								foreach($all_timeblocks as $timeblock)
								{
									$selected = ($timeblock['timeblockID'] == $this->input->post('timeblockID')) ? ' selected="selected"' : "";

									echo '<option value="'.$timeblock['timeblockID'].'" '.$selected.'>'.$timeblock['timeblockID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="term" class="control-label"><span class="text-danger">*</span>Term</label>
						<div class="form-group">
							<input type="text" name="term" value="<?php echo $this->input->post('term'); ?>" class="form-control" id="term" />
							<span class="text-danger"><?php echo form_error('term');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="schoolYear" class="control-label"><span class="text-danger">*</span>SchoolYear</label>
						<div class="form-group">
							<input type="text" name="schoolYear" value="<?php echo $this->input->post('schoolYear'); ?>" class="form-control" id="schoolYear" />
							<span class="text-danger"><?php echo form_error('schoolYear');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateAdded" class="control-label"><span class="text-danger">*</span>DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo $this->input->post('dateAdded'); ?>" class="has-datetimepicker form-control" id="dateAdded" />
							<span class="text-danger"><?php echo form_error('dateAdded');?></span>
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