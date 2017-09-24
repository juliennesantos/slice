<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutee Edit</h3>
            </div>
			<?php echo form_open('tutee/edit/'.$tutee['tuteeID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="studentID" class="control-label">Student</label>
						<div class="form-group">
							<select name="studentID" class="form-control">
								<option value="">select student</option>
								<?php 
								foreach($all_students as $student)
								{
									$selected = ($student['studentID'] == $tutee['studentID']) ? ' selected="selected"' : "";

									echo '<option value="'.$student['studentID'].'" '.$selected.'>'.$student['studentID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tutorialNo" class="control-label">TutorialNo</label>
						<div class="form-group">
							<input type="text" name="tutorialNo" value="<?php echo ($this->input->post('tutorialNo') ? $this->input->post('tutorialNo') : $tutee['tutorialNo']); ?>" class="form-control" id="tutorialNo" />
							<span class="text-danger"><?php echo form_error('tutorialNo');?></span>
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