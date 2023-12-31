<?php

// ? SignUp functions
function EmptyInputSignUp($name, $email, $userName, $pwd, $pwdrepeat)
{
    $result;
    if (empty($name) || empty($email) || empty($userName) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUid($userName)
{
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
// function invalidEmail($email)
// {
//     $result = '';
//     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $result = true;
//     } else {
//         $result = false;
//     }
//     return $result;
// }
function passwordMatch($pwd, $pwdrepeat)
{
    $result = '';
    if ($pwd !==  $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function UidExist($conn, $userName, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: http://localhost/LearnPhp/php/signUp.php?error=stmtfailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email, $userName, $pwd)
{
    $sql = "INSERT INTO users (usersName,usersEmail,usersUid,userspwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: http://localhost/LearnPhp/php/signUp.php?error=stmtfailed');
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $userName, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: http://localhost/LearnPhp/php/signUp.php?error=none');
    exit();
}

// ? logIn functions

function EmptyInputLogIn($userName, $pwd)
{
    $result;
    if (empty($userName) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $userName, $pwd)
{
    $UidExist = UidExist($conn, $userName, $userName);
    if ($UidExist === false) {
        header('Location: http://localhost/LearnPhp/php/logIn.php?error=wronglogin');
        exit();
    }
    $pwdHached = $UidExist["userspwd"];
    $checkPwd = password_verify($pwd, $pwdHached);

    if ($checkPwd === false) {
        header('Location: http://localhost/LearnPhp/php/logIn.php?error=wronglogin');
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION['userid'] = $UidExist["usersId"];
        $_SESSION['useruid'] = $UidExist["usersUid"];
        header('Location: http://localhost/LearnPhp/php/insert.php');
        exit();
    }
}
