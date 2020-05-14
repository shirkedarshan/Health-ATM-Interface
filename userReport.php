<?php
session_start();

include("db/conn.php");
include("functions/function.php");
include("functions/state.php");

$med_id=base64_decode($_REQUEST['med_id']);

// echo $med_id.'<br>';

$sql="select * from user_med m inner join users u on m.user_id=u.user_id where med_id='$med_id'";
$query=mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

$val=mysqli_fetch_assoc($query);

$patient_name=$val['user_name'];
$patient_gender=$val['user_gender'];
$bp=$val['med_bp'];
$rbc=$val['med_rbc'];
$wbc=$val['med_wbc'];
$hct=$val['med_hct'];
$plt=$val['med_plt'];
$hmg=$val['med_hmg'];
$tmp=$val['med_temp'];
$bp=$val['med_bp'];
$pulse=$val['med_pulse'];
$med_ht=$val['med_ht'];
$med_wt=$val['med_wt'];
$med_fat=$val['med_fat'];
$age=$val['med_age'];
$med_bmi=$val['med_bmi'];
$med_date=$val['med_repdate'];
$med_date = date('d F Y', strtotime($med_date));

// echo $med_date;echo'<br>';
// echo  $rbc;echo'<br>';
// echo  $wbc;echo'<br>';
// echo  $hct;echo'<br>';
// echo  $plt;echo'<br>';
// echo  $tmp;echo'<br>';
// echo  $hmg;echo'<br>';
// echo  $bp;echo'<br>';
// echo  $pulse;echo'<br>';
// echo  $med_ht;echo'<br>';
// echo  $med_wt;echo'<br>';
// echo  $med_fat;echo'<br>';
// echo  $age;echo'<br>';
// echo  $med_bmi;echo'<br>';
// echo 'user bmi Is '.user_bmi($med_wt,$med_ht);
$med_bmi=user_bmi($med_wt,$med_ht);
$bmi_op = bmi_state($med_bmi);
$bmi_state= $bmi_op[0];
$bmi_status= $bmi_op[1];
 // echo '<br> BMI State : '.$bmi_state.'&'.$bmi_status;

// echo '<br>';

 // echo $bp.' BP State : '.bp_state($age).' & ';
 // echo 'BP Status : '.bp_status($bp);

 $fat_op = fat_state($_SESSION['user_gender'],$age,$med_fat);
 $fat_state= $fat_op[0];
 $fat_status= $fat_op[1];
 // echo '<br> Fat State : '.$fat_state.'&'.$fat_status;

$pulse_op = pulse_state($age,$pulse);
$pulse_state= $pulse_op[0];
$pulse_status= $pulse_op[1];
// echo '<br>'.$pulse;
//  echo ' Pulse State : '.$pulse_state.'&'.$pulse_status;

$hmg_op = hmg_state($_SESSION['user_gender'],$age,$hmg);
$hmg_state= $hmg_op[0];
$hmg_status= $hmg_op[1];
// echo '<br>'.$hmg;
//  echo ' Haemoglobin State : '.$hmg_state.'&'.$hmg_status;

$temp_op = temp_state($age,$tmp);
$temp_state= $temp_op[0];
$temp_status= $temp_op[1];
// echo '<br>'.$tmp;
//  echo ' Temperature State : '.$temp_state.'&'.$temp_status;

$rbc_op = rbc_state($_SESSION['user_gender'],$age,$rbc);
$rbc_state= $rbc_op[0];
$rbc_status= $rbc_op[1];
// echo '<br>'.$rbc;
//  echo ' RBC State : '.$rbc_state.'&'.$rbc_status;

$wbc_op = wbc_state($wbc);
$wbc_state= $wbc_op[0];
$wbc_status= $wbc_op[1];
// echo '<br>'.$wbc;
 // echo ' WBC State : '.$wbc_state.'&'.$wbc_status;

$plt_op = plt_state($_SESSION['user_gender'],$age,$plt);
$plt_state= $plt_op[0];
$plt_status= $plt_op[1];
// echo '<br>'.$plt;
 // echo ' Platelet State : '.$plt_state.'&'.$plt_status;

