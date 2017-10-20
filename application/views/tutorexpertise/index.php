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
                        <a href="<?php echo site_url('tutorexpertise/add'); ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> &nbsp;Add New</a> 
                        </th>
                    </tr>
                    <tr>
                        <th class="col-lg-2 col-xs-2">Expertise ID</th>
                        <th class="col-lg-2 col-xs-2">Tutor ID</th>
                        <th class="col-lg-2 col-xs-2">Subject ID</th>
                        <th class="col-lg-3 col-xs-3">Date Modified</th>
                        <th class="col-lg-1 col-xs-1">Actions</th>
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
                                <a href="<?php echo site_url('tutorexpertise/edit/'.$t['expertiseID']); ?>" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a> 
                                <a href="<?php echo site_url('tutorexpertise/remove/'.$t['expertiseID']); ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
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
