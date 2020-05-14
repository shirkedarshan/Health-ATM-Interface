<?php
session_start();

if ( $_SESSION["user_type"] == "admin"){
include("db/conn.php");

	$medicine_id = base64_decode($_REQUEST['medicine_id']);

	$Sql="delete from master_medicine where medicine_id='$medicine_id'";
	$Query = mysqli_query($con,$Sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

	mysqli_close($con);
	header("location:medicineList.php");
}else{
	header("location:logout.php");
}