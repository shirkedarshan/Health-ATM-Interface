<html>

  <head>
    <?php include "loading.php"?>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#user_pass, #user_cpass').on('keyup', function () {
    var userpass_length = $("input#user_pass").val().length;
    if ( userpass_length > 7 && ( $('#user_pass').val() != '' ) ) {
      if ($('#user_pass').val() == $('#user_cpass').val() ) {
        $('#status').html('Check Contact Number').css('color', 'red');
        $("#status").removeClass("alert alert-success");
        $("#status").addClass("alert alert-danger");
        var usercon_length = $("input#user_contact").val().length;
        if ( usercon_length > 9 && usercon_length < 11 && ( $('#user_contact').val() != '' ) ) {
          $('#status').html('Proceed To SignUp').css('color', 'green');
          $('form input[type="submit"]').prop("disabled", false);
          $("#status").removeClass("alert alert-danger");
          $("#status").addClass("alert alert-success");
      }
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

  $('#user_contact').on('keyup', function () {
    var usercon_length = $("input#user_contact").val().length;
    if ( usercon_length > 9 && usercon_length < 11 && ( $('#user_contact').val() != '' ) ) {
        $('#status').html('Valid Contact Number').css('color', 'green');
        $("#status").removeClass("alert alert-danger");
        $("#status").addClass("alert alert-success");
        var userpass_length = $("input#user_pass").val().length;
        if ( userpass_length > 7 && ( $('#user_pass').val() != '' ) ) {
          if ($('#user_pass').val() == $('#user_cpass').val() ) {
            $('#status').html('Proceed To SignUp').css('color', 'green');
            $('form input[type="submit"]').prop("disabled", false);
          }
        }
    }else{
      $('#status').html('Enter Valid Contact Number').css('color', 'red');
      $('form input[type="submit"]').prop("disabled", true);
      $("#status").removeClass("alert alert-success");
      $("#status").addClass("alert alert-danger");
    }
  });
});
</script>

<?php

include "css/bst.html";
?>
</head>

<body>
<div class="row" style="align-content:right">
  <div class="col-lg-6 col-md-6 mobile" >
    <img src="images/m1.jpg" alt="Picture" style="width:100%">
  </div>
  <div class="col-lg-6 col-md-6 jumbotron-fluid" style="margin-top:0px">
  <form class="box" action="signupAction.php" method="POST">

    <center>
      <a href="login.php"><font size="6"><ion-icon style="float:left" name="arrow-back"></ion-icon></font></a>
      <a href="index.php"><font size="6"><ion-icon style="float:right" name="home"></ion-icon></font></a>
      <h2>Sign Up</h2>
    </center><hr>

<!-- Enter Name  -->
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Enter Your Full Name :</b></span>
  </div>
  <input type="text" class="form-control" name="user_name" placeholder="First Name   Middle Name   Last Name " required>
</div><br/>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Contact Number :</b></span>
  </div>
  <input type="number" class="form-control" id="user_contact" name="user_contact" placeholder="10 Digit Contact Number" required>
</div><br/>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Email Id:</b></span>
  </div>
  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Id" required>
</div><br/>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Enter Birth Date :</b></span>
  </div>
	<input type="date" class="form-control" name="user_bdate" placeholder="date" required/>
</div><br/>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Gender :</b></span>
  </div>
  <select class="custom-select" id="inputGroupSelect04" name="user_gender" aria-label="Example select with button addon" required>
    <option selected>Choose...</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
</div><br/>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Enter Username :</b></span>
  </div>
  <input type="text" class="form-control" name="username" placeholder="Login Credential " required>
</div><br/>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Enter Password :</b></span>
  </div>
	<input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Must Contain At Least 8 Characters" required>
</div><br/>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><b>Confirm Password :</b></span>
  </div>
	<input type="password" class="form-control" name="user_cpass" id="user_cpass" placeholder="Enter Password Again" required>
</div><br/>

<!-- Hidden Fields -->

<input type="hidden" name="user_type" id="user_type" value="patient" required>

<!-- Hidden Fields ends -->

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><b>Enter a Captcha Code:</b></span>
  </div>
  <div class="input-group-prepend"><input type="text" name="vercode" placeholder=" Captcha Code" required>  &nbsp &nbsp &nbsp &nbsp <img src="captcha.php">  &nbsp &nbsp &nbsp</div>
  <div class="input-group-prepend"><input type="submit" id="signup" class="btn btn-success" value="SignUp" disabled/></div>
</div>

<center>
    <div class="" name="status" id='status' role="alert"></div>
</center>

</form>

	</div></div>

  <?php include "css/js.html";  ?>

</body>
</html>

