<?php
session_start();
?>
<html lang="en">
<head>
<title>Check Reports</title>

<input type="hidden" id="nav-l" value="checkr"/>
 <?php require("docNav.php");   include("db/conn.php"); ?>

</head>
<body>
<div class="jumbotron table-responsive">
  <h2 class="text-center">Check Patient Reports</h2><hr>
<?php

	$doc_id= $_SESSION['doc_id'];
	$totalPresCount=2;
	$sql1="select * from user_med order by total_pres,med_repdate asc";
	$res1 = mysqli_query($con,$sql1) or die( header("location:error.php?error=".mysqli_error($con)."") );

	if(mysqli_num_rows($res1)==0){
		echo'<tr>
		<td class=" font-weight-bold" scope="col">
		<center><b>No Patient Exist For Given Information.</b></center></td>
		</tr>';
	}else{
		echo'<table class="table">
		<thead class="thead-dark">
		<tr class="text-center">
		<th scope="col">Report Id</th>
		<th scope="col">Patient Id</th>
		<th scope="col">Patient Name</th>
		<th scope="col">Report</th>
		<th scope="col">Report Date</th>
		<th scope="col">Total Prescriptions</th>
		<th scope="col">Give Prescription</th>';
		echo'</tr>
		</thead>
		<tbody>';

	while($val = mysqli_fetch_assoc($res1)){
			$patient_id = $val['user_id'];
			$rep_id = $val['med_id'];
			$rep_date = $val['med_repdate'];
			$rep_date = date('d M Y', strtotime($rep_date));

			$sql="select * from users where user_id='$patient_id'";
			$re = mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );
			$op = mysqli_fetch_assoc($re);

			$sql2="select count(*) as ct from user_pres where med_id='$rep_id'";
			$re2 = mysqli_query($con,$sql2) or die( header("location:error.php?error=".mysqli_error($con)."") );
			$op2 = mysqli_fetch_assoc($re2);

			$sql3="select * from user_pres where med_id='$rep_id' and doc_id='$doc_id'";
			$re3 = mysqli_query($con,$sql3) or die( header("location:error.php?error=".mysqli_error($con)."") );

			$patient_name= $op['user_name'];
			echo'
			<tr class="text-center table-success">
			<th  scope="row">'.$rep_id.'</th>
			<td>'.$patient_id.'</td>
			<td><a class="text-decoration-none font-weight-bold" href="patientReqDescp.php?patient_id='.base64_encode($patient_id).'">'.$patient_name.'</a></td>
			<td><a class="text-secondary font-weight-bold" target="_blank" href="userReport.php?med_id='.base64_encode($rep_id).'">Report'.$rep_id.'.pdf</a></td>
			<td>'.$rep_date.'</td>
			<td>'.$op2['ct'].'</td>';

		if(mysqli_num_rows($re3) > 0 ){
			echo '<td class="text-info font-weight-bold"> Already Given </td>';
		}elseif( $op2['ct'] < $totalPresCount){
			echo '<td><a class="text-success text-decoration-none font-weight-bold" href="givePres.php?rep_id='.base64_encode($rep_id).'">Yes</a></td>';
		}else{
			echo '<td class="text-info font-weight-bold"> Not Available </td>';
		}
		
		echo '</tr>';
	}
	echo'</tbody>
	</table>';
}

mysqli_close($con);
?>

</div>
