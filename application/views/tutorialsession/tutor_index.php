<style>
  {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel panel-black">
      <div class="panel-heading">
        <h3>Tutorial Sessions Listing</h3>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-hover datatable table-responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>Student's Name</th>
              <th>Previous Tutor</th>
              <th>Subject</th>
              <th>Scheduled Date</th>
              <th>Time Started</th>
              <th>Time Ended</th>
              <!-- <th>Remarks</th> -->
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <?php foreach($tutorialsessions as $t){ ?>
          <tr>
            <!-- tutorialNo -->
            <td>
              <?php echo $t['tutorialNo']; ?>
            </td>
            <!-- tutee name -->
            <td>

              <?php echo $t['uteeLN'].', '. $t['uteeFN']; ?>
            </td>
            <!-- previous tutor -->
            <td>

              <?php   if(empty($t['uaLN']))
                          echo 'No previous tutor.';
                      else 
                          echo $t['uaLN'].', '. $t['uaFN'];
            ?>
            </td>
            <!-- subject -->
            <td>
              <?php echo $t['subjectCode']; ?>
            </td>
            <!-- date of tutorial -->
            <td>
              <?php echo date('D, M j Y', strtotime($t['dateTimeRequested'])).', '.date('g:ia', strtotime($t['tbrTS'])).' to '.date('g:ia', strtotime($t['tbrTE']))?>
            </td>
            <!-- time started -->
            <td>
              <?php echo date('g:ia', strtotime($t['dateTimeStart']))?>
            </td>
            <!-- time ended -->
            <td>
              <?php echo date('g:ia', strtotime($t['dateTimeEnd']))?>
            </td>
            <!-- Tutee Remarks -->
            <!-- <td class="col-md-2" style="overflow:hidden">
              <p>
                <?php $t['tuteeRemarks']?>
              </p>
            </td> -->
            <!-- status -->
            <td>
              <?php echo $t['status']; ?>
            </td>
            <td>
              <?php echo form_open('tutorialsession/tutor_index/'); ?>

              <?php if($t['status'] == "Approved"):?>
              <?php if($t['dateTimeStart'] == NULL): ?>
              <button type="submit" name="start" value="start" class="btn btn-success" title="Start Session">
                <span class="fa fa-hourglass-start"></span>
              </button>
              <?php endif; ?>
              <?php if($t['dateTimeEnd'] == NULL): ?>
              <button type="submit" name="end" value="end" class="btn btn-danger" title="End Session">
                <span class="fa fa-hourglass-end"></span>
              </button>
              <?php endif; ?>
              <button type="button" name="checklist" class="btn btn-info modal<?php echo $t['tutorialNo']; ?>" data-toggle="modal" data-target="#modal-default<?php echo $t['tutorialNo']; ?>"
                title="Plan Session" onclick="dothis(<?php echo $t['tutorialNo']; ?>);">
                <span class="fa fa-pencil"></span>
              </button>
              <?php endif; ?>

              <!-- MODAL START -->
              <div class="fade modal" id="modal-default<?php echo $t['tutorialNo']; ?>" class="modal<?php echo $t['tutorialNo']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Plan Tutorial Session</h4>
                    </div>
                    <div class="modal-body">
                      <!-- details -->
                      <table class="table table-striped">
                        <tr>
                          <td>
                            <b>Tutorial No.</b>
                          </td>
                          <td>&emsp;
                            <input type="hidden" name="siteurl" class="siteurl" data-siteurl="<?= site_url(); ?>">
                            <input type="hidden" name="tutorialNo" class="tutorialNo" data-tutno="<?= $t['tutorialNo']; ?>" value="<?= $t['tutorialNo']; ?>">
                            <input type="hidden" name="previousTutorID" value="<?= $t['previousTutorID']; ?>">
                            <input type="hidden" name="subjectID" value="<?= $t['subjectID']; ?>">
                            <input type="hidden" name="dateTimeRequested" value="<?= $t['dateTimeRequested']; ?>">
                            <input type="hidden" name="tutorScheduleID" value="<?= $t['tutorScheduleID']; ?>">

                            <?php echo $t['tutorialNo']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <b>Requestor:</b>
                          </td>
                          <td>&emsp;
                            <?php echo $t['uteeLN'].', '.$t['uteeFN']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <b>Date:</b>
                          </td>
                          <td>&emsp;
                            <?php echo date('D, M j Y', strtotime($t['dateTimeRequested'])).', '.date('g:ia', strtotime($t['tbrTS'])).' to '.date('g:ia', strtotime($t['tbrTE']))?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <b>Remarks:</b>
                          </td>
                          <td style="word-break:break-all">&emsp;
                            <?php echo $t['tuteeRemarks']; ?>
                          </td>
                        </tr>
                      </table>

                      <!-- milestones -->
                      <table class="table table-striped table-hover">
                        <thead>
                          <th class="text-center">Done?</th>
                          <th colspan="2" class="text-center">Milestones</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="3">
                              <b>Edit Previous Milestones</b>
                            </td>
                          </tr>
                        </tbody>
                        <tbody class="items<?php echo $t['tutorialNo'];?>">
                        </tbody>
                        <tbody>
                          <tr>
                            <td>
                              <b>Add New Milestones</b>
                            </td>
                            <td></td>
                            <td class="pull-right">
                              <button type="button" class="pull-right btn btn-info btn-sm add_field_button" onclick="addfield(<?php echo $t['tutorialNo'];?>)">Add Milestone</button>
                            </td>
                          </tr>
                        </tbody>
                        <tbody class="input_fields_wrap<?php echo $t['tutorialNo'];?>">
                        </tbody>
                      </table>
                      <!-- /milestones -->
                      <!-- /details -->

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" name="saveMilestones" id="saveMilestones" value="Save Milestones" class="btn btn-success"></input>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
              </div>
              <!-- MODAL END -->
              <?php echo form_close(); ?>
            </td>
          </tr>
          <?php } ?>
        </table>

        <div class="pull-right">
          <?php echo $this->pagination->create_links(); ?>
        </div>

      </div>
    </div>
  </div>
</div>
