<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="line" placeholder="line">
        <input type="text" name="seat" placeholder="seat">
        <input type="submit" value="Submit" name="sub">
    </form>
    
   <?php include 'logic.php';

        $sub = isset($_POST['sub']) ? true: false;

        if($sub){
            $line = $_POST['line'];
            $seat = $_POST['seat'];
        
            $arr = read_file();
            $confirm = 0;
            for($i = 0; $i < 5; $i++){
                for($j = 1; $j <= 15; $j++){
                    if($arr[$i][0] == $line){
                        if(($j == $seat) && ($arr[$i][$j] == "0")){
                            $arr[$i][$j] = "2";
                            echo $arr[$i][$j];
                            save_to_file($arr);
                            echo "<p>Seat reserved</p>";
                        }
                    }
                }
            }
        }
        

        //var_dump($arr);
   ?>
</body>
</html>