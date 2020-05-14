<?php
session_start();
?>
<head>
<title>Give Prescription</title>
   <input type="hidden" id="nav-l" value="checkr"/>
  <?php
  require("docNav.php");
  include("db/conn.php");?>
</head>

<?php
$rep_id = base64_decode($_REQUEST["rep_id"]);
// echo $rep_id;
?>
<div class="jumbotron table-responsive">
 <center><h2>Give Prescription</h2></center><hr>

<?php

  $doc_id= $_SESSION['doc_id'];
  $query="select * from user_med m inner join users u on m.user_id = u.user_id where m.med_id='$rep_id'";

  $result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

  $row=mysqli_fetch_assoc($result);

  $patient_id=$row['user_id'];
  $username=$row['username'];
  $user_name=$row['user_name'];
  $contact=$row['user_contact'];

	echo'<form action="givePresAction.php" method="POST">';
	echo '<table class="table table-borderless table-hover">
	<thead>
	<tr class="table-success">
	<th colspan="4" class="text-danger" scope="col"><center>Hey,Give Prescription Now</center></th>
	</tr>
	</thead>
	<tbody>
	<tr class="table-success">
	<td></td>
	<td>
		<b>Name : </b><input type="input" class="form-control-sm" size="0" name="user_name" id="user_name" value="'.$user_name.'" disabled/>
	</td>
	<td>
		<b>Username : </b><input type="input" class="form-control-sm" size="0" name="username" id="username" value="'.$username.'" disabled/>
	</td>
	<td></td>
	</tr>
	<tr class="table-success">
	<td></td>
	<td>
		<b>Contact Number : </b><input type="input" class="form-control-sm" size="0" name="user_contact" id="user_contact" value="'.$contact.'" disabled/>
	</td>
	<td>
		<b>View Report : <a class="" target="_blank" href="userReport.php?med_id='.base64_encode($rep_id).'">Report'.$rep_id.'.pdf</a></b>
	</td>
	<td></td>
	</tr>
	<tr class="table-success">
	<td></td>
	<td colspan="2">
		<b>Write Prescription Here : </b>
		<textarea class="form-control" rows="2" name="docPres"></textarea>
	</td>
	<td></td>
	</tr>';
	echo'<tr class="table-success">
	<td></td><th colspan="2" class="text-primary" >Select Medicines Here : </th>
	<td></td></tr>';
	
	$query_pres="select * from master_medicine";

	$result_pres = mysqli_query($con,$query_pres) or die( header("location:error.php?error=".mysqli_error($con)."") );
	
	//$pres_num=mysqli_num_rows($result_pres);
	
	
	echo'<tr class="table-success"><td></td>';
	echo'<td>
	<div class="form-group">
	<h5>Medicine 1</h5>
	<select class="custom-select" name="medicine_1" required>
	<option value="invalid">Select Medicine Here</option>';
	
	while( $row1=mysqli_fetch_assoc($result_pres) ){
		$med_0=$row1['medicine_id'];
		$med_1=$row1['medicine_name'];
		$med_2=$row1['medicine_descp'];
		
		echo'<option value="'.$med_0.'">'.$med_1.'&nbsp &nbsp('.$med_2.')</option>';
	}
	echo'</select>';
	
	
	echo'<div class="form-group">
	<select class="custom-select" name="qty_1" required>
		<option value="One Tablet">One Tablet</option>
		<option value="Half Tablet">Half Tablet</option>
		<option value="2 mL">2 mL</option>
		<option value="5 mL">5 mL</option>
		<option value="8 mL">8 mL</option>
		<option value="10 mL">10 mL</option>
	</select>';
	
	echo'<div class="form-group">
	<select class="custom-select" name="timing_1" required>
		<option value="Morning-Afternoon-Night">Morning-Afternoon-Night</option>
		<option value="Morning">Morning</option>
		<option value="Afternoon">Afternoon</option>
		<option value="Night">Night</option>
		<option value="Morning-Afternoon">Morning-Afternoon</option>
		<option value="Morning-Night">Morning-Night</option>
		<option value="Afternoon-Night">Afternoon-Night</option>
	</select></div><div></div>';

	echo'</td>';

	$result_pres = mysqli_query($con,$query_pres) or die( header("location:error.php?error=".mysqli_error($con)."") );

	echo'<td>
	<div class="form-group">
	<h5>Medicine 2</h5>
    <select class="custom-select" name="medicine_2" required>
      <option value="invalid">Select Medicine Here</option>';

	while( $row1=mysqli_fetch_assoc($result_pres) ){
		$med_0=$row1['medicine_id'];
		$med_1=$row1['medicine_name'];
		$med_2=$row1['medicine_descp'];

		echo'<option value="'.$med_0.'">'.$med_1.'&nbsp &nbsp('.$med_2.')</option>';
	}
	echo'</select>';

	echo'<div class="form-group">
    <select class="custom-select" name="qty_2" required>
      <option value="One Tablet">One Tablet</option>
      <option value="Half Tablet">Half Tablet</option>
      <option value="2 mL">2 mL</option>
      <option value="5 mL">5 mL</option>
      <option value="8 mL">8 mL</option>
      <option value="10 mL">10 mL</option>
    </select>';

	echo'<div class="form-group">
    <select class="custom-select" name="timing_2" required>
      <option value="Morning-Afternoon-Night">Morning-Afternoon-Night</option>
      <option value="Morning">Morning</option>
      <option value="Afternoon">Afternoon</option>
      <option value="Night">Night</option>
      <option value="Morning-Afternoon">Morning-Afternoon</option>
      <option value="Morning-Night">Morning-Night</option>
      <option value="Afternoon-Night">Afternoon-Night</option>
    </select></div><div></div>';

	echo'</td>';

	echo'<td></td></tr>';

	$result_pres = mysqli_query($con,$query_pres) or die( header("location:error.php?error=".mysqli_error($con)."") );

	echo'<tr class="table-success"><td></td>';
	echo'<td>
	<div class="form-group">
	<h5>Medicine 3</h5>
    <select class="custom-select" name="medicine_3" required>
      <option value="invalid">Select Medicine Here</option>';
	
	while( $row1=mysqli_fetch_assoc($result_pres) ){
		$med_0=$row1['medicine_id'];
		$med_1=$row1['medicine_name'];
		$med_2=$row1['medicine_descp'];
		
		echo'<option value="'.$med_0.'">'.$med_1.'&nbsp &nbsp('.$med_2.')</option>';
	}
	echo'</select>';
	
	
	echo'<div class="form-group">
	<select class="custom-select" name="qty_3" required>
		<option value="One Tablet">One Tablet</option>
		<option value="Half Tablet">Half Tablet</option>
		<option value="2 mL">2 mL</option>
		<option value="5 mL">5 mL</option>
		<option value="8 mL">8 mL</option>
		<option value="10 mL">10 mL</option>
	</select>';
	
	echo'<div class="form-group">
	<select class="custom-select" name="timing_3" required>
		<option value="Morning-Afternoon-Night">Morning-Afternoon-Night</option>
		<option value="Morning">Morning</option>
		<option value="Afternoon">Afternoon</option>
		<option value="Night">Night</option>
		<option value="Morning-Afternoon">Morning-Afternoon</option>
		<option value="Morning-Night">Morning-Night</option>
		<option value="Afternoon-Night">Afternoon-Night</option>
	</select></div><div></div>';
	echo'</td>';

	$result_pres = mysqli_query($con,$query_pres) or die( header("location:error.php?error=".mysqli_error($con)."") );

	echo'<td>
	<div class="form-group">
	<h5>Medicine 4</h5>
	<select class="custom-select" name="medicine_4" required>
		<option value="invalid">Select Medicine Here</option>';

	while( $row1=mysqli_fetch_assoc($result_pres) ){
		$med_0=$row1['medicine_id'];
		$med_1=$row1['medicine_name'];
		$med_2=$row1['medicine_descp'];

		echo'<option value="'.$med_0.'">'.$med_1.'&nbsp &nbsp('.$med_2.')</option>';
	}
	echo'</select>';

	echo'<div class="form-group">
	<select class="custom-select" name="qty_4" required>
		<option value="One Tablet">One Tablet</option>
		<option value="Half Tablet">Half Tablet</option>
		<option value="2 mL">2 mL</option>
		<option value="5 mL">5 mL</option>
		<option value="8 mL">8 mL</option>
		<option value="10 mL">10 mL</option>
	</select>';
	
	echo'<div class="form-group">
	<select class="custom-select" name="timing_4" required>
		<option value="Morning-Afternoon-Night">Morning-Afternoon-Night</option>
		<option value="Morning">Morning</option>
		<option value="Afternoon">Afternoon</option>
		<option value="Night">Night</option>
		<option value="Morning-Afternoon">Morning-Afternoon</option>
		<option value="Morning-Night">Morning-Night</option>
		<option value="Afternoon-Night">Afternoon-Night</option>
	</select></div><div></div>';

	echo'</td>';

	echo'<td></td></tr>';

	echo'</tr>';
	if( @$_REQUEST['error'] == 'true'){
		echo'
		<tr class="table-danger">
		<td class="text-center font-weight-bold " name="status" id="status" role="alert" colspan="4">';
		echo"<p class='text-danger'>Prescription Can Not Be Blank Message</p>
		</td>
		</tr>";
	}
	echo'<tr class="table-success">';
	echo'<td colspan="4" class="font-weight-bold text-center">
	<input type="hidden" class="btn btn-success" name="rep_id" value="'.$rep_id.'"/>
	<input type="submit" class="btn btn-success" value="Submit Prescription"/>
	</td>';
	echo'</tr>';
	echo'</tbody>
</form>
</table>';

mysqli_close($con);
?>
</div>