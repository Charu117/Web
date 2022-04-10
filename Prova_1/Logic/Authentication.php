<?php
require_once('./Shared.php');

session_start();
// $email = $_REQUEST['email'];
// $password = $_REQUEST['password'];

$requestValue = $_REQUEST['request_value'];


switch ($requestValue) {
    case 'Register':
        Register($_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['confPass']);
        break;
    case 'Login':
        Login( $_REQUEST['email'], $_REQUEST['password']);
        break; 
    default:
        header("location: /View/404.php");
        break;
}

function Register($name, $surname, $email, $password, $confpass)
{
    $filename = "./logs/User.txt";

    if(is_writable($filename)){
        if(!$handle = fopen($filename, 'a+')){
            echo "FILE CANNOT BE OPENED!";
            exit; 
        }
        $first_row = fgets($handle);

        if ($password === $confpass){
            $cryptedPassword = encrypt($password);

            $fmt = numfmt_create( 'de_DE', NumberFormatter::DECIMAL );
            $id_user = numfmt_parse($fmt,$first_row[1]);
            $id_user++;

            $newUser = "$id_user;$name;$surname;$email;$cryptedPassword;\n";
            fwrite($handle, $newUser);
            echo "REGISTRATION COMPLETED SUCCESSFULLY";
          
            $_SESSION['id'] = $id_user;
            $_SESSION['username'] = $email;
            $_SESSION['name'] = $name;

            header("location: /View/home.php");

            $id_count = "#$id_user\n";

            $allContent=file_get_contents($filename);
            $content_chunks = explode($first_row, $allContent);
            $allContent=implode($id_count, $content_chunks);
            file_put_contents($filename, $allContent);

        }
        echo "Password error";
        fclose($handle);
        
    }else {
        echo "ERROR";
    }
}

function Login($email, $password)
{
    $variables = fopen("./logs/User.txt", 'r') or die ("FILE CANNOT BE OPENED");
    $authenticated = false;

    while(!feof($variables)){
        $row = fgets($variables);
        list($name_file, $surname_file, $email_file, $password_file, $fine) = explode(";", $row);

        if(strcmp($email, $email_file) == 0 && strcmp($password, decrypt($password_file)) == 0){
            $_SESSION['username'] = $email_file;
            $_SESSION['name'] = $name_file;

            setcookie('name', $name_file, 3600, "/");
            $authenticated = true;
        }
        
    }
    fclose($variables);

    $authenticated ? header("location: /View/home.php") : header("location: /");
}