<?php
/**
 * Created by PhpStorm.
 * User: 张丽坤
 * Date: 2019/9/5
 * Time: 22:58
 */

namespace app\admin\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    //发送邮件
    public static function email($email,$title,$content)
    {
        $mail = new PHPMailer(true);
        try {
            // 服务器设置
            $mail->SMTPDebug = 2; // 开启Debug
            $mail->isSMTP(); // 使用SMTP
            $mail->Host = 'smtp.163.com'; // 服务器地址
            $mail->SMTPAuth = true; // 开启SMTP验证
            $mail->Username = '13121998667@163.com'; // SMTP 用户名（你要使用的邮件发送账号）
            $mail->Password = 'zlk114'; // SMTP 密码
            $mail->SMTPSecure = 'ssl'; // 开启TLS 可选
            $mail->Port = 465; // 端口

            // 收件人
            $mail->setFrom('13121998667@163.com'); // 来自
            //$mail->addAddress('395696661@qq.com'); // 添加一个收件人
            $mail->addAddress($email); // 可以只传邮箱地址
            // 内容
            $mail->isHTML(true); // 设置邮件格式为HTML
            $mail->Subject = $title; //邮件主题
            $mail->Body = $content; //邮件内容

            $mail->send();
            echo '邮件发送成功。<br>';
        } catch (Exception $e) {
            echo '邮件发送失败。<br>';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}