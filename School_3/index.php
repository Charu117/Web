<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="line" id="" placeholder="line">
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
            for($i = 'A'; $i <= 'F'; $i++){
                for($j = 0; $j < 14; $j++){
                    if($i == $line and $j == $seat and $arr[$i][$j] == "0"){
                        $arr[$i][$j] = "2";
                        $confirm = 1;
                        echo "<p>Seat reserved</p>";
                    }else {
                        $confirm = 0;
                    }
                }
            }

            save_to_file($arr);
        }
        

        //var_dump($arr);
   ?>
</body>
</html>