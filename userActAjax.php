<?php
session_start();
include("db/conn.php");

$userInfo = $_REQUEST["userInfo"];
?>
<table class="table table-bordered table-hover">
	<thead class="thead-dark text-center">
	<tr>
		<th scope="col">Sr.No</th>
		<th scope="col">Username</th>
		<th scope="col">Full Name</th>
		<th scope="col">Contact No</th>
		<th scope="col">Registration Date</th>
		<th scope="col">User_Type</th>
		<th scope="col">View Profile</th>
		<!-- <th scope="col">Reset Password</th> -->
	</tr>
	</thead>
	<tbody>

<?php
	$sql="select * from users where user_name like '%$userInfo%' or username like '%$userInfo%' or user_contact like '%$userInfo%' or user_type like '%$userInfo%'";
	$query= mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

	if(mysqli_num_rows($query) > 0){
		$i=1;
		while( $row=mysqli_fetch_assoc($query)){
			$user_id=$row['user_id'];
			$reg_date=$row['user_regdate'];
			$reg_date = date('d F Y', strtotime($reg_date));
			$patient_id=$row['user_id'];
			$user_name=$row['user_name'];
			$username=$row['username'];
			$user_type=$row['user_type'];
			$contact=$row['user_contact'];

	if( $user_type != 'admin' ){
		echo'<tr class="table-success text-center">
			<th scope="row">'.$i.'</th>
			<td>'.$username.'</td>
			<td>'.$user_name.'</td>
			<td>'.$contact.'</td>
			<td>'.$reg_date.'</td>
			<td>'.ucfirst($user_type).'</td>';

	if( $user_type == 'patient'){
		echo'<td><a class="font-weight-bold text-no-decoration" href="patientReqDescp.php?patient_id='.base64_encode($user_id).'">View Profile</a></td>';
	}else if( $user_type == 'doctor' ){

	$docsql="select doc_id from doctor where user_id='$user_id'";
	$docquery=mysqli_query($con,$docsql) or die( header("location:error.php?error=".mysqli_error($con)."") );

	$res=mysqli_fetch_assoc($docquery);
	$doc_id=$res['doc_id'];
	echo'<td><a class="text-decoration-none font-weight-bold" href="docDescp.php?doc_id='.base64_encode($doc_id).'">View Profile</a></td>';
	}
		$i+=1;
	echo'</tr>';
	}
	}
}

mysqli_close($con);
?>
	</tbody>
</table>
</body>
</html>