<?php
session_start();

	if($_POST){
	// Retrieve details from HTMl files , like this :

	include "db/conn.php";
	// to save in DB perform following steps

	$user_name=mysqli_real_escape_string($con,$_REQUEST['user_name']);
	$username=mysqli_real_escape_string($con,$_REQUEST['username']);
	$user_pass=mysqli_real_escape_string($con,$_REQUEST['user_pass']);
	$user_contact=mysqli_real_escape_string($con,$_REQUEST['user_contact']);
	$user_gender=mysqli_real_escape_string($con,$_REQUEST['user_gender']);
	$email=mysqli_real_escape_string($con,$_REQUEST['email']);
	$user_bdate=$_REQUEST['user_bdate'];
	$user_type=mysqli_real_escape_string($con,$_REQUEST['user_type']);
	$date=date_create();
	$user_regdate = date_format($date,"Y-m-d");

	if($_POST["vercode"]!=$_SESSION['vercode'])
	{
		unset($_SESSION['vercode']);
		session_destroy();
		mysqli_close($con);
		header('location: signup.php?status=cap_error');
	}
	else{
		unset($_SESSION['vercode']);
		session_destroy();

		$sql = "Insert into users ( username , user_name , user_contact , user_pass , user_gender , user_bdate , user_type , user_regdate , email ) VALUES( '$username','$user_name','$user_contact','$user_pass','$user_gender','$user_bdate','$user_type','$user_regdate','$email')";
		$result = mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );
		mysqli_close($con);
		header('location: login.php?signup_status=success');
	}
}
?>
