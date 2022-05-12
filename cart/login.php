<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <title>Login</title>
</head>
<body>
<nav>
  <div class="nav-wrapper indigo lighten-4">
    <a href="index.php" class="brand-logo"><i class="material-icons">auto_stories</i>BookStore</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="sass.html"><i class="material-icons">shopping_bag</i></a></li>
      <li><a href="registration.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </div>
</nav>
<div class="row">
    <form class="col s12" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <input id="email" type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" name="password">
          <label for="Password">Password</label>
        </div>
      </div>
      <div class="row">
          <div class="col s6">
            <input type="submit" value="Log In" class="btn" name="submit_btn">
          </div>
      </div>
    </form>
  </div>
<?php include './Logic/functions.php';
  $submit = isset($_POST['submit_btn']) ? true: false;

  if($submit){
    $user = new User(" ", " ", $_REQUEST['email'], $_REQUEST['password']);
    $result = logIn($user);
    if($result == false){
      echo "<p class='red-text'>Something's wrong.</p>";
    }
  }
?>
<script>
    $(document).ready(function() {
        M.updateTextFields();
    });
</script>
</body>
</html>