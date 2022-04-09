<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style><?php include './css/style.css';?></style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Document</title>
    <style>
     
    </style>
</head>
<body>
<nav>
    <div class="nav-wrapper deep-purple lighten-5">
    <a href="index.php"><i class="material-icons">free_breakfast</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="login.php">Login</a></li>
            <li><a href="Register.php">Registra</a></li>
        </ul>
    </div>
  </nav>
  <div class="header1">REGISTRAZIONE</div>
  <div class="row">
    <form class="col s12" method="post">
      <div class="row">
        <div class="input-field col s4">
          <input name="username" type="text" class="validate" placeholder="Username">
          
        </div>
        </div>
        <div class="row">
        <div class="input-field col s4">
          <input type="password" class="validate" name="passwd" placeholder="Password">
          
        </div>
      </div>
    
      <div class="row">
        <div class="input-field col s4">
          <input id="password" type="password" class="validate" name="conf_pass" placeholder="Conferma Password">
         
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <input type="submit" name="sub" value="submit" class="btn deep-purple lighten-1">
          
        </div>
      </div>
      
    </form>
  </div>
    <?php 
        include 'authentication.php';
        $sub = isset($_POST['sub']) ? $_POST['sub'] : '';
        if($sub == true){
          if( $_REQUEST['passwd'] ==  $_REQUEST['conf_pass']){
            Register($_REQUEST['username'], $_REQUEST['passwd']);
          }else{
            echo "<p class='red-text'>Password non corrispondono</p>";
          }
            
        }
        
    ?>
</body>
</html>