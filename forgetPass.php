<html>
<head>
<title>Forget Password</title>
<link rel="stylesheet" href="css/style.css">
<?php
	include"loading.php";
	include "css/bst.html";
	 include "css/js.html";
?>
</head>
<body>
<div class="row" style="align-content:right">
   <div class="col-lg-6 col-md-6 mobile" >
     <img src="images/m1.jpg" alt="Picture" style="width:100%">
   </div>
<div class="col-lg-6 col-md-6 jumbotron box" style="word-break: break-word;">
   <a href="index.php"><font size="6"><ion-icon style="float:left" name="arrow-back"></ion-icon></font></a>
	<h2 class="text-center">Enter Details To Recover Your Account</h2>
	<hr/><br/>
	<form method="POST" action="forgetPassAction.php" >
	
	 <div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text"><b>Enter Username :</b></span>
	</div>
	<input type="text" class="form-control" name="username" placeholder="Enter Your Username " required>
	</div><br/>

	<div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text"><b>Month & Year of Account Creation.</b></span>
	</div>
	<input type="month" class="form-control" name="regMonth" required>
	</div><br/>
	
	   <div class="input-group-prepend" style="float:right"><input type="submit" id="login" class="btn btn-success" value="Next" /></div>
	<div class="input-group-prepend" style="float:left"><a href="forgetPassEmail.php">Choose Another Method</a></div>
	
	</form>
</div>
</div>
</body>