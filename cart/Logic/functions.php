<?php
include 'classes.php';

function logIn(User $user){
    $file = fopen("./logs/user_logs.txt", "r") or die("file cannot be opened");
    $confirmation = false;
    while(!feof($file)){
        $row = fgets($file);
        list($f_name, $l_name, $email_file, $password_file) = explode(";", $row);
        if((strcmp($email_file, $user->email) == 0) && (strcmp($password_file, $user->password) == 0)){
            header("location: ./view/home.php");
            $confirmation = true;
        }
    }
    fclose($file);
    return $confirmation;
}

function register(User $user){
    $file = fopen("./logs/user_logs.txt", "r") or die("file cannot be opened");
    $confirmation = false;
    while(!feof($file)){
        $row = fgets($file);
        list($f_name, $l_name, $email_file, $password_file) = explode(";", $row);
        if((strcmp($email_file, $user->email) == 0)){
            $confirmation = true;
        }
    }
    fclose($file);
    $file = fopen("./logs/user_logs.txt", "a") or die("file cannot be opened");

    if($confirmation == false){ // if confirmation is false, there's no user with this email
        $str = "$user->first_name;$user->last_name;$user->email;$user->password;\n";
        fwrite($file, $str);
        header("location: ./view/home.php");
    }
    fclose($file);
    return $confirmation;
}