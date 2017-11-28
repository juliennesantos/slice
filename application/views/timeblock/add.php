<div class="row">
    <div class="col-lg-12">
      	<div class="panel panel-black">
            <div class="panel-heading">
              	<h3>Timeblock Add</h3>
            </div>
            <?php echo form_open('timeblock/add'); ?>
          	<div class="panel-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="timeStart" class="control-label"><span class="text-danger">*</span>TimeStart</label>
						<div class="form-group">
							<input type="time" name="timeStart" value="<?php echo $this->input->post('timeStart'); ?>" class="form-control" id="timeStart" />
							<span class="text-danger"><?php echo form_error('timeStart');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="timeEnd" class="control-label"><span class="text-danger">*</span>TimeEnd</label>
						<div class="form-group">
							<input type="time" name="timeEnd" value="<?php echo $this->input->post('timeEnd'); ?>" class="form-control" id="timeEnd" />
							<span class="text-danger"><?php echo form_error('timeEnd');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label"><span class="text-danger">*</span>Status</label>
						<div class="form-group">
							<label class="radio-inline"><input type="radio" name="status" value="Available" class="radio" id="status" >Available</label>
							<label class="radio-inline"><input type="radio" name="status" value="Not Available" class="radio" id="status" />Not Available</label>
							<span class="text-danger"><?php echo form_error('status');?></span>
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