<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tutorialchecklist Add</h3>
            </div>
            <?php echo form_open('tutorialchecklist/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tutorialNo" class="control-label">Tutorialsession</label>
						<div class="form-group">
							<select name="tutorialNo" class="form-control">
								<option value="">select tutorialsession</option>
								<?php 
								foreach($all_tutorialsessions as $tutorialsession)
								{
									$selected = ($tutorialsession['tutorialNo'] == $this->input->post('tutorialNo')) ? ' selected="selected"' : "";

									echo '<option value="'.$tutorialsession['tutorialNo'].'" '.$selected.'>'.$tutorialsession['tutorialNo'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="subjectArea" class="control-label"><span class="text-danger">*</span>SubjectArea</label>
						<div class="form-group">
							<input type="text" name="subjectArea" value="<?php echo $this->input->post('subjectArea'); ?>" class="form-control" id="subjectArea" />
							<span class="text-danger"><?php echo form_error('subjectArea');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateAdded" class="control-label"><span class="text-danger">*</span>DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo $this->input->post('dateAdded'); ?>" class="has-datetimepicker form-control" id="dateAdded" />
							<span class="text-danger"><?php echo form_error('dateAdded');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateModified" class="control-label">DateModified</label>
						<div class="form-group">
							<input type="text" name="dateModified" value="<?php echo $this->input->post('dateModified'); ?>" class="has-datetimepicker form-control" id="dateModified" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label"><span class="text-danger">*</span>Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
							<span class="text-danger"><?php echo form_error('status');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="comment" class="control-label"><span class="text-danger">*</span>Comment</label>
						<div class="form-group">
							<textarea name="comment" class="form-control" id="comment"><?php echo $this->input->post('comment'); ?></textarea>
							<span class="text-danger"><?php echo form_error('comment');?></span>
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