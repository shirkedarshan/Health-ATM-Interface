<?php
session_start();

include("db/conn.php");

if( $_SESSION["user_type"] != "admin"){

	$fb1=$_REQUEST['feedback'];
	$fb=mysqli_real_escape_string($con,$fb1);

	$date=date_create();
	$fb_date = date_format($date,"Y-m-d");

	$query1="select * from feedback where fb_descp='$fb'";
	$res=mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );

	if(mysqli_num_rows($res)<1 && ( $fb != '') ){
		$user_id=$_SESSION['user_id'];
		$query="insert into feedback ( user_id , fb_descp , fb_date ) values ('$user_id','$fb','$fb_date')";
		mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

		echo '<br><div class="alert text-center alert-primary " role="alert">Thank You For Your Feedback</div>';
	}else{
		echo '<br><div class="alert text-center alert-primary " role="alert">Already Feedback Recorded</div>';
	}

		mysqli_close($con);

	}else if( $_SESSION["user_type"] == "admin"){
	$fb_id = base64_decode($_REQUEST['fb_id']);

	$admimSql="delete from feedback where fb_id='$fb_id'";
	$adminQuery = mysqli_query($con,$admimSql) or die( header("location:error.php?error=".mysqli_error($con)."") );

	mysqli_close($con);
	header("location:feedbackHistory.php");
}
?>