<?php 
session_start();
$username = $_GET["u"];
$_SESSION["username"] = $username;
header("location:../dashboard.php");
?>