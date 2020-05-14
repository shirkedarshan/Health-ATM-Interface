<?php session_start(); ?>
<html>
<head>
<title>Add Medicines</title>
<input type="hidden" id="nav-l" value="add_med"/>
<?php
	require("adminNav.php");
?>
</head>
<body>

<div class="jumbotron">

<form method="POST" action="addMedicineAction.php">

<h2 class="text-center">Add Your Medicines Here</h2><br/><hr/><br/>
	<div class="input-group-prepend">
		<span class="input-group-text font-weight-bold">Enter Medicine & Its Use</span>
	</div><br/>
	<div class="input-group">
		<input type="text" name="medicine" aria-label="Medicine" class="form-control" placeholder="Enter Name">
		<input type="text" name="uses" aria-label="Use" class="form-control" placeholder="Enter Uses">
	</div><br/>

	<div class="input-group-prepend" style="float:right">
		<input type="submit" class="btn btn-success" value="Add Medicine" />
	</div>

</body>