<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tutorial Sessions Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('tutorialsession/add'); ?>" class="btn btn-success btn-sm">Request New Tutorial</a>
                </div>
            </div>
            <div class="box-body">
                <?php echo form_open('tutorialsession/tutor_index/'); ?>
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Student's Name</th>
                        <th>Previous Tutor</th>
                        <th>Subject</th>
                        <th>Scheduled Date</th>
                        <th>Time Started</th>
                        <th>Time Ended</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
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
                        <td class="col-md-3">
                            <?php echo $t['tuteeRemarks']?>
                        </td>
                        <!-- status -->
                        <td>
                            <?php echo $t['status']; ?>
                        </td>
                        <td>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    var max_fields = 50; //maximum input boxes allowed
                                    var wrapper = $(".input_fields_wrap<?php echo $t['tutorialNo'];?>"); //Fields wrapper
                                    var add_button = $(".add_field_button"); //Add button ID

                                    var x = 0; //initial text box count
                                    $.get('<?php echo site_url();?>/tutorialsession/count_checklist/' +
                                        <?= $t['tutorialNo']; ?>,
                                        function (data) {
                                            x = parseInt(data);
                                        }, "number");
                                    $(add_button).click(function (e) { //on add input button click
                                        e.preventDefault();
                                        if (x < max_fields) { //max input box allowed
                                            x++; //text box increment
                                            $(wrapper).append(
                                                '<tr>' +
                                                '<td class="text-center">' +
                                                '<input type="checkbox" data-id="x" name="status[' +
                                                x + ']" value="Done" id="status[' + x + ']" />' +
                                                '</td>' +
                                                '<td>' +
                                                '<input type="text" name="comment[' + x +
                                                ']" class="form-control key_addfield" id="comment[' +
                                                x + ']" required />' +
                                                '</td>' +
                                                '<td class="text-center">' +
                                                '<button class="btn btn-danger remove_field"><i class="fa fa-trash"></i></button>' +
                                                '</td>' +
                                                '</tr>'
                                            ); //add input box
                                        } 
                                        else 
                                        {
                                            alert(
                                                'You have reached the maximum limit of allowed items!'
                                            );
                                        }
                                    });

                                    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                                        e.preventDefault();
                                        $(this).parent().parent('tr').remove();
                                        x--;
                                    });

                                    // EDIT CHECKLIST
                                    $(".modal<?php echo $t['tutorialNo']; ?>").click(function () {
                                            $.ajax({
                                                type: 'GET',
                                                url: '<?php echo site_url();?>/tutorialsession/get_checklist/' + '<?= $t['tutorialNo']; ?>',
                                                success: function(data) {
                                                    $(".items<?php echo $t['tutorialNo'];?>").html(data);
                                                },
                                            });

                                            $('.input_fields_wrap<?php echo $t['tutorialNo'];?>').append(
                                                '<tr>' +
                                                '<td class="text-center">' +
                                                '<input type="checkbox" name="status[0]" value="Done" id="status[0]" />' +
                                                '</td>' +
                                                '<td>' +
                                                '<input type="text" name="comment[0]" class="form-control key_addfield" id="comment[0]" required />' +
                                                '</td>' +
                                                '<td class="text-center">' +
                                                '<button class="btn btn-danger remove_field"><i class="fa fa-trash"></i></button>' +
                                                '</td>' +
                                                '</tr>'
                                            ); 
                                    });
                                });
                            </script>
                            <?php if($t['status'] == "Approved"):?>
                            <button type="submit" name="start" value="start" class="btn btn-success" title="Start Session">
                                <span class="fa fa-hourglass-start"></span>
                            </button>
                            <button type="submit" name="end" value="end" class="btn btn-danger" title="End Session">
                                <span class="fa fa-hourglass-end"></span>
                            </button>
                            <button type="button" name="checklist" class="btn btn-info modal<?php echo $t['tutorialNo']; ?>" data-toggle="modal" data-target="#modal-default<?php echo $t['tutorialNo']; ?>"
                                title="Plan Session">
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
                                                    <td>&emsp;
                                                        <?php echo $t['tuteeRemarks']; ?>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!-- pritems -->
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <th class="text-center">Done?</th>
                                                    <th colspan="2" class="text-center">Milestones</th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><b>Edit Previous Milestones</b></td>
                                                </tr>
                                                </tbody>
                                                <tbody class="items<?php echo $t['tutorialNo'];?>">
                                                </tbody>
                                                <tbody>
                                                <tr>
                                                    <td><b>Add New Milestones</b></td>
                                                    <td></td>
                                                    <td class="pull-right">
                                                        <button type="button" class="pull-right btn btn-info btn-sm add_field_button">Add Milestone</button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tbody class="input_fields_wrap<?php echo $t['tutorialNo'];?>">
                                                </tbody>
                                            </table>
                                            <!-- /pritems -->
                                            <!-- /details -->

                                            <input type="hidden" name="tutorialNo" value="<?php echo $t['tutorialNo']; ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" name="saveMilestones" value="saveMilestones" class="btn btn-success">Save Milestones</button>
                                            </div> 
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                            <!-- MODAL END -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>