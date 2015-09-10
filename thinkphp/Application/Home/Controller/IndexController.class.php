<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    }

    public function getNews($newsId){
    	$model = M("news");
    	$res = $model -> select($newsId);

    	$this -> ajaxReturn($res,"json");
    }

    public function getPreview($newsId){
    	$previewNumber = 50;
    	$model = M("news");
    	$res = $model -> find($newsId);
    	// echo $res["content"];
    	$res["content"] = cutArticle($res["content"], $previewNumber);

    	$this -> ajaxReturn($res,"json");
    }

    public function postComment(){
    	// INSERT INTO `yao`.`comment` (`id`, `for_news`, `for_comment`, `author`, 
    	// `mail`, `content`, `date`) VALUES (NULL, '1', NULL, 'a', 'a', 'a', CURRENT_TIMESTAMP);
    	$username = I("post.username");
    	$mail = I("post.mail");
    	$article = I("post.article");
    	$content = I("post.content");
    	$toComment = I("post.toComment");

    	$content=strip_tags($content);//去除html标记  
    	$pattern = "/&[a-zA-Z]+;/";//去除特殊符号  
    	$content=preg_replace($pattern,'',$content);  

    	$username=strip_tags($username);//去除html标记  
    	$username=preg_replace($pattern,'',$username);

    	if($toComment == ""){
	    	$model = M("comment");
	    	$data["for_news"] = $article == "" ? NULL : $article;
	    	$data["for_comment"] = $toComment == "" ? NULL : $toComment;
	    	$data["author"] = $username;
	    	$data["mail"] = $mail;
	    	$data["content"] = $content;

	    	//var_dump($data);
            try{
    	    	$res = $model -> add($data);
            }catch(\Exception $e){
                echo "false";
                return false;
            }
	    }else{
    		// echo "true";
			sendMail($mail, $toComment, $username, $content);
    	}
    	echo "true";
    	return true;
    }

    public function getLatestCollections($number){
        // 返回author name, date, author icon, preview
        // select `user`.`name`, `user`.`icon`, `news`.`date`, `news`.`content` from `user`, `news` 
        $model = M("news");
        $res = $model -> field("id, thumb, content, title, date") ->order('id desc') -> limit($number) -> select(); //query($sql);

        for ($i = 0; $i < count($res); $i++) {
            $res[$i]["content"] = cutArticle($res[$i]["content"], 500);
        }

        $this -> ajaxReturn($res, "json");
    }

    public function getNewsCollections($number){
    	// 返回author name, date, author icon, preview
    	// select `user`.`name`, `user`.`icon`, `news`.`date`, `news`.`content` from `user`, `news` where `user`.`username` = `news`.`author`
    	$model = M("news");
    	$res = $model -> field("id, thumb, content, title") -> where("`type` = 'news'") ->order('id desc') -> limit($number) -> select(); //query($sql);

    	for ($i = 0; $i < count($res); $i++) {
    		$res[$i]["content"] = cutArticle($res[$i]["content"], 500);
    	}

    	$this -> ajaxReturn($res, "json");
    }

    public function getExplosionCollections($number){
    	// 返回author name, date, author icon, preview
    	// select `user`.`name`, `user`.`icon`, `news`.`date`, `news`.`content` from `user`, `news` where `user`.`username` = `news`.`author`
    	$model = M("news");
    	$res = $model -> field("id, thumb, content, title") -> where("`type` = 'explosion'") ->order('id desc') -> limit($number) -> select(); //query($sql);

    	for ($i = 0; $i < count($res); $i++) {
    		$res[$i]["content"] = cutArticle($res[$i]["content"], 500);
    	}

    	$this -> ajaxReturn($res, "json");
    }

    public function getDirectionCollections($number, $length){
    	$model = M();

    	$sql = "select news.content, news.date, news.id, news.title, news.thumb, user.name, user.icon from news, user where news.type='direction' and news.author=user.username order by id desc limit ".$number;
    	$res = $model -> query($sql);
    	for ($i = 0; $i < count($res); $i++) {
    		$res[$i]["content"] = cutArticle($res[$i]["content"], $length);
    	}

    	$this -> ajaxReturn($res, "json");
    }

    public function getBriefCollections($number){
    	$model = M("news");

    	//$sql = "select `user`.`name`, `user`.`icon`, `news`.`date`, `news`.`content` from `user`, `news` where `user`.`username` = `news`.`author`  and `news`.`type`= 'news' limit ".$number;
    	$res = $model -> field("id, title") -> where("`type` = 'brief'") -> order('id desc') -> limit($number) -> select(); //query($sql);
    	for ($i = 0; $i < count($res); $i++) {
    		$res[$i]["title"] = cutArticle($res[$i]["title"], 15);
    	}

    	$this -> ajaxReturn($res, "json");
    }

    public function getGlobalComment($page = 0, $number = 3){
    	$model = M("comment");

    	//$sql = "select `user`.`name`, `user`.`icon`, `news`.`date`, `news`.`content` from `user`, `news` where `user`.`username` = `news`.`author`  and `news`.`type`= 'news' limit ".$number;
    	$res = $model -> where("`for_news` is NULL and `for_comment` is NULL") -> order('id desc') -> page($page, $number) -> select(); //query($sql);
        for ($i = 0; $i < count($res); $i++) {
            $id = $res[$i]["id"];
            $reply = $model -> where("`for_comment`=$id") -> find();
            $res[$i]["replied"] = ($reply != NULL);
        }
    	$this -> ajaxReturn($res, "json");
    }

    public function getFriendlyLink($article){
    	$model = M("link");

    	$res = $model -> field("title, uri") -> where("`for_news` = $article and `type` = 'friendly'") -> select();

    	$this -> ajaxReturn($res, "json");
    }

    public function getRelatedLink($article){
    	$model = M("link");

    	$res = $model -> field("title, uri") -> where("`for_news` = $article and `type` = 'reference'") -> select();

    	$this -> ajaxReturn($res, "json");
    }

    public function search($key){
    	$key = trim($key);

    	$words = split("[ ]+",$key);
    	$model = M("news");
    	$res = array();
    	foreach ($words as $word) {
    		$sql = "SELECT id, title, date  FROM `news` WHERE `content` LIKE '%$word%' or `title` LIKE '%$word%'";
    		// echo $sql."\n";
    		$response = $model -> query($sql);
    		$res = array_merge($res, $response);
    		// var_dump($res);
    	}

    	$this -> ajaxReturn($res, "json");
    }

    public function getType($type){
    	$model = M("news");

    	$res = $model -> field("id, date, title") -> where("type='".$type."'") -> limit(60) -> select();

    	$this -> ajaxReturn($res, "json");

    }

    public function getPortfilioType(){
    	$model = M("portfolio_type");

    	$res = $model -> limit(4) ->  order('id desc') -> select();

    	$this -> ajaxReturn($res, "json");
    }


    public function getPortfilioImg($id){
    	$model = M("portfolio_image");

    	$res = $model -> field("url") -> where("`type` =".$id) -> select();

    	$this -> ajaxReturn($res, "json");
    }

     public function Comment(){
    	// INSERT INTO `yao`.`comment` (`id`, `for_news`, `for_comment`, `author`, 
    	// `mail`, `content`, `date`) VALUES (NULL, '1', NULL, 'a', 'a', 'a', CURRENT_TIMESTAMP);
    	$username = "zhouyuwei";
    	$mail = "11302010067@fudan.edu.cn";
    	$article = "";
    	$content = "hahaha";
    	$toComment = 23;

    	$content=strip_tags($content);//去除html标记  
    	$pattern = "/&[a-zA-Z]+;/";//去除特殊符号  
    	$content=preg_replace($pattern,'',$content);  

    	$username=strip_tags($username);//去除html标记  
    	$username=preg_replace($pattern,'',$username);

    	if( $article != "" ){
	    	$model = M("comment");
	    	$data["for_news"] = $article == "" ? NULL : $article;
	    	$data["for_comment"] = $toComment == "" ? NULL : $toComment;
	    	$data["author"] = $username;
	    	$data["mail"] = $mail;
	    	$data["content"] = $content;

	    	//var_dump($data);
	    	$res = $model -> add($data);
	    }else{
    		// echo "true";
    		echo $mail.$toComment.$username.$content;
			sendMail($mail, $toComment, $username, $content);
    	}
    	// echo "false";
    	// return false;
    	// header("location:/yao/online.php");
    }
}