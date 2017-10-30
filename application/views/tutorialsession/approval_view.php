<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pending Tutorial Sessions</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('tutorialsession/add'); ?>" class="btn btn-success btn-sm">Request New Tutorial</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
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
                    <?php foreach($tutorialsessions as $t){ ?>
                        <script type="text/javascript">
                            $(document).ready(function() {

                                $("#modal<?php echo $t['tutorialNo']; ?>").click(function() {
                                    // $(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
                                    $.get('<?php echo site_url();?>tutorialsession/findtutors/' + $(this).data('sid'), function(data) {
                                        $("#tutors").html(data);
                                        $('#loader').slideUp(200, function() {
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
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-default" data-sid="<?php echo $t['subjectID']?>" id="modal<?php echo $t['tutorialNo']; ?>"><span class="fa fa-pencil"></span> Approve</button>
                            </td>
                        </tr>

                        <!-- MODAL -->
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Approve Tutorial Session</h4>
                                    </div>
                                    <?php echo form_open('tutorialsession/approvalview/'); ?>
                                    <div class="modal-body">
                                    <input type="hidden" name="emailAddress" value="<?php echo $t['uteeEmail'];?>" />
                                        <!-- details -->
                                        Tutorial # <?php echo $t['tutorialNo']; ?>
                                        <br>
                                        Tutee Name: <?php echo $t['uteeLN'].', '. $t['uteeFN']; ?>
                                        <br>
                                        Tutee ID Number: <?php echo $t['uteeUN']; ?>
                                        <br>
                                        Previous Tutor: <?php   if(empty($t['urLN']))
                                                                    echo 'No previous tutor';
                                                                else 
                                                                    echo $t['urLN'].', '. $t['urFN'];
                                                        ?>
                                        <br>
                                        Subject: <?php echo $t['subjectCode']; ?>
                                        <br>
                                        Tutorial Status: <?php echo $t['status']; ?>
                                        <br>
                                        <!-- /details -->

                                        <input type="hidden" name="tutorialNo" value="<?php echo $t['tutorialNo']; ?>">
                                        <div class="form-group">
                                            <!-- Set Tutor -->
                                            <label for="tutorID" class="control-label">Set Tutor</label>
                                            <div class="form-group">
                                                <select name="tutorID" class="form-control" id='tutors'>
                                                </select>
                                            </div>
                                            <!-- Remarks -->
                                            <label for="remarks" class="control-label">Remarks</label>
                                            <div class="form-group">
                                                <textarea name="remarks" class="form-control" id="remarks"><?php echo $this->input->post('coordRemarks'); ?></textarea>
                                                <span class="text-danger"><?php echo form_error('coordRemarks');?></span>
                                            </div>
                                            <!-- /.input group -->
                                            <!-- /.form group -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button type="submit" name="approveUpdate" value="Approve" class="btn btn-primary">Approve</button>
                                            <button type="submit" name="disapproveUpdate" value="Disapprove" class="btn btn-danger" onclick="confirm('Disapprove this request?');">Disapprove</button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                </div>
            </div>
        </div>
    </div>