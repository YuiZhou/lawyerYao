<?php
	require(".\admin\sessionConf.php");
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
	$query = "";
	if(isset($_GET["s"])){
	    $query = $_GET["s"];
	 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>姚律师在线·搜索结果</title>
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
			<div class="blog-left">
				<h1>搜索结果</h1>
				<div class="categories">
					<ul>
						<?php
		    			if( !$client -> get(LIB_PATH."/Home/index/search/key/".$query)){
							echo "网络错误";
						}else{
							$value = $client -> getContent();
							$array = json_decode(trim($value), true);
							foreach ($array as $item) {
						// [{"content":"\u4f60\u597d","id":"23","author":"wo","date":"2015-07-30 20:46:23"}]
		    			?>
						<li>
							<a href='single.php?p=<?php echo $item["id"]?>'><?php echo $item["title"]?></a>
							<br/>
							<?php echo $item["date"]?></li>
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
			<div class="blog-right">
				<div class="categories">
					<?php require "component/search.php";?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //blog -->
	<!-- footer -->
	<?php require "component/footer.php"; ?>
</body>
</html>
	<!-- //here ends scrolling icon -->