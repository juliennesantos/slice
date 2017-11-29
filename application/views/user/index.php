<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped datatable">
                    <tr>
						<th>UserID</th>
						<th>TypeID</th>
						<!-- <th>Password</th> -->
						<th>Username</th>
						<th>FirstName</th>
						<th>LastName</th>
						<th>MiddleName</th>
						<th>EmailAddress</th>
						<th>ContactNo</th>
						<th>DateAdded</th>
						<th>DateModified</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($users as $u){ ?>
                    <tr>
						<td><?php echo $u['userID']; ?></td>
						<td><?php echo $u['typeID']; ?></td>
						<!-- <td><?php echo $u['password']; ?></td> -->
						<td><?php echo $u['username']; ?></td>
						<td><?php echo $u['firstName']; ?></td>
						<td><?php echo $u['lastName']; ?></td>
						<td><?php echo $u['middleName']; ?></td>
						<td><?php echo $u['emailAddress']; ?></td>
						<td><?php echo $u['contactNo']; ?></td>
						<td><?php echo date('M j, Y g:i a',strtotime($u['dateAdded'])); ?></td>
						<td><?php echo date('M j, Y g:i a',strtotime($u['dateModified'])); ?></td>
						<td><?php echo $u['status']; ?></td>
						<td>
                            <a href="<?php echo site_url('user/edit/'.$u['userID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('user/remove/'.$u['userID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
