<?php

$sym=array();

$sym[1]=$_REQUEST["sym1"];
$sym[2]=$_REQUEST["sym2"];
$sym[3]=$_REQUEST["sym3"];
$sym[4]=$_REQUEST["sym4"];
$sym[5]=$_REQUEST["sym5"];
$sym[6]=$_REQUEST["sym6"];
$sym[7]=$_REQUEST["sym7"];

$symptomArr= array();

for($i=1;$i<=7;$i++){

	if($sym[$i] != "NULL" ){
		array_push($symptomArr,$sym[$i]);
	}
}

if( count($symptomArr) > 0){
	echo'<h3 class="text-center">Estimated Solution As Follows</h3><hr>';
	$inputValueArr=$symptomArr;
	include("diseaseLogic.php");
?>

<table class="table table-responsive text-center ">
<tbody class="d-flex justify-content-center" style="width:100%">
<tr class="table-bordered">
<td>
	<table class="table table-bordered table-hover text-center">
	<thead class="thead-dark">
		<tr>
		<th scope="col" colspan="2">Symptoms By Patients</th>
		</tr>
	</thead>
	<tbody>
<?php
for ($i=0;$i<$len_ipValArr;$i++){
	echo '<td colspan="2">'.$inputValueArr[$i].'</td></tr>';
}
?>
	</tbody>
</table>
</td>
<td>
<table class="table table-bordered table-hover text-center">
	<thead class="thead-dark">
	<tr>
	<th scope="col" colspan="2">Disease Patient May Have</th>
	</tr>
	</thead>
	<tbody>
<?php
	for($i=0;($i<$lenFinalDisease) && ($i<3) ;$i++){
		$j=$i+1;
		echo '<tr><td>'.$finalDiseaseArr[$i].'</td></tr>';
	}
?>
	</tbody>
</table>
</td></tr>
</tbody>
</table>
<?php
}else{
?>
<script>
	$("#part1").removeClass("collapse");
	$("#part1").addClass("collapse.show");
	$("#response").addClass("collapse");
	alert("Select At Least One Symptom");
</script>
<?php
}
?>