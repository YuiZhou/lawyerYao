<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['realname']);
session_destroy();
header("Location: ../login.php")
?>