<?php
session_start();
include("db/conn.php");

$user_name=$_REQUEST["user_name"];
$username=$_REQUEST["username"];
$user_contact=$_REQUEST["user_contact"];
$user_bdate=$_REQUEST["user_bdate"];
$user_id= $_SESSION["user_id"];

if( ($user_name!= '') && ($username!= '') && (strlen($user_contact) == 10 )){
	$query1="update users set user_name='$user_name',user_contact='$user_contact',user_bdate='$user_bdate',username='$username' where user_id='$user_id'";
	$res=mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );

	if(mysqli_query($con,$query1)){
		echo '<p class="text-success font-weight-bold">Changes Saved Successfully</p>';
	}else{
		echo'<script>alert("Username Already Exist")
		location.reload()</script>';
	}
}else{
	echo'<script>alert("User Name Can Not Be Blank & Contact Must Have 10 Numbers")
	location.reload()</script>';
}
?>