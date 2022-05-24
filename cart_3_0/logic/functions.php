<?php session_start();
const url_users = "http://localhost/Web/cart_3_0/logs/user_logs.json";
function log_In($email,$password){
    //$url = __DIR__.'/user_logs.json';
    $users = file_get_contents(url_users);
    $array_users = json_decode($users);
    $curr_user = " ";
    $authenticated = false;
    foreach ($array_users as $user){
        if (($user->email == $email) && ($user->password == $password)){
            $curr_user = $email;
            $authenticated = true;
        }
    }
    if ((!empty($curr_user)) && $authenticated){
        $_SESSION['user'] = $curr_user;
        header("location: ./view/home.php");
    }
}

function register($first_name, $last_name, $email, $password){
    $users = file_get_contents(url_users);
    $array_users = json_decode($users);
    $user_exists = false;
    foreach ($array_users as $user){
        if ($user->email == $email){
            $user_exists = true;
        }
    }
    if (!$user_exists){
        $new_user = array(
            "f_name" => $first_name,
            "l_name" => $last_name,
            "email" => $email,
            "password" => $password
        );
        $array_users[] = $new_user;
        $json = json_encode($array_users);
        var_dump($json);
        file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/Web/cart_3_0/logs/user_logs.json', json_encode($array_users));
        $_SESSION['user'] = $email;
        header("location: ./view/home.php");

    }
}
function current_user(){
    $users = file_get_contents(url_users);
    $array_users = json_decode($users);
    $curr_user = $_SESSION['user'];
    $user_ = array();
    foreach ($array_users as $user){
        if ($user->email == $curr_user){
            $user_verified = array($user->f_name, $user->l_name, $user->email, $user->password);
            $user_[] = $user_verified;
        }
    }
    return $user_;
}