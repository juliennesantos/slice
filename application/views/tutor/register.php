<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Set Expertise</h3>
				<button type="button" class="btn btn-info pull-right add_field_button" title="You may add up to three subjects">Add Expertise</button>
			</div>
			<?php echo form_open('tutor/register/'.$_SESSION['userID']); ?>
			<input type="hidden" class="siteurl" data-siteurl="<?=site_url();?>">
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label class="control-label">Desired Day of Week</label>
						<div class="form-group">
							<select name="dayofweek" class="form-control" required>
								<option value="">Select a day of week</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
							</select>
							<?= form_error('dayofweek');?>
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label">Desired Schedule</label>
						<div class="form-group">
						<?php echo form_error("schedule");?>
							<select name="schedule" class="form-control" required>
								<option value="">Select a schedule</option>
								<?php foreach($available_timeblocks as $schedule)
								{
									echo '<option value="'.$schedule['timeblockID'].'">'.$schedule['dayofweek'].' '.$schedule['timeStart'].'-'.$schedule['timeEnd'].'</option>';
								} ?>
							</select>
						</div>
					</div>
					<div class="col-md-offset-2 col-md-10 input_fields_wrap">
						<label class="control-label"><h4>Tutor expertise</h4></label>
						<div class="col-md-12">
						<div class="form-group col-md-10">
						<?= form_error('subject[]');?>
							<select name="subject[]" class="form-control" id="expertise" required>
								<option value="">Select a subject</option>
								<?php 
								$i = 0;
								foreach($all_subjects as $subject)
								{
									echo '<option class="subjID[' . $i . ']" data-subjid="' . $subject['subjectID'] . '" value="'.$subject['subjectID'].'">'.$subject['subjectCode'].'</option>';
									$i++;
								}?>
							</select>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" name="update" value="update" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- <script src="<?= site_url(); ?>resources\js\tutor\tutorregister.js"></script> -->
<!-- <script>
$(document).ready(function () {

  var subjects = $(".subjID").data("subjid");
  var site_url = $(".siteurl").data("siteurl");
	
	var c = $(".subjID").data("subjid").length();
	var i = 0;
		for(i)
		subjects = value;
		i++
	});
	
	console.log($(".subjID").data("subjid"));
  console.log(site_url);

  var x = 0; //initial text box count
  var max_fields = 2; //maximum input boxes allowed
  var wrapper = $(".input_fields_wrap"); //Fields wrapper
  var add_button = $(".add_field_button"); //Add button ID

  
  $(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    if (x < max_fields) { //max input box allowed
      x++; //text box increment
      $(wrapper).append(                  
        '<div class="col-md-12">' +
        '<div class="form-group col-md-10">' +                    
        '<select name="subject['+ x +']" class="form-control" id="expertise" required>' +                                 
        '<option value="">Select a subject</option>'

        // $.each(subjID, function(){
        //   $(this).append('<option value="'['subjectID'].'">'.$subject['subjectCode'].'</option>');
        // })

        +
        '</select>' +
        '</div>'+
        '<div class="col-md-2">' + 
        '<button type="button" class="btn btn-danger form-control remove_field" style="width:50%;">' +
        '<i class="fa fa-trash"></i>' +
        '</button>' +
        '</div>'+
        '</div>'
      ); //add input box
    } else {
      alert(
        'You have reached the maximum limit of allowed items!'
      );
    }
  });
  
  $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
    e.preventDefault();
    $(this).parent().parent('div').remove();
    x--;
  });
  
});
</script> -->