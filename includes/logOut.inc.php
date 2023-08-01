<?php
session_start();
session_unset();
session_destroy();
header('Location: http://localhost/LearnPhp/php/insert.php');
exit();
