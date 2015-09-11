<!DOCTYPE html>
<html>
<?php
  session_start();
  if(!isset($_SESSION["username"])){
	header("location:./index.html");
}
$USER = $_SESSION["username"];
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
        h5 {
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
function trim(str){ //删除左右两端的空格
　return str.replace(/(^\s*)|(\s*$)/g, "");
}

function isEmail(str){ 
var reg = /^([a-zA-Z0-9_-.])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
return reg.test(str); 
} 
 function check(form) {
          if(trim(form.title.value)=='') {
            form.title.value = "";
                return false;
           }

         if(trim(form.content.value)==""){
          form.content.value="";
          return false;
         }
         return true;
         }

function changeFormValue(id){
  var field = document.getElementById("toCommentField");
  field.value = id;
}

function change(select){
	var field = document.getElementById("type");
	field.value = select.value;
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
        <div class="logo"> <a href="index.html"><img src="images/logo.png" width="121" height="140" alt=""/><img src="images/title.png" width="461" height="87" alt=""/></a> </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h3>&nbsp;</h3>
        <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/7DD4.png',1)"><img src="images/7DD4.tm.png" alt="" width="47" height="55" id="Image6"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','images/7D7B.png',1)"><img src="images/7D7B.tm.png" alt="" width="46" height="56" id="Image7"></a><a href="#online" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','images/7D1D.png',1)"><img src="images/7D1D.tm.png" alt="" width="143" height="56" id="Image8"></a>
        <p>&nbsp;</p>
        <div class="clearfix"> </div>
      </div>
      <div class="top-nav"> <span class="menu"><img src="images/menu.png" alt="" /></span>
        <ul class="nav1">
          <li><a href="index.html">综合首页</a></li>
          <li><a href="blog.php">法律动态</a></li>
          <li><a href="search.php">检索咨询</a></li>
          <li><a href="portfolio.php">经典案例</a></li>
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
<!-- blog -->
	<div class="blog">
	<div class="container">
	  <div class="clearfix"> </div>
	  <div class="responses">
	    <h1>&nbsp;</h1>
	  </div>
	  <div id="online" class="online">
	    <div class="comments">
			<p>&nbsp;</p>
			<a name=“online”><h1>添加新文章</h1> 
            </a>
            <select id="typeSelect" onchange="change(this)">
				<option value="news">最新法律法规</option>
				<option value="direction">审判指导与参考</option>
				<option value="explosion"> 最新法律法规解读</option>
				<option value="brief">Brief</option></select>
			<form id="form" action = "admin/upload.php" method="POST" enctype="multipart/form-data" onsubmit="return check(this)">
				<p>
				<input type="hidden" id="type" name="type" value="news" />
				  <input style="margin: 10px 0" type="text" placeholder="Title" name="title" id="title" required>
				  <textarea placeholder="Message" name="content" id="content" required></textarea>
				  <br/><span for="file">添加预览图片</span><input id="file" name="file" type="file" />
				  <input type="submit" id="submit" value="发送">
			  </p>
        </form>
		</div>
	</div>
	</div>
	</div>
<!-- //blog -->
<!-- footer -->
	；
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