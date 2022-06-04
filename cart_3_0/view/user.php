<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../logs/user_logs.json"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Book Store</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../images/auto_stories_black_24dp.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            BookStore
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="cart.php"><i class="material-icons">shopping_bag</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="material-icons">account_box</i></a>
            </li>
            <li class="nav-item">
                <form method="post">
                    <button type="submit" name="logout" class="nav-link btn ">Log out</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<div class="card" id="car1">
</div>

</body>
<script type="javascript">
    console.log('hello');
    let oXHR = new XMLHttpRequest();

    // Initiate request.
    oXHR.onreadystatechange = reportStatus;
    oXHR.open("GET", "/cart_3_0/../logs/user_logs.json", true);  // get json file.
    oXHR.send();

    function reportStatus() {
        if (oXHR.readyState === 4) {		// Check if request is complete.
            //Write data to a DIV element.
            //document.getElementById('car1').innerHTML = this.responseText;
            getData(this.responseText);
        }
    }

    window.onload{
        function getData(jsonData){
            let arr;
            arr = JSON.parse(jsonData);

            console.log(arr[0]['f_name']);

        }
    }


</script>

</html>