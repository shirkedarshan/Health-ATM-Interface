<?php

// $inputValueArr = array("Sore Throat","Headache");

$len_ipValArr= count($inputValueArr) ;

// echo $len_ipValArr;
include "diseaseList.php";

$percentArr = array();
$listMultiSize = array();
$inputVal = 0;

for ($i=0;$i<$len_List;$i++){       // SCAN FOR THE ALL DISEASE
$val = NULL;
  foreach ($inputValueArr as $inputVal){    // CHECK FOR HOW MANY SYMPTOM MATCH
        // echo $inputVal."<br>";
        if ( in_array(ucwords($inputVal),$list[$i]) ){
            // echo $list[$i][0]." Disease";
            $val = $val + 1;                // UPDATE INDICATOR FOR SYMPTOM MATCH
        }
  }
  // echo "<br>foreach brk<br>";
  array_push($percentArr,$val);           // UPDATE THE VAL COUNT OF TOTAL MATCH (IF NOT THEN NULL)
}

$highestPerValueFound = max($percentArr);

for($i=0;$i<$len_List;$i++){
  if( ( $percentArr[$i] != NULL ) && ( $percentArr[$i] == $highestPerValueFound )){         // PUSH SIZE TO CALCULATE MIN FOR SYMPTOM MATCH
      array_push($listMultiSize,count($list[$i]));
  }else{
      array_push($listMultiSize,NULL);
  }
      // echo count($list[$i]);
}

$minTotalSymptomSize = min(array_filter($listMultiSize,'strlen'));

// echo "Symptoms by user: ";
//
// for ($i=0;$i<$len_ipValArr;$i++){
//   echo $i+1,$inputValueArr[$i];
// }
// echo "<br>";

$finalDiseaseArr=array();

// echo "percentArr"; print_r($percentArr).'<br>';echo '<br>';
// echo "listMultiSize";print_r($listMultiSize).'<br>';echo '<br>';
// echo 'Max of Match Symptom'.$highestPerValueFound.'<br>';
// echo 'Min Symptom Wala String'.$minTotalSymptomSize.'<br>';

for ($i=0;$i<$len_List;$i++){
  if( $highestPerValueFound>0 && $listMultiSize[$i] != NULL ){
    // echo $percentArr[$i]."<br>";
    // echo $highestPerValueFound."<br>";
    // echo $listMultiSize[$i]."<br>";
    // echo $minTotalSymptomSize."<br>";

    if( ($percentArr[$i] == $highestPerValueFound) && ( ($listMultiSize[$i] == $minTotalSymptomSize) or ($listMultiSize[$i] <= $minTotalSymptomSize + 4) ) ){
      // echo "Disease Patient Suffering From : ".$list[$i][0];
      array_push($finalDiseaseArr,$list[$i][0]);
      // echo "loop2";
    }
  }
}

$lenFinalDisease = count($finalDiseaseArr);
// echo $lenFinalDisease."<br>";

// for($i=0;($i<$lenFinalDisease) && ($i<3) ;$i++){
//   if($i==0){ echo"Estimated Prescription For patient Is : <br>"; }
//   echo $finalDiseaseArr[$i]."<br>";
// }

?>
