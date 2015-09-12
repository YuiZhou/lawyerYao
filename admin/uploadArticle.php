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

  $res = upload_img();
  if($res == false){
    $res = NULL;
  }
  $data["img"] = $res;

  if((isset($_POST['type']))
  	&& (isset($_POST["title"]))
  	&& (isset($_POST['content']))){

      $title = $_POST["title"];
      $type = $_POST["type"];
      $content = $_POST["content"];
      $related = $_POST["linkJson"];

      $data["username"] = $USER;
      $data["title"] = $title;
      $data["content"] = $content;
      $data["type"] = $type;


      if( !$client -> quickPost(LIB_PATH."/Admin/index/addNews/", $data)){
  			// 更新失败
        header("Location: ../result.php?res=上传文章&url=edit.php");
        return;
  	  }

      // return the id of article
			$value = $client -> getContent();
      // post link
			header("location:../blog.php");
  }
?>