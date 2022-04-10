<?php



//ERROR

function read_file(){
    $file = fopen("posti.txt", 'r') or die ("FILE CANNOT BE OPENED");
    $arr = array(
        "A" => array(),
        "B" => array(),
        "C" => array(),
        "D" => array(),
        "E" => array(), 
        "F" => array(),
    );
    $i = 0;

    while(!feof($file)){
        $row = fgets($file);
        if($i == 0){
            $arr["A"] = explode(" ", $row);
        }elseif($i == 1){
            $arr["B"] = explode(" ", $row);
        }elseif($i == 2){
            $arr["C"] = explode(" ", $row);
        }elseif($i == 3){
            $arr["D"] = explode(" ", $row);
        }elseif($i == 4){
            $arr["E"] = explode(" ", $row);
        }elseif($i == 5){
            $arr["F"] = explode(" ", $row);
        }
        $i++;
    }
    fclose($file);
    return $arr;
}

function save_to_file($arr){
    $file = fopen("posti.txt", "w") or die ("FILE CANNOT BE OPENED");

    /* for($i = 'A'; $i <= 'F'; $i++){
        for($i = 0; $i < 15; $i++){
            
            //fwrite($file, $arr[$i][$j]);
        }
        //fwrite($file, "\n");
    } */

    foreach($arr as $x => $x_value){
        for($i = 0; $i < 15; $i++){
            $str = $x_value[$i]." ";
            fwrite($file, $str);
            
        }
    }

    fclose($file);
}