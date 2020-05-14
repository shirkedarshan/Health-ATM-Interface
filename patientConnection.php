<?php
session_start();
?>
<head>
<title>Patients Connected</title>
  <input type="hidden" id="nav-l" value="req"/>
  <?php
    require("docNav.php");
  ?>
</head>
<div class="jumbotron">
  <h2 class="text-center">Connected Patients.</h2><hr>
<?php
$doc_id= $_SESSION['doc_id'];

include("db/conn.php");

	$s="select * from doc_ref d inner join users u on d.user_id = u.user_id where d.doc_id='$doc_id' and d.status=1";
	$re = mysqli_query($con,$s) or die( header("location:error.php?error=".mysqli_error($con)."") );


	if(mysqli_num_rows($re)==0){
		echo'<tr>
		<td class=" font-weight-bold" scope="col">
		<center><b>No Patient Exist For Given Information.</b></center></td>
		</tr>';
	}else{
		echo'<table class="table">
		<thead class="thead-dark">
		<tr>
		<th scope="col">Patient Id</th>
		<th scope="col">Patient Name</th>
		<th scope="col">Request Message</th>
		<th class="text-center" scope="col">Approve</th>
		<th class="text-center" scope="col">Reject</th>';
		echo'</tr></thead><tbody>';

		while($val = mysqli_fetch_assoc($re)){
			$patient_id = $val['user_id'];
			$patient_name = $val['user_name'];
			$req_msg = $val['user_msg'];
			$req_status = $val['status'];

		echo'
		<tr class="table-success">
		<th scope="row">'.$patient_id.'</th>
		<td><a class="text-decoration-none font-weight-bold" href="patientReqDescp.php?patient_id='.base64_encode($patient_id).'">Dr. '.$patient_name.'</a></td>
		<td>'.$req_msg.'</td>';

		if( $req_status == 0 ){
			echo'<td class="font-weight-bold text-center"><a class="text-success " href="patientReqAction.php?patient_id='.base64_encode($patient_id).'&action=1">Approve</a></td>';
			echo'<td class="font-weight-bold text-center"><a class=" text-danger " href="patientReqAction.php?patient_id='.base64_encode($patient_id).'&action=2">Reject</a></td>';
		}else if( $req_status == 1){
			echo '<td class="font-weight-bold text-center text-success">Connected</td>';
			echo'<td class="font-weight-bold text-center"><a class=" text-danger " href="patientReqAction.php?patient_id='.base64_encode($patient_id).'&action=2">Remove</a></td>';
		}

	echo '</tr>';
	}
echo'</tbody>
</table>';
}
?>
