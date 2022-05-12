<?php ob_start(); //This function will turn output buffering on. While output buffering is active no output is sent from the script (other than headers), instead the output is stored in an internal buffer.
include 'classes.php';

function logIn(User $user){
    $file = fopen("./logs/user_logs.txt", "r") or die("file cannot be opened");
    $confirmation = false;
    while(!feof($file)){
        $row = fgets($file);
        list($f_name, $l_name, $email_file, $password_file) = explode(";", $row);
        if((strcmp($email_file, $user->email) == 0) && (strcmp($password_file, $user->password) == 0)){
            header("location: ./home.php");
            $confirmation = true;
        }
    }
    fclose($file);
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
        header("location: ./home.php");
        $str = "$user->first_name;$user->last_name;$user->email;$user->password;\n";
        fwrite($file, $str);
        
        
    }
    fclose($file);
    return $confirmation;
}
?>