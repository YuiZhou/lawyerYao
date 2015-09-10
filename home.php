<!DOCTYPE html>
<?php 
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
?>
<html>
<head>
		<title>姚律师在线·综合首页</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.useso.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.useso.com/css?family=Merriweather:400,400italic,300,300italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<style type="text/css">
		body,td,th {
	font-family: "Open Sans", sans-serif;
}
a:link {
	color: #054C4B;
}
a:hover {
	color: #0A7A78;
}
        h1 {
	color: rgba(5,76,75,1);
}
h2 {
	color: rgba(5,76,75,1);
}
h3 {
	color: rgba(5,76,75,1);
}
h4 {
	color: rgba(255,255,255,1);
}
h5 {
	color: rgba(5,76,75,1);
}
h6 {
	color: rgba(5,76,75,1);
}
        </style>
		<!-- js -->
		<script src="js/jquery.min.js"></script>
		<!-- //js -->
		<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Flatter Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
				function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //for-mobile-apps -->
		<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
        </script>
<!-- start-smoth-scrolling -->
</head>
	
<body onLoad="MM_preloadImages('images/7DD4.png','images/7D7B.png')">
<!-- banner -->
	<div class="banner1">
	<div class="container">
	  <div class="navi">
		  <div class="head-logo">
				<div class="logo">
				  <p><a href="index.html"><img src="images/logo.png" width="90" height="104" alt=""/><img src="images/title.png" width="370" height="74" alt=""/></a></p>
					<h4><span class="para">· Yao’s Law Office · </span>前一刻求解无门，后一刻豁然开朗<span class="para"> · </span>				</h4>
				</div>
			<p><a href="about2.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/7DD4.png',1)"><img src="images/7DD4.tm.png" alt="" width="47" height="58" id="Image5"></a><a href="online.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/7D7B.png',1)"><img src="images/7D7B.tm.png" alt="" width="46" height="58" id="Image6"></a></p>
        <div class="clearfix"> </div>
			</div>
			<div class="top-nav">
				<span class="menu"><img src="images/menu.png" alt="" /></span>
					<ul class="nav1">
						<li><a href="main.html" class="active">综合首页</a></li>
						<li><a href="blog.html" class="active"></a><a href="blog.html">最新动态</a></li>
						<li><a href="frame.html">在线咨询</a></li>
						<li><a href="portfolio.html">经典案例</a></li>
						<li><a href="about.html">关于我们</a></li>
					</ul>
					<script> 
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							
					</script>
		  </div>
			<div class="clearfix">
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
            </div>
		</div>
	  <!-- //banner -->
<!-- blog --></div>
	</div>
	<div class="blog">
	<div class="container">
	  <div class="blog-left">
		<div class="blog-left-text">
          <video width="570" height="340" preload="auto" controls autoplay loop >
            <source src="video/test.mp4" type="video/mp4">
          </video>
          <div class="fig-txt">
            <div class="clearfix">
              <div class="blog-left-text blog-left-text-mid">
                <h1>最新动态</h1>
                <?php if( !$client -> get(LIB_PATH."/Home/index/getLatestCollections/number/3")){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						foreach ($array as $item) {
				?>
                <div class="fig-txt">
                  <div class="fig-txt-fig"><img src='<?php echo $item["thumb"]?>' width="500" height="211"  alt=""/></div>
                  <p>
                    <label><?php echo $item["date"]?></label>
                  </p>
                  <h4><a href="single.html"><?php echo $item["title"]?></a></h4>
                  <p><span class="text"><?php echo $item["content"]?></span></p>
                  <div class="clearfix"> </div>
                </div>
                <?php }}?>
                <p><span class="text"><a href="frame.html">更多文章&gt;&gt;</a></span></p>
              <div class="fig-txt-text">
                <div class="blog-right1">
                  <div class="search">
                    <h3>关键词检索SEARCH</h3>
                    <form>
                      <input type="text" placeholder="搜索..." required>
                      <input name="searchKey" type="submit" id="searchKey" value="确认搜索">
                    </form>
                  </div>
                </div>
            </div>
            </div>
            </div>
          </div>
		</div>
	  </div>
	  <div class="blog-right">
	    <h1 style="margin-top: 10px;"><span class="text"><img src="images/yao.png" width="310" height="464"  alt=""/></span></h1>
		<div class="men-text">
		  <div class="clearfix"></div>
			<h1 class="text">关于姚律师</h1>
	    </div>
		<div class="men-text men-text-mid">
		  <div class="clearfix"></div>
		  <p class="text">Cum sociis natoque penatibus et magnis dis parturient montes,nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. </p>
	    </div>
	  </div>
	  <div class="blog-right">
	    <div class="recent">
	      <h1><a href="single.html">经典案例展示</a></h1>
	      <div class="fig-txt">
	        <div class="fig-txt-fig"><img src="images/s-1.jpg" width="450" height="200"  alt=""/></div>
	        <div class="fig-txt-text">
	          <p>
	            <label>June 31,2015 at 12:30pm</label>
              </p>
	          <h5><a href="single.html">文章标题</a><a href="single.html">文章标题</a><a href="single.html">文章标题</a></h5>
	          <p><span class="text">Cum sociis natoque penatibus et magnis dis parturient montes,nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. </span></p>
            </div>
	        <div class="clearfix"> </div>
          </div>
	      <div class="fig-txt fig-txt-mid">
	        <div class="fig-txt-fig"><img src="images/s-1.jpg" width="450" height="200"  alt=""/></div>
	        <div class="fig-txt-text">
	          <p>
	            <label>June 31,2015 at 12:30pm</label>
              </p>
	          <h5><a href="single.html">文章标题</a><a href="single.html">文章标题</a><a href="single.html">文章标题</a></h5>
	          <p><span class="text">Cum sociis natoque penatibus et magnis dis parturient montes,nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. </span></p>
            </div>
	        <div class="clearfix"> </div>
          </div>
	      <div class="fig-txt">
	        <div class="fig-txt-fig"></div>
	        <p>&nbsp;</p>
	        <p><span class="fig-txt-fig"><img src="images/s-1.jpg" width="450" height="200"  alt=""/></span></p>
	        <div class="fig-txt-text">
	          <p>
	            <label>June 31,2015 at 12:30pm</label>
              </p>
	          <h5><a href="single.html">文章标题</a><a href="single.html">文章标题</a><a href="single.html">文章标题</a></h5>
	          <p><span class="text">Cum sociis natoque penatibus et magnis dis parturient montes,nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. </span></p>
	          <p>&nbsp;</p>
	          <h5><span class="text"><a href="frame.html">更多文章&gt;&gt;</a></span></h5>
            </div>
	        <div class="clearfix"> </div>
          </div>
        </div>
	    <div class="categories">
	      <h3>&nbsp;</h3>
        </div>
      </div>
	  <div class="clearfix"> </div>
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
			<div class="clearfix"> </div>
		</div>
		<div class="footer-middle">
			<ul>
				<li><a href="frame.html" class="dri"> </a></li>  
				<li><a href="frame.html" class="v1"> </a></li>  
				<li><a href="frame.html" class="twit"> </a></li> 
			</ul>
		</div>
		<div class="footer-right">
			<div class="footer-right">
			  <p>Copyright &copy; 2015 姚律师在线</p>
              <p> All rights reserved. Learabesques<a href="http://www.cssmoban.com/" ></a> Studio</p>
			</div>
			<p>&nbsp;</p>
		</div>
		<div class="clearfix"> </div>
	</div>
	</div>
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
	</script>
<!-- //here ends scrolling icon -->