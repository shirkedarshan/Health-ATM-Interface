<?php
session_start();
echo'<head><title>Reset Password</title>';
include("css/bst.html");
include("css/js.html");
?>

<script>
$(document).ready(function(){
  $('#user_pass, #user_cpass').on('keyup', function () {
    var userpass_length = $("input#user_pass").val().length;
    if ( userpass_length > 7 && ( $('#user_pass').val() != '' ) ) {
      if ($('#user_pass').val() == $('#user_cpass').val()){
          $('#status').html('Proceed To Change Password').css('color', 'green');
          $('form input[type="submit"]').prop("disabled", false);
          $("#status").removeClass("alert alert-danger");
          $("#status").addClass("alert alert-success");
      }else{
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
});
</script>
</head>

<body>

<div class="jumbotron table-responsive">
<center><h2>Reset Your Password Now</h2></center><hr>
<center>Must Contain At Least 8 Characters</center>
<hr>
<form class="box" action="passChangeAction.php" method="POST">

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Enter New Password :</b></span>
  </div>
	<input type="password" class="form-control" name="user_pass" id="user_pass" required>
</div><br/>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Enter New Password Again:</b></span>
  </div>
	<input type="password" class="form-control" name="user_cpass" id="user_cpass" required>
</div><br/>

  <div class="input-group-prepend d-flex justify-content-center"><input type="submit" id="changePass" class="btn btn-success" value="Change Password" disabled /></div>
<br>
<center>
    <div class="" name="status" id='status' role="alert"></div>
</center>

</div>