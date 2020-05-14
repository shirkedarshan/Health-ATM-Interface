<?php

//                          BMI STARTS HERE                       //

function bmi_state($med_bmi){
    $bmi_state= '18.5-24.9';
    if ($med_bmi < 18.5 ){
        $bmi_status= 'Underweight';
    }elseif($med_bmi < 24.9){
        $bmi_status= 'Healthy';
    }elseif($med_bmi < 29.9){
        $bmi_status= 'Overweight';
    }else{
        $bmi_status= 'Obese';
    }
return array($bmi_state,$bmi_status);
}

// $bmi_op = bmi_state(21);
// $bmi_state= $bmi_op[0];
// $bmi_status= $bmi_op[1];
// echo '<br> BMI State : '.$bmi_state.'&'.$bmi_status;

//                      BP Starts Here                          //

function bp_state($user_age){
    if ($user_age < 21 ){
        $bp_state= '< 123';
    }elseif($user_age < 31 ){
        $bp_state= '< 126';
    }elseif($user_age < 41 ){
        $bp_state= '< 129';
    }elseif($user_age < 51 ){
        $bp_state= '< 135';
    }elseif($user_age < 61 ){
        $bp_state= '<142';
    }else{
        $bp_state= '<145';
    }
return ($bp_state);
}
// echo 'BP State : '.bp_state(22).' & ';

function bp_status($med_bp){
    if ($med_bp < 90){
        $bp_status= 'Low';
    }elseif ($med_bp < 120 ){
        $bp_status= 'Normal BP';
    }elseif($med_bp < 130){
            $bp_status= 'Eleveted BP';
    }elseif($med_bp < 140){
        $bp_status= 'Stage I BP';
    }elseif($med_bp < 180){
        $bp_status= 'Stage II BP';
    }else{
        $bp_status= 'Stage III BP';
    }
return ($bp_status);
}
// echo 'BP Status : '.bp_status(150);


//                          PULSE STARTS HERE                       //

function pulse_state($user_age,$med_pulse){
    if ($user_age < 2 ){
        $pulse_state= '70-190 bpm';
        if ($med_pulse <70  ){
            $pulse_status= 'Low';
        }elseif($med_pulse>190){
            $pulse_status = "High";
        }else{
            $pulse_status= 'Normal';
        }
    }elseif ($user_age < 4 ){
        $pulse_state= '80-160 bpm';
        if ($med_pulse <80  ){
            $pulse_status= 'Low';
        }elseif($med_pulse>160){
            $pulse_status= 'High';
        }else{
            $pulse_status= 'Normal';
        }
    }elseif ($user_age < 6 ){
        $pulse_state= '80-120 bpm';
        if ($med_pulse <80  ){
            $pulse_status= 'Low';
        }elseif($med_pulse>120){
            $pulse_status= 'High';
        }else{
            $pulse_status= 'Normal';
        }
    }elseif ($user_age < 8 ){
        $pulse_state= '75-115 bpm';
        if ($med_pulse <75  ){
            $pulse_status= 'Low';
        }elseif($med_pulse>115){
            $pulse_status= 'High';
        }else{
            $pulse_status= 'Normal';
        }
    }elseif ($user_age < 10 ){
        $pulse_state= '70-100 bpm';
        if ($med_pulse <70  ){
            $pulse_status= 'Low';
        }elseif($med_pulse>100){
            $pulse_status= 'High';
        }else{
            $pulse_status= 'Normal';
        }
    }else{
        $pulse_state= '60-100 bpm';
        if ($med_pulse <60  ){
            $pulse_status= 'Low';
        }elseif($med_pulse>100){
            $pulse_status= 'High';
        }else{
            $pulse_status= 'Normal';
        }
    }
return array($pulse_state,$pulse_status);
}
// $pulse_op = pulse_state(22,100);
// $pulse_state= $pulse_op[0];
// $pulse_status= $pulse_op[1];
// echo '<br> Pulse State : '.$pulse_state.'&'.$pulse_status;

//                          Body Fats Start Here                            //

