<html>
<head>

<title>Login</title>

<?php include "loading.php"?>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<?php
include "css/bst.html";
?>
</head>

<body>

<?php
	if ( @$_REQUEST['signup_status']=='success'){
		echo "<script type='text/javascript'>alert('Signup Successful.Login Below.');</script>";
	}else if( @$_REQUEST['login_status']=='error'){
		echo "<script type='text/javascript'>alert('Enter Valid Username & Password');</script>";
	}else if( @$_REQUEST['vercode_status']=='error'){
		echo "<script type='text/javascript'>alert('Enter Valid Captcha Code');</script>";
	}
?>

<div class="row" style="align-content:right">
	<div class="col-lg-6 col-md-6 mobile" >
	<img src="images/m1.jpg" alt="Picture" style="width:100%">
	</div>
	<div class="col-lg-6 col-md-6 jumbotron" style="margin-top:0px">
	<form class="box" action="loginAction.php" method="POST">

	<center>
		<a href="index.php"><font size="6"><ion-icon style="float:left" name="arrow-back"></ion-icon></font></a>
		<a href="index.php"><font size="6"><ion-icon style="float:right" name="home" ></ion-icon></font></a>
		<h2 style="text-align=center">Log In</h2>
	</center><hr>

<!-- Enter login credentials -->
<div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text"><b>Enter Username :</b></span>
	</div>
	<input type="text" class="form-control" name="username" placeholder="Enter Your Username " required>
	</div><br/>

	<div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text"><b>Enter Password :</b></span>
	</div>
	<input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Must Contain At Least 8 Characters" required>
	</div><br/>

<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="basic-addon1"><b>Enter a Captcha Code:</b></span>
	</div>
	<div class="input-group-prepend"><input type="text" name="vercode" placeholder=" Captcha Code" required> &nbsp <img src="captcha.php">  &nbsp &nbsp </div>
	<div class="input-group-prepend"><input type="submit" id="login" class="btn btn-success" value="Log In" /></div>
	</div>
	<pre><b> Don't Have An Account?   </b><a href="signup.php">Click Here</a></pre>
	<pre><b> Forget Password?   </b><a href="forgetPassEmail.php">Click Here</a></pre>

	<center>
		<div class="" name="status" id='status' role="alert"></div>
	</center>
</form></div></div>

<?php include "css/js.html";  ?>

 </body>
 </html>
