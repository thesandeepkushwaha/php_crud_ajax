<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Address</th>
				<th>City</th>
				<th>Action</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"select * from `student`");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['id']; ?></td>
									<td><?php echo $urow['uname']; ?></td>
									<td><?php echo $urow['email']; ?></td>
									<td><?php echo $urow['mobile']; ?></td>
									<td><?php echo $urow['address']; ?></td>
									<td><?php echo $urow['city']; ?></td>
									<td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['userid']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button>
									  <button class="btn btn-danger delete" value="<?php echo $urow['userid']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}

?>