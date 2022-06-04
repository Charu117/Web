<?php //session_start();
error_reporting(0);
ini_set('display_errors', 0);

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
    'book-lover' => 0,
    'why_i_stand' => 0,
    'risk' => 0,
    'sailor' => 0
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
if (isset($_POST['sub_book_lover'])){
    $arr_products['book-lover'] = $_POST['quantity-book-lover'];
}
if (isset($_POST['sub_why_i'])){
    $arr_products['why_i_stand'] = $_POST['quantity-why-i'];
}
if (isset($_POST['sub_risk'])){
    $arr_products['risk'] = $_POST['quantity-risk'];
}
if (isset($_POST['sub_sailor'])){
    $arr_products['sailor'] = $_POST['quantity-sailor'];
}
if ((isset($_POST['sub_power'])) || (isset($_POST['the_body'])) || (isset($_POST['living'])) || (isset($_POST['why_has'])) || (isset($_POST['sub_book_lover']) || (isset($_POST['sub_why_i'])) || (isset($_POST['sub_risk'])) || (isset($_POST['sub_sailor'])))){
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
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
<div class="products">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card" style="width: 15rem;">
                <img src="../images/power.jpeg" class="card-img-top" alt="..." style="width: 240px;height: 300px">
                <div class="card-body">
                    <h6 class="card-title">The 48 Laws of Power</h6>
                    <form method="post">
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" id="quantity-power" name="quantity-power" placeholder="Qty" min="1" max="10">
                            <button class="btn btn-outline-secondary" type="submit" name="sub_power">
                                <img src="../node_modules/bootstrap-icons/icons/bag-plus.svg">
                            </button>
                        </div>
                    </form>
                    <div><small class="text-muted">19.82€</small></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 15rem;">
                <img src="../images/the_body.jpeg" class="card-img-top" alt="..." style="width: 240px;height: 300px">
                <div class="card-body">
                    <h6 class="card-title">The body keeps the score</h6>
                    <form method="post">
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" id="quantity-power" name="quantity-the-body" placeholder="Qty" min="1" max="10">
                            <button class="btn btn-outline-secondary" type="submit" name="the_body">
                                <img src="../node_modules/bootstrap-icons/icons/bag-plus.svg">
                            </button>
                        </div>
                    </form>
                    <div><small class="text-muted">18.85€</small></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 15rem;">
                <img src="../images/living.jpeg" class="card-img-top" style="width: 240px;height: 300px">
                <div class="card-body">
                    <h6 class="card-title">Living Untethered</h6>
                    <form method="post">
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" id="quantity-power" name="quantity-living" placeholder="Qty" min="1" max="10">
                            <button class="btn btn-outline-secondary" type="submit" name="living">
                                <img src="../node_modules/bootstrap-icons/icons/bag-plus.svg">
                            </button>
                        </div>
                    </form>
                    <div><small class="text-muted">20.50€</small></div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="width: 15rem;">
                <img src="../images/why_has.jpeg" class="card-img-top" style="width: 240px;height: 300px">
                <div class="card-body">
                    <h6 class="card-title">Why Has Nobody Told...</h6>
                    <form method="post">
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" id="quantity-whyH" name="quantity-whyH" placeholder="Qty" min="1" max="10">
                            <button class="btn btn-outline-secondary" type="submit" name="why_has">
                                <img src="../node_modules/bootstrap-icons/icons/bag-plus.svg">
                            </button>
                        </div>
                    </form>
                    <div><small class="text-muted">19.99€</small></div>
                </div>
            </div>
        </div>
    </div>

<div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../images/book_lovers.jpeg" class="card-img-top" alt="..." style="width: 240px;height: 300px">
            <div class="card-body">
                <h6 class="card-title">Book Lovers</h6>
                <form method="post">
                    <div class="input-group mb-3">
                        <input class="form-control" type="number" id="quantity-book-lover" name="quantity-book-lover" placeholder="Qty" min="1" max="10">
                        <button class="btn btn-outline-secondary" type="submit" name="sub_book_lover">
                            <img src="../node_modules/bootstrap-icons/icons/bag-plus.svg">
                        </button>
                    </div>
                </form>
                <div><small class="text-muted">19.99€</small></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../images/why_i_stand.jpg" class="card-img-top" alt="..." style="width: 240px;height: 300px">
            <div class="card-body">
                <h6 class="card-title">Why I Stand</h6>
                <form method="post">
                    <div class="input-group mb-3">
                        <input class="form-control" type="number" id="quantity-why-i" name="quantity-why-i" placeholder="Qty" min="1" max="10">
                        <button class="btn btn-outline-secondary" type="submit" name="sub_why_i">
                            <img src="../node_modules/bootstrap-icons/icons/bag-plus.svg">
                        </button>
                    </div>
                </form>
                <div><small class="text-muted">18.99€</small></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../images/risk.jpeg" class="card-img-top" alt="..." style="width: 240px;height: 300px">
            <div class="card-body">
                <h6 class="card-title">To Risk it all</h6>
                <form method="post">
                    <div class="input-group mb-3">
                        <input class="form-control" type="number" id="quantity-risk" name="quantity-risk" placeholder="Qty" min="1" max="10">
                        <button class="btn btn-outline-secondary" type="submit" name="sub_risk">
                            <img src="../node_modules/bootstrap-icons/icons/bag-plus.svg">
                        </button>
                    </div>
                </form>
                <div><small class="text-muted">19.99€</small></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../images/sailor.jpeg" class="card-img-top" alt="..." style="width: 240px;height: 300px">
            <div class="card-body">
                <h6 class="card-title">Sailor's bookshelf</h6>
                <form method="post">
                    <div class="input-group mb-3">
                        <input class="form-control" type="number" id="quantity-sailor" name="quantity-sailor" placeholder="Qty" min="1" max="10">
                        <button class="btn btn-outline-secondary" type="submit" name="sub_sailor">
                            <img src="../node_modules/bootstrap-icons/icons/bag-plus.svg">
                        </button>
                    </div>
                </form>
                <div><small class="text-muted">20.10€</small></div>
            </div>
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

