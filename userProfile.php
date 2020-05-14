<?php
session_start();
?>
<html lang="en">
<head>
<title>Profile</title>
<input type="hidden" id="nav-l" value="prof"/>

<?php

if($_SESSION["user_type"] == "patient"){
 require("userNav.php");
}elseif($_SESSION["user_type"] == "doctor"){
 require("docNav.php");
}elseif($_SESSION["user_type"] == "admin"){
 require("adminNav.php");
}else{header("location:logout.php");}
 ?>

 <script>
	$(document).ready(function(){
		$('#user_pass, #user_cpass').on('keyup', function () {
			var userpass_length = $("input#user_pass").val().length;
			if ( userpass_length > 7 && ( $('#user_pass').val() != '' ) ) {
				if ($('#user_pass').val() == $('#user_cpass').val() ) {
					$('#status').html('Proceed To Save Changes').css('color', 'green');
				$('form input[type="submit"]').prop("disabled", false);
				$("#status").removeClass("alert alert-danger");
				$("#status").addClass("alert alert-success");
				} else{
					$('#status').html('Confirm Password Not Matching').css('color', 'red');
					$('form input[type="submit"]').prop("disabled", true);
					$("#status").removeClass("alert alert-success");
					$("#status").addClass("alert alert-danger");
			}
		}else{
			$('#status').html('Enter At Least 8 Characters').css('color', 'red');
			$('form input[type="submit"]').prop("disabled", true);
			$("#status").removeClass("alert alert-success");
			$("#status").addClass("alert alert-danger");
		}
	});

		$('#edit1').on('click', function () {
			$("#edit1").addClass("collapse");
			$("#tick1").removeClass("collapse");
			$("#tick1").addClass("collapse.show");
			$("#user_name").prop("disabled", false);
			$("#username").prop("disabled", false);
			$("#user_contact").prop("disabled", false);
			$("#user_bdate").prop("disabled", false);
		});

		$('#tick1').on('click', function () {
			$("#tick1").addClass("collapse");
			$("#edit1").removeClass("collapse");
			$("#edit1").addClass("collapse.show");
			$("#user_name").prop("disabled", true);
			$("#username").prop("disabled", true);
			$("#user_contact").prop("disabled", true);
			$("#user_bdate").prop("disabled", true);

		});
	});

 </script>

<script type="text/javascript">

	function SaveProf(){
	//ajax starts
		$.ajax({
			type: "POST",  //method
			url: "userProfAjax.php", //target file
			data: { user_name: $("#user_name").val() , username: $("#username").val() , user_contact: $("#user_contact").val() , user_bdate: $("#user_bdate").val() },
			//data need to be send
			beforeSend: function() {},
			success: function(data) {
				 $('#response').html(data);
			},
			error: function() {
				alert("You have a error");
			}
		});
	}

</script>
</head>
<body>
<div class="jumbotron table-responsive">
<center><h2>User Profile</h2></center><hr>
<?php
include("db/conn.php");

	$user_id=$_SESSION['user_id'];
	$query = "select * from users where user_id='$user_id'";
	$result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

	$row=mysqli_fetch_assoc($result);
	$username=$row['username'];
	$user_name=$row['user_name'];
	$user_bdate=$row['user_bdate'];
	$user_bdate = date('Y-m-d', strtotime($user_bdate));
	$user_gender=$row['user_gender'];
	$user_contact=$row['user_contact'];
	$user_regdate=$row['user_regdate'];
	$user_regdate = date('d-M-Y', strtotime($user_regdate));

	echo '<table class="table table-borderless table-hover">
	<thead>
	<tr class="table-success">
		<th colspan="4" class="text-danger" scope="col"><center>Hey,Edit Your Profile Here. </center></th>
	</tr>
</thead>
<tbody>
	<tr class="table-success">
	<td></td>
	<td>
		<b>Name : </b><input type="text" class="form-control-sm" size="0" name="user_name" id="user_name" value="'.$user_name.'" disabled/>
	</td>
	<td>
		<b>Username : </b><input type="text" class="form-control-sm" size="0" name="username" id="username" value="'.$username.'" disabled/>
	</td>
	<td></td>
	</tr>
	<tr class="table-success">
	<td></td>
	<td>
		<b>Contact Number : </b><input type="text" class="form-control-sm" size="0" name="user_contact" id="user_contact" value="'.$user_contact.'" disabled/>
	</td>
	<td>
		<b>Gender : </b><input type="text" class="form-control-sm" size="0" name="user_gender" id="user_gender" value="'.$user_gender.'" disabled/>
	</td>
	<td></td>
	</tr>
	<tr class="table-success">
	<td></td>
	<td>
		<b>Birth Date : </b><input type="date" class="form-control-sm" size="0" name="user_bdate" id="user_bdate" value="'.$user_bdate.'" disabled/>
	</td>
	<td>
		<b>Registration Date : </b><input type="text" class="form-control-sm" size="0" name="user_regdate" id="user_regdate" value="'.$user_regdate.'" disabled/>
	</td>
	<td></td>
	</tr>';

echo'<tr class="table-success">
	<td colspan="4"><div class="d-flex justify-content-center" style="width:100%">';
	echo'<button id="edit1" class="font-weight-bold btn btn-secondary">Edit <ion-icon name="create"></ion-icon></button>
	<button id="tick1" class="font-weight-bold btn btn-success collapse" onclick=SaveProf()>Save Changes <ion-icon name="checkmark"></ion-icon></button>';

echo'</div></td></tr>';

echo'<tr class="table-success">
	<td colspan="4"><div class="d-flex justify-content-center font-weight-bold text-danger" style="width:100%">';

echo'To Change Password<a target="_blank" href="passChange.php">Click Here</a>';

echo'</div></td>
</tr>';
  
  $changes= @$_REQUEST["changes"];
	if( $changes == base64_encode('success') ){
		echo'<tr class="table-info text-success font-weight-bold"><td colspan="4"><div class="text-center" id="response">Password Changed Successfully</div></td></tr>';
	}elseif(  $changes == base64_encode('failed')  ){
		echo'<tr class="table-info font-weight-bold text-danger"><td colspan="4"><div class="text-center" id="response">Try Again</div></td></tr>';
	}

	echo'<tr class="table-info"><td colspan="4"><div class="text-center" id="response"></div></td></tr>';

	echo'</tbody></table>';
	unset($_SESSION['vercode']);

mysqli_close($con);
?>

</div>