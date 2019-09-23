<?php
	include('conn.php');
	if(isset($_POST['add_name'])){
		$uname=$_POST['add_name'];
		$email=$_POST['add_email'];
		$mobie=$_POST['add_mobile'];
		$address=$_POST['add_address'];
		$city=$_POST['add_city'];
		
		mysqli_query($conn,"insert into `student` (id, uname, email, mobile, address, city) values ('' '$uname', '$email', '$mobile', '$address', '$city')");
	}
?>