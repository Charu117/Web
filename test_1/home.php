<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Home</title>
</head>
<body>
<nav>
    <div class="nav-wrapper deep-purple lighten-5">
        <a href="home.php"><i class="material-icons">free_breakfast</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Log out </a></li>
        </ul>
    </div>
  </nav>

  <div>
        <h4 class="header1">Benvenuto alla pagina home, <?php echo $_SESSION['user'];?>!</h4>
        <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aliquam animi explicabo voluptate voluptatem doloribus, blanditiis nisi praesentium. Amet dolorum voluptates quas quos! In eaque corporis perspiciatis ad modi alias.</blockquote>
  </div>

</body>
</html>