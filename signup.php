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
        <title>StackPhilippines | Signup</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="assets/javascript/in2.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
<body>
<div id="hd"><button class="openbtn" onclick="openNav()">☰ </button> StackPh<form> <input type="search" name="search" id="sr" placeholder="Search" /></form></div>
<header class="hr1">
    <a href="index.php">Home</a>
    <a href="login.php">Log in</a>
    <a href="signup.php" class="active">Sign Up</a>
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
<button class="openbtn" onclick="openNav()">☰ </button> 
<br/>
    <center>
<div class="signup">
    <form action="process_signup.php" method="post" id="signup_form">
        <center>
        <p>Sign Up</p>
        <div id="message-pane">
            <?php echo message(); ?>
        </div>
        </center>
        <hr/>
        <label>Display Name</label>
        <input type="text" name="display_name" id="text" placeholder="Display Name" required />
        <br/>
        <label>Email</label>
        <br/>
        <input type="email" name="email" id="email" placeholder="email@example.com" required />
        <br/>
        <label>Password</label>
        <br/>
        <input type="password" name="password" id="password" placeholder="********" required />
        <br/>
        <label>Repeat Password</label>
        <br/>
        <input type="password" name="repeat_password" id="password" placeholder="********" required />
        <br/>
        <br/>
        <input type="submit" name="submit" id="signup_submit" value="Sign Up" />
        <br/>
        <br/>
        <a href="forgot.php" class="fr">Forgot Password?</a>
        <p id="da">I have an account? <a href="login.php" id="daa">Log In</a></p>
    </form>
    </div>
    <br/>
    <br/>
</center>
<center>
    <script type="text/javascript">
        var SignupBtnSubmit = document.getElementById('signup_submit');

        function RegisterUser() {
            var xhr = new XMLHttpRequest();
            var form = document.getElementById('signup_form');
            var action = form.getAttribute('action');
            var form_data = new FormData(form);

            xhr.open('POST', action, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;
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

        SignupBtnSubmit.addEventListener('click', function(event){
            event.preventDefault();
            RegisterUser();
        });
    </script>
<footer id="ft"><p>&copy; Stack Philippines <?php echo date('Y'); ?></p></footer>
</center>
</body>
</html>
