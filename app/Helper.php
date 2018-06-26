<?php
/**
* Ajustar valores decimais
*
* @param $num
*/
function decimalPlaces($num){
    $num = floatval(strval($num));
    for ($i=0; $i<5; $i++){
        $pow = pow(10, $i);
        $multi = $pow * $num;
        $res = round(fmod($multi, 1), 4);
        if ($res == 0){
            return $i;
        }
    }
    return 4;
}

/**
* Ajustar valores monetários
*
* @param $num
*/
function formatPrice($num){
    if($num == 0){
        return 0;
    }else{
        return 'R$ '.number_format($num, 2, ',', ' ');
    }
}

/**
* Ajustar de peso
*
* @param $num
*/
function formatWeight($num){
    if($num == 0){
        return 0;
    }elseif ($num == round($num)) {
        return round($num);
    }else{
        return number_format($num, 4, ',', ' ');
    }
}