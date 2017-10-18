<div class="container-fluid">
    <div class="row">
        <div class="panel panel-black">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3>Tutor Expertise</h3></div>
        <div class="panel-body">
            <table class="table table-striped table-responsive">
                <thead class="panel-heading">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                        <a href="<?php echo site_url('tutorexpertise/add'); ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> &nbsp;Add</a> 
                        </th>
                    </tr>
                    <tr>
                        <th class="col-lg-2 col-xs-2">ExpertiseID</th>
                        <th class="col-lg-2 col-xs-2">TutorID</th>
                        <th class="col-lg-2 col-xs-2">SubjectID</th>
                        <th class="col-lg-2 col-xs-2">DateModified</th>
                        <th class="col-lg-2 col-xs-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tutorexpertise as $t){ ?>
                        <tr>
                            <td><?php echo $t['expertiseID']; ?></td>
                            <td><?php echo $t['tutorID']; ?></td>
                            <td><?php echo $t['subjectID']; ?></td>
                            <td><?php echo $t['dateModified']; ?></td>
                            <td>
                                <a href="<?php echo site_url('tutorexpertise/edit/'.$t['expertiseID']); ?>" class="btn btn-warning"><span class="fa fa-pencil"></span>&nbsp; Edit</a> 
                                <a href="<?php echo site_url('tutorexpertise/remove/'.$t['expertiseID']); ?>" class="btn btn-danger"><span class="fa fa-trash"></span>&nbsp; Delete</a>
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
