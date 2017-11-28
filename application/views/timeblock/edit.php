<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Timeblock Edit</h3>
            </div>
			<?php echo form_open('timeblock/edit/'.$timeblock['timeblockID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="timeStart" class="control-label"><span class="text-danger">*</span>TimeStart</label>
						<div class="form-group">
							<input type="text" name="timeStart" value="<?php echo ($this->input->post('timeStart') ? $this->input->post('timeStart') : $timeblock['timeStart']); ?>" class="form-control" id="timeStart" />
							<span class="text-danger"><?php echo form_error('timeStart');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="timeEnd" class="control-label"><span class="text-danger">*</span>TimeEnd</label>
						<div class="form-group">
							<input type="text" name="timeEnd" value="<?php echo ($this->input->post('timeEnd') ? $this->input->post('timeEnd') : $timeblock['timeEnd']); ?>" class="form-control" id="timeEnd" />
							<span class="text-danger"><?php echo form_error('timeEnd');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label"><span class="text-danger">*</span>Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $timeblock['status']); ?>" class="form-control" id="status" />
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