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
    <div class="blog-left">
    <form action="./admin/updateProfile.php?type=icon" class="comments" method="post" enctype="multipart/form-data" >
        <p>
          <input type="file" name="file" />
          <input type="submit" value="更新图片"></p>
      </form>
      <form action="./admin/updateProfile.php?type=introduction" class="comments" method="post" >
        <p>
          <textarea required placeholder="输入个人介绍" name="introduction" id="introduction"></textarea>
          <input type="submit" value="更改个人信息" style="min-width:150px"></p>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="clearfix"></div>
    </div>
    <div class="blog-right">
      <h1>修改密码</h1>
      <form action="./admin/updateProfile.php?type=password" class="comments" method="post"  onsubmit="return check(this);">
        <p>
          <input type="password" name="old" placeholder="旧密码" style="margin:10px 0" />        
          <input type="password" name="password" placeholder="新密码" style="margin: 10px 0"/>        
          <input type="password" name="confirm" placeholder="密码确认" style="margin: 10px 0"/>        
          <input type="submit" value="更改密码" style="min-width:100px"></p>
      </form>
    </div>
    </div>
  </div>
  <!-- //blog -->
  <!-- footer -->
  <?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript">
  function check(form){
      if(form.password.value != form.confirm.value){
        alert("新密码和确认密码不一致");
        return false;
      }
      return true;
  }

</script>