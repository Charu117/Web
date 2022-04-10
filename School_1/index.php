<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Document</title>
</head>
<body>

<?php
    /*
    for($j = 0; $j < 11; $j++){
        echo "<tr>";
        $i = 33 + ($j * 11);
        while($i < ($i + 11)){
            echo "<td>";
            echo chr($i);
            echo "</td>";
            $i++;
        }
        echo "</tr>";

    }
    */
 

    echo "<table class='striped'><tr><td>";
    
    for($i=33;$i<=127;$i++){
    
    echo chr($i)."\t"."<br>"; 
    
    if($i%10 == 0 and $i>9)
    {
        echo "</td><td>";
    }
    
    }
    
    echo "</td></tr></table>";
    
?>

</body>
</html>