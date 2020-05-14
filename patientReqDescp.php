<?php session_start(); ?>
<head>
<title>Patient Info</title>
<?php
	if($_SESSION['user_type'] == 'admin'){
		echo'<input type="hidden" id="nav-l" value="checkact"/>';
		require("adminNav.php");
	}elseif($_SESSION['user_type'] == 'doctor'){
		echo'<input type="hidden" id="nav-l" value="req"/>';
		require("docNav.php");
	}else{
		header("location:logout.php");
}

?>
</head>
<body>
<div class="jumbotron table-responsive">
	<center><h2>Patient Profile</h2></center><hr>
	<?php
	include("db/conn.php");

	$patient_id=base64_decode($_REQUEST['patient_id']);

	$query="select * from users where user_id='$patient_id' ";
	$result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

	$row=mysqli_fetch_assoc($result);
	$username=$row['username'];
	$user_name=$row['user_name'];
	$user_bdate=$row['user_bdate'];
	$user_bdate = date('d-m-Y', strtotime($user_bdate));
	$user_gender=$row['user_gender'];
	$user_contact=$row['user_contact'];
	$user_regdate=$row['user_regdate'];
	$user_regdate = date('d-m-Y', strtotime($user_regdate));

	if($_SESSION['user_type'] == 'doctor'){

		$doc_id=$_SESSION['doc_id'];
		$query1="select * from doc_ref where doc_id='$doc_id' and user_id='$patient_id' ";
		$result1 = mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$row1=mysqli_fetch_assoc($result1);

		$req_msg = $row1['user_msg'];
		$req_status= $row1['status'];
}
	echo'<form action="#" method="POST">';
	echo '<table class="table table-borderless table-hover">
	<thead>
	<tr class="table-success">
	<th colspan="4" class="text-danger" scope="col"><center>Hey,Check Patient Request Message</center></th>
	</tr>
	</thead>
	<tbody>
	<tr class="table-success">
	<td></td>
		<td>
	<b>Name : </b><input type="input" class="form-control-sm" size="0" name="user_name" id="user_name" value="'.$user_name.'" disabled/>
	</td>
	<td>
		<b>Username : </b><input type="input" class="form-control-sm" size="0" name="username" id="username" value="'.$username.'" disabled/>
	</td>
	<td></td>
	</tr>
	<tr class="table-success">
	<td></td>
	<td>
		<b>Contact Number : </b><input type="input" class="form-control-sm" size="0" name="user_contact" id="user_contact" value="'.$user_contact.'" disabled/>
	</td>
	<td>
		<b>Gender : </b><input type="input" class="form-control-sm" size="0" name="user_gender" id="user_gender" value="'.$user_gender.'" disabled/>
	</td>
	<td></td>
	</tr>
	<tr class="table-success">
	<td></td>
	<td>
		<b>Birth Date : </b><input type="input" class="form-control-sm" size="0" name="user_bdate" id="user_bdate" value="'.$user_bdate.'" disabled/>
	</td>
	<td>
		<b>Registration Date : </b><input type="input" class="form-control-sm" size="0" name="user_regdate" id="user_regdate" value="'.$user_regdate.'" disabled/>
	</td>
	<td></td>
	</tr>';

if( ( $_SESSION['user_type'] == 'doctor') && ( mysqli_num_rows($result1) > 0 )){
	echo'<tr class="table-success">
	<td></td>
	<td>
		<b>Request Message : </b>
		<textarea class="form-control" rows="2" disabled>'.$req_msg.'</textarea>
	</td>
	<td>
		<b>View Report Histroy :
		<a class="text-info" href="userHistory.php?patient_id='.base64_encode($patient_id).'">Click Here</a>
		</b>
	</td>
	<td></td>
	</tr>';
}

if( $_SESSION['user_type'] == 'admin' ){
	echo'<tr class="table-success">
	<td></td>
	<td colspan="2">
	<b>View Report Histroy :
	<a class="text-info" href="userHistory.php?patient_id='.base64_encode($patient_id).'">Click Here</a>
	</b>
	</td>
	<td></td>
	</tr>';
}

echo'<tr class="table-success">';
	if( ( $_SESSION['user_type'] == 'doctor') && ( $req_status == '0' ) ){
		echo"<td></td>";
		echo'<td class="font-weight-bold text-center"><a class="text-success " href="patientReqAction.php?patient_id='.base64_encode($patient_id).'&action=1">Approve Request</a></td>';
		echo'<td class="font-weight-bold text-center"><a class=" text-danger " href="patientReqAction.php?patient_id='.base64_encode($patient_id).'&action=2">Reject Request</a></td>';
		echo"<td></td>";
	}else if( ( $_SESSION['user_type'] == 'doctor') && ( $req_status == '1' ) ){
		echo"<td></td>";
		echo'<td colspan="2" class="font-weight-bold text-center">
		<a class="text-danger font-weight-bold" href="patientReqAction.php?patient_id='.base64_encode($patient_id).'&action=2">Remove Connection</a>
		</td>';
		echo"<td></td>";
	}
echo'</tr>';

echo'</tbody> </table>';

mysqli_close($con);
?>

</div>
