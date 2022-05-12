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
    <title>Registration</title>
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
        <input id="first_name" type="text" name="f_name">
        <label for="First name">First name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input id="last_name" type="text" name="l_name">
        <label for="Last name">Last name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input id="email" type="email" name="email" required>
        <label for="Email">Email</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input id="confirm_pass" type="password" name="password" minlength="8" required>
        <label for="Password">Password</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6 ">
        <input id="password" type="password" name="conf_password" minlength="8" required>
        <label for="Confirm Password">Confirm Password</label>
      </div>
    </div>
    <div>
      <input type="submit" value="Register" class="btn" name="register">
    </div>
  </form>
</div>

<script>
  $(document).ready(function() {
    M.updateTextFields();
  });
</script>
<?php include './Logic/functions.php';
$submit = isset($_POST['register']) ? true : false;

if($submit){
  $user = new User($_REQUEST['f_name'], $_REQUEST['l_name'], $_REQUEST['email'], $_REQUEST['password']);
    if($_POST['password'] == $_POST['conf_password']){
      $result = register($user);
      if($result == true){
        echo "<p class='red-text'>User already registered, try logging In!</p>";
      }
    }
}
?>
</body>
</html>