$hct_op = hct_state($_SESSION["user_gender"],$age,$hct);
$hct_state= $hct_op[0];
$hct_status= $hct_op[1];
// echo '<br>'.$hct;

$bp_state=bp_state($age);
$bp_status=bp_status($bp);

$title = " Health Care Report " ;

require("fpdf/fpdf.php"); //Import pdf

$pdf= new FPDF();     // Create pdf object
$pdf->AddPage();
$pdf->SetLeftMargin(16);

$pdf->SetFont("Arial","B",14);
$pdf-> Ln(5);
$pdf->Cell(180,10,"{$title}",1,1,"C"); //Cell(BorderWidth,Height,Content,CellBorder,Nextrow,AlignCenter)

$pdf-> Ln(10);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(25,10,"Report ID :",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(90,10,"{$med_id}",0,0,"L");


$pdf->SetFont("Arial","B",12);
$pdf->Cell(30,10,"Report Date : ",0,0,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(0,10,"{$med_date}",0,1,"L");

$pdf->SetFont("Arial","B",12);
$pdf->Cell(115,10,"Patient Name : {$patient_name}",0,0,"L");

$pdf->SetFont("Arial","B",12);
$pdf->Cell(32,10,"Age at Report :",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(0,10,"$age years",0,1,"L");

//$pdf->Write(5,'www.fpdf.org');

$pdf->SetFont("Arial","B",12);
$pdf->Cell(30,10,"User Weight : ",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(30,10,"$med_wt kg",0,0,"L");

$pdf->SetFont("Arial","B",12);
$pdf->Cell(28,10,"User Height : ",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(30,10,"$med_ht cms",0,0,"L");

////////////////////////////////////////////////
$pdf-> Ln(15);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Parameter",1,0,"C");
$pdf->Cell(40,12,"Report",1,0,"C");
$pdf->Cell(45,12,"Ideal Range",1,0,"C");
$pdf->Cell(40,12,"State",1,1,"C");

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Body Mass Index",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$med_bmi",1,0,"C");
$pdf->Cell(45,12,"$bmi_state",1,0,"C");
$pdf->Cell(40,12,"$bmi_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Fat Percentage",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$med_fat %",1,0,"C");
$pdf->Cell(45,12,"$fat_state",1,0,"C");
$pdf->Cell(40,12,"$fat_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Body Temperature",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$tmp Celcius",1,0,"C");
$pdf->Cell(45,12,"$temp_state ",1,0,"C");
$pdf->Cell(40,12,"$temp_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Blood Pressure",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$bp",1,0,"C");
$pdf->Cell(45,12,"$bp_state",1,0,"C");
$pdf->Cell(40,12,"$bp_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Haemoglobin",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$hmg gm/dL",1,0,"C");
$pdf->Cell(45,12,"$hmg_state",1,0,"C");
$pdf->Cell(40,12,"$hmg_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Pulse Rate",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$pulse bpm",1,0,"C");
$pdf->Cell(45,12,"$pulse_state",1,0,"C");
$pdf->Cell(40,12,"$pulse_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Red Blood Cells",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$rbc million/mcL",1,0,"C");
$pdf->Cell(45,12,"$rbc_state",1,0,"C");
$pdf->Cell(40,12,"$rbc_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"White Blood Cells",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$wbc mcL",1,0,"C");
$pdf->Cell(45,12,"$wbc_state",1,0,"C");
$pdf->Cell(40,12,"$wbc_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Hematocrit %",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$hct %",1,0,"C");
$pdf->Cell(45,12,"$hct_state",1,0,"C");
$pdf->Cell(40,12,"$hct_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","B",12);
$pdf->Cell(55,12,"Platelet Count",1,0,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(40,12,"$plt mcL",1,0,"C");
$pdf->Cell(45,12,"$plt_state",1,0,"C");
$pdf->Cell(40,12,"$plt_status",1,1,"C");

////////////////////

$pdf->SetFont("Arial","",12);

$pdf-> Ln(10);

$pdf->output();

mysqli_close($con);
?>