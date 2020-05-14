<?php
session_start();
?>

<html lang="en">
<head>

<title>Doctor Prescription</title>

<?php
if( $_SESSION["user_type"] == 'patient' ){
  echo'<input type="hidden" id="nav-l" value="userhis"/>';
  require("userNav.php");
}else if( $_SESSION["user_type"] == 'doctor' ){
  echo'<input type="hidden" id="nav-l" value="req"/>';
  require("docNav.php");
}elseif( $_SESSION["user_type"] == 'admin' ){
  echo'<input type="hidden" id="nav-l" value="checkact"/>';
  require("adminNav.php");
}else{
  header("location:logout.php");
}
?>
</head>

<body>
  <!-- ************************************************************************ -->
<?php $med_id=$_REQUEST['med_id'];?>
<div class="jumbotron table-responsive">
 <center><h2>Medical Reports Prescriptions</h2></center><hr><br>
 <table class="table table-bordered table-hover">
   <thead class="thead-dark">
     <tr>
       <th scope="col">Sr No.</th>
       <th scope="col">Report Date</th>
       <th scope="col">Report Id</th>
       <th scope="col">Doctor Name</th>
       <th scope="col">Prescription Date</th>
       <th scope="col">View Prescriptions</th>
     </tr>
   </thead>
   <tbody>

 <?php
   include("db/conn.php");

 $user_id=$_SESSION['user_id'];
 $query = "select * from user_pres p join user_med m on p.med_id = m.med_id where m.med_id='$med_id'";
 $result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

 // $query = "select * from user_pres where med_id='$med_id'";
 // $result = mysqli_query($con,$query) or die( header("location:error.php?error=".mysqli_error($con)."") );

 $i=1;

 while($row=mysqli_fetch_assoc($result)){
   $med_id=$row['med_id'];
   $doc_id=$row['doc_id'];

   $pres_id=$row['userpres_id'];

   $rep_date=$row['med_repdate'];
   $rep_date = date('d-m-Y', strtotime($rep_date));
   $pres_date=$row['med_pres_date'];
   $pres_date = date('d-m-Y', strtotime($pres_date));

   // $cost=$row['med_pres_cost'];

   $query1 = "select doc_name from doctor where doc_id='$doc_id'";
   $result1 = mysqli_query($con,$query1);
   $doc_name= mysqli_fetch_assoc($result1);
   // print_r($doc_name);

  echo'<tr class="table-success">
       <th scope="row">'.$i.'</th>
       <td>'.$rep_date.'</td>';
  echo'<td></center>'.$med_id.'</center></td>
       <td>'.$doc_name["doc_name"].'</td>
       <td>'.$pres_date.'</td>
       <td><a target="_blank" href="docPresReport.php?med_id='.$med_id.'&pres_id='.base64_encode($pres_id).'">View</a></td></tr>';

   $i++;
 }

mysqli_close($con);
 ?>
   </tbody>
 </table>
 </div>

 </body>
 </html>
