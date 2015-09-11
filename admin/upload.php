<?php
require 'uploadImg.php';
session_start();
if(!isset($_SESSION["username"])){
	header("location:../index.html");
}
$USER = $_SESSION["username"];
  require("../conf/configure.php");
   require("../conf/HttpClient.class.php");
  $client = new HttpClient(HOST);

$res = upload_img();
if(!$res){
  echo "
<script language=\"javascript\">location.href = 'javascript:history.back()'</script>
";
}
$data["img"] = upload_img();

if((isset($_POST['type']))
	&& (isset($_POST["title"]))
	&& (isset($_POST['content']))){

	$title = $_POST["title"];
      $type = $_POST["type"];
      $content = $_POST["content"];

	$data["username"] = $USER;
      $data["title"] = $title;
      $data["content"] = $content;
      $data["type"] = $type;


      if( !$client -> quickPost(LIB_PATH."/Admin/index/addNews/", $data)){
  			echo "<script language=\"javascript\">location.href = 'javascript:history.back()'</script>";
	  }else{
			$value = $client -> getContent();
			// if($value == "true"){
				header("location:../blog.php");
	}

  }
?>