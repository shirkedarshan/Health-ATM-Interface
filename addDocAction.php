<?php
/*
if ( $_SESSION['user_type'] != 'admin'){
	header("location:logout.php");
}
*/
include("db/conn.php");

$username=mysqli_real_escape_string($con,$_REQUEST['username']);
$name=mysqli_real_escape_string($con,$_REQUEST['name']);
$b_date=mysqli_real_escape_string($con,$_REQUEST['b_date']);
$gender=mysqli_real_escape_string($con,$_REQUEST['gender']);
$contact=mysqli_real_escape_string($con,$_REQUEST['contact']);
$specs=mysqli_real_escape_string($con,$_REQUEST['specs']);

$b_date = date("Y-m-d", strtotime($b_date));

$date=date_create();
$user_regdate = date_format($date,"Y-m-d");
$user_type="doctor";
//
// echo $username;
// echo $name;
// echo $b_date;
// echo $gender;
// echo $contact;
// echo $specs;

$sql="insert into users ( username , user_name , user_contact , user_pass , user_gender , user_bdate , user_type , user_regdate ) values('$username','$name','$contact','healthatm','$gender','$b_date','$user_type','$user_regdate')";
$query = mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

$sql1="select user_id from users where username='$username'";
$query1 = mysqli_query($con,$sql1) or die( header("location:error.php?error=".mysqli_error($con)."") );

$res=mysqli_fetch_assoc($query1);
$docUserId=$res['user_id'];

if( mysqli_num_rows($query1) > 0 ){
	$sql2="insert into doctor ( user_id , doc_name , doc_gender , doc_spec , doc_bdate , doc_contact , modified_at ) values( '$docUserId','$name','$gender','$specs','$b_date','$contact','$user_regdate')";
	$query2 = mysqli_query($con,$sql2) or die( header("location:error.php?error=".mysqli_error($con)."") );

	$sql3="select doc_id from doctor where user_id='$docUserId'";
	$query3 = mysqli_query($con,$sql3) or die( header("location:error.php?error=".mysqli_error($con)."") );

	$res1=mysqli_fetch_assoc($query3);
	$doc_id=$res1['doc_id'];
	$doc_id=base64_encode($doc_id);

	mysqli_close($con);
	header("location:docDescp.php?doc_id=$doc_id");

}else{
	echo'<script>alert("Your Action Failed Try Again");</script>';
	mysqli_close($con);
	header("location:addDoc.php");
}
 ?>
