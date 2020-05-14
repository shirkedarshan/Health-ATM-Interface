<?php
session_start();

include("db/conn.php");

if($_SESSION['user_type'] == 'admin'){

$date=date_create();
$modified_date = date_format($date,"Y-m-d");

$doc_id = $_REQUEST['doc_id'];

$doc_disable="update doctor set disabled = 1 , modified_at = '$modified_date' where doc_id='$doc_id' ";
$query_update=mysqli_query($con,$doc_disable) or die( header("location:error.php?error=".mysqli_error($con)."") );

mysqli_close($con);
header("location:docList.php");
}else{

  $doc_id =$_REQUEST['doc_id'];

  if($_REQUEST['user_msg'] != ''){

  $user_msg= mysqli_real_escape_string($con,$_REQUEST['user_msg']);
  $patient_id=$_SESSION['user_id'];
  $date=date_create();
  $docref_date = date_format($date,"Y-m-d");

  // echo $doc_id.'<br>'.$_SESSION['user_id'];
  $query1="select * from doc_ref where user_id='$patient_id' and doc_id='$doc_id'";
  $result1=mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );

  if(mysqli_num_rows($result1)>0){
	mysqli_close($con);
    header('location:docDescp.php?doc_id='.base64_encode($doc_id).'&changes='.base64_encode('failed'));
    // echo"alerady";
  }else{
    $query="insert into doc_ref ( doc_id , user_id , user_msg , docref_date , status ) values ('$doc_id','$patient_id','$user_msg','$docref_date','0')";
    $result=mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

	mysqli_close($con);
    header('location:docDescp.php?doc_id='.base64_encode($doc_id).'&changes='.base64_encode('success'));
  }
}else{

mysqli_close($con);
  header('location:docDescp.php?doc_id='.base64_encode($doc_id).'&changes='.base64_encode('failed'));
}
}
 ?>
