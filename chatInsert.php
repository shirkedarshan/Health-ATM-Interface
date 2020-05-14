<?php
session_start();
// if($_REQUEST['user_id'] && $_REQUEST['user_id'])

include 'db/conn.php';
date_default_timezone_set("Asia/Kolkata");
$date=date_create();
$msg_date = date_format($date,"Y-m-d");
$time=time();
$msg_time=date("h:i a",$time);

if( $_SESSION["user_type"] == 'patient'){
	$doc_id=$_SESSION['doc_chat'];
	$user_id=$_SESSION['user_chat'];
	$msg=mysqli_real_escape_string($con,$_REQUEST['msg']);
	$status=$_SESSION['chat_status'];

	if( $msg != ''){
		$query="insert into chat ( user_id , doc_id , msg , msg_date , msg_time , status ) values( '$user_id','$doc_id','$msg','$msg_date','$msg_time','0')";
		$result=mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );
		}
	}else if( $_SESSION["user_type"] == 'doctor'){
		$doc_id=$_SESSION['doc_id'];
		$user_id=$_SESSION['patient_chat'];
		$msg=mysqli_real_escape_string($con,$_REQUEST['msg']);
		$status=$_SESSION['chat_status'];

		if( $msg != ''){
			$query="insert into chat ( user_id , doc_id , msg , msg_date , msg_time , status ) values('$user_id','$doc_id','$msg','$msg_date','$msg_time','1')";
			$result=mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );
		}
	}

mysqli_close($con);
?>