<?php
ob_start(); //This function will turn output buffering on. While output buffering is active no output is sent from the script (other than headers), instead the output is stored in an internal buffer.
session_start();

include 'classes.php';

function logIn(User $user){
    $file = fopen("../logs/user_logs.txt", "r") or die("file cannot be opened");
    $user_conf = '';
    $confirmation = false;
    while(!feof($file)){
        $row = fgets($file);
        list($f_name, $l_name, $email_file, $password_file) = explode(";", $row);
        if((strcmp($email_file, $user->email) == 0) && (strcmp($password_file, $user->password) == 0)){
            $user_conf = $user->email;
            $confirmation = true;
        }
    }
    fclose($file);
    if (!empty($user_conf)){
        $_SESSION['user'] = $user_conf;
        header("location: ./view/home.php");
    }
    return $confirmation;
}

function register(User $user){
    $file = fopen("../logs/user_logs.txt", "a+") or die("file cannot be opened");
    $confirmation = true;
    while(!feof($file)){
        $row = fgets($file);
        list($f_name, $l_name, $email_file, $password_file) = explode(";", $row);
        if((strcmp($email_file, $user->email) == 0)){
            $confirmation = false;
        }
    }
    if($confirmation){ // if confirmation is true, there's no user with this email
        header("location: ./view/home.php");
        $_SESSION['user'] = $user->email;
        $str = "$user->first_name;$user->last_name;$user->email;$user->password;\n";
        fwrite($file, $str);
    }
    fclose($file);
    return $confirmation;
}
function logout(){
    ob_clean();
    if(isset($_SESSION['user'])){
        header("location: ../index.php");
        session_destroy();
    }
}

function current_user(){
    $file = fopen("../logs/user_logs.txt", "r") or die("file cannot be opened");
    $current_u = $_SESSION['user'];
    $curr_user = array();
    $user_row = " ";
    while(!feof($file)){
        $row = fgets($file);
        list($f_name, $l_name, $email_file, $password_file) = explode(";", $row);
        if((strcmp($email_file, $current_u) == 0)){
            $user_row = $row;
            array_push($curr_user, $f_name, $l_name, $email_file, $password_file);
            break;
        }
    }
    fclose($file);
    return $curr_user;
}