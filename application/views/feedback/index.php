<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-black">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3>Feedback</h3></div>
        <div class="panel-body">
            <table class="table table-striped datatable">
                <thead class="panel-heading">
                    <tr>
                        <th>#</th>
                        <th>TutorialNo</th>
                        <th>Date of Tutorial</th>
                        <th>Feedback</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($feedbacks as $f){ ?>
                        <tr>
                            <td><?php echo $f['feedbackID']; ?></td>
                            <td><?php echo $f['tutorialNo']; ?></td>
                            <td><?php echo $f['dateTimeEnd']; ?></td>
                            <td><?php echo $f['feedback'] == NULL ? "No feedback yet!" : $f['feedback']; ?></td>
                            <td>
                            <?php if($f['feedback'] == NULL):?>
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#fbmodal<?=$f['tutorialNo']?>"><span class="fa fa-pencil"></span>Add Feedback</button>
                            <?php endif; ?>
                                <!-- Modal -->
                                <div id="fbmodal<?=$f['tutorialNo']?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Review this Tutorial Session</h4>
                                    </div>
                                    <div class="modal-body">
                                    <?php echo form_open('feedback/add/'.$f['tutorialNo']); ?>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr><td><b>#</b></td><td><?= $f['tutorialNo']; ?></td></tr>
                                                <tr><td><b>Your Tutor<b/></td><td><?= $f['lastName'].', '. $f['firstName']; ?></td></tr>
                                                <tr><td><b>Subject<b/></td><td><?= $f['subjectCode']; ?></td></tr>
                                                <tr><td><b>Date of Session<b/></td><td><?= date('D, M j Y', strtotime($f['dateTimeEnd']))?></td></tr>
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="tutorialNo" value="<?= $f['tutorialNo']; ?>">
                                        <label for="feedback" class="control-label">Feedback</label>
                                        <div class="form-group">
                                            <textarea name="feedback" class="form-control" id="feedback" placeholder="Input your feedback here"><?php echo $this->input->post('feedback'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success pull-right">
                                            <i class="fa fa-check"></i> Submit
                                        </button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    <?php echo form_close(); ?>
                                    </div>

                                </div>
                                </div>

                                <!-- /Modal -->
                            </td>
                        </tr>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        <div class="pull-right">
            <?php echo $this->pagination->create_links(); ?>                    
        </div> 
        </div>
        </div>
    </div>
</div>
