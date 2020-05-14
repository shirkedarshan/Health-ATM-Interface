<?php
session_start();
?>
<html lang="en">
<head>
<title>Given Prescriptions</title>
<input type="hidden" id="nav-l" value="presg"/>
<?php require("docNav.php");   include("db/conn.php"); ?>

</head>
<body>
<div class="jumbotron table-responsive">
	<h2 class="text-center">Check Prescriptions Given By You</h2><hr>
<?php

	$doc_id= $_SESSION['doc_id'];
	$totalPresCount=2;

	$sql1="select * from user_pres p inner join user_med m on p.med_id=m.med_id where doc_id='$doc_id' order by med_pres_date asc";
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
		<th scope="col">Prescription Date</th>
		<th scope="col">Prescription Report</th>';
		echo'</tr>
		</thead>
		<tbody>';

	while($val = mysqli_fetch_assoc($res1)){
		$patient_id = $val['user_id'];
		$med_id = $val['med_id'];
		$pres_id = $val['userpres_id'];
		$rep_date = $val['med_pres_date'];
		$rep_date = date('d M Y', strtotime($rep_date));

		$sql="select * from users where user_id='$patient_id'";
		$re = mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );
		$op = mysqli_fetch_assoc($re);

		$sql2="select count(*) as ct from user_pres where med_id='$med_id'";
		$re2 = mysqli_query($con,$sql2) or die( header("location:error.php?error=".mysqli_error($con)."") );
		$op2 = mysqli_fetch_assoc($re2);

		$sql3="select * from user_pres where med_id='$med_id' and doc_id='$doc_id'";
		$re3 = mysqli_query($con,$sql3) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$patient_name= $op['user_name'];
		echo'
		<tr class="text-center table-success">
		<th  scope="row">'.$med_id.'</th>
		<td>'.$patient_id.'</td>
		<td><a class="text-decoration-none font-weight-bold" href="patientReqDescp.php?patient_id='.base64_encode($patient_id).'">'.$patient_name.'</a></td>
		<td><a class="text-secondary font-weight-bold" target="_blank" href="userReport.php?med_id='.base64_encode($med_id).'">Report'.$med_id.'.pdf</a></td>
		<td>'.$rep_date.'</td>';


		echo '<td><a class="text-success text-decoration-none font-weight-bold" target="_blank" href="docPresReport.php?pres_id='.base64_encode($pres_id).'">Report.pdf</a></td>';
		echo '</tr>';
	}
	echo'</tbody>
	</table>';
}

mysqli_close($con);
?>
</div>