<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    }

    public function login() {
    	$model = M("user");
		// sql = SELECT * FROM `user` WHERE `username` = '...' AND `password` = '...' 
        $username = I("post.username");
        $password = I("post.password");   	
    	$data["username"] = $username;
    	$data["password"] = $password;
    	$res = $model -> where($data) -> find();

    	if($res != null){
    		header("location:/yao/admin/session.php?u=".$username);
            return;
    	}
    	header("location:/yao/login.php");
    }

    public function addNews(){
        // INSERT INTO `yao`.`news` (`id`, `title`, `content`, `date`, `view`, `author`, `type`, `thumb`) VALUES (NULL, 'title', 'content', CURRENT_TIMESTAMP, '0', 'BigYao', 'brief', 'http://hiahia');
    	$model = M("news");

        $username = I("post.username");
        $content = I("post.content");
        $type = I("post.type");
        $img = I("post.img");
        $title = I("post.title");


    	$data["title"] = $title;
    	$data["content"] = $content;
       //  $img = thumb($content);'
        $data["author"] = $username;
        $data["thumb"] = $img;
        $data["type"] = $type;

    	$res = $model -> add($data);
    	if($res){
    		echo "true";
    		return true;
    	}
    	echo "false";
    }

    public function getNotification($username){
        $model = M();

        $sql = "SELECT comment.content, comment.id, comment.author, comment.date FROM comment, notification WHERE comment.id=notification.comment_id and notification.user_id='".$username."'";
        $res = $model -> query($sql);
        $this -> ajaxReturn($res,"json");
    }

    public function readNotification($username, $commentId){
        $model = M("notification");
        $data["user_id"] = $username;
        $data["comment_id"] = $commentId;

        $res = $model -> where($data) -> delete();

        // $this -> ajaxReturn($res,"json");
    }

    public function getComment($commentId){
        $model = M("comment");
        $res = $model -> select($commentId);
        $this -> ajaxReturn($res,"json");
    }

    public function getNotificationCount($username){
        // SELECT COUNT(`comment_id`) FROM `notification` where `user_id` = "BigYao"
        $model = M("notification");
        $userCount = $model -> where('`user_id` = "'.$username.'"') -> count("comment_id");

        echo $userCount;
    }

    public function updateInfo(){
        $model = M("user");

        $username = I("post.username");
        $key = I("post.key");
        $value = I("post.value");

        $data[$key] = $value;
        
        $condition["username"] = $username;

        //var_dump($data);
        $result = $model->where($condition)->save($data);
        if($result){
            echo "true";
            return true;
        }else{
            echo "false";
            return false;
        }
    }
}