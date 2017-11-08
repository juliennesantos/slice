<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-black">
      <div class="panel-heading">
        <h3>Pending Tutorial Sessions</h3>
      </div>
      <div class="panel-body">
        <div class="form-group col-lg-offset-10 col-xs-offset-10 col-sm-offset-10 col-md-offset-10">
          <a href="<?php echo site_url('tutorialsession/add'); ?>" class="btn btn-success btn-block">Request New Tutorial</a>
        </div>
        <table class="table table-striped datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Student's Name</th>
              <th>Previous Tutor</th>
              <th>Assigned Tutor</th>
              <th>Subject</th>
              <th>Requested Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if($tutorialsessions == NULL):?>
            <tr>
              <td colspan="8" class="text-center">
                <h3>No pending requests!</h3>
              </td>
            </tr>
            <?php endif;?>
            <?php foreach($tutorialsessions as $t){ ?>
            <script type="text/javascript">
              $(document).ready(function () {

                $("#modal<?php echo $t['tutorialNo']; ?>").click(function () {
                  // $(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
                  $.get('<?php echo site_url();?>tutorialsession/findtutors/' + $(this).data(
                    'sid'), function (data) {
                    $("#tutors<?= $t['tutorialNo']; ?>").html(data);
                    $('#loader').slideUp(200, function () {
                      $(this).remove();
                    });
                  });
                });

              });
            </script>

            <tr>
              <td>
                <?php echo $t['tutorialNo']; ?>
              </td>
              <td>
                <?php echo $t['uteeLN'].', '. $t['uteeFN']; ?>
              </td>
              <td>
                <?php   if(empty($t['urLN']))
    echo 'No tutor yet!';
    else 
    echo $t['urLN'].', '. $t['urFN'];
    ?>
              </td>
              <td>
                <?php   if(empty($t['uaLN']))
    echo 'No tutor yet!';
    else 
    echo $t['uaLN'].', '. $t['uaFN'];
    ?>
              </td>
              <td>
                <?php echo $t['subjectCode']; ?>
              </td>
              <td>
                <?php echo date('D, M j Y', strtotime($t['dateTimeRequested'])).', '.date('g:ia', strtotime($t['tbrTS'])).' to '.date('g:ia', strtotime($t['tbrTE']))?>
              </td>
              <td>
                <?php echo $t['status']; ?>
              </td>
              <td class="col-lg-1">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-<?php echo $t['tutorialNo']; ?>" data-sid="<?php echo $t['subjectID']?>"
                  id="modal<?php echo $t['tutorialNo']; ?>">View Request</button>


                <!-- MODAL -->
                <div class="modal fade" id="modal-<?php echo $t['tutorialNo']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Approve Tutorial Session</h4>
                      </div>
                      <?php echo form_open('tutorialsession/approvalview/'); ?>
                      <div class="modal-body">
                        <input type="hidden" name="emailAddress" value="<?php echo $t['uteeEmail']; ?>" />
                        <!-- details -->
                        <table class="table table-hover table-striped">
                          <tr>
                            <td>Tutorial #</td>
                            <td>
                              <?php echo $t['tutorialNo']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Tutee Name:</td>
                            <td>
                              <?php echo $t['uteeLN'] . ', ' . $t['uteeFN']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Tutee ID Number:</td>
                            <td>
                              <?php echo $t['uteeUN']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Previous Tutor:</td>
                            <td>
                              <?php if (empty($t['urLN']))
                                echo 'No previous tutor';
                                else
                                echo $t['urLN'] . ', ' . $t['urFN'];
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Subject:</td>
                            <td>
                              <?php echo $t['subjectCode']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Tutorial Status:</td>
                            <td>
                              <?php echo $t['status']; ?>
                            </td>
                          </tr>
                        </table>
                        <!-- /details -->

                        <input type="hidden" name="tutorialNo" value="<?php echo $t['tutorialNo']; ?>">
                        <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                          <!-- Set Tutor -->

                          <!-- <label for="tutorID" class="control-label">&emsp;Set Tutor</label> -->&emsp;
                            <select name="tutorID" class="form-control" id='tutors<?= $t['tutorialNo']; ?>'>

                            </select>
                          </div></div><br/>
                          <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                          <!-- Remarks -->&emsp;
                            <textarea name="remarks" class="form-control" id="remarks"
                            placeholder="Write your remarks here..." cols="60" rows="4"></textarea>
                            <span class="text-danger">
                              <?php echo form_error('coordRemarks'); ?>
                            </span>
                          </div></div>
                          <!-- /.input group -->
                          <!-- /.form group -->
                          <br/>
                        <div class="modal-footer">
                          <div class="row">
                            <div class="col-lg-6">
                            <button type="submit" name="<?php
                            if($t['status'] == "Cancel Pending")
                              echo 'approveCancel';
                            else if(stristr($t['status'], 'Change Pending'))
                              echo 'approveChange';
                            else
                            echo 'approveUpdate';
                            ?>" value="<?php
                            if (stristr($t['status'], 'Change Pending')) {
                              $int = intval(preg_replace('/[^0-9]+/', '', $t['status']));
                              echo $int;
                            } else
                              echo $t['tutorialNo'];
                            ?>" class="btn btn-primary btn-block" data-toggle="tooltip" title="Approve">
                            <i class="fa fa-2x fa-check-circle"></i></button></div>
                            <div class="col-lg-6">


                          <button type="submit" name="<?php
                           if ($t['status'] == "Cancel Pending")
                              echo 'disapproveCancel';
                              else if (stristr($t['status'], 'Change Pending'))
                                echo 'disapproveChange';
                              else
                                echo 'disapproveUpdate';
                            ?>" value="<?php
                            if (stristr($t['status'], 'Change Pending')){
                                $int = intval(preg_replace('/[^0-9]+/', '', $t['status']));
                                echo $int;
                              }
                              else
                              echo $t['tutorialNo']; 
                            ?>" class="btn btn-danger btn-block" data-toggle="tooltip" title="Disapprove" onclick="confirm('Disapprove this request?');">
                            <i class="fa fa-2x fa-times-circle"></i></button></div>
                          </div>
                        </div>
                        <?php echo form_close(); ?>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <div class="pull-right">
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>
  </div>
</div>