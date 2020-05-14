<?php
session_start();

include("db/conn.php");

$rbc=$_REQUEST['rbc'];
$wbc=$_REQUEST['wbc'];
$hct=$_REQUEST['hct'];
$plt=$_REQUEST['plt'];
$hmg=$_REQUEST['hmg'];
$tmp=$_REQUEST['tmp'];
$bp=$_REQUEST['bp'];
$pulse=$_REQUEST['pulse'];
$user_ht=$_REQUEST['user_ht'];
$user_wt=$_REQUEST['user_wt'];
$med_fat=$_REQUEST['med_fat'];
$age=$_REQUEST['age'];
$user_bmi=$_REQUEST['user_bmi'];


$user_id = $_SESSION["user_id"];
$user_gender = $_SESSION["user_gender"];

$date=date_create();
$med_date = date_format($date,"Y-m-d");

// echo $med_date;

$sql="Insert into user_med ( med_repdate , total_pres , user_id , user_gender , med_age , med_wt , med_ht , med_bmi , med_fat , med_bp , med_hmg , med_pulse , med_temp , med_rbc , med_hct , med_wbc , med_plt ) values('$med_date','0','$user_id','$user_gender','$age','$user_wt','$user_ht','$user_bmi','$med_fat','$bp','$hmg','$pulse','$tmp','$rbc','$hct','$wbc','$plt')";
$query= mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );


$sql1="select * from user_med where user_id='$user_id'";
$query1= mysqli_query($con,$sql1) or die( header("location:error.php?error=".mysqli_error($con)."") );

if( mysqli_num_rows($query1) > 3 ){
	$count = mysqli_num_rows($query1);
	$count = $count - 3;
	for($i=1;$i<=$count;$i+=1){

		$sql2="select * from user_med where user_id='$user_id' order by med_repdate,med_id asc LIMIT 1";
		$query2= mysqli_query($con,$sql2) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$result = mysqli_fetch_assoc($query2);

		$med_id = $result['med_id'];

		$sql3="delete from user_med where med_id='$med_id'";
		$query3= mysqli_query($con,$sql3) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$sql4="delete from user_pres where med_id='$med_id'";
		$query4= mysqli_query($con,$sql4) or die( header("location:error.php?error=".mysqli_error($con)."") );
	}
}

mysqli_close($con);
header("location:userHistory.php");