<?php
session_start();
if(!isset($_SESSION["username"])){
	header("location:../index.html");
}
$USER = $_SESSION["username"];

if(!isset($_GET["id"])){
	header("location:../dashboard.php");
}

$commentId = $_GET["id"];

require("../conf/configure.php");
require("../conf/HttpClient.class.php");
$client = new HttpClient(HOST);

if( !$client -> get(LIB_PATH."/Admin/Index/getComment/commentId/".$commentId)){
	header("location:../dashboard.php");
}else{
	$value = $client -> getContent();
	$item = json_decode(trim($value), true);
	// {"id":"3","for_news":"1","for_comment":null,"author":"a","mail":"a","content":"a","date":"2015-07-25 16:00:58"
	if($item["for_news"] == NULL){
		$_SESSION['commentJson']=$item;
		header("location:../online.php");
	}else{
		header("location:../single.php?p=".$item["for_news"]);
	}

	$client -> get(LIB_PATH."/Admin/Index/readNotification/username/".$USER."/commentId/".$commentId);
}

?>