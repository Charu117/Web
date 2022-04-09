<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="nome">
        <input type="text" name="surname" placeholder="cognome">
        <input type="date" name="date">
        <input type="radio" name="sex" checked>F
        <input type="radio" name="sex">M
        <input type="text" name="province" placeholder="provincia">
        <input type="text" name="birthplace" placeholder="luogo di nascita">
        <input type="submit" value="Submit">
        
    </form>

    <?php include 'logic.php'; 
        $name = $_POST['name'];
        $surname= $_POST['surname'];
        $age = $_POST['date'];
        $sex = $_POST['sex'];
        $province = $_POST['province'];
        $birthplace = $_POST['birthplace'];

        var_dump(consonant_only($name));
        
    ?>
</body>
</html>