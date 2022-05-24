<?php ob_start();

include('../logic/functions.php');
include('../logic/cart_functions.php');

if (!isset($_SESSION['user'])){
    header("location: ../login.php");
}else{
    if (isset($_POST['logout'])){
        logout();
    }
}
$arr_products = array(
    'power' => 0,
    'the_body' => 0,
    'living' => 0,
    'whyH' => 0,
);
if (isset($_POST['sub_power'])) {
    $arr_products['power'] = $_POST['quantity-power'];
}
if(isset($_POST['the_body'])){
    $arr_products['the_body'] = $_POST['quantity-the-body'];
}
if (isset($_POST['living'])){
    $arr_products['living'] = $_POST['quantity-living'];
}
if (isset($_POST['why_has'])){
    $arr_products['whyH'] = $_POST['quantity-whyH'];
}
if ((isset($_POST['sub_power'])) || (isset($_POST['the_body'])) || (isset($_POST['living'])) || (isset($_POST['why_has']))){
    add_to_file($arr_products);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
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
        <a class="nav-link" href="user.php"><i class="material-icons">account_box</i></a>
      </li>
      <li class="nav-item">
          <form method="post">
              <button type="submit" name="logout" class="nav-link btn ">Log out</button>
          </form>
      </li>
    </ul>
  </div>
</nav>
<div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../images/power.jpeg" class="card-img-top" alt="..." width="60" height="300">
            <div class="card-body">
                <h6 class="card-title">The 48 Laws of Power</h6>
                <form method="post">
                    <input class="form-control" type="number" id="quantity-power" name="quantity-power" placeholder="Qty" min="1" max="10">
                    <button class="btn btn-secondary" type="submit" name="sub_power">add to cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../images/the_body.jpeg" class="card-img-top" alt="..." width="60" height="300">
            <div class="card-body">
                <h6 class="card-title">The body keeps the score</h6>
                <form method="post">
                    <input class="form-control" type="number" id="quantity-power" name="quantity-the-body" placeholder="Qty" min="1" max="10">
                    <button class="btn btn-secondary" type="submit" name="the_body">add to cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../images/living.jpeg" class="card-img-top" width="60" height="300">
            <div class="card-body">
                <h6 class="card-title">Living Untethered</h6>
                <form method="post">
                    <input class="form-control" type="number" id="quantity-power" name="quantity-living" placeholder="Qty" min="1" max="10">
                    <button class="btn btn-secondary" type="submit" name="living">add to cart</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../images/why_has.jpeg" class="card-img-top" width="60" height="300">
            <div class="card-body">
                <h6 class="card-title">Why Has Nobody Told Me This Before?</h6>
                <form method="post">
                    <input class="form-control" type="number" id="quantity-power" name="quantity-whyH" placeholder="Qty" min="1" max="10">
                    <button class="btn btn-secondary" type="submit" name="why_has">add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>

