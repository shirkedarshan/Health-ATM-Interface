<?php
session_start();
?>

<html lang="en">
<head>
<title>Doctor Details</title>
 <?php
if($_SESSION['user_type'] == 'patient'){
 echo' <input type="hidden" id="nav-l" value="connd"/>';
 require("userNav.php");
}elseif($_SESSION['user_type'] == 'admin'){
  echo'<input type="hidden" id="nav-l" value="act_doc"/>';
  require("adminNav.php");
}else{
	header("location:logout.php");
}
?>
</head>
<body>
<div class="jumbotron table-responsive">
 <center><h2>Doctor Details</h2></center><hr>
  <?php
    include("db/conn.php");
  $endoc_id=$_REQUEST['doc_id'];
  $doc_id=base64_decode($endoc_id);

  $user_id=$_SESSION['user_id'];
  $query = "select * from doctor where doc_id='$doc_id'";
  $result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

  $row=mysqli_fetch_assoc($result);

  $doc_name=$row['doc_name'];
  $doc_bdate1=$row['doc_bdate'];
  $doc_bdate = date('Y-m-d', strtotime($doc_bdate1));
  $doc_gender=$row['doc_gender'];
  $doc_spec=$row['doc_spec'];
  $doc_contact=$row['doc_contact'];
  $docDisabled=$row['disabled'];

  $date = DateTime::createFromFormat("Y-m-d", $doc_bdate);
  $str_date= date('Y')-$date->format("Y");

  $modified_at=$row['modified_at'];
  $modified_at = date('d F Y', strtotime($modified_at));

  echo'<form action="docDescpAction.php" method="POST">';
  echo '<table class="table table-borderless table-hover">
  <thead>
    <tr class="table-success">
      <th colspan="4" class="text-danger" scope="col"><center>Doctor Details As Follows</center></th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
      <td>
        <b>Doctor Name : </b><input type="input" class="form-control-sm" size="0" name="doc_name" value="Dr.'.$doc_name.'" disabled/>
      </td>
      <td>
        <b>Age : </b><input type="input" class="form-control-sm" size="0" name="doc_bdate" id="doc_bdate" value="'.$str_date.'" disabled/>
      </td>
    </tr>
    <tr class="table-success">
      <td>
        <b>Contact Number : </b><input type="input" class="form-control-sm" size="0" name="doc_contact" id="doc_contact" value="'.$doc_contact.'" disabled/>
      </td>
      <td>
        <b>Gender : </b><input type="input" class="form-control-sm" size="0" name="doc_gender" id="doc_gender" value="'.$doc_gender.'" disabled/>
      </td>
    </tr>
    <tr class="table-success">';

if( $_SESSION['user_type'] == 'patient'){
  echo'<td>
        <b>Request With A Message : </b> <textarea class="form-control" name="user_msg" rows="2"></textarea>
      </td>';
}
  echo'<td>
        <b>Doctor Specialization : '.$doc_spec.'
      </td>';
if( $_SESSION['user_type'] == 'admin'){ 

echo'<td>
	<b>Modified Date : </b> '.$modified_at.'</td>' ; }
  echo'</tr>
    <tr>
      <td class="text-center font-weight-bold " name="status" id="status" role="alert" colspan="4">';
      if(@$_REQUEST['changes']==base64_encode('success')){
        echo"<p class='text-success'>Requested Successfully</p>";
      }else if(@$_REQUEST['changes']==base64_encode('failed')){
        echo"<p class='text-danger'>Can't Request With Blank Message</p>";
      }

    if($_SESSION['user_type'] == "patient"){ $patient_id = $_SESSION["user_id"];
    $query1 = "select * from doc_ref where doc_id='$doc_id' and user_id='$patient_id'";
    $result1 = mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );}

  echo'<input type="hidden" name="doc_id" value="'.$doc_id.'"/>';
  echo'</td>
    </tr>
    <tr class="table-success">
    <td colspan="4">';
  if( ( $_SESSION['user_type'] == 'patient' ) && mysqli_num_rows($result1)>0){
		echo'<center><input type="submit" class="btn btn-danger" value="Already Requested/Connected" disabled/></center>';
	
}else if(( $_SESSION['user_type'] == 'patient' )){
		echo'<center><input type="submit" class="btn btn-info" value="Request To Connect"/></center>';
	
}else if(( $_SESSION['user_type'] == 'admin' )){

		if( $_SESSION['user_type'] == 'admin' && $docDisabled == 0){
			echo'<center><input type="submit" class="btn btn-danger" value="Disable Doctor"/></center>';
			}else{
				echo'<center><input type="submit" class="btn btn-danger" value="Already Disabled" disabled/></center>';
				
			}
}
  echo'</form>
    </td>
  </tr>
</tbody>
</table>';

mysqli_close($con);
  ?>

</div>
