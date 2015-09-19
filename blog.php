<?php 
	require(".\admin\sessionConf.php");
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);

	$limit = 5;
	$displayCount = 0;

	$page = 1;
	if(isset($_GET["page"]))
		$page = $_GET["page"];
	$url = LIB_PATH."/Home/index/getLatestCollections/number/".$limit."/page/".$page;

	$title = "最新文章 The Latest";
	if(isset($_GET["type"])){
		$type = $_GET["type"];
		switch ($type) {
			case 'portfolio':
				$title = "经典案例 The Portfolio";
				$url = LIB_PATH."/Home/index/getPortfolioCollections/number/".$limit."/page/".$page;
				break;
			case 'direction':
				$title = "审判指导与参考 The Direction";
				$url = LIB_PATH."/Home/index/getDirectionCollections/number/".$limit."/page/".$page;
				break;
			case 'explosion':
				$title = "法律法规解读 The Explosion";
				$url = LIB_PATH."/Home/index/getExplosionCollections/number/".$limit."/page/".$page;
				break;
			case 'news':
				$title = "最新法律法规 The News";
				$url = LIB_PATH."/Home/index/getNewsCollections/number/".$limit."/page/".$page;
				break;
			default:
				break;
		}
	}
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
					<h1 style="margin-top:0; margin-bottom:25px"><?php echo $title;?></h1>
					<?php
					if(!$client -> get($url)){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						$displayCount = count($array);
						foreach ($array as $item) {
							$id = $item["id"];
					?>
						<div>
							<h4><a href="article.php?p=<?php echo $id;?>"><?php echo $item["title"]?></a></h4>
							<p style="margin:0"><?php echo $item["date"];?></p>
							<p><pre style="margin:1em 0; line-height:30px; padding:0; border:none;background-color:transparent;font-size:16px"><?php echo $item["content"];?></pre></p>
							<p>&nbsp;</p>
						</div>
					<?php 
						}
					} 
					?>			
					<div class="msg-right">
						<?php 
						if($page > 1){
						?>
							<a href="blog.php?type=<?php echo $type;?>&amp;page=<?php echo ($page - 1);?>">&lt;&lt; 上一页</a>
							&nbsp;&nbsp;
						<?php 
						}
						if($displayCount == $limit){
						?>
							<a href="blog.php?type=<?php echo $type;?>&amp;page=<?php echo ($page + 1);?>">下一页 &gt;&gt;</a>
						<?php 
						}
						?>
					</div>
				</div>
			</div>
			<div class="blog-right">
				<div class="categories">
					<?php require "component/search.php";?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //blog -->
	<?php require "component/footer.php"; ?>
</body>
</html>
