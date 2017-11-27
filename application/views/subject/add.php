<div class="row">
    <div class="col-lg-12">
      	<div class="panel panel-black">
            <div class="panel-heading">
              	<h3>Subject Add</h3>
            </div>
            <?php echo form_open('subject/add'); ?>
          	<div class="panel-body">
          		<div class="row clearfix">
					<div class="col-md-offset-2 col-md-8">
						<label for="subjectCode" class="control-label"><span class="text-danger">*</span>Subject Code</label>
						<div class="form-group">
							<input type="text" name="subjectCode" value="<?php echo $this->input->post('subjectCode'); ?>" class="form-control" id="subjectCode" />
							<span class="text-danger"><?php echo form_error('subjectCode');?></span>
						</div>
						<label for="name" class="control-label"><span class="text-danger">*</span>Full Subject Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
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