<?php 
  require(".\admin\sessionConf.php");
  if($isAdmin){
  	header("Location: dashboard.php");
  }
  require("./conf/configure.php");
  require("./conf/HttpClient.class.php");
  $client = new HttpClient(HOST);
?>
<!DOCTYPE html>
<html>
<head>
	<title>姚律师在线·登录</title>
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
			<div id="online" class="online">
				<div class="comments">
					<p>&nbsp;</p>
					<a name=“online”>
						<h1>登录</h1>
					</a>

					<form id="form" action = "admin/session.php" method="POST" enctype="multipart/form-data">
						<p>
							<select name="username">
							<?php
								if(!$client -> get(LIB_PATH."/Admin/index/getUsers")){
									echo "网络错误";
								}else{
									$value = $client -> getContent();
									$array = json_decode(trim($value), true);
									$displayCount = count($array);
									foreach ($array as $item) {
							?>
								<option value="<?php echo $item["username"]?>"><?php echo $item["name"]?></option>
								<?php }}?>
							</select>
							<input style="margin: 10px 0" type="password" placeholder="密码" name="password" id="password" required>
							<input type="submit" id="submit" value="登录"></p>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //blog -->
	<?php require "component/footer.php"; ?>
</body>
</html>