function fat_state($user_gender,$user_age,$med_fat){
    if( $user_gender == 'Male' ){
        if ($user_age < 31 ){
            $fat_state= '9-15%';
            if ($med_fat < 9 ){
                $fat_status= 'Low';
            }elseif($med_fat> 15 ){
                $fat_status= 'High';
            }else{
                $fat_status= 'Normal';
            }
        }elseif($user_age < 51 ){
            $fat_state= '11-17%';
            if ($med_fat < 11 ){
                $fat_status= 'Low';
            }elseif($med_fat> 17 ){
                $fat_status= 'High';
            }else{
                $fat_status= 'Normal';
            }
        }else{
            $fat_state= '12-19%';
            if ($med_fat < 12 ){
                $fat_status= 'Low';
            }elseif($med_fat> 19 ){
                $fat_status= 'High';
            }else{
                $fat_status= 'Normal';
            }
        }
    }elseif ($user_age < 31 ){
        $fat_state= '14-21%';
        if ($med_fat < 14 ){
            $fat_status= 'Low';
        }elseif($med_fat> 21 ){
            $fat_status= 'High';
        }else{
            $fat_status= 'Normal';
        }
    }elseif($user_age < 51 ){
        $fat_state= '15-23%';
        if ($med_fat < 15 ){
            $fat_status= 'Low';
        }elseif($med_fat> 23 ){
            $fat_status= 'High';
        }else{
            $fat_status= 'Normal';
        }
    }else{
        $fat_state= '16-25%';
        if ($med_fat < 16 ){
            $fat_status= 'Low';
        }elseif($med_fat> 25 ){
            $fat_status= 'High';
        }else{
            $fat_status= 'Normal';
        }
    }
return array($fat_state,$fat_status);
}
// $fat_op = fat_state('Male',22,11);
// $fat_state= $fat_op[0];
// $fat_status= $fat_op[1];
// echo '<br> Fat State : '.$fat_state.'&'.$fat_status;


//                             Haemoglobin Starts Here                          //

function hmg_state($user_gender,$user_age,$med_hmg){
    if( $user_gender == 'Male' ){
        if ($user_age < 19 ){
            $hmg_state= '13.0-16.0 gm/dL';
            if ($med_hmg < 13 ){
                $hmg_status= 'Low';
            }elseif($med_hmg> 16 ){
                $hmg_status= 'High';
            }else{
                $hmg_status= 'Normal';
            }
        }else{
            $hmg_state= '13.5-17.5 gm/dL';
            if ($med_hmg < 13.5 ){
                $hmg_status= 'Low';
            }elseif($med_hmg> 17.5 ){
                $hmg_status= 'High';
            }else{
                $hmg_status= 'Normal';
            }
        }
    }else{
        if ($user_age < 19 ){
            $hmg_state= '11.9-15.0 gm/dL';
            if ($med_hmg < 11.9 ){
                $hmg_status= 'Low';
            }elseif($med_hmg> 15.0){
                $hmg_status= 'High';
            }else{
                $hmg_status= 'Normal';
            }
        }else{
            $hmg_state= '12.0-15.5 gm/dL';
            if ($med_hmg < 12 ){
                $hmg_status= 'Low';
            }elseif($med_hmg> 15.5 ){
                $hmg_status= 'High';
            }else{
                $hmg_status= 'Normal';
            }
        }
    }
return array($hmg_state,$hmg_status);
}

// $hmg_op = hmg_state('Male',22,14);
// $hmg_state= $hmg_op[0];
// $hmg_status= $hmg_op[1];
// echo '<br> Haemoglobin State : '.$hmg_state.'&'.$hmg_status;

//                          Temperature Starts Here                         //

function temp_state($user_age,$med_temp){
    if ($user_age < 18 ){
        $temp_state= '97-99 Celcius';
        if ($med_temp < 97 ){
            $temp_status= 'Low';
        }elseif($med_temp> 99 ){
            $temp_status= 'High';
        }else{
            $temp_status= 'Normal';
        }
    }else{
        $temp_state= '97.9-100.4 Celcius';
        if ($med_temp < 97.9 ){
            $temp_status= 'Low';
        }elseif($med_temp>  100.4 ){
            $temp_status= 'High';
        }else{
            $temp_status= 'Normal';
        }
    }
return array($temp_state,$temp_status);
}

// $temp_op = temp_state(22,99);
// $temp_state= $temp_op[0];
// $temp_status= $temp_op[1];
// echo '<br> Temperature State : '.$temp_state.'&'.$temp_status;

//                          RBC Starts Here                         //

function rbc_state($user_gender,$user_age,$med_rbc){
    if ($user_age < 18 ){
        $rbc_state= '4.0-5.5 million/mcL';
        if ($med_rbc < 4.0 ){
            $rbc_status= 'Low';
        }elseif($med_rbc> 5.5 ){
            $rbc_status= 'High';
        }else{
            $rbc_status= 'Normal';
        }
    }else{
        if ($user_gender == 'Male' ){
            $rbc_state= '4.7-6.1 million/mcL';
            if ($med_rbc < 4.7 ){
                $rbc_status= 'Low';
            }elseif($med_rbc> 6.1 ){
                $rbc_status= 'High';
            }else{
                $rbc_status= 'Normal';
            }
        }else{
            $rbc_state= '4.2-5.4 million/mcL';
            if ($med_rbc < 4.2 ){
                $rbc_status= 'Low';
            }elseif($med_rbc> 5.4 ){
                $rbc_status= 'High';
            }else{
                $rbc_status= 'Normal';
            }
        }
    }
return array($rbc_state,$rbc_status);
}


// $rbc_op = rbc_state('Male',22,6.1);
// $rbc_state= $rbc_op[0];
// $rbc_status= $rbc_op[1];
// echo '<br> RBC State : '.$rbc_state.'&'.$rbc_status;

