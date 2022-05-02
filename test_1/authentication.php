<?php session_start();

function Login($name, $password){
    $file = fopen("./logs/logs.txt", 'r');

    while (!feof($file)) {
        $user = fgets($file);
        list($part1,$part2) = explode(";", $user);
        if((strcmp($part1,$name) === 0) && (strcmp($part2,$password) === 0)){
            header("location: home.php");
        }
    }
    $_SESSION['user'] = $name;

    fclose($file);
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

