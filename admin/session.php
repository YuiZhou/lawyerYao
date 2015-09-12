<?php 
session_start();
$username = $_GET["username"];
$_SESSION["username"] = $username;
$realname = $_GET["realname"];
$_SESSION["realname"] = $realname;
header("location:../dashboard.php");
?>