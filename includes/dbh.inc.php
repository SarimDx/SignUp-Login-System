<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dbName = "phpProjectFirst";



$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dbName);


if (!$conn) {
    die("Db Connction problem : " . mysqli_connect_error());
}
