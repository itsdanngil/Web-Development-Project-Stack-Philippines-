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
        <title>StackPh</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="assets/javascript/in2.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
<body>
<div id="hd"><button class="openbtn" onclick="openNav()">☰ </button> StackPh<form> <input type="search" name="search" id="sr" placeholder="Search" /></form>
</div>
<form> <input type="search" name="search" id="sr" placeholder="Search" /></form>
<header class="hr1">
    <a href="index.php" class="active">Home</a>
    <?php if (!isset($_SESSION['user_id'])) { ?>
        <a href="login.php">Log in</a>
        <a href="signup.php">Sign Up</a>
    <?php } ?>
    <a href="contact.php">Contact</a>
    <a href="forum.php">Forum</a>
    <?php if (isset($_SESSION['user_id'])) { ?>
        <a href="logout.php" id="logout-btn" style="float: right;">Logout</a>
    <?php } ?>
</header>
<br/>
<br/>
<br/>
<div id="sp" class="sp1">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="about.php">About</a>
  <a href="services.php">Services</a>
  <a href="clients.php">Clients</a>
  <a href="board.php">Board</a>
</div>
<br/>
<center>
<div class="wc"><p>Stack Philippines<br/></p><p id="p2">We code together!</p></div>
</center>
<center>
  <script type="text/javascript" src="assets/javascript/ajax.js"></script>
<footer id="ft"><p>&copy; Stack Philippines 2019</p></footer>
</center>
</body>
</html>
