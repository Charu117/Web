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
    <div class="row">
    <form method="POST" class="col s12">
    <div class="input-field col s6">
        <input type="text" name="str" placeholder="Inserisci una stringa">
    </div>
    <div class="buttons">
        <input type="submit" value="Submit" name="request_value" class="waves-effect blue lighten-3 btn">
    </div>
        
    </form>
    </div>
    <?php
        $str = $_REQUEST['str'];

        $upper = strtoupper($str);
        $lower = strtolower($str);

        $array = array();
       
        $array_1 = str_split($upper);
        $array_2 = str_split($lower);
         
        for($i=0; $i<sizeof($array_1); $i++){
            if($i%2){
                $array[$i] = $array_2[$i];
            }else{
                $array[$i] = $array_1[$i];
            }
        }
        
        echo "<p>";

        for($i = 0; $i < sizeof($array); $i++){
            echo $array[$i];
        }
        echo "</p>";
           
    ?>
    <style>
        .buttons{
            padding-top: 20px;
        }
        p{
            padding-left: 18px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            color: purple;
        }
    </style>
</body>
</html>