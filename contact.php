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
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.useso.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.useso.com/css?family=Merriweather:400,400italic,300,300italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<script src="js/jquery.min.js"></script>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Flatter Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

	<!-- //for-mobile-apps -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=WvvNwxzxtnEo82ZG0avxlB6q">
//v1.5版本的引用方式：src="http://api.map.baidu.com/api?v=1.5&ak=您的密钥"
//v1.4版本及以前版本的引用方式：src="http://api.map.baidu.com/api?v=1.4&key=您的密钥&callback=initialize"
</script>
	<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
</head>
	<script type="application/x-javascript">
addEventListener("load", function() {
    setTimeout(hideURLbar, 0);
}, false);

function hideURLbar() {
    window.scrollTo(0, 1);
}
</script>
	<script type="text/javascript">
jQuery(document).ready(function($) {
    $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });
});
function MM_swapImgRestore() { //v3.0
    var i, x, a = document.MM_sr;
    for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
}
function MM_preloadImages() { //v3.0
    var d = document;
    if (d.images) {
        if (!d.MM_p) d.MM_p = new Array();
        var i, j = d.MM_p.length,
            a = MM_preloadImages.arguments;
        for (i = 0; i < a.length; i++)
            if (a[i].indexOf("#") != 0) {
                d.MM_p[j] = new Image;
                d.MM_p[j++].src = a[i];
            }
    }
}

function MM_findObj(n, d) { //v4.01
    var p, i, x;
    if (!d) d = document;
    if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
        d = parent.frames[n.substring(p + 1)].document;
        n = n.substring(0, p);
    }
    if (!(x = d[n]) && d.all) x = d.all[n];
    for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
    for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
    if (!x && d.getElementById) x = d.getElementById(n);
    return x;
}
function MM_swapImage() { //v3.0
	var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   	if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function trim(str){ //删除左右两端的空格
　	return str.replace(/(^\s*)|(\s*$)/g, "");
}
function isEmail(str) {
    var reg = /^([a-zA-Z0-9_-.])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    return reg.test(str);
}
function check(form) {
    if (trim(form.comment_name.value) == '') {
        form.comment_name.value = "";
        return false;
    }
    mail = trim(form.comment_mail.value);
    if (mail == '' || !isEmail(mail)) {
        form.comment_mail.value = "";
        return false;
    }

    if (trim(form.comment_content.value) == "") {
        form.comment_content.value = "";
        return false;
    }
    return true;
}
</script>
	<style type="text/css">
	body,td,th {
		font-family: "Open Sans", sans-serif;
	}
	a:hover {
		color: #054C4B;
	}
	h1 {
		color: rgba(5,76,75,1);
	}
	h5 {
		color: rgba(5,76,75,1);
	}
</style>
	<!-- start-smoth-scrolling -->

<body onLoad="MM_preloadImages('images/7DD4.png','images/7D7B.png')">
	<?php
		writeHeader();
	?>
	<!-- banner -->
	<div class="banner1">
		<div class="container">
			<div class="navi">
				<div class="head-logo">
					<div class="logo">
						<p>
							<a href="index.html">
								<img src="images/logo.png" width="90" height="104" alt=""/>
								<img src="images/title.png" width="370" height="74" alt=""/>
							</a>
						</p>
						<h4>
							<span class="para">· Yao’s Law Office ·</span>
							前一刻求解无门，后一刻豁然开朗
							<span class="para">·</span>
						</h4>
					</div>
					<p>
						<a href="about2.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/7DD4.png',1)">
							<img src="images/7DD4.tm.png" alt="" width="47" height="58" id="Image5"></a>
						<a href="online.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/7D7B.png',1)">
							<img src="images/7D7B.tm.png" alt="" width="46" height="58" id="Image6"></a>
					</p>
					<div class="clearfix"></div>
				</div>
				<div class="top-nav">
					<span class="menu">
						<img src="images/menu.png" alt="" />
					</span>
					<ul class="nav1">
						<li>
							<a href="main.html">综合首页</a>
						</li>
						<li>
							<a href="blog.html">最新动态</a>
						</li>
						<li>
							<a href="frame.html" class="active">在线咨询</a>
						</li>
						<li>
							<a href="portfolio.html">经典案例</a>
						</li>
						<li>
							<a href="about.html">
								<span class="para">
									<img src="images/row.png" width="121" height="54"  alt=""/>
									<img src="images/row.png" width="121" height="54"  alt=""/>
								</span>
								关于我们
							</a>
						</li>
					</ul>
					<script> 
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							
					</script>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- blog -->
	<div class="blog">
		<div class="container">
			<div class="clearfix"></div>
			<div class="related-posts blog-left">
				<?php if(!$isAdmin){ ?>
				<div id="online2" class="online">
					<div class="comments">
						<h1>
							<a name="“online”">在线咨询窗口 YAO'S ONLINE</a>
						</h1>
						<p>&nbsp;</p>
						<form action="./cgi/comment.php?type=introduction" method="post" >
							<p>
								<input type="hidden" name="page" value="<?php echo $page;?>
								">
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

					if(!$client ->
				get(LIB_PATH.$url)){
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
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<div class="msg">
					<span></span>
				</div>
				<div class="msg-right">
					<a href="frame.html">联系我们</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="footer-middle">
				<ul>
					<li>
						<a href="frame.html" class="dri"></a>
					</li>
					<li>
						<a href="frame.html" class="v1"></a>
					</li>
					<li>
						<a href="frame.html" class="twit"></a>
					</li>
				</ul>
			</div>
			<div class="footer-right">
				<p>Copyright &copy; 2015 姚律师在线</p>
				<p>
					All rights reserved. Learabesques
					<a href="http://www.cssmoban.com/" ></a>
					Studio
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</body>
</html>
<!-- //footer -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function() {
		/*
		var defaults = {
  			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
 		};
		*/
		
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
	function replyRestore(str){
		MM_swapImgRestore();
	}
</script>
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
</script>
<!-- //here ends scrolling icon -->