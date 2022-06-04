<?php

if (isset($_POST['btn'])){
    /*$str1 = $_POST['string1'];
    $str2 = $_POST['string2'];

    $arr = array( array(
        "str1" => $_POST['string1'],
        "str2" => $_POST['string2'],
    )
    );

    //$file = fopen("strings.json", "w");

    $json = json_encode($arr);
    file_put_contents("strings.json", $json);*/
    $strings = file_get_contents("strings.json");
    $arr2 = json_decode($strings);

    foreach ($arr2 as $value){
        echo $value->str1;
    }
    var_dump($arr2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text" placeholder="string1" name="string1">
    <input type="text" placeholder="string2" name="string2">
    <input type="submit" name="btn" value="submit">
</form>
</body>
</html>
