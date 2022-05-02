<?php session_start();

function Login($name, $password){
    $file = fopen("./logs/logs.txt", 'r');

    while (!feof($file)) {
        $user = fgets($file);
        list($part1,$part2) = explode(";", $user);
        echo "$part1;$part2<br>";
        if((strcmp($part1,$name) === 0) && (strcmp($part2,$password) === 0)){
            header("location: home.php");
            echo "hhdhd";
        }
    }
    $_SESSION['user'] = $name;

    fclose($file);

    

    /*$conf = 0;

    $userfile= file_get_contents("./logs/logs.txt");

    $users = explode("\n",$userfile);

    foreach ($users as $user) {
        list($username, $pass) = explode(";", $user);

        if((strcmp($name, $username) == 0)){
            if(strcmp($password, $pass) == 0){
                $conf = 1;
            }
        }
        
    }
    if($conf){
        header("location: home.php");
    }else{
        echo "<p class='red-text'>Utente già registrato</p>";
    }*/

    /*while(!feof($file)){
        $row = fgets($file);
        $array = explode(";", $row);

        if(($array[0] == $name) && ($array[1] == $password)){
            $conf = false;
        }
    }*/
    
}

function Register($username, $password){
    $file = fopen("./logs/logs.txt", 'a+') or die ("FILE CANNOT BE OPENED");
    $conf = true;

    while(!feof($file)){
        $row = fgets($file);
        list($user, $pass) = explode(";", $row);

        if(strcmp($username, $user) == 0){
            $conf = false;
        }  
    }

    if($conf){
        header("location: home.php");
        $newUser = "$username;$password;\n";
        fwrite($file, $newUser);
        $_SESSION['user'] = $username;
    }else{
        echo "<p class='red-text'>Utente già registrato</p>";
        
    } 
    
    fclose($file);
}

