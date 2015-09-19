<?php 
	require("../conf/configure.php");
	require("../conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
	$username = $_POST["username"];
	$password = $_POST["password"];


	$data["username"] = $username;
	$data["password"] = $password;

// $value = "姚允才律师";
	// var_dump($data);
	// $client->setDebug(true);
	if(!($value = $client -> quickPost(LIB_PATH."/Admin/index/login", $data))){
		// 更新失败
		// echo HOST.LIB_PATH."/Admin/index/login";
		// echo $client -> getError();
		// var_dump($data);
		// echo $value;
		header("Location: ../result.php?res=网络连接错误，登录失败&url=login.php");
		return;
	}

	// echo "content is :".$value;
	if($value == "false"){
		header("Location: ../result.php?res=登录失败&url=login.php");
		return;
	}else{
		session_start();
		$_SESSION["username"] = $username;
		$_SESSION["realname"] = $value;
		header("location:../dashboard.php");
	}


	
?>