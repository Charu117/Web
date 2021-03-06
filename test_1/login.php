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
    <title>Log In</title>
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
<div class="form-login">
  <div class="header2">LOG IN</div>
    <div class="row">
      <form class="col s12" method="post">
          <div class="row">
            <div class="input-field col s6">
              <input name="name" type="text" class="validate" placeholder="Username" required> 
            </div>
            </div>
            <div class="row">
            <div class="input-field col s6">
              <input type="password" class="validate" name="password" id="password" placeholder="Password" required>
              <p>
                <label>
                  <input type="checkbox" onclick="pass_visibility()"/>
                  <span>Mostra password</span>
                </label>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input type="submit" name="sub" value="Login" class="btn deep-purple lighten-1 button">
            </div>
        </div>  
      </form>
  </div>
</div>
<script>
  function pass_visibility(){
      var input = document.getElementById("password");
      if (input.type === "password") {
          input.type = "text";
      } else {
          input.type = "password";
      }
  }
</script>

<?php include 'authentication.php';
  $sub = isset($_POST['sub']) ? true : false; // if to check if the submit is done 

  if($sub == true){ /* checking if the submit button is clicked */
    echo $_REQUEST['name'];
    Login($_REQUEST['name'], $_REQUEST['password']);
  }
?>
</body>
</html>