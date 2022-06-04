<?php session_start();
ob_start();
error_reporting(0);
ini_set('display_errors', 0);
$offset = 2; // to write into the file

function from_file(){
    $file = fopen("../logs/cart_m.txt", "r");
    $products = array();

    while (!feof($file)){
        $row = fgets($file);
        $products[] = explode(";", $row);
    }
    //var_dump($products);
    fclose($file);
    return $products;
}
function save_to_file($arr){
    $file = fopen("../logs/cart_m.txt", "w");
    $i = 0;
    foreach ($arr as $subArr) {
        if ($i < (count($arr))){
            $cart = implode(";", $subArr);
            fwrite($file, $cart);
        }
        $i++;
    }
    fclose($file);
}
function add_to_file($arr){
    $products = from_file();
    $email = $_SESSION['user'];
    for ($i = 0; $i < count($products); $i++){
        if (strcmp($email,$products[$i][0]) == 0) {
            if ($arr['power'] != 0){
                $products[$i][1] = $arr['power'];
            }
            if ($arr['the_body'] != 0){
                $products[$i][2] = $arr['the_body'];
            }
            if ($arr['living'] != 0){
                $products[$i][3] = $arr['living'];
            }
            if ($arr['whyH'] != 0){
                $products[$i][4] = $arr['whyH'];
            }
            if ($arr['book-lover'] != 0){
                $products[$i][5] = $arr['book-lover'];
            }
            if ($arr['why_i_stand'] != 0){
                $products[$i][6] = $arr['why_i_stand'];
            }
            if ($arr['risk'] != 0){
                $products[$i][7] = $arr['risk'];
            }
            if ($arr['sailor'] != 0){
                $products[$i][8] = $arr['sailor'];
            }

        }
    }
    save_to_file($products);
}
function current_cart(){
    $products = from_file();
    $email = $_SESSION['user'];
    $current_products = array();

    for ($i = 0; $i < count($products); $i++){
        if (strcmp($email,$products[$i][0]) == 0) {
            array_push($current_products, $products[$i][1],$products[$i][2], $products[$i][3],$products[$i][4], $products[$i][5], $products[$i][6], $products[$i][7], $products[$i][8]);
        }
    }
    return json_encode($current_products);

}
function add_products(){
    $products = from_file();
    $email = $_SESSION['user'];
    for ($i=0; $i < count($products); $i++){
        if (strcmp($email,$products[$i][0]) == 0) {
            if ($_COOKIE['power']){
                unset($_COOKIE['power']);
                setcookie('power', false);
                $products[$i][1]++;
            }
            if ($_COOKIE['power_rem']){
                unset($_COOKIE['power_rem']);
                setcookie('power_rem', false);
                $products[$i][1]--;
            }
            if ($_COOKIE['the_body']){
                unset($_COOKIE['the_body']);
                setcookie('the_body', false);
                $products[$i][2]++;
            }
            if ($_COOKIE['the_body_rem']){
                unset($_COOKIE['the_body_rem']);
                setcookie('the_body_rem', false);
                $products[$i][2]--;
            }
            if ($_COOKIE['living']){
                unset($_COOKIE['living']);
                setcookie('living', false);
                $products[$i][3]++;
            }
            if ($_COOKIE['living_rem']){
                unset($_COOKIE['living_rem']);
                setcookie('living_rem', false);
                $products[$i][3]--;
            }
            if ($_COOKIE['why_has']){
                unset($_COOKIE['why_has']);
                setcookie('why_has', false);
                $products[$i][4]++;
            }
            if ($_COOKIE['why_has_rem']){
                unset($_COOKIE['why_has_rem']);
                setcookie('why_has_rem', false);
                $products[$i][4]--;
            }
            if ($_COOKIE['book-lover']){
                unset($_COOKIE['book-lover']);
                setcookie('book-lover', false);
                $products[$i][5]++;
            }
            if ($_COOKIE['book-lover_rem']){
                unset($_COOKIE['book-lover_rem']);
                setcookie('book-lover_rem', false);
                $products[$i][5]--;
            }
            if ($_COOKIE['why_i_stand']){
                unset($_COOKIE['why_i_stand']);
                setcookie('why_i_stand', false);
                $products[$i][6]++;
            }
            if ($_COOKIE['why_i_stand_rem']){
                unset($_COOKIE['why_i_stand_rem']);
                setcookie('why_i_stand_rem', false);
                $products[$i][6]--;
            }
            if ($_COOKIE['risk']){
                unset($_COOKIE['risk']);
                setcookie('risk', false);
                $products[$i][7]++;
            }
            if ($_COOKIE['risk_rem']){
                unset($_COOKIE['risk_rem']);
                setcookie('risk_rem', false);
                $products[$i][7]--;
            }
            if ($_COOKIE['sailor']){
                unset($_COOKIE['sailor']);
                setcookie('sailor', false);
                $products[$i][8]++;
            }
            if ($_COOKIE['sailor_rem']){
                unset($_COOKIE['sailor_rem']);
                setcookie('sailor_rem', false);
                $products[$i][8]--;
            }
            if ($_COOKIE['remove']){
                unset($_COOKIE['remove']);
                setcookie('remove', false);
                send_order($products[$i]);
                $products[$i][1] = 0;
                $products[$i][2] = 0;
                $products[$i][3] = 0;
                $products[$i][4] = 0;
                $products[$i][5] = 0;
                $products[$i][6] = 0;
                $products[$i][7] = 0;
                $products[$i][8] = 0;


            }
        }
    }
    $file = fopen("../logs/cart_m.txt", "w");
    $i = 0;
    foreach ($products as $subArr) {
        if ($i < count($products)){
            $cart = implode(";", $subArr);
            fwrite($file, $cart);
        }
        $i++;
    }
    fclose($file);
}

function send_order($order){
    $to = $_SESSION['user'];
    $subject = 'Your order';
    $message = "";
    if ($order[1] > 0){
        $message .= $order[1]. " pieces of The 48 Laws of Power\n";
    }
    if ($order[2] > 0){
        $message .= $order[2]. " pieces of The body keeps the score\n";
    }
    if ($order[3] > 0){
        $message .= $order[3]. " pieces of Living Untethered\n";
    }
    if ($order[4] > 0){
        $message .= $order[4]. " pieces of Why Has Nobody Told Me This Before?\n";
    }
    if ($order[5] > 0){
        $message .= $order[5]. " pieces of Book Lovers\n";
    }
    if ($order[6] > 0){
        $message .= $order[6]. " pieces of Why I Stand\n";
    }
    if ($order[7] > 0){
        $message .= $order[6]. " pieces of To Risk it all\n";
    }
    if ($order[8] > 0){
        $message .= $order[6]. " pieces of Sailor's bookshelf\n";
    }

    $message .= "the total of your order = ". $_COOKIE['total'] . "€";

    $headers = 'From: sathsaranifernando001@gmail.com'       . "\r\n" .
        'Reply-To: sathsaranifernando001@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    echo "<div class='text-center' style='margin-top: 5rem'><h3>All the details of your order has been sent to your mail!<br>Check your mail-box now!</h3></div>";
}