<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-black">
      <div class="panel-heading">
        <h3>Tutorial Sessions Listing</h3>
      </div>
      <div class="panel-body">
        <div class="col-lg-offset-10 pull-right">
          <a href="<?php echo site_url('tutorialsession/add'); ?>" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i>&emsp;Request New Tutorial</a>
        </div>
        <br/>
        <input type="hidden" class="url" value="<?=site_url();?>">
        <br/>
        <table class="table table-striped datatable">
          <?php echo form_open('tutorialsession/tutee'); ?>
          <thead>
            <tr>
              <th>#</th>
              <th>Your Tutor</th>
              <th>Previous Tutor</th>
              <th>Subject</th>
              <th>Requested Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <?php foreach($tutorialsessions as $t){ ?>
          <tr>
            <td>
              <?= $t['tutorialNo']; ?>
            </td>
            <td>
              <input type="hidden" name="tutorID" value="<?= $t['tutorID']; ?>">
              <?php   if(empty($t['uaLN']))
                          echo 'No tutor yet!';
                      else 
                          echo $t['uaLN'].', '. $t['uaFN'];
              ?>
            </td>
            <td>
              <input type="hidden" name="previousTutorID" value="<?= $t['previousTutorID']; ?>">
              <?php if (empty($t['urLN']))
                echo 'No tutor yet!';
              else
                echo $t['urLN'] . ', ' . $t['urFN'];
              ?>
            </td>
            <td>
              <input type="hidden" name="subjectID" value="<?= $t['subjectID']; ?>" data-subjid="<?= $t['subjectID']; ?>">
              <?= $t['subjectCode']; ?>
            </td>
            <td>
              <?= date('D, M j Y', strtotime($t['dateTimeRequested'])).', '.date('g:ia', strtotime($t['tbrTS'])).' to '.date('g:ia', strtotime($t['tbrTE']))?>
            </td>
            <td>
              <?= $t['status']; ?>

                <!-- Modal for change request-->
                <div id="chreq<?= $t['tutorialNo'] ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                          &times;
                        </button>
                        <h4 class="modal-title">Change Request for Tutorial Session</h4>
                      </div>
                      <div class="modal-body">
                        <table class="table table-striped datatable text-center">
                          <tbody>
                            <tr>
                              <td>
                                <b>#</b>
                              </td>
                              <td>
                                <input type="hidden" name="tutorialNo" class="tutno" data-no="<?= $t['tutorialNo']; ?>" value="<?= $t['tutorialNo']; ?>">
                                <?= $t['tutorialNo']; ?>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>Your Tutor
                                  <b/>
                              </td>
                              <td>
                                <?= $t['uaLN'] . ', ' . $t['uaFN']; ?>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>Subject
                                  <b/>
                              </td>
                              <td>
                                <input type="hidden" name="<?= $t['subjectCode'] ?>">
                                <?= $t['subjectCode']; ?>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>Date of Session
                                  <b/>
                              </td>
                              <td>
                                <?= date('D, M j Y', strtotime($t['dateTimeEnd'])) ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <hr/>
                        <!-- Tutorschedule -->
                        <div class="row">
                        <label for="tutorschedrequestedID" class="col-lg-4 control-label">Select a new Timeblock</label>
                        <div class="form-group col-lg-12 col-sm-12">
                          <select name="tutorschedrequestedID" id="fullwidth" class="form-control timeblock<?=$t['tutorialNo']?>">
                            <option value="">Choose subject first!</option>
                            <?php 
                              foreach ($all_timeblocks as $timeblock)
                                  {
                                  $selected = ($timeblock['timeblockID'] == $this->input->post('timeblockID')) ? ' selected="selected"' : "";

                                  echo '<option value="' . $timeblock['timeblockID'] . '" ' . $selected . '>' . $timeblock['timeStart'] . ' to ' . $timeblock['timeEnd'] . '</option>';
                              }
                              ?>
                          </select>
                        </div></div>
                        <br>
                        <div class="row">
                        <label class="control-label col-lg-4 col-sm-4">Select a new date </label>
                        <div class="form-group col-lg-12 col-sm-12">
                          <!-- Date -->
                          <div class="input-group date" id="fullwidth">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control datepicker" id="datepicker" name="tutorialdate" placeholder="Choose your preferred date">
                          </div>
                        </div>
                        </div>
                        <br>
                        <!-- Remarks -->
                        <div class="row">
                        <div class="form-group col-lg-4 col-sm-4">
                          <textarea name="remarks" class="form-control" id="remarks" placeholder="Justification..." rows="4" cols="75"><?php echo $this->input->post('remarks'); ?></textarea>
                          <span class="text-danger">
                            <?php echo form_error('remarks'); ?>
                          </span>
                        </div>
                        </div>
                      </div><!--MODAL CONTENT-->
                      <div class="modal-footer">
                        <button type="submit" name="chreq" value="chreq" class="btn btn-success btn-block pull-right">
                          <i class="fa fa-check"></i> Submit Change Request
                        </button>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /Modal -->
            </td>
            <td class="col-lg-2">
              <?php if($t['status'] == "Approved" && $t['dateTimeStart'] == NULL):?>
              <button type="button" 
                      name="changerequest"
                      class="btn btn-warning findtb" 
                      data-toggle="modal" 
                      data-target="#chreq<?= $t['tutorialNo'] ?>"
                      title="Change Request"
                      value="<?= $t['subjectID']; ?>"
                      onclick="forchange(<?= $t['tutorialNo'] ?>, <?= $t['subjectID']; ?>, <?=site_url();?>);" >
              
                <span class="fa fa-pencil"></span>
              </button>
              <button name="cancelrequest" value="<?= $t['tutorialNo']; ?>" id="cancelrequest" type="submit" class="btn btn-danger" title="Cancel Request"
                onclick="confirm('Request to cancel this session?');">
                <span class="fa fa-trash"></span>
              </button>
              <?php endif; ?>
              <?php if($t['dateTimeEnd'] != NULL): ?>
              <button type="button" class="btn btn-info" title="Comment on this session" data-toggle="modal" data-target="#fbmodal<?=$t['tutorialNo']?>">
                <span class="fa fa-comment"></span>
              </button>
              <?php endif; ?>

              <!-- Modal for feedback-->
              <div id="fbmodal<?=$t['tutorialNo']?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">
                        &times;
                      </button>
                      <h4 class="modal-title">Review this Tutorial Session</h4>
                    </div>
                    <div class="modal-body">
                      <?php echo form_open('tutorialsession/tutee'); ?>
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td>
                              <b>#</b>
                            </td>
                            <td>
                              <p class="tutorialNo" data-tutno="<?= $t['tutorialNo']; ?>"><?= $t['tutorialNo']; ?></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <b>Your Tutor
                                <b/>
                            </td>
                            <td>
                              <?= $t['uaLN'].', '. $t['uaFN']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <b>Subject
                                <b/>
                            </td>
                            <td>
                              <?= $t['subjectCode']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <b>Date of Session
                                <b/>
                            </td>
                            <td>
                              <?= date('D, M j Y', strtotime($t['dateTimeEnd']))?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <label for="rating" class="control-label">Rating</label>
                      <div class="form-group">
                        <select name="rating" id="rating">
                          <option value="1"></option>
                          <option value="2"></option>
                          <option value="3"></option>
                          <option value="4"></option>
                          <option value="5"></option>
                        </select>
                      </div>
                      <label for="feedback" class="control-label">Feedback</label>
                      <div class="form-group">
                        <textarea name="feedback" class="form-control" id="feedback" placeholder="Input your feedback here" maxlength="1000">
                          <?php echo $this->input->post('feedback'); ?>
                        </textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="addfeedback" value="addfeedback" class="btn btn-success pull-right">
                        <i class="fa fa-check"></i> Submit
                      </button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
              <!-- /Modal -->
            </td>
          </tr>
          <?php } ?>
          <?php echo form_close(); ?>
        </table>
        <div class="pull-right">
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>
  </div>
</div>