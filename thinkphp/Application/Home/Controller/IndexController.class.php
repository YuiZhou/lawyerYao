<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    }

    /*************************************
     * single article
     */
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

    public function getType($type){
        $model = M("news");

        $res = $model -> field("id, date, title") -> where("type='".$type."'") -> limit(60) -> select();

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


    /***********************************
     * comment
     */
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

    	if($toComment != ""){
    		// echo "true";
            // receiver's mail and username
			sendMail($mail, $username, $content);
            $username = "Admin";
    	}
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
    	echo "true";
    	return true;
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


    /***************************************************
     * Batch get article information
     */
    public function getLatestCollections($number){
        $model = M("news");
        $res = $model -> field("id, thumb, content, title, date") -> where("`type` != 'portfolio'") -> order('id desc') -> limit($number) -> select(); //query($sql);

        for ($i = 0; $i < count($res); $i++) {
            $res[$i]["content"] = cutArticle($res[$i]["content"], 500);
        }

        $this -> ajaxReturn($res, "json");
    }

    public function getNewsCollections($number){
    	$model = M("news");
    	$res = $model -> field("id, thumb, content, title") -> where("`type` = 'news'") ->order('id desc') -> limit($number) -> select(); //query($sql);

    	for ($i = 0; $i < count($res); $i++) {
    		$res[$i]["content"] = cutArticle($res[$i]["content"], 500);
    	}

    	$this -> ajaxReturn($res, "json");
    }

    public function getExplosionCollections($number){
    	$model = M("news");
    	$res = $model -> field("id, thumb, content, title") -> where("`type` = 'explosion'") ->order('id desc') -> limit($number) -> select(); //query($sql);

    	for ($i = 0; $i < count($res); $i++) {
    		$res[$i]["content"] = cutArticle($res[$i]["content"], 500);
    	}

    	$this -> ajaxReturn($res, "json");
    }

    public function getDirectionCollections($number){
        $model = M("news");
        $res = $model -> field("id, thumb, content, title") -> where("`type` = 'direction'") ->order('id desc') -> limit($number) -> select(); //query($sql);

        for ($i = 0; $i < count($res); $i++) {
            $res[$i]["content"] = cutArticle($res[$i]["content"], 500);
        }

        $this -> ajaxReturn($res, "json");
    }

    public function getPortfolioCollections($number){
        $model = M("news");
        $res = $model -> field("id, thumb, content, title") -> where("`type` = 'portfolio'") ->order('id desc') -> limit($number) -> select(); //query($sql);

        for ($i = 0; $i < count($res); $i++) {
            $res[$i]["content"] = cutArticle($res[$i]["content"], 500);
        }

        $this -> ajaxReturn($res, "json");
    }
  
    /*****************************************
     * search
     */
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

    


    /********************************************************
     * user information
     */
    function getUserInfo(){
        $model = M("user");

        $res = $model -> field("username, name, introduction, icon") -> select();

        $this -> ajaxReturn($res, "json");
    }
}