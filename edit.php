<?php 
  require(".\admin\sessionConf.php");
  require("./conf/configure.php");
  require("./conf/HttpClient.class.php");
  $client = new HttpClient(HOST);
  if(!$isAdmin){
  	header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>姚律师在线·添加新文章</title>
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
			<div id="online" class="online">
				<div class="comments">
					<p>&nbsp;</p>
					<a name=“online”>
						<h1>添加新文章</h1>
					</a>

					<form id="form" action = "admin/uploadArticle.php" method="POST" enctype="multipart/form-data">
						<p>
							<select name="type">
								<option value="news">最新法律法规</option>
								<option value="direction">审判指导与参考</option>
								<option value="explosion">最新法律法规解读</option>
								<option value="portfolio">经典案例解析</option>
							</select>
							<input style="margin: 10px 0" type="text" placeholder="Title" name="title" id="title" required>
							<input type="hidden" id="linkJson" name="linkJson" value="[]" />
							<textarea placeholder="Message" name="content" id="content" required></textarea>
							<br/>
							<span for="file">添加预览图片</span>
							<input id="file" name="file" type="file" />
							<br/><br/>
							<h3 style="margin-bottom:8px">相关文章链接</h3>
							<div id="relatedLinkField" style="margin-bottom:30px;">
							</div>
							<button id="addLinkInputShowButton" onclick="AddLinkInputShow(); return false;">添加相关文章链接</button>
							<div id="addLink" style="display : none">
								<input placeholder="链接标题" id="linkTitle" />
								<input placeholder="文章链接" id="linkHref" />
							<button onclick="AddLink(); return false;">确定添加</button>
							</div>
							<input type="submit" id="submit" value="发送"></p>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //blog -->
	<!-- footer -->
	<?php require "component/footer.php"; ?>
</body>
</html>
<script type="text/javascript">
		function trim(str){ //删除左右两端的空格
		　	return str.replace(/(^\s*)|(\s*$)/g, "");
		}

		function AddLinkInputShow(){
			document.getElementById("addLinkInputShowButton").style.display = "none";
			document.getElementById("addLink").style.display = "block";
		}

		var linkArray = new Array();
		function AddLink(){
			var titleFd = document.getElementById("linkTitle");
			var hrefFd = document.getElementById("linkHref");
			var title = trim(titleFd.value);
			var href = hrefFd.value;
			if(title == ""){
				title = href;
			}
			titleFd.value = "";
			hrefFd.value = "";

			var index = linkArray.length;
			linkArray[index] = new Array();
			linkArray[index]["title"] = title;
			linkArray[index]["uri"] = href;
			printLinkArray(linkArray);
		}

		function printLinkArray(arr){
			var str = "";
			for (var i = 0; i < arr.length; i++) {
				var title = arr[i]["title"];
				var href = arr[i]["uri"]; 
				str += '<p title="'+href+'">'+title+'&nbsp;(<a href="#relatedLinkField" onclick="removeLink(\''+title+'\', \''+href+'\')">X</a>)</p>';
			}

			document.getElementById("relatedLinkField").innerHTML = str;
			formatJson(arr);
		}

		function formatJson(arr){
			var json = "[";
			if(arr.length == 0){
				return;
			}

			var title = arr[0]["title"];
			var href = arr[0]["uri"]; 
			json += "{\"title\":\""+title+"\",\"uri\":\""+href+"\"}";
			for (var i = 1; i < arr.length; i++) {
				var title = arr[i]["title"];
				var href = arr[i]["uri"]; 
				json += ", {\"title\":\""+title+"\",\"uri\":\""+href+"\"}";
			}
			json += "]";
			document.getElementById("linkJson").value = json;
		}

		function removeLink(title, href){
			var lastIndex = linkArray.length - 1;
			for (var i = 0; i <= lastIndex; i++) {
				if(linkArray[i]["title"] == title && linkArray[i]["uri"] == href){
					linkArray[i] = linkArray[lastIndex];
					linkArray.pop();
					printLinkArray(linkArray);
					return;
				}
				// str += '<p title="'+href+'">'+title+'&nbsp;(<a href="#" onclick="removeLink('+title+', '+ href+')">X</a>)</p>';
			}
		}
</script>	