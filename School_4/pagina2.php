<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>I DATI</h1>

    <?php include 'class.php';
        session_start();

        echo $_SESSION['object']->get_nome(). " ";
        echo $_SESSION['object']->get_cognome(). " ";
        echo $_SESSION['object']->get_eta();

        if(isset($_POST['back'])){
            header("location: index.php");
        }
    ?>

    <form action="" method="post">
        <input type="submit" value="Indietro" name="back">
    </form>
</body>
</html>