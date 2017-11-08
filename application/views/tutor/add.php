<div class="row">
    <div class="col-lg-12">
      	<div class="panel panel-black">
            <div class="panel-heading">
              	<h3>Add Tutors</h3>
            </div>
            <?php echo form_open('tutor/add'); ?>
          	<div class="panel-body">
          		<div class="row clearfix">
					<div class="col-lg-12">
						<label for="userID" class="control-label">User</label>
						<div class="form-group">
							<select name="userID" class="form-control select2" multiple="multiple" data-placeholder="Select a Student" style="width: 100%;">
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['userID'] == $this->input->post('userID')) ? ' selected="selected"' : "";
									?>
									<option value="<?=$user['userID'];?>" <?=$selected; ?>>									
													<?=$user['studentNo'];?>&emsp;|&emsp;<?=$user['lastName'];?>, <?=$user['firstName'];?>&emsp;
									</option>
									<?php
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="statusID" class="control-label">Tutorstatus</label>
						<div class="form-group">
							<input name="statusID" class="form-control" value="Active" readonly></input>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tutorType" class="control-label"><span class="text-danger">*</span>TutorType</label>
						<div class="form-group">
							<input type="text" name="tutorType" value="Honor Scholar" class="form-control" id="tutorType" readonly />
							<span class="text-danger"><?php echo form_error('tutorType');?></span>
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