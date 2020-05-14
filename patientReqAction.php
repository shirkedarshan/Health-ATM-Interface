<?php
session_start();
include("db/conn.php");

$patient_id=base64_decode($_REQUEST['patient_id']);
$status= $_REQUEST['action'];

if( $_SESSION["user_type"] == 'doctor' ){$doc_id= $_SESSION["doc_id"];}

echo $doc_id;
echo '<br>';
echo $patient_id;

if( $status == 1){

	$sql="update doc_ref set status = 1 where doc_id = '$doc_id' and user_id = '$patient_id'";
	$res= mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

	$date=date_create();
	$accept_date = date_format($date,"Y-m-d");

	$sql1="update doc_ref set docaccept_date = '$accept_date' where doc_id = '$doc_id' and user_id = '$patient_id'";
	$res1= mysqli_query($con,$sql1) or die( header("location:error.php?error=".mysqli_error($con)."") );

	$patient_id=base64_encode($patient_id);

	mysqli_close($con);
	header("location:patientReqDescp.php?patient_id=$patient_id");

}else if( $status == 2){
	$sql="delete from doc_ref where doc_id = '$doc_id' and user_id = '$patient_id'";
	$res=mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

	mysqli_close($con);
	header("location:patientReq.php");
}