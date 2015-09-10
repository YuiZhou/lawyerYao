<?php
 function cutArticle($data,$cut=0,$str="..."){     
    $data=strip_tags($data);//去除html标记  
    $pattern = "/&[a-zA-Z]+;/";//去除特殊符号  
    $data=preg_replace($pattern,'',$data);  
    if(!is_numeric($cut))  
        return $data; 
    if($cut>0)  
        $data=mb_strimwidth(trim($data), 0, $cut,$str,"utf-8");  
    return $data;  
}   

function sendMail($mail, $toComment, $username, $content){
	if($toComment == NULL || $mail == NULL || $content == NULL){
		return;
	}

    require_once("Util/PHPMailer.class.php");
    require_once("Util/SMTP.class.php");
try{
    $mail = new Common\Util\PHPMailer();
    $mail->IsSMTP(); // 使用SMTP方式发送
    $mail->CharSet='UTF-8';// 设置邮件的字符编码
    $mail->Host = 'smtp.qq.com'; // 您的企业邮局服务器
    $mail->Port = 25; // 设置端口
    $mail->SMTPAuth = true; // 启用SMTP验证功能
    $mail->Username = ''; // 邮局用户名(请填写完整的email地址)&&&&&&&&&&&&&&&&&&&&&&
    $mail->Password = ""; // 邮局密码 &&&&&&&&&&&&&&&&&&&&&&&
    $mail->From = ''; //邮件发送者email地址 &&&&&&&&&&&&&&&&&&&&
    $mail->FromName = ""; //&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
    $mail->AddAddress($mail, $username);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
    
    $mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
    $mail->Subject = '收到来自姚律师的邮件';//"PHPMailer测试邮件"; //邮件标题
    $mail->Body = $content; //邮件内容
    $mail->Send();
    } catch (phpmailerException $e) {
            echo $e->errorMessage();
        }
}