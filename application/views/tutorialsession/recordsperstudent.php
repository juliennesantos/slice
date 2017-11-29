<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel panel-black">
      <div class="panel-heading">
        <h3>Records Per Student</h3>
      </div>
      <div class="panel-body">
        <?php echo form_open('tutorialsession/recordsperstudent');?>
        <div class="form-group">
          <select name="" id="" class="form-control">
            <option value="">Select a tutor...</option>
            <?php foreach($all_tutors as $t){ ?>
              <option value="<?=$t['userID']?>"><?=$t['username'].' | '.$t['lastName'].', '.$t['firstName']?></option>
            <?php }?>
          </select>
        </div>
        <div class="form-group">
          <a class="btn bg-maroon">Generate Sessions Report</button>
          <button type="submit" name="attendance" class="btn bg-olive">Generate Attendance Report</button>
        </div>
        <?php form_close();?>
      </div>
    </div>
  </div>
</div>