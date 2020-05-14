<?php session_start(); ?>
<html lang="en">
<head>
<input type="hidden" id="nav-l" value="act_doc"/>
<title>Add A Doctor</title>
<?php 
require("adminNav.php");
 ?>

 <script>
 $(document).ready(function(){
	$('#doc_contact').on('keyup', function () {
	var usercon_length = $("input#doc_contact").val().length;

	if ( usercon_length > 9 && usercon_length < 11 && ( $('#doc_contact').val() != '' ) ) {
		$('form input[type="submit"]').prop("disabled", false);
	}else{
		$('#status').html('Enter Valid Contact Number').css('color', 'red');
		$('form input[type="submit"]').prop("disabled", true);
	}
 });
 });
 </script>
</head>
<body>
<div class="jumbotron">
  <h2 class="text-center">Add A Doctor Now.
	<ion-icon name="medkit"></ion-icon>
  </h2><hr><br>

	<form method="POST" action="addDocAction.php">
	<h4 class="text-center">Enter Details Of Doctor To Be Added.</h4><hr>

	<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="inputGroup-sizing-sm">Username :</span>
	</div>
	<input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" placeholder="It Must Be Unique" name="username" required>
	</div>

	<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="inputGroup-sizing-sm">Name :</span>
	</div>
	<input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" placeholder="First Name    Last Name" name="name" required>
	</div>

	<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="inputGroup-sizing-sm">Contact No :</span>
	</div>
	<input type="number" class="form-control" aria-describedby="inputGroup-sizing-sm" placeholder="10 Characters Only" id="doc_contact" name="contact" required >
	</div>

	<div class="input-group mb-3">
	<div class="input-group-prepend ">
		<label class="input-group-text" for="inputGroupSelect01">Gender : </label>
	</div>
	<select class="custom-select" id="inputGroupSelect01" name="gender" required>
		<option label="Select Here"></option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select>
	</div>

	<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="inputGroup-sizing-sm">Birth Date :</span>
	</div>
	<input type="date" class="form-control" aria-describedby="inputGroup-sizing-sm" label="DD-MON-YYYY" name="b_date" required>
	</div>

	<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="inputGroup-sizing-sm">Qualification:</span>
	</div>
	<input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" placeholder="Enter Qualifications" name="specs" required>
	</div>

	<center><input type="submit" id="signup" class="btn btn-success " value="Add A Doctor" disabled/><center>
</form>
</div>
</body>
