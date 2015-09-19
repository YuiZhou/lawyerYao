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
	<title>姚律师在线·文章浏览</title>
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
				<div class="categories">
					<?php
					if(!$client -> get($requestUrl)){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						foreach ($array as $item) {
							$id = $item["id"];
					?>
							<h1><?php echo $item["title"] ?></h1>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<?php 
							if($item["thumb"]!=NULL){
								echo "<img src='".$item["thumb"]."'' style='max-width:640px; max-height:360px;'/>";
							}
							?>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p><pre style="margin:1em 0; line-height:30px; padding:0; border:none;background-color:transparent;font-size:16px"><?php echo $item["content"] ?></pre></p>
					<?php 
						}
					} 
					?>				
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</div>
			</div>
			<div class="blog-right">
				<div class="categories">
					<h3>相关文章关联</h3>
				<ul>
				<?php 
					if(!$client -> get(LIB_PATH."/Home/index/getFriendlyLink/article/$id")){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						foreach ($array as $item) {
				?>
		      <li><a href=<?php echo "'".$item["uri"]."'"; ?> target="_blank"><?php echo $item["title"]?></a></li>
				<?php }} ?>
			  </ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //blog -->
	<?php require "component/footer.php"; ?>
</body>
</html>