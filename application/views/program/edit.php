<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Program Edit</h3>
            </div>
			<?php echo form_open('program/edit/'.$program['programID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="schoolID" class="control-label">School</label>
						<div class="form-group">
							<select name="schoolID" class="form-control">
								<option value="">select school</option>
								<?php 
								foreach($all_schools as $school)
								{
									$selected = ($school['schoolID'] == $program['schoolID']) ? ' selected="selected"' : "";

									echo '<option value="'.$school['schoolID'].'" '.$selected.'>'.$school['schoolID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $program['name']); ?>" class="form-control" id="name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="programCode" class="control-label">ProgramCode</label>
						<div class="form-group">
							<input type="text" name="programCode" value="<?php echo ($this->input->post('programCode') ? $this->input->post('programCode') : $program['programCode']); ?>" class="form-control" id="programCode" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateModified" class="control-label">DateModified</label>
						<div class="form-group">
							<input type="text" name="dateModified" value="<?php echo ($this->input->post('dateModified') ? $this->input->post('dateModified') : $program['dateModified']); ?>" class="has-datetimepicker form-control" id="dateModified" />
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