<?php
session_start();

include("db/conn.php");

if($_REQUEST['doc_id'] && ( $_REQUEST['action'] == '2') ){
	$doc_id=$_REQUEST['doc_id'];
	$action=$_REQUEST['action'];
	$patient_id=$_SESSION['user_id'];

	$query2="delete from doc_ref where user_id='$patient_id' and doc_id='$doc_id'";
	mysqli_query($con,$query2) or die( header("location:error.php?error=".mysqli_error($con)."") );

	mysqli_close($con);
	header('location:userRequest.php');
}
?>
