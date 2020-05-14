<?php
session_start();
include("db/conn.php");

$userInfo = $_REQUEST["userInfo"];

$sql="select * from user_med m join user_pres p on m.med_id=p.med_id join users u on u.user_id=m.user_id where m.med_id like '%$userInfo%' or p.userpres_id like '%$userInfo%' or u.user_name like '%$userInfo%' or p.doc_name like '%$userInfo%' ";
$query= mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

?>
<table class="table table-bordered table-hover">
	<thead class="thead-dark text-center">
	<tr>
		<th scope="col">Sr No.</th>
		<th scope="col">Patient Name</th>
		<th scope="col">Report Date</th>
		<th scope="col">Health Report</th>
		<th scope="col">Doctor Name</th>
		<th scope="col">Prescription Date</th>
		<th scope="col">Prescription Report</th>
	</tr>
	</thead>
	<tbody>

<?php
	if(mysqli_num_rows($query) > 0){
		$i=1;
		while( $row=mysqli_fetch_assoc($query)){
			$med_id=$row['med_id'];
			$rep_date=$row['med_repdate'];
			$rep_date = date('d F Y', strtotime($rep_date));
			$pres_date=$row['med_pres_date'];
			$pres_date = date('d F Y', strtotime($pres_date));
			$patient_id=$row['user_id'];
			$patient_name=$row['user_name'];
			$pres_id=$row['userpres_id'];
			$doc_name=$row['doc_name'];
			$doc_id=$row['doc_id'];

			echo'<tr class="table-success text-center">
			<th scope="row">'.$i.'</th>
			<td><a class="font-weight-bold text-no-decoration" href="patientReqDescp.php?patient_id='.base64_encode($patient_id).'">'.$patient_name.'</a></td>
			<td>'.$rep_date.'</td>
			<td><a target="_blank" href="userReport.php?med_id='.base64_encode($med_id).'">Health'.$med_id.'.pdf</a></td>
			<td><a class="text-decoration-none font-weight-bold" href="docDescp.php?doc_id='.base64_encode($doc_id).'">Dr. '.$doc_name.'</a></td>
			<td>'.$pres_date.'</td>
			<td><a target="_blank" href="docPresReport.php?pres_id='.base64_encode($pres_id).'">Pres'.$pres_id.'.pdf</a></td>';

			$i+=1;
	}
}
mysqli_close($con);
?>
	</tbody>
</table>
</body>
</html>
