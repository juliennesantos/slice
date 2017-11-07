<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tutors Listing</h3>
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body">
        <?php form_open('tutorschedule/index')?>
        <div class="form-group">
          <select name="userID" class="form-control select2" multiple="multiple" data-placeholder="Add a Student Tutor here..." style="width: 100%;">
            <?php 
              foreach ($all_users as $user)
              {
              $selected = ($user['userID'] == $this->input->post('userID')) ? ' selected="selected"' : "";
              ?>
            <option value="<?= $user['userID']; ?>" <?=$selected; ?>>
              <?= $user['studentNo']; ?>&emsp;|&emsp;
                <?= $user['lastName']; ?>,
                  <?= $user['firstName']; ?>&emsp;
            </option>
            <?php
              }
              ?>
          </select>
          <button type="submit" class="btn btn-success" name="add" title="Add Tutor">
            <i class="fa fa-plus"></i>
          </button>
        </div>
        <?php form_close();?>
        <table class="table table-striped datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>ID No.</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Day</th>
              <th>Timeblock</th>
              <th>Term</th>
              <th>SchoolYear</th>
              <th>DateAdded</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tutorschedules as $t){ ?>
            <tr>
              <td>
                <?php echo $t['tutorScheduleID']; ?>
              </td>
              <td>
                <?php echo $t['studentNo']; ?>
                <?php echo $t['facultyNo']; ?>
              </td>
              <td>
                <?php echo $t['lastName']; ?>
              </td>
              <td>
                <?php echo $t['firstName']; ?>
              </td>
              <?php if($t['dayofweek'] != NULL): ?>
              <td>
                <?php echo $t['dayofweek']; ?>
              </td>
              <td>
                <?php echo $t['timeStart'].' to '.$t['timeEnd']; ?>
              </td>
              <td>
                <?php echo $t['term']; ?>
              </td>
              <td>
                <?php echo $t['schoolYr']; ?>
              </td>
              <?php else:?>
              <td colspan="4" class="text-center">
                <h3>No schedule yet!</h3>
              </td>
              <?php endif; ?>
              <td>
                <?php echo $t['dateAdded']; ?>
              </td>
              <td>
                <a href="<?php echo site_url('tutorschedule/edit/'.$t['tutorScheduleID']); ?>" class="btn btn-info btn-xs">
                  <span class="fa fa-pencil"></span> Edit</a>
                <a href="<?php echo site_url('tutorschedule/remove/'.$t['tutorScheduleID']); ?>" class="btn btn-danger btn-xs">
                  <span class="fa fa-trash"></span> Delete</a>
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