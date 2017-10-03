<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Feedback Add</h3>
            </div>
            <?php echo form_open('feedback/add'); ?>
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
						<label for="dateAdded" class="control-label">DateAdded</label>
						<div class="form-group">
							<input type="text" name="dateAdded" value="<?php echo $this->input->post('dateAdded'); ?>" class="has-datetimepicker form-control" id="dateAdded" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="feedback" class="control-label">Feedback</label>
						<div class="form-group">
							<textarea name="feedback" class="form-control" id="feedback"><?php echo $this->input->post('feedback'); ?></textarea>
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