<?php
session_start();
?>
<html lang="en">
<head>
<title>Report History</title>

<?php
if( $_SESSION["user_type"] == 'patient' ){
	echo'<input type="hidden" id="nav-l" value="userhis"/>';
	require("userNav.php");
}else if( $_SESSION["user_type"] == 'doctor' ){
	echo'<input type="hidden" id="nav-l" value="req"/>';
	require("docNav.php");
}elseif( $_SESSION["user_type"] == 'admin' ){
	echo'<input type="hidden" id="nav-l" value="checkact"/>';
	require("adminNav.php");
}else{header("location:logout.php");}
?>
</head>
<body>
  <!-- ************************************************************************ -->
<div class="jumbotron table-responsive">
	<center><h2>Medical Report History</h2></center><hr><br>
	<table class="table table-bordered table-hover">
	<thead class="thead-dark text-center">
		<tr>
		<th scope="col">Sr No.</th>
		<th scope="col">Report ID</th>
		<th scope="col">Report Date</th>
		<th scope="col">Patient Age</th>
		<th scope="col">Report</th>
		<th scope="col">Total Prescriptions</th>
		<th scope="col">View Prescriptions</th>
		</tr>
	</thead>
<tbody>

<?php
	include("db/conn.php");

	if( $_SESSION["user_type"] == 'patient'){
		$user_id=$_SESSION['user_id'];
	}else{
		$user_id= base64_decode($_REQUEST['patient_id']);
	}

$query = "select * from user_med where user_id='$user_id' order by med_repdate desc";
$result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

$i=1;

while($row=mysqli_fetch_assoc($result) and ( $i <= 3 ) ){
	$med_id=$row['med_id'];
	$rep_date=$row['med_repdate'];
	$rep_date = date('d F Y', strtotime($rep_date));
	$age=$row['med_age'];

	echo'<tr class="table-success text-center">
		<th scope="row">'.$i.'</th>
		<td>'.$med_id.'</td>
		<td>'.$rep_date.'</td>';
	echo'<td></center>'.$age.'yrs</center></td>
		<td><a target="_blank" href="userReport.php?med_id='.base64_encode($med_id).'">Report'.$i.'.pdf</a></td>';

		$sql="select * from user_pres where med_id = '$med_id'";
		$res= mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$pres_count=mysqli_num_rows($res);

	if( $pres_count > 0 ){
		echo'<td>'.$pres_count.'</td>';
		echo '<td><a href="docPres.php?med_id='.$med_id.'">View</a></td></tr>';
	}else if( $pres_count == 0 ){
		echo'<td><ion-icon name="close"></ion-icon></td>';
		echo'<td><ion-icon name="close"></ion-icon></td></tr>';
	}

	$i+=1;
}

mysqli_close($con);
?>
	</tbody>
</table>
</div>

</body>
</html>
