<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Feedback Edit</h3>
            </div>
			<?php echo form_open('feedback/edit/'.$feedback['feedbackID']); ?>
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
									$selected = ($tutor['tutorID'] == $feedback['tutorID']) ? ' selected="selected"' : "";

									echo '<option value="'.$tutor['tutorID'].'" '.$selected.'>'.$tutor['tutorID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tutorialNo" class="control-label">TutorialNo</label>
						<div class="form-group">
							<input type="text" name="tutorialNo" value="<?php echo ($this->input->post('tutorialNo') ? $this->input->post('tutorialNo') : $feedback['tutorialNo']); ?>" class="form-control" id="tutorialNo" />
							<span class="text-danger"><?php echo form_error('tutorialNo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="feedback" class="control-label">Feedback</label>
						<div class="form-group">
							<input type="text" name="feedback" value="<?php echo ($this->input->post('feedback') ? $this->input->post('feedback') : $feedback['feedback']); ?>" class="form-control" id="feedback" />
							<span class="text-danger"><?php echo form_error('feedback');?></span>
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