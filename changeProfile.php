<?php 
  require(".\admin\sessionConf.php");
  require("./conf/configure.php");
  require("./conf/HttpClient.class.php");
  $client = new HttpClient(HOST);
  if(!$isAdmin){
    header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>姚律师在线·更改资料</title>
  <?php require "component/reference.php";?>
</head>

<body onLoad="MM_preloadImages('images/7DD4.png','images/7D7B.png')">
<?php
    writeHeader();
    require "component/banner.php";
?>
  <!-- blog -->
  <div class="blog">
    <div class="container">
    <form action="./admin/updateProfile.php?type=icon" class="comments" method="post" enctype="multipart/form-data" >
        <p>
          <input type="file" name="file" />
          <input type="submit" value="更新图片"></p>
      </form>
      <form action="./admin/updateProfile.php?type=introduction" class="comments" method="post" >
        <p>
          <textarea required placeholder="输入个人介绍" name="introduction" id="introduction"></textarea>
          <input type="submit" value="更改个人信息"></p>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- //blog -->
  <!-- footer -->
  <?php require "component/footer.php"; ?>
</body>
</html>