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
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=WvvNwxzxtnEo82ZG0avxlB6q">
	//v1.5版本的引用方式：src="http://api.map.baidu.com/api?v=1.5&ak=您的密钥"
	//v1.4版本及以前版本的引用方式：src="http://api.map.baidu.com/api?v=1.4&key=您的密钥&callback=initialize"
	</script>
	<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
<!-- start-smoth-scrolling -->
</head>
	
<body onLoad="MM_preloadImages('images/7DD4.png','images/7D7B.png')">
<?php
	writeHeader();
	require "component/banner.php";
?>
<!-- blog -->
	<div class="blog">
	<div class="container" id="map" style="height:450px"></div>
	<script type="text/javascript"> 
	var map = new BMap.Map("map");
		var pointCenter = new BMap.Point(121.460704,31.210619);
		var pointBig = new BMap.Point(121.47651,31.224398);
		var pointLittle = new BMap.Point(121.444899,31.196841);
		map.centerAndZoom(pointCenter, 14);
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
	</script> 
	<div class="clearfix"> </div>
	</div>
<!-- //blog -->
	<?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript">
	active("aboutIndicator");
</script>