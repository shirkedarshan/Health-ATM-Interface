<?php
session_start();
?>

<script>
$(document).ready(function(){
  $("h5#doc_name").click(function(){
   location.href="#part_2";
 });
});
</script>
<script>
$(document).ready(function(){
  $("h5#patient_name").click(function(){
   location.href="#part_2";
 });
});
</script>

<?php
include 'db/conn.php';
$msg_date= 20-20-2020;

if( $_SESSION["user_type"] == 'patient' ){
	if( @$_REQUEST['doc_id'] ){
		unset($_SESSION['doc_chat']);
		$_SESSION['doc_chat']=$_REQUEST['doc_id'];
		$doc_id=$_REQUEST['doc_id'] ;
	}else if( @!$_REQUEST['doc_id'] ){
		$doc_id=$_SESSION['doc_chat'];
	}

	$user_id=$_SESSION['user_id'];
	$_SESSION['user_chat']=$_SESSION['user_id'];

	$query="select * from chat c inner join doctor d on c.doc_id=d.doc_id where c.doc_id='$doc_id' and c.user_id='$user_id' and d.disabled=0 order by msg_date,chat_id asc";
	$result=mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

	if( mysqli_num_rows($result)>0){
		echo'<div class="container-fluid" >';
		$showname='1';
		while($data=mysqli_fetch_assoc($result)){

		$msg_time=$data['msg_time'];

		if($showname=='1'){
			echo '<h5 class="text-center alert alert-info" id="doc_name" data-toggle="tooltip" data-placement="bottom" title="Click To Navigate Bottom">
			Dr. '.$data['doc_name'].'</h5>';
			echo'<div class="font-weight-bold"><span class="float-right">You</span>
			<span class="float-left">Doctor</span>
			</div><br>';
			$showname='2';
        }

		if( $msg_date != $data['msg_date']){
			$msg_date=$data['msg_date'];
			$display_date= date('d F Y', strtotime($msg_date));
			echo'<div><hr><center><div class="border border-secondary text-center badge badge-secondary text-wrap " style="word-break: break-word ;clear:both">'.$display_date.'</div></center></div><br>';
		}

		if($data['status']=='0'){
		echo'<div><div class="border border-secondary float-right badge badge-info text-wrap " style="width: 12rem; word-break: break-word ;clear:both" >';
		}else if($data['status']=='1'){
		echo'<div><div class="border border-secondary float-left badge badge-info text-wrap" style="width: 12rem; word-break: break-word ;clear:both">';
		}
		echo $data['msg'];
		echo'<br><div class="float-right text-dark">'.$msg_time.'</div>
		</div></div><br><br>';

	}
	echo'</div><br>';
	}else{
		$query1="select doc_name from doctor where doc_id='$doc_id' and disabled=0";
		$result1=mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$row1=mysqli_fetch_assoc($result1);

		echo '<h5 class="text-center">Dr. '.$row1['doc_name'].'</h5><hr>';
		echo'<h6 class="text-center alert alert-danger ">No Messages Present</h6><hr>';

	}
}else if( $_SESSION["user_type"] == 'doctor'){

	if( @$_REQUEST['patient_id'] ){
		unset($_SESSION['patient_chat']);
		$_SESSION['patient_chat']=$_REQUEST['patient_id'];
		$user_id=$_REQUEST['patient_id'] ;
	}else if( @!$_REQUEST['patient_id'] ){
		$user_id=$_SESSION['patient_chat'];
	}

	$doc_id=$_SESSION['doc_id'];

	$query="select * from chat c inner join users u on c.user_id=u.user_id where c.doc_id='$doc_id' and c.user_id='$user_id'";
	$result=mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

	if( mysqli_num_rows($result)>0){
		echo'<div class="container-fluid" >';
		$showname='1';
		while($data=mysqli_fetch_assoc($result)){

		$msg_time=$data['msg_time'];

		if($showname=='1'){
			echo '<h5 class="text-center alert alert-info" id="doc_name" data-toggle="tooltip" data-placement="bottom" title="Click To Navigate Bottom">
			Dr. '.$data['user_name'].'</h5>';
			echo'<div class="font-weight-bold"><span class="float-right">You</span>
			<span class="float-left">Patient</span>
			</div><br>';
			$showname='2';
		}

		if( $msg_date != $data['msg_date']){
			$msg_date=$data['msg_date'];
			$display_date= date('d F Y', strtotime($msg_date));
			echo'<div><hr><center><div class="border border-secondary text-center badge badge-secondary text-wrap " style="word-break: break-word ;clear:both">'.$display_date.'</div></center></div><br>';
		}

		if($data['status']=='1'){
			echo'<div><div class="border border-secondary float-right badge badge-info text-wrap " style="width: 12rem; word-break: break-word ;clear:both" >';
		}else if($data['status']=='0'){
			echo'<div><div class="border border-secondary float-left badge badge-info text-wrap" style="width: 12rem; word-break: break-word ;clear:both">';
		}
		echo $data['msg'];
		echo'<br><div class="float-right text-dark">'.$msg_time.'</div>
		</div></div><br><br>';
	}
	echo'</div><br>';
	}else{
		$query1="select user_name from users where user_id='$user_id' ";
		$result1=mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$row1=mysqli_fetch_assoc($result1);

		echo '<h5 class="text-center">'.$row1['user_name'].'</h5><hr>';
		echo'<h6 class="text-center alert alert-danger ">No Messages Present</h6><hr>';
	}
}

mysqli_close($con);
?>