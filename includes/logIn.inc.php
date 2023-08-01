<?php
if (isset($_POST["submit"])) {

    $username = $_POST["Uid"];
    $pwd = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (EmptyInputLogIn($username, $pwd) !== false) {
        header('Location: http://localhost/LearnPhp/php/logIn.php?error=emptyinput');
        exit();
    }

    loginUser($conn, $username, $pwd);
} else {
    header('Location: http://localhost/LearnPhp/php/logIn.php?error=login');
    exit();
}
