<?php
header("X-XSS-Protection: 1; mode=block");

session_start();
error_reporting(0);
unset($_SESSION["username"]);
unset($_SESSION["permit"]);

header("Location:index.php");
?>