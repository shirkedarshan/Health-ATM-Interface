<?php
session_start();

if($_SESSION['user_type'] == 'patient' ){ $user_id= $_SESSION['user_id']; }
$doc_id= $_REQUEST['doc_id'];
	include("db/conn.php");

if( $_SESSION['user_type'] == 'patient' ){

	$s="select * from doctor where ( doc_id like '%$doc_id%' or doc_name like '%$doc_id%' or doc_spec like '%$doc_id%' ) and disabled=0 ";
	$re = mysqli_query($con,$s) or die( header("location:error.php?error=".mysqli_error($con)."") );

}elseif( $_SESSION['user_type'] == 'admin' ){
	$s="select * from doctor where ( doc_id like '%$doc_id%' or doc_name like '%$doc_id%' or doc_spec like '%$doc_id%' ) ";
	$re = mysqli_query($con,$s) or die( header("location:error.php?error=".mysqli_error($con)."") );

}

	if(mysqli_num_rows($re)==0){
		echo'<tr>
		<td class=" font-weight-bold" scope="col">
		<center><b>No Doctor Exist For Given Reference Id.</b></center></td>
		</tr>';
	}else{
		echo'<table class="table">
		<thead class="thead-dark">
		<tr>
		<th scope="col">Doctor Id</th>
		<th scope="col">Doctor Name</th>
		<th scope="col">Doctor Qualification</th>
		<th scope="col">Request</th>';
		if($_SESSION['user_type'] == 'admin' ){
			echo'<th scope="col">Delete</th>';
		}
		echo'</tr></thead><tbody>';

		while($val = mysqli_fetch_assoc($re)){
			$doc_id = $val['doc_id'];
			$doc_name = $val['doc_name'];
			$doc_spec = $val['doc_spec'];
			$docDisabled = $val['disabled'];

		echo'
		<tr class="table-success">
		<th scope="row">'.$doc_id.'</th>
		<td><a class="text-decoration-none font-weight-bold" href="docDescp.php?doc_id='.base64_encode($doc_id).'">Dr. '.$doc_name.'</a></td>
		<td>'.$doc_spec.'</td>';

if( $_SESSION['user_type'] == 'patient' ){
	
	// check request sent
	$query1="select * from doc_ref where user_id='$user_id' and doc_id='$doc_id' and status='0'";
	$result1=mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );

	// check accepted requests
	$query2="select * from doc_ref where user_id='$user_id' and doc_id='$doc_id' and status='1'";
	$result2=mysqli_query($con,$query2) or die( header("location:error.php?error=".mysqli_error($con)."") );
}
	if( ( $_SESSION['user_type'] == 'patient' ) && (mysqli_num_rows($result1) > 0)){
		echo'<td><a class="text-danger font-weight-bold" href="userConnAction.php?doc_id='.$doc_id.'&action=2">Delete Request</a></td>
		</tr>';
	}else if( ( $_SESSION['user_type'] == 'patient' ) && ( mysqli_num_rows($result2) > 0 ) ){
		echo'<td class="text-success font-weight-bold">Connected</td></tr>';
	}else{
		echo'<td class="font-weight-bold"><a href="docDescp.php?doc_id='.base64_encode($doc_id).'">View Profile</a></td>';
		if( $_SESSION['user_type'] == 'admin' && $docDisabled == 0){
			echo'<td class="font-weight-bold"><a href="docDescpAction.php?doc_id='.$doc_id.'">Disable</a></td></tr>';
		}elseif( $_SESSION['user_type'] == 'admin'){
			echo'<td class="font-weight-bold text-danger">Disabled</td></tr>';
		}
	
	}
}
	echo'</tbody>
</table>';

mysqli_close($con);
}
?>
