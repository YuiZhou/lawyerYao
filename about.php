<?php 
  require(".\admin\sessionConf.php");
  require("./conf/configure.php");
  require("./conf/HttpClient.class.php");
  $client = new HttpClient(HOST);
?>
<!DOCTYPE html>
<html>
<head>
  <title>姚律师在线·关于我们</title>
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
      <?php
        if(!$client -> get(LIB_PATH."/Home/index/getUserInfo")){
            echo "网络错误";
          }else{
            $value = $client -> getContent();
            $array = json_decode(trim($value), true);
            if(count($array) != 2){
              echo "网络错误";
            }else{
              $bigYao = $array[0];
              $littleYao = $array[1];
      ?>
      <div class="blog-left">
        <div class="blog-left-text1">
          <img src='<?php echo $bigYao["icon"]; ?>' alt='<?php echo $bigYao["name"]."照片";?>' width="300"/>
          <h5>&nbsp;</h5>
          <h5>
            <span class="text">
              <?php echo $bigYao["name"]; ?>简介</span>
          </h5>
          <p>&nbsp;</p>
          <p>
            <pre  style="margin:1em 0; padding:0; border:none;background-color:transparent;font-size:15px"><?php echo $bigYao["introduction"];?></pre>
          </p>
          <?php if($username == "BigYao"){ ?>
          <div class="msg-right">
            <a href="changeProfile.php">修改个人介绍</a>
          </div>
          <?php }?>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </div>
      </div>
      <div class="blog-right">
        <div class="men-text">
          <p class="text">
            <img src="<?php echo $littleYao["icon"]; ?>
            " width="300"  alt='
            <?php echo $littleYao["name"]."照片";?>'/></p>
          <p>&nbsp;</p>
          <h5>
            <span class="text">
              <?php echo $littleYao["name"]; ?>简介</span>
          </h5>
          <p>&nbsp;</p>
          <p class="blog-left-text">
            <pre  style="margin:1em 0; padding:0; border:none;background-color:transparent;font-size:15px"><?php echo $littleYao["introduction"];?></pre>
          </p>
          <p>&nbsp;</p>
          <?php if($username == "littleYao"){ ?>
          <div class="msg-right">
            <a href="changeProfile.php">修改个人介绍</a>
          </div>
          <?php }?></div>
      </div>
      <?php }}?>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- //blog -->
  <?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript">
  active("aboutIndicator");
</script>