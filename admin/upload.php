<?php
session_start();
if(!isset($_SESSION["username"])){
	header("location:../index.html");
}
$USER = $_SESSION["username"];
  require("../conf/configure.php");
   require("../conf/HttpClient.class.php");
  $client = new HttpClient(HOST);

if ((!empty($_FILES['file']['tmp_name']))
||(($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
)
  {
  if ($_FILES["file"]["error"] > 0)
    {
   echo "<script language=\"javascript\">location.href = 'javascript:history.back()'</script>";
    }
  else
    {
    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    // echo "Stored in: " . $_FILES["file"]["tmp_name"];
	$_FILES["file"]["name"] = time().$_FILES["file"]["name"];
      
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $_FILES["file"]["name"]);
      $filenpath = "http://".HOST.TEMP_PATH."/upload/".$_FILES["file"]["name"];
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      
      $data["img"] = $filenpath;

// /username/bigyao/title/nihao/content/neirong/type/news
      
      
			// }else{
  	// 			echo $value;//"<script language=\"javascript\">location.href = 'javascript:history.back()'</script>";
			// }

    }
}

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