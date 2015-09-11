<?php
require("../conf/configure.php");
require("../conf/HttpClient.class.php");
$client = new HttpClient(HOST);

// $username = I("post.username");
// $mail = I("post.mail");
// $article = I("post.article");
// $content = I("post.content");
// $toComment = I("post.toComment");

// <input type="text" placeholder="真实姓名" name="comment_name" id="comment_name" required>
// <input type="text" placeholder="Email" name="comment_mail" id="comment_mail" required>
// <input type="text" placeholder="性别" name="comment_gender" id="comment_gender" >
// <input type="text" placeholder="联系电话" name="comment_phone" id="comment_phone" >
// <textarea name="textarea" required placeholder="请留言内容" name="comment_content" id="comment_content"></textarea>
// <input type="submit" value="发送留言"></p>
$params["username"] = $_POST['comment_name'];
$params["mail"] = $_POST['comment_mail'];
$params["content"] = $_POST['comment_content'];
$params["toComment"] = $_POST['comment_to_id'];

$page = $_POST['page'];

$res = $client -> quickPost(LIB_PATH."/Home/index/postComment", $params);

if($res == "true"){
	$str = "留言成功";
}else{
	$str = "留言失败";
}

header("Location: ../result.php?res=".$str."&url=contact.php?page=".$page);
?>

<!-- //here ends scrolling icon -->