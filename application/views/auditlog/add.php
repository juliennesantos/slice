<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Auditlog Add</h3>
            </div>
            <?php echo form_open('auditlog/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="userID" class="control-label">User</label>
						<div class="form-group">
							<select name="userID" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['userID'] == $this->input->post('userID')) ? ' selected="selected"' : "";

									echo '<option value="'.$user['userID'].'" '.$selected.'>'.$user['userID'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="logType" class="control-label"><span class="text-danger">*</span>LogType</label>
						<div class="form-group">
							<input type="text" name="logType" value="<?php echo $this->input->post('logType'); ?>" class="form-control" id="logType" />
							<span class="text-danger"><?php echo form_error('logType');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="timeStamp" class="control-label"><span class="text-danger">*</span>TimeStamp</label>
						<div class="form-group">
							<input type="text" name="timeStamp" value="<?php echo $this->input->post('timeStamp'); ?>" class="has-datetimepicker form-control" id="timeStamp" />
							<span class="text-danger"><?php echo form_error('timeStamp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="description" class="control-label"><span class="text-danger">*</span>Description</label>
						<div class="form-group">
							<textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
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