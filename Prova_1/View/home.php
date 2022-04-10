<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>TO DO LIST</title>
</head>
<body>
    <div>
        <form action="location: /View/home.php" method="post">
            <input placeholder="To-do" type="text" name="title" id="title"/>
            <input placeholder="Current date" type="date" name="curr_date" id="curr_date"/>
            <input placeholder="Due Date" type="date" name="due_date" id="due_date"/>
            <button type="submit">Submit</button>
        </form>
        <?php

        $file = fopen("/Applications/MAMP/htdocs/Logic/logs/toDoList.txt", 'a');
        $id_user = $_SESSION['id'];
        $title = $_REQUEST['title'];
        $curr_date = $_REQUEST['curr_date'];
        $due_date = $_REQUEST['due_date'];

        $string = "$id_user;$title;$curr_date;$due_date;\n";
        fwrite($file, $string);
        fclose($file);
        ?>
    </div>

    <div>
        <?php

        session_start();

        $file = fopen("/Applications/MAMP/htdocs/Logic/logs/toDoList.txt", 'r');
        $id_user = $_SESSION['id'];
        
        while(!feof($file)){
            $row = fgets($file);
            list($id, $titleFromFile, $currentDate, $dueDate, $end) = explode(";", $row);

            if($id === $id_user){
                echo "<p>$titleFromFile <br> Created: $currentDate <br> Due: $dueDate </p>";
            }
        }
        // echo " <li class='collection-item avatar'>
        //         <i class='material-icons circle red'>play_arrow</i>
        //         <span class='title'>$title</span>
        //         <p>Created: $curr_date <br>
        //            Due: $due_date 
        //         </p>
        //       </li>";

        fclose($file);
        ?>
    </div>
</body>
</html>