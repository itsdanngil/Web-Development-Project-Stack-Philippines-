<?php
    require 'config/session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="content" content="Stack Ph, Programmers, developers">
        <title>StackPhilippines | Login</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="assets/javascript/in2.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    </head>
<body>
<div id="hd">
    <button class="openbtn" onclick="openNav()">☰ </button> StackPh
    <form>
        <input type="search" name="search" id="sr" placeholder="Search" />
    </form>
</div>
<header class="hr1">
    <a href="index.php">Home</a>
    <a href="login.php" class="active">Log in</a>
    <a href="signup.php">Sign Up</a>
    <a href="contact.php">Contact</a>
    <a href="forum.php">Forum</a>
</header>
<div id="sp" class="sp1">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="about.php">About</a>
  <a href="services.php">Services</a>
  <a href="clients.php">Clients</a>
  <a href="board.php">Board</a>
</div>
<br/>
<p id="pp11">Welcome to Stack Philippines</p>
    <center>
<div class="login">
    <form action="process_login.php" id="login_form" method="post">
        <center>
        <p>Log In</p>
        <div id="message-pane">
            <?php echo message(); ?>
        </div>
        </center>
        <hr/>
        <label>Email</label>
        <br/>
        <input type="email" name="email" id="email" placeholder="email@example.com" />
        <br/>
        <label>Password</label>
        <br/>
        <input type="password" name="password" id="password" placeholder="********" />
        <br/>
        <br/>
        <input type="submit" name="submit" id="login_submit" value="Log In" />
        <br/>
        <br/>
        <a href="forgot.php" class="fr">Forgot Password?</a>
        <p id="da">Don’t have an account? <a href="signup.php" id="daa">Sign up</a></p>
    </form>
    </div>
    <br/>
    <br/>
</center>
<center>
    <script type="text/javascript">
        var LoginBtnSubmit = document.getElementById('login_submit');

        function LoginUser() {
            var xhr = new XMLHttpRequest();
            var form = document.getElementById('login_form');
            var action = form.getAttribute('action');
            var form_data = new FormData(form);

            xhr.open('POST', action, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;
                    console.log(result);
                    var json = JSON.parse(result);
                    if (json.hasOwnProperty('errors')) {
                        var msgpane = document.getElementById('message-pane');
                        msgpane.innerHTML = json.errors;
                    }
                    else {
                        var location = json.redirect;
                        window.location.href = location;
                    }
                }
            }
            xhr.send(form_data);
        }

        LoginBtnSubmit.addEventListener('click', function(event){
            event.preventDefault();
            LoginUser();
        });
    </script>
<footer id="ft"><p>&copy; Stack Philippines 2019</p></footer>
</center>
</body>
</html>
