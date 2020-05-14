<?php
session_start();

include("db/conn.php");

if($_SESSION['user_type']=='admin'){

$doc_id = base64_decode(mysqli_real_escape_string($con,$_REQUEST["doc_id"]));
	
$date=date_create();
$modified_date = date_format($date,"Y-m-d");
	
$query="update doctor set disabled = 0 , modified_at = '$modified_date' where doc_id='$doc_id' ";
$result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

mysqli_close($con);
header("location:docDescp.php?doc_id=".base64_encode($doc_id));
}else{
	mysqli_close($con);
	header("location:logout.php");
}

/*

$doc_disable="update doctor set disabled = 0 , modified_at = '$modified_date' where doc_id='$doc_id' ";


*/