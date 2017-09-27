<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Schedule Add</h3>
            </div>
            <?php echo form_open('schedule/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="day" class="control-label">Day</label>
						<div class="form-group">
							<input type="text" name="day" value="<?php echo $this->input->post('day'); ?>" class="form-control" id="day" max="9" />
							<span class="text-danger"><?php echo form_error('day');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="timeStart" class="control-label">TimeStart</label>
						<div class="form-group">
							<input type="text" name="timeStart" value="<?php echo $this->input->post('timeStart'); ?>" class="form-control" id="timeStart" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="timeEnd" class="control-label">TimeEnd</label>
						<div class="form-group">
							<input type="text" name="timeEnd" value="<?php echo $this->input->post('timeEnd'); ?>" class="form-control" id="timeEnd" />
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