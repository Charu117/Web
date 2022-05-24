<?php
$offset = 2; // to write into the file
function from_file(){
    $file = fopen("../logs/cart_m.txt", "r");
    $products = array();

    while (!feof($file)){
        $row = fgets($file);
        $products[] = explode(";", $row);
    }
    fclose($file);
    return $products;
}
function save_to_file($arr){
    flush();
    $file = fopen("../logs/cart_m.txt", "w");
    $i = 0;
    foreach ($arr as $subArr) {
        if ($i < (count($arr)- $GLOBALS['offset'])){
            $cart = implode(";", $subArr);
            fwrite($file, $cart);
        }
        $i++;
    }
    fclose($file);
}
function add_to_file($arr){
    $products = from_file();
    $file = fopen("../logs/cart_m.txt", "a");
    $email = $_SESSION['user'];

    for ($i = 0; $i < count($products); $i++){
        if (strcmp($email,$products[$i][0]) == 0) {
            if ($arr['power'] != 0){
                $products[$i][1] = $arr['power'];
            }elseif ($arr['the_body'] != 0){
                $products[$i][2] = $arr['the_body'];
            }elseif ($arr['living'] != 0){
                $products[$i][3] = $arr['living'];
            }elseif ($arr['whyH'] != 0){
                $products[$i][4] = $arr['whyH'];
            }
        }else{
            $newCart = array($email, $arr['power'], $arr['the_body'], $arr['living'], $arr['whyH']);
            $products[] = $newCart;
        }
    }
    fclose($file);
    save_to_file($products);
}
