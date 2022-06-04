<?php ob_start();
include('../logic/cart_functions.php');
if (!isset($_SESSION['user'])){
    header("location: ../login.php");
}else{
    if (isset($_POST['logout'])){
        logout();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Cart</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
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
<div class="text-center" style="margin-top: 5rem"><h3>Welcome, to your cart!</h3></div>
<div class="container-sm" style="width: 50rem; margin-top: 5rem">
    <div id="cart"></div>
    <div id="total"></div>
</div>
<?php
add_products();
?>
<script type="text/javascript">
    let totalContainer = document.getElementById('total');
    let cartContainer = document.getElementById('cart');
    let cartPHP = JSON.parse('<?php echo current_cart(); ?>');
    let cart = {
        "power" : cartPHP[0],
        "the_body" : cartPHP[1],
        "living" : cartPHP[2],
        "why_has" : cartPHP[3],
        'book-lover' : cartPHP[4],
        'why_i_stand' : cartPHP[5],
        'risk' : cartPHP[6],
        'sailor' : cartPHP[7]
    }
    let images = {
        "power" : "../images/power.jpeg",
        "the_body" : "../images/the_body.jpeg",
        "living" : "../images/living.jpeg",
        "why_has" : "../images/why_has.jpeg",
        "book-lover" : "../images/book_lovers.jpeg",
        "why_i_stand" : "../images/why_i_stand.jpg",
        "risk" : "../images/risk.jpeg",
        "sailor" : "../images/sailor.jpeg"
    }

    let title = {
        "power" : "The 48 Laws of Power",
        "the_body" : "The body keeps the score",
        "living" : "Living Untethered",
        "why_has" : "Why Has Nobody Told Me This Before?",
        "book-lover" : "Book Lovers",
        "why_i_stand" : "Why I Stand",
        "risk" : "To Risk it all",
        "sailor" : "Sailor's bookshelf"
    }

    let prices = {
        "power" : 19.82,
        "the_body" : 18.85,
        "living" : 20.50,
        "why_has" : 19.99,
        'book-lover' : 19.99,
        'why_i_stand' : 18.99,
        'risk' : 19.99,
        'sailor' : 20.10
    }
    let createCart = (element, cart, image, title, price) => {
        let div = document.createElement('div');
        div.className = "row row justify-content-md-center";

        let div_card = document.createElement('div');
        div_card.className = "card col-sm";

        let div_row = document.createElement('div');
        div_row.className = "row g-0";

        let div_col = document.createElement('div');
        div_col.className = "col-md-4";

        let image_div = document.createElement('img');
        image_div.src = image;
        image_div.style.width = "240px";
        image_div.style.height = "300px";
        image_div.className = "img-fluid rounded-start";

        let card_body = document.createElement('div');
        card_body.className = "col-md-5";

        let card_body_inner = document.createElement('div');
        card_body_inner.className = "card-body";

        let title_card = document.createElement('h6');
        title_card.className = "card-title";
        title_card.innerHTML = title;

        let div_input = document.createElement('div');
        div_input.className = "input-group mb-3";

        let button_remove = document.createElement('button');
        button_remove.type = "submit";
        button_remove.className = "btn btn-outline-secondary";
        button_remove.id = "button-reduce-" + element;
        button_remove.name = "button-reduce-" + element;

        let image_remove = document.createElement('img');
        image_remove.src = "../node_modules/bootstrap-icons/icons/dash.svg"

        let button_add = document.createElement('button');
        button_add.type = "button";
        button_add.className = "btn btn-outline-secondary";
        button_add.id = "button-add-" + element;
        button_add.name = "button-add-" + element;

        let image_add = document.createElement('img');
        image_add.src = "../node_modules/bootstrap-icons/icons/plus.svg";

        let input = document.createElement('input');
        input.className = "form-control";
        input.readOnly = true;
        input.value = cart;
        input.type = "text";

        let div_price = document.createElement('div');
        div_price.className = "input-group";

        let input_price = document.createElement('input');
        input_price.className = "form-control";
        input_price.readOnly = true;
        input_price.type = "text";
        input_price.value = (price*cart).toString() + "\t€";

        div_price.appendChild(input_price);

        button_add.appendChild(image_add);
        button_remove.appendChild(image_remove);
        div_input.appendChild(button_remove);
        div_input.appendChild(input);
        div_input.appendChild(button_add);

        card_body_inner.appendChild(title_card);
        card_body_inner.appendChild(div_input);
        card_body_inner.appendChild(div_price);
        card_body.appendChild(card_body_inner);

        div_col.appendChild(image_div);
        div_row.appendChild(div_col);
        div_row.appendChild(card_body);
        div_card.appendChild(div_row);
        div.appendChild(div_card);
        cartContainer.appendChild(div);

    }
    let create_each_card = () => {
        if (cart["power"] > 0){
            createCart("power",cart["power"], images["power"], title["power"], prices["power"]);
        }
        if (cart["the_body"] > 0){
            createCart("the_body",cart["the_body"], images["the_body"], title["the_body"], prices["the_body"]);
        }
        if (cart["living"] > 0){
            createCart("living",cart["living"], images["living"], title["living"], prices["living"]);
        }
        if (cart["why_has"] > 0){
            createCart("why_has",cart["why_has"], images["why_has"], title["why_has"], prices["why_has"]);
        }
        if (cart["book-lover"] > 0){
            createCart("book-lover",cart["book-lover"], images["book-lover"], title["book-lover"], prices["book-lover"]);
        }
        if (cart["why_i_stand"] > 0){
            createCart("why_i_stand",cart["why_i_stand"], images["why_i_stand"], title["why_i_stand"], prices["why_i_stand"]);
        }
        if (cart["risk"] > 0){
            createCart("risk",cart["risk"], images["risk"], title["risk"], prices["risk"]);
        }
        if (cart["sailor"] > 0){
            createCart("sailor",cart["sailor"], images["sailor"], title["sailor"], prices["sailor"]);
        }
    }

    let createTotal = (cart, prices) => {
        let total = (cart["power"] * prices["power"]) + (cart["the_body"] * prices["the_body"]) + (cart["living"] * prices["living"]) + (cart["why_has"] * prices["why_has"]) + (cart["book-lover"] * prices["book-lover"]) + (cart["why_i_stand"] * prices["why_i_stand"]) + (cart["risk"] * prices["risk"]) + (cart["sailor"] * prices["sailor"]);
        document.cookie = "total=" + total;
        let div_body = document.createElement('div');
        div_body.style.marginBottom = "5rem";
        div_body.className = "input-group";

        let title = document.createElement('h6');
        title.innerHTML = "Total";
        title.style.marginTop = "5rem";
        let input = document.createElement('input');
        input.type = "text";
        input.className = "form-control";
        input.readOnly = true;
        input.value = total.toString() + "\t€";

        let button = document.createElement('button');
        button.id = "pay";
        button.name = "pay";
        button.className = "btn btn-primary";
        button.innerHTML = "check out";

        div_body.appendChild(input);
        div_body.appendChild(button);
        totalContainer.appendChild(title);
        totalContainer.appendChild(div_body);
    }
    window.onload = () => {
        createTotal(cart, prices);
        create_each_card();
        let buttons = document.getElementsByTagName('button');
        for (let i = 0; i < buttons.length; i++){
            buttons[i].onclick = () => {
                if (buttons[i].id === "button-add-power"){
                    document.cookie = "power=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-reduce-power"){
                    document.cookie = "power_rem=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-add-the_body"){
                    document.cookie = "the_body=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-reduce-the_body"){
                    document.cookie = "the_body_rem=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-add-why_has"){
                    document.cookie = "why_has=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-reduce-why_has"){
                    document.cookie = "why_has_rem=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-add-living"){
                    document.cookie = "living=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-reduce-living"){
                    document.cookie = "living_rem=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-add-book-lover"){
                    document.cookie = "book-lover=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-reduce-book-lover"){
                    document.cookie = "book-lover_rem=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-add-why_i_stand"){
                    document.cookie = "why_i_stand=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-reduce-book-lover"){
                    document.cookie = "why_i_stand_rem=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-add-risk"){
                    document.cookie = "risk=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-reduce-risk"){
                    document.cookie = "risk_rem=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-add-risk"){
                    document.cookie = "risk=true";
                    window.location.reload();
                }
                if (buttons[i].id === "button-reduce-sailor"){
                    document.cookie = "sailor_rem=true";
                    window.location.reload();
                }
                if (buttons[i].id === "pay"){

                    document.cookie = "remove=true";
                    window.location.reload();
                }

            }

        }
    }

</script>
</body>
</html>
