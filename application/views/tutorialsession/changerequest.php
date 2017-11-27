<!-- Modal for change request-->
<?php form_open('tutorialsession/changerequest'.$t[0]['tutorialNo'])?>
<div class="col-md-12">
  <div class="row">
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
        <table class="table table-striped text-center">
          <tbody>
            <tr>
              <td>
                <b>#</b>
              </td>
              <td>
                <input type="hidden" name="tutorialNo" class="tutno" data-no="<?= $t[0]['tutorialNo']; ?>" value="<?= $t[0]['tutorialNo']; ?>">
                <?= $t[0]['tutorialNo']; ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Your Tutor
                  <b/>
              </td>
              <td>
                <?php if($t[0]['uaLN'] == NULL){
                                  echo 'No tutor';
                                }
                                else{
                                  echo $t[0]['uaLN'] . ', ' . $t[0]['uaFN'];
                                } ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Subject
                  <b/>
              </td>
              <td>
                <input type="hidden" name="<?= $t[0]['subjectCode'] ?>">
                <?= $t[0]['subjectCode']; ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Date of Session
                  <b/>
              </td>
              <td>
                <?= date('D, M j Y', strtotime($t[0]['dateTimeEnd'])) ?>
              </td>
            </tr>
          </tbody>
        </table>
        <hr/>
        <!-- Tutorschedule -->
        <div class="row">
          <label for="tutorschedrequestedID" class="col-lg-4 control-label">Select a new Timeblock</label>
          <div class="form-group col-lg-12 col-sm-12">
            <select name="tutorschedrequestedID" id="fullwidth" class="form-control timeblock<?=$t[0]['tutorialNo']?>">
              <option value="">Choose subject first!</option>
              <?php 
                foreach ($all_timeblocks as $timeblock)
                    {
                    $selected = ($timeblock['timeblockID'] == $this->input->post('timeblockID')) ? ' selected="selected"' : "";

                    echo '<option value="' . $timeblock['timeblockID'] . '" ' . $selected . '>' . $timeblock['timeStart'] . ' to ' . $timeblock['timeEnd'] . '</option>';
                }
                ?>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <label class="control-label col-lg-4 col-sm-4">Select a new date </label>
          <div class="form-group col-lg-12 col-sm-12">
            <!-- Date -->
            <div class="input-group date" id="fullwidth">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="date" class="form-control datepicker" id="datepicker2" name="tutorialdate" placeholder="Choose your preferred date">
              <!-- <input type="date" class="form-control pull-right datepicker" id="datepicker" name="tutorialdate" placeholder="Choose your preferred date" required> -->

            </div>
          </div>
        </div>
        <br>
        <!-- Remarks -->
        <div class="row">
          <div class="form-group col-lg-4 col-sm-4">
            <textarea name="remarks" class="form-control" id="remarks" placeholder="Justification..." rows="4" cols="68">
              <?php echo $this->input->post('remarks'); ?>
            </textarea>
            <span class="text-danger">
              <?php echo form_error('remarks'); ?>
            </span>
          </div>
        </div>
      </div>
      <!--MODAL CONTENT-->
      <div class="modal-footer">
        <button type="submit" name="chreq" id="chreqs<?= $t[0]['tutorialNo'] ?>" value="chreq" class="btn btn-success btn-block pull-right">
          <i class="fa fa-check"></i> Submit Change Request
        </button>
      </div>
    </div>
  </div>
  </div>
</div>
<?php form_close();?>
<!-- /Modal -->