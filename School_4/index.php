<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nome" id="">
        <input type="text" name="cognome" id="">
        <input type="text" name="eta" id="">
        <input type="submit" value="Submit">
    </form>
    <?php include 'class.php';

        session_start();

        $nome = $_REQUEST['nome'];
        $cognome = $_REQUEST['cognome'];
        $eta = $_REQUEST['eta'];

        $obj = new persona($nome, $cognome, $eta);

        $_SESSION['object'] = $obj;

        if($nome != ""){
            header("location: pagina2.php");
        }
           

    ?>
</body>
</html>