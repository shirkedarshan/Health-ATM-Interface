<?php

$title = " EPIC Project : Health ATM " ;
$week = " Week 5 To 9 ";
$date="13th September 2019";

require("fpdf/fpdf.php"); //Import pdf

$pdf= new FPDF();     // Create pdf object
$pdf->AddPage();
$pdf->SetLeftMargin(16);

$pdf->SetFont("Arial","B",14);
$pdf-> Ln(5);
$pdf->Cell(180,10,"{$title}",1,1,"C"); //Cell(BorderWidth,Height,Content,CellBorder,Nextrow,AlignCenter)

$pdf-> Ln(10);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(23,10,"Group ID :",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(25,10,"TN02CSC1",0,0,"L");


$pdf->SetFont("Arial","B",12);
$pdf->Cell(130,10,"{$date}",0,1,"R");

//$pdf->Write(5,'www.fpdf.org');

$pdf->SetFont("Arial","B",12);
$pdf->Cell(50,10,"Project Progress : ({$week})",0,1,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(180,10,"     1) Making Of Userflow,Features Mapping With Block Diagram & IA.",0,1,"L");
$pdf->Cell(180,10,"     2) Making Presentation of Project.",0,1,"L");
$pdf->Cell(180,10,"     3) Gathering Information About Symptoms & Their Prescription.",0,1,"L");
$pdf->Cell(180,10,"     4) Gathering Information From Research Papers.",0,1,"L");
$pdf->Cell(180,10,"     5) Working On Front End Developement For User Type Patient.",0,1,"L");


////////////////////////////////////////////////

$pdf-> Ln(10);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(65,12,"Group Members",1,0,"C");
$pdf->Cell(65,12,"ID No.",1,0,"C");
$pdf->Cell(20,12,"Div",1,0,"C");
$pdf->Cell(30,12,"Sign",1,1,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(65,10,"Darshan Shirke",1,0,"C");
$pdf->Cell(65,10,"TUS3F161725",1,0,"C");
$pdf->Cell(20,10,"C-19",1,0,"C");
$pdf->Cell(30,10,"",1,1,"C");

$pdf->Cell(65,10,"Priya Avagan",1,0,"C");
$pdf->Cell(65,10,"TUS3F161733",1,0,"C");
$pdf->Cell(20,10,"C-27",1,0,"C");
$pdf->Cell(30,10,"",1,1,"C");

$pdf->Cell(65,10,"Adarsh Singh",1,0,"C");
$pdf->Cell(65,10,"TUS3F161741",1,0,"C");
$pdf->Cell(20,10,"C-30",1,0,"C");
$pdf->Cell(30,10,"",1,1,"C");

$pdf-> Ln(10);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(31,10,"Project Guide :",0,0,"L");
$pdf->SetFont("Arial","",12);
$pdf->Cell(90,10,"Prof. Dnyaneshwar Thombre.",0,0,"L");
$pdf-> Ln(10);

$pdf->output();
?>
