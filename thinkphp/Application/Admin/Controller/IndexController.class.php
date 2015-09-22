<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    }

    /************************
     * Log in
     */ 
    public function login() {
    	$model = M("user");
		// sql = SELECT * FROM `user` WHERE `username` = '...' AND `password` = '...' 
        $username = I("post.username");
        $password = I("post.password");   	
    	$data["username"] = $username;
    	$data["password"] = $password;
    	$res = $model -> where($data) -> find();

    	if($res != null){
            echo $res["name"];
            return true;
    	}
    	echo "false";
        return false;
    }

    // public function setPassword() {
    //     $model = M("user");
    //     $username = I("post.username");
    //     $password = I("post.password");     
    //     $data["username"] = $username;
    //     $data["password"] = $password;
    //     $res = $model -> save($data);

    //     // echo $model -> getLastSql();
    //     // echo "\n".$res;

    //     if($res != null){
    //         echo "true";
    //         return true;
    //     }
    //     echo "false";
    //     return false;
    // }

    public function getUsers(){
        $model = M("user");
        $res = $model -> field("`name`,`username`") -> select();
        $this -> ajaxReturn($res,"json"); 
    }

    /***************************
     * Add articles
     */
    public function addNews(){
        // INSERT INTO `yao`.`news` (`id`, `title`, `content`, `date`, `view`, `author`, `type`, `thumb`) VALUES (NULL, 'title', 'content', CURRENT_TIMESTAMP, '0', 'BigYao', 'brief', 'http://hiahia');
    	$model = M("news");

        $username = I("post.username");
        $content = I("post.content");
        $type = I("post.type");
        $img = I("post.img");
        $title = I("post.title");
        $links = I("post.related");

        // $username = "littleYao";
        // $content = "test";
        // $type = "news";
        // $img = "http://localhost/yao//upload/1442126264p2250686172.jpg";
        // $title = "title";
        // $links = "[{\"title\":\"a\",\"uri\":\"d\"}]";


    	$data["title"] = $title;
    	$data["content"] = $content;
       //  $img = thumb($content);'
        $data["author"] = $username;
        $data["thumb"] = $img;
        $data["type"] = $type;

    	$res = $model -> add($data);
        // echo $model -> getLastSql();
    	if($res == NULL){
    		echo "false";
    		return false;
    	}
        // add related link
        $newsId = $res;
        // $newsId = "32";

        $links=str_replace ('\"','"', $links);

        $array = json_decode(trim(htmlspecialchars_decode($links)), true);
        // echo json_last_error();
        if(count($array) == 0){ // no link to add
            echo "true";
            return true;
        }
        // var_dump($array);
        for ($i  = 0; $i < count($array); $i++) {
            $linkarr[$i]["for_news"] = $newsId;
            $linkarr[$i]["type"] = "friendly";
            $linkarr[$i]["title"] = $array[$i]["title"];
            $linkarr[$i]["uri"] = $array[$i]["uri"];
        }
        $linkModel = M("link");
        // var_dump($linkarr);
        $linkModel -> addAll($linkarr);
        // echo $linkModel -> getLastSql();
        echo $newsId;
        return true;
    }

    /****************************
     * Notifications
     */
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
        echo $model -> getLastSql();
        return true;
        // $this -> ajaxReturn($res,"json");
    }

    public function getNotificationCount($username){
        // SELECT COUNT(`comment_id`) FROM `notification` where `user_id` = "BigYao"
        $model = M("notification");
        $userCount = $model -> where('`user_id` = "'.$username.'"') -> count("comment_id");

        echo $userCount;
    }

    /****************************
     * Comment
     */
    public function getComment($commentId){
        $model = M("comment");
        $forCmdId = $model -> field("for_comment") -> find($commentId);
        $forCmdId = $forCmdId["for_comment"];
        $parentId = ($forCmdId == null) ? $commentId : $forCmdId;

        $res = $model -> where("`id`= $parentId or `for_comment`= $parentId") -> select();

        $this -> ajaxReturn($res,"json");
    }

    /**************************
     * Information
     */
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