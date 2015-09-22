<?php 
	require(".\sessionConf.php");
	require("../conf/configure.php");
	require("../conf/HttpClient.class.php");
	require("./uploadImg.php");
	$client = new HttpClient(HOST);
	if(!$isAdmin || !isset($_GET["type"])){
		header("Location:..\about.php");
		return;
	}

	$type = $_GET["type"];

	if($type == "introduction"){
		$content = $_POST['introduction'];
	}elseif ($type == "icon") {
		$content = upload_img();
		if(!$content){
			header("Location: ../result.php?res=上传图片失败&url=about.php");
			return;
		}
	}else if($type == "password"){
		$old["username"] = $username;
		$old["password"] = $_POST['old'];

		var_dump($old);
		if(!($value = $client -> quickPost(LIB_PATH."/Admin/index/login", $old)) || $value == "false"){
			header("Location: ../result.php?res=原密码输入错误&url=changeProfile.php");
			return;
		}
		$content = $_POST['password'];
	}else{
		header("Location:..\about.php");
		return;
	}

	$params["username"] = $username;
	$params["key"] = $type;
	$params["value"] = $content;
	 
	$res = $client -> quickPost(LIB_PATH."/Admin/index/updateInfo", $params);

	if($res == "true"){
		$str = "修改成功";
	}else{
		$str = "修改失败";
	}
	// echo $content;
	header("Location: ../result.php?res=".$str."&url=about.php");

?>