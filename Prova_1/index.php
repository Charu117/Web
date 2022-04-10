<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css"  media="screen,projection"/>
    <title>WELCOME!</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper teal">
        <a href="#" class="brand-logo">WEEB</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">JavaScript</a></li>
        </ul>
        </div>
    </nav>
    <div class="mainContainer">
        <div class="row">
            <div class="col s4 offset-s4 center">
                <h3>REGISTRATION</h3>
            </div>
            
        </div>  
    <div class="row" id="hello" style="display: block;">
        <form class="col s12" method="POST" action="./Logic/Authentication.php">
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <input type="text" name="name" placeholder="name" class="validate"/>
                    <label for="first_name">First Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <input type="text" name="surname" placeholder="surname" />
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <input type="email" name="email" placeholder="E-mail" />
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <input type="password" name="password" placeholder="password" />
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-s4">
                    <input type="password" name="confPass" placeholder="confirm Password" />
                    <label for="confirm_pass">Confirm Password</label>
                </div>
            </div>
            <div class="buttons row">
                <div class="col s4 offset-s4 center">
                    <input class="btn waves-effect waves-light" type="submit" name="request_value" value="Register" />
                    <input class="btn waves-effect waves-light" type="button" name="btn_1" value="Go to login" onclick="changeContext()" />
                </div>
            </div>
        </div>
        </form>
    </div>
    <div id="ciao" style="display: none;">
        <h1>LOG IN</h1>
        <form method="POST" action="./Logic/Authentication.php">
            <input type="text" name="email" placeholder="E-mail" />
            <input type="text" name="password" placeholder="password" />
            <input type="submit" name="request_value" value="Login" />
            <input type="button" name="btn_2" value="Return to Registration" onclick="returnToPrev()" />
        </form>
    </div>

    <script>

        var text = document.getElementById("hello");

        function changeContext(){
            
            document.getElementById("hello").style.display = "none";
            document.getElementById("ciao").style.display = "block";

        }

        function returnToPrev() {
            document.getElementById("hello").style.display = "block";
            document.getElementById("ciao").style.display = "none";

        }
    </script>
</body>
</html>