<html lang="en">
<head>
 <?php
if( $_SESSION["user_type"] != 'admin' ){
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
	if( $('#nav-l').val() == 'act_doc'){
		$("#act_doc").addClass("active");
	}
	if( $('#nav-l').val() == 'checkfb'){
		$("#check_fb").addClass("active");
	}
	if( $('#nav-l').val() == 'checkact'){
		$("#check_act").addClass("active");
	}
	if( $('#nav-l').val() == 'add_med'){
		$("#addMed").addClass("active");
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
		<li class="nav-item dropdown " id="act_doc">
		<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Add/Remove Doctor
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			<a class="dropdown-item" href="addDoc.php">Add A Doctor</a>
			<a class="dropdown-item" href="docList.php">View/Remove Doctors</a>
			<a class="dropdown-item" href="docDisabled.php">Disabled Doctors</a>
		</div>
		</li>
		<li class="nav-item " id="check_fb">
			<a class="nav-link" href="feedbackHistory.php">Feedbacks<span class="sr-only">(current)</span></a>
		</li>

		<li class="nav-item dropdown " id="check_act">
		<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Check Activities</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			<a class="dropdown-item" href="checkActivities.php">View Reports</a>
			<a class="dropdown-item" href="userInfo.php">Check User Activities</a>
			<a class="dropdown-item" href="medicineList.php">Check Medicines</a>
		</div>
		</li>

		<li class="nav-item " id="addMed">
			<a class="nav-link" href="addMedicine.php">Add Medicines<span class="sr-only">(current)</span></a>
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
