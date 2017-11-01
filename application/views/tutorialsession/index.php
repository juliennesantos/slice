<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" href="fontawesome-stars.css">

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-black">
            <div class="panel-heading"><h3>Tutorial Sessions Listing</h3></div>
            <div class="panel-body">
                <div class="col-lg-offset-10 pull-right">
                    <a href="<?php echo site_url('tutorialsession/add'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&emsp;Request New Tutorial</a> 
                </div>
                <br/><br/>
                <table class="table table-striped datatable">
                <thead>
                    <tr>
						<th>#</th>
                        <th>Previous Tutor</th>
						<th>Your Tutor</th>
						<th>Subject</th>
                        <th>Requested Date</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                </thead>
                    <?php foreach($tutorialsessions as $t){ ?>
                    <tr>
						<td><?= $t['tutorialNo']; ?></td>
						<td>
                        <?php   if(empty($t['urLN']))
                                    echo 'No tutor yet!';
                                else 
                                    echo $t['urLN'].', '. $t['urFN'];
                        ?>
                        </td>
                        <td><?php   if(empty($t['uaLN']))
                                        echo 'No tutor yet!';
                                    else 
                                        echo $t['uaLN'].', '. $t['uaFN'];
                        ?>
                        </td>
						<td><?= $t['subjectCode']; ?></td>
                        <td><?= date('D, M j Y', strtotime($t['dateTimeRequested'])).', '.date('g:ia', strtotime($t['tbrTS'])).' to '.date('g:ia', strtotime($t['tbrTE']))?></td>
						<td><?= $t['status']; ?></td>
						<td class="col-lg-2">
                            <?php if($t['status'] == "Approved" && $t['dateTimeStart'] == NULL):?>
                                <a href="<?= site_url('tutorialsession/edit/'.$t['tutorialNo']); ?>" class="btn btn-info" title="Change Request"><span class="fa fa-pencil"></span></a> 
                                <a href="<?= site_url('tutorialsession/remove/'.$t['tutorialNo']); ?>" class="btn btn-danger" title="Cancel Request"><span class="fa fa-trash"></span></a>
                            <?php endif; ?>
                            <?php if($t['dateTimeEnd'] != NULL): ?>
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#fbmodal<?=$t['tutorialNo']?>"><span class="fa fa-pencil"></span>Add Feedback</button>
                            <?php endif; ?>

                                <!-- Modal -->
                                <div id="fbmodal<?=$t['tutorialNo']?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Review this Tutorial Session</h4>
                                    </div>
                                    <div class="modal-body">
                                    <?php echo form_open('tutorialsession/tutee'); ?>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr><td><b>#</b></td><td><?= $t['tutorialNo']; ?></td></tr>
                                                <tr><td><b>Your Tutor<b/></td><td><?= $t['uaLN'].', '. $t['uaFN']; ?></td></tr>
                                                <tr><td><b>Subject<b/></td><td><?= $t['subjectCode']; ?></td></tr>
                                                <tr><td><b>Date of Session<b/></td><td><?= date('D, M j Y', strtotime($t['dateTimeEnd']))?></td></tr>
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="tutorialNo" value="<?= $t['tutorialNo']; ?>">
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
                                            <textarea name="feedback" class="form-control" id="feedback" placeholder="Input your feedback here" maxlength="1000" minlength="50"><?php echo $this->input->post('feedback'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="addfeedback" value="addfeedback" class="btn btn-success pull-right">
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
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
<script src="<?= site_url('resources\jquery-bar-rating\dist\jquery.barrating.min.js'); ?>"></script>
<script type="text/javascript">
   $(function() {
      $('#rating').barrating({
        theme: 'fontawesome-stars'
      });
   });
</script>