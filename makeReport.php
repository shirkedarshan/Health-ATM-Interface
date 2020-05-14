<?php session_start(); ?>
<html lang="en">
<head>
	<title>Make Report</title>
	<input type="hidden" id="nav-l" value="maker"/>
<?php
require("userNav.php");
		include("functions/state.php");
		include("functions/function.php");
?>
</head>
<body>
</html>
<div class="jumbotron">
	<h2 class="text-center">Make A Report Now.
	<ion-icon name="medkit"></ion-icon>
	</h2><hr><br>
  <form method="POST" action="makeReportAction.php">

<!--        Calculations ----------------->
<?php

$today = date("Y");
$b_year = date("Y", strtotime($_SESSION['user_bdate']));
$age= $today - $b_year;

echo "<h4>Current Age : ".$age.' yrs</h4><hr>';

if( $_SESSION['user_gender'] == 'Female'){
	$user_wt=mt_rand(40,70);
	$user_ht=mt_rand(140,180);
	$user_waist=mt_rand(50,60);
	$user_wrist=mt_rand(10,15);
	$user_hip=mt_rand(40,60);
	$user_forearm=mt_rand(10,35);
	//echo 'User Weight'.$user_wt.'User Height'.$user_ht;
	//echo '<br>';

	$med_fat=female_fat($user_wt,$user_waist,$user_wrist,$user_hip,$user_forearm);

	//echo 'body fat female:'.$med_fat;
	//echo '<br>';

}else if( $_SESSION['user_gender'] == 'Male' ){

	$user_wt=mt_rand(55,85);
	$user_ht=mt_rand(160,200);
	$user_waist=mt_rand(70,80);

	//echo 'User Weight'.$user_wt.'User Height'.$user_ht;
	//echo '<br>';

	$med_fat=male_fat($user_wt,$user_waist);
	//echo '<br> body fat male: '.$med_fat;
	//echo '<br>';

	$med_fat=male_fat($user_wt,$user_waist);
}

$fat_op = fat_state($_SESSION['user_gender'],$age,$med_fat);
$fat_state= $fat_op[0];
$fat_status= $fat_op[1];

$rbc=mt_rand(2.5*10,7*10)/10;
$wbc=mt_rand(3000,12000);
$hct=mt_rand(20,55);
$plt=mt_rand(100000,500000);
$hmg=mt_rand(120,200)/10;
$tmp=mt_rand(95,105);
$bp=mt_rand(100,180);
$pulse=mt_rand(50,120);

	//echo 'user bmi Is '.user_bmi($user_wt,$user_ht);
	$user_bmi=user_bmi($user_wt,$user_ht);
	$bmi_op = bmi_state($user_bmi);
	$bmi_state= $bmi_op[0];
	$bmi_status= $bmi_op[1];

	//echo '<br>';

$pulse_op = pulse_state($age,$pulse);
$pulse_state= $pulse_op[0];
$pulse_status= $pulse_op[1];
//echo '<br>'.$pulse;
// echo ' Pulse State : '.$pulse_state.'&'.$pulse_status;

$hmg_op = hmg_state($_SESSION['user_gender'],$age,$hmg);
$hmg_state= $hmg_op[0];
$hmg_status= $hmg_op[1];
//echo '<br>'.$hmg;
// echo ' Haemoglobin State : '.$hmg_state.'&'.$hmg_status;

$temp_op = temp_state($age,$tmp);
$temp_state= $temp_op[0];
$temp_status= $temp_op[1];
//echo '<br>'.$tmp;
// echo ' Temperature State : '.$temp_state.'&'.$temp_status;

$rbc_op = rbc_state($_SESSION['user_gender'],$age,$rbc);
$rbc_state= $rbc_op[0];
$rbc_status= $rbc_op[1];
//echo '<br>'.$rbc;
// echo ' RBC State : '.$rbc_state.'&'.$rbc_status;

$wbc_op = wbc_state($wbc);
$wbc_state= $wbc_op[0];
$wbc_status= $wbc_op[1];
//echo '<br>'.$wbc;
// echo ' WBC State : '.$wbc_state.'&'.$wbc_status;

$plt_op = plt_state($_SESSION['user_gender'],$age,$plt);
$plt_state= $plt_op[0];
$plt_status= $plt_op[1];
//echo '<br>'.$plt;
// echo ' Platelet State : '.$plt_state.'&'.$plt_status;

$hct_op = hct_state($_SESSION["user_gender"],$age,$hct);
$hct_state= $hct_op[0];
$hct_status= $hct_op[1];
//echo '<br>'.$hct;
?>

<!--Calculations Over-->
<?php
echo'
	<input type="hidden" name="age" value="'.$age.'" />


	<div class="form-group">
		<label for="UserWt">Enter Weight</label>
		<input type="text" class="form-control" id="UserWt" name="user_wt" value="'.$user_wt.'" />
	</div>

	<div class="form-group">
		<label for="UserHt">Enter Height</label>
		<input type="text" class="form-control" id="UserHt" placeholder="" name="user_ht" value="'.$user_ht.'" />
	</div>

	<div class="form-group">
		<label for="UserFat">Enter Fat%</label>
		<input type="text" class="form-control" id="UserFat" name="med_fat" value="'.$med_fat.'" />
	</div>
	
	<div class="form-group">
		<label for="Userbmi">Enter BMI</label>
		<input type="text" class="form-control" id="Userbmi" placeholder="" name="user_bmi" value="'.$user_bmi.'" />
	</div>

	<div class="form-group">
		<label for="UserRbc">Enter RBC Count</label>
		<input type="text" class="form-control" id="UserRbc" name="rbc" value="'.$rbc.'" />
	</div>

	<div class="form-group">
		<label for="UserWbc">Enter WBC Count</label>
		<input type="text" class="form-control" id="UserWbc" name="wbc" value="'.$wbc.'" />
	</div>

	<div class="form-group">
		<label for="UserPlt">Enter Platelete Count</label>
		<input type="text" class="form-control" id="UserPlt" name="plt" value="'.$plt.'" />
	</div>

	<div class="form-group">
		<label for="UserHct">Enter Hemocratin count</label>
		<input type="text" class="form-control" id="UserHct" name="hct" value="'.$hct.'" />
	</div>

	<div class="form-group">
		<label for="UserHmg">Enter Haemoglobin Count</label>
		<input type="text" class="form-control" id="UserHmg" name="hmg" value="'.$hmg.'" />
	</div>

	<div class="form-group">
		<label for="UserTemp">Enter Body Temp </label>
		<input type="text" class="form-control" id="UserTemp" placeholder="" name="tmp" value="'.$tmp.'" />
	</div>

	<div class="form-group">
		<label for="UserWt">Enter Pulse Rate</label>
		<input type="text" class="form-control" id="UserWt" placeholder="" name="pulse" value="'.$pulse.'" />
	</div>

		<div class="form-group">
			<label for="UserBloodP">Enter Blood Pressure</label>
			<input type="text" class="form-control" id="UserBloodP" placeholder="" name="bp" value="'.$bp.'" />
		</div>
    <center><input type="submit" class="btn btn-success " value="Confirm Make A Report"/><center>
</form>
</div>
</form>
</div>'
 ?>
