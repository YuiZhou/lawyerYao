<?php
	require(".\admin\sessionConf.php");
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
	$reply = false;
	$page = 1;
	$comment = 11;
	$displayCount = 0;
	$limit = $isAdmin ? 5 : 3;
	if ($isAdmin && isset($_GET["comment"])) {
		$reply = true;
		$comment = $_GET["comment"];
	}
	if(isset($_GET["page"])) $page = $_GET["page"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>姚律师在线·在线咨询</title>
	<?php require "component/reference.php";?>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=WvvNwxzxtnEo82ZG0avxlB6q">
//v1.5版本的引用方式：src="http://api.map.baidu.com/api?v=1.5&ak=您的密钥"
//v1.4版本及以前版本的引用方式：src="http://api.map.baidu.com/api?v=1.4&key=您的密钥&callback=initialize"
</script>
	<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
</head>

<body onLoad="MM_preloadImages('images/7DD4.png','images/7D7B.png')">
	<?php
		writeHeader();
		require "component/banner.php";
	?>
	<!-- blog -->
	<div class="blog">
		<div class="container">
			<div class="clearfix"></div>
			<div class="related-posts blog-left">
				<?php if(!$isAdmin){ ?>
				<div id="online2" class="online">
					<div class="comments">
						<h1>在线咨询窗口 YAO'S ONLINE</h1>
						<p>&nbsp;</p>
						<form action="./cgi/comment.php?type=introduction" method="post" >
							<p>
								<input type="hidden" name="page" value="<?php echo $page;?>">
								<input type="text" placeholder="真实姓名" name="comment_name" id="comment_name" required>
								<input type="text" placeholder="Email" name="comment_mail" id="comment_mail" required>
								<input type="text" placeholder="性别" name="comment_gender" id="comment_gender" >
								<input type="text" placeholder="联系电话" name="comment_phone" id="comment_phone" >
								<textarea required placeholder="请留言内容" name="comment_content" id="comment_content"></textarea>
								<input type="submit" value="发送留言"></p>
						</form>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<h1>最新留言Related Comments</h1>
						<p>&nbsp;</p>
					</div>
				</div>
				<?php 
					}

			    	if($reply){
			    		$url = "/Admin/Index/getComment/commentId/".$comment;
			    	}else{
			    		$url = "/Home/index/getGlobalComment/page/".$page."/number/".$limit;
			    	}

			    	$replyUser = "";
			    	$replyMail = "";

					if(!$client -> get(LIB_PATH.$url)){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						$displayCount = count($array);
						foreach ($array as $item) {
							if($reply){
								$replyUser = $item["author"];
								$replyMail = $item["mail"];
							}
			    ?>
				<div class="responses-response-fig responses-mid">
					<div class="response-fig-text">
						<?php if($isAdmin){ ?>
						<p>
							<label>
								<?php echo $item["author"]?></label>
							&nbsp;(
							<?php echo $item["mail"]?>)</p>
						<?php }?>
						<p>
							<label>
								<?php echo $item["date"]?></label>
						</p>
						<pre  style="margin:1em 0; padding:0; border:none;background-color:transparent;font-size:15px" class="paragh"><?php 
		    	echo $item["content"]
		    ?></pre>
						<?php if($isAdmin && !$reply){ ?>
						<a href='./contact.php?comment=<?php echo $item["id"]?>
							' onMouseOut='MM_swapImgRestore()' onMouseOver="MM_swapImage('Image12','','images/7D02.png',1)">回 复
						</a>
						<span>
							<?php if($item["replied"] != false){echo "（已回复）";}?></span>
						<?php }?></div>
					<div class="clearfix"></div>
				</div>
				<?php }}?>

				<?php 
	  	if($reply){
	  ?>
				<div id="online2" class="online">
					<div class="comments">
						<h1>回复留言</h1>
						<p>&nbsp;</p>
						<form action="./cgi/comment.php" method="post" >
							<p>
								<input type="hidden" name="comment_to_id" value="<?php echo $comment; ?>
								" />
								<input type="hidden" name="page" value="<?php echo $page;?>
								" />
								<input type="hidden" name="comment_name" value="<?php echo $replyUser; ?>
								" />
								<input type="hidden" name="comment_mail" value="<?php echo $replyMail; ?>
								" />
								<textarea name="comment_content" required placeholder="回复留言"></textarea>
								<input type="submit" value="发送留言"></p>
						</form>
					</div>
				</div>
				<?php 
				}else{
					?>
				<div class="msg-right">
					<?php if($page >
					1){?>
					<a href="contact.php?page=<?php echo ($page - 1)?>">&lt;&lt; 上一页</a>
					&nbsp;&nbsp;
					<?php }
						if($displayCount == $limit){
					?>
					<a href="contact.php?page=<?php echo ($page + 1)?>">下一页 &gt;&gt;</a>
					<?php }?></div>
				<?php
				}
			?>
				<h6>&nbsp;</h6>
				<h5>&nbsp;</h5>
				<p>&nbsp;</p>
				<div class="clearfix"></div>
			</div>
			<div class="blog-right">
				<div class="categories">
					<h3>
						<img src="images/47568702195725741.jpg" width="300" height="294"  alt=""/>
					</h3>
					<h3>姚允才律师法律工作室</h3>
					<h5>上海龙耀律师事务所</h5>
					<h5>地址：上海市卢湾区雁荡路107号雁荡大厦11楼A座</h5>
					<h5>咨询时间9:00-17:00</h5>
					<h3>姚婕律师法律工作室  &#13;</h3>
					<h5>地址：上海市 漕溪北路&#13; 375号中金国际广场C座19楼 嘉华所</h5>
					<h5>咨询时间9:00-17:00</h5>
					<p>&nbsp;</p>
					<div id="map" style="width:300px; height:300px"></div>
				</div>
				<div class="categories"></div>
			</div>
		</div>
	</div>
	<!-- //blog -->
	<?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript"> 
	var map = new BMap.Map("map");
	var pointCenter = new BMap.Point(121.460704,31.210619);
	var pointBig = new BMap.Point(121.47651,31.224398);
	var pointLittle = new BMap.Point(121.444899,31.196841);
	map.centerAndZoom(pointCenter, 12);
	var markerBig = new BMap.Marker(pointBig);  // 创建标注
	var markerLittle = new BMap.Marker(pointLittle);
	map.addOverlay(markerBig);              // 将标注添加到地图中
	map.addOverlay(markerLittle);

	var labelBig = new BMap.Label("姚律才律师法律工作室",{offset:new BMap.Size(20,-10)});
	markerBig.setLabel(labelBig);
	var labelLittle = new BMap.Label("姚婕律师法律工作室",{offset:new BMap.Size(20,-10)});
	markerLittle.setLabel(labelLittle);

	map.enableScrollWheelZoom(true);

	var contentBig = '<div style="margin:0;line-height:20px;padding:2px;">上海龙耀律师事务所<br/>地址：上海市卢湾区雁荡路107号雁荡大厦11楼A座<br/>咨询时间: 9:00-17:00<br/></div>';
    //创建检索信息窗口对象
    var searchInfoWindowBig = null;
	searchInfoWindowBig = new BMapLib.SearchInfoWindow(map, contentBig, {
			title  : "姚律才律师法律工作室",      //标题
			width  : 290,             //宽度
			height : 105,              //高度
			panel  : "panel",         //检索结果面板
			enableAutoPan : true,     //自动平移
			searchTypes   :[
			]
		});
	markerBig.addEventListener("click", function(e){
    	searchInfoWindowBig.open(markerBig);
	});

	var contentLittle = '<div style="margin:0;line-height:20px;padding:2px;">上海嘉华所<br/>上海市漕溪北路375号中金国际广场C座19楼<br/>咨询时间: 9:00-17:00<br/></div>';
    //创建检索信息窗口对象
    var searchInfoWindowLittle = null;
	searchInfoWindowLittle = new BMapLib.SearchInfoWindow(map, contentLittle, {
			title  : "姚婕律师法律工作室",      //标题
			width  : 290,             //宽度
			height : 105,              //高度
			panel  : "panel",         //检索结果面板
			enableAutoPan : true,     //自动平移
			searchTypes   :[
			]
		});
	markerLittle.addEventListener("click", function(e){
    	searchInfoWindowLittle.open(markerLittle);
	});
	active("contactIndicator");
</script>
<!-- //here ends scrolling icon -->