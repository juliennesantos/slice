<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-black">
      <div class="panel-heading">
        <h3>Tutors Listing</h3>
      </div>
      <div class="panel-body">
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
          <br/>
          <br/>
          <div class=" col-lg-offset-10">
          <button type="submit" class="btn btn-sm btn-block btn-success" name="add" title="Add Tutor">
            <i class="fa fa-plus"></i>
          </button></div>
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
                <?php echo date('g:i a', strtotime($t['timeStart'])).' to '.date('g:i a', strtotime($t['timeEnd'])); ?>
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
                <?php echo date("M j, Y g:i a",strtotime($t['dateAdded'])); ?>
              </td>
              <td>
                <a href="<?php echo site_url('tutorschedule/edit/'.$t['tutorScheduleID']); ?>" class="btn btn-warning"
                data-toggle="tooltip" title="Edit">
                  <span class="fa fa-pencil"></span></a>
                <a href="<?php echo site_url('tutorschedule/remove/'.$t['tutorScheduleID']); ?>" class="btn btn-danger"
                data-toggle="tooltip" title="Delete">
                  <span class="fa fa-trash"></span></a>
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