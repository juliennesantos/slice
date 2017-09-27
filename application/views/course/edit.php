<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Course Edit</h3>
            </div>
			<?php echo form_open('course/edit/'.$course['courseID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="courseCode" class="control-label">CourseCode</label>
						<div class="form-group">
							<input type="text" name="courseCode" value="<?php echo ($this->input->post('courseCode') ? $this->input->post('courseCode') : $course['courseCode']); ?>" class="form-control" id="courseCode" min="7" max="7" />
							<span class="text-danger"><?php echo form_error('courseCode');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $course['name']); ?>" class="form-control" id="name" max="80" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="description" class="control-label">Description</label>
						<div class="form-group">
							<textarea name="description" class="form-control" id="description" max="500"><?php echo ($this->input->post('description') ? $this->input->post('description') : $course['description']); ?></textarea>
							<span class="text-danger"><?php echo form_error('description');?></span>
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