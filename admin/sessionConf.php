<?php
	session_start();
	$isAdmin = false;
	$username = "";
	if(isset($_SESSION["username"])){
		$isAdmin = true;
		$username = $_SESSION["username"];
	}
?>