<?php
	require(".\admin\sessionConf.php");
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
	if(!$isAdmin){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>姚律师在线·消息查看</title>
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
				<h1>待处理的消息</h1>
				<div class="categories">
					<ul>
						<?php
		    			if( !$client -> get(LIB_PATH."/Admin/Index/getNotification/username/".$username)){
							echo "网络错误";
						}else{
							$value = $client -> getContent();
							$array = json_decode(trim($value), true);
							foreach ($array as $item) {
						// [{"content":"\u4f60\u597d","id":"23","author":"wo","date":"2015-07-30 20:46:23"}]
		    			?>
						<li>
							<a href='admin/read.php?id=<?php echo $item["id"]?>'><?php echo $item["author"].":&nbsp;".$item["content"]?></a>
							<br/>
							<?php echo $item["date"]?>
							<span style="float:right; cursor:pointer" onclick='read(<?php echo $item["id"]?>,<?php echo "\""."$username"."\""?>)'>标为已读</span></li>
							<?php 
							}
						}
						?>
					</ul>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //blog -->
	<!-- footer -->
	<!-- footer -->
	<?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript">
	function read(id, username){
		$.get("http://localhost/yao/thinkphp/index.php/Admin/Index/readNotification/username/"+username+"/commentId/"+id);
	}
</script>
	<!-- //here ends scrolling icon -->