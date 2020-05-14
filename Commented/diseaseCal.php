<?php

include "db/conn.php";
$sql="select * from symptom";
$query=mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

$res=mysqli_fetch_array($query);

echo '<br>';
$len_res= (count($res)/2);

$symptomArr= array();

for($i=2;$i<$len_res;$i++){
	if($res[$i] != NULL ){
		array_push($symptomArr,$res[$i]);
	}
}

echo count($res);
echo print_r($symptomArr);
echo "<br>";
$inputValueArr=$symptomArr;
include "diseaseLogic.php";
mysqli_close($con);
?>
