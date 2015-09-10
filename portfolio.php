<!DOCTYPE html>
<html>
<?php 
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
?>
<head>
		<title>姚律师在线</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.useso.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.useso.com/css?family=Merriweather:400,400italic,300,300italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
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
        </style>
		<!-- js -->
		<script src="js/jquery.min.js"></script>
		<!-- //js -->
		<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	
<body onLoad="MM_preloadImages('images/7DD4.png','images/7D7B.png','images/7D1D.png')">
<!-- banner -->
	<div class="banner1">
	<div class="container">
		<div class="navi">
			<div class="head-logo">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" width="121" height="140" alt=""/><img src="images/title.png" width="461" height="87" alt=""/></a>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/7DD4.png',1)"><img src="images/7DD4.tm.png" alt="" width="47" height="55" id="Image6"></a><a href="online.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','images/7D7B.png',1)"><img src="images/7D7B.tm.png" alt="" width="46" height="56" id="Image7"></a><a href="online.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','images/7D1D.png',1)"><img src="images/7D1D.tm.png" alt="" width="143" height="56" id="Image8"></a>
			  <p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class="clearfix"> </div>
			</div>
			<div class="top-nav">
				<span class="menu"><img src="images/menu.png" alt="" /></span>
					<ul class="nav1">
						<li><a href="index.html">综合首页</a></li>
						<li><a href="blog.php">法律动态</a></li>
						<li><a href="search.php">检索咨询</a></li>
						<li><a href="portfolio.php" class="active">经典案例</a></li>
					</ul>
					<script> 
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							
					</script>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
<!-- //banner -->
<!-- portfolio -->
	<div id="portfolio" class="portfolio">
	<!-- Portfolio Starts Here -->
	<div class="portfolios entertain_box  wow fadeInUp" data-wow-delay="0.4s" id="project">
		<div class="container">
			<div class="portfolio-info">
<h1>经典案例荟萃</h1>
<h1>THE	CLASSICAL	FOLDER </h1>
				<div class="strip"></div>
		  </div>
		</div>
					<ul id="filters" class="clearfix">
					<?php 
					if( !$client -> get(LIB_PATH."/Home/index/getPortfilioType")){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						?>
						<li><span class="filter active" data-filter='<?php 
						foreach ($array as $item) {
							echo $item["id"]." ";
						}
						?>'>全部 ALL</span></li>
						<?php 
						foreach ($array as $item) {
				?>
							<li><span class="filter" data-filter='<?php echo $item["id"]?>'><?php echo $item["name"]?></span></li>
							<?php }?>
					</ul>
		
					<div id="portfoliolist">
					<?php 
						foreach ($array as $item) {
							$id = $item["id"];
							if( !$client -> get(LIB_PATH."/Home/index/getPortfilioImg/id/".$id)){
								echo "网络错误";
							}else{
								$value = $client -> getContent();
								$imgArray = json_decode(trim($value), true);
								foreach ($imgArray as $img) {
					?>
						<div class='portfolio <?php echo $id; ?> mix_all' data-cat=<?php echo $id; ?> style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a href='<?php echo $img["url"]; ?>' class="b-link-stripe b-animate-go   swipebox"  title="">
								<img class="img-responsive" src='<?php echo $img["url"]; ?>' />
								<div class="b-wrapper">
								<h2 class="b-animate b-from-left    b-delay03 ">
									<img class="img-responsive" src="images/e.png" class="zoom" alt=""/>
								</h2>
								</div></a>
							</div>
						</div>
						<?php 
							}}}}
						?>				
						<div class="clearfix"></div>
					</div>
		
	</div>
			<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
				<!-- Portfolio Ends Here -->
				<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
					<script type="text/javascript">
					$(function () {
						var filterList = {
							init: function () {
								// MixItUp plugin
							// http://mixitup.io
							$('#portfoliolist').mixitup({
								targetSelector: '.portfolio',
								filterSelector: '.filter',
								effects: ['fade'],
								easing: 'snap',
								// call the hover effect
								onMixEnd: filterList.hoverEffect()
							});	
						},
						hoverEffect: function () {
							// Simple parallax effect
							$('#portfoliolist .portfolio').hover(
								function () {
									$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
									$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
								},
								function () {
									$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
									$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
								}		
							);				
						}
					};
					// Run the show!
						filterList.init();
					});	
					</script>
	</div>
<!-- //portfolio -->

<!-- //portfolio -->
<!-- footer -->
	<div class="footer">
	<div class="container">
		<div class="footer-left">
			<div class="msg">
				<span></span>
			</div>
			<div class="msg-right">
				<a href="#">联系我们</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="footer-middle">
			<ul>
				<li><a href="#" class="dri"> </a></li>  
				<li><a href="#" class="v1"> </a></li>  
				<li><a href="#" class="twit"> </a></li> 
			</ul>
		</div>
		<div class="footer-right">
		  <p>Copyright &copy; 2015 姚律师在线</p>
          <p> All rights reserved. Learabesques<a href="http://www.cssmoban.com/" ></a> Studio</p>
		</div>
		<div class="clearfix"> </div>
	</div>
	</div>
<!-- //footer -->