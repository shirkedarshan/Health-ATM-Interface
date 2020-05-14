<?php

$regMonth = $_REQUEST["regMonth"];
$username = $_REQUEST["username"];

include "db/conn.php";

$query = "select * from users where username='$username'";
$result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

$row=mysqli_fetch_assoc($result);

$user_regdate = $row['user_regdate'];
$dbRegMonth = date('Y-m', strtotime($user_regdate));
$user_id = $row['user_id'];
$_SESSION["user_id"] = $user_id;
//echo "Passed Date{$regMonth} <br/>";
//echo "DB Date {$dbRegMonth}";

mysqli_close($con);
if ( $regMonth == $dbRegMonth ){
	header("location:passReset.php");
}else{
	header("location:error.php?error=Sorry This Action Can Not Be Done,Your Details Doesn't Match.");
}


?>