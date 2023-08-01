<?php



if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["Uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (EmptyInputSignUp($name, $email, $userName, $pwd, $pwdrepeat) !== false) {
        header('Location: http://localhost/LearnPhp/php/signUp.php?error=emptyinput');
        exit();
    }
    if (invalidUid($userName) !== false) {
        header('Location: http://localhost/LearnPhp/php/signUp.php?error=invalidUid');
        exit();
    }
    if (UidExist($conn, $userName, $email) !== false) {
        header('Location: http://localhost/LearnPhp/php/signUp.php?error=userNameTaken');
        exit();
    }
    // if (invalidEmail($email) !== false) {
    //     header('Location: http://localhost/LearnPhp/php/signUp.php?error=invalidEmail');
    //     exit();
    // }
    // if (invalidPassword($pwd) !== false) {
    //     header('Location: http://localhost/LearnPhp/php/signUp.php?error=invalidEmail');
    //     exit();
    // }
    if (passwordMatch($pwd, $pwdrepeat) !== false) {
        header('Location: http://localhost/LearnPhp/php/signUp.php?error=passwordMustMatch');
        exit();
    }

    createUser($conn, $name, $email, $userName, $pwd);
} else {
    header('Location: http://localhost/LearnPhp/php/signUp.php');
    exit();
}
