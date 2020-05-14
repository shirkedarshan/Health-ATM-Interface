<?php 
session_start();
include("db/conn.php");
if(isset($_GET['key']) && isset($_GET['email'])) {
    $key=base64_decode($_GET['key']);
    $email=base64_decode($_GET['email']);
    $check=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and temp_key='$key'");

	$data = mysqli_fetch_assoc($check);
    //if key doesnt matches
    if (mysqli_num_rows($check)!=1) {
	mysqli_close($con);
      header("location:error.php?error=Sorry,This URL Is Invalid or Already Used.");
    }elseif( mysqli_num_rows($check) == 1 ){
		$_SESSION['user_id']=$data['user_id'];
		mysqli_close($con);
		header("location:passReset.php");
	}
}
else{
  header("location:error.php?error=Sorry This Action Can Not Be Done,Your Details Doesn't Match.");
}