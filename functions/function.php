<?php

function user_bmi( $user_wt,$user_ht){
    // Weight In Kg Height In Centimetre

    $user_bmi = ($user_wt/pow(($user_ht/100),2));

    return(number_format($user_bmi,2));
}

// echo 'user bmi Is '.user_bmi(60,180);
// echo '<br>';

function female_fat($user_wt,$user_waist ,$user_wrist ,$user_hip,$user_forearm){
    $f1 = ($user_wt*0.732*2.20462)+8.987;
    $f2 = ($user_wrist*0.393701)/3.14;
    $f3 = ($user_waist*0.393701)*0.157;
    $f4 = $user_hip * 0.393701 * 0.249;
    $f5 = $user_forearm*0.393701*0.434;
    $lean_bodymass = $f1 + $f2 - $f3 - $f4 + $f5;

    $body_fat = ($user_wt*2.20462) - $lean_bodymass;
    $bodyfat_percent =  ($body_fat / ($user_wt*2.20462))*100;

    return( number_format($bodyfat_percent,2));
}

// echo 'body fat female: '.female_fat(54,70,15,60,20);


function male_fat($user_wt,$user_waist){
    // echo $lean_bodymass;
    $f1 = ($user_wt*1.082*2.20462)+94.42;
    $f2 = $user_waist*0.393701*4.15;
    $lean_bodymass = $f1 - $f2;

    $body_fat = ($user_wt*2.20462) - $lean_bodymass;
    $bodyfat_percent = ( $body_fat / ($user_wt*2.20462) ) * 100 ;

    return( number_format($bodyfat_percent,2));
}
// echo '<br> body fat male: '.male_fat(54,70).'<br><br>';


?>
