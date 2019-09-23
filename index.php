<?php
	include('conn.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>PHP CRUD Operation</title>
	</head>
<body>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-3">
		</div>
		<div class = "col-md-6 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">PHP - CRUD Operation</h2></center>
					<hr>
					  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Add Details
  </button>

			
			 <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
              <div class="form-group">
                <input type="text" name="uname" id="add_name" class="form-control" placeholder="Name" required>
              </div>

              <div class="form-group">
                <input type="text" name="email" id="add_email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="mobile" id="add_mobile" class="form-control" placeholder="Mobile" required>
              </div>

              <div class="form-group">
                <input type="text" name="address" id="add_address" class="form-control" placeholder="Address" required>
              </div>
              <div class="form-group">
                <input type="text" name="city" id="add_city" class="form-control" placeholder="City" required>
              </div>
            </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		<button type="button" class="btn btn-success" id="addnew" data-dismiss="modal">submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
 
			
			
			
			
			
			
			
			
				<!-- <div>
					<form class = "form-inline">
						<div class = "form-group">
							<label>Firstname:</label>
							<input type  = "text" id = "firstname" class = "form-control">
						</div>
						<div class = "form-group">
							<label>Lastname:</label>
							<input type  = "text" id = "lastname" class = "form-control">
						</div>
						<div class = "form-group">
							<button type = "button" id="addnew" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add</button>
						</div>
					</form>
				</div> -->
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		showUser();
		//Add New
		$(document).on('click', '#addnew', function(){
			$add_name=$('#add_name').val();
			$add_email=$('#add_email').val();
			$add_mobile=$('#add_mobile').val();
			$add_address=$('#add_address').val();
			$add_city=$('#add_city').val();				
				$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						add_name: $add_name,
						add_email: $add_email,
						add_mobile: $add_mobile,
						add_address: $add_address,
						add_city: $add_city,
						add: 1,
					},
					success: function(){
						showUser();
					}
				});
			
		});
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
		//Update
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$ufirstname=$('#ufirstname'+$uid).val();
			$ulastname=$('#ulastname'+$uid).val();
				$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						firstname: $ufirstname,
						lastname: $ulastname,
						edit: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
	
	});
	
	//Showing our Table
	function showUser(){
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
</html>