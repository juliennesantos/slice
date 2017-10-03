<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Programcourse Add</h3>
            </div>
            <?php echo form_open('programcourse/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="programID" class="control-label">Program</label>
						<div class="form-group">
							<select name="programID" class="form-control">
								<option value="">select program</option>
								<?php 
								foreach($all_programs as $program)
								{
									$selected = ($program['programID'] == $this->input->post('programID')) ? ' selected="selected"' : "";

									echo '<option value="'.$program['programID'].'" '.$selected.'>'.$program['programID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="subjectID" class="control-label">Subject</label>
						<div class="form-group">
							<select name="subjectID" class="form-control">
								<option value="">select subject</option>
								<?php 
								foreach($all_subjects as $subject)
								{
									$selected = ($subject['subjectID'] == $this->input->post('subjectID')) ? ' selected="selected"' : "";

									echo '<option value="'.$subject['subjectID'].'" '.$selected.'>'.$subject['subjectID'].'</option>';
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