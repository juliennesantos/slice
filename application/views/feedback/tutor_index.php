<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-black">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3><i class="fa fa-star"></i>&emsp;Your Rating<?php echo $avgrating;?></h3></div>
        <div class="panel-body">
            <table class="table table-striped text-center">
                <thead class="panel-heading">
                    <tr>
                        <th>Subject</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($feedbacks as $f){ ?>
                    <tr>
                        <td><?php echo $f['subjectCode']?></td>
                        <td><?php echo $f['feedback']?></td>
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
