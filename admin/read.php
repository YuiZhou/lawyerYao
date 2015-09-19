<?php
	require(".\sessionConf.php");
	require("../conf/configure.php");
	require("../conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
	if(!$isAdmin || !isset($_GET["id"])){
		header("Location:..\index.php");
		return;
	}

	$commentId = $_GET["id"];

	if( !$client -> get(LIB_PATH."/Admin/Index/getComment/commentId/".$commentId)){
		header("location:../dashboard.php");
	}else{
		$value = $client -> getContent();
		$item = json_decode(trim($value), true);
		// {"id":"3","for_news":"1","for_comment":null,"author":"a","mail":"a","content":"a","date":"2015-07-25 16:00:58"
		if($item["for_news"] == NULL){
			header("location:../contact.php?comment=$commentId");
		}else{
			header("location:../single.php?p=".$item["for_news"]);
		}

		$client -> get(LIB_PATH."/Admin/Index/readNotification/username/".$USER."/commentId/".$commentId);
	}

?>