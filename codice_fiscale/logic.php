<?php

function consonant_only($str){
    $consonants = array();
    $str = strtoupper($str);

    $str_1 = str_split($str);

    for($i=0; $i < strlen($str); $i++){
        if($str_1[$i] != 'A' && $str_1[$i] != 'E' && $str_1[$i] != 'I' && $str_1[$i] != 'O' && $str_1[$i] != 'U'){
            array_push($consonants, $str[$i]);
        }
    }

    return $consonants;
}

?>