<?php
session_start();

include("db/conn.php");

$user_pass = mysqli_real_escape_string($con,$_REQUEST["user_pass"]);
$conf_pass = mysqli_real_escape_string($con,$_REQUEST["user_cpass"]);

if( $user_pass == $conf_pass ){

	$user_id=mysqli_real_escape_string($con,$_SESSION['user_id']);

	$query="update users set user_pass='$user_pass' where user_id='$user_id'";
	$result=mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );
	mysqli_close($con);
	header("location:userProfile.php?changes=".base64_encode("success"));
}else{
	mysqli_close($con);
	header("location:userProfile.php?changes=".base64_encode("failed"));
}