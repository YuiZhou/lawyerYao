<?php
	require(".\admin\sessionConf.php");
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
	$query = "";
	if(isset($_GET["p"]))
		$id = $_GET["p"];
	$requestUrl = empty($id) ? 	LIB_PATH."/Home/index/getDirectionCollections/number/1/length/500" : LIB_PATH."/Home/index/getNews/newsId/".$id;
?>
<!DOCTYPE html>
<html>
<head>
	<title>姚律师在线·最新动态</title>
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
				<div class="blog-left-text">
		  			<h3><a href="blog.php?type=news"> 最新法律法规&nbsp;The News</a></h3>
		  			<?php
					if(!$client -> get(LIB_PATH."/Home/index/getNewsCollections/number/1")){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						$displayCount = count($array);
						foreach ($array as $item) {
							$id = $item["id"];
							if($item["thumb"] != ""){
					?>
		  			<h4><img src="<?php echo $item["thumb"]?>" alt=" " /></h4>
		  			<?php }?>
		  			<h4><a href="article.php?p=<?php echo $id;?>"><?php echo $item["title"];?></a></h4>
					<p><pre style="margin:1em 0; line-height:30px; padding:0; border:none;background-color:transparent;font-size:16px"><?php echo $item["content"];?></pre></p>
					<?php 
						}
					}
					?>
					<p>&nbsp;</p>
					<h4><a href="blog.php?type=news">更多文章&gt;&gt;</a></h4>
				</div>
				<div class="blog-left-text blog-left-text-mid">
					<h1><a href="blog.php?type=explosion"> 法律法规解读&nbsp;EXPLOSION</a></h1>
					<?php
					if(!$client -> get(LIB_PATH."/Home/index/getExplosionCollections/number/1")){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						$displayCount = count($array);
						foreach ($array as $item) {
							$id = $item["id"];
							if($item["thumb"] != ""){
					?>
		  			<h4><img src="<?php echo $item["thumb"]?>" alt=" " /></h4>
		  			<?php }?>
		  			<h4><a href="article.php?p=<?php echo $id;?>"><?php echo $item["title"];?></a></h4>
					<p><pre style="margin:1em 0; line-height:30px; padding:0; border:none;background-color:transparent;font-size:16px"><?php echo $item["content"];?></pre></p>
					<?php 
						}
					}
					?>
					<p>&nbsp;</p>
					<h4><a href="blog.php?type=explosion">更多文章&gt;&gt;</a></h4>
				</div>
			</div>
			<div class="blog-right">
				<div class="blog-right1">
					<?php require "component/search.php";?>
				</div>
		 		<h3>&nbsp;</h3>
				<div class="recent">
					<h3><a href="blog.php?type=direction">审判指导与参考</a></h3>
					<div class="fig-txt">
						<?php
						if(!$client -> get(LIB_PATH."/Home/index/getDirectionCollections/number/3")){
							echo "网络错误";
						}else{
							$value = $client -> getContent();
							$array = json_decode(trim($value), true);
							$displayCount = count($array);
							foreach ($array as $item) {
								$id = $item["id"];
						?>
						<img src="<?php echo $item["thumb"];?>" width="300px" alt=""/>
						<h5><a href="article.php?p=<?php echo $id;?>"><?php echo $item["title"];?></a></h5>
						<p><label><?php echo $item["date"];?></label></p>
					    <p><?php echo $item["content"];?></p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					    <?php }}?>
				    </div>
				 	<h5><span class="text"><a href="blog.php?type=direction">更多文章&gt;&gt;</a></span></h5>
					<div class="clearfix"> </div>
				</div>
			</div>	
	  		<div class="categories">
			<h3>&nbsp;</h3>
		  </div>
	  </div>
		<div class="clearfix"> </div>
	</div>
	<!-- //blog -->
	<?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript">
	active("latestIndicator");
</script>