<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';
*/

include('vendor/autoload.php');
//Import PHPMailer classes into the global namespace

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$arr = array('姓名：' => $_POST["name"], '聯絡電話：' => $_POST["Phone"], '電子郵件：' => $_POST["email"], 'Line ID：' => $_POST["Url"], "請選擇聯絡時間：" => $_POST["time"], "詢問事項：" => $_POST["enquiry"]);

//$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
$mail = new PHPMailer();
//try {
    //服务器配置
    $mail->CharSet ="UTF-8";                     //设定邮件编码
    $mail->SMTPDebug = 0;                        // 调试模式输出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = 'smtp.gmail.com';                // SMTP服务器
    $mail->SMTPAuth = true;                      // 允许 SMTP 认证
    $mail->Username = 'poonhauwang6473@gmail.com';                // SMTP 用户名  即邮箱的用户名
    $mail->Password = '64733855';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
    $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
    $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

    $mail->setFrom('no-reply.kimguoguo@gmail.com', '網上來客');  //发件人
    $mail->addAddress('yoyo19960622@gmail.com', '祥鳳資產');  // 收件人
    $mail->addReplyTo('no-reply.kimguoguo@gmail.com', '查詢'); //回复的时候回复给哪个邮箱 建议和发件人一致
    //$mail->addCC('cc@example.com');                    //抄送
    //$mail->addBCC('bcc@example.com');                    //密送

    //发送附件
    // $mail->addAttachment('../xy.zip');         // 添加附件
    // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

    //Content
    $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
    $mail->Subject = '網站系統表單';
    $mail->Body    = '<strong> 您的表單 "請填寫下列表單，任何資金問題，我們都可以替您解決！" 有用戶提交數據 </strong>' . '姓名：' . $_POST["name"] . "<br> 聯絡電話：" . $_POST["Phone"] . '<br> 電子郵件：' . $_POST["email"] . '<br> Line ID：' . $_POST["Url"] . '<br> 請選擇聯絡時間：' . $_POST["time"] . '<br> 詢問事項：' . $_POST["enquiry"] . '<br> 訪問地址：<a>查看</a> <br> 系統郵件無需回覆';
    $mail->AltBody = '閣下郵件客户端不支持HTML, 因而不能顯示内容';

    $mail->send();
	
	$mail->msgHTML($content);
	if (!$mail->send()) {
        //$errormsg="已送信成功";
		header("Location:submit.html");

	} else {
		//echo 'Mailer Error: ' . $mail->ErrorInfo;
		header("Location:404.html");

	}