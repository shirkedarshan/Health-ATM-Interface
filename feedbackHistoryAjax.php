<?php
session_start();
echo'<html>';

$userInfo = $_REQUEST['user_id'];
	include("db/conn.php");

	$s="select * from feedback f inner join users u on f.user_id = u.user_id where u.user_id like '%$userInfo%' or u.user_type like '%$userInfo%' or u.user_name like '%$userInfo%' or f.fb_descp like '%$userInfo%' or f.fb_date like '%$userInfo%'";
	$re = mysqli_query($con,$s) or die( header("location:error.php?error=".mysqli_error($con)."") );
	if(mysqli_num_rows($re)==0){
		echo'<tr>
		<td class=" font-weight-bold" scope="col">
		<center><b>No Feedback Exist For Given Information.</b></center></td>
		</tr>';
	}else{
		echo'<table class="table text-center">
		<thead class="thead-dark">
		<tr>
		<th scope="col">User Id</th>
		<th scope="col">User Name</th>
		<th scope="col">Feedback Date</th>
		<th scope="col">User Type</th>
		<th scope="col">User Feedback</th>
		</tr>
		</thead>
		<tbody>';

		while($val = mysqli_fetch_assoc($re)){
			$fb_id = $val['fb_id'];
			$user_id = $val['user_id'];
			$user_name = ucfirst($val['user_name']);
			$feedback = mysqli_real_escape_string($con,$val['fb_descp']);
			$fb_date= $val['fb_date'];
			$fb_date = date('d-F-Y', strtotime($fb_date));
			$user_type= $val['user_type'];

			echo'
				<tr class="table-success">
				<th scope="row">'.$user_id.'<hr><a class="text-decoration-none font-weight-bold" href="feedbackAction.php?fb_id='.base64_encode($fb_id).'">Delete</a></th>
				<td>'.$user_name.'</td>
				<td>'.$fb_date.'</td>
				<td>'.ucfirst($user_type).'</td>
				<td>'.$feedback.'</td>';
}
		echo'</tbody>
		</table>';
}

mysqli_close($con);
?>
