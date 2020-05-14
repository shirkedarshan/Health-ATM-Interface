<?php
$message="";
$valid='true';
include("db/conn.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $details=mysqli_query($con,"SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($details)>0) { //if the given email is in database, ie. registered
        $message_success=" Please check your email inbox or spam folder and follow the steps";
        //generating the random key
        $key=md5(time()+123456789% rand(4000, 55000000));
        //insert this temporary key into database
        $sql_insert=mysqli_query($con,"update users set temp_key = '$key' where email='$email'");
        //sending email about update
//"update doctor set temp_key = '$key' where email='$email' "
        $to= $email;
		$enEmail=base64_encode($email);
		$enKey=base64_encode($key);
        $subject = 'Recover Your Password';
        $msg = "Please copy the link and paste in your browser address bar". "\r\n"."http://localhost/doc/recoverVerify.php?key=".$enKey."&email=".$enEmail;
        $headers = 'From:Health Atm' . "\r\n";
        mail($to, $subject, $msg, $headers);
    }
    else{
		mysqli_close($con);
        header("location:error.php?error=Entered Email Doesn't Match Our Records.");
    }
}
?>
<html>
   <head>
     <?php include "loading.php"?>

     <link rel="stylesheet" href="css/style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<?php
 include "css/bst.html";
?>
 </head>

<body>
<div class="row" style="align-content:right">
   <div class="col-lg-6 col-md-6 mobile" >
     <img src="images/m1.jpg" alt="Picture" style="width:100%">
   </div>
   <div class="col-lg-6 col-md-6 jumbotron" style="margin-top:0px">
   <form class="box" action="forgetPassEmail.php" method="POST">
   <a href="index.php"><font size="6"><ion-icon style="float:left" name="arrow-back"></ion-icon></font></a>
   <b><h3 class="text-center">Recover Your Account</h3></b><hr/>
   
   <div class="input-group">
   
   <div class="input-group-prepend">
   
     <span class="input-group-text"><b>Email</b></span>
   </div>
   <input type="email" class="form-control" name="email" placeholder="Please Enter Your Email Id" required>
 </div><br/>

 <?php if (isset($error)) {
                      echo"<div class='alert alert-danger' role='alert'>
                      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                      <span class='sr-only'>Error:</span>".$error."</div>";
                 } ?>
            <?php if ($message<>"") {
                      echo"<div class='alert alert-danger' role='alert'>
                      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                      <span class='sr-only'>Error:</span>".$message."</div>";
                } ?>
            <?php if (isset($message_success)) {
                      echo"<div class='alert alert-success' role='alert'>
                      <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
                      <span class='sr-only'>Error:</span>".$message_success."</div>";
                  } ?>

 
 <center><input type="submit" name="forgot-password" class="btn btn-success" value="Send Recovery Email" /></center><br>
 
 <center><a href="forgetPass.php">Choose Another Method</a></center>

 </div>
 </body>