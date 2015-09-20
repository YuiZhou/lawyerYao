<?php
	require(".\admin\sessionConf.php");
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
?>
<!DOCTYPE html>
<html>
<head>
	<title>姚律师在线·经典案例</title>
	<?php require "component/reference.php";?>
</head>

<body onLoad="MM_preloadImages('images/7DD4.png','images/7D7B.png')">
	<?php
		writeHeader();
		require "component/banner.php";
	?>
	<!-- blog -->
	<!-- portfolio -->
	<div id="portfolio" class="portfolio">
	<!-- Portfolio Starts Here -->
		<div class="portfolios entertain_box  wow fadeInUp" data-wow-delay="0.4s" id="project">
			<div class="container"></div>
			<ul id="filters" class="clearfix">
	 		<li>
		    	<h2><span class="filter active" data-filter="app card icon web">经典案例荟萃 THE CLASSICAL FOLDER</span></h2>
			</li>
			</ul>
			<div class="container">
				<?php 
					if( !$client -> get(LIB_PATH."/Home/index/getPortfolioCollections/number/9")){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						foreach ($array as $item) {
				?>
				<div class="blog-left" style="float:left; width:33%">
					<div class="categories">
						
						<p><a href="article.php?p=<?php echo $item["id"];?>"><img src="<?php echo $item["thumb"];?>" width="300px" height="180px;" overflow="hidden" title="<?php echo $item["title"]."\n\n".$item["content"];?>" alt="<?php echo $item["title"];?>"/></a></p>
						<p>&nbsp;</p>

						</div>
						<div class="categories"> </div>
				</div>
				<?php 
					}
				}
				?>
				<p>&nbsp;</p>
				<div class="clearfix"> </div>
			</div>
			<p>&nbsp;</p>
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
	<!-- //portfolio -->
	<?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript">
	active("portfolioIndicator");
</script>