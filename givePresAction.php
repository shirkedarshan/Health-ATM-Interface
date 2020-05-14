<?php
session_start();

include("db/conn.php");

$rep_id = mysqli_real_escape_string($con,$_REQUEST["rep_id"]);
$docPres = mysqli_real_escape_string($con,$_REQUEST["docPres"]);

$medicine_1 = mysqli_real_escape_string($con,$_REQUEST["medicine_1"]);
$qty_1 = mysqli_real_escape_string($con,$_REQUEST["qty_1"]);
$timing_1 = mysqli_real_escape_string($con,$_REQUEST["timing_1"]);

$medicine_2 = mysqli_real_escape_string($con,$_REQUEST["medicine_2"]);
$qty_2 = mysqli_real_escape_string($con,$_REQUEST["qty_2"]);
$timing_2 = mysqli_real_escape_string($con,$_REQUEST["timing_2"]);

$medicine_3 = mysqli_real_escape_string($con,$_REQUEST["medicine_3"]);
$qty_3 = mysqli_real_escape_string($con,$_REQUEST["qty_3"]);
$timing_3 = mysqli_real_escape_string($con,$_REQUEST["timing_3"]);

$medicine_4 = mysqli_real_escape_string($con,$_REQUEST["medicine_4"]);
$qty_4 = mysqli_real_escape_string($con,$_REQUEST["qty_4"]);
$timing_4 = mysqli_real_escape_string($con,$_REQUEST["timing_4"]);


$med_count = 0;
for ( $i=1;$i<=4;$i++){
	if ( @${"medicine_$i"} != "invalid" ){
		$med_count += 1;
	}
}


$doc_id = $_SESSION["doc_id"];
$doc_name = $_SESSION["user_name"];

$date=date_create();
$pres_date = date_format($date,"Y-m-d");

//check already prescribed by doc or not
$sql3="select * from user_pres where med_id='$rep_id' and doc_id='$doc_id'";
$re3 = mysqli_query($con,$sql3) or die( header("location:error.php?error=".mysqli_error($con)."") );
//


if( ( $docPres != '' ) && ( mysqli_num_rows($re3) == 0 ) ){
//check pres is not blank & doc not given prescription

$qr = "select user_id from user_med where med_id='$rep_id'";
$qrr=mysqli_query($con,$qr) or die( header("location:error.php?error=".mysqli_error($con)."") );

$qres=mysqli_fetch_assoc($qrr);

$patient_id=$qres['user_id'];

//check the doc has connection or not
$qr1="select * from doc_ref where user_id='$patient_id' and doc_id='$doc_id' and status=0";
$qr_r1=mysqli_query($con,$qr1) or die( header("location:error.php?error=".mysqli_error($con)."") );

$qr_accept="select * from doc_ref where user_id='$patient_id' and doc_id='$doc_id' and status=1";
$qraccept=mysqli_query($con,$qr_accept) or die( header("location:error.php?error=".mysqli_error($con)."") );

if( mysqli_num_rows($qr_r1) > 0 ){
//If doc is requested but not connected then update request
	$qr2=" update doc_ref set status = 1 , docaccept_date = '$pres_date' where user_id='$patient_id' and doc_id='$doc_id' ";
	$qr_r2=mysqli_query($con,$qr2) or die( header("location:error.php?error=".mysqli_error($con)."") );
}elseif ( mysqli_num_rows($qraccept) == 0 ){
	//If doc not requested then add connection
	$qr3="insert into doc_ref ( doc_id , user_id , user_msg , docref_date , docaccept_date , status ) values ('$doc_id','$patient_id','Doctor Aunthentication','$pres_date','$pres_date','1')";
	$qr_r3=mysqli_query($con,$qr3) or die( header("location:error.php?error=".mysqli_error($con)."") );
}


////////////////////////////////////////////////////////////////////////////////////////////

// Add  Prescription
	$sql = "insert into user_pres ( med_id , doc_id , doc_name , med_pres , med_pres_date ) values('$rep_id','$doc_id','$doc_name','$docPres','$pres_date')";
	$query = mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );


//check Prescription Added or not
    $sql1 = "select * from user_pres where doc_id='$doc_id' and med_id='$rep_id'";
    $query1= mysqli_query($con,$sql1) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$result_presId=mysqli_fetch_assoc($query1);
		$pres_id=$result_presId['userpres_id'];
//Add Medicine1
	if( $medicine_1 != "invalid" ){
	$med_a1="insert into medicine_map ( medicine_id , userpres_id , qty , timings) values('$medicine_1','$pres_id','$qty_1','$timing_1')";
	$med_add1=mysqli_query($con,$med_a1) or die( header("location:error.php?error=".mysqli_error($con)."") );
	}
//Add Medicine2
	if( $medicine_2 != "invalid" ){
		$med_a2="insert into medicine_map ( medicine_id , userpres_id , qty , timings) values('$medicine_2','$pres_id','$qty_2','$timing_2')";
		$med_add2=mysqli_query($con,$med_a2) or die( header("location:error.php?error=".mysqli_error($con)."") );
	}
	
	
//Add Medicine
	if( $medicine_3 != "invalid" ){
		$med_a3="insert into medicine_map ( medicine_id , userpres_id , qty , timings) values('$medicine_3','$pres_id','$qty_3','$timing_3')";
		$med_add3=mysqli_query($con,$med_a3) or die( header("location:error.php?error=".mysqli_error($con)."") );
	}

//Add Medicine
	if( $medicine_4 != "invalid" ){
		$med_a4="insert into medicine_map ( medicine_id , userpres_id , qty , timings) values('$medicine_4','$pres_id','$qty_4','$timing_4')";
		$med_add4=mysqli_query($con,$med_a4) or die( header("location:error.php?error=".mysqli_error($con)."") );
	}

//check medicine added or not
	$med_q="select * from medicine_map where userpres_id ='$pres_id'";
	$med_query=mysqli_query($con,$med_q) or die( header("location:error.php?error=".mysqli_error($con)."") );
	
	if( (mysqli_num_rows($query1) == 1) && ( (mysqli_num_rows($med_query) == $med_count ) ) ){
		$result=base64_encode($pres_id);
		mysqli_close($con);
		header("location:docPresReport.php?med_id=$rep_id&pres_id=$result");
	}else{
		echo "<script type='text/javascript'>alert('Error occured');</script>";
		mysqli_close($con);
		header("location:checkReport.php");
	}

}else if(( $docPres == '' )){
	$rep_id = base64_encode($_REQUEST["rep_id"]);
	echo "<script type='text/javascript'>alert('Prescription Can't Be Blank');</script>";
	mysqli_close($con);
	header("location:givePres.php?rep_id=$rep_id&error=true");
}else{
	echo "<script type='text/javascript'>alert('Already Prescription Given or Error occured');</script>";
	mysqli_close($con);
	header("location:checkReport.php");
}

?>