<?php
session_start();
?>
<html lang="en">
<head>
	<title>Sent Requests</title>
	<input type="hidden" id="nav-l" value="connd"/>
<?php require("userNav.php");?>
</head>
<body>
	<div class="jumbotron table-responsive ">
	<h2 class="text-center">Requested Doctors</h2><hr>
<?php
	$user_id= $_SESSION['user_id'];
	include("db/conn.php");

	$query1="select * from doc_ref r inner join doctor d on r.doc_id=d.doc_id where d.disabled=0 and r.user_id='$user_id' and r.status='0'";

	$result1=mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );


	if(mysqli_num_rows($result1)==0){
	echo'<tr>
		<td class=" font-weight-bold " scope="col">
		<center><h3 class="text-danger">No Doctor Requests From Your User ID.</h3></center></td></tr>';
	}else{
		echo'<table class="table table-bordered">
		<thead class="thead-dark"><tr>
		<th scope="col">Reference Id</th>
		<th scope="col">Doctor Name</th>
		<th scope="col">Doctor Qualification</th>
		<th scope="col">Status</th>
		<th scope="col">Remove</th>
		</tr></thead><tbody>';

		while($val1 = mysqli_fetch_assoc($result1)){
			$doc_id = $val1['doc_id'];
			$doc_name = $val1['doc_name'];
			$doc_spec = $val1['doc_spec'];
			echo'<tr class="table-success">
			<th scope="row">'.$doc_id.'</th>
			<td><b><a class="" href="docDescp.php?doc_id='.base64_encode($doc_id).'">'.$doc_name.'</a></b></td>
			<td>'.$doc_spec.'</td>
			<td>Requested</td>
			<td><a class="text-danger font-weight-bold" href="userConnAction.php?doc_id='.$doc_id.'&action=2">Delete</a></td>
			</tr>';
		}
		echo'</tbody>
	</table>';
}

mysqli_close($con);
?>