<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Registration</title>
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
<div class="form-register">
  <div class="header">REGISTRAZIONE</div>
  <div class="row">
    <form class="col s12" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input name="username" type="text" class="validate" placeholder="Username" required>
          
        </div>
        </div>
        <div class="row">
        <div class="input-field col s6">
          <input id="password1" type="password" class="validate" name="passwd" placeholder="Password (min 6 di caratteri)"  minlength="6" required>
          <p>
            <label>
              <input type="checkbox" onclick="pass_visibility()" class="small"/>
              <span>Mostra password</span>
            </label>
          </p>
        </div>
      </div>
    
      <div class="row">
        <div class="input-field col s6">
          <input id="password2" type="password" class="validate" name="conf_pass" placeholder="Conferma Password">
          <p>
            <label>
              <input type="checkbox" onclick="pass_visibility2()" class="box"/>
              <span>Mostra password</span>
            </label>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input type="submit" name="sub" value="Registra" class="btn deep-purple lighten-1 button">
        </div>
      </div>
      
    </form>
  </div>
</div>
<script>
  function pass_visibility(){
      var input = document.getElementById("password1");
      if (input.type === "password") {
          input.type = "text";
      } else {
          input.type = "password";
      }
  }
  function pass_visibility2(){
      var input = document.getElementById("password2");
      if (input.type === "password") {
          input.type = "text";
      } else {
          input.type = "password";
      }
  }

</script>
<?php 
    include 'authentication.php';
    $sub = isset($_POST['sub']) ? true : false;
    if($sub == true){
      if($_REQUEST['passwd'] ==  $_REQUEST['conf_pass']){ // checking if the passwords are correct to proceed
        Register($_REQUEST['username'], $_REQUEST['passwd']);
        
      }else{
        echo "<p class='red-text'>Password non corrispondono</p>";
      }
        
    }
    
?>
</body>
</html>