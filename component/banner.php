<!-- banner -->	
<div class="banner1">
	<div class="container">
		<div class="navi">
			<div class="head-logo">
				<div class="logo">
					<p>
						<a href="index.php">
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
					<a href="location.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/7DD4.png',1)">
						<img src="images/7DD4.tm.png" alt="" width="47" height="55" id="Image6"></a>
					<a href="contact.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','images/7D7B.png',1)">
						<img src="images/7D7B.tm.png" alt="" width="46" height="56" id="Image7"></a>
				</p>
				<div class="clearfix"></div>
			</div>
			<div class="top-nav">
				<ul class="nav1">

					<li>
						<a id="homeIndicator" href="home.php">综合首页</a>
					</li>
					<li>
						<a id="latestIndicator" href="latest.php">最新动态</a>
					</li>
					<li>
						<a id="contactIndicator" href="contact.php">在线咨询</a>
					</li>
					<li>
						<a id="portfolioIndicator" href="portfolio.php">经典案例</a>
					</li>
					<li>
						<a id="aboutIndicator" href="about.php">关于我们</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //banner -->	
<script> 
   	$( "span.menu" ).click(function() {
	 $( "ul.nav1" ).slideToggle( 300, function() {
	 // Animation complete.
	  });
	});

	function active(name){
		document.getElementById(name).className = "active";
	}

</script>