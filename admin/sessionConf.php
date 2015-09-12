<?php
	session_start();
	$isAdmin = false;
	$username = "";
	if(isset($_SESSION["username"])){
		$isAdmin = true;
		$username = $_SESSION["username"];
	}

	$realname = "";
	if(isset($_SESSION["realname"])){
		$realname = $_SESSION["realname"];
	}

	function writeHeader(){
		global $isAdmin;
		global $client;
		global $realname;
		global $username;
		if($isAdmin){
			// getNotificationCount
			///Admin/index/getNotificationCount/username/BigYao
			if($client -> get(LIB_PATH."/Admin/index/getNotificationCount/username/".$username)){
            	$unread = $client -> getContent();
			}
			echo "<p class='header'>&nbsp;&nbsp;你好，".$realname."&nbsp;&nbsp;&nbsp;&nbsp;<a href='dashboard.php'>消息页（".$unread."）</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='edit.php'>发表新文章</a><span style='float:right'><a href='about.php'>个人资料</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=''>登出</a></span></p>";
		}
	}
?>