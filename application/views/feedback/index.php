<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-black">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3>Feedback</h3></div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead class="panel-heading">
                    <tr>
                        <th>#</th>
                        <th>TutorialNo</th>
                        <th>DateAdded</th>
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
                            <td><?php echo $f['dateAdded']; ?></td>
                            <td><?php echo $f['feedback']; ?></td>
                            <td>
                                <a href="<?php echo site_url('feedback/edit/'.$f['feedbackID']); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('feedback/remove/'.$f['feedbackID']); ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span> Delete</a>
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
