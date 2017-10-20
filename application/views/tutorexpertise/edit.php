<div class="container-fluid">
<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-black">
				<div class="panel-heading"><h3><i class="fa fa-edit"></i>&nbsp; Edit Tutor Expertise</h3></div>
					<div class="panel-body">
						<?php echo form_open('tutorexpertise/edit/'.$tutorexpertise['expertiseID']); ?>
							<div class="col-lg-12">

									<div class="col-md-4">
										<div class="form-group">
											<label for="tutorID" class="control-label">Tutor</label>
											<select class="form-control" name="tutorID">
												<option value="">select tutor...</option>	
												<?php 
												foreach($all_tutors as $tutor)
												{
													$selected = ($tutor['tutorID'] == $tutorexpertise['tutorID']) ? ' selected="selected"' : "";

													echo '<option value="'.$tutor['tutorID'].'" '.$selected.'>'.$tutor['tutorID'].'</option>';
												} 
												?>
											</select>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="subjectID" class="control-label">Subject</label>
											<select class="form-control" name="subjectID">
												<option value="">select subject...</option>	
												<?php 
												foreach($all_subjects as $subject)
												{
													$selected = ($subject['subjectID'] == $tutorexpertise['subjectID']) ? ' selected="selected"' : "";

													echo '<option value="'.$subject['subjectID'].'" '.$selected.'>'.$subject['subjectID'].'</option>';
												} 
												?>
											</select>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="dateModified" class="control-label">Date Modified</label>
											<input type="text" name="dateModified" value="<?php echo ($this->input->post('dateModified') ? $this->input->post('dateModified') : $tutorexpertise['dateModified']); ?>" class="has-datetimepicker form-control" id="dateModified" />
										</div>
									</div>

							</div>
					</div>
							<div class="panel-footer">
								<div class="col-lg-offset-11">
								<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Save</button>
								</div>
							</div>
            			<?php echo form_close(); ?>
				</div>
			</div>
		</div>
</div>
</div>