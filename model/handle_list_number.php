<?php
function subString($digit,$number){
    if(strlen($digit) > strlen($number)) return false;

    for($i = 0; $i < strlen($digit);$i++){
        if($digit[$i] != $number[$i]) return false;
    }
    return true;
}
function fil_number($digit,$list_nums){
    $list_result = array();
    for($i = 0; $i < count($list_nums);$i++){
        if(subString($digit,$list_nums[$i]['phone'])){
            $list_result[] = $list_nums[$i]['phone'];
        }
    }
    return $list_result;
}
?>