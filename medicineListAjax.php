<?php
session_start();
include("db/conn.php");

$medicineInfo = $_REQUEST["medicineInfo"];

$sql="select * from master_medicine where medicine_name like '%$medicineInfo%' or medicine_descp like '%$medicineInfo%' ";
$query= mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

	if(mysqli_num_rows($query) > 0){

echo'<table class="table table-bordered table-hover">
	<thead class="thead-dark text-center">
	<tr>
		<th scope="col">Sr No.</th>
		<th scope="col">Medicine Name</th>
		<th scope="col">Medicine Use</th>
		<th scope="col">Delete</th>
		</tr>
	</thead>
	<tbody>';

		$i=1;
		while( $row=mysqli_fetch_assoc($query))
		{
			$medicine_id=$row['medicine_id'];
			$medicine_name=$row['medicine_name'];
			$medicine_descp=$row['medicine_descp'];

			echo'<tr class="table-success text-center">
			<th scope="row">'.$i.'</th>
			<td><a class="font-weight-bold text-no-decoration">'.$medicine_name.'</a></td>
			<td>'.$medicine_descp.'</td>';
			echo'<td><a class="font-weight-bold text-no-decoration" href="medicineDelete.php?medicine_id='.base64_encode($medicine_id).'">Delete</a></td></tr>';

			$i+=1;
		}
	echo'</tbody>
	</table>';
}else{
	echo'<h3 class="text-center">No Medicine For Given Information</h3>';
}
mysqli_close($con);
?>

</body>
</html>
