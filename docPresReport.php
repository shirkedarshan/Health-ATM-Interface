<?php

$pres_id=base64_decode($_REQUEST['pres_id']);


include "db/conn.php";

$query = "select * from user_pres where userpres_id='$pres_id'";
$result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

$row=mysqli_fetch_assoc($result);

$doc_id = $row['doc_id'];
$prescription= $row['med_pres'];
$pres_date= $row['med_pres_date'];
$pres_date = date('d F Y', strtotime($pres_date));
$doc_name=$row['doc_name'];
$med_id=$row['med_id'];
// echo $doc_name;


$title = " Health Care Prescription " ;
$week = " Week 5 To 9 ";
$date= $pres_date ;


require("fpdf/fpdf.php"); //Import pdf

$pdf= new FPDF();     // Create pdf object
$pdf->AddPage();
$pdf->SetLeftMargin(16);

$pdf->SetFont("Arial","B",14);
$pdf-> Ln(5);
$pdf->Cell(180,10,"{$title}",1,1,"C"); //Cell(BorderWidth,Height,Content,CellBorder,Nextrow,AlignCenter)

$pdf-> Ln(10);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(35,10,"Prescription ID :",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(70,10,"{$pres_id}",0,0,"L");


$pdf->SetFont("Arial","B",12);
$pdf->Cell(130,10,"Prescription Date : ",0,0,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(0,10,"{$pres_date}",0,1,"R");

$pdf->SetFont("Arial","B",12);
$pdf->Cell(25,10,"Report ID :",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(17,10,"$med_id",0,1,"L");


$pdf->SetFont("Arial","B",12);
$pdf->Cell(50,10,"Doctor Prescription : ",0,1,"L");

$pdf->SetFont("Arial","",12);
$pdf->MultiCell(0,10,"{$prescription}",0,"L");

////////////////////////////////////////////////

$pdf-> Ln(5);
$pdf->SetFont("Arial","B",12);
$pdf->Cell(50,10,"Medicines Given : ",0,1,"L");

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(55,12,"Medicine Name",1,0,"C");
	$pdf->Cell(40,12,"Quantity",1,0,"C");
	$pdf->Cell(90,12,"Timings",1,1,"C");

// Add medicines
$query1 = "select * from medicine_map m  inner join master_medicine mm  on m.medicine_id=mm.medicine_id where userpres_id='$pres_id'";
$result1 = mysqli_query($con,$query1) or die( header("location:error.php?error=".mysqli_error($con)."") );



while ( $row1=mysqli_fetch_assoc($result1) ){
	
	$med_name = $row1['medicine_name'];
	$qty= $row1['qty'];
	$timings= $row1['timings'];
	
	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(55,12,"$med_name",1,0,"C");
	$pdf->SetFont("Arial","",12);
	$pdf->Cell(40,12,"$qty",1,0,"C");
	$pdf->Cell(90,12,"$timings",1,1,"C");
	
}

$pdf-> Ln(10);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(20,10,"Doctor :",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(90,10,"Dr.{$doc_name}",0,1,"L");
$pdf-> Ln(10);

$pdf->output();

mysqli_close($con);
?>
