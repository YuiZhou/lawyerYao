<?php 
  require(".\admin\sessionConf.php");
  require("./conf/configure.php");
  require("./conf/HttpClient.class.php");
  $client = new HttpClient(HOST);
?>
<!DOCTYPE html>
<html>
<head>
	<title>姚律师在线</title>
		<?php require "component/reference.php";?>
</head>

<body onLoad="MM_preloadImages('images/7DD4.png','images/7D7B.png')">
	<?php
		writeHeader();
		require "component/banner.php";
	?>
	<!-- //banner -->
	<!-- blog -->
	<div class="blog">
		<div class="container">
			<div class="clearfix"></div>
			<h1><?php 
				echo $_GET["res"];

				$url = isset($_GET["url"]) ? $_GET["url"] : "./index.html";
			?></h1>
			<div class="msg-right">
				<a href='<?php echo $url?>'>点击返回</a>
			</div>
		</div>
	</div>
	<!-- //blog -->
	<!-- footer -->
	<?php require "component/footer.php"; ?>
</body>
</html>
<!-- //footer -->