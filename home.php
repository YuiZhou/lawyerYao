<?php 
	require(".\admin\sessionConf.php");
	require("./conf/configure.php");
	require("./conf/HttpClient.class.php");
	$client = new HttpClient(HOST);
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
	          <video width="570" height="340" preload="auto" controls autoplay loop >
	            <source src="video/test.mp4" type="video/mp4">
	          </video>
	          <div class="fig-txt">
	            <div class="clearfix">
	              <div class="blog-left-text blog-left-text-mid">
	              <h1><a href="latest.php">最新动态</a></h1>
	                <?php if( !$client -> get(LIB_PATH."/Home/index/getLatestCollections/number/3")){
							echo "网络错误";
						}else{
							$value = $client -> getContent();
							$array = json_decode(trim($value), true);
							foreach ($array as $item) {
								$id = $item["id"];
					?>
	                <div class="fig-txt">
	                  <div class="fig-txt-fig"><img src='<?php echo $item["thumb"]?>' width="500" alt=""/></div>
	                  <p>
	                    <label><?php echo $item["date"]?></label>
	                  </p>
	                  <h4><a href="article.php?p=<?php echo $id;?>"><?php echo $item["title"]?></a></h4>
	                  <p><span class="text"><?php echo $item["content"]?></span></p>
	                  <div class="clearfix"> </div>
	                </div>
	                <?php }}?>
	                <p><span class="text"><a href="blog.php">更多文章&gt;&gt;</a></span></p>
	              <div class="fig-txt-text">
	                <div class="blog-right1">
	                  <?php require "component/search.php";?>
	                </div>
	            </div>
	            </div>
	            </div>
	          </div>
			</div>
		  </div>
		  <div class="blog-right">
		        <?php
        	if(!$client -> get(LIB_PATH."/Home/index/getUserInfo")){
            echo "网络错误";
          }else{
            $value = $client -> getContent();
            $array = json_decode(trim($value), true);
            if(count($array) != 2){
              echo "网络错误";
            }else{
              $bigYao = $array[0];
           ?>
		  <img src="<?php echo $bigYao["icon"];?>" width="310" alt="姚允才律师" style="marin-top:10px" />
			<div class="men-text">
			  <div class="clearfix"></div>
			  <h1 class="text"><a href="about.php">关于姚律师</a></h1>
		    </div>
			<div class="men-text men-text-mid">
			  <div class="clearfix"></div>
			  <p class="text"><?php echo $bigYao["introduction"];?></p>
		    </div>
		    <?php }}?>
		  </div>
		  <div class="blog-right">
		    <div class="recent">
		      <h1><a href="portfolio.php">经典案例展示</a></h1>
		      <?php 
					if( !$client -> get(LIB_PATH."/Home/index/getPortfolioCollections/number/3")){
						echo "网络错误";
					}else{
						$value = $client -> getContent();
						$array = json_decode(trim($value), true);
						foreach ($array as $item) {
				?>
		      <div class="fig-txt">
		      <?php if($item["thumb"] != ""){?>
		        <div class="fig-txt-fig"><img src="<?php echo $item["thumb"];?>" width="450" alt=""/></div>
		        <?php }?>
		        <div class="fig-txt-text">
		          <p>
		            <label><?php echo $item["date"];?></label>
	              </p>
		          <h5><a href="article.php?id=<?php echo $item["id"];?>"><?php echo $item["title"];?></a></h5>
		          <p><span class="text"><?php echo $item["content"];?></span></p>
	            </div>
		        <div class="clearfix"> </div>
	          </div>
		        <p>&nbsp;</p>
	          <?php }}?>
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
	<?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript">
	active("homeIndicator");
</script>