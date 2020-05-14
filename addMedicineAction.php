<?php

include("db/conn.php");

$medicine = mysqli_real_escape_string($con,$_REQUEST["medicine"]);
$uses = mysqli_real_escape_string($con,$_REQUEST["uses"]);

$query="insert into master_medicine ( medicine_name , medicine_descp ) values ('$medicine','$uses')";
$result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

if( $result ){
mysqli_close($con);
	header("location:medicineList.php");
}else{
mysqli_close($con);
	header("location:medicineList.php?error=Error Occured Try Again");
}