//                          WBC Starts Here                         //

function wbc_state($med_wbc){
    $wbc_state= '4000-10000 mcL';
    if ($med_wbc < 4000 ){
        $wbc_status= 'Low';
    }elseif($med_wbc> 10000 ){
        $wbc_status= 'High';
    }else{
        $wbc_status= 'Normal';
    }
return array($wbc_state,$wbc_status);
}

// $wbc_op = wbc_state(7000);
// $wbc_state= $wbc_op[0];
// $wbc_status= $wbc_op[1];
// echo '<br> WBC State : '.$wbc_state.'&'.$wbc_status;

//                          Platelet Starts Here                            //

function plt_state($user_gender,$user_age,$med_plt){
    if ($user_age < 18 ){
        $plt_state= '120,000-360,000 mcL';
        if ($med_plt < 120000 ){
            $plt_status= 'Low';
        }elseif($med_plt> 360000 ){
            $plt_status= 'High';
        }else{
            $plt_status= 'Normal';
        }
    }elseif ($user_gender == 'Male' ){
        $plt_state= '140,000-380,000 mcL';
        if ($med_plt < 140000 ){
            $plt_status= 'Low';
        }elseif($med_plt> 380000 ){
            $plt_status= 'High';
        }else{
            $plt_status= 'Normal';
        }
    }else{
        $plt_state= '150,000-400,000 mcL';
        if ($med_plt < 150000 ){
            $plt_status= 'Low';
        }elseif($med_plt> 400000 ){
            $plt_status= 'High';
        }else{
            $plt_status= 'Normal';
        }
    }
return array($plt_state,$plt_status);
}

// $plt_op = plt_state('Female',22,150000);
// $plt_state= $plt_op[0];
// $plt_status= $plt_op[1];
// echo '<br> Platelet State : '.$plt_state.'&'.$plt_status;

//                          Hematocrit Starts Here                          //

function hct_state($user_gender,$user_age,$med_hct){
    if ($user_age < 18 ){
        $hct_state= '36-40%';
        if ($med_hct < 36 ){
            $hct_status= 'Low';
        }elseif($med_hct> 40 ){
            $hct_status= 'High';
        }else{
            $hct_status= 'Normal';
        }
    }else{
        if ($user_gender == 'Male' ){
            $hct_state= '42-52%';
            if ($med_hct < 42 ){
                $hct_status= 'Low';
            }elseif($med_hct> 52 ){
                $hct_status= 'High';
            }else{
                $hct_status= 'Normal';
            }
        }else{
            $hct_state= '38-46%';
            if ($med_hct < 38 ){
                $hct_status= 'Low';
            }elseif($med_hct> 46 ){
                $hct_status= 'High';
            }else{
                $hct_status= 'Normal';
            }
        }
    }
return array($hct_state,$hct_status);
}
// $hct_op = hct_state('Male',22,49);
// $hct_state= $hct_op[0];
// $hct_status= $hct_op[1];
// echo '<br> HCT State : '.$hct_state.' & '.$hct_status;

//                          Body Glucose                            //
//before eating

function befsgr_state($user_diab,$med_sgr){
    if( $user_diab == 'yes' ){
        $sgr_state='70-99 mg/dL';
        if ($med_sgr < 70 ){
            $sgr_status= 'Low';
        }elseif($med_sgr> 99 ){
            $sgr_status= 'High';
        }else{
            $sgr_status= 'Normal';
        }
    }else{
        $sgr_state='80-130 mg/dL';
        if ($med_sgr < 80 ){
            $sgr_status= 'Low';
        }elseif($med_sgr> 130 ){
            $sgr_status= 'High';
        }else{
            $sgr_status= 'Normal';
        }
    }
return array($sgr_state,$sgr_status);
}

// $befsgr_op = befsgr_state('yes',99);
// $befsgr_state= $befsgr_op[0];
// $befsgr_status= $befsgr_op[1];
// echo '<br> Before Meal Sugar State : '.$befsgr_state.'&'.$befsgr_status;


// AFter Eating a Meal
function aftsgr_state($user_diab,$med_sgr){
    if( $user_diab == 'yes' ){
        $sgr_state='140 mg/dL';
        if($med_sgr> 140 ){
            $sgr_status= 'High';
        }else{
            $sgr_status= 'Normal';
        }
    }else{
        $sgr_state='180 mg/dL';
        if($med_sgr> 180 ){
            $sgr_status= 'High';
        }else{
            $sgr_status= 'Normal';
        }
    }
return array($sgr_state,$sgr_status);
}
//
// $aftsgr_op = aftsgr_state('yes',141);
// $aftsgr_state= $aftsgr_op[0];
// $aftsgr_status= $aftsgr_op[1];
// echo '<br> After Meal Sugar State : '.$aftsgr_state.' & '.$aftsgr_status;

//////////////////////////////////////////////////////////////////

?>
