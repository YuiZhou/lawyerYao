<?php
  require(".\sessionConf.php");
  require("../conf/configure.php");
  require("../conf/HttpClient.class.php");
  require("./uploadImg.php");
  $client = new HttpClient(HOST);
  if(!$isAdmin){
    header("Location:..\index.php");
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

      $data["username"] = $username;
      $data["title"] = $title;
      $data["content"] = $content;
      $data["type"] = $type;
      $data["related"] = $related;
// var_dump($data);
      if(!($value = $client -> quickPost(LIB_PATH."/Admin/index/addNews/", $data))){
  			// 更新失败
        header("Location: ../result.php?res=网络连接错误，上传文章失败&url=edit.php");
        return;
  	  }

      // return the id of article
			// $value = $client -> getContent();
      // post link

      // echo "content is :".$value;
      if($value == "true"){
        header("location:../blog.php");
      }else{
        header("Location: ../result.php?res=上传文章失败&url=edit.php");
      }
  }
?>