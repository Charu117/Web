<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Book Store</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="./images/auto_stories_black_24dp.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
      BookStore
    </a>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./view/cart.php"><i class="material-icons">shopping_bag</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log In</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <form method="POST">
        <div class="row justify-content-md-center">
            <div class="col col-lg-5">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col col-lg-5">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password">
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col col-lg-5 form-check">
                <input type="checkbox" class="form-check-input" id="showPassword">
                <label class="form-check-label" for="Check">Show password</label>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col col-md-auto d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="submit_btn">Log In</button>
            </div>
        </div>
    </form>
</div>
<?php include './logic/functions.php';
  $submit = isset($_POST['submit_btn']) ? true: false;

  if($submit){
    $user = new User(" ", " ", $_REQUEST['email'], $_REQUEST['password']);
    $result = logIn($user);
    if($result == false){
      echo "<p class='red-text'>Something's wrong.</p>";
    }
  }
?>
</body>
</html>