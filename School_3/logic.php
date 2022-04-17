<?php



//ERROR

function read_file(){
    $file = fopen("posti.txt", "r") or die ("FILE CANNOT BE OPENED");
    $arr = array();

    while(!feof($file)){
        $row = fgets($file);
        $arr[] = explode(" ", $row);
    }
    fclose($file);
    return $arr;
}

function save_to_file($arr){
    $file = fopen("posti.txt", "w") or die ("FILE CANNOT BE OPENED");

    for($i=0;$i < 5;$i++){
        $str = implode(" ", $arr[$i]);
        fwrite($file, $str);
    }
    fclose($file);
}