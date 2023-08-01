<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <title>Document</title>
</head>

<body>
  <nav class="navBar">
    <div class="container">
      <div class="Logo">
        <h3>Blogs</h3>
      </div>
      <div class="navLinks">
        <ul>
          <li><a href="#Home">Home</a></li>
          <li><a href="#AboutUs">About Us</a></li>
          <li><a href="#Find Blogs">Find Blogs</a></li>
          <?php
          if (isset($_SESSION["useruid"])) {
            echo "<li><a href='profile.php'>Personal profile</a></li>";
            echo "<li><a href='../includes/logOut.inc.php'>Log Out</a></li>";
          } else {
            echo "<li><a href='signUp.php'>Sign Up</a></li>";
            echo "<li><a href='logIn.php'>Log In</a></li>";
          }
          ?>
        </ul>
      </div>
  </nav>
  <div class="landingPage">
    <div class="container">