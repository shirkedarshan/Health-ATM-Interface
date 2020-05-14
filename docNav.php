<html lang="en">
<head>
 <?php
if( $_SESSION["user_type"] != 'doctor' ){
	header("location:logout.php");
}
 date_default_timezone_set("Asia/Kolkata");
 include "./css/bst.html";
 include ("./css/js.html");
 include ("loading.php");
 ?>

 <script>   // <input type="hidden" id="nav-l" value="connd"/>

 $(document).ready(function(){
   if( $('#nav-l').val() == 'prof' ){
     $("#profile").addClass("active");
   }
   if( $('#nav-l').val() == 'req'){
     $("#p_req").addClass("active");
   }
   if( $('#nav-l').val() == 'checkr'){
     $("#check_r").addClass("active");
   }
   if( $('#nav-l').val() == 'presg' ){
     $("#pres_g").addClass("active");
   }
   if( $('#nav-l').val() == 'chat_a'){
     $("#chat").addClass("active");
   }
   if( $('#nav-l').val() == 'feedb'){
     $("#feed_b").addClass("active");
   }
 });
 </script>

</head>
<body>

    <!-- Navbar content -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark font-weight-bold" style="background-color:#563d7c">
  <a class="navbar-brand" href="userProfile.php">Epic ATM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" id="profile">
        <a class="nav-link" href="userProfile.php">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown " id="p_req">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          View Patient Requests
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="patientReq.php">Patient Requests</a>
          <a class="dropdown-item" href="patientConnection.php">Connected Patients</a>
        </div>
      </li>
      <li class="nav-item " id="check_r">
        <a class="nav-link" href="checkReport.php">Check Reports<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item " id="pres_g">
        <a class="nav-link" href="presGiven.php">Prescription Given<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item " id="chat">
        <a class="nav-link" href="chatUser.php">Chat<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item " id="feed_b">
        <a class="nav-link" href="userFeedback.php">Feedback<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
       <button type="button" class="btn btn-outline-warning"><a class="text-decoration-none " href="logout.php">Log Out</a></button>
    </form>
  </div>
</nav>
  <!-- </nav> -->

</body>
</html>
