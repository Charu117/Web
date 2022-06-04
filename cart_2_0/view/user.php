<?php include ('../logic/functions.php');
if (!isset($_SESSION['user'])){
    header("location: ../login.php");
}else{
    if (isset($_POST['logout'])){
        logout();
    }
}
if (isset($_POST['save_changes'])){
    $user = new User($_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['password']);
    edit_user($user);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Book Store</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <a class="nav-link" href="#"><i class="material-icons">account_box</i></a>
            </li>
            <li class="nav-item">
                <form method="post">
                    <button type="submit" name="logout" class="nav-link btn">Log out</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<div class="text-center"><h3 >Account details</h3></div>
<div class="user_form" id="card-container" style="width: 30rem;"></div>
<script type="text/javascript">
    let cardContainer = document.getElementById('card-container');
    let arr = JSON.parse('<?php echo current_user(); ?>');

    let createTaskCard = (arr) => {
        /* form */
        let form = document.createElement('form');
        form.method = "post";
        form.style.marginTop = "1rem";

        /* input field - first name */
        let div_f_name = document.createElement('div');
        div_f_name.style.marginTop = "1.5rem";
        div_f_name.className = "row justify-content-md-center";

        let div_f_name_con = document.createElement('div');
        div_f_name_con.className ="input-group col col-lg-5";

        let label_f_name = document.createElement('label');
        label_f_name.className = "text-muted";
        label_f_name.htmlFor = "First Name";
        label_f_name.innerHTML = "First Name";

        let input_label_f_name = document.createElement('input');
        input_label_f_name.type = "text";
        input_label_f_name.readOnly = true;
        input_label_f_name.className = "form-control";
        input_label_f_name.id = "first-name";
        input_label_f_name.name = "first-name";
        input_label_f_name.value = arr[0];

        let button_f_name = document.createElement('button');
        button_f_name.type = "button";
        button_f_name.className = "btn btn-outline-secondary";
        button_f_name.id = "btn_f_name";

        let icon_f_name = document.createElement('img');
        icon_f_name.src = "../node_modules/bootstrap-icons/icons/pen-fill.svg";

        button_f_name.appendChild(icon_f_name);
        div_f_name_con.appendChild(input_label_f_name);
        div_f_name_con.appendChild(button_f_name);
        div_f_name.appendChild(label_f_name);
        div_f_name.appendChild(div_f_name_con);

        /* input field - Last name */

        let div_l_name = document.createElement('div');
        div_l_name.style.marginTop = "1.5rem";
        div_l_name.className = "row justify-content-md-center";

        let div_l_name_con = document.createElement('div');
        div_l_name_con.className = "input-group col col-lg-5";

        let label_l_name = document.createElement('label');
        label_l_name.className = "text-muted";
        label_l_name.htmlFor = "Last Name";
        label_l_name.innerHTML = "Last Name";

        let input_label_l_name = document.createElement('input');
        input_label_l_name.type = "text";
        input_label_l_name.readOnly = true;
        input_label_l_name.className = "form-control";
        input_label_l_name.id = "last-name";
        input_label_l_name.name = "last-name";
        input_label_l_name.value = arr[1];

        let button_l_name = document.createElement('button');
        button_l_name.type = "button";
        button_l_name.className = "btn btn-outline-secondary";
        button_l_name.id = "btn_l_name";

        let icon_l_name = document.createElement('img');
        icon_l_name.src = "../node_modules/bootstrap-icons/icons/pen-fill.svg";

        button_l_name.appendChild(icon_l_name);
        div_l_name_con.appendChild(input_label_l_name);
        div_l_name_con.appendChild(button_l_name);
        div_l_name.appendChild(label_l_name);
        div_l_name.appendChild(div_l_name_con);

        /* input field - email */

        let div_email = document.createElement('div');
        div_email.style.marginTop = "1.5rem";
        div_email.className = "row justify-content-md-center";

        let div_email_con = document.createElement('div');
        div_email_con.className = "input-group col col-lg-5";

        let label_email = document.createElement('label');
        label_email.className = "text-muted";
        label_email.htmlFor = "Email";
        label_email.innerHTML = "Email";

        let input_email = document.createElement('input');
        input_email.type = "email";
        input_email.readOnly = true;
        input_email.className = "form-control";
        input_email.id = "email";
        input_email.name = "email";
        input_email.value = arr[2];

        div_email_con.appendChild(input_email);
        div_email.appendChild(label_email);
        div_email.appendChild(div_email_con);

        /* input field - Password */

        let div_password = document.createElement('div');
        div_password.style.marginTop = "1.5rem";
        div_password.className = "row";

        let div_password_con = document.createElement('div');
        div_password_con.className = "input-group col col-lg-5";

        let label_password = document.createElement('label');
        label_password.className = "text-muted";
        label_password.htmlFor = "Password";
        label_password.innerHTML = "Password";

        let input_password = document.createElement('input');
        input_password.max = "6";
        input_password.type = "password";
        input_password.className = "form-control";
        input_password.readOnly = true;
        input_password.id = "password";
        input_password.name = "password";
        input_password.value = arr[3];

        let button_password = document.createElement('button');
        button_password.type = "button";
        button_password.className = "btn btn-outline-secondary";
        button_password.id = "password";

        let icon_pass = document.createElement('img');
        icon_pass.src = "../node_modules/bootstrap-icons/icons/pen-fill.svg";

        button_password.appendChild(icon_pass);
        div_password_con.appendChild(input_password);
        div_password_con.appendChild(button_password);

        div_password.appendChild(label_password);
        div_password.appendChild(div_password_con);

        let div_confirm = document.createElement('div');
        div_confirm.className = "row";

        let div_confirm_con = document.createElement('div');
        div_confirm_con.className = "d-grid gap-2";

        let button_conf = document.createElement('button');
        button_conf.style.marginTop = "1rem";
        button_conf.type = "submit";
        button_conf.innerHTML = "save changes";
        button_conf.className = "btn btn-primary";
        button_conf.name = "save_changes";

        div_confirm_con.appendChild(button_conf);
        div_confirm.appendChild(div_confirm_con);

        /* final appends to parent - form */
        form.appendChild(div_f_name);
        form.appendChild(div_l_name);
        form.appendChild(div_email);
        form.appendChild(div_password);
        form.appendChild(div_confirm);
        cardContainer.appendChild(form);
    }

    let initListOfTasks = () => {
        createTaskCard(arr);
    }
    window.onload = () => {
        initListOfTasks();
        let buttons = document.getElementsByTagName('button');
        let inputs = document.getElementsByTagName('input');
        for (let i = 0; i < buttons.length; i++) {
            buttons[i].onclick = () => {
                for (let j = 0; j < inputs.length; j++) {
                    if (buttons[i].id === "btn_f_name") {
                        if (inputs[j].id === "first-name") {
                            inputs[j].readOnly = false;

                        }
                    }
                    if (buttons[i].id === "btn_l_name") {
                        if (inputs[j].id === "last-name") {
                            inputs[j].readOnly = false;

                        }
                    }
                    if (buttons[i].id === "btn-email") {
                        if (inputs[j].id === "email") {
                            inputs[j].readOnly = false;

                        }
                    }
                    if (buttons[i].id === "password") {
                        if (inputs[j].id === "password") {
                            inputs[j].type = "text";
                            inputs[j].readOnly = false;

                        }
                    }

                }
            }
        }
    }
</script>
</body>
</html>