<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();

include 'classes.php';

function logIn(User $user){
    $file = fopen("./logs/user_logs.txt", "r") or die("file cannot be opened");
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
    $file = fopen("./logs/user_logs.txt", "a+") or die("file cannot be opened");
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

    $file = fopen("./logs/cart_m.txt", "a+") or die("file cannot be opened");
    if($confirmation){
        $str = "$user->email" . ";0;0;0;0;0;0;0;0;\n";
        fwrite($file, $str);
    }
    fclose($file);
    return $confirmation;
}
function logout(){
    //ob_clean();
    if(isset($_SESSION['user'])){
        header("location: ../index.php");
        session_destroy();
    }
}

function current_user(){
    $file = fopen("../logs/user_logs.txt", "r") or die("file cannot be opened");
    $current_u = $_SESSION['user'];
    $curr_user = array();
    while(!feof($file)){
        $row = fgets($file);
        list($f_name, $l_name, $email_file, $password_file) = explode(";", $row);
        if((strcmp($email_file, $current_u) == 0)){
            array_push($curr_user, $f_name, $l_name, $email_file, $password_file);
            break;
        }
    }
    fclose($file);
    return json_encode($curr_user);
}

function edit_user(User $user){
    $file = fopen("../logs/user_logs.txt", "r") or die("file cannot be opened");
    $users = array();
    $current_u = $_SESSION['user'];
    while (!feof($file)){
        $row = fgets($file);
        $users[] = explode(";", $row);
    }
    fclose($file);
    for($i = 0; $i < count($users); $i++){
        if ($users[$i][2] == $current_u){
            if ($users[$i][0] != $user->first_name){
                $users[$i][0] = $user->first_name;
            }
            if ($users[$i][1] != $user->last_name){
                $users[$i][1] = $user->last_name;
            }
            if ($users[$i][3] != $user->password){
                $users[$i][3] = $user->password;
            }
        }

    }
    $file = fopen("../logs/user_logs.txt", "w") or die("file cannot be opened");
    for ($i = 0; $i < count($users); $i++){
        $str = implode(";", $users[$i]);
        fwrite($file, $str);
    }
    fclose($file